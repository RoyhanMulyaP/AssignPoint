<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\LoanModel;
use App\Models\InventarisModel;
use App\Models\UserModel;

class LoanController extends BaseController
{
    protected $loanModel;
    protected $inventarisModel;
    protected $userModel;

    public function __construct()
    {
        $this->loanModel = new LoanModel();
        $this->inventarisModel = new InventarisModel();
        $this->userModel = new UserModel();
    }

    public function index()
    {
        $users = $this->userModel->where('role !=', 'admin')->findAll();
        $loans = $this->loanModel->getLoansWithDetails();
        
        $groupedLoans = [];
        foreach ($loans as $loan) {
            $groupedLoans[$loan['user_uuid']][] = $loan;
        }

        $data = [
            'users' => $users,
            'groupedLoans' => $groupedLoans,
            'title' => 'Loan Management'
        ];
        return view('admin/loans/index', $data);
    }

    public function approve($id)
    {
        $loan = $this->loanModel->find($id);
        if (!$loan) {
            if ($this->request->isAJAX()) return $this->response->setJSON(['status' => 'error', 'message' => 'Loan not found.']);
            return redirect()->back()->with('error', 'Loan not found.');
        }

        // Update loan status
        $this->loanModel->update($id, ['status' => 'approved']);

        // Update dipinjam count in inventaris
        $this->inventarisModel->where('id', $loan['inventaris_id'])
                              ->set('dipinjam', 'dipinjam + ' . $loan['quantity'], false)
                              ->update();

        if ($this->request->isAJAX()) return $this->response->setJSON(['status' => 'success', 'message' => 'Loan approved.']);
        return redirect()->back()->with('success', 'Loan request approved.');
    }

    public function reject($id)
    {
        $this->loanModel->update($id, ['status' => 'rejected']);
        if ($this->request->isAJAX()) return $this->response->setJSON(['status' => 'success', 'message' => 'Loan rejected.']);
        return redirect()->back()->with('success', 'Loan request rejected.');
    }

    public function return($id)
    {
        $loan = $this->loanModel->find($id);
        if (!$loan) {
            if ($this->request->isAJAX()) return $this->response->setJSON(['status' => 'error', 'message' => 'Loan not found.']);
            return redirect()->back()->with('error', 'Loan not found.');
        }

        if ($loan['status'] === 'approved') {
            // Update loan status
            $this->loanModel->update($id, ['status' => 'returned', 'return_date' => date('Y-m-d')]);

            // Update dipinjam count in inventaris
            $this->inventarisModel->where('id', $loan['inventaris_id'])
                                  ->set('dipinjam', 'dipinjam - ' . $loan['quantity'], false)
                                  ->update();
            
            if ($this->request->isAJAX()) return $this->response->setJSON(['status' => 'success', 'message' => 'Item returned.']);
            return redirect()->back()->with('success', 'Item marked as returned.');
        }

        if ($this->request->isAJAX()) return $this->response->setJSON(['status' => 'error', 'message' => 'Invalid status.']);
        return redirect()->back()->with('error', 'Invalid loan status for return.');
    }

    public function getLatestLoans()
    {
        $loans = $this->loanModel->getLoansWithDetails();
        return $this->response->setJSON($loans);
    }
}

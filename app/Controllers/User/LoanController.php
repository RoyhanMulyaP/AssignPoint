<?php

namespace App\Controllers\User;

use App\Controllers\BaseController;
use App\Models\LoanModel;
use App\Models\InventarisModel;

class LoanController extends BaseController
{
    public function request()
    {
        if (!session()->get('isLoggedIn')) {
            return $this->response->setJSON(['status' => 'error', 'message' => 'Silakan login terlebih dahulu.']);
        }

        $inventarisId = $this->request->getPost('inventaris_id');
        $quantity = $this->request->getPost('quantity');
        $returnDate = $this->request->getPost('return_date');
        $notes = $this->request->getPost('notes');
        $borrowerName = $this->request->getPost('borrower_name');

        $inventarisModel = new InventarisModel();
        $item = $inventarisModel->find($inventarisId);

        if (!$item) {
            return $this->response->setJSON(['status' => 'error', 'message' => 'Barang tidak ditemukan.']);
        }

        // Check available stock
        $available = $item['stok'] - $item['dipinjam'];
        if ($quantity > $available) {
            return $this->response->setJSON(['status' => 'error', 'message' => 'Stok tidak mencukupi. Tersedia: ' . $available]);
        }

        $loanModel = new LoanModel();
        $data = [
            'user_uuid'     => session()->get('uuid'),
            'inventaris_id' => $inventarisId,
            'quantity'      => $quantity,
            'loan_date'     => date('Y-m-d H:i:s'),
            'return_date'   => !empty($returnDate) ? $returnDate : null,
            'status'        => 'pending',
            'notes'         => $notes,
            'borrower_name' => $borrowerName
        ];

        if ($loanModel->insert($data)) {
            return $this->response->setJSON(['status' => 'success', 'message' => 'Permintaan peminjaman berhasil diajukan.']);
        }

        return $this->response->setJSON(['status' => 'error', 'message' => 'Gagal mengajukan peminjaman.']);
    }

    public function return($id)
    {
        $loanModel = new LoanModel();
        $inventarisModel = new InventarisModel();
        
        $loan = $loanModel->where('user_uuid', session()->get('uuid'))->find($id);
        
        if (!$loan) {
            return redirect()->back()->with('error', 'Peminjaman tidak ditemukan.');
        }

        if ($loan['status'] !== 'approved') {
            return redirect()->back()->with('error', 'Barang belum dalam status dipinjam.');
        }

        // Update loan status to returned
        $loanModel->update($id, [
            'status' => 'returned',
            'return_date' => date('Y-m-d H:i:s')
        ]);

        // Update dipinjam count in inventaris
        $inventarisModel->where('id', $loan['inventaris_id'])
                          ->set('dipinjam', 'dipinjam - ' . $loan['quantity'], false)
                          ->update();

        return redirect()->back()->with('success', 'Barang berhasil dikembalikan.');
    }

    public function getStatus()
    {
        $loanModel = new LoanModel();
        $userUuid = session()->get('uuid');
        
        $loans = $loanModel->select('id, status')
                           ->where('user_uuid', $userUuid)
                           ->findAll();
                           
        return $this->response->setJSON($loans);
    }
}

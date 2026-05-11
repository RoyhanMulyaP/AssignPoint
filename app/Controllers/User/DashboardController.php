<?php

namespace App\Controllers\User;

use App\Controllers\BaseController;
use App\Models\LoanModel;
use App\Models\InventarisModel;
use App\Models\UserModel;

class DashboardController extends BaseController
{
    public function index()
    {
        $loanModel = new LoanModel();
        $inventarisModel = new InventarisModel();
        $userUuid = session()->get('uuid');

        $data = [
            'activeLoansCount' => $loanModel->where('user_uuid', $userUuid)->whereIn('status', ['approved', 'overdue'])->countAllResults(),
            'totalLoansCount' => $loanModel->where('user_uuid', $userUuid)->countAllResults(),
            'availableItemsCount' => $inventarisModel->where('stok > dipinjam')->countAllResults(),
            
            'myLoans' => $loanModel->select('loans.*, inventaris.nama_barang')
                                  ->join('inventaris', 'inventaris.id = loans.inventaris_id')
                                  ->where('user_uuid', $userUuid)
                                  ->orderBy('created_at', 'DESC')
                                  ->limit(5)
                                  ->findAll(),
            
            'title' => 'Dashboard User'
        ];

        return view('user/dashboard', $data);
    }

    public function getStats()
    {
        $loanModel = new LoanModel();
        $inventarisModel = new InventarisModel();
        $userUuid = session()->get('uuid');

        $data = [
            'activeLoansCount' => $loanModel->where('user_uuid', $userUuid)->whereIn('status', ['approved', 'overdue'])->countAllResults(),
            'totalLoansCount' => $loanModel->where('user_uuid', $userUuid)->countAllResults(),
            'availableItemsCount' => $inventarisModel->where('stok > dipinjam')->countAllResults(),
        ];

        return $this->response->setJSON($data);
    }

    public function profile()
    {
        $userModel = new UserModel();
        $user = $userModel->find(session()->get('uuid'));

        $data = [
            'user' => $user,
            'title' => 'Profil Saya'
        ];

        return view('user/profile', $data);
    }

    public function settings()
    {
        $userModel = new UserModel();
        $user = $userModel->find(session()->get('uuid'));

        $data = [
            'user' => $user,
            'title' => 'Pengaturan'
        ];

        return view('user/settings', $data);
    }

    public function updateProfile()
    {
        $userModel = new UserModel();
        $uuid = session()->get('uuid');

        $rules = [
            'name'      => 'required|min_length[3]',
            'email'     => "required|valid_email|is_unique[users.email,uuid,{$uuid}]",
            'phone'     => 'permit_empty|min_length[10]|max_length[15]',
            'job_title' => 'permit_empty|max_length[100]',
            'address'   => 'permit_empty',
            'bio'       => 'permit_empty'
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $data = [
            'name'      => $this->request->getPost('name'),
            'email'     => $this->request->getPost('email'),
            'phone'     => $this->request->getPost('phone'),
            'job_title' => $this->request->getPost('job_title'),
            'address'   => $this->request->getPost('address'),
            'bio'       => $this->request->getPost('bio'),
        ];

        $userModel->update($uuid, $data);
        
        // Update session
        session()->set('nama', $data['name']);
        session()->set('email', $data['email']);

        return redirect()->to('user/profile')->with('success', 'Profil berhasil diperbarui.');
    }

    public function updatePassword()
    {
        $userModel = new UserModel();
        $uuid = session()->get('uuid');
        $user = $userModel->find($uuid);

        $rules = [
            'old_password' => 'required',
            'new_password' => 'required|min_length[6]',
            'confirm_password' => 'required|matches[new_password]'
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()->with('errors', $this->validator->getErrors());
        }

        if (!password_verify($this->request->getPost('old_password'), $user['password'])) {
            return redirect()->back()->with('error', 'Password lama tidak sesuai.');
        }

        $userModel->update($uuid, [
            'password' => password_hash($this->request->getPost('new_password'), PASSWORD_DEFAULT)
        ]);

        return redirect()->to('user/settings')->with('success', 'Password berhasil diperbarui.');
    }

    public function updateSettings()
    {
        return redirect()->back()->with('success', 'Pengaturan berhasil diperbarui.');
    }
}

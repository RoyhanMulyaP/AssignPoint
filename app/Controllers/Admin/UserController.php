<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\UserModel;

class UserController extends BaseController
{
    protected $userModel;

    public function __construct()
    {
        $this->userModel = new UserModel();
    }

    public function index()
    {
        $data = [
            'users' => $this->userModel->findAll(),
            'title' => 'User Management'
        ];
        return view('admin/users/index', $data);
    }

    public function getLatestUsers()
    {
        $users = $this->userModel->findAll();
        return $this->response->setJSON($users);
    }

    public function delete($id)
    {
        $this->userModel->delete($id);
        return redirect()->back()->with('success', 'User deleted successfully.');
    }

    public function updateRole($id)
    {
        $role = $this->request->getPost('role');
        $this->userModel->update($id, ['role' => $role]);
        return redirect()->back()->with('success', 'User role updated.');
    }
}

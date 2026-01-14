<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\UserModel;
use App\Models\AdminModel;

class AuthController extends BaseController
{
    protected $userModel;
    protected $adminModel;

    public function __construct()
    {
        $this->userModel  = new UserModel();
        $this->adminModel = new AdminModel();
        helper(['form', 'url']);
    }

    public function login()
    {
        return view('auth/login');
    }

    public function loginProcess()
    {
        $session  = session();
        $email    = $this->request->getPost('email');
        $password = $this->request->getPost('password');

        // =====================
        // 1️⃣ CEK ADMIN
        // =====================
        $admin = $this->adminModel->where('email', $email)->first();

        if ($admin && password_verify($password, $admin['password'])) {
            $session->set([
                'uuid'       => $admin['uuid'],
                'name'       => $admin['name'],
                'email'      => $admin['email'],
                'role'       => 'admin',
                'isLoggedIn' => true,
            ]);

            return redirect()->to('/admin/dashboard');
        }

        // =====================
        // 2️⃣ CEK USER
        // =====================
        $user = $this->userModel->where('email', $email)->first();

        if ($user && password_verify($password, $user['password'])) {
            $session->set([
                'uuid'       => $user['uuid'],
                'name'       => $user['name'],
                'email'      => $user['email'],
                'role'       => 'user',
                'isLoggedIn' => true,
            ]);

            return redirect()->to('/user/dashboard');
        }

        return redirect()->back()->with('error', 'Email atau password salah');
    }

    public function register()
    {
        return view('auth/register');
    }

    public function registerProcess()
    {
        $validation = \Config\Services::validation();

        $rules = [
            'name'             => 'required|min_length[3]',
            'email'            => 'required|valid_email|is_unique[users.email]',
            'password'         => 'required|min_length[6]',
            'confirm_password' => 'required|matches[password]',
        ];

        if (! $validation->setRules($rules)->run($this->request->getPost())) {
            return redirect()->back()
                ->withInput()
                ->with('validation', $validation);
        }

        $this->userModel->insert([
            'uuid'     => \Ramsey\Uuid\Uuid::uuid4()->toString(),
            'name'     => $this->request->getPost('name'),
            'email'    => $this->request->getPost('email'),
            'password' => password_hash($this->request->getPost('password'), PASSWORD_DEFAULT),
        ]);

        return redirect()->to('/auth/login')->with('success', 'Registrasi berhasil');
    }

    public function logout()
    {
        session()->destroy();
        return redirect()->to('/auth/login');
    }
}

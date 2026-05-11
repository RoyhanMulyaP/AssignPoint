<?php

namespace App\Controllers;

class HomeController extends BaseController
{
    public function index()
    {
        $userModel = new \App\Models\UserModel();
        $inventarisModel = new \App\Models\InventarisModel();
        $loanModel = new \App\Models\LoanModel();

        $testimonialModel = new \App\Models\TestimonialModel();

        try {
            $testimonials = $testimonialModel->getApprovedWithUser();
        } catch (\Exception $e) {
            $testimonials = []; // Fallback if table doesn't exist
        }

        $data = [
            'totalUsers' => $userModel->countAll(),
            'totalItems' => $inventarisModel->countAll(),
            'totalLoans' => $loanModel->countAll(),
            'testimonials' => $testimonials
        ];

        return view('home', $data);
    }
}

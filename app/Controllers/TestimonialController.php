<?php

namespace App\Controllers;

use App\Models\TestimonialModel;

class TestimonialController extends BaseController
{
    public function submit()
    {
        if (!session()->get('isLoggedIn')) {
            return redirect()->to('auth/login')->with('error', 'Silakan login untuk memberikan ulasan.');
        }

        $rules = [
            'rating'  => 'required|is_natural_no_zero|less_than_equal_to[5]',
            'comment' => 'required|min_length[10]'
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $model = new TestimonialModel();
        
        $data = [
            'user_id' => session()->get('id'),
            'rating'  => $this->request->getPost('rating'),
            'comment' => $this->request->getPost('comment'),
            'status'  => 'pending' // Admin must approve
        ];

        $model->save($data);

        return redirect()->back()->with('success', 'Terima kasih atas ulasan Anda! Ulasan akan muncul setelah disetujui admin.');
    }
}

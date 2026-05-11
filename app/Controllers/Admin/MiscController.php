<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\InventarisModel;
use App\Models\LoanModel;
use App\Models\UserModel;
use App\Models\MaintenanceModel;
use App\Models\CategoryModel;

class MiscController extends BaseController
{
    public function reports()
    {
        $inventarisModel = new InventarisModel();
        $loanModel = new LoanModel();
        $userModel = new UserModel();
        $maintenanceModel = new MaintenanceModel();
        $categoryModel = new CategoryModel();

        // Get category distribution
        $categories = $categoryModel->findAll();
        $categoryStats = [];
        foreach ($categories as $cat) {
            // This assumes you might add category_id to inventaris later, 
            // but for now let's just count total items as a placeholder if not linked
            $categoryStats[] = [
                'name' => $cat['name'],
                'count' => 0 // Placeholder until linked
            ];
        }

        $data = [
            'totalAssets' => $inventarisModel->countAllResults(),
            'activeLoans' => $loanModel->where('status', 'approved')->countAllResults(),
            'maintenanceCount' => $maintenanceModel->where('status', 'in_progress')->countAllResults(),
            'totalUsers' => $userModel->countAllResults(),
            'categoryStats' => $categoryStats,
            'title' => 'Reports & Analytics'
        ];

        return view('admin/reports/index', $data);
    }

    public function settings()
    {
        return view('admin/settings/index', ['title' => 'System Settings']);
    }

    public function backup()
    {
        return view('admin/dashboard'); // Placeholder
    }

    public function api()
    {
        return view('admin/dashboard'); // Placeholder
    }
}

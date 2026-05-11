<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\InventarisModel;
use App\Models\LoanModel;
use App\Models\UserModel;
use App\Models\AuditLogModel;
use App\Models\MaintenanceModel;

class DashboardController extends BaseController
{
    public function index()
    {
        $inventarisModel = new InventarisModel();
        $loanModel = new LoanModel();
        $userModel = new UserModel();
        $auditModel = new AuditLogModel();
        $maintenanceModel = new MaintenanceModel();

        $data = [
            'totalItems' => $inventarisModel->countAllResults(),
            'activeLoans' => $loanModel->where('status', 'approved')->countAllResults(),
            'totalUsers' => $userModel->countAllResults(),
            'underMaintenance' => $maintenanceModel->where('status', 'in_progress')->countAllResults(),
            
            'recentActivity' => $auditModel->getLogsWithUsers(), // Limit if needed
            'pendingLoans' => $loanModel->select('loans.*, users.name as user_name, inventaris.nama_barang')
                                       ->join('users', 'users.uuid = loans.user_uuid')
                                       ->join('inventaris', 'inventaris.id = loans.inventaris_id')
                                       ->where('loans.status', 'pending')
                                       ->limit(5)
                                       ->findAll(),
            
            'inventoryStats' => [
                'available' => $inventarisModel->selectSum('stok')->get()->getRow()->stok ?? 0,
                'onLoan' => $loanModel->where('status', 'approved')->selectSum('quantity')->get()->getRow()->quantity ?? 0,
                'maintenance' => $maintenanceModel->where('status', 'in_progress')->countAllResults(),
            ],
            'title' => 'Dashboard Overview'
        ];

        return view('admin/dashboard', $data);
    }
}

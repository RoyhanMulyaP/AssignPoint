<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\MaintenanceModel;
use App\Models\InventarisModel;

class MaintenanceController extends BaseController
{
    protected $maintenanceModel;
    protected $inventarisModel;

    public function __construct()
    {
        $this->maintenanceModel = new MaintenanceModel();
        $this->inventarisModel = new InventarisModel();
    }

    public function index()
    {
        $data = [
            'maintenance' => $this->maintenanceModel->getMaintenanceWithDetails(),
            'inventaris' => $this->inventarisModel->findAll(),
            'title' => 'Maintenance'
        ];
        return view('admin/maintenance/index', $data);
    }

    public function save()
    {
        $this->maintenanceModel->save([
            'inventaris_id' => $this->request->getPost('inventaris_id'),
            'description' => $this->request->getPost('description'),
            'start_date' => $this->request->getPost('start_date'),
            'status' => 'scheduled'
        ]);
        return redirect()->back()->with('success', 'Maintenance scheduled.');
    }

    public function updateStatus($id)
    {
        $status = $this->request->getPost('status');
        $this->maintenanceModel->update($id, ['status' => $status]);
        return redirect()->back()->with('success', 'Maintenance status updated.');
    }
}

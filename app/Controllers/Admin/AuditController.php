<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\AuditLogModel;

class AuditController extends BaseController
{
    protected $auditModel;

    public function __construct()
    {
        $this->auditModel = new AuditLogModel();
    }

    public function index()
    {
        $data = [
            'logs' => $this->auditModel->getLogsWithUsers(),
            'title' => 'Audit Logs'
        ];
        return view('admin/audit/index', $data);
    }
}

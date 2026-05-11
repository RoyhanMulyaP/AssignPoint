<?php

namespace App\Models;

use CodeIgniter\Model;

class AuditLogModel extends Model
{
    protected $table            = 'audit_logs';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = [
        'user_uuid', 'action', 'entity', 
        'entity_id', 'details', 'ip_address'
    ];

    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = null;

    public function getLogsWithUsers()
    {
        return $this->select('audit_logs.*, users.name as user_name')
                    ->join('users', 'users.uuid = audit_logs.user_uuid', 'left')
                    ->orderBy('created_at', 'DESC')
                    ->findAll();
    }
}

<?php

namespace App\Models;

use CodeIgniter\Model;

class MaintenanceModel extends Model
{
    protected $table            = 'maintenance';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = [
        'inventaris_id', 'description', 'start_date', 
        'end_date', 'cost', 'status'
    ];

    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';

    public function getMaintenanceWithDetails()
    {
        return $this->select('maintenance.*, inventaris.nama_barang')
                    ->join('inventaris', 'inventaris.id = maintenance.inventaris_id')
                    ->findAll();
    }
}

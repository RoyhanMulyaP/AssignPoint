<?php

namespace App\Models;

use CodeIgniter\Model;

class LoanModel extends Model
{
    protected $table            = 'loans';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = [
        'user_uuid', 'inventaris_id', 'quantity', 
        'loan_date', 'return_date', 'status', 'notes', 'borrower_name'
    ];

    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';

    public function getLoansWithDetails()
    {
        return $this->select('loans.*, users.name as user_name, inventaris.nama_barang, loans.borrower_name')
                    ->join('users', 'users.uuid = loans.user_uuid')
                    ->join('inventaris', 'inventaris.id = loans.inventaris_id')
                    ->orderBy('loans.created_at', 'DESC')
                    ->findAll();
    }
}

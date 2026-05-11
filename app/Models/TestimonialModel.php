<?php

namespace App\Models;

use CodeIgniter\Model;

class TestimonialModel extends Model
{
    protected $table            = 'testimonials';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['user_id', 'rating', 'comment', 'status'];

    // Dates
    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';

    public function getApprovedWithUser()
    {
        return $this->select('testimonials.*, users.name, users.role')
                    ->join('users', 'users.id = testimonials.user_id')
                    ->where('status', 'approved')
                    ->orderBy('testimonials.created_at', 'DESC')
                    ->findAll();
    }
}

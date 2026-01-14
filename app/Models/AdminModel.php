<?php

namespace App\Models;

use CodeIgniter\Model;

class AdminModel extends Model
{
    protected $table = 'admins';
    protected $primaryKey = 'uuid';
    protected $useTimestamps = true;
    protected $allowedFields = ['uuid', 'name', 'email', 'password'];
}

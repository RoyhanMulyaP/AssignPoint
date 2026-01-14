<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    protected $table = 'users';
    protected $primaryKey = 'uuid';
    protected $useTimestamps = true;
    protected $allowedFields = ['uuid', 'name', 'email', 'password', 'role',];
}

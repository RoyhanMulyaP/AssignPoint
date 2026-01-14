<?php

namespace App\Models;

use CodeIgniter\Model;

class InventarisModel extends Model
{
    protected $table            = 'inventaris';
    protected $primaryKey       = 'id';
    protected $allowedFields    = [
        'kode_barang',
        'nama_barang',
        'deskripsi',
        'stok',
        'dipinjam',
        'foto'
    ];
    protected $useTimestamps = true;
}

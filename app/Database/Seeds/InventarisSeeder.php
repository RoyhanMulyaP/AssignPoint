<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class InventarisSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'kode_barang' => 'INV-001',
                'nama_barang' => 'Laptop Lenovo',
                'deskripsi'   => 'Laptop untuk kegiatan administrasi',
                'stok'        => 10,
                'dipinjam'    => 2,
                'foto'        => 'laptop.jpg',
            ],
            [
                'kode_barang' => 'INV-002',
                'nama_barang' => 'Proyektor Epson',
                'deskripsi'   => 'Proyektor ruang kelas',
                'stok'        => 5,
                'dipinjam'    => 1,
                'foto'        => 'proyektor.jpg',
            ],
            [
                'kode_barang' => 'INV-003',
                'nama_barang' => 'Printer Canon',
                'deskripsi'   => 'Printer kantor',
                'stok'        => 4,
                'dipinjam'    => 0,
                'foto'        => 'printer.jpg',
            ],
            [
                'kode_barang' => 'INV-004',
                'nama_barang' => 'Kamera DSLR',
                'deskripsi'   => 'Dokumentasi kegiatan',
                'stok'        => 3,
                'dipinjam'    => 1,
                'foto'        => 'kamera.jpg',
            ],
            [
                'kode_barang' => 'INV-005',
                'nama_barang' => 'Speaker Aktif',
                'deskripsi'   => 'Sound system',
                'stok'        => 6,
                'dipinjam'    => 2,
                'foto'        => 'speaker.jpg',
            ],
            [
                'kode_barang' => 'INV-006',
                'nama_barang' => 'Meja Lipat',
                'deskripsi'   => 'Meja kegiatan',
                'stok'        => 20,
                'dipinjam'    => 5,
                'foto'        => 'meja.jpg',
            ],
            [
                'kode_barang' => 'INV-007',
                'nama_barang' => 'Kursi Plastik',
                'deskripsi'   => 'Kursi serbaguna',
                'stok'        => 50,
                'dipinjam'    => 10,
                'foto'        => 'kursi.jpg',
            ],
            [
                'kode_barang' => 'INV-008',
                'nama_barang' => 'Microphone',
                'deskripsi'   => 'Acara dan rapat',
                'stok'        => 8,
                'dipinjam'    => 3,
                'foto'        => 'mic.jpg',
            ],
            [
                'kode_barang' => 'INV-009',
                'nama_barang' => 'Whiteboard',
                'deskripsi'   => 'Papan tulis',
                'stok'        => 7,
                'dipinjam'    => 1,
                'foto'        => 'whiteboard.jpg',
            ],
            [
                'kode_barang' => 'INV-010',
                'nama_barang' => 'Stop Kontak',
                'deskripsi'   => 'Perlengkapan listrik',
                'stok'        => 15,
                'dipinjam'    => 4,
                'foto'        => 'stopkontak.jpg',
            ],
        ];

        $this->db->table('inventaris')->insertBatch($data);
    }
}

<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\InventarisModel;

class InventarisController extends BaseController
{
    protected $inventarisModel;

    public function __construct()
    {
        $this->inventarisModel = new InventarisModel();
    }

    public function index()
    {
        $loanModel = new \App\Models\LoanModel();

        $totalItems = $this->inventarisModel->countAllResults();
        $totalStok = $this->inventarisModel->selectSum('stok')->get()->getRow()->stok ?? 0;
        $totalDipinjam = $this->inventarisModel->selectSum('dipinjam')->get()->getRow()->dipinjam ?? 0;
        $totalTersedia = $totalStok - $totalDipinjam;

        $data = [
            'title'      => 'Manajemen Inventaris',
            'inventaris' => $this->inventarisModel->orderBy('id', 'ASC')->paginate(10),
            'pager'      => $this->inventarisModel->pager,
            'isAdmin'    => session()->get('role') === 'admin',
            'stats'      => [
                'totalItems' => $totalItems,
                'totalStok' => $totalStok,
                'totalDipinjam' => $totalDipinjam,
                'totalTersedia' => $totalTersedia
            ]
        ];

        return view('inventaris/index', $data);
    }

    public function getStats()
    {
        $totalItems = $this->inventarisModel->countAllResults();
        $totalStok = $this->inventarisModel->selectSum('stok')->get()->getRow()->stok ?? 0;
        $totalDipinjam = $this->inventarisModel->selectSum('dipinjam')->get()->getRow()->dipinjam ?? 0;
        $totalTersedia = $totalStok - $totalDipinjam;

        return $this->response->setJSON([
            'totalItems' => (int)$totalItems,
            'totalStok' => (int)$totalStok,
            'totalDipinjam' => (int)$totalDipinjam,
            'totalTersedia' => (int)$totalTersedia
        ]);
    }

    public function getLatestInventory()
    {
        $items = $this->inventarisModel->orderBy('id', 'ASC')->findAll();
        // Add full URL to photo
        foreach ($items as &$item) {
            $item['foto_url'] = base_url('uploads/' . $item['foto']);
            $item['tersedia'] = $item['stok'] - $item['dipinjam'];
        }
        return $this->response->setJSON($items);
    }

    // Detail barang
    public function show($id)
    {
        $barang = $this->inventarisModel->find($id);

        if (! $barang) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }

        return view('inventaris/show', [
            'barang' => $barang
        ]);
    }

    public function getLastKodeBarang()
    {
        $db = \Config\Database::connect();
        $builder = $db->table('inventaris');
        $builder->select('kode_barang');
        $builder->orderBy('id', 'DESC');
        $builder->limit(1);
        $row = $builder->get()->getRowArray();

        if ($row) {
            return $this->response->setJSON(['kode_barang' => $row['kode_barang']]);
        } else {
            return $this->response->setJSON(['kode_barang' => null]);
        }
    }

    public function save()
    {
        $data = [
            'kode_barang' => $this->request->getPost('kode_barang'),
            'nama_barang' => $this->request->getPost('nama_barang'),
            'deskripsi'   => $this->request->getPost('deskripsi'),
            'stok'        => $this->request->getPost('stok'),
            'dipinjam'    => 0,
        ];

        // Upload foto jika ada
        $foto = $this->request->getFile('foto');
        if ($foto && $foto->isValid() && !$foto->hasMoved()) {
            $namaFile = $foto->getRandomName();
            $foto->move(FCPATH . 'uploads', $namaFile);
            $data['foto'] = $namaFile;
        }

        $this->inventarisModel->insert($data);

        return $this->response->setJSON(['status' => 'success', 'message' => 'Barang berhasil ditambahkan']);
    }

    public function update()
    {
        $id = $this->request->getPost('id');

        if (!$id) {
            return $this->response->setJSON([
                'status' => 'error',
                'message' => 'ID barang tidak ditemukan'
            ]);
        }

        $data = [
            'kode_barang' => $this->request->getPost('kode_barang'),
            'nama_barang' => $this->request->getPost('nama_barang'),
            'deskripsi'   => $this->request->getPost('deskripsi'),
            'stok'        => (int)$this->request->getPost('stok'),
        ];

        // Upload foto baru
        $foto = $this->request->getFile('foto');
        if ($foto && $foto->isValid() && !$foto->hasMoved()) {
            $namaFile = $foto->getRandomName();
            $foto->move(FCPATH . 'uploads', $namaFile);
            $data['foto'] = $namaFile;

            // Hapus foto lama
            $barangLama = $this->inventarisModel->find($id);
            if ($barangLama && !empty($barangLama['foto']) && file_exists(FCPATH . 'uploads/' . $barangLama['foto'])) {
                unlink(FCPATH . 'uploads/' . $barangLama['foto']);
            }
        }

        $updated = $this->inventarisModel->update($id, $data);

        if ($updated) {
            return $this->response->setJSON([
                'status' => 'success',
                'message' => 'Barang berhasil diupdate'
            ]);
        } else {
            log_message('error', 'Update gagal untuk ID ' . $id . ', data: ' . json_encode($data));
            return $this->response->setJSON([
                'status' => 'error',
                'message' => 'Gagal mengupdate barang'
            ]);
        }
    }

    public function delete($id = null)
    {
        if ($id === null) {
            return $this->response->setJSON([
                'status' => 'error',
                'message' => 'ID barang tidak ditemukan'
            ]);
        }

        $item = $this->inventarisModel->find($id);
        if (!$item) {
            return $this->response->setJSON([
                'status' => 'error',
                'message' => 'Barang tidak ditemukan'
            ]);
        }

        // Hapus file foto jika ada
        if (!empty($item['foto']) && file_exists(FCPATH . 'uploads/' . $item['foto'])) {
            unlink(FCPATH . 'uploads/' . $item['foto']);
        }

        if ($this->inventarisModel->delete($id)) {
            // Hitung total barang baru
            $total = $this->inventarisModel->countAllResults();

            return $this->response->setJSON([
                'status'  => 'success',
                'message' => 'Barang berhasil dihapus',
                'total'   => $total
            ]);
        } else {
            return $this->response->setJSON([
                'status' => 'error',
                'message' => 'Gagal menghapus barang'
            ]);
        }
    }

    public function bulkDelete()
    {
        $ids = $this->request->getJSON(true)['ids'] ?? [];

        if (empty($ids)) {
            return $this->response->setJSON([
                'status' => 'error',
                'message' => 'Tidak ada barang yang dipilih'
            ]);
        }

        foreach ($ids as $id) {
            $item = $this->inventarisModel->find($id);
            if ($item) {
                if (!empty($item['foto']) && file_exists(FCPATH . 'uploads/' . $item['foto'])) {
                    unlink(FCPATH . 'uploads/' . $item['foto']);
                }
                $this->inventarisModel->delete($id);
            }
        }

        $total = $this->inventarisModel->countAllResults();

        return $this->response->setJSON([
            'status'  => 'success',
            'message' => 'Barang berhasil dihapus',
            'total'   => $total
        ]);
    }
}

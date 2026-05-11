<?php if (session()->get('role') === 'admin'): ?>
    <?= $this->extend('templates/header-admin') ?>
    <?= $this->section('content') ?>
    <div class="flex h-screen overflow-hidden">
        <?= $this->include('admin/sidebar') ?>
        <div class="flex-1 flex flex-col overflow-hidden">
            <?= $this->include('admin/top_nav') ?>
            <main class="flex-1 overflow-y-auto p-6 gradient-bg">
            <?php else: ?>
                <?= $this->include('templates/header') ?>
                <div class="min-h-screen bg-gray-900">
                <?php endif; ?>
                <!-- Header -->
                <div class="bg-gray-800 border-b border-gray-700">
                    <div class="container mx-auto px-4 py-6">
                        <div class="flex flex-col md:flex-row justify-between items-start md:items-center space-y-4 md:space-y-0">
                            <div>
                                <h1 class="text-2xl md:text-3xl font-bold text-white">Manajemen Inventaris</h1>
                                <p class="text-gray-400 mt-2">Kelola data barang, stok, dan peminjaman</p>
                            </div>
                            <div class="flex space-x-3">
                                <?php if (session()->get('role') === 'admin'): ?>
                                    <button onclick="showAddModal()"
                                        class="bg-gradient-to-r from-red-600 to-red-700 text-white px-4 py-2.5 rounded-lg">
                                        <i class="fas fa-plus mr-2"></i>
                                        Tambah Barang
                                    </button>

                                    <button onclick="printTable()"
                                        class="bg-gray-700 text-white px-4 py-2.5 rounded-lg">
                                        <i class="fas fa-print mr-2"></i>
                                        Print
                                    </button>
                                <?php endif; ?>

                                <button id="filterBtn" class="bg-gray-700 hover:bg-gray-600 text-white px-4 py-2.5 rounded-lg font-semibold transition-colors duration-300 flex items-center">
                                    <i class="fas fa-filter mr-2"></i>
                                    Filter
                                </button>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Stats Cards -->
                <div class="container mx-auto px-4 py-6">
                    <div class="grid grid-cols-1 md:grid-cols-4 gap-6 mb-8">
                        <div class="bg-gray-800 rounded-xl p-6 border border-gray-700">
                            <div class="flex justify-between items-start">
                                <div>
                                    <p class="text-gray-400 text-sm mb-1">Total Barang</p>
                                    <h3 id="stat-total-items" class="text-3xl font-bold text-white"><?= number_format($stats['totalItems']) ?></h3>
                                    <p class="text-green-400 text-sm mt-2">
                                        <i class="fas fa-boxes mr-1"></i>
                                        Jenis Barang
                                    </p>
                                </div>
                                <div class="w-12 h-12 rounded-xl bg-red-900/30 flex items-center justify-center">
                                    <i class="fas fa-boxes text-red-400 text-xl"></i>
                                </div>
                            </div>
                        </div>

                        <div class="bg-gray-800 rounded-xl p-6 border border-gray-700">
                            <div class="flex justify-between items-start">
                                <div>
                                    <p class="text-gray-400 text-sm mb-1">Total Stok</p>
                                    <h3 id="stat-total-stok" class="text-3xl font-bold text-white"><?= number_format($stats['totalStok']) ?></h3>
                                    <p class="text-blue-400 text-sm mt-2">
                                        <i class="fas fa-cubes mr-1"></i>
                                        Total Unit
                                    </p>
                                </div>
                                <div class="w-12 h-12 rounded-xl bg-blue-900/30 flex items-center justify-center">
                                    <i class="fas fa-cubes text-blue-400 text-xl"></i>
                                </div>
                            </div>
                        </div>

                        <div class="bg-gray-800 rounded-xl p-6 border border-gray-700">
                            <div class="flex justify-between items-start">
                                <div>
                                    <p class="text-gray-400 text-sm mb-1">Sedang Dipinjam</p>
                                    <h3 id="stat-total-dipinjam" class="text-3xl font-bold text-white"><?= number_format($stats['totalDipinjam']) ?></h3>
                                    <p class="text-yellow-400 text-sm mt-2">
                                        <i class="fas fa-exchange-alt mr-1"></i>
                                        Unit Dipinjam
                                    </p>
                                </div>
                                <div class="w-12 h-12 rounded-xl bg-yellow-900/30 flex items-center justify-center">
                                    <i class="fas fa-handshake text-yellow-400 text-xl"></i>
                                </div>
                            </div>
                        </div>

                        <div class="bg-gray-800 rounded-xl p-6 border border-gray-700">
                            <div class="flex justify-between items-start">
                                <div>
                                    <p class="text-gray-400 text-sm mb-1">Tersedia</p>
                                    <h3 id="stat-total-tersedia" class="text-3xl font-bold text-white"><?= number_format($stats['totalTersedia']) ?></h3>
                                    <p class="text-green-400 text-sm mt-2">
                                        <i class="fas fa-check-circle mr-1"></i>
                                        Unit Tersedia
                                    </p>
                                </div>
                                <div class="w-12 h-12 rounded-xl bg-green-900/30 flex items-center justify-center">
                                    <i class="fas fa-check-circle text-green-400 text-xl"></i>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Filter Section -->
                    <div id="filterSection" class="hidden bg-gray-800 rounded-xl p-6 border border-gray-700 mb-6">
                        <div class="grid grid-cols-1 md:grid-cols-4 gap-4">
                            <div>
                                <label class="block text-gray-400 text-sm mb-2">Cari Barang</label>
                                <input type="text" id="searchBarang" placeholder="Nama atau kode barang..." class="w-full bg-gray-700 border border-gray-600 text-white rounded-lg px-4 py-2.5 focus:ring-2 focus:ring-red-600 focus:border-transparent">
                            </div>
                            <div>
                                <label class="block text-gray-400 text-sm mb-2">Status Stok</label>
                                <select id="filterStatus" class="w-full bg-gray-700 border border-gray-600 text-white rounded-lg px-4 py-2.5 focus:ring-2 focus:ring-red-600 focus:border-transparent">
                                    <option value="">Semua Status</option>
                                    <option value="tersedia">Tersedia</option>
                                    <option value="sedikit">Stok Sedikit</option>
                                    <option value="habis">Stok Habis</option>
                                    <option value="dipinjam">Sedang Dipinjam</option>
                                </select>
                            </div>
                            <div>
                                <label class="block text-gray-400 text-sm mb-2">Sortir Berdasarkan</label>
                                <select id="sortBy" class="w-full bg-gray-700 border border-gray-600 text-white rounded-lg px-4 py-2.5 focus:ring-2 focus:ring-red-600 focus:border-transparent">
                                    <option value="nama_asc">Nama A-Z</option>
                                    <option value="nama_desc">Nama Z-A</option>
                                    <option value="stok_asc">Stok Terendah</option>
                                    <option value="stok_desc">Stok Tertinggi</option>
                                    <option value="kode_asc">Kode Barang</option>
                                    <option value="terbaru">Terbaru</option>
                                </select>
                            </div>
                            <div class="flex items-end">
                                <button onclick="applyFilter()" class="w-full bg-red-600 hover:bg-red-700 text-white px-4 py-2.5 rounded-lg font-semibold transition-colors duration-300">
                                    Terapkan Filter
                                </button>
                            </div>
                        </div>
                    </div>

                    <!-- Main Table -->
                    <div class="bg-gray-800 rounded-xl border border-gray-700 overflow-hidden">
                        <div class="overflow-x-auto">
                            <table class="w-full">
                                <thead class="bg-gray-900">
                                    <tr>
                                        <th class="py-4 px-6 text-left text-gray-400 font-semibold uppercase text-sm">
                                            Kode Barang
                                        </th>
                                        <th class="py-4 px-6 text-left text-gray-400 font-semibold uppercase text-sm">Nama Barang</th>
                                        <th class="py-4 px-6 text-left text-gray-400 font-semibold uppercase text-sm">Deskripsi</th>
                                        <th class="py-4 px-6 text-left text-gray-400 font-semibold uppercase text-sm">Stok Total</th>
                                        <th class="py-4 px-6 text-left text-gray-400 font-semibold uppercase text-sm">Dipinjam</th>
                                        <th class="py-4 px-6 text-left text-gray-400 font-semibold uppercase text-sm">Tersedia</th>
                                        <th class="py-4 px-6 text-left text-gray-400 font-semibold uppercase text-sm">Foto</th>
                                        <th class="py-4 px-6 text-left text-gray-400 font-semibold uppercase text-sm">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody id="inventory-table-body" class="divide-y divide-gray-700">
                                    <?php foreach ($inventaris as $item): ?>
                                        <tr>
                                            <td class="py-4 px-6 items-center">
                                                <?= esc($item['kode_barang']) ?>
                                            </td>
                                            <td class="py-4 px-6"><?= esc($item['nama_barang']) ?></td>
                                            <td class="py-4 px-6 text-gray-300"><?= esc($item['deskripsi']) ?></td>
                                            <td class="py-4 px-6 text-center"><?= $item['stok'] ?></td>
                                            <td class="py-4 px-6 text-center text-yellow-400"><?= $item['dipinjam'] ?></td>
                                            <td class="py-4 px-6 text-center text-green-400">
                                                <?= $item['stok'] - $item['dipinjam'] ?>
                                            </td>

                                            <td class="py-4 px-6">
                                                <img src="<?= base_url('uploads/' . $item['foto']) ?>" class="w-16 h-16 rounded-lg">
                                            </td>

                                            <!-- KOLOM AKSI -->
                                            <td class="py-4 px-6">
                                                <div class="flex space-x-2">
                                                    <!-- DETAIL -->
                                                    <button
                                                        onclick="showDetailModal(this)"
                                                        data-nama="<?= esc($item['nama_barang']) ?>"
                                                        data-kode="<?= esc($item['kode_barang']) ?>"
                                                        data-deskripsi="<?= esc($item['deskripsi']) ?>"
                                                        data-stok="<?= $item['stok'] ?>"
                                                        data-dipinjam="<?= $item['dipinjam'] ?>"
                                                        data-foto="<?= !empty($item['foto']) ? base_url('uploads/' . $item['foto']) : '' ?>"
                                                        class="w-8 h-8 rounded-lg bg-gray-700 hover:bg-gray-600 text-white flex items-center justify-center"
                                                        title="Detail">
                                                        <i class="fas fa-eye text-sm"></i>
                                                    </button>
                                                    <?php if (session()->get('role') === 'admin'): ?>
                                                        <button onclick="showEditModal(this)" data-id="<?= $item['id'] ?>" class="bg-blue-900/30 w-8 h-8 rounded-lg">
                                                            <i class="fas fa-edit"></i>
                                                        </button>
                                                        <button
                                                            onclick="showDeleteModal(<?= $item['id'] ?>, '<?= esc($item['nama_barang']) ?>', this)"
                                                            class="bg-red-900/30 w-8 h-8 rounded-lg">
                                                            <i class="fas fa-trash"></i>
                                                        </button>
                                                    <?php else: ?>
                                                        <button onclick="showLoanModal(<?= $item['id'] ?>, '<?= esc($item['nama_barang']) ?>')" class="bg-red-600 hover:bg-red-700 text-white px-3 py-1 rounded-lg text-xs font-bold transition-all">
                                                            Pinjam
                                                        </button>
                                                    <?php endif; ?>
                                                </div>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>

                        <!-- Pagination -->
                        <?php
                        $page      = $pager->getCurrentPage();
                        $perPage   = $pager->getPerPage();
                        $total     = $pager->getTotal();
                        $start     = ($page - 1) * $perPage + 1;
                        $end       = min($start + $perPage - 1, $total);
                        ?>

                        <div class="px-6 py-4 border-t border-gray-700 flex flex-col md:flex-row justify-between items-center">

                            <!-- INFO DATA -->
                            <div class="text-gray-400 text-sm mb-4 md:mb-0">
                                Menampilkan
                                <span class="text-white font-semibold" id="startBarang"><?= $start ?></span> –
                                <span class="text-white font-semibold" id="endBarang"><?= $end ?></span>
                                dari
                                <span class="text-white font-semibold" id="totalBarang"><?= $total ?></span> barang
                            </div>

                            <!-- PAGINATION -->
                            <div class="flex space-x-2">
                                <?= $pager->links('default', 'tailwind_pagination') ?>
                            </div>
                        </div>

                    </div>


                </div>
                </div>

                <!-- Modal Tambah Barang -->
                <div id="addModal" class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center p-4 z-[10000] hidden">
                    <div class="bg-gray-800 rounded-2xl w-full max-w-2xl max-h-[90vh] overflow-y-auto">
                        <div class="p-6 border-b border-gray-700">
                            <div class="flex justify-between items-center">
                                <h3 class="text-xl font-bold text-white">Tambah Barang Baru</h3>
                                <button onclick="closeAddModal()" class="text-gray-400 hover:text-white">
                                    <i class="fas fa-times text-xl"></i>
                                </button>
                            </div>
                        </div>

                        <form id="addForm" class="p-6 space-y-6">
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                <div>
                                    <label class="block text-gray-300 mb-2">Kode Barang *</label>
                                    <input type="text" name="kode_barang" id="kodeBarang" class="w-full bg-gray-700 border border-gray-600 text-white rounded-lg px-4 py-3 focus:ring-2 focus:ring-red-600 focus:border-transparent" placeholder="Otomatis" readonly>
                                    <p class="text-gray-500 text-xs mt-1">Kode unik untuk barang</p>
                                </div>
                                <div>
                                    <label class="block text-gray-300 mb-2">Nama Barang *</label>
                                    <input type="text" name="nama_barang" class="w-full bg-gray-700 border border-gray-600 text-white rounded-lg px-4 py-3 focus:ring-2 focus:ring-red-600 focus:border-transparent" placeholder="Nama barang lengkap" required>
                                </div>
                            </div>

                            <div>
                                <label class="block text-gray-300 mb-2">Deskripsi</label>
                                <textarea name="deskripsi" rows="3" class="w-full bg-gray-700 border border-gray-600 text-white rounded-lg px-4 py-3 focus:ring-2 focus:ring-red-600 focus:border-transparent" placeholder="Deskripsi lengkap barang..."></textarea>
                            </div>

                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                <div>
                                    <label class="block text-gray-300 mb-2">Stok Awal *</label>
                                    <input type="number" name="stok" min="0" class="w-full bg-gray-700 border border-gray-600 text-white rounded-lg px-4 py-3 focus:ring-2 focus:ring-red-600 focus:border-transparent" value="0" required>
                                </div>
                                <div>
                                    <label class="block text-gray-300 mb-2">Upload Foto</label>
                                    <div class="border-2 border-dashed border-gray-600 rounded-lg p-6 text-center hover:border-red-600 transition-colors duration-300">
                                        <i class="fas fa-cloud-upload-alt text-3xl text-gray-500 mb-2"></i>
                                        <p class="text-gray-400 mb-2">Drag & drop atau klik untuk upload</p>
                                        <input type="file" name="foto" class="hidden" id="fotoUpload" accept="image/*">
                                        <button type="button" onclick="document.getElementById('fotoUpload').click()" class="px-4 py-2 bg-gray-700 hover:bg-gray-600 text-white rounded-lg font-medium transition-colors duration-300">
                                            Pilih File
                                        </button>
                                        <!-- Tambahkan span untuk menampilkan nama file -->
                                        <p id="fileName" class="text-gray-200 text-sm mt-2 truncate">Belum ada file dipilih</p>
                                        <p class="text-gray-500 text-xs mt-1">Max 2MB, format: JPG, PNG, GIF</p>
                                    </div>

                                </div>
                            </div>

                            <div class="pt-6 border-t border-gray-700 flex justify-end space-x-3">
                                <button type="button" onclick="closeAddModal()" class="px-6 py-3 bg-gray-700 hover:bg-gray-600 text-white rounded-lg font-medium transition-colors duration-300">
                                    Batal
                                </button>
                                <button type="submit" class="px-6 py-3 bg-red-600 hover:bg-red-700 text-white rounded-lg font-medium transition-colors duration-300">
                                    Simpan Barang
                                </button>
                            </div>
                        </form>
                    </div>
                </div>

                <!-- Modal Detail Barang -->
                <div id="detailModal" class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center p-4 z-50 hidden">
                    <div class="bg-gray-800 rounded-2xl w-full max-w-2xl">
                        <div class="p-6 border-b border-gray-700">
                            <div class="flex justify-between items-center">
                                <h3 class="text-xl font-bold text-white">Detail Barang</h3>
                                <button onclick="closeDetailModal()" class="text-gray-400 hover:text-white">
                                    <i class="fas fa-times text-xl"></i>
                                </button>
                            </div>
                        </div>

                        <div class="p-6">
                            <div class="flex flex-col md:flex-row gap-6 mb-8">
                                <div class="md:w-1/3">
                                    <div class="w-full h-48 bg-gray-700 rounded-xl flex items-center justify-center overflow-hidden">
                                        <img id="detailFoto" src="" alt="Foto Barang" class="w-full h-full object-contain rounded-xl hidden">
                                        <i id="detailFotoIcon" class="fas fa-box text-gray-500 text-6xl"></i>
                                    </div>
                                </div>
                                <div class="md:w-2/3">
                                    <h4 id="detailNama" class="text-2xl font-bold text-white mb-2">Laptop Dell XPS 15</h4>
                                    <p id="detailKode" class="text-red-400 font-semibold mb-4">INV-2024-001</p>
                                    <p id="detailDeskripsi" class="text-gray-300 mb-6">
                                        Laptop premium untuk produktivitas tinggi, layar 15.6 inch, cocok untuk design dan programming.
                                    </p>

                                    <div class="grid grid-cols-3 gap-4">
                                        <div class="text-center p-3 bg-gray-900/50 rounded-lg">
                                            <div id="detailStok" class="text-2xl font-bold text-white">15</div>
                                            <div class="text-gray-400 text-sm">Stok Total</div>
                                        </div>
                                        <div class="text-center p-3 bg-gray-900/50 rounded-lg">
                                            <div id="detailDipinjam" class="text-2xl font-bold text-yellow-400">3</div>
                                            <div class="text-gray-400 text-sm">Sedang Dipinjam</div>
                                        </div>
                                        <div class="text-center p-3 bg-gray-900/50 rounded-lg">
                                            <div id="detailTersedia" class="text-2xl font-bold text-green-400">12</div>
                                            <div class="text-gray-400 text-sm">Tersedia</div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="pt-6 border-t border-gray-700 flex justify-end">
                                <button onclick="closeDetailModal()" class="px-6 py-3 bg-red-600 hover:bg-red-700 text-white rounded-lg font-medium transition-colors duration-300">
                                    Tutup
                                </button>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Modal Edit Barang -->
                <div id="editModal" class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center p-4 z-50 hidden">
                    <div class="bg-gray-800 rounded-2xl w-full max-w-2xl max-h-[90vh] overflow-y-auto">
                        <div class="p-6 border-b border-gray-700">
                            <div class="flex justify-between items-center">
                                <h3 class="text-xl font-bold text-white">Edit Barang</h3>
                                <button onclick="closeEditModal()" class="text-gray-400 hover:text-white">
                                    <i class="fas fa-times text-xl"></i>
                                </button>
                            </div>
                        </div>

                        <form id="editForm" class="p-6 space-y-6" enctype="multipart/form-data">
                            <input type="hidden" name="id" id="editId">

                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                <div>
                                    <label class="block text-gray-300 mb-2">Kode Barang</label>
                                    <input type="text" name="kode_barang" id="editKode" class="w-full bg-gray-700 border border-gray-600 text-white rounded-lg px-4 py-3 focus:ring-2 focus:ring-red-600 focus:border-transparent" readonly>
                                </div>
                                <div>
                                    <label class="block text-gray-300 mb-2">Nama Barang</label>
                                    <input type="text" name="nama_barang" id="editNama" class="w-full bg-gray-700 border border-gray-600 text-white rounded-lg px-4 py-3 focus:ring-2 focus:ring-red-600 focus:border-transparent" required>
                                </div>
                            </div>

                            <div>
                                <label class="block text-gray-300 mb-2">Deskripsi</label>
                                <textarea name="deskripsi" id="editDeskripsi" rows="3" class="w-full bg-gray-700 border border-gray-600 text-white rounded-lg px-4 py-3 focus:ring-2 focus:ring-red-600 focus:border-transparent"></textarea>
                            </div>

                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                <div>
                                    <label class="block text-gray-300 mb-2">Stok</label>
                                    <input type="number" name="stok" id="editStok" min="0" class="w-full bg-gray-700 border border-gray-600 text-white rounded-lg px-4 py-3 focus:ring-2 focus:ring-red-600 focus:border-transparent" required>
                                </div>
                                <div>
                                    <label class="block text-gray-300 mb-2">Foto</label>
                                    <div class="border-2 border-dashed border-gray-600 rounded-lg p-6 text-center hover:border-red-600 transition-colors duration-300">
                                        <img id="editFotoPreview" class="mx-auto mb-2 w-32 h-32 object-contain rounded-lg" src="" alt="Preview Foto">
                                        <input type="file" name="foto" id="editFoto" class="hidden" accept="image/*">
                                        <button type="button" onclick="document.getElementById('editFoto').click()" class="px-4 py-2 bg-gray-700 hover:bg-gray-600 text-white rounded-lg font-medium transition-colors duration-300">
                                            Pilih File
                                        </button>
                                        <p id="editFileName" class="text-gray-200 text-sm mt-2 truncate">Belum ada file dipilih</p>
                                    </div>
                                </div>
                            </div>

                            <div class="pt-6 border-t border-gray-700 flex justify-end space-x-3">
                                <button type="button" onclick="closeEditModal()" class="px-6 py-3 bg-gray-700 hover:bg-gray-600 text-white rounded-lg font-medium transition-colors duration-300">
                                    Batal
                                </button>
                                <button type="submit" class="px-6 py-3 bg-blue-600 hover:bg-blue-700 text-white rounded-lg font-medium transition-colors duration-300">
                                    Simpan Perubahan
                                </button>
                            </div>
                        </form>
                    </div>
                </div>

                <!-- Modal Pinjam Barang -->
                <div id="loanModal" class="fixed inset-0 bg-black/60 backdrop-blur-[2px] flex items-center justify-center p-4 z-[10000] hidden">
                    <div class="bg-gray-900 border border-gray-800 rounded-3xl w-full max-w-sm shadow-2xl overflow-hidden">
                        <div class="p-6">
                            <div class="flex justify-between items-center mb-6">
                                <div>
                                    <h3 class="text-lg font-black text-white uppercase italic tracking-tighter">Pinjam <span class="text-red-600">Barang</span></h3>
                                    <p id="loanItemName" class="text-xs text-gray-500 font-medium truncate max-w-[200px]"></p>
                                </div>
                                <button onclick="closeLoanModal()" class="text-gray-500 hover:text-white transition-colors">
                                    <i class="fas fa-times"></i>
                                </button>
                            </div>

                            <form id="loanForm" class="space-y-4">
                                <input type="hidden" name="inventaris_id" id="loanItemId">

                                <div class="grid grid-cols-2 gap-4">
                                    <div class="space-y-1.5">
                                        <label class="text-[10px] font-bold text-gray-500 uppercase tracking-widest ml-1">Jumlah</label>
                                        <input type="number" name="quantity" min="1" value="1"
                                            class="w-full bg-gray-800 border border-gray-700 rounded-xl px-4 py-2.5 text-white text-sm font-bold focus:outline-none focus:border-red-600 transition-all">
                                    </div>
                                    <div class="space-y-1.5">
                                        <label class="text-[10px] font-bold text-gray-500 uppercase tracking-widest ml-1">Kembali</label>
                                        <input type="date" name="return_date"
                                            class="w-full bg-gray-800 border border-gray-700 rounded-xl px-4 py-2.5 text-white text-xs font-bold focus:outline-none focus:border-red-600 transition-all">
                                    </div>
                                </div>

                                <div class="space-y-1.5">
                                    <label class="text-[10px] font-bold text-gray-500 uppercase tracking-widest ml-1">Nama Peminjam</label>
                                    <input type="text" name="borrower_name" value="<?= session()->get('nama') ?>"
                                        class="w-full bg-gray-800 border border-gray-700 rounded-xl px-4 py-2.5 text-white text-sm font-bold focus:outline-none focus:border-red-600 transition-all"
                                        placeholder="Nama lengkap peminjam...">
                                </div>

                                <div class="space-y-1.5">
                                    <label class="text-[10px] font-bold text-gray-500 uppercase tracking-widest ml-1">Keperluan</label>
                                    <textarea name="notes" rows="2"
                                        class="w-full bg-gray-800 border border-gray-700 rounded-xl px-4 py-2.5 text-white text-xs font-medium focus:outline-none focus:border-red-600 transition-all"
                                        placeholder="Alasan peminjaman..."></textarea>
                                </div>

                                <div class="flex gap-3 pt-2">
                                    <button type="button" onclick="closeLoanModal()"
                                        class="flex-1 px-4 py-3 bg-gray-800 hover:bg-gray-700 text-gray-400 text-xs font-bold rounded-xl transition-all">
                                        Batal
                                    </button>
                                    <button type="submit"
                                        class="flex-[2] px-4 py-3 bg-red-600 hover:bg-red-700 text-white text-xs font-bold rounded-xl shadow-lg shadow-red-600/20 transition-all">
                                        Konfirmasi Pinjam
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>


                <!-- Modal Hapus Barang -->
                <div id="deleteModal" class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center p-4 z-50 hidden">
                    <div class="bg-gray-800 rounded-2xl w-full max-w-md">
                        <div class="p-6 border-b border-gray-700">
                            <div class="flex items-center text-red-500">
                                <i class="fas fa-exclamation-triangle text-2xl mr-3"></i>
                                <h3 class="text-xl font-bold text-white">Konfirmasi Hapus</h3>
                            </div>
                        </div>

                        <div class="p-6">
                            <p class="text-gray-300 mb-6">
                                Apakah Anda yakin ingin menghapus barang <span id="deleteItemName" class="font-semibold text-white"></span>?
                                Data yang dihapus tidak dapat dikembalikan.
                            </p>

                            <div class="flex justify-end space-x-3">
                                <button onclick="closeDeleteModal()" class="px-6 py-3 bg-gray-700 hover:bg-gray-600 text-white rounded-lg font-medium transition-colors duration-300">
                                    Batal
                                </button>
                                <button id="confirmDeleteBtn" class="px-6 py-3 bg-red-600 hover:bg-red-700 text-white rounded-lg font-medium transition-colors duration-300">
                                    Ya, Hapus
                                </button>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- JavaScript -->
                <script>
                    const editFotoInput = document.getElementById('editFoto');
                    const editFotoPreview = document.getElementById('editFotoPreview');
                    const editFileName = document.getElementById('editFileName');

                    editFotoInput.addEventListener('change', function() {
                        if (this.files && this.files.length > 0) {
                            const file = this.files[0];
                            editFileName.textContent = file.name;

                            const reader = new FileReader();
                            reader.onload = function(e) {
                                editFotoPreview.src = e.target.result;
                                editFotoPreview.classList.remove('hidden');
                            }
                            reader.readAsDataURL(file);
                        } else {
                            editFotoPreview.src = '';
                            editFotoPreview.classList.add('hidden');
                            editFileName.textContent = 'Belum ada file dipilih';
                        }
                    });

                    // Toggle filter section
                    document.getElementById('filterBtn').addEventListener('click', function() {
                        const filterSection = document.getElementById('filterSection');
                        filterSection.classList.toggle('hidden');
                        this.classList.toggle('bg-red-600');
                        this.classList.toggle('bg-gray-700');
                    });



                    async function generateKodeBarang() {
                        try {
                            // Ambil kode terakhir dari server via API
                            const response = await fetch('<?= base_url('admin/inventaris/lastKode') ?>');
                            const data = await response.json();

                            let lastKode = data.kode_barang; // misal "INV-010"
                            let nextNumber = 1;

                            if (lastKode) {
                                // Ambil angka di belakang INV-
                                nextNumber = parseInt(lastKode.split('-')[1], 10) + 1;
                            }

                            // Format INV-XXX
                            let nextKode = 'INV-' + nextNumber.toString().padStart(3, '0');
                            document.getElementById('kodeBarang').value = nextKode;
                        } catch (err) {
                            console.error(err);
                            document.getElementById('kodeBarang').value = 'INV-001'; // fallback
                        }
                    }

                    function showDeleteModal(id, name, button) {
                        // tampilkan nama barang di modal
                        document.getElementById('deleteItemName').textContent = name;
                        document.getElementById('deleteModal').classList.remove('hidden');

                        // reset tombol konfirmasi agar event listener tidak menumpuk
                        const oldBtn = document.getElementById('confirmDeleteBtn');
                        const newBtn = oldBtn.cloneNode(true);
                        oldBtn.parentNode.replaceChild(newBtn, oldBtn);

                        newBtn.addEventListener('click', async function() {
                            try {
                                const response = await fetch(`<?= base_url('admin/inventaris/delete') ?>/${id}`, {
                                    method: 'POST',
                                    headers: {
                                        'X-Requested-With': 'XMLHttpRequest'
                                    }
                                });

                                const data = await response.json();

                                if (data.status === 'success') {
                                    const row = button.closest('tr');
                                    if (row) {
                                        // animasi fade out
                                        row.style.transition = 'opacity 0.5s ease';
                                        row.style.opacity = 0;

                                        setTimeout(() => {
                                            // hapus row dari tabel
                                            row.remove();

                                            // update total
                                            const totalElement = document.getElementById('totalBarang');
                                            if (totalElement) totalElement.textContent = data.total;

                                            // update start & end
                                            const tableBody = document.querySelector('tbody');
                                            const rows = tableBody.querySelectorAll('tr');
                                            const startElement = document.getElementById('startBarang');
                                            const endElement = document.getElementById('endBarang');

                                            const start = rows.length > 0 ? parseInt(startElement.textContent) : 0;
                                            const totalRows = rows.length;

                                            if (totalRows > 0) {
                                                startElement.textContent = start;
                                                endElement.textContent = start + totalRows - 1;
                                            } else {
                                                startElement.textContent = 0;
                                                endElement.textContent = 0;
                                            }

                                        }, 500); // delay sama dengan animasi
                                    }

                                    closeDeleteModal();
                                    showToast(data.message, 'success');
                                } else {
                                    showToast(data.message, 'error');
                                }
                            } catch (err) {
                                console.error(err);
                                showToast('Terjadi kesalahan server', 'error');
                            }
                        });
                    }

                    function closeDeleteModal() {
                        document.getElementById('deleteModal').classList.add('hidden');
                    }


                    // Saat modal dibuka
                    function showAddModal() {
                        document.getElementById('addModal').classList.remove('hidden');
                        generateKodeBarang();
                    }



                    function closeAddModal() {
                        document.getElementById('addModal').classList.add('hidden');
                        document.getElementById('addForm').reset();
                    }

                    function showDetailModal(button) {
                        const nama = button.dataset.nama;
                        const kode = button.dataset.kode;
                        const deskripsi = button.dataset.deskripsi;
                        const stok = button.dataset.stok;
                        const dipinjam = button.dataset.dipinjam;
                        const tersedia = stok - dipinjam;
                        const foto = button.dataset.foto;

                        document.getElementById('detailNama').textContent = nama;
                        document.getElementById('detailKode').textContent = kode;
                        document.getElementById('detailDeskripsi').textContent = deskripsi;
                        document.getElementById('detailStok').textContent = stok;
                        document.getElementById('detailDipinjam').textContent = dipinjam;
                        document.getElementById('detailTersedia').textContent = tersedia;

                        const detailFoto = document.getElementById('detailFoto');
                        const detailFotoIcon = document.getElementById('detailFotoIcon');

                        if (foto) {
                            detailFoto.src = foto;
                            detailFoto.classList.remove('hidden');
                            detailFotoIcon.classList.add('hidden');
                        } else {
                            detailFoto.src = '';
                            detailFoto.classList.add('hidden');
                            detailFotoIcon.classList.remove('hidden');
                        }

                        document.getElementById('detailModal').classList.remove('hidden');
                    }

                    function showEditModal(button) {
                        const row = button.closest('tr');
                        const id = button.dataset.id;
                        const kode = row.children[0].textContent.trim();
                        const nama = row.children[1].textContent.trim();
                        const deskripsi = row.children[2].textContent.trim();
                        const stok = row.children[3].textContent.trim();
                        const fotoImg = row.querySelector('td img');
                        const fotoSrc = fotoImg ? fotoImg.src : '';

                        document.getElementById('editId').value = id;
                        document.getElementById('editKode').value = kode;
                        document.getElementById('editNama').value = nama;
                        document.getElementById('editDeskripsi').value = deskripsi;
                        document.getElementById('editStok').value = stok;

                        const fotoPreview = document.getElementById('editFotoPreview');
                        if (fotoSrc) {
                            fotoPreview.src = fotoSrc;
                            fotoPreview.classList.remove('hidden');
                        } else {
                            fotoPreview.src = '';
                            fotoPreview.classList.add('hidden');
                        }

                        document.getElementById('editFileName').textContent = 'Belum ada file dipilih';
                        document.getElementById('editFoto').value = '';

                        document.getElementById('editModal').classList.remove('hidden');
                    }

                    // Tutup modal edit
                    function closeEditModal() {
                        document.getElementById('editModal').classList.add('hidden');
                        document.getElementById('editForm').reset();
                        document.getElementById('editFotoPreview').classList.add('hidden');
                    }

                    // Update nama file ketika pilih foto baru
                    document.getElementById('editFoto').addEventListener('change', function() {
                        if (this.files && this.files.length > 0) {
                            document.getElementById('editFileName').textContent = this.files[0].name;
                            const reader = new FileReader();
                            reader.onload = function(e) {
                                const preview = document.getElementById('editFotoPreview');
                                preview.src = e.target.result;
                                preview.classList.remove('hidden');
                            };
                            reader.readAsDataURL(this.files[0]);
                        } else {
                            document.getElementById('editFileName').textContent = 'Belum ada file dipilih';
                            document.getElementById('editFotoPreview').classList.add('hidden');
                        }
                    });

                    // Submit form edit via fetch
                    document.getElementById('editForm').addEventListener('submit', async function(e) {
                        e.preventDefault();
                        const formData = new FormData(this);

                        try {
                            const response = await fetch('<?= base_url('admin/inventaris/update') ?>', {
                                method: 'POST',
                                body: formData
                            });
                            const data = await response.json();

                            if (data.status === 'success') {
                                showToast(data.message, 'success');
                                closeEditModal();
                                location.reload(); // refresh tabel agar update muncul
                            } else {
                                showToast('Gagal mengupdate barang', 'error');
                            }
                        } catch (err) {
                            console.error(err);
                            showToast('Terjadi kesalahan server', 'error');
                        }
                    });




                    function deleteItem(id) {
                        // In real implementation, send delete request to server
                        console.log('Deleting item with ID:', id);

                        // Show success message
                        showToast('Barang berhasil dihapus', 'success');
                        closeDeleteModal();

                        // Remove row from table
                        const row = document.querySelector(`tr:nth-child(${id})`);
                        if (row) {
                            row.remove();
                        }
                    }

                    function closeDetailModal() {
                        document.getElementById('detailModal').classList.add('hidden');
                    }

                    function applyFilter() {
                        const search = document.getElementById('searchBarang').value.toLowerCase();
                        const status = document.getElementById('filterStatus').value;
                        const sortBy = document.getElementById('sortBy').value;

                        // In real implementation, send filter request to server
                        console.log('Applying filter:', {
                            search,
                            status,
                            sortBy
                        });

                        showToast('Filter diterapkan', 'success');
                    }

                    function printTable() {
                        window.print();
                    }



                    function showToast(message, type = 'success') {
                        const toast = document.createElement('div');
                        toast.className = `fixed top-4 right-4 px-6 py-3 rounded-lg shadow-lg z-50 transition-all duration-300 transform translate-x-full ${type === 'success' ? 'bg-green-600' : 'bg-red-600'}`;
                        toast.innerHTML = `
            <div class="flex items-center">
                <i class="fas fa-${type === 'success' ? 'check-circle' : 'exclamation-circle'} mr-3"></i>
                <span>${message}</span>
            </div>
        `;

                        document.body.appendChild(toast);

                        setTimeout(() => {
                            toast.classList.remove('translate-x-full');
                            toast.classList.add('translate-x-0');
                        }, 10);

                        setTimeout(() => {
                            toast.classList.remove('translate-x-0');
                            toast.classList.add('translate-x-full');
                            setTimeout(() => {
                                document.body.removeChild(toast);
                            }, 300);
                        }, 3000);
                    }




                    // Form submission
                    document.getElementById('addForm').addEventListener('submit', async function(e) {
                        e.preventDefault();

                        const formData = new FormData(this);

                        try {
                            const response = await fetch('<?= base_url('admin/inventaris/save') ?>', {
                                method: 'POST',
                                body: formData
                            });

                            const data = await response.json();

                            if (data.status === 'success') {
                                showToast(data.message, 'success');
                                closeAddModal();
                                // Optional: reload page atau update tabel
                                location.reload();
                            } else {
                                showToast('Gagal menambahkan barang', 'error');
                            }
                        } catch (err) {
                            console.error(err);
                            showToast('Terjadi kesalahan server', 'error');
                        }
                    });


                    // Fix filename display bug
                    document.getElementById('fotoUpload').addEventListener('change', function(e) {
                        const fileName = e.target.files[0] ? e.target.files[0].name : 'Belum ada file dipilih';
                        document.getElementById('fileName').textContent = fileName;
                    });

                    document.getElementById('editFoto').addEventListener('change', function(e) {
                        const fileName = e.target.files[0] ? e.target.files[0].name : 'Belum ada file dipilih';
                        document.getElementById('editFileName').textContent = fileName;

                        // Update preview
                        if (e.target.files[0]) {
                            const reader = new FileReader();
                            reader.onload = function(e) {
                                document.getElementById('editFotoPreview').src = e.target.result;
                            }
                            reader.readAsDataURL(e.target.files[0]);
                        }
                    });

                    // Borrow Inventory Logic
                    function showLoanModal(id, name) {
                        document.getElementById('loanItemId').value = id;
                        document.getElementById('loanItemName').textContent = name;
                        document.getElementById('loanModal').classList.remove('hidden');
                    }

                    function closeLoanModal() {
                        document.getElementById('loanModal').classList.add('hidden');
                        document.getElementById('loanForm').reset();
                    }

                    document.getElementById('loanForm').addEventListener('submit', async function(e) {
                        e.preventDefault();
                        const formData = new FormData(this);

                        try {
                            const response = await fetch('<?= base_url('user/loans/request') ?>', {
                                method: 'POST',
                                body: formData
                            });
                            const data = await response.json();

                            if (data.status === 'success') {
                                showToast(data.message, 'success');
                                closeLoanModal();
                            } else {
                                showToast(data.message, 'error');
                            }
                        } catch (err) {
                            console.error(err);
                            showToast('Terjadi kesalahan server', 'error');
                        }
                    });

                    // Inventory table polling
                    let lastInventoryData = JSON.stringify(<?= json_encode($inventaris) ?>);
                    const isAdmin = <?= session()->get('role') === 'admin' ? 'true' : 'false' ?>;
                    const currentPage = <?= $pager->getCurrentPage() ?>;

                    document.addEventListener('DOMContentLoaded', function() {
                        async function updateInventoryTable() {
                            // Fetch latest data for current page or all?
                            // To keep it simple and consistent with the slice logic below:

                            try {
                                const response = await fetch('<?= base_url(session()->get('role') . '/inventaris/getLatest') ?>', {
                                    cache: 'no-store'
                                });
                                const items = await response.json();
                                const currentData = JSON.stringify(items);

                                if (currentData !== lastInventoryData) {
                                    refreshTableBody(items);
                                    lastInventoryData = currentData;
                                }
                            } catch (err) {
                                console.error('Table polling error:', err);
                            }
                        }

                        function refreshTableBody(items) {
                            const tbody = document.getElementById('inventory-table-body');
                            let html = '';

                            // Note: Since we are on page 1, we show the first N items to match pagination
                            // Calculate slice based on current page
                            const perPage = <?= $pager->getPerPage() ?>;
                            const start = (currentPage - 1) * perPage;
                            const displayItems = items.slice(start, start + perPage);

                            displayItems.forEach(item => {
                                const escapedName = item.nama_barang.replace(/'/g, "\\'");
                                const actionButtons = isAdmin ? `
                    <button onclick="showEditModal(this)" data-id="${item.id}" class="bg-blue-900/30 w-8 h-8 rounded-lg">
                        <i class="fas fa-edit"></i>
                    </button>
                    <button onclick="showDeleteModal(${item.id}, '${escapedName}', this)" class="bg-red-900/30 w-8 h-8 rounded-lg">
                        <i class="fas fa-trash"></i>
                    </button>
                ` : `
                    <button onclick="showLoanModal(${item.id}, '${escapedName}')" class="bg-red-600 hover:bg-red-700 text-white px-3 py-1 rounded-lg text-xs font-bold transition-all">
                        Pinjam
                    </button>
                `;

                                html += `
                    <tr>
                        <td class="py-4 px-6 items-center">
                            ${item.kode_barang}
                        </td>
                        <td class="py-4 px-6">${item.nama_barang}</td>
                        <td class="py-4 px-6 text-gray-300">${item.deskripsi || '-'}</td>
                        <td class="py-4 px-6 text-center">${item.stok}</td>
                        <td class="py-4 px-6 text-center text-yellow-400">${item.dipinjam}</td>
                        <td class="py-4 px-6 text-center text-green-400">${item.tersedia}</td>
                        <td class="py-4 px-6">
                            <img src="${item.foto_url}" class="w-16 h-16 rounded-lg" onerror="this.src='<?= base_url('assets/img/placeholder.png') ?>'">
                        </td>
                        <td class="py-4 px-6">
                            <div class="flex space-x-2">
                                <button
                                    onclick="showDetailModal(this)"
                                    data-nama="${escapedName}"
                                    data-kode="${item.kode_barang}"
                                    data-deskripsi="${item.deskripsi || ''}"
                                    data-stok="${item.stok}"
                                    data-dipinjam="${item.dipinjam}"
                                    data-foto="${item.foto_url}"
                                    class="w-8 h-8 rounded-lg bg-gray-700 hover:bg-gray-600 text-white flex items-center justify-center"
                                    title="Detail">
                                    <i class="fas fa-eye text-sm"></i>
                                </button>
                                ${actionButtons}
                            </div>
                        </td>
                    </tr>
                `;
                            });

                            tbody.innerHTML = html;

                            // Also update the total counts at the bottom
                            const totalBarangEl = document.getElementById('totalBarang');
                            if (totalBarangEl) totalBarangEl.textContent = items.length;
                        }

                        async function updateInventoryStats() {
                            try {
                                const response = await fetch('<?= base_url(session()->get('role') . '/inventaris/getStats') ?>', {
                                    cache: 'no-store'
                                });

                                if (!response.ok) throw new Error('Network response was not ok');

                                const data = await response.json();

                                if (!data || typeof data.totalItems === 'undefined') return;

                                const elements = {
                                    'stat-total-items': data.totalItems,
                                    'stat-total-stok': data.totalStok,
                                    'stat-total-dipinjam': data.totalDipinjam,
                                    'stat-total-tersedia': data.totalTersedia
                                };

                                for (const [id, value] of Object.entries(elements)) {
                                    const el = document.getElementById(id);
                                    if (el) {
                                        const newValue = Number(value).toLocaleString('id-ID');
                                        if (el.textContent !== newValue) {
                                            el.textContent = newValue;
                                            el.classList.add('text-red-400');
                                            setTimeout(() => el.classList.remove('text-red-400'), 1000);
                                        }
                                    }
                                }
                            } catch (err) {
                                console.error('Stats polling error:', err);
                            }
                        }

                        setInterval(updateInventoryTable, 3000);
                        setInterval(updateInventoryStats, 3000);
                        updateInventoryTable();
                        updateInventoryStats();
                    });

                    // Close modals on ESC key
                    document.addEventListener('keydown', function(e) {
                        if (e.key === 'Escape') {
                            closeAddModal();
                            closeDetailModal();
                            closeDeleteModal();
                            closeLoanModal();
                        }
                    });
                </script>

                <style>
                    /* Custom styles */
                    .line-clamp-2 {
                        display: -webkit-box;
                        -webkit-line-clamp: 2;
                        -webkit-box-orient: vertical;
                        overflow: hidden;
                    }

                    /* Hide scrollbar for Chrome, Safari and Opera */
                    .overflow-y-auto::-webkit-scrollbar {
                        display: none;
                    }

                    /* Hide scrollbar for IE, Edge and Firefox */
                    .overflow-y-auto {
                        -ms-overflow-style: none;
                        /* IE and Edge */
                        scrollbar-width: none;
                        /* Firefox */
                    }

                    /* Table responsive */
                    @media (max-width: 768px) {
                        table {
                            display: block;
                            overflow-x: auto;
                            white-space: nowrap;
                        }
                    }

                    /* Modal animation */
                    #addModal,
                    #detailModal,
                    #deleteModal {
                        animation: fadeIn 0.3s ease;
                    }

                    @keyframes fadeIn {
                        from {
                            opacity: 0;
                        }

                        to {
                            opacity: 1;
                        }
                    }
                </style>

                <?php if (session()->get('role') === 'admin'): ?>
            </main>
        </div>
    </div>
    <?= $this->endSection() ?>
<?php else: ?>
    </div>
    <?= $this->include('templates/footer') ?>
<?php endif; ?>
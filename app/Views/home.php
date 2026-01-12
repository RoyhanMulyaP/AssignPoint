<?= $this->include('templates/header') ?>

<!-- Hero Section -->
<section class="gradient-bg rounded-2xl shadow-2xl overflow-hidden mb-12">
    <div class="container mx-auto px-4 py-16">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 items-center">
            <div>
                <h1 class="text-5xl font-bold text-white mb-4 leading-tight">
                    Sistem Peminjaman Inventaris
                    <span class="text-red-400">Modern & Elegan</span>
                </h1>
                <p class="text-xl text-gray-300 mb-8">
                    Kelola inventaris sekolah atau kantor dengan mudah menggunakan sistem berbasis web dengan tema Hitam dan Merah yang elegan.
                </p>
                <div class="flex space-x-4">
                    <?php if (!session()->get('isLoggedIn')): ?>
                        <a href="<?= base_url('auth/register') ?>" class="bg-red-600 hover:bg-red-700 text-white px-8 py-3 rounded-lg font-semibold text-lg transition duration-300 hover-scale">
                            Daftar Sekarang
                        </a>
                        <a href="<?= base_url('auth/login') ?>" class="glass-effect border-2 border-red-600 text-red-400 hover:bg-red-600 hover:text-white px-8 py-3 rounded-lg font-semibold text-lg transition duration-300 hover-scale">
                            Login
                        </a>
                    <?php else: ?>
                        <?php if (session()->get('role') == 'admin'): ?>
                            <a href="<?= base_url('admin/dashboard') ?>" class="bg-red-600 hover:bg-red-700 text-white px-8 py-3 rounded-lg font-semibold text-lg transition duration-300 hover-scale">
                                Dashboard Admin
                            </a>
                        <?php else: ?>
                            <a href="<?= base_url('user/dashboard') ?>" class="bg-red-600 hover:bg-red-700 text-white px-8 py-3 rounded-lg font-semibold text-lg transition duration-300 hover-scale">
                                Dashboard User
                            </a>
                        <?php endif; ?>
                    <?php endif; ?>
                </div>
            </div>
            <div class="flex justify-center">
                <div class="relative">
                    <div class="w-64 h-64 bg-red-900 rounded-full opacity-20 animate-pulse"></div>
                    <div class="absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2">
                        <div class="text-center">
                            <div class="w-48 h-48 bg-gray-800 rounded-2xl border-4 border-red-600 p-4 shadow-2xl">
                                <div class="text-red-400 text-6xl mb-2">📦</div>
                                <h3 class="text-white text-xl font-bold">Inventaris</h3>
                                <p class="text-gray-400">Management System</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Features Section -->
<section class="mb-16">
    <h2 class="text-3xl font-bold text-center text-white mb-12">Fitur Unggulan</h2>
    <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
        <div class="bg-gray-800 rounded-xl p-6 border border-gray-700 hover:border-red-600 transition duration-300 hover-scale">
            <div class="text-red-400 text-4xl mb-4"></div>
            <h3 class="text-xl font-semibold text-white mb-3">Role Management</h3>
            <p class="text-gray-400">Dua role user: Admin dan User dengan hak akses berbeda sesuai kebutuhan.</p>
        </div>
        <div class="bg-gray-800 rounded-xl p-6 border border-gray-700 hover:border-red-600 transition duration-300 hover-scale">
            <div class="text-red-400 text-4xl mb-4"></div>
            <h3 class="text-xl font-semibold text-white mb-3">CRUD Operations</h3>
            <p class="text-gray-400">Create, Read, Update, Delete untuk manajemen data inventaris yang lengkap.</p>
        </div>
        <div class="bg-gray-800 rounded-xl p-6 border border-gray-700 hover:border-red-600 transition duration-300 hover-scale">
            <div class="text-red-400 text-4xl mb-4"></div>
            <h3 class="text-xl font-semibold text-white mb-3">Validasi Data</h3>
            <p class="text-gray-400">Validasi input data untuk field kosong dan data unique untuk keamanan sistem.</p>
        </div>
    </div>
</section>

<!-- Statistics Section -->
<section class="bg-gray-800 rounded-2xl p-8 mb-16">
    <div class="grid grid-cols-2 md:grid-cols-4 gap-8">
        <div class="text-center">
            <div class="text-4xl font-bold text-red-400 mb-2">10+</div>
            <div class="text-gray-400">Jenis Barang</div>
        </div>
        <div class="text-center">
            <div class="text-4xl font-bold text-red-400 mb-2">2</div>
            <div class="text-gray-400">Role User</div>
        </div>
        <div class="text-center">
            <div class="text-4xl font-bold text-red-400 mb-2">4</div>
            <div class="text-gray-400">Status Peminjaman</div>
        </div>
        <div class="text-center">
            <div class="text-4xl font-bold text-red-400 mb-2">100%</div>
            <div class="text-gray-400">Responsive Design</div>
        </div>
    </div>
</section>

<?= $this->include('templates/footer') ?>
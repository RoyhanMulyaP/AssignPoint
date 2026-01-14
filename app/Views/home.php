<?= $this->include('templates/header') ?>

<!-- Hero Section -->
<section class="relative overflow-hidden gradient-bg rounded-2xl shadow-2xl mb-16">
    <div class="absolute inset-0 bg-gradient-to-r from-black/70 via-black/50 to-red-900/40"></div>
    <div class="container mx-auto px-4 py-20 md:py-28 relative z-10">
        <div class="max-w-4xl mx-auto text-center">
            <div class="inline-flex items-center justify-center mb-6">
                <div class="w-10 h-10 bg-red-600 rounded-lg flex items-center justify-center">
                    <span class="font-bold text-white text-xl">AP</span>
                </div>
            </div>

            <h1 class="text-4xl md:text-6xl font-bold text-white mb-6 leading-tight">
                Solusi Terpadu untuk
                <span class="text-transparent bg-clip-text bg-gradient-to-r from-red-400 via-red-500 to-red-600">
                    Manajemen Inventaris
                </span>
            </h1>

            <p class="text-xl md:text-2xl text-gray-300 mb-8 leading-relaxed max-w-3xl mx-auto">
                Transformasi digital pengelolaan aset sekolah dan kantor dengan sistem yang modern, aman, dan mudah digunakan.
                Optimalkan efisiensi dengan teknologi terkini.
            </p>

            <div class="flex flex-col sm:flex-row justify-center gap-4 mb-12">
                <?php if (!session()->get('isLoggedIn')): ?>
                    <a href="<?= base_url('auth/register') ?>"
                        class="bg-gradient-to-r from-red-600 to-red-700 text-white px-8 py-4 rounded-xl font-bold text-lg shadow-lg hover:shadow-xl transform hover:-translate-y-0.5 transition-transform duration-200">
                        <i class="fas fa-rocket mr-2"></i>
                        Mulai Gratis
                    </a>
                    <a href="<?= base_url('auth/login') ?>"
                        class="border-2 border-red-600 text-red-400 hover:bg-red-600 hover:text-white px-8 py-4 rounded-xl font-bold text-lg shadow hover:shadow-lg transform hover:-translate-y-0.5 transition-transform duration-200">
                        <i class="fas fa-sign-in-alt mr-2"></i>
                        Masuk ke Akun
                    </a>
                <?php else: ?>
                    <?php if (session()->get('role') == 'admin'): ?>
                        <a href="<?= base_url('admin/dashboard') ?>"
                            class="bg-gradient-to-r from-red-600 to-red-700 text-white px-8 py-4 rounded-xl font-bold text-lg shadow-lg hover:shadow-xl transform hover:-translate-y-0.5 transition-transform duration-200">
                            <i class="fas fa-tachometer-alt mr-2"></i>
                            Dashboard Admin
                        </a>
                    <?php else: ?>
                        <a href="<?= base_url('user/dashboard') ?>"
                            class="bg-gradient-to-r from-red-600 to-red-700 text-white px-8 py-4 rounded-xl font-bold text-lg shadow-lg hover:shadow-xl transform hover:-translate-y-0.5 transition-transform duration-200">
                            <i class="fas fa-tachometer-alt mr-2"></i>
                            Dashboard User
                        </a>
                    <?php endif; ?>
                <?php endif; ?>
            </div>

            <div class="flex flex-wrap justify-center gap-4">
                <div class="px-4 py-2 bg-red-900/20 rounded-full border border-red-700">
                    <span class="text-red-300 font-semibold flex items-center">
                        <i class="fas fa-shield-alt mr-2"></i> Aman & Terpercaya
                    </span>
                </div>
                <div class="px-4 py-2 bg-red-900/20 rounded-full border border-red-700">
                    <span class="text-red-300 font-semibold flex items-center">
                        <i class="fas fa-bolt mr-2"></i> Real-time Updates
                    </span>
                </div>
                <div class="px-4 py-2 bg-red-900/20 rounded-full border border-red-700">
                    <span class="text-red-300 font-semibold flex items-center">
                        <i class="fas fa-mobile-alt mr-2"></i> Responsif
                    </span>
                </div>
                <div class="px-4 py-2 bg-red-900/20 rounded-full border border-red-700">
                    <span class="text-red-300 font-semibold flex items-center">
                        <i class="fas fa-user-friends mr-2"></i> Multi-user
                    </span>
                </div>
            </div>
        </div>
    </div>

    <!-- Animated Background Elements -->
    <div class="absolute top-0 left-0 w-72 h-72 bg-red-900 rounded-full mix-blend-multiply filter blur-3xl opacity-20 animate-blob"></div>
    <div class="absolute top-0 right-0 w-72 h-72 bg-red-600 rounded-full mix-blend-multiply filter blur-3xl opacity-20 animate-blob animation-delay-2000"></div>
    <div class="absolute -bottom-8 left-1/2 w-72 h-72 bg-red-800 rounded-full mix-blend-multiply filter blur-3xl opacity-20 animate-blob animation-delay-4000"></div>
</section>

<!-- Overview Section -->
<section class="mb-20">
    <div class="text-center mb-12">
        <h2 class="text-3xl md:text-4xl font-bold text-white mb-4">Apa Itu Assign Point?</h2>
        <p class="text-xl text-gray-400 max-w-4xl mx-auto">
            Assign Point adalah platform manajemen inventaris berbasis web yang dirancang khusus untuk institusi pendidikan dan bisnis.
            Sistem ini memudahkan pengelolaan aset, peminjaman, dan pelacakan barang dengan teknologi terkini.
        </p>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center mb-16">
        <div>
            <h3 class="text-2xl font-bold text-white mb-6">Transformasi Digital Pengelolaan Aset</h3>
            <p class="text-gray-300 mb-6 leading-relaxed">
                Di era digital ini, pengelolaan inventaris manual sudah tidak efektif lagi. <span class="text-red-400 font-semibold">Assign Point</span> hadir sebagai solusi
                yang mengubah cara institusi mengelola aset mereka dari sistem konvensional ke digital dengan berbagai keunggulan.
            </p>
            <ul class="space-y-4">
                <li class="flex items-start">
                    <i class="fas fa-check-circle text-green-400 mt-1 mr-3"></i>
                    <span class="text-gray-300">Eliminasi kesalahan manusia dengan sistem terkomputerisasi</span>
                </li>
                <li class="flex items-start">
                    <i class="fas fa-check-circle text-green-400 mt-1 mr-3"></i>
                    <span class="text-gray-300">Akses data real-time dari mana saja dan kapan saja</span>
                </li>
                <li class="flex items-start">
                    <i class="fas fa-check-circle text-green-400 mt-1 mr-3"></i>
                    <span class="text-gray-300">Pelacakan historis aset yang komprehensif</span>
                </li>
                <li class="flex items-start">
                    <i class="fas fa-check-circle text-green-400 mt-1 mr-3"></i>
                    <span class="text-gray-300">Penghematan waktu dan biaya operasional</span>
                </li>
            </ul>
        </div>
        <div class="flex justify-center">
            <div class="relative">
                <div class="w-80 h-80 bg-gradient-to-br from-red-900/20 to-red-600/20 rounded-3xl border border-red-700/30 p-8 shadow-2xl backdrop-blur-sm">
                    <div class="text-center">
                        <div class="w-24 h-24 mx-auto mb-6 bg-gradient-to-br from-red-600 to-red-800 rounded-2xl flex items-center justify-center">
                            <i class="fas fa-chart-line text-white text-4xl"></i>
                        </div>
                        <h4 class="text-xl font-bold text-white mb-3">Efisiensi Meningkat 60%</h4>
                        <p class="text-gray-300">Pengguna melaporkan peningkatan efisiensi yang signifikan</p>
                    </div>
                </div>
                <div class="absolute -top-6 -right-6 w-32 h-32 bg-red-900/20 rounded-2xl border border-red-700/30 p-4 backdrop-blur-sm">
                    <div class="text-center">
                        <div class="text-3xl font-bold text-red-400">500+</div>
                        <div class="text-sm text-gray-300">Pengguna Aktif</div>
                    </div>
                </div>
                <div class="absolute -bottom-6 -left-6 w-32 h-32 bg-red-900/20 rounded-2xl border border-red-700/30 p-4 backdrop-blur-sm">
                    <div class="text-center">
                        <div class="text-3xl font-bold text-red-400">99.8%</div>
                        <div class="text-sm text-gray-300">Uptime Sistem</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Features Showcase -->
<section class="mb-20">
    <div class="text-center mb-12">
        <h2 class="text-3xl md:text-4xl font-bold text-white mb-4">Fitur Utama Sistem</h2>
        <p class="text-xl text-gray-400 max-w-3xl mx-auto">
            Kami menghadirkan fitur-fitur canggih yang dirancang untuk memenuhi kebutuhan manajemen inventaris modern.
        </p>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8 mb-16">
        <!-- Feature 1 -->
        <div class="group bg-gray-800/70 rounded-2xl p-8 border border-gray-700 hover:border-red-600 transition-all duration-500 hover-lift">
            <div class="inline-flex items-center justify-center w-16 h-16 rounded-2xl bg-gradient-to-br from-red-600 to-red-800 mb-6 group-hover:scale-110 transition-transform duration-300">
                <i class="fas fa-user-shield text-white text-2xl"></i>
            </div>
            <h3 class="text-2xl font-bold text-white mb-4">Role-Based Access Control</h3>
            <p class="text-gray-400 mb-6 leading-relaxed">
                Sistem dual role (Admin & User) dengan kontrol akses granular. Admin memiliki hak penuh untuk mengelola sistem,
                sedangkan User hanya dapat mengakses fitur peminjaman sesuai kebutuhan.
            </p>
            <ul class="space-y-3">
                <li class="flex items-center text-gray-300">
                    <i class="fas fa-check text-red-500 mr-3 text-sm"></i>
                    Kontrol akses berdasarkan peran
                </li>
                <li class="flex items-center text-gray-300">
                    <i class="fas fa-check text-red-500 mr-3 text-sm"></i>
                    Hak istimewa admin yang lengkap
                </li>
                <li class="flex items-center text-gray-300">
                    <i class="fas fa-check text-red-500 mr-3 text-sm"></i>
                    Interface yang sesuai dengan peran
                </li>
            </ul>
        </div>

        <!-- Feature 2 -->
        <div class="group bg-gray-800/70 rounded-2xl p-8 border border-gray-700 hover:border-red-600 transition-all duration-500 hover-lift">
            <div class="inline-flex items-center justify-center w-16 h-16 rounded-2xl bg-gradient-to-br from-blue-600 to-blue-800 mb-6 group-hover:scale-110 transition-transform duration-300">
                <i class="fas fa-boxes text-white text-2xl"></i>
            </div>
            <h3 class="text-2xl font-bold text-white mb-4">Manajemen Inventaris Lengkap</h3>
            <p class="text-gray-400 mb-6 leading-relaxed">
                Sistem CRUD (Create, Read, Update, Delete) yang komprehensif untuk mengelola semua aset inventaris.
                Dukung kategori, lokasi, status, dan atribut kustom untuk setiap item.
            </p>
            <ul class="space-y-3">
                <li class="flex items-center text-gray-300">
                    <i class="fas fa-check text-blue-500 mr-3 text-sm"></i>
                    Manajemen data barang terpusat
                </li>
                <li class="flex items-center text-gray-300">
                    <i class="fas fa-check text-blue-500 mr-3 text-sm"></i>
                    Klasifikasi berdasarkan kategori
                </li>
                <li class="flex items-center text-gray-300">
                    <i class="fas fa-check text-blue-500 mr-3 text-sm"></i>
                    Pelacakan kondisi dan lokasi
                </li>
            </ul>
        </div>

        <!-- Feature 3 -->
        <div class="group bg-gray-800/70 rounded-2xl p-8 border border-gray-700 hover:border-red-600 transition-all duration-500 hover-lift">
            <div class="inline-flex items-center justify-center w-16 h-16 rounded-2xl bg-gradient-to-br from-green-600 to-green-800 mb-6 group-hover:scale-110 transition-transform duration-300">
                <i class="fas fa-exchange-alt text-white text-2xl"></i>
            </div>
            <h3 class="text-2xl font-bold text-white mb-4">Sistem Peminjaman Terintegrasi</h3>
            <p class="text-gray-400 mb-6 leading-relaxed">
                Proses peminjaman yang efisien mulai dari permintaan, persetujuan, hingga pengembalian.
                Sistem notifikasi dan pengingat memastikan alur kerja yang lancar.
            </p>
            <ul class="space-y-3">
                <li class="flex items-center text-gray-300">
                    <i class="fas fa-check text-green-500 mr-3 text-sm"></i>
                    Status peminjaman real-time
                </li>
                <li class="flex items-center text-gray-300">
                    <i class="fas fa-check text-green-500 mr-3 text-sm"></i>
                    Notifikasi otomatis
                </li>
                <li class="flex items-center text-gray-300">
                    <i class="fas fa-check text-green-500 mr-3 text-sm"></i>
                    Riwayat peminjaman lengkap
                </li>
            </ul>
        </div>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
        <!-- Feature 4 -->
        <div class="group bg-gray-800/70 rounded-2xl p-8 border border-gray-700 hover:border-red-600 transition-all duration-500 hover-lift">
            <div class="inline-flex items-center justify-center w-16 h-16 rounded-2xl bg-gradient-to-br from-purple-600 to-purple-800 mb-6 group-hover:scale-110 transition-transform duration-300">
                <i class="fas fa-shield-alt text-white text-2xl"></i>
            </div>
            <h3 class="text-2xl font-bold text-white mb-4">Keamanan dan Validasi Data</h3>
            <p class="text-gray-400 mb-6 leading-relaxed">
                Lapisan keamanan berlapis dengan validasi input yang ketat. Proteksi terhadap SQL injection, XSS,
                dan ancaman keamanan web lainnya.
            </p>
            <ul class="space-y-3">
                <li class="flex items-center text-gray-300">
                    <i class="fas fa-check text-purple-500 mr-3 text-sm"></i>
                    Validasi field wajib dan unik
                </li>
                <li class="flex items-center text-gray-300">
                    <i class="fas fa-check text-purple-500 mr-3 text-sm"></i>
                    Enkripsi data sensitif
                </li>
                <li class="flex items-center text-gray-300">
                    <i class="fas fa-check text-purple-500 mr-3 text-sm"></i>
                    Protection terhadap serangan umum
                </li>
            </ul>
        </div>

        <!-- Feature 5 -->
        <div class="group bg-gray-800/70 rounded-2xl p-8 border border-gray-700 hover:border-red-600 transition-all duration-500 hover-lift">
            <div class="inline-flex items-center justify-center w-16 h-16 rounded-2xl bg-gradient-to-br from-yellow-600 to-yellow-800 mb-6 group-hover:scale-110 transition-transform duration-300">
                <i class="fas fa-chart-bar text-white text-2xl"></i>
            </div>
            <h3 class="text-2xl font-bold text-white mb-4">Analitik dan Pelaporan</h3>
            <p class="text-gray-400 mb-6 leading-relaxed">
                Dashboard analitik dengan visualisasi data yang informatif. Laporan yang dapat diekspor untuk
                analisis lebih lanjut dan pengambilan keputusan.
            </p>
            <ul class="space-y-3">
                <li class="flex items-center text-gray-300">
                    <i class="fas fa-check text-yellow-500 mr-3 text-sm"></i>
                    Dashboard statistik real-time
                </li>
                <li class="flex items-center text-gray-300">
                    <i class="fas fa-check text-yellow-500 mr-3 text-sm"></i>
                    Laporan PDF & Excel
                </li>
                <li class="flex items-center text-gray-300">
                    <i class="fas fa-check text-yellow-500 mr-3 text-sm"></i>
                    Trend analysis dan forecasting
                </li>
            </ul>
        </div>

        <!-- Feature 6 -->
        <div class="group bg-gray-800/70 rounded-2xl p-8 border border-gray-700 hover:border-red-600 transition-all duration-500 hover-lift">
            <div class="inline-flex items-center justify-center w-16 h-16 rounded-2xl bg-gradient-to-br from-pink-600 to-pink-800 mb-6 group-hover:scale-110 transition-transform duration-300">
                <i class="fas fa-mobile-alt text-white text-2xl"></i>
            </div>
            <h3 class="text-2xl font-bold text-white mb-4">Desain Responsif dan Modern</h3>
            <p class="text-gray-400 mb-6 leading-relaxed">
                Interface yang elegan dengan tema Hitam-Merah yang modern dan responsif.
                Akses optimal dari desktop, tablet, maupun smartphone.
            </p>
            <ul class="space-y-3">
                <li class="flex items-center text-gray-300">
                    <i class="fas fa-check text-pink-500 mr-3 text-sm"></i>
                    Mobile-first design
                </li>
                <li class="flex items-center text-gray-300">
                    <i class="fas fa-check text-pink-500 mr-3 text-sm"></i>
                    Tema Dark Mode elegan
                </li>
                <li class="flex items-center text-gray-300">
                    <i class="fas fa-check text-pink-500 mr-3 text-sm"></i>
                    Animasi dan transisi smooth
                </li>
            </ul>
        </div>
    </div>
</section>

<!-- Benefits Section -->
<section class="mb-20">
    <div class="text-center mb-12">
        <h2 class="text-3xl md:text-4xl font-bold text-white mb-4">Manfaat Menggunakan Assign Point</h2>
        <p class="text-xl text-gray-400 max-w-3xl mx-auto">
            Transformasikan cara Anda mengelola inventaris dengan manfaat nyata yang dirasakan langsung oleh pengguna.
        </p>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-2 gap-12">
        <!-- Benefits for Schools -->
        <div class="bg-gray-800/50 rounded-2xl p-8 border border-gray-700">
            <div class="flex items-center mb-6">
                <div class="w-12 h-12 rounded-xl bg-gradient-to-br from-red-600 to-red-800 flex items-center justify-center mr-4">
                    <i class="fas fa-school text-white"></i>
                </div>
                <h3 class="text-2xl font-bold text-white">Untuk Institusi Pendidikan</h3>
            </div>
            <div class="space-y-4">
                <div class="flex items-start p-4 bg-gray-900/30 rounded-xl">
                    <i class="fas fa-check text-green-400 mt-1 mr-3"></i>
                    <div>
                        <h4 class="font-semibold text-white mb-1">Manajemen Lab dan Perpustakaan</h4>
                        <p class="text-gray-400 text-sm">Kelola alat lab, buku perpustakaan, dan peralatan multimedia dengan sistematis</p>
                    </div>
                </div>
                <div class="flex items-start p-4 bg-gray-900/30 rounded-xl">
                    <i class="fas fa-check text-green-400 mt-1 mr-3"></i>
                    <div>
                        <h4 class="font-semibold text-white mb-1">Transparansi Penggunaan Dana</h4>
                        <p class="text-gray-400 text-sm">Pelacakan aset yang akurat untuk pertanggungjawaban keuangan</p>
                    </div>
                </div>
                <div class="flex items-start p-4 bg-gray-900/30 rounded-xl">
                    <i class="fas fa-check text-green-400 mt-1 mr-3"></i>
                    <div>
                        <h4 class="font-semibold text-white mb-1">Optimalisasi Waktu Guru & Staff</h4>
                        <p class="text-gray-400 text-sm">Mengurangi waktu administrasi untuk fokus pada pendidikan</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Benefits for Businesses -->
        <div class="bg-gray-800/50 rounded-2xl p-8 border border-gray-700">
            <div class="flex items-center mb-6">
                <div class="w-12 h-12 rounded-xl bg-gradient-to-br from-blue-600 to-blue-800 flex items-center justify-center mr-4">
                    <i class="fas fa-building text-white"></i>
                </div>
                <h3 class="text-2xl font-bold text-white">Untuk Perusahaan & Kantor</h3>
            </div>
            <div class="space-y-4">
                <div class="flex items-start p-4 bg-gray-900/30 rounded-xl">
                    <i class="fas fa-check text-blue-400 mt-1 mr-3"></i>
                    <div>
                        <h4 class="font-semibold text-white mb-1">Efisiensi Operasional</h4>
                        <p class="text-gray-400 text-sm">Pengurangan biaya operasional dan peningkatan produktivitas</p>
                    </div>
                </div>
                <div class="flex items-start p-4 bg-gray-900/30 rounded-xl">
                    <i class="fas fa-check text-blue-400 mt-1 mr-3"></i>
                    <div>
                        <h4 class="font-semibold text-white mb-1">Asset Tracking yang Akurat</h4>
                        <p class="text-gray-400 text-sm">Pelacakan real-time untuk semua aset perusahaan</p>
                    </div>
                </div>
                <div class="flex items-start p-4 bg-gray-900/30 rounded-xl">
                    <i class="fas fa-check text-blue-400 mt-1 mr-3"></i>
                    <div>
                        <h4 class="font-semibold text-white mb-1">Compliance & Audit</h4>
                        <p class="text-gray-400 text-sm">Dokumentasi lengkap untuk kepatuhan dan audit internal</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Statistics Dashboard -->
<section class="mb-20">
    <div class="bg-gradient-to-r from-gray-900 to-gray-800 rounded-2xl p-8 md:p-12 border border-gray-700">
        <div class="text-center mb-12">
            <h2 class="text-3xl md:text-4xl font-bold text-white mb-4">Dalam Angka</h2>
            <p class="text-xl text-gray-400 max-w-3xl mx-auto">
                Bukti nyata dari kepercayaan ratusan institusi terhadap sistem kami.
            </p>
        </div>

        <div class="grid grid-cols-2 md:grid-cols-4 gap-8">
            <div class="text-center p-6">
                <div class="text-4xl md:text-5xl font-bold text-red-400 mb-3" id="stat-users">500+</div>
                <div class="text-gray-400 text-lg">Pengguna Aktif</div>
                <p class="text-gray-500 text-sm mt-2">Dari berbagai institusi</p>
            </div>
            <div class="text-center p-6">
                <div class="text-4xl md:text-5xl font-bold text-red-400 mb-3" id="stat-items">1.2K+</div>
                <div class="text-gray-400 text-lg">Barang Terkelola</div>
                <p class="text-gray-500 text-sm mt-2">Dalam sistem aktif</p>
            </div>
            <div class="text-center p-6">
                <div class="text-4xl md:text-5xl font-bold text-red-400 mb-3" id="stat-loans">2.5K+</div>
                <div class="text-gray-400 text-lg">Transaksi Peminjaman</div>
                <p class="text-gray-500 text-sm mt-2">Berhasil diproses</p>
            </div>
            <div class="text-center p-6">
                <div class="text-4xl md:text-5xl font-bold text-red-400 mb-3" id="stat-uptime">99.9%</div>
                <div class="text-gray-400 text-lg">Uptime Sistem</div>
                <p class="text-gray-500 text-sm mt-2">Tersedia setiap saat</p>
            </div>
        </div>

        <div class="mt-12 pt-8 border-t border-gray-700">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <div class="text-center">
                    <div class="text-2xl font-bold text-green-400 mb-2">96%</div>
                    <div class="text-gray-400">Kepuasan Pengguna</div>
                </div>
                <div class="text-center">
                    <div class="text-2xl font-bold text-yellow-400 mb-2">60%</div>
                    <div class="text-gray-400">Peningkatan Efisiensi</div>
                </div>
                <div class="text-center">
                    <div class="text-2xl font-bold text-blue-400 mb-2">45%</div>
                    <div class="text-gray-400">Pengurangan Biaya</div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Technology Stack -->
<section class="mb-20">
    <div class="text-center mb-12">
        <h2 class="text-3xl md:text-4xl font-bold text-white mb-4">Teknologi yang Mendukung</h2>
        <p class="text-xl text-gray-400 max-w-3xl mx-auto">
            Dibangun dengan teknologi modern terbaik untuk performa, keamanan, dan skalabilitas.
        </p>
    </div>

    <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-6 gap-6">
        <!-- Tech 1 -->
        <div class="group bg-gray-800/70 rounded-xl p-6 border border-gray-700 hover:border-red-600 transition-all duration-300 hover-lift">
            <div class="w-16 h-16 mx-auto mb-4 rounded-xl bg-gradient-to-br from-red-900 to-red-700 flex items-center justify-center group-hover:scale-110 transition-transform duration-300">
                <span class="text-white font-bold text-xl">CI4</span>
            </div>
            <h4 class="text-lg font-semibold text-white text-center">CodeIgniter 4</h4>
            <p class="text-gray-400 text-sm text-center mt-1">PHP Framework</p>
            <p class="text-gray-500 text-xs text-center mt-2">Rapid Development</p>
        </div>

        <!-- Tech 2 -->
        <div class="group bg-gray-800/70 rounded-xl p-6 border border-gray-700 hover:border-red-600 transition-all duration-300 hover-lift">
            <div class="w-16 h-16 mx-auto mb-4 rounded-xl bg-gradient-to-br from-blue-900 to-blue-700 flex items-center justify-center group-hover:scale-110 transition-transform duration-300">
                <span class="text-white font-bold text-xl">TW</span>
            </div>
            <h4 class="text-lg font-semibold text-white text-center">Tailwind CSS</h4>
            <p class="text-gray-400 text-sm text-center mt-1">CSS Framework</p>
            <p class="text-gray-500 text-xs text-center mt-2">Utility-first</p>
        </div>

        <!-- Tech 3 -->
        <div class="group bg-gray-800/70 rounded-xl p-6 border border-gray-700 hover:border-red-600 transition-all duration-300 hover-lift">
            <div class="w-16 h-16 mx-auto mb-4 rounded-xl bg-gradient-to-br from-yellow-900 to-yellow-700 flex items-center justify-center group-hover:scale-110 transition-transform duration-300">
                <i class="fab fa-js text-white text-2xl"></i>
            </div>
            <h4 class="text-lg font-semibold text-white text-center">JavaScript</h4>
            <p class="text-gray-400 text-sm text-center mt-1">Client-side</p>
            <p class="text-gray-500 text-xs text-center mt-2">Interactive UI</p>
        </div>

        <!-- Tech 4 -->
        <div class="group bg-gray-800/70 rounded-xl p-6 border border-gray-700 hover:border-red-600 transition-all duration-300 hover-lift">
            <div class="w-16 h-16 mx-auto mb-4 rounded-xl bg-gradient-to-br from-green-900 to-green-700 flex items-center justify-center group-hover:scale-110 transition-transform duration-300">
                <i class="fas fa-database text-white text-2xl"></i>
            </div>
            <h4 class="text-lg font-semibold text-white text-center">MySQL</h4>
            <p class="text-gray-400 text-sm text-center mt-1">Database</p>
            <p class="text-gray-500 text-xs text-center mt-2">Relational DB</p>
        </div>

        <!-- Tech 5 -->
        <div class="group bg-gray-800/70 rounded-xl p-6 border border-gray-700 hover:border-red-600 transition-all duration-300 hover-lift">
            <div class="w-16 h-16 mx-auto mb-4 rounded-xl bg-gradient-to-br from-purple-900 to-purple-700 flex items-center justify-center group-hover:scale-110 transition-transform duration-300">
                <span class="text-white font-bold text-xl">AJAX</span>
            </div>
            <h4 class="text-lg font-semibold text-white text-center">AJAX</h4>
            <p class="text-gray-400 text-sm text-center mt-1">Async Requests</p>
            <p class="text-gray-500 text-xs text-center mt-2">Real-time Updates</p>
        </div>

        <!-- Tech 6 -->
        <div class="group bg-gray-800/70 rounded-xl p-6 border border-gray-700 hover:border-red-600 transition-all duration-300 hover-lift">
            <div class="w-16 h-16 mx-auto mb-4 rounded-xl bg-gradient-to-br from-pink-900 to-pink-700 flex items-center justify-center group-hover:scale-110 transition-transform duration-300">
                <span class="text-white font-bold text-xl">API</span>
            </div>
            <h4 class="text-lg font-semibold text-white text-center">REST API</h4>
            <p class="text-gray-400 text-sm text-center mt-1">Web Services</p>
            <p class="text-gray-500 text-xs text-center mt-2">Integration Ready</p>
        </div>
    </div>
</section>

<!-- How It Works -->
<section class="mb-20">
    <div class="text-center mb-12">
        <h2 class="text-3xl md:text-4xl font-bold text-white mb-4">Bagaimana Cara Kerjanya?</h2>
        <p class="text-xl text-gray-400 max-w-3xl mx-auto">
            Hanya dalam 4 langkah sederhana, Anda dapat mulai mengelola inventaris dengan lebih efisien.
        </p>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-4 gap-8">
        <!-- Step 1 -->
        <div class="relative text-center">
            <div class="absolute -top-4 left-1/2 transform -translate-x-1/2">
                <div class="w-12 h-12 rounded-full bg-gradient-to-br from-red-600 to-red-800 flex items-center justify-center text-white text-xl font-bold shadow-lg">
                    1
                </div>
            </div>
            <div class="bg-gray-800/50 rounded-2xl p-8 pt-16 border border-gray-700 h-full">
                <div class="w-20 h-20 mx-auto mb-6 rounded-xl bg-red-900/30 flex items-center justify-center">
                    <i class="fas fa-user-plus text-red-400 text-3xl"></i>
                </div>
                <h3 class="text-xl font-semibold text-white mb-4">Registrasi Akun</h3>
                <p class="text-gray-400">Daftar sebagai Admin atau User sesuai kebutuhan institusi Anda</p>
            </div>
            <div class="absolute top-1/2 -right-4 transform translate-y-8 hidden md:block">
                <i class="fas fa-arrow-right text-3xl text-red-400"></i>
            </div>
        </div>

        <!-- Step 2 -->
        <div class="relative text-center">
            <div class="absolute -top-4 left-1/2 transform -translate-x-1/2">
                <div class="w-12 h-12 rounded-full bg-gradient-to-br from-red-600 to-red-800 flex items-center justify-center text-white text-xl font-bold shadow-lg">
                    2
                </div>
            </div>
            <div class="bg-gray-800/50 rounded-2xl p-8 pt-16 border border-gray-700 h-full">
                <div class="w-20 h-20 mx-auto mb-6 rounded-xl bg-red-900/30 flex items-center justify-center">
                    <i class="fas fa-box text-red-400 text-3xl"></i>
                </div>
                <h3 class="text-xl font-semibold text-white mb-4">Input Data Inventaris</h3>
                <p class="text-gray-400">Admin menginput data barang dengan detail lengkap ke dalam sistem</p>
            </div>
            <div class="absolute top-1/2 -right-4 transform translate-y-8 hidden md:block">
                <i class="fas fa-arrow-right text-3xl text-red-400"></i>
            </div>
        </div>

        <!-- Step 3 -->
        <div class="relative text-center">
            <div class="absolute -top-4 left-1/2 transform -translate-x-1/2">
                <div class="w-12 h-12 rounded-full bg-gradient-to-br from-red-600 to-red-800 flex items-center justify-center text-white text-xl font-bold shadow-lg">
                    3
                </div>
            </div>
            <div class="bg-gray-800/50 rounded-2xl p-8 pt-16 border border-gray-700 h-full">
                <div class="w-20 h-20 mx-auto mb-6 rounded-xl bg-red-900/30 flex items-center justify-center">
                    <i class="fas fa-exchange-alt text-red-400 text-3xl"></i>
                </div>
                <h3 class="text-xl font-semibold text-white mb-4">Proses Peminjaman</h3>
                <p class="text-gray-400">User mengajukan peminjaman, Admin menyetujui dan mencatat transaksi</p>
            </div>
            <div class="absolute top-1/2 -right-4 transform translate-y-8 hidden md:block">
                <i class="fas fa-arrow-right text-3xl text-red-400"></i>
            </div>
        </div>

        <!-- Step 4 -->
        <div class="text-center">
            <div class="absolute -top-4 left-1/2 transform -translate-x-1/2">
                <div class="w-12 h-12 rounded-full bg-gradient-to-br from-red-600 to-red-800 flex items-center justify-center text-white text-xl font-bold shadow-lg">
                    4
                </div>
            </div>
            <div class="bg-gray-800/50 rounded-2xl p-8 pt-16 border border-gray-700 h-full">
                <div class="w-20 h-20 mx-auto mb-6 rounded-xl bg-red-900/30 flex items-center justify-center">
                    <i class="fas fa-chart-line text-red-400 text-3xl"></i>
                </div>
                <h3 class="text-xl font-semibold text-white mb-4">Monitoring & Laporan</h3>
                <p class="text-gray-400">Pantau status real-time dan generate laporan untuk analisis</p>
            </div>
        </div>
    </div>
</section>

<!-- Testimonials -->
<section class="mb-20">
    <div class="text-center mb-12">
        <h2 class="text-3xl md:text-4xl font-bold text-white mb-4">Apa Kata Pengguna Kami?</h2>
        <p class="text-xl text-gray-400 max-w-3xl mx-auto">
            Pengalaman nyata dari institusi yang telah menggunakan Assign Point.
        </p>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
        <!-- Testimonial 1 -->
        <div class="bg-gray-800/50 rounded-2xl p-8 border border-gray-700">
            <div class="flex items-center mb-6">
                <div class="w-12 h-12 rounded-full bg-gradient-to-br from-red-600 to-red-800 flex items-center justify-center mr-4">
                    <span class="text-white font-bold">SM</span>
                </div>
                <div>
                    <h4 class="font-bold text-white">SMA Negeri 1 Jakarta</h4>
                    <p class="text-gray-400 text-sm">Sekolah Negeri</p>
                </div>
            </div>
            <p class="text-gray-300 mb-6 italic">
                "Assign Point benar-benar mengubah cara kami mengelola lab komputer. Proses peminjaman yang dulunya memakan waktu 30 menit, sekarang hanya 5 menit!"
            </p>
            <div class="flex text-yellow-400">
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
            </div>
        </div>

        <!-- Testimonial 2 -->
        <div class="bg-gray-800/50 rounded-2xl p-8 border border-gray-700">
            <div class="flex items-center mb-6">
                <div class="w-12 h-12 rounded-full bg-gradient-to-br from-blue-600 to-blue-800 flex items-center justify-center mr-4">
                    <span class="text-white font-bold">PT</span>
                </div>
                <div>
                    <h4 class="font-bold text-white">PT Teknologi Maju</h4>
                    <p class="text-gray-400 text-sm">Perusahaan IT</p>
                </div>
            </div>
            <p class="text-gray-300 mb-6 italic">
                "Sistem ini sangat membantu tim operasional kami. Pelacakan aset menjadi sangat akurat dan laporan inventaris otomatis menghemat banyak waktu."
            </p>
            <div class="flex text-yellow-400">
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star-half-alt"></i>
            </div>
        </div>

        <!-- Testimonial 3 -->
        <div class="bg-gray-800/50 rounded-2xl p-8 border border-gray-700">
            <div class="flex items-center mb-6">
                <div class="w-12 h-12 rounded-full bg-gradient-to-br from-green-600 to-green-800 flex items-center justify-center mr-4">
                    <span class="text-white font-bold">UN</span>
                </div>
                <div>
                    <h4 class="font-bold text-white">Universitas Negeri</h4>
                    <p class="text-gray-400 text-sm">Perguruan Tinggi</p>
                </div>
            </div>
            <p class="text-gray-300 mb-6 italic">
                "Dengan 5000+ item inventaris, sistem ini memudahkan manajemen aset kampus. Interface yang intuitif membuat staf dengan cepat beradaptasi."
            </p>
            <div class="flex text-yellow-400">
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
            </div>
        </div>
    </div>
</section>

<!-- CTA Section -->
<section class="mb-16">
    <div class="bg-gradient-to-r from-red-900/30 to-red-800/30 rounded-2xl p-12 border border-red-800/50 text-center relative overflow-hidden">
        <div class="absolute top-0 left-0 w-32 h-32 bg-red-900 rounded-full opacity-10 -translate-x-16 -translate-y-16"></div>
        <div class="absolute bottom-0 right-0 w-32 h-32 bg-red-600 rounded-full opacity-10 translate-x-16 translate-y-16"></div>

        <div class="relative z-10">
            <h2 class="text-3xl md:text-4xl font-bold text-white mb-6">
                Siap Mengoptimalkan Manajemen Inventaris Anda?
            </h2>
            <p class="text-xl text-gray-300 mb-8 max-w-2xl mx-auto">
                Bergabunglah dengan ratusan institusi yang telah meningkatkan efisiensi mereka dengan Assign Point.
            </p>
            <div class="flex flex-col sm:flex-row justify-center gap-4">
                <?php if (session()->get('isLoggedIn')): ?>
                    <?php if (session()->get('role') == 'admin'): ?>
                        <a href="<?= base_url('admin/dashboard') ?>"
                            class="bg-gradient-to-r from-red-600 to-red-700 hover:from-red-700 hover:to-red-800 text-white px-8 py-4 rounded-xl font-bold text-lg shadow-xl hover:shadow-2xl transform hover:-translate-y-1 transition-all duration-300">
                            Masuk Dashboard Admin
                        </a>
                    <?php else: ?>
                        <a href="<?= base_url('user/dashboard') ?>"
                            class="bg-gradient-to-r from-red-600 to-red-700 hover:from-red-700 hover:to-red-800 text-white px-8 py-4 rounded-xl font-bold text-lg shadow-xl hover:shadow-2xl transform hover:-translate-y-1 transition-all duration-300">
                            Masuk Dashboard User
                        </a>
                    <?php endif; ?>
                <?php else: ?>
                    <a href="<?= base_url('auth/register') ?>"
                        class="bg-gradient-to-r from-red-600 to-red-700 hover:from-red-700 hover:to-red-800 text-white px-8 py-4 rounded-xl font-bold text-lg shadow-xl hover:shadow-2xl transform hover:-translate-y-1 transition-all duration-300">
                        <i class="fas fa-rocket mr-2"></i>
                        Daftar Sekarang Gratis
                    </a>
                    <a href="<?= base_url('auth/login') ?>"
                        class="border-2 border-red-600 text-red-400 hover:bg-red-600 hover:text-white px-8 py-4 rounded-xl font-bold text-lg shadow-xl hover:shadow-2xl transform hover:-translate-y-1 transition-all duration-300">
                        <i class="fas fa-sign-in-alt mr-2"></i>
                        Login ke Akun
                    </a>
                <?php endif; ?>
            </div>
            <p class="text-gray-400 text-sm mt-6">
                Tidak memerlukan kartu kredit • Uji coba penuh fitur • Dukungan 24/7
            </p>
        </div>
    </div>
</section>

<!-- FAQ Section -->
<section class="mb-12">
    <div class="text-center mb-12">
        <h2 class="text-3xl md:text-4xl font-bold text-white mb-4">Pertanyaan yang Sering Diajukan</h2>
        <p class="text-xl text-gray-400 max-w-3xl mx-auto">
            Temukan jawaban untuk pertanyaan umum tentang Assign Point.
        </p>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
        <!-- FAQ Column 1 -->
        <div class="space-y-6">
            <div class="bg-gray-800/50 rounded-xl p-6 border border-gray-700 hover:border-red-600 transition-colors duration-300">
                <h3 class="text-xl font-semibold text-white mb-3">Apakah Assign Point gratis?</h3>
                <p class="text-gray-400">Ya, kami menawarkan versi gratis dengan fitur lengkap untuk institusi pendidikan. Untuk perusahaan, kami memiliki paket berbayar dengan fitur tambahan.</p>
            </div>

            <div class="bg-gray-800/50 rounded-xl p-6 border border-gray-700 hover:border-red-600 transition-colors duration-300">
                <h3 class="text-xl font-semibold text-white mb-3">Berapa lama waktu implementasi?</h3>
                <p class="text-gray-400">Rata-rata hanya 1-2 hari. Sistem kami dirancang untuk mudah diimplementasikan dengan dukungan penuh dari tim kami.</p>
            </div>

            <div class="bg-gray-800/50 rounded-xl p-6 border border-gray-700 hover:border-red-600 transition-colors duration-300">
                <h3 class="text-xl font-semibold text-white mb-3">Apakah data saya aman?</h3>
                <p class="text-gray-400">Sangat aman. Kami menggunakan enkripsi end-to-end, backup harian, dan server dengan keamanan tingkat enterprise.</p>
            </div>
        </div>

        <!-- FAQ Column 2 -->
        <div class="space-y-6">
            <div class="bg-gray-800/50 rounded-xl p-6 border border-gray-700 hover:border-red-600 transition-colors duration-300">
                <h3 class="text-xl font-semibold text-white mb-3">Apakah tersedia pelatihan?</h3>
                <p class="text-gray-400">Ya, kami menyediakan pelatihan online gratis, dokumentasi lengkap, dan dukungan langsung via chat dan email.</p>
            </div>

            <div class="bg-gray-800/50 rounded-xl p-6 border border-gray-700 hover:border-red-600 transition-colors duration-300">
                <h3 class="text-xl font-semibold text-white mb-3">Bisakah dikustomisasi?</h3>
                <p class="text-gray-400">Tentu. Sistem kami fleksibel dan dapat disesuaikan dengan kebutuhan spesifik institusi Anda.</p>
            </div>

            <div class="bg-gray-800/50 rounded-xl p-6 border border-gray-700 hover:border-red-600 transition-colors duration-300">
                <h3 class="text-xl font-semibold text-white mb-3">Apakah ada versi mobile?</h3>
                <p class="text-gray-400">Ya, sistem kami fully responsive dan dapat diakses optimal dari smartphone, tablet, maupun desktop.</p>
            </div>
        </div>
    </div>
</section>

<?= $this->include('templates/footer') ?>

<style>
    /* Animation for blob elements */
    @keyframes blob {
        0% {
            transform: translate(0px, 0px) scale(1);
        }

        33% {
            transform: translate(30px, -50px) scale(1.1);
        }

        66% {
            transform: translate(-20px, 20px) scale(0.9);
        }

        100% {
            transform: translate(0px, 0px) scale(1);
        }
    }

    .animate-blob {
        animation: blob 7s infinite;
    }

    .animation-delay-2000 {
        animation-delay: 2s;
    }

    .animation-delay-4000 {
        animation-delay: 4s;
    }

    /* Hover lift effect */
    .hover-lift {
        transition: transform 0.3s ease, box-shadow 0.3s ease;
    }

    .hover-lift:hover {
        transform: translateY(-8px);
        box-shadow: 0 20px 40px -15px rgba(239, 68, 68, 0.3);
    }

    /* Hover scale effect */
    .hover-scale {
        transition: transform 0.3s ease;
    }

    .hover-scale:hover {
        transform: translateY(-5px);
    }

    /* Glass effect */
    .glass-effect {
        backdrop-filter: blur(10px);
        background: rgba(255, 255, 255, 0.1);
    }

    /* Custom scrollbar */
    ::-webkit-scrollbar {
        width: 10px;
    }

    ::-webkit-scrollbar-track {
        background: #1f2937;
    }

    ::-webkit-scrollbar-thumb {
        background: #7f1d1d;
        border-radius: 5px;
    }

    ::-webkit-scrollbar-thumb:hover {
        background: #991b1b;
    }
</style>

<script>
    // Animated counter for statistics
    document.addEventListener('DOMContentLoaded', function() {
        const counters = document.querySelectorAll('[id^="stat-"]');

        counters.forEach(counter => {
            const target = parseInt(counter.textContent);
            let current = 0;
            const increment = target / 100;
            const timer = setInterval(() => {
                current += increment;
                if (current >= target) {
                    counter.textContent = target + (counter.id === 'stat-uptime' ? '%' : '+');
                    clearInterval(timer);
                } else {
                    counter.textContent = Math.floor(current) + (counter.id === 'stat-uptime' ? '%' : '+');
                }
            }, 20);
        });

        // Parallax effect for hero section
        window.addEventListener('scroll', function() {
            const scrolled = window.pageYOffset;
            const hero = document.querySelector('.gradient-bg');
            if (hero) {
                hero.style.transform = `translateY(${scrolled * 0.05}px)`;
            }
        });

        // Add intersection observer for animation on scroll
        const observerOptions = {
            threshold: 0.1,
            rootMargin: '0px 0px -50px 0px'
        };

        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.classList.add('animate-fade-in-up');
                }
            });
        }, observerOptions);

        // Observe all feature cards and sections
        document.querySelectorAll('.group, .bg-gray-800, section > div').forEach(el => {
            observer.observe(el);
        });
    });

    // Add fade in up animation
    const style = document.createElement('style');
    style.textContent = `
    @keyframes fadeInUp {
        from {
            opacity: 0;
            transform: translateY(30px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }
    
    .animate-fade-in-up {
        animation: fadeInUp 0.6s ease forwards;
    }
    `;
    document.head.appendChild(style);
</script>
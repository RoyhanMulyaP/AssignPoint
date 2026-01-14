<?= $this->include('templates/header') ?>

<main class="container mx-auto px-4 py-8">
    <!-- Hero Section -->
    <section class="relative overflow-hidden bg-gradient-to-r from-gray-900 via-gray-800 to-red-900 rounded-3xl shadow-2xl mb-16 p-8 md:p-12">
        <div class="absolute inset-0 bg-gradient-to-r from-black/50 to-red-900/30"></div>
        <div class="relative z-10">
            <div class="max-w-3xl">
                <h1 class="text-4xl md:text-5xl font-bold text-white mb-6 leading-tight">
                    Selamat Datang,
                    <span class="text-transparent bg-clip-text bg-gradient-to-r from-red-400 to-red-600">
                        <?= session()->get('nama') ?? 'Pengguna' ?>!
                    </span>
                </h1>
                <p class="text-xl text-gray-300 mb-8 leading-relaxed">
                    Akses sistem inventaris terpadu untuk meminjam dan mengelola peralatan dengan mudah.
                    Jelajahi katalog barang, ajukan peminjaman, dan pantau status Anda dalam satu platform.
                </p>
                <div class="flex flex-wrap gap-4">
                    <a href="<?= base_url('user/peminjaman') ?>" 
                       class="bg-gradient-to-r from-red-600 to-red-700 hover:from-red-700 hover:to-red-800 text-white px-6 py-3 rounded-xl font-bold text-lg shadow-xl hover:shadow-2xl transform hover:-translate-y-1 transition-all duration-300">
                        Ajukan Peminjaman
                    </a>
                    <a href="#inventory" 
                       class="border-2 border-red-600 text-red-400 hover:bg-red-600 hover:text-white px-6 py-3 rounded-xl font-bold text-lg shadow-xl hover:shadow-2xl transform hover:-translate-y-1 transition-all duration-300">
                        Lihat Inventaris
                    </a>
                </div>
            </div>
        </div>
        <!-- Animated Background Elements -->
        <div class="absolute top-0 left-0 w-64 h-64 bg-red-900 rounded-full mix-blend-multiply filter blur-3xl opacity-20 animate-blob"></div>
        <div class="absolute top-0 right-0 w-64 h-64 bg-red-600 rounded-full mix-blend-multiply filter blur-3xl opacity-20 animate-blob animation-delay-2000"></div>
        <div class="absolute -bottom-8 left-1/2 w-64 h-64 bg-red-800 rounded-full mix-blend-multiply filter blur-3xl opacity-20 animate-blob animation-delay-4000"></div>
    </section>

    <!-- Quick Stats -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-12">
        <div class="bg-gray-800 rounded-2xl p-6 border border-gray-700 hover:border-red-600 transition-all duration-300 hover-lift">
            <div class="flex justify-between items-start">
                <div>
                    <p class="text-gray-400 text-sm mb-1">Peminjaman Aktif</p>
                    <h3 class="text-3xl font-bold text-white">3</h3>
                    <p class="text-green-400 text-sm mt-2">
                        <i class="fas fa-check-circle mr-1"></i>
                        Semua berjalan lancar
                    </p>
                </div>
                <div class="w-14 h-14 rounded-xl bg-green-900/30 flex items-center justify-center">
                    <i class="fas fa-exchange-alt text-2xl text-green-400"></i>
                </div>
            </div>
        </div>
        
        <div class="bg-gray-800 rounded-2xl p-6 border border-gray-700 hover:border-red-600 transition-all duration-300 hover-lift">
            <div class="flex justify-between items-start">
                <div>
                    <p class="text-gray-400 text-sm mb-1">Total Peminjaman</p>
                    <h3 class="text-3xl font-bold text-white">47</h3>
                    <p class="text-blue-400 text-sm mt-2">
                        <i class="fas fa-history mr-1"></i>
                        Sejak Jan 2024
                    </p>
                </div>
                <div class="w-14 h-14 rounded-xl bg-blue-900/30 flex items-center justify-center">
                    <i class="fas fa-history text-2xl text-blue-400"></i>
                </div>
            </div>
        </div>
        
        <div class="bg-gray-800 rounded-2xl p-6 border border-gray-700 hover:border-red-600 transition-all duration-300 hover-lift">
            <div class="flex justify-between items-start">
                <div>
                    <p class="text-gray-400 text-sm mb-1">Barang Tersedia</p>
                    <h3 class="text-3xl font-bold text-white">824</h3>
                    <p class="text-yellow-400 text-sm mt-2">
                        <i class="fas fa-boxes mr-1"></i>
                        Di semua kategori
                    </p>
                </div>
                <div class="w-14 h-14 rounded-xl bg-yellow-900/30 flex items-center justify-center">
                    <i class="fas fa-boxes text-2xl text-yellow-400"></i>
                </div>
            </div>
        </div>
        
        <div class="bg-gray-800 rounded-2xl p-6 border border-gray-700 hover:border-red-600 transition-all duration-300 hover-lift">
            <div class="flex justify-between items-start">
                <div>
                    <p class="text-gray-400 text-sm mb-1">Rating Anda</p>
                    <h3 class="text-3xl font-bold text-white">4.8/5</h3>
                    <p class="text-red-400 text-sm mt-2">
                        <i class="fas fa-star mr-1"></i>
                        Pengguna terpercaya
                    </p>
                </div>
                <div class="w-14 h-14 rounded-xl bg-red-900/30 flex items-center justify-center">
                    <i class="fas fa-star text-2xl text-red-400"></i>
                </div>
            </div>
        </div>
    </div>

    <!-- My Active Loans -->
    <section class="mb-16">
        <div class="flex justify-between items-center mb-8">
            <h2 class="text-3xl font-bold text-white">Peminjaman Aktif Saya</h2>
            <a href="<?= base_url('user/peminjaman') ?>" class="text-red-400 hover:text-red-300 font-semibold">
                Lihat semua <i class="fas fa-arrow-right ml-2"></i>
            </a>
        </div>
        
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            <!-- Loan 1 -->
            <div class="bg-gray-800 rounded-2xl p-6 border border-gray-700 hover:border-red-600 transition-all duration-300 hover-lift">
                <div class="flex justify-between items-start mb-4">
                    <div>
                        <h3 class="font-bold text-white text-lg">Laptop Dell XPS 15</h3>
                        <p class="text-gray-400 text-sm">ID: LN-2024-0872</p>
                    </div>
                    <span class="px-3 py-1 bg-green-900/30 text-green-400 text-xs rounded-full">On Time</span>
                </div>
                <div class="space-y-3 mb-6">
                    <div class="flex justify-between">
                        <span class="text-gray-400">Tanggal Pinjam</span>
                        <span class="text-white font-medium">1 Des 2024</span>
                    </div>
                    <div class="flex justify-between">
                        <span class="text-gray-400">Jatuh Tempo</span>
                        <span class="text-white font-medium">15 Des 2024</span>
                    </div>
                    <div class="flex justify-between">
                        <span class="text-gray-400">Status</span>
                        <span class="text-green-400 font-medium">Dalam Penggunaan</span>
                    </div>
                </div>
                <div class="pt-4 border-t border-gray-700">
                    <button class="w-full py-2 bg-red-900/50 hover:bg-red-800 text-white text-sm font-medium rounded-xl transition-colors duration-200">
                        Perpanjang Peminjaman
                    </button>
                </div>
            </div>
            
            <!-- Loan 2 -->
            <div class="bg-gray-800 rounded-2xl p-6 border border-gray-700 hover:border-red-600 transition-all duration-300 hover-lift">
                <div class="flex justify-between items-start mb-4">
                    <div>
                        <h3 class="font-bold text-white text-lg">Proyektor Epson EB-X41</h3>
                        <p class="text-gray-400 text-sm">ID: LN-2024-0891</p>
                    </div>
                    <span class="px-3 py-1 bg-yellow-900/30 text-yellow-400 text-xs rounded-full">Due Soon</span>
                </div>
                <div class="space-y-3 mb-6">
                    <div class="flex justify-between">
                        <span class="text-gray-400">Tanggal Pinjam</span>
                        <span class="text-white font-medium">5 Des 2024</span>
                    </div>
                    <div class="flex justify-between">
                        <span class="text-gray-400">Jatuh Tempo</span>
                        <span class="text-yellow-400 font-medium">Besok</span>
                    </div>
                    <div class="flex justify-between">
                        <span class="text-gray-400">Status</span>
                        <span class="text-yellow-400 font-medium">Segera Kembalikan</span>
                    </div>
                </div>
                <div class="pt-4 border-t border-gray-700">
                    <button class="w-full py-2 bg-red-900/50 hover:bg-red-800 text-white text-sm font-medium rounded-xl transition-colors duration-200">
                        Kembalikan Barang
                    </button>
                </div>
            </div>
            
            <!-- Loan 3 -->
            <div class="bg-gray-800 rounded-2xl p-6 border border-gray-700 hover:border-red-600 transition-all duration-300 hover-lift">
                <div class="flex justify-between items-start mb-4">
                    <div>
                        <h3 class="font-bold text-white text-lg">Kamera Canon EOS R6</h3>
                        <p class="text-gray-400 text-sm">ID: LN-2024-0903</p>
                    </div>
                    <span class="px-3 py-1 bg-green-900/30 text-green-400 text-xs rounded-full">On Time</span>
                </div>
                <div class="space-y-3 mb-6">
                    <div class="flex justify-between">
                        <span class="text-gray-400">Tanggal Pinjam</span>
                        <span class="text-white font-medium">8 Des 2024</span>
                    </div>
                    <div class="flex justify-between">
                        <span class="text-gray-400">Jatuh Tempo</span>
                        <span class="text-white font-medium">22 Des 2024</span>
                    </div>
                    <div class="flex justify-between">
                        <span class="text-gray-400">Status</span>
                        <span class="text-green-400 font-medium">Dalam Penggunaan</span>
                    </div>
                </div>
                <div class="pt-4 border-t border-gray-700">
                    <button class="w-full py-2 bg-red-900/50 hover:bg-red-800 text-white text-sm font-medium rounded-xl transition-colors duration-200">
                        Lihat Detail
                    </button>
                </div>
            </div>
        </div>
    </section>

    <!-- Inventory Section -->
    <section id="inventory" class="mb-16">
        <div class="flex justify-between items-center mb-8">
            <h2 class="text-3xl font-bold text-white">Barang Populer</h2>
            <a href="#all-items" class="text-red-400 hover:text-red-300 font-semibold">
                Lihat semua <i class="fas fa-arrow-right ml-2"></i>
            </a>
        </div>
        
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
            <!-- Item 1 -->
            <div class="group bg-gray-800 rounded-2xl p-6 border border-gray-700 hover:border-red-600 transition-all duration-300 hover-lift">
                <div class="w-16 h-16 rounded-xl bg-gradient-to-br from-red-900 to-red-700 flex items-center justify-center mb-6 group-hover:scale-110 transition-transform duration-300 mx-auto">
                    <i class="fas fa-laptop text-white text-2xl"></i>
                </div>
                <h3 class="text-xl font-semibold text-white mb-3 text-center">Laptop MacBook Pro 14"</h3>
                <p class="text-gray-400 text-center mb-4">Apple • 16GB RAM • 512GB SSD</p>
                <div class="flex justify-center items-center mb-4">
                    <span class="px-3 py-1 bg-green-900/30 text-green-400 text-sm rounded-full">5 Tersedia</span>
                </div>
                <button class="w-full py-3 bg-red-900/50 hover:bg-red-800 text-white font-medium rounded-xl transition-colors duration-200">
                    Ajukan Peminjaman
                </button>
            </div>
            
            <!-- Item 2 -->
            <div class="group bg-gray-800 rounded-2xl p-6 border border-gray-700 hover:border-red-600 transition-all duration-300 hover-lift">
                <div class="w-16 h-16 rounded-xl bg-gradient-to-br from-blue-900 to-blue-700 flex items-center justify-center mb-6 group-hover:scale-110 transition-transform duration-300 mx-auto">
                    <i class="fas fa-video text-white text-2xl"></i>
                </div>
                <h3 class="text-xl font-semibold text-white mb-3 text-center">Kamera 4K Sony A7 III</h3>
                <p class="text-gray-400 text-center mb-4">Sony • Full Frame • 24.2MP</p>
                <div class="flex justify-center items-center mb-4">
                    <span class="px-3 py-1 bg-green-900/30 text-green-400 text-sm rounded-full">2 Tersedia</span>
                </div>
                <button class="w-full py-3 bg-red-900/50 hover:bg-red-800 text-white font-medium rounded-xl transition-colors duration-200">
                    Ajukan Peminjaman
                </button>
            </div>
            
            <!-- Item 3 -->
            <div class="group bg-gray-800 rounded-2xl p-6 border border-gray-700 hover:border-red-600 transition-all duration-300 hover-lift">
                <div class="w-16 h-16 rounded-xl bg-gradient-to-br from-purple-900 to-purple-700 flex items-center justify-center mb-6 group-hover:scale-110 transition-transform duration-300 mx-auto">
                    <i class="fas fa-tools text-white text-2xl"></i>
                </div>
                <h3 class="text-xl font-semibold text-white mb-3 text-center">Bor Set DeWalt 20V</h3>
                <p class="text-gray-400 text-center mb-4">DeWalt • Cordless • 2 Baterai</p>
                <div class="flex justify-center items-center mb-4">
                    <span class="px-3 py-1 bg-green-900/30 text-green-400 text-sm rounded-full">8 Tersedia</span>
                </div>
                <button class="w-full py-3 bg-red-900/50 hover:bg-red-800 text-white font-medium rounded-xl transition-colors duration-200">
                    Ajukan Peminjaman
                </button>
            </div>
            
            <!-- Item 4 -->
            <div class="group bg-gray-800 rounded-2xl p-6 border border-gray-700 hover:border-red-600 transition-all duration-300 hover-lift">
                <div class="w-16 h-16 rounded-xl bg-gradient-to-br from-yellow-900 to-yellow-700 flex items-center justify-center mb-6 group-hover:scale-110 transition-transform duration-300 mx-auto">
                    <i class="fas fa-tv text-white text-2xl"></i>
                </div>
                <h3 class="text-xl font-semibold text-white mb-3 text-center">TV LED 55" Samsung</h3>
                <p class="text-gray-400 text-center mb-4">Samsung • 4K UHD • Smart TV</p>
                <div class="flex justify-center items-center mb-4">
                    <span class="px-3 py-1 bg-green-900/30 text-green-400 text-sm rounded-full">3 Tersedia</span>
                </div>
                <button class="w-full py-3 bg-red-900/50 hover:bg-red-800 text-white font-medium rounded-xl transition-colors duration-200">
                    Ajukan Peminjaman
                </button>
            </div>
        </div>
    </section>

    <!-- Features Section -->
    <section class="mb-16">
        <div class="text-center mb-12">
            <h2 class="text-3xl font-bold text-white mb-4">Mengapa Memilih Assign Point?</h2>
            <p class="text-xl text-gray-400 max-w-3xl mx-auto">
                Sistem kami dirancang untuk memberikan pengalaman terbaik dalam pengelolaan inventaris.
            </p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
            <!-- Feature 1 -->
            <div class="group bg-gray-800 rounded-xl p-6 border border-gray-700 hover:border-red-600 transition-all duration-300 hover-lift">
                <div class="w-14 h-14 rounded-xl bg-gradient-to-br from-red-600 to-red-800 flex items-center justify-center mb-6 group-hover:scale-110 transition-transform duration-300">
                    <i class="fas fa-bolt text-white text-xl"></i>
                </div>
                <h3 class="text-xl font-semibold text-white mb-3">Proses Cepat</h3>
                <p class="text-gray-400">Ajukan peminjaman dalam hitungan menit dengan proses yang sederhana.</p>
            </div>

            <!-- Feature 2 -->
            <div class="group bg-gray-800 rounded-xl p-6 border border-gray-700 hover:border-red-600 transition-all duration-300 hover-lift">
                <div class="w-14 h-14 rounded-xl bg-gradient-to-br from-blue-600 to-blue-800 flex items-center justify-center mb-6 group-hover:scale-110 transition-transform duration-300">
                    <i class="fas fa-history text-white text-xl"></i>
                </div>
                <h3 class="text-xl font-semibold text-white mb-3">Pelacakan Real-time</h3>
                <p class="text-gray-400">Pantau status peminjaman Anda secara real-time dengan update instan.</p>
            </div>

            <!-- Feature 3 -->
            <div class="group bg-gray-800 rounded-xl p-6 border border-gray-700 hover:border-red-600 transition-all duration-300 hover-lift">
                <div class="w-14 h-14 rounded-xl bg-gradient-to-br from-green-600 to-green-800 flex items-center justify-center mb-6 group-hover:scale-110 transition-transform duration-300">
                    <i class="fas fa-bell text-white text-xl"></i>
                </div>
                <h3 class="text-xl font-semibold text-white mb-3">Notifikasi Pintar</h3>
                <p class="text-gray-400">Dapatkan pengingat jatuh tempo dan update status peminjaman Anda.</p>
            </div>

            <!-- Feature 4 -->
            <div class="group bg-gray-800 rounded-xl p-6 border border-gray-700 hover:border-red-600 transition-all duration-300 hover-lift">
                <div class="w-14 h-14 rounded-xl bg-gradient-to-br from-purple-600 to-purple-800 flex items-center justify-center mb-6 group-hover:scale-110 transition-transform duration-300">
                    <i class="fas fa-shield-alt text-white text-xl"></i>
                </div>
                <h3 class="text-xl font-semibold text-white mb-3">Keamanan Data</h3>
                <p class="text-gray-400">Data Anda terlindungi dengan enkripsi dan sistem keamanan berlapis.</p>
            </div>
        </div>
    </section>

    <!-- How It Works -->
    <section class="mb-16">
        <div class="text-center mb-12">
            <h2 class="text-3xl font-bold text-white mb-4">Cara Menggunakan</h2>
            <p class="text-xl text-gray-400 max-w-3xl mx-auto">
                Ikuti langkah-langkah sederhana ini untuk mulai meminjam peralatan.
            </p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-4 gap-8">
            <!-- Step 1 -->
            <div class="relative text-center">
                <div class="w-20 h-20 rounded-full bg-gradient-to-br from-red-600 to-red-800 flex items-center justify-center mx-auto mb-6 text-white text-2xl font-bold">
                    1
                </div>
                <h3 class="text-xl font-semibold text-white mb-3">Pilih Barang</h3>
                <p class="text-gray-400">Jelajahi katalog inventaris dan pilih barang yang ingin dipinjam.</p>
                <div class="absolute top-10 -right-4 hidden md:block">
                    <i class="fas fa-arrow-right text-2xl text-red-400"></i>
                </div>
            </div>

            <!-- Step 2 -->
            <div class="relative text-center">
                <div class="w-20 h-20 rounded-full bg-gradient-to-br from-red-600 to-red-800 flex items-center justify-center mx-auto mb-6 text-white text-2xl font-bold">
                    2
                </div>
                <h3 class="text-xl font-semibold text-white mb-3">Ajukan Permohonan</h3>
                <p class="text-gray-400">Isi formulir peminjaman dengan detail dan tanggal yang diinginkan.</p>
                <div class="absolute top-10 -right-4 hidden md:block">
                    <i class="fas fa-arrow-right text-2xl text-red-400"></i>
                </div>
            </div>

            <!-- Step 3 -->
            <div class="relative text-center">
                <div class="w-20 h-20 rounded-full bg-gradient-to-br from-red-600 to-red-800 flex items-center justify-center mx-auto mb-6 text-white text-2xl font-bold">
                    3
                </div>
                <h3 class="text-xl font-semibold text-white mb-3">Tunggu Persetujuan</h3>
                <p class="text-gray-400">Admin akan meninjau dan menyetujui permohonan Anda.</p>
                <div class="absolute top-10 -right-4 hidden md:block">
                    <i class="fas fa-arrow-right text-2xl text-red-400"></i>
                </div>
            </div>

            <!-- Step 4 -->
            <div class="text-center">
                <div class="w-20 h-20 rounded-full bg-gradient-to-br from-red-600 to-red-800 flex items-center justify-center mx-auto mb-6 text-white text-2xl font-bold">
                    4
                </div>
                <h3 class="text-xl font-semibold text-white mb-3">Ambil & Kembalikan</h3>
                <p class="text-gray-400">Ambil barang yang disetujui dan kembalikan tepat waktu.</p>
            </div>
        </div>
    </section>

    <!-- CTA Section -->
    <section class="mb-8">
        <div class="bg-gradient-to-r from-red-900/30 to-red-800/30 rounded-2xl p-12 border border-red-800/50 text-center">
            <h2 class="text-3xl md:text-4xl font-bold text-white mb-6">
                Siap Memulai Peminjaman?
            </h2>
            <p class="text-xl text-gray-300 mb-8 max-w-2xl mx-auto">
                Bergabung dengan pengguna lain yang telah mempercayakan pengelolaan inventaris mereka kepada Assign Point.
            </p>
            <div class="flex flex-col sm:flex-row justify-center gap-4">
                <a href="<?= base_url('user/peminjaman') ?>"
                    class="bg-gradient-to-r from-red-600 to-red-700 hover:from-red-700 hover:to-red-800 text-white px-8 py-4 rounded-xl font-bold text-lg shadow-xl hover:shadow-2xl transform hover:-translate-y-1 transition-all duration-300">
                    Ajukan Peminjaman Sekarang
                </a>
                <a href="#all-items"
                    class="border-2 border-red-600 text-red-400 hover:bg-red-600 hover:text-white px-8 py-4 rounded-xl font-bold text-lg shadow-xl hover:shadow-2xl transform hover:-translate-y-1 transition-all duration-300">
                    Lihat Semua Barang
                </a>
            </div>
        </div>
    </section>

    <!-- FAQ Section -->
    <section class="mb-16">
        <div class="text-center mb-12">
            <h2 class="text-3xl font-bold text-white mb-4">Pertanyaan yang Sering Diajukan</h2>
            <p class="text-xl text-gray-400 max-w-3xl mx-auto">
                Temukan jawaban untuk pertanyaan umum tentang sistem kami.
            </p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <!-- FAQ 1 -->
            <div class="bg-gray-800 rounded-2xl p-6 border border-gray-700 hover:border-red-600 transition-all duration-300">
                <h3 class="text-xl font-semibold text-white mb-3">Berapa lama waktu persetujuan peminjaman?</h3>
                <p class="text-gray-400">Biasanya dalam 1-2 jam kerja. Admin akan meninjau permohonan Anda secepat mungkin.</p>
            </div>

            <!-- FAQ 2 -->
            <div class="bg-gray-800 rounded-2xl p-6 border border-gray-700 hover:border-red-600 transition-all duration-300">
                <h3 class="text-xl font-semibold text-white mb-3">Bagaimana jika terlambat mengembalikan?</h3>
                <p class="text-gray-400">Anda dapat mengajukan perpanjangan. Jika terlambat tanpa pemberitahuan, akan ada denda sesuai kebijakan.</p>
            </div>

            <!-- FAQ 3 -->
            <div class="bg-gray-800 rounded-2xl p-6 border border-gray-700 hover:border-red-600 transition-all duration-300">
                <h3 class="text-xl font-semibold text-white mb-3">Apakah ada batas peminjaman?</h3>
                <p class="text-gray-400">Ya, maksimal 5 barang dalam waktu bersamaan. Durasi peminjaman maksimal 14 hari.</p>
            </div>

            <!-- FAQ 4 -->
            <div class="bg-gray-800 rounded-2xl p-6 border border-gray-700 hover:border-red-600 transition-all duration-300">
                <h3 class="text-xl font-semibold text-white mb-3">Bagaimana cara melapor kerusakan?</h3>
                <p class="text-gray-400">Segera hubungi admin melalui fitur "Lapor Kerusakan" di dashboard atau email ke support.</p>
            </div>
        </div>
    </section>
</main>

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

        // Observe all feature cards
        document.querySelectorAll('.group, .bg-gray-800').forEach(el => {
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
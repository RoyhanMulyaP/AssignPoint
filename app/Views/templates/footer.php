</main>

<!-- Footer -->
<?php if (session()->get('role') !== 'admin'): ?>
    <footer class="bg-gray-950 border-t border-gray-800 mt-12">
        <div class="container mx-auto px-4 py-12">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-12">
                <!-- Brand -->
                <div class="space-y-6">
                    <div class="flex items-center space-x-3">
                        <div class="relative w-10 h-10 bg-gray-900 rounded-lg flex items-center justify-center border border-gray-800">
                            <svg class="w-6 h-6 text-red-500" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"></path>
                            </svg>
                        </div>
                        <h2 class="text-xl font-black tracking-tighter text-white uppercase">ASSIGN<span class="text-red-600">POINT</span></h2>
                    </div>
                    <p class="text-gray-400 text-sm leading-relaxed">
                        Sistem manajemen inventaris cerdas yang dirancang untuk efisiensi dan keamanan aset institusi Anda.
                    </p>
                    <div class="flex space-x-4">
                        <a href="#" class="w-8 h-8 rounded-lg bg-gray-900 border border-gray-800 flex items-center justify-center text-gray-400 hover:text-red-500 hover:border-red-500 transition-all">
                            <i class="fab fa-facebook-f text-sm"></i>
                        </a>
                        <a href="#" class="w-8 h-8 rounded-lg bg-gray-900 border border-gray-800 flex items-center justify-center text-gray-400 hover:text-red-500 hover:border-red-500 transition-all">
                            <i class="fab fa-instagram text-sm"></i>
                        </a>
                        <a href="#" class="w-8 h-8 rounded-lg bg-gray-900 border border-gray-800 flex items-center justify-center text-gray-400 hover:text-red-500 hover:border-red-500 transition-all">
                            <i class="fab fa-twitter text-sm"></i>
                        </a>
                    </div>
                </div>

                <!-- Navigation -->
                <div>
                    <h3 class="text-white font-bold mb-6 uppercase tracking-widest text-xs">Navigasi</h3>
                    <ul class="space-y-3">
                        <li><a href="<?= base_url() ?>" class="text-gray-400 hover:text-red-500 text-sm transition-colors">Beranda</a></li>
                        <li><a href="<?= base_url('about') ?>" class="text-gray-400 hover:text-red-500 text-sm transition-colors">Tentang</a></li>
                        <li><a href="<?= base_url('auth/login') ?>" class="text-gray-400 hover:text-red-500 text-sm transition-colors">Masuk</a></li>
                        <li><a href="<?= base_url('auth/register') ?>" class="text-gray-400 hover:text-red-500 text-sm transition-colors">Daftar</a></li>
                    </ul>
                </div>

                <!-- Contact -->
                <div>
                    <h3 class="text-white font-bold mb-6 uppercase tracking-widest text-xs">Kontak Kami</h3>
                    <ul class="space-y-4">
                        <li class="flex items-start space-x-3">
                            <i class="fas fa-map-marker-alt text-red-500 mt-1"></i>
                            <span class="text-gray-400 text-sm">Jawa Timur, Indonesia</span>
                        </li>
                        <li class="flex items-center space-x-3">
                            <i class="fas fa-phone-alt text-red-500"></i>
                            <span class="text-gray-400 text-sm">+62 850 1234 5678</span>
                        </li>
                        <li class="flex items-center space-x-3">
                            <i class="fas fa-envelope text-red-500"></i>
                            <span class="text-gray-400 text-sm">info@assignpoint.com</span>
                        </li>
                    </ul>
                </div>

                <!-- Supporters -->
                <div>
                    <h3 class="text-white font-bold mb-6 uppercase tracking-widest text-xs">Didukung Oleh</h3>
                    <div class="grid grid-cols-2 gap-4">
                        <div class="bg-gray-900 border border-gray-800 p-3 rounded-xl flex items-center justify-center grayscale hover:grayscale-0 transition-all group">
                            <i class="fab fa-php text-2xl text-gray-500 group-hover:text-indigo-400"></i>
                        </div>
                        <div class="bg-gray-900 border border-gray-800 p-3 rounded-xl flex items-center justify-center grayscale hover:grayscale-0 transition-all group">
                            <i class="fas fa-fire text-2xl text-gray-500 group-hover:text-red-500"></i>
                        </div>
                        <div class="bg-gray-900 border border-gray-800 p-3 rounded-xl flex items-center justify-center grayscale hover:grayscale-0 transition-all group">
                            <i class="fa-solid fa-code text-2xl text-gray-500 group-hover:text-yellow-500"></i>
                        </div>
                        <div class="bg-gray-900 border border-gray-800 p-3 rounded-xl flex items-center justify-center grayscale hover:grayscale-0 transition-all group">
                            <i class="fab fa-google-drive text-2xl text-gray-500 group-hover:text-blue-500"></i>
                        </div>
                    </div>
                </div>
            </div>

            <div class="border-t border-gray-900 mt-12 pt-8 flex flex-col md:flex-row justify-between items-center space-y-4 md:space-y-0">
                <p class="text-gray-500 text-xs tracking-wider">
                    &copy; <?= date('Y') ?> <span class="text-red-600 font-bold">ASSIGNPOINT</span>. All rights reserved.
                </p>
                <div class="flex space-x-6">
                    <a href="#" class="text-gray-500 hover:text-white text-xs">Privacy Policy</a>
                    <a href="#" class="text-gray-500 hover:text-white text-xs">Terms of Service</a>
                </div>
            </div>
        </div>
    </footer>
<?php endif; ?>

</body>

</html>
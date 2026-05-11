<?= $this->include('templates/header') ?>

<div class="container mx-auto px-4 py-8">
    <div class="max-w-4xl mx-auto">
        <!-- Breadcrumbs -->
        <div class="flex items-center space-x-2 text-sm text-gray-500 mb-8">
            <a href="<?= base_url('user/dashboard') ?>" class="hover:text-red-500 transition-colors">Panel User</a>
            <i class="fas fa-chevron-right text-[10px]"></i>
            <span class="text-white">Pengaturan</span>
        </div>

        <?php if (session()->getFlashdata('success')): ?>
            <div class="bg-green-500/10 border border-green-500/50 text-green-500 p-4 rounded-xl mb-8 flex items-center">
                <i class="fas fa-check-circle mr-3"></i>
                <?= session()->getFlashdata('success') ?>
            </div>
        <?php endif; ?>

        <?php if (session()->getFlashdata('error')): ?>
            <div class="bg-red-500/10 border border-red-500/50 text-red-500 p-4 rounded-xl mb-8 flex items-center">
                <i class="fas fa-exclamation-circle mr-3"></i>
                <?= session()->getFlashdata('error') ?>
            </div>
        <?php endif; ?>

        <?php if (session()->getFlashdata('errors')): ?>
            <div class="bg-red-500/10 border border-red-500/50 text-red-500 p-4 rounded-xl mb-8">
                <ul class="list-disc list-inside">
                    <?php foreach (session()->getFlashdata('errors') as $error): ?>
                        <li><?= $error ?></li>
                    <?php endforeach; ?>
                </ul>
            </div>
        <?php endif; ?>

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
            <!-- Left: Settings Menu -->
            <div class="lg:col-span-1">
                <div class="bg-gray-900 border border-gray-800 rounded-3xl p-4 sticky top-24 shadow-2xl overflow-hidden">
                    <div class="flex items-center space-x-4 p-4 mb-4">
                        <div class="w-12 h-12 bg-red-600/10 rounded-xl flex items-center justify-center">
                            <i class="fas fa-cog text-red-500 text-xl"></i>
                        </div>
                        <div>
                            <h2 class="text-white font-bold">Pengaturan</h2>
                            <p class="text-gray-500 text-xs">Kelola akun Anda</p>
                        </div>
                    </div>
                    
                    <div class="space-y-1">
                        <a href="#security" class="flex items-center space-x-3 px-4 py-3 bg-red-600/10 text-red-500 rounded-xl font-medium transition-all">
                            <i class="fas fa-shield-alt w-5"></i>
                            <span>Keamanan</span>
                        </a>
                        <a href="<?= base_url('user/profile') ?>" class="flex items-center space-x-3 px-4 py-3 text-gray-400 hover:bg-gray-800 hover:text-white rounded-xl transition-all">
                            <i class="fas fa-user-circle w-5"></i>
                            <span>Informasi Profil</span>
                        </a>
                    </div>
                </div>
            </div>

            <!-- Right: Content -->
            <div class="lg:col-span-2">
                <!-- Security Section -->
                <div id="security" class="bg-gray-900 border border-gray-800 rounded-3xl p-8 md:p-10 shadow-2xl mb-8">
                    <h3 class="text-2xl font-bold text-white mb-2 flex items-center">
                        <i class="fas fa-lock mr-4 text-red-500"></i>
                        Ubah Password
                    </h3>
                    <p class="text-gray-500 text-sm mb-8">Pastikan gunakan password yang kuat untuk menjaga keamanan akun Anda.</p>

                    <form action="<?= base_url('user/settings/updatePassword') ?>" method="POST" class="space-y-6">
                        <div>
                            <label class="block text-gray-500 text-xs font-bold uppercase tracking-[0.2em] mb-3">Password Lama</label>
                            <div class="relative group">
                                <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                                    <i class="fas fa-key text-gray-600 group-focus-within:text-red-500 transition-colors"></i>
                                </div>
                                <input type="password" name="old_password" required
                                    class="w-full bg-gray-800/50 border border-gray-700 rounded-2xl py-4 pl-12 pr-4 text-white focus:outline-none focus:border-red-600 focus:ring-1 focus:ring-red-600 transition-all duration-300">
                            </div>
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div>
                                <label class="block text-gray-500 text-xs font-bold uppercase tracking-[0.2em] mb-3">Password Baru</label>
                                <div class="relative group">
                                    <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                                        <i class="fas fa-lock text-gray-600 group-focus-within:text-red-500 transition-colors"></i>
                                    </div>
                                    <input type="password" name="new_password" required
                                        class="w-full bg-gray-800/50 border border-gray-700 rounded-2xl py-4 pl-12 pr-4 text-white focus:outline-none focus:border-red-600 focus:ring-1 focus:ring-red-600 transition-all duration-300">
                                </div>
                            </div>
                            <div>
                                <label class="block text-gray-500 text-xs font-bold uppercase tracking-[0.2em] mb-3">Konfirmasi Password</label>
                                <div class="relative group">
                                    <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                                        <i class="fas fa-check-double text-gray-600 group-focus-within:text-red-500 transition-colors"></i>
                                    </div>
                                    <input type="password" name="confirm_password" required
                                        class="w-full bg-gray-800/50 border border-gray-700 rounded-2xl py-4 pl-12 pr-4 text-white focus:outline-none focus:border-red-600 focus:ring-1 focus:ring-red-600 transition-all duration-300">
                                </div>
                            </div>
                        </div>

                        <div class="pt-6">
                            <button type="submit"
                                class="w-full md:w-auto bg-gradient-to-r from-red-600 to-red-800 hover:from-red-700 hover:to-red-900 text-white font-bold py-4 px-12 rounded-2xl shadow-xl shadow-red-600/20 transform hover:-translate-y-1 transition-all duration-300 flex items-center justify-center">
                                <i class="fas fa-shield-alt mr-3"></i>
                                Perbarui Password
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<?= $this->include('templates/footer') ?>
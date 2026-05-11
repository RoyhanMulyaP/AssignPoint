<?= $this->include('templates/header') ?>

<div class="container mx-auto px-4 py-8">
    <div class="max-w-4xl mx-auto">
        <!-- Breadcrumbs -->
        <div class="flex items-center space-x-2 text-sm text-gray-500 mb-8">
            <a href="<?= base_url('user/dashboard') ?>" class="hover:text-red-500 transition-colors">Panel User</a>
            <i class="fas fa-chevron-right text-[10px]"></i>
            <span class="text-white">Profil Saya</span>
        </div>

        <?php if (session()->getFlashdata('success')): ?>
            <div class="bg-green-500/10 border border-green-500/50 text-green-500 p-4 rounded-xl mb-8 flex items-center">
                <i class="fas fa-check-circle mr-3"></i>
                <?= session()->getFlashdata('success') ?>
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
            <!-- Left: Profile Info Card -->
            <div class="lg:col-span-1">
                <div class="bg-gray-900 border border-gray-800 rounded-3xl p-8 text-center sticky top-24 shadow-2xl">
                    <div class="relative w-32 h-32 mx-auto mb-6">
                        <div class="absolute inset-0 bg-gradient-to-r from-red-600 to-red-900 rounded-full blur-lg opacity-40"></div>
                        <div class="relative w-full h-full bg-gray-800 rounded-full flex items-center justify-center border-4 border-gray-900 overflow-hidden">
                            <span class="text-white text-5xl font-black"><?= substr($user['name'], 0, 1) ?></span>
                        </div>
                    </div>
                    <h2 class="text-2xl font-bold text-white mb-2"><?= esc($user['name']) ?></h2>
                    <p class="text-gray-400 mb-6"><?= ucfirst(esc($user['role'])) ?></p>
                    
                    <div class="pt-6 border-t border-gray-800 space-y-4">
                        <div class="flex items-center justify-between text-sm">
                            <span class="text-gray-500 text-xs uppercase tracking-widest">ID User</span>
                            <span class="text-gray-300 font-mono"><?= substr($user['uuid'], 0, 8) ?>...</span>
                        </div>
                        <div class="flex items-center justify-between text-sm">
                            <span class="text-gray-500 text-xs uppercase tracking-widest">Terdaftar</span>
                            <span class="text-gray-300"><?= date('d M Y', strtotime($user['created_at'])) ?></span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Right: Edit Form -->
            <div class="lg:col-span-2">
                <div class="bg-gray-900 border border-gray-800 rounded-3xl p-8 md:p-10 shadow-2xl">
                    <h3 class="text-2xl font-bold text-white mb-8 flex items-center">
                        <i class="fas fa-user-edit mr-4 text-red-500"></i>
                        Edit Informasi Profil
                    </h3>

                    <form action="<?= base_url('user/profile/update') ?>" method="POST" class="space-y-6">
                        <div>
                            <label class="block text-gray-500 text-xs font-bold uppercase tracking-[0.2em] mb-3">Nama Lengkap</label>
                            <div class="relative group">
                                <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                                    <i class="fas fa-user text-gray-600 group-focus-within:text-red-500 transition-colors"></i>
                                </div>
                                <input type="text" name="name" value="<?= old('name', $user['name']) ?>" required
                                    class="w-full bg-gray-800/50 border border-gray-700 rounded-2xl py-4 pl-12 pr-4 text-white focus:outline-none focus:border-red-600 focus:ring-1 focus:ring-red-600 transition-all duration-300">
                            </div>
                        </div>

                        <div>
                            <label class="block text-gray-500 text-xs font-bold uppercase tracking-[0.2em] mb-3">Alamat Email</label>
                            <div class="relative group">
                                <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                                    <i class="fas fa-envelope text-gray-600 group-focus-within:text-red-500 transition-colors"></i>
                                </div>
                                <input type="email" name="email" value="<?= old('email', $user['email']) ?>" required
                                    class="w-full bg-gray-800/50 border border-gray-700 rounded-2xl py-4 pl-12 pr-4 text-white focus:outline-none focus:border-red-600 focus:ring-1 focus:ring-red-600 transition-all duration-300">
                            </div>
                        </div>

                        <div class="pt-6">
                            <button type="submit"
                                class="w-full md:w-auto bg-gradient-to-r from-red-600 to-red-800 hover:from-red-700 hover:to-red-900 text-white font-bold py-4 px-12 rounded-2xl shadow-xl shadow-red-600/20 transform hover:-translate-y-1 transition-all duration-300 flex items-center justify-center">
                                <i class="fas fa-save mr-3"></i>
                                Simpan Perubahan
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<?= $this->include('templates/footer') ?>
<?= $this->include('templates/header') ?>

<div class="min-h-screen flex items-center justify-center py-12 px-4 sm:px-6 lg:px-8">
    <div class="max-w-md w-full">
        <!-- Logo dan Header -->
        <div class="text-center mb-10">
            <div class="mx-auto w-20 h-20 bg-gradient-to-br from-red-600 to-red-800 rounded-2xl flex items-center justify-center shadow-2xl mb-4">
                <span class="text-white text-3xl font-bold">AP</span>
            </div>
            <h2 class="text-4xl font-extrabold text-white tracking-tight">
                Access Register
            </h2>
            <!-- <p class="mt-3 text-lg text-gray-400">
                Bergabung dengan sistem inventaris Axioo Pongo
            </p> -->
        </div>

        <!-- Form Register -->
        <div class="bg-gray-800 rounded-2xl shadow-xl p-8 border border-gray-700 hover:border-red-600 transition-all duration-300">
            <form method="POST" action="<?= base_url('auth/register') ?>" class="space-y-6">
                <?= csrf_field() ?>
                <!-- Nama Lengkap -->
                <div>
                    <label for="nama" class="block text-sm font-medium text-gray-300 mb-2">
                        Nama Lengkap <span class="text-red-500">*</span>
                    </label>
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <svg class="h-5 w-5 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                            </svg>
                        </div>
                        <input type="text" id="nama" name="nama" required
                            class="block w-full pl-10 pr-4 py-3 bg-gray-900 border <?= (isset($validation) && $validation->hasError('nama')) ? 'border-red-500' : 'border-gray-700' ?> rounded-lg text-white placeholder-gray-500 focus:outline-none focus:ring-2 focus:ring-red-600 focus:border-transparent transition duration-300"
                            placeholder="Masukkan nama lengkap Anda"
                            value="<?= old('nama') ?>">
                    </div>
                    <?php if (isset($validation) && $validation->hasError('nama')): ?>
                        <p class="mt-2 text-sm text-red-400 flex items-center">
                            <svg class="w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd" />
                            </svg>
                            <?= $validation->getError('nama') ?>
                        </p>
                    <?php endif; ?>
                </div>

                <!-- Email -->
                <div>
                    <label for="email" class="block text-sm font-medium text-gray-300 mb-2">
                        Email <span class="text-red-500">*</span>
                    </label>
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <svg class="h-5 w-5 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                            </svg>
                        </div>
                        <input type="email" id="email" name="email" required
                            class="block w-full pl-10 pr-4 py-3 bg-gray-900 border <?= (isset($validation) && $validation->hasError('email')) ? 'border-red-500' : 'border-gray-700' ?> rounded-lg text-white placeholder-gray-500 focus:outline-none focus:ring-2 focus:ring-red-600 focus:border-transparent transition duration-300"
                            placeholder="contoh@email.com"
                            value="<?= old('email') ?>">
                    </div>
                    <?php if (isset($validation) && $validation->hasError('email')): ?>
                        <p class="mt-2 text-sm text-red-400 flex items-center">
                            <svg class="w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd" />
                            </svg>
                            <?= $validation->getError('email') ?>
                        </p>
                    <?php endif; ?>
                </div>

                <!-- Password -->
                <div>
                    <label for="password" class="block text-sm font-medium text-gray-300 mb-2">
                        Password <span class="text-red-500">*</span>
                    </label>
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <svg class="h-5 w-5 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" />
                            </svg>
                        </div>
                        <input type="password" id="password" name="password" required
                            class="block w-full pl-10 pr-10 py-3 bg-gray-900 border <?= (isset($validation) && $validation->hasError('password')) ? 'border-red-500' : 'border-gray-700' ?> rounded-lg text-white placeholder-gray-500 focus:outline-none focus:ring-2 focus:ring-red-600 focus:border-transparent transition duration-300"
                            placeholder="Minimal 6 karakter">
                        <button type="button" onclick="togglePassword('password')" class="absolute inset-y-0 right-0 pr-3 flex items-center">
                            <svg id="eye-icon-password" class="h-5 w-5 text-gray-500 hover:text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                            </svg>
                        </button>
                    </div>
                    <?php if (isset($validation) && $validation->hasError('password')): ?>
                        <p class="mt-2 text-sm text-red-400 flex items-center">
                            <svg class="w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd" />
                            </svg>
                            <?= $validation->getError('password') ?>
                        </p>
                    <?php endif; ?>
                </div>

                <!-- Konfirmasi Password -->
                <div>
                    <label for="confirm_password" class="block text-sm font-medium text-gray-300 mb-2">
                        Konfirmasi Password <span class="text-red-500">*</span>
                    </label>
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <svg class="h-5 w-5 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z" />
                            </svg>
                        </div>
                        <input type="password" id="confirm_password" name="confirm_password" required
                            class="block w-full pl-10 pr-10 py-3 bg-gray-900 border <?= (isset($validation) && $validation->hasError('confirm_password')) ? 'border-red-500' : 'border-gray-700' ?> rounded-lg text-white placeholder-gray-500 focus:outline-none focus:ring-2 focus:ring-red-600 focus:border-transparent transition duration-300"
                            placeholder="Ulangi password Anda">
                        <button type="button" onclick="togglePassword('confirm_password')" class="absolute inset-y-0 right-0 pr-3 flex items-center">
                            <svg id="eye-icon-confirm" class="h-5 w-5 text-gray-500 hover:text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                            </svg>
                        </button>
                    </div>
                    <?php if (isset($validation) && $validation->hasError('confirm_password')): ?>
                        <p class="mt-2 text-sm text-red-400 flex items-center">
                            <svg class="w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd" />
                            </svg>
                            <?= $validation->getError('confirm_password') ?>
                        </p>
                    <?php endif; ?>
                </div>

                <!-- Terms and Conditions -->
                <div class="flex items-center">
                    <input id="terms" name="terms" type="checkbox" required
                        class="h-4 w-4 bg-gray-900 border border-gray-700 rounded focus:ring-red-600 text-red-600 focus:ring-offset-gray-900">
                    <label for="terms" class="ml-3 block text-sm text-gray-400">
                        Saya setuju dengan
                        <a href="#" class="text-red-400 hover:text-red-300 font-medium">Syarat & Ketentuan</a>
                        dan
                        <a href="#" class="text-red-400 hover:text-red-300 font-medium">Kebijakan Privasi</a>
                    </label>
                </div>

                <!-- Error Messages -->
                <?php if (session()->getFlashdata('error')): ?>
                    <div class="bg-red-900/50 border-l-4 border-red-500 p-4 rounded">
                        <div class="flex">
                            <div class="flex-shrink-0">
                                <svg class="h-5 w-5 text-red-400" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd" />
                                </svg>
                            </div>
                            <div class="ml-3">
                                <p class="text-sm text-red-300">
                                    <?= session()->getFlashdata('error') ?>
                                </p>
                            </div>
                        </div>
                    </div>
                <?php endif; ?>

                <!-- Submit Button -->
                <button type="submit"
                    class="w-full bg-gradient-to-r from-red-600 to-red-700 hover:from-red-700 hover:to-red-800 text-white font-bold py-3 px-4 rounded-lg shadow-lg hover:shadow-xl transform hover:-translate-y-0.5 transition-all duration-300 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500 focus:ring-offset-gray-900">
                    Daftar Sekarang
                </button>
            </form>

            <!-- Divider -->
            <div class="mt-8">
                <div class="relative">
                    <div class="absolute inset-0 flex items-center">
                        <div class="w-full border-t border-gray-700"></div>
                    </div>
                    <div class="relative flex justify-center text-sm">
                        <span class="px-4 bg-gray-800 text-gray-500">Sudah punya akun?</span>
                    </div>
                </div>

                <!-- Login Link -->
                <div class="mt-6 text-center">
                    <a href="<?= base_url('auth/login') ?>"
                        class="inline-flex items-center text-red-400 hover:text-red-300 font-medium group">
                        <svg class="w-5 h-5 mr-2 group-hover:translate-x-1 transition-transform duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16l-4-4m0 0l4-4m-4 4h18" />
                        </svg>
                        Login ke akun yang sudah ada
                    </a>
                </div>
            </div>
        </div>

        <!-- Features Preview -->
        <div class="mt-10 grid grid-cols-1 md:grid-cols-3 gap-6">
            <div class="text-center">
                <div class="inline-flex items-center justify-center w-12 h-12 rounded-full bg-red-900/30 text-red-400 mb-3">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z" />
                    </svg>
                </div>
                <h4 class="text-sm font-semibold text-white">Keamanan Terjamin</h4>
                <p class="mt-1 text-xs text-gray-400">Data Anda dilindungi dengan enkripsi</p>
            </div>

            <div class="text-center">
                <div class="inline-flex items-center justify-center w-12 h-12 rounded-full bg-red-900/30 text-red-400 mb-3">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z" />
                    </svg>
                </div>
                <h4 class="text-sm font-semibold text-white">Akses Cepat</h4>
                <p class="mt-1 text-xs text-gray-400">Antarmuka responsif dan cepat</p>
            </div>

            <div class="text-center">
                <div class="inline-flex items-center justify-center w-12 h-12 rounded-full bg-red-900/30 text-red-400 mb-3">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" />
                    </svg>
                </div>
                <h4 class="text-sm font-semibold text-white">Multi Role</h4>
                <p class="mt-1 text-xs text-gray-400">Admin dan User dengan hak berbeda</p>
            </div>
        </div>
    </div>
</div>

<script>
    function togglePassword(fieldId) {
        const passwordField = document.getElementById(fieldId);
        const eyeIcon = document.getElementById(`eye-icon-${fieldId}`);

        if (passwordField.type === 'password') {
            passwordField.type = 'text';
            eyeIcon.innerHTML = `<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.543-7a9.97 9.97 0 011.563-3.029m5.858.908a3 3 0 114.243 4.243M9.878 9.878l4.242 4.242M9.878 9.878L6.59 6.59m7.532 7.532l3.29 3.29M3 3l3.59 3.59m0 0A9.953 9.953 0 0112 5c4.478 0 8.268 2.943 9.543 7a10.025 10.025 0 01-4.132 5.411m0 0L21 21" />`;
        } else {
            passwordField.type = 'password';
            eyeIcon.innerHTML = `<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />`;
        }
    }

    // Real-time password validation
    document.addEventListener('DOMContentLoaded', function() {
        const password = document.getElementById('password');
        const confirmPassword = document.getElementById('confirm_password');

        function validatePassword() {
            if (password.value && confirmPassword.value) {
                if (password.value !== confirmPassword.value) {
                    confirmPassword.style.borderColor = '#ef4444';
                } else {
                    confirmPassword.style.borderColor = '#4ade80';
                }
            }
        }

        password.addEventListener('input', validatePassword);
        confirmPassword.addEventListener('input', validatePassword);

        // Form validation on submit
        const form = document.querySelector('form');
        form.addEventListener('submit', function(e) {
            if (password.value !== confirmPassword.value) {
                e.preventDefault();
                alert('Password dan konfirmasi password tidak cocok!');
            }
        });
    });
</script>

<?= $this->include('templates/footer') ?>
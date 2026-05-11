<?= $this->include('templates/header') ?>

<div class="min-h-screen flex items-center justify-center py-12 px-4 sm:px-6 lg:px-8">
    <div class="max-w-md w-full">
        <!-- Logo dan Header -->
        <div class="text-center mb-10">
            <div class="inline-block relative group">
                <div class="absolute -inset-1 bg-gradient-to-r from-red-600 to-red-900 rounded-2xl blur opacity-25 group-hover:opacity-100 transition duration-1000"></div>
                <div class="relative w-24 h-24 bg-gray-900 rounded-2xl flex items-center justify-center border border-gray-800 shadow-2xl">
                    <svg class="w-14 h-14 text-red-500" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"></path>
                    </svg>
                </div>
            </div>
            <h2 class="text-4xl font-black tracking-tighter text-white mt-6 uppercase">
                ASSIGN<span class="text-red-600">POINT</span>
            </h2>
            <p class="text-xs text-gray-500 uppercase tracking-[0.2em] font-bold mt-1">System Access</p>
        </div>

        <!-- Form Login -->
        <div class="bg-gray-800 rounded-2xl shadow-xl p-8 border border-gray-700 hover:border-red-600 transition-all duration-300">
            <form method="POST" action="<?= base_url('auth/login') ?>" class="space-y-6">
                <input type="hidden" name="<?= csrf_token() ?>" value="<?= csrf_hash() ?>" />
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
                            value="<?= old('email') ?>"
                            autocomplete="email">
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
                    <div class="flex items-center justify-between mb-2">
                        <label for="password" class="block text-sm font-medium text-gray-300">
                            Password <span class="text-red-500">*</span>
                        </label>
                        <a href="<?= base_url('auth/forgot') ?>" class="text-sm text-red-400 hover:text-red-300 font-medium transition duration-300">
                            Lupa password?
                        </a>
                    </div>
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <svg class="h-5 w-5 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" />
                            </svg>
                        </div>
                        <input type="password" id="password" name="password" required
                            class="block w-full pl-10 pr-10 py-3 bg-gray-900 border <?= (isset($validation) && $validation->hasError('password')) ? 'border-red-500' : 'border-gray-700' ?> rounded-lg text-white placeholder-gray-500 focus:outline-none focus:ring-2 focus:ring-red-600 focus:border-transparent transition duration-300"
                            placeholder="Masukkan password Anda"
                            autocomplete="current-password">
                        <button type="button" onclick="togglePassword('password')" class="absolute inset-y-0 right-0 pr-3 flex items-center">
                            <svg id="eye-icon-password" class="h-5 w-5 text-gray-500 hover:text-gray-400 transition duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
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

                <!-- Remember Me -->
                <div class="flex items-center">
                    <input id="remember" name="remember" type="checkbox"
                        class="h-4 w-4 bg-gray-900 border border-gray-700 rounded focus:ring-red-600 text-red-600 focus:ring-offset-gray-900">
                    <label for="remember" class="ml-3 block text-sm text-gray-400">
                        Ingat saya
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

                <!-- Success Messages -->
                <?php if (session()->getFlashdata('success')): ?>
                    <div class="bg-green-900/50 border-l-4 border-green-500 p-4 rounded">
                        <div class="flex">
                            <div class="flex-shrink-0">
                                <svg class="h-5 w-5 text-green-400" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                                </svg>
                            </div>
                            <div class="ml-3">
                                <p class="text-sm text-green-300">
                                    <?= session()->getFlashdata('success') ?>
                                </p>
                            </div>
                        </div>
                    </div>
                <?php endif; ?>

                <!-- Submit Button -->
                <button type="submit"
                    class="w-full bg-gradient-to-r from-red-600 to-red-700 hover:from-red-700 hover:to-red-800 text-white font-bold py-3 px-4 rounded-lg shadow-lg hover:shadow-xl transform hover:-translate-y-0.5 transition-all duration-300 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500 focus:ring-offset-gray-900">
                    <div class="flex items-center justify-center">
                        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 16l-4-4m0 0l4-4m-4 4h14m-5 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h7a3 3 0 013 3v1" />
                        </svg>
                        Login
                    </div>
                </button>
            </form>

            <!-- Social Login (Optional) -->
            <div class="mt-8">
                <div class="relative">
                    <div class="absolute inset-0 flex items-center">
                        <div class="w-full border-t border-gray-700"></div>
                    </div>
                    <div class="relative flex justify-center text-sm">
                        <span class="px-4 bg-gray-800 text-gray-500">Atau login dengan</span>
                    </div>
                </div>

                <div class="mt-6 grid grid-cols-2 gap-3">
                    <a href="#" class="w-full inline-flex justify-center py-2 px-4 border border-gray-700 rounded-lg shadow-sm bg-gray-900 text-sm font-medium text-gray-300 hover:bg-gray-800 hover:border-red-600 transition-all duration-300">
                        <svg class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zM5.838 12a6.162 6.162 0 1112.324 0 6.162 6.162 0 01-12.324 0zM12 16a4 4 0 110-8 4 4 0 010 8zm4.965-10.405a1.44 1.44 0 112.881.001 1.44 1.44 0 01-2.881-.001z" />
                        </svg>
                        Instagram
                    </a>
                    <a href="#" class="w-full inline-flex justify-center py-2 px-4 border border-gray-700 rounded-lg shadow-sm bg-gray-900 text-sm font-medium text-gray-300 hover:bg-gray-800 hover:border-red-600 transition-all duration-300">
                        <svg class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M12 0c-6.626 0-12 5.373-12 12 0 5.302 3.438 9.8 8.207 11.387.599.111.793-.261.793-.577v-2.234c-3.338.726-4.033-1.416-4.033-1.416-.546-1.387-1.333-1.756-1.333-1.756-1.089-.745.083-.729.083-.729 1.205.084 1.839 1.237 1.839 1.237 1.07 1.834 2.807 1.304 3.492.997.107-.775.418-1.305.762-1.604-2.665-.305-5.467-1.334-5.467-5.931 0-1.311.469-2.381 1.236-3.221-.124-.303-.535-1.524.117-3.176 0 0 1.008-.322 3.301 1.23.957-.266 1.983-.399 3.003-.404 1.02.005 2.047.138 3.006.404 2.291-1.552 3.297-1.23 3.297-1.23.653 1.653.242 2.874.118 3.176.77.84 1.235 1.911 1.235 3.221 0 4.609-2.807 5.624-5.479 5.921.43.372.823 1.102.823 2.222v3.293c0 .319.192.694.801.576 4.765-1.589 8.199-6.086 8.199-11.386 0-6.627-5.373-12-12-12z" />
                        </svg>
                        GitHub
                    </a>
                </div>
            </div>

            <!-- Register Link -->
            <div class="mt-8 text-center">
                <p class="text-gray-400">
                    Belum punya akun?
                    <a href="<?= base_url('auth/register') ?>" class="text-red-400 hover:text-red-300 font-medium group transition duration-300">
                        Daftar di sini
                        <svg class="w-4 h-4 ml-1 inline-block group-hover:translate-x-1 transition-transform duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3" />
                        </svg>
                    </a>
                </p>
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
                <h4 class="text-sm font-semibold text-white">Login Aman</h4>
                <p class="mt-1 text-xs text-gray-400">Autentikasi terenkripsi SSL</p>
            </div>

            <div class="text-center">
                <div class="inline-flex items-center justify-center w-12 h-12 rounded-full bg-red-900/30 text-red-400 mb-3">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" />
                    </svg>
                </div>
                <h4 class="text-sm font-semibold text-white">Multi Role</h4>
                <p class="mt-1 text-xs text-gray-400">Admin & User Dashboard berbeda</p>
            </div>

            <div class="text-center">
                <div class="inline-flex items-center justify-center w-12 h-12 rounded-full bg-red-900/30 text-red-400 mb-3">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z" />
                    </svg>
                </div>
                <h4 class="text-sm font-semibold text-white">Akses Cepat</h4>
                <p class="mt-1 text-xs text-gray-400">Load time dibawah 2 detik</p>
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

        // Auto-focus on email field
        document.addEventListener('DOMContentLoaded', function() {
            const emailField = document.getElementById('email');
            if (emailField) {
                emailField.focus();
            }

            // Auto-fill demo credentials on click
            const demoCredentials = document.querySelectorAll('code');
            demoCredentials.forEach(code => {
                code.addEventListener('click', function(e) {
                    e.preventDefault();
                    const text = this.textContent.trim();

                    if (text.includes('@')) {
                        // It's an email
                        document.getElementById('email').value = text;
                        document.getElementById('email').focus();
                    } else {
                        // It's a password
                        document.getElementById('password').value = text;
                        document.getElementById('password').focus();
                    }
                });
            });

            // Remember me functionality
            const rememberCheckbox = document.getElementById('remember');
            const emailInput = document.getElementById('email');

            // Check if there's saved email
            const savedEmail = localStorage.getItem('rememberedEmail');
            if (savedEmail) {
                emailInput.value = savedEmail;
                rememberCheckbox.checked = true;
            }

            // Save email if remember is checked on form submit
            const form = document.querySelector('form');
            form.addEventListener('submit', function() {
                if (rememberCheckbox.checked) {
                    localStorage.setItem('rememberedEmail', emailInput.value);
                } else {
                    localStorage.removeItem('rememberedEmail');
                }
            });

            // Password validation animation
            const passwordField = document.getElementById('password');
            if (passwordField) {
                passwordField.addEventListener('input', function() {
                    if (this.value.length > 0) {
                        this.classList.remove('border-gray-700');
                        if (this.value.length < 6) {
                            this.classList.add('border-yellow-500');
                        } else {
                            this.classList.add('border-green-500');
                        }
                    } else {
                        this.classList.remove('border-yellow-500', 'border-green-500');
                        this.classList.add('border-gray-700');
                    }
                });
            }
        });

        // Form validation animation
        document.querySelector('form').addEventListener('submit', function(e) {
            const email = document.getElementById('email').value;
            const password = document.getElementById('password').value;

            let isValid = true;
            const emailField = document.getElementById('email');
            const passwordField = document.getElementById('password');

            // Reset styles
            emailField.classList.remove('border-red-500', 'border-green-500');
            passwordField.classList.remove('border-red-500', 'border-green-500');

            // Email validation
            const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
            if (!emailRegex.test(email)) {
                emailField.classList.add('border-red-500');
                isValid = false;
            } else {
                emailField.classList.add('border-green-500');
            }

            // Password validation
            if (password.length < 6) {
                passwordField.classList.add('border-red-500');
                isValid = false;
            } else {
                passwordField.classList.add('border-green-500');
            }

            if (!isValid) {
                e.preventDefault();

                // Shake animation for invalid fields
                const invalidFields = document.querySelectorAll('.border-red-500');
                invalidFields.forEach(field => {
                    field.classList.add('animate-shake');
                    setTimeout(() => {
                        field.classList.remove('animate-shake');
                    }, 500);
                });

                // Show error message
                const errorDiv = document.createElement('div');
                errorDiv.className = 'bg-red-900/50 border-l-4 border-red-500 p-4 rounded mt-4';
                errorDiv.innerHTML = `
                <div class="flex">
                    <div class="flex-shrink-0">
                        <svg class="h-5 w-5 text-red-400" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd" />
                        </svg>
                    </div>
                    <div class="ml-3">
                        <p class="text-sm text-red-300">
                            Silakan periksa email dan password Anda. Pastikan email valid dan password minimal 6 karakter.
                        </p>
                    </div>
                </div>
            `;

                const existingError = document.querySelector('.bg-red-900\\/50');
                if (!existingError) {
                    this.insertBefore(errorDiv, this.firstChild);
                }
            }
        });
    </script>

    <style>
        /* Shake animation for invalid fields */
        @keyframes shake {

            0%,
            100% {
                transform: translateX(0);
            }

            10%,
            30%,
            50%,
            70%,
            90% {
                transform: translateX(-5px);
            }

            20%,
            40%,
            60%,
            80% {
                transform: translateX(5px);
            }
        }

        .animate-shake {
            animation: shake 0.5s cubic-bezier(.36, .07, .19, .97) both;
        }

        /* Smooth transitions */
        input,
        button,
        a {
            transition: all 0.3s ease;
        }

        /* Gradient text hover */
        .gradient-text {
            background: linear-gradient(90deg, #ef4444, #dc2626);
            -webkit-background-clip: text;
            background-clip: text;
            color: transparent;
        }

        /* Demo credentials hover effect */
        code:hover {
            background: linear-gradient(90deg, #7f1d1d, #991b1b);
            transform: translateY(-1px);
            box-shadow: 0 4px 12px rgba(239, 68, 68, 0.2);
        }

        /* Focus styles */
        input:focus {
            transform: translateY(-1px);
            box-shadow: 0 10px 25px -5px rgba(239, 68, 68, 0.1);
        }

        /* Button hover effect */
        button[type="submit"]:hover {
            transform: translateY(-2px);
            box-shadow: 0 20px 40px -15px rgba(239, 68, 68, 0.4);
        }

        /* Social button hover */
        a:hover svg {
            transform: scale(1.1);
        }
    </style>

    <?= $this->include('templates/footer') ?>
<!DOCTYPE html>
<html lang="id" class="dark">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Assign Point</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" />
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            darkMode: 'class',
            theme: {
                extend: {
                    colors: {
                        primary: {
                            50: '#fef2f2',
                            100: '#fee2e2',
                            200: '#fecaca',
                            300: '#fca5a5',
                            400: '#f87171',
                            500: '#ef4444',
                            600: '#dc2626',
                            700: '#b91c1c',
                            800: '#991b1b',
                            900: '#7f1d1d',
                        },
                        dark: {
                            50: '#111827',
                            100: '#1f2937',
                            200: '#374151',
                            300: '#4b5563',
                            400: '#6b7280',
                            500: '#9ca3af',
                            600: '#d1d5db',
                            700: '#e5e7eb',
                            800: '#f3f4f6',
                            900: '#f9fafb',
                        }
                    }
                }
            }
        }
    </script>
    <style>
        body {
            font-family: 'Inter', sans-serif;
        }

        .glass-effect {
            backdrop-filter: blur(10px);
            background: rgba(255, 255, 255, 0.1);
        }

        .gradient-bg {
            background: linear-gradient(135deg, #111827 0%, #7f1d1d 100%);
        }

        .hover-scale {
            transition: transform 0.3s ease;
        }

        .hover-scale:hover {
            transform: translateY(-2px);
        }
    </style>
</head>

<body class="bg-gray-900 text-gray-100 min-h-screen overflow-x-hidden">
    <!-- Navigation -->
    <nav class="gradient-bg shadow-xl relative z-[9999]">
        <div class="container mx-auto px-4 py-4">
            <div class="flex justify-between items-center">
                <div class="flex items-center space-x-3 group cursor-pointer">
                    <div class="relative">
                        <div class="absolute -inset-1 bg-gradient-to-r from-red-600 to-red-900 rounded-xl blur opacity-25 group-hover:opacity-100 transition duration-1000 group-hover:duration-200"></div>
                        <div class="relative w-12 h-12 bg-gray-900 rounded-xl flex items-center justify-center border border-gray-800 shadow-2xl">
                            <svg class="w-8 h-8 text-red-500" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"></path>
                            </svg>
                        </div>
                    </div>
                    <a href="<?= base_url() ?>" class="flex flex-col">
                        <span class="text-2xl font-black tracking-tighter text-white leading-none">ASSIGN<span class="text-red-600">POINT</span></span>
                        <span class="text-[10px] text-gray-500 uppercase tracking-[0.2em] font-bold">Inventory System</span>
                    </a>
                </div>

                <div class="hidden md:flex space-x-8 items-center">
                    <a href="<?= base_url('/') ?>"
                        class="<?= (isset($active) && $active == 'home') ? 'text-red-500 font-bold border-b-2 border-red-500' : 'text-gray-400 hover:text-white transition-colors duration-200' ?>">
                        Beranda
                    </a>
                    <a href="<?= base_url('about') ?>"
                        class="<?= (isset($active) && $active == 'about') ? 'text-red-500 font-bold border-b-2 border-red-500' : 'text-gray-400 hover:text-white transition-colors duration-200' ?>">
                        Tentang
                    </a>

                    <?php if (session()->get('isLoggedIn')): ?>
                        <a href="<?= base_url('user/dashboard') ?>"
                            class="<?= (isset($active) && $active == 'dashboard') ? 'text-red-500 font-bold border-b-2 border-red-500' : 'text-gray-400 hover:text-white transition-colors duration-200' ?>">
                            Panel User
                        </a>

                        <a href="<?= base_url('user/inventaris') ?>"
                            class="<?= (isset($active) && $active == 'inventaris') ? 'text-red-500 font-bold border-b-2 border-red-500' : 'text-gray-400 hover:text-white transition-colors duration-200' ?>">
                            Katalog
                        </a>
                    <?php endif; ?>
                </div>

                <div class="flex items-center space-x-4">
                    <?php if (session()->get('isLoggedIn')): ?>
                        <!-- Notifications for both admin and user -->


                        <div class="relative group">
                            <button class="flex items-center space-x-2 hover:bg-gray-800 p-2 rounded-lg">
                                <div class="w-8 h-8 bg-red-500 rounded-full flex items-center justify-center">
                                    <span class="text-white font-semibold"><?= substr(session()->get('nama'), 0, 1) ?></span>
                                </div>
                                <div class="hidden md:block text-left">
                                    <p class="text-sm"><?= session()->get('nama') ?></p>
                                    <p class="text-xs text-gray-400"><?= ucfirst(session()->get('role')) ?></p>
                                </div>
                                <i class="fas fa-chevron-down text-gray-400 text-sm hidden md:block"></i>
                            </button>
                            <div class="absolute right-0 mt-2 w-48 bg-gray-800 border border-gray-700 rounded-lg shadow-xl opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-all duration-300 z-50">
                                <div class="p-4 border-b border-gray-700">
                                    <p class="text-sm text-white">Masuk sebagai</p>
                                    <p class="text-sm font-medium text-red-400"><?= session()->get('email') ?></p>
                                </div>
                                <div class="py-2">
                                    <a href="<?= (session()->get('role') == 'admin') ? base_url('admin/profile') : base_url('user/profile') ?>"
                                        class="block px-4 py-2 text-sm text-gray-300 hover:bg-gray-700 hover:text-white">
                                        <i class="fas fa-user mr-3 w-4"></i> Profil Saya
                                    </a>
                                    <a href="<?= (session()->get('role') == 'admin') ? base_url('admin/settings') : base_url('user/settings') ?>"
                                        class="block px-4 py-2 text-sm text-gray-300 hover:bg-gray-700 hover:text-white">
                                        <i class="fas fa-cog mr-3 w-4"></i> Pengaturan
                                    </a>
                                </div>
                                <div class="py-2 border-t border-gray-700">
                                    <a href="<?= base_url('auth/logout') ?>"
                                        class="block px-4 py-2 text-sm text-red-400 hover:bg-red-900/30">
                                        <i class="fas fa-sign-out-alt mr-3 w-4"></i> Keluar
                                    </a>
                                </div>
                            </div>
                        </div>
                    <?php else: ?>
                        <a href="<?= site_url('auth/login') ?>" class="text-gray-300 hover:text-red-400">Login</a>
                        <a href="<?= site_url('auth/register') ?>"
                            class="bg-red-600 hover:bg-red-700 text-white px-4 py-2 rounded-lg font-semibold transition duration-300">
                            Register
                        </a>
                        </a>
                    <?php endif; ?>
                    
                    <!-- Mobile menu button -->
                    <button id="mobileMenuButton" class="md:hidden text-gray-300 hover:text-white p-2 ml-2">
                        <i class="fas fa-bars text-2xl"></i>
                    </button>
                </div>
            </div>
        </div>

        <!-- Mobile Menu -->
        <div id="mobileMenu" class="hidden md:hidden bg-gray-800 border-t border-gray-700">
            <div class="px-4 py-3 space-y-3">
                <a href="<?= base_url('/') ?>" class="block <?= (isset($active) && $active == 'home') ? 'text-red-400 font-semibold' : 'text-gray-300 hover:text-red-400' ?>">Beranda</a>
                <a href="<?= base_url('about') ?>" class="block <?= (isset($active) && $active == 'about') ? 'text-red-400 font-semibold' : 'text-gray-300 hover:text-red-400' ?>">Tentang</a>
                <?php if (session()->get('isLoggedIn')): ?>
                    <a href="<?= base_url('user/dashboard') ?>" class="block <?= (isset($active) && $active == 'dashboard') ? 'text-red-500 font-bold' : 'text-gray-300 hover:text-white' ?>">Panel User</a>
                    <a href="<?= base_url('user/inventaris') ?>" class="block <?= (isset($active) && $active == 'inventaris') ? 'text-red-500 font-bold' : 'text-gray-300 hover:text-white' ?>">Katalog</a>
                <?php endif; ?>
            </div>
        </div>
    </nav>

    <script>
        // Notification dropdown
        document.getElementById('notificationBtn').addEventListener('click', function(e) {
            e.stopPropagation();
            const dropdown = document.getElementById('notificationDropdown');
            dropdown.classList.toggle('hidden');
        });

        // Close dropdowns when clicking outside
        document.addEventListener('click', function(e) {
            const notificationBtn = document.getElementById('notificationBtn');
            const notificationDropdown = document.getElementById('notificationDropdown');

            if (!notificationBtn.contains(e.target) && !notificationDropdown.contains(e.target)) {
                notificationDropdown.classList.add('hidden');
            }
        });

        // Close mobile menu when clicking outside
        document.addEventListener('click', function(e) {
            const mobileMenuButton = document.getElementById('mobileMenuButton');
            const mobileMenu = document.getElementById('mobileMenu');

            if (!mobileMenuButton.contains(e.target) && !mobileMenu.contains(e.target) && !mobileMenu.classList.contains('hidden')) {
                mobileMenu.classList.add('hidden');
            }
        });
    </script>

    <!-- Main Content -->
    <main class="container mx-auto px-4 py-8">
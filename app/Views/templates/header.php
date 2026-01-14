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

<body class="bg-gray-900 text-gray-100 min-h-screen">
    <!-- Navigation -->
    <nav class="gradient-bg shadow-xl relative z-[9999]">
        <div class="container mx-auto px-4 py-4">
            <div class="flex justify-between items-center">
                <div class="flex items-center space-x-2">
                    <div class="w-10 h-10 bg-red-600 rounded-lg flex items-center justify-center">
                        <span class="font-bold text-white text-xl">AP</span>
                    </div>
                    <a href="<?= base_url() ?>" class="text-2xl font-bold text-white">
                        Assign<span class="text-red-500">Point</span>
                    </a>
                </div>

                <div class="hidden md:flex space-x-6 items-center">
                    <a href="<?= base_url('/') ?>"
                        class="<?= (isset($active) && $active == 'home') ? 'text-red-400 font-semibold' : 'text-gray-300 hover:text-red-400' ?>">
                        Home
                    </a>
                    <a href="<?= base_url('about') ?>"
                        class="<?= (isset($active) && $active == 'about') ? 'text-red-400 font-semibold' : 'text-gray-300 hover:text-red-400' ?>">
                        About
                    </a>

                    <?php if (session()->get('isLoggedIn')): ?>
                        <a href="<?= base_url('user/dashboard') ?>"
                            class="<?= (isset($active) && $active == 'dashboard') ? 'text-red-400 font-semibold' : 'text-gray-300 hover:text-red-400' ?>">
                            Dashboard
                        </a>

                        <a href="<?= base_url('user/inventaris') ?>"
                            class="<?= (isset($active) && $active == 'inventaris') ? 'text-red-400 font-semibold' : 'text-gray-300 hover:text-red-400' ?>">
                            List
                        </a>

                        <a href="<? base_url('user/peminjaman') ?>"
                            class="<?= (isset($active) && ($active == 'peminjaman' || $active == 'riwayat')) ? 'text-red-400 font-semibold' : 'text-gray-300 hover:text-red-400' ?> hidden">
                            Peminjaman
                        </a>
                    <?php endif; ?>
                </div>

                <div class="flex items-center space-x-4">
                    <?php if (session()->get('isLoggedIn')): ?>
                        <!-- Notifications for both admin and user -->
                        <div class="relative">
                            <button id="notificationBtn" class="p-2 text-gray-400 hover:text-white relative">
                                <i class="fas fa-bell text-xl"></i>
                                <?php if (session()->get('role') == 'admin'): ?>
                                    <span class="absolute -top-1 -right-1 bg-red-600 text-white text-xs rounded-full w-5 h-5 flex items-center justify-center">5</span>
                                <?php else: ?>
                                    <span class="absolute -top-1 -right-1 bg-red-600 text-white text-xs rounded-full w-5 h-5 flex items-center justify-center">2</span>
                                <?php endif; ?>
                            </button>
                            <div id="notificationDropdown" class="hidden absolute right-0 mt-2 w-80 bg-gray-800 border border-gray-700 rounded-lg shadow-xl z-50">
                                <div class="p-4 border-b border-gray-700">
                                    <h3 class="font-semibold text-white">Notifikasi</h3>
                                    <p class="text-xs text-gray-400">
                                        <?php if (session()->get('role') == 'admin'): ?>
                                            Anda memiliki 5 notifikasi baru
                                        <?php else: ?>
                                            Anda memiliki 2 notifikasi baru
                                        <?php endif; ?>
                                    </p>
                                </div>
                                <div class="max-h-96 overflow-y-auto">
                                    <!-- Notification items would be loaded here -->
                                    <div class="p-4 border-b border-gray-700 hover:bg-gray-700 cursor-pointer">
                                        <p class="text-sm text-white">Peminjaman baru diajukan</p>
                                        <p class="text-xs text-gray-400 mt-1">2 menit yang lalu</p>
                                    </div>
                                </div>
                                <div class="p-4 border-t border-gray-700">
                                    <a href="#" class="text-red-400 hover:text-red-300 text-sm font-medium">Lihat semua notifikasi</a>
                                </div>
                            </div>
                        </div>

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
                    <?php endif; ?>
                </div>
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
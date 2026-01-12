<!DOCTYPE html>
<html lang="id" class="dark">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Assign Point</title>
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
    <nav class="gradient-bg shadow-xl">
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

                <div class="hidden md:flex space-x-6">
                    <a href="<?= base_url('home') ?>" class="<?= (isset($active) && $active == 'home') ? 'text-red-400 font-semibold' : 'text-gray-300 hover:text-red-400' ?>">Home</a>
                    <a href="<?= base_url('about') ?>" class="<?= (isset($active) && $active == 'about') ? 'text-red-400 font-semibold' : 'text-gray-300 hover:text-red-400' ?>">About</a>

                    <?php if (session()->get('isLoggedIn')): ?>
                        <?php if (session()->get('role') == 'admin'): ?>
                            <a href="<?= base_url('admin/dashboard') ?>" class="<?= (isset($active) && $active == 'dashboard') ? 'text-red-400 font-semibold' : 'text-gray-300 hover:text-red-400' ?>">Dashboard</a>
                            <a href="<?= base_url('admin/barang') ?>" class="<?= (isset($active) && $active == 'barang') ? 'text-red-400 font-semibold' : 'text-gray-300 hover:text-red-400' ?>">Barang</a>
                            <a href="<?= base_url('admin/peminjaman') ?>" class="<?= (isset($active) && $active == 'peminjaman') ? 'text-red-400 font-semibold' : 'text-gray-300 hover:text-red-400' ?>">Peminjaman</a>
                        <?php else: ?>
                            <a href="<?= base_url('user/dashboard') ?>" class="<?= (isset($active) && $active == 'dashboard') ? 'text-red-400 font-semibold' : 'text-gray-300 hover:text-red-400' ?>">Dashboard</a>
                            <a href="<?= base_url('user/peminjaman') ?>" class="<?= (isset($active) && $active == 'peminjaman') ? 'text-red-400 font-semibold' : 'text-gray-300 hover:text-red-400' ?>">Peminjaman</a>
                        <?php endif; ?>
                    <?php endif; ?>
                </div>

                <div class="flex items-center space-x-4">
                    <?php if (session()->get('isLoggedIn')): ?>
                        <div class="flex items-center space-x-2">
                            <div class="w-8 h-8 bg-red-500 rounded-full flex items-center justify-center">
                                <span class="text-white font-semibold"><?= substr(session()->get('nama'), 0, 1) ?></span>
                            </div>
                            <div class="hidden md:block">
                                <p class="text-sm"><?= session()->get('nama') ?></p>
                                <p class="text-xs text-gray-400"><?= ucfirst(session()->get('role')) ?></p>
                            </div>
                        </div>
                        <a href="<?= base_url('auth/logout') ?>" class="bg-red-600 hover:bg-red-700 text-white px-4 py-2 rounded-lg font-semibold transition duration-300">
                            Logout
                        </a>
                    <?php else: ?>
                        <a href="<?= base_url('auth/login') ?>" class="text-gray-300 hover:text-red-400">Login</a>
                        <a href="<?= base_url('auth/register') ?>" class="bg-red-600 hover:bg-red-700 text-white px-4 py-2 rounded-lg font-semibold transition duration-300">
                            Register
                        </a>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </nav>

    <!-- Flash Messages -->
    <?php if (session()->getFlashdata('success')): ?>
        <div class="container mx-auto px-4 mt-4">
            <div class="bg-green-900 border-l-4 border-green-500 text-green-100 p-4 rounded">
                <p><?= session()->getFlashdata('success') ?></p>
            </div>
        </div>
    <?php endif; ?>

    <?php if (session()->getFlashdata('error')): ?>
        <div class="container mx-auto px-4 mt-4">
            <div class="bg-red-900 border-l-4 border-red-500 text-red-100 p-4 rounded">
                <p><?= session()->getFlashdata('error') ?></p>
            </div>
        </div>
    <?php endif; ?>

    <!-- Main Content -->
    <main class="container mx-auto px-4 py-8">
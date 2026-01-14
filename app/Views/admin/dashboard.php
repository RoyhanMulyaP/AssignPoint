<?= $this->extend('templates/header-admin') ?>
<?= $this->section('content') ?>

<div class="flex h-screen overflow-hidden">
    <!-- Sidebar -->
    <!-- Sidebar Admin (Perbaikan) -->
    <aside id="sidebar" class="fixed lg:relative z-50 w-64 bg-gray-900 border-r border-gray-800 transform lg:translate-x-0 transition-transform duration-300 ease-in-out h-full flex flex-col">
        <div class="p-6 flex-shrink-0">
            <!-- Logo -->
            <div class="flex items-center space-x-3">
                <div class="w-10 h-10 bg-red-600 rounded-lg flex items-center justify-center">
                    <span class="font-bold text-white text-xl">AP</span>
                </div>
                <div>
                    <h2 class="text-xl font-bold text-white">Assign<span class="text-red-500">Point</span></h2>
                    <p class="text-xs text-gray-400">Admin Panel</p>
                </div>
            </div>

            <!-- User Profile -->
            <div class="mt-8 p-4 bg-gray-800/50 rounded-xl border border-gray-700">
                <div class="flex items-center space-x-3">
                    <div class="w-12 h-12 rounded-full bg-gradient-to-br from-red-700 to-red-900 flex items-center justify-center">
                        <i class="fas fa-user-cog text-white"></i>
                    </div>
                    <div class="flex-1">
                        <h4 class="font-semibold text-white"><?= session()->get('name') ?? 'Admin' ?></h4>
                        <p class="text-xs text-gray-400">Administrator</p>
                    </div>
                </div>
                <div class="mt-4 grid grid-cols-2 gap-2">
                    <div class="text-center p-2 bg-gray-800 rounded-lg">
                        <p class="text-xs text-gray-400">Role</p>
                        <p class="text-sm font-bold text-red-400">Admin</p>
                    </div>
                    <div class="text-center p-2 bg-gray-800 rounded-lg">
                        <p class="text-xs text-gray-400">Status</p>
                        <p class="text-sm font-bold text-green-400">Online</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Scrollable Navigation Area -->
        <div class="flex-1 overflow-y-auto px-6 pb-6">
            <!-- Navigation -->
            <nav class="mb-8">
                <p class="text-xs uppercase text-gray-500 font-semibold mb-4">Main Menu</p>
                <ul class="space-y-2">
                    <li>
                        <a href="<?= base_url('admin/dashboard') ?>" class="sidebar-item flex items-center space-x-3 p-3 rounded-xl text-white hover:bg-gray-800 transition-colors duration-200 active">
                            <i class="fas fa-tachometer-alt w-5 text-center text-red-400"></i>
                            <span>Dashboard</span>
                        </a>
                    </li>
                    <li>
                        <a href="<?= base_url('admin/inventory') ?>" class="sidebar-item flex items-center space-x-3 p-3 rounded-xl text-gray-300 hover:bg-gray-800 hover:text-white transition-colors duration-200">
                            <i class="fas fa-boxes w-5 text-center"></i>
                            <span>Inventaris</span>
                            <span class="ml-auto bg-red-900 text-red-300 text-xs px-2 py-1 rounded-full">15</span>
                        </a>
                    </li>
                    <li>
                        <a href="<?= base_url('admin/loans') ?>" class="sidebar-item flex items-center space-x-3 p-3 rounded-xl text-gray-300 hover:bg-gray-800 hover:text-white transition-colors duration-200">
                            <i class="fas fa-exchange-alt w-5 text-center"></i>
                            <span>Loan Management</span>
                            <span class="ml-auto bg-red-900 text-red-300 text-xs px-2 py-1 rounded-full">8</span>
                        </a>
                    </li>
                    <li>
                        <a href="<?= base_url('admin/users') ?>" class="sidebar-item flex items-center space-x-3 p-3 rounded-xl text-gray-300 hover:bg-gray-800 hover:text-white transition-colors duration-200">
                            <i class="fas fa-users w-5 text-center"></i>
                            <span>User Management</span>
                            <span class="ml-auto bg-red-900 text-red-300 text-xs px-2 py-1 rounded-full">42</span>
                        </a>
                    </li>
                    <li>
                        <a href="<?= base_url('admin/reports') ?>" class="sidebar-item flex items-center space-x-3 p-3 rounded-xl text-gray-300 hover:bg-gray-800 hover:text-white transition-colors duration-200">
                            <i class="fas fa-chart-bar w-5 text-center"></i>
                            <span>Reports & Analytics</span>
                        </a>
                    </li>
                    <li>
                        <a href="<?= base_url('admin/categories') ?>" class="sidebar-item flex items-center space-x-3 p-3 rounded-xl text-gray-300 hover:bg-gray-800 hover:text-white transition-colors duration-200">
                            <i class="fas fa-tags w-5 text-center"></i>
                            <span>Categories</span>
                        </a>
                    </li>
                    <li>
                        <a href="<?= base_url('admin/locations') ?>" class="sidebar-item flex items-center space-x-3 p-3 rounded-xl text-gray-300 hover:bg-gray-800 hover:text-white transition-colors duration-200">
                            <i class="fas fa-map-marker-alt w-5 text-center"></i>
                            <span>Locations</span>
                        </a>
                    </li>
                    <li>
                        <a href="<?= base_url('admin/maintenance') ?>" class="sidebar-item flex items-center space-x-3 p-3 rounded-xl text-gray-300 hover:bg-gray-800 hover:text-white transition-colors duration-200">
                            <i class="fas fa-tools w-5 text-center"></i>
                            <span>Maintenance</span>
                            <span class="ml-auto bg-yellow-900 text-yellow-300 text-xs px-2 py-1 rounded-full">5</span>
                        </a>
                    </li>
                </ul>

                <p class="text-xs uppercase text-gray-500 font-semibold mt-8 mb-4">Settings</p>
                <ul class="space-y-2">
                    <li>
                        <a href="<?= base_url('admin/settings') ?>" class="sidebar-item flex items-center space-x-3 p-3 rounded-xl text-gray-300 hover:bg-gray-800 hover:text-white transition-colors duration-200">
                            <i class="fas fa-cog w-5 text-center"></i>
                            <span>System Settings</span>
                        </a>
                    </li>
                    <li>
                        <a href="<?= base_url('admin/audit') ?>" class="sidebar-item flex items-center space-x-3 p-3 rounded-xl text-gray-300 hover:bg-gray-800 hover:text-white transition-colors duration-200">
                            <i class="fas fa-clipboard-list w-5 text-center"></i>
                            <span>Audit Log</span>
                        </a>
                    </li>
                    <li>
                        <a href="<?= base_url('admin/backup') ?>" class="sidebar-item flex items-center space-x-3 p-3 rounded-xl text-gray-300 hover:bg-gray-800 hover:text-white transition-colors duration-200">
                            <i class="fas fa-database w-5 text-center"></i>
                            <span>Backup & Restore</span>
                        </a>
                    </li>
                    <li>
                        <a href="<?= base_url('admin/api') ?>" class="sidebar-item flex items-center space-x-3 p-3 rounded-xl text-gray-300 hover:bg-gray-800 hover:text-white transition-colors duration-200">
                            <i class="fas fa-code w-5 text-center"></i>
                            <span>API Settings</span>
                        </a>
                    </li>
                </ul>
            </nav>

            <!-- System Info -->
            <div class="mt-8 p-4 bg-gray-800/30 rounded-xl border border-gray-700">
                <p class="text-xs uppercase text-gray-500 font-semibold mb-3">System Info</p>
                <div class="space-y-2">
                    <div class="flex justify-between text-sm">
                        <span class="text-gray-400">Version</span>
                        <span class="text-white">v2.5.1</span>
                    </div>
                    <div class="flex justify-between text-sm">
                        <span class="text-gray-400">Last Backup</span>
                        <span class="text-green-400">12 Dec 2024</span>
                    </div>
                    <div class="flex justify-between text-sm">
                        <span class="text-gray-400">Storage</span>
                        <span class="text-yellow-400">78% used</span>
                    </div>
                </div>
            </div>
        </div>

        <!-- Logout Button (Fixed at bottom) -->
        <div class="p-6 border-t border-gray-800 flex-shrink-0">
            <a href="<?= base_url('auth/logout') ?>" class="flex items-center justify-center space-x-3 p-3 rounded-xl text-gray-300 hover:bg-red-900/30 hover:text-white transition-colors duration-200 border border-gray-700 hover:border-red-700">
                <i class="fas fa-sign-out-alt w-5 text-center"></i>
                <span>Logout</span>
            </a>
        </div>
    </aside>

    <!-- Main Content -->
    <div class="flex-1 flex flex-col overflow-hidden">
        <!-- Top Navigation -->
        <header class="bg-gray-900 border-b border-gray-800 py-4 px-6">
            <div class="flex items-center justify-between">
                <!-- Left: Hamburger and Breadcrumb -->
                <div class="flex items-center space-x-4">
                    <button onclick="toggleSidebar()" class="lg:hidden text-gray-400 hover:text-white">
                        <i class="fas fa-bars text-xl"></i>
                    </button>
                    <div class="hidden md:block">
                        <nav class="flex" aria-label="Breadcrumb">
                            <ol class="inline-flex items-center space-x-1 md:space-x-3">
                                <li class="inline-flex items-center">
                                    <a href="<?= base_url('admin/dashboard') ?>" class="inline-flex items-center text-sm font-medium text-gray-300 hover:text-white">
                                        <i class="fas fa-home mr-2"></i>
                                        Dashboard
                                    </a>
                                </li>
                                <li aria-current="page">
                                    <div class="flex items-center">
                                        <i class="fas fa-chevron-right text-gray-600 mx-2"></i>
                                        <span class="ml-1 text-sm font-medium text-red-400 md:ml-2">Overview</span>
                                    </div>
                                </li>
                            </ol>
                        </nav>
                    </div>
                </div>

                <!-- Right: Search, Notifications, User Menu -->
                <div class="flex items-center space-x-4">
                    <!-- Search -->
                    <div class="hidden md:block relative">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <i class="fas fa-search text-gray-500"></i>
                        </div>
                        <input type="text" class="bg-gray-800 border border-gray-700 text-white text-sm rounded-xl pl-10 p-2.5 focus:ring-2 focus:ring-red-600 focus:border-transparent w-64" placeholder="Search...">
                    </div>

                    <!-- Notifications -->
                    <div class="relative">
                        <button id="notificationBtn" onclick="toggleNotifications()" class="p-2 text-gray-400 hover:text-white relative">
                            <i class="fas fa-bell text-xl"></i>
                            <span class="absolute -top-1 -right-1 bg-red-600 text-white text-xs rounded-full w-5 h-5 flex items-center justify-center">3</span>
                        </button>
                        <div id="notificationDropdown" class="hidden absolute right-0 mt-2 w-80 bg-gray-800 border border-gray-700 rounded-xl shadow-xl z-50">
                            <div class="p-4 border-b border-gray-700">
                                <h3 class="font-semibold text-white">Notifications</h3>
                                <p class="text-xs text-gray-400">You have 3 new notifications</p>
                            </div>
                            <div class="max-h-96 overflow-y-auto">
                                <!-- Notification Items -->
                                <div class="p-4 border-b border-gray-700 hover:bg-gray-750 cursor-pointer">
                                    <div class="flex items-start">
                                        <div class="w-10 h-10 rounded-full bg-red-900/30 flex items-center justify-center mr-3">
                                            <i class="fas fa-exclamation-circle text-red-400"></i>
                                        </div>
                                        <div class="flex-1">
                                            <p class="text-sm text-white">New loan request from John Doe</p>
                                            <p class="text-xs text-gray-400 mt-1">2 minutes ago</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="p-4 border-b border-gray-700 hover:bg-gray-750 cursor-pointer">
                                    <div class="flex items-start">
                                        <div class="w-10 h-10 rounded-full bg-green-900/30 flex items-center justify-center mr-3">
                                            <i class="fas fa-check-circle text-green-400"></i>
                                        </div>
                                        <div class="flex-1">
                                            <p class="text-sm text-white">Item #INV-0452 has been returned</p>
                                            <p class="text-xs text-gray-400 mt-1">1 hour ago</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="p-4 hover:bg-gray-750 cursor-pointer">
                                    <div class="flex items-start">
                                        <div class="w-10 h-10 rounded-full bg-blue-900/30 flex items-center justify-center mr-3">
                                            <i class="fas fa-info-circle text-blue-400"></i>
                                        </div>
                                        <div class="flex-1">
                                            <p class="text-sm text-white">System maintenance scheduled</p>
                                            <p class="text-xs text-gray-400 mt-1">Yesterday</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="p-4 border-t border-gray-700">
                                <a href="#" class="text-red-400 hover:text-red-300 text-sm font-medium">View all notifications</a>
                            </div>
                        </div>
                    </div>

                    <!-- User Menu -->
                    <div class="relative">
                        <button id="userBtn" onclick="toggleUserMenu()" class="flex items-center space-x-3 p-2 rounded-xl hover:bg-gray-800">
                            <div class="w-10 h-10 rounded-full bg-gradient-to-br from-red-700 to-red-900 flex items-center justify-center">
                                <i class="fas fa-user-cog text-white"></i>
                            </div>
                            <div class="hidden md:block text-left">
                                <p class="text-sm font-medium text-white"><?= session()->get('name') ?? 'Admin' ?></p>
                                <p class="text-xs text-gray-400">Administrator</p>
                            </div>
                            <i class="fas fa-chevron-down text-gray-400 hidden md:block"></i>
                        </button>
                        <div id="userDropdown" class="hidden absolute right-0 mt-2 w-48 bg-gray-800 border border-gray-700 rounded-xl shadow-xl z-50">
                            <div class="p-4 border-b border-gray-700">
                                <p class="text-sm text-white">Signed in as</p>
                                <p class="text-sm font-medium text-red-400"><?= session()->get('email') ?? 'admin@assignpoint.com' ?></p>
                            </div>
                            <div class="py-2">
                                <a href="<?= base_url('admin/profile') ?>" class="flex items-center px-4 py-2 text-sm text-gray-300 hover:bg-gray-750 hover:text-white">
                                    <i class="fas fa-user mr-3 w-5"></i>
                                    My Profile
                                </a>
                                <a href="<?= base_url('admin/settings') ?>" class="flex items-center px-4 py-2 text-sm text-gray-300 hover:bg-gray-750 hover:text-white">
                                    <i class="fas fa-cog mr-3 w-5"></i>
                                    Settings
                                </a>
                                <a href="<?= base_url('admin/help') ?>" class="flex items-center px-4 py-2 text-sm text-gray-300 hover:bg-gray-750 hover:text-white">
                                    <i class="fas fa-question-circle mr-3 w-5"></i>
                                    Help & Support
                                </a>
                            </div>
                            <div class="py-2 border-t border-gray-700">
                                <a href="<?= base_url('auth/logout') ?>" class="flex items-center px-4 py-2 text-sm text-red-400 hover:bg-red-900/30">
                                    <i class="fas fa-sign-out-alt mr-3 w-5"></i>
                                    Logout
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </header>

        <!-- Main Content Area -->
        <main class="flex-1 overflow-y-auto p-6 gradient-bg">
            <!-- Welcome Section -->
            <div class="mb-8">
                <!-- <h1 class="text-3xl font-bold text-white mb-2">Welcome back, <?= session()->get('name') ?? 'Admin' ?>! 👋</h1>
                <p class="text-gray-400">Here's what's happening with y our inventory management system today.</p> -->
                <div class="flex items-center mt-2 text-sm text-gray-400">
                    <i class="far fa-clock mr-2"></i>
                    <span>Current time: <span id="currentTime" class="text-red-400 font-semibold">--:--</span></span>
                    <span class="mx-2">•</span>
                    <i class="fas fa-server mr-2"></i>
                    <span>System status: <span class="text-green-400 font-semibold">All systems operational</span></span>
                </div>
            </div>

            <!-- Stats Cards -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
                <!-- Total Items -->
                <div class="bg-gray-800/70 border border-gray-700 rounded-2xl p-6 card-hover">
                    <div class="flex justify-between items-start">
                        <div>
                            <p class="text-gray-400 text-sm mb-1">Total Items</p>
                            <h3 class="text-3xl font-bold text-white">1,248</h3>
                            <p class="text-green-400 text-sm mt-2">
                                <i class="fas fa-arrow-up mr-1"></i>
                                12.5% from last month
                            </p>
                        </div>
                        <div class="w-14 h-14 rounded-xl bg-red-900/30 flex items-center justify-center">
                            <i class="fas fa-boxes text-2xl text-red-400"></i>
                        </div>
                    </div>
                </div>

                <!-- Active Loans -->
                <div class="bg-gray-800/70 border border-gray-700 rounded-2xl p-6 card-hover">
                    <div class="flex justify-between items-start">
                        <div>
                            <p class="text-gray-400 text-sm mb-1">Active Loans</p>
                            <h3 class="text-3xl font-bold text-white">42</h3>
                            <p class="text-yellow-400 text-sm mt-2">
                                <i class="fas fa-clock mr-1"></i>
                                8 overdue items
                            </p>
                        </div>
                        <div class="w-14 h-14 rounded-xl bg-yellow-900/30 flex items-center justify-center">
                            <i class="fas fa-exchange-alt text-2xl text-yellow-400"></i>
                        </div>
                    </div>
                </div>

                <!-- Total Users -->
                <div class="bg-gray-800/70 border border-gray-700 rounded-2xl p-6 card-hover">
                    <div class="flex justify-between items-start">
                        <div>
                            <p class="text-gray-400 text-sm mb-1">Total Users</p>
                            <h3 class="text-3xl font-bold text-white">156</h3>
                            <p class="text-blue-400 text-sm mt-2">
                                <i class="fas fa-user-plus mr-1"></i>
                                5 new this week
                            </p>
                        </div>
                        <div class="w-14 h-14 rounded-xl bg-blue-900/30 flex items-center justify-center">
                            <i class="fas fa-users text-2xl text-blue-400"></i>
                        </div>
                    </div>
                </div>

                <!-- System Health -->
                <div class="bg-gray-800/70 border border-gray-700 rounded-2xl p-6 card-hover">
                    <div class="flex justify-between items-start">
                        <div>
                            <p class="text-gray-400 text-sm mb-1">System Health</p>
                            <h3 class="text-3xl font-bold text-white">99.8%</h3>
                            <p class="text-green-400 text-sm mt-2">
                                <i class="fas fa-check-circle mr-1"></i>
                                All systems normal
                            </p>
                        </div>
                        <div class="w-14 h-14 rounded-xl bg-green-900/30 flex items-center justify-center">
                            <i class="fas fa-heartbeat text-2xl text-green-400"></i>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Charts Section -->
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 mb-8">
                <!-- Loan Activity Chart -->
                <div class="bg-gray-800/70 border border-gray-700 rounded-2xl p-6">
                    <div class="flex justify-between items-center mb-6">
                        <h3 class="text-xl font-bold text-white">Loan Activity</h3>
                        <select class="bg-gray-900 border border-gray-700 text-white text-sm rounded-xl px-4 py-2 focus:ring-2 focus:ring-red-600 focus:border-transparent">
                            <option>Last 7 days</option>
                            <option>Last 30 days</option>
                            <option>Last 90 days</option>
                        </select>
                    </div>
                    <div class="h-80 flex items-center justify-center">
                        <div class="text-center">
                            <div class="w-64 h-64 mx-auto mb-4 relative">
                                <!-- Dummy chart - replace with actual chart library -->
                                <div class="absolute inset-0 flex items-center justify-center">
                                    <div class="text-center">
                                        <div class="text-4xl font-bold text-red-400 mb-2">42</div>
                                        <div class="text-gray-400">Active Loans</div>
                                    </div>
                                </div>
                                <svg viewBox="0 0 100 100" class="w-full h-full">
                                    <circle cx="50" cy="50" r="40" stroke="#1e293b" stroke-width="8" fill="transparent" />
                                    <circle cx="50" cy="50" r="40" stroke="#dc2626" stroke-width="8" fill="transparent" stroke-dasharray="251.2" stroke-dashoffset="100" stroke-linecap="round" transform="rotate(-90 50 50)" />
                                </svg>
                            </div>
                            <p class="text-gray-400">Loan distribution across departments</p>
                        </div>
                    </div>
                </div>

                <!-- Inventory Status -->
                <div class="bg-gray-800/70 border border-gray-700 rounded-2xl p-6">
                    <div class="flex justify-between items-center mb-6">
                        <h3 class="text-xl font-bold text-white">Inventory Status</h3>
                        <button class="bg-red-900/50 hover:bg-red-800 text-white px-4 py-2 rounded-xl text-sm font-medium transition-colors duration-200">
                            <i class="fas fa-plus mr-2"></i>
                            Add Item
                        </button>
                    </div>
                    <div class="space-y-4">
                        <div>
                            <div class="flex justify-between text-sm mb-1">
                                <span class="text-gray-300">Available Items</span>
                                <span class="text-white font-semibold">824</span>
                            </div>
                            <div class="w-full bg-gray-700 rounded-full h-2.5">
                                <div class="bg-green-500 h-2.5 rounded-full" style="width: 66%"></div>
                            </div>
                        </div>
                        <div>
                            <div class="flex justify-between text-sm mb-1">
                                <span class="text-gray-300">On Loan</span>
                                <span class="text-white font-semibold">42</span>
                            </div>
                            <div class="w-full bg-gray-700 rounded-full h-2.5">
                                <div class="bg-yellow-500 h-2.5 rounded-full" style="width: 3.4%"></div>
                            </div>
                        </div>
                        <div>
                            <div class="flex justify-between text-sm mb-1">
                                <span class="text-gray-300">Under Maintenance</span>
                                <span class="text-white font-semibold">18</span>
                            </div>
                            <div class="w-full bg-gray-700 rounded-full h-2.5">
                                <div class="bg-blue-500 h-2.5 rounded-full" style="width: 1.4%"></div>
                            </div>
                        </div>
                        <div>
                            <div class="flex justify-between text-sm mb-1">
                                <span class="text-gray-300">Retired/Damaged</span>
                                <span class="text-white font-semibold">12</span>
                            </div>
                            <div class="w-full bg-gray-700 rounded-full h-2.5">
                                <div class="bg-red-500 h-2.5 rounded-full" style="width: 1%"></div>
                            </div>
                        </div>
                    </div>
                    <div class="mt-8 pt-6 border-t border-gray-700">
                        <h4 class="text-lg font-semibold text-white mb-4">Quick Actions</h4>
                        <div class="grid grid-cols-2 gap-3">
                            <a href="<?= base_url('admin/loans/new') ?>" class="bg-gray-900 hover:bg-gray-800 border border-gray-700 rounded-xl p-4 text-center transition-colors duration-200">
                                <i class="fas fa-plus-circle text-red-400 text-xl mb-2"></i>
                                <p class="text-sm font-medium text-white">New Loan</p>
                            </a>
                            <a href="<?= base_url('admin/inventory/add') ?>" class="bg-gray-900 hover:bg-gray-800 border border-gray-700 rounded-xl p-4 text-center transition-colors duration-200">
                                <i class="fas fa-box text-red-400 text-xl mb-2"></i>
                                <p class="text-sm font-medium text-white">Add Item</p>
                            </a>
                            <a href="<?= base_url('admin/reports') ?>" class="bg-gray-900 hover:bg-gray-800 border border-gray-700 rounded-xl p-4 text-center transition-colors duration-200">
                                <i class="fas fa-chart-bar text-red-400 text-xl mb-2"></i>
                                <p class="text-sm font-medium text-white">Generate Report</p>
                            </a>
                            <a href="<?= base_url('admin/users/add') ?>" class="bg-gray-900 hover:bg-gray-800 border border-gray-700 rounded-xl p-4 text-center transition-colors duration-200">
                                <i class="fas fa-user-plus text-red-400 text-xl mb-2"></i>
                                <p class="text-sm font-medium text-white">Add User</p>
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Recent Activity & Pending Requests -->
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
                <!-- Recent Activity -->
                <div class="bg-gray-800/70 border border-gray-700 rounded-2xl p-6">
                    <h3 class="text-xl font-bold text-white mb-6">Recent Activity</h3>
                    <div class="space-y-4">
                        <div class="flex items-center p-3 hover:bg-gray-750 rounded-xl transition-colors duration-200">
                            <div class="w-10 h-10 rounded-full bg-red-900/30 flex items-center justify-center mr-4">
                                <i class="fas fa-exchange-alt text-red-400"></i>
                            </div>
                            <div class="flex-1">
                                <p class="text-white font-medium">New loan request submitted</p>
                                <p class="text-sm text-gray-400">John Doe requested "Laptop Dell XPS 15"</p>
                            </div>
                            <div class="text-right">
                                <p class="text-xs text-gray-400">10 min ago</p>
                                <span class="inline-block mt-1 px-2 py-1 text-xs bg-yellow-900/30 text-yellow-400 rounded-full">Pending</span>
                            </div>
                        </div>
                        <div class="flex items-center p-3 hover:bg-gray-750 rounded-xl transition-colors duration-200">
                            <div class="w-10 h-10 rounded-full bg-green-900/30 flex items-center justify-center mr-4">
                                <i class="fas fa-check-circle text-green-400"></i>
                            </div>
                            <div class="flex-1">
                                <p class="text-white font-medium">Loan returned successfully</p>
                                <p class="text-sm text-gray-400">Sarah returned "Projector Epson EB-X41"</p>
                            </div>
                            <div class="text-right">
                                <p class="text-xs text-gray-400">1 hour ago</p>
                                <span class="inline-block mt-1 px-2 py-1 text-xs bg-green-900/30 text-green-400 rounded-full">Completed</span>
                            </div>
                        </div>
                        <div class="flex items-center p-3 hover:bg-gray-750 rounded-xl transition-colors duration-200">
                            <div class="w-10 h-10 rounded-full bg-blue-900/30 flex items-center justify-center mr-4">
                                <i class="fas fa-user-plus text-blue-400"></i>
                            </div>
                            <div class="flex-1">
                                <p class="text-white font-medium">New user registered</p>
                                <p class="text-sm text-gray-400">Michael Chen joined the system</p>
                            </div>
                            <div class="text-right">
                                <p class="text-xs text-gray-400">2 hours ago</p>
                                <span class="inline-block mt-1 px-2 py-1 text-xs bg-blue-900/30 text-blue-400 rounded-full">User</span>
                            </div>
                        </div>
                        <div class="flex items-center p-3 hover:bg-gray-750 rounded-xl transition-colors duration-200">
                            <div class="w-10 h-10 rounded-full bg-purple-900/30 flex items-center justify-center mr-4">
                                <i class="fas fa-tools text-purple-400"></i>
                            </div>
                            <div class="flex-1">
                                <p class="text-white font-medium">Item marked for maintenance</p>
                                <p class="text-sm text-gray-400">"Scanner Canon DR-C240" needs repair</p>
                            </div>
                            <div class="text-right">
                                <p class="text-xs text-gray-400">5 hours ago</p>
                                <span class="inline-block mt-1 px-2 py-1 text-xs bg-purple-900/30 text-purple-400 rounded-full">Maintenance</span>
                            </div>
                        </div>
                    </div>
                    <div class="mt-6 text-center">
                        <a href="<?= base_url('admin/activity') ?>" class="text-red-400 hover:text-red-300 font-medium">
                            View all activity
                            <i class="fas fa-arrow-right ml-2"></i>
                        </a>
                    </div>
                </div>

                <!-- Pending Requests -->
                <div class="bg-gray-800/70 border border-gray-700 rounded-2xl p-6">
                    <div class="flex justify-between items-center mb-6">
                        <h3 class="text-xl font-bold text-white">Pending Requests</h3>
                        <span class="bg-red-900 text-red-300 text-sm px-3 py-1 rounded-full">8 requests</span>
                    </div>
                    <div class="space-y-4">
                        <div class="p-4 border border-gray-700 rounded-xl hover:border-red-700 transition-colors duration-200">
                            <div class="flex justify-between items-start mb-2">
                                <div>
                                    <h4 class="font-semibold text-white">Laptop MacBook Pro 16"</h4>
                                    <p class="text-sm text-gray-400">Requested by: John Doe</p>
                                </div>
                                <span class="px-3 py-1 bg-yellow-900/30 text-yellow-400 text-xs rounded-full">High Priority</span>
                            </div>
                            <p class="text-gray-300 text-sm mb-4">For design team project, needed for 2 weeks</p>
                            <div class="flex justify-between">
                                <span class="text-gray-400 text-sm"><i class="far fa-calendar mr-1"></i> Due: Dec 20, 2024</span>
                                <div class="space-x-2">
                                    <button class="px-4 py-2 bg-red-900 hover:bg-red-800 text-white text-sm font-medium rounded-xl transition-colors duration-200">
                                        Approve
                                    </button>
                                    <button class="px-4 py-2 bg-gray-700 hover:bg-gray-600 text-white text-sm font-medium rounded-xl transition-colors duration-200">
                                        Review
                                    </button>
                                </div>
                            </div>
                        </div>
                        <div class="p-4 border border-gray-700 rounded-xl hover:border-red-700 transition-colors duration-200">
                            <div class="flex justify-between items-start mb-2">
                                <div>
                                    <h4 class="font-semibold text-white">Projector Epson EB-X41</h4>
                                    <p class="text-sm text-gray-400">Requested by: Sarah Miller</p>
                                </div>
                                <span class="px-3 py-1 bg-blue-900/30 text-blue-400 text-xs rounded-full">Medium Priority</span>
                            </div>
                            <p class="text-gray-300 text-sm mb-4">For conference room presentation tomorrow</p>
                            <div class="flex justify-between">
                                <span class="text-gray-400 text-sm"><i class="far fa-calendar mr-1"></i> Due: Dec 15, 2024</span>
                                <div class="space-x-2">
                                    <button class="px-4 py-2 bg-red-900 hover:bg-red-800 text-white text-sm font-medium rounded-xl transition-colors duration-200">
                                        Approve
                                    </button>
                                    <button class="px-4 py-2 bg-gray-700 hover:bg-gray-600 text-white text-sm font-medium rounded-xl transition-colors duration-200">
                                        Review
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="mt-6 text-center">
                        <a href="<?= base_url('admin/loans') ?>" class="inline-flex items-center justify-center w-full py-3 bg-gray-900 hover:bg-gray-800 border border-gray-700 rounded-xl font-medium text-white transition-colors duration-200">
                            <i class="fas fa-list mr-2"></i>
                            View all pending requests
                        </a>
                    </div>
                </div>
            </div>
        </main>
    </div>
</div>
<?= $this->endSection() ?>
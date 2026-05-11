<!-- Sidebar Admin -->
<aside id="sidebar" class="fixed lg:relative z-50 w-64 bg-gray-900 border-r border-gray-800 transform lg:translate-x-0 transition-transform duration-300 ease-in-out h-full flex flex-col">
    <div class="p-6 flex-shrink-0">
        <!-- Logo -->
        <div class="flex items-center space-x-3">
            <div class="relative">
                <div class="absolute -inset-0.5 bg-gradient-to-r from-red-600 to-red-900 rounded-lg blur opacity-25"></div>
                <div class="relative w-10 h-10 bg-gray-900 rounded-lg flex items-center justify-center border border-gray-800">
                    <svg class="w-6 h-6 text-red-500" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"></path>
                    </svg>
                </div>
            </div>
            <div>
                <h2 class="text-xl font-black tracking-tighter text-white">ASSIGN<span class="text-red-600">POINT</span></h2>
                <p class="text-[10px] text-gray-500 uppercase tracking-wider font-bold">Admin Panel</p>
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
        </div>
    </div>

    <!-- Scrollable Navigation Area -->
    <div class="flex-1 overflow-y-auto px-6 pb-6">
        <!-- Navigation -->
        <nav class="mb-8">
            <p class="text-xs uppercase text-gray-500 font-semibold mb-4">Main Menu</p>
            <ul class="space-y-2">
                <li>
                    <a href="<?= base_url('admin/dashboard') ?>" class="sidebar-item flex items-center space-x-3 p-3 rounded-xl text-white hover:bg-gray-800 transition-colors duration-200 <?= current_url() == base_url('admin/dashboard') ? 'active' : '' ?>">
                        <i class="fas fa-tachometer-alt w-5 text-center text-red-400"></i>
                        <span>Dashboard</span>
                    </a>
                </li>
                <li>
                    <a href="<?= base_url('admin/inventaris') ?>" class="sidebar-item flex items-center space-x-3 p-3 rounded-xl text-gray-300 hover:bg-gray-800 hover:text-white transition-colors duration-200 <?= strpos(current_url(), 'inventaris') !== false ? 'active' : '' ?>">
                        <i class="fas fa-boxes w-5 text-center"></i>
                        <span>Inventaris</span>
                    </a>
                </li>
                <li>
                    <a href="<?= base_url('admin/loans') ?>" class="sidebar-item flex items-center space-x-3 p-3 rounded-xl text-gray-300 hover:bg-gray-800 hover:text-white transition-colors duration-200 <?= strpos(current_url(), 'loans') !== false ? 'active' : '' ?>">
                        <i class="fas fa-exchange-alt w-5 text-center"></i>
                        <span>Loan Management</span>
                    </a>
                </li>
                <li>
                    <a href="<?= base_url('admin/users') ?>" class="sidebar-item flex items-center space-x-3 p-3 rounded-xl text-gray-300 hover:bg-gray-800 hover:text-white transition-colors duration-200 <?= strpos(current_url(), 'users') !== false ? 'active' : '' ?>">
                        <i class="fas fa-users w-5 text-center"></i>
                        <span>User Management</span>
                    </a>
                </li>
                <li>
                    <a href="<?= base_url('admin/reports') ?>" class="sidebar-item flex items-center space-x-3 p-3 rounded-xl text-gray-300 hover:bg-gray-800 hover:text-white transition-colors duration-200 <?= strpos(current_url(), 'reports') !== false ? 'active' : '' ?>">
                        <i class="fas fa-chart-bar w-5 text-center"></i>
                        <span>Reports & Analytics</span>
                    </a>
                </li>
                <li>
                    <a href="<?= base_url('admin/categories') ?>" class="sidebar-item flex items-center space-x-3 p-3 rounded-xl text-gray-300 hover:bg-gray-800 hover:text-white transition-colors duration-200 <?= strpos(current_url(), 'categories') !== false ? 'active' : '' ?>">
                        <i class="fas fa-tags w-5 text-center"></i>
                        <span>Categories</span>
                    </a>
                </li>
                <li>
                    <a href="<?= base_url('admin/locations') ?>" class="sidebar-item flex items-center space-x-3 p-3 rounded-xl text-gray-300 hover:bg-gray-800 hover:text-white transition-colors duration-200 <?= strpos(current_url(), 'locations') !== false ? 'active' : '' ?>">
                        <i class="fas fa-map-marker-alt w-5 text-center"></i>
                        <span>Locations</span>
                    </a>
                </li>
                <li>
                    <a href="<?= base_url('admin/maintenance') ?>" class="sidebar-item flex items-center space-x-3 p-3 rounded-xl text-gray-300 hover:bg-gray-800 hover:text-white transition-colors duration-200 <?= strpos(current_url(), 'maintenance') !== false ? 'active' : '' ?>">
                        <i class="fas fa-tools w-5 text-center"></i>
                        <span>Maintenance</span>
                    </a>
                </li>
            </ul>

            <p class="text-xs uppercase text-gray-500 font-semibold mt-8 mb-4">Settings</p>
            <ul class="space-y-2">
                <li>
                    <a href="<?= base_url('admin/settings') ?>" class="sidebar-item flex items-center space-x-3 p-3 rounded-xl text-gray-300 hover:bg-gray-800 hover:text-white transition-colors duration-200 <?= strpos(current_url(), 'settings') !== false ? 'active' : '' ?>">
                        <i class="fas fa-cog w-5 text-center"></i>
                        <span>System Settings</span>
                    </a>
                </li>
                <li>
                    <a href="<?= base_url('admin/audit') ?>" class="sidebar-item flex items-center space-x-3 p-3 rounded-xl text-gray-300 hover:bg-gray-800 hover:text-white transition-colors duration-200 <?= strpos(current_url(), 'audit') !== false ? 'active' : '' ?>">
                        <i class="fas fa-clipboard-list w-5 text-center"></i>
                        <span>Audit Log</span>
                    </a>
                </li>
            </ul>
        </nav>
    </div>

    <!-- Logout Button -->
    <div class="p-6 border-t border-gray-800 flex-shrink-0">
        <a href="<?= base_url('auth/logout') ?>" class="flex items-center justify-center space-x-3 p-3 rounded-xl text-gray-300 hover:bg-red-900/30 hover:text-white transition-colors duration-200 border border-gray-700 hover:border-red-700">
            <i class="fas fa-sign-out-alt w-5 text-center"></i>
            <span>Logout</span>
        </a>
    </div>
</aside>

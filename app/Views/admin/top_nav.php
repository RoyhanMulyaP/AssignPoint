<!-- Top Navigation -->
<header class="bg-gray-900 border-b border-gray-800 py-4 px-6">
    <div class="flex items-center justify-between">
        <!-- Left -->
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
                        <?php if (isset($title)): ?>
                        <li aria-current="page">
                            <div class="flex items-center">
                                <i class="fas fa-chevron-right text-gray-600 mx-2"></i>
                                <span class="ml-1 text-sm font-medium text-red-400 md:ml-2"><?= $title ?></span>
                            </div>
                        </li>
                        <?php endif; ?>
                    </ol>
                </nav>
            </div>
        </div>

        <!-- Right -->
        <div class="flex items-center space-x-4">


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
            </div>
        </div>
    </div>
</header>

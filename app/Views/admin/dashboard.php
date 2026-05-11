<?= $this->extend('templates/header-admin') ?>
<?= $this->section('content') ?>

<div class="flex h-screen overflow-hidden">
    <!-- Sidebar -->
    <?= $this->include('admin/sidebar') ?>

    <!-- Main Content -->
    <div class="flex-1 flex flex-col overflow-hidden">
        <!-- Top Navigation -->
        <?= $this->include('admin/top_nav') ?>

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
                            <h3 class="text-3xl font-bold text-white"><?= number_format($totalItems) ?></h3>
                            <p class="text-green-400 text-sm mt-2">
                                <i class="fas fa-check-circle mr-1"></i>
                                Managed Assets
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
                            <h3 class="text-3xl font-bold text-white"><?= number_format($activeLoans) ?></h3>
                            <p class="text-yellow-400 text-sm mt-2">
                                <i class="fas fa-clock mr-1"></i>
                                Currently out
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
                            <h3 class="text-3xl font-bold text-white"><?= number_format($totalUsers) ?></h3>
                            <p class="text-blue-400 text-sm mt-2">
                                <i class="fas fa-user-check mr-1"></i>
                                Active accounts
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
                            <p class="text-gray-400 text-sm mb-1">Maintenance</p>
                            <h3 class="text-3xl font-bold text-white"><?= number_format($underMaintenance) ?></h3>
                            <p class="text-purple-400 text-sm mt-2">
                                <i class="fas fa-tools mr-1"></i>
                                Items in repair
                            </p>
                        </div>
                        <div class="w-14 h-14 rounded-xl bg-purple-900/30 flex items-center justify-center">
                            <i class="fas fa-heartbeat text-2xl text-purple-400"></i>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Charts & Quick Actions -->
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 mb-8">
                <!-- Inventory Status -->
                <div class="bg-gray-800/70 border border-gray-700 rounded-2xl p-6">
                    <div class="flex justify-between items-center mb-6">
                        <h3 class="text-xl font-bold text-white">Inventory Status</h3>
                        <a href="<?= base_url('admin/inventaris') ?>" class="bg-red-900/50 hover:bg-red-800 text-white px-4 py-2 rounded-xl text-sm font-medium transition-colors duration-200">
                            <i class="fas fa-plus mr-2"></i>
                            Add Item
                        </a>
                    </div>
                    <div class="space-y-4">
                        <?php
                        $total = max(1, $inventoryStats['available'] + $inventoryStats['onLoan']);
                        ?>
                        <div>
                            <div class="flex justify-between text-sm mb-1">
                                <span class="text-gray-300">Available Items</span>
                                <span class="text-white font-semibold"><?= $inventoryStats['available'] ?></span>
                            </div>
                            <div class="w-full bg-gray-700 rounded-full h-2.5">
                                <div class="bg-green-500 h-2.5 rounded-full" style="width: <?= ($inventoryStats['available'] / $total) * 100 ?>%"></div>
                            </div>
                        </div>
                        <div>
                            <div class="flex justify-between text-sm mb-1">
                                <span class="text-gray-300">On Loan</span>
                                <span class="text-white font-semibold"><?= $inventoryStats['onLoan'] ?></span>
                            </div>
                            <div class="w-full bg-gray-700 rounded-full h-2.5">
                                <div class="bg-yellow-500 h-2.5 rounded-full" style="width: <?= ($inventoryStats['onLoan'] / $total) * 100 ?>%"></div>
                            </div>
                        </div>
                    </div>
                    <div class="mt-8 pt-6 border-t border-gray-700">
                        <h4 class="text-lg font-semibold text-white mb-4">Quick Actions</h4>
                        <div class="grid grid-cols-2 gap-3">
                            <a href="<?= base_url('admin/loans') ?>" class="bg-gray-900 hover:bg-gray-800 border border-gray-700 rounded-xl p-4 text-center transition-colors duration-200">
                                <i class="fas fa-exchange-alt text-red-400 text-xl mb-2"></i>
                                <p class="text-sm font-medium text-white">Manage Loans</p>
                            </a>
                            <a href="<?= base_url('admin/inventaris') ?>" class="bg-gray-900 hover:bg-gray-800 border border-gray-700 rounded-xl p-4 text-center transition-colors duration-200">
                                <i class="fas fa-box text-red-400 text-xl mb-2"></i>
                                <p class="text-sm font-medium text-white">Inventory</p>
                            </a>
                            <a href="<?= base_url('admin/reports') ?>" class="bg-gray-900 hover:bg-gray-800 border border-gray-700 rounded-xl p-4 text-center transition-colors duration-200">
                                <i class="fas fa-chart-bar text-red-400 text-xl mb-2"></i>
                                <p class="text-sm font-medium text-white">Reports</p>
                            </a>
                            <a href="<?= base_url('admin/users') ?>" class="bg-gray-900 hover:bg-gray-800 border border-gray-700 rounded-xl p-4 text-center transition-colors duration-200">
                                <i class="fas fa-user-plus text-red-400 text-xl mb-2"></i>
                                <p class="text-sm font-medium text-white">Users</p>
                            </a>
                        </div>
                    </div>
                </div>

                <!-- Recent Activity -->
                <div class="bg-gray-800/70 border border-gray-700 rounded-2xl p-6">
                    <h3 class="text-xl font-bold text-white mb-6">Recent Activity</h3>
                    <div class="space-y-4 max-h-[400px] overflow-y-auto pr-2 custom-scrollbar">
                        <?php if (empty($recentActivity)): ?>
                            <p class="text-gray-500 text-center py-8">No recent activity found.</p>
                        <?php else: ?>
                            <?php foreach ($recentActivity as $activity): ?>
                            <div class="flex items-center p-3 hover:bg-gray-750 rounded-xl transition-colors duration-200">
                                <div class="w-10 h-10 rounded-full bg-red-900/30 flex items-center justify-center mr-4">
                                    <i class="fas fa-history text-red-400"></i>
                                </div>
                                <div class="flex-1">
                                    <p class="text-white font-medium"><?= $activity['action'] ?></p>
                                    <p class="text-sm text-gray-400"><?= $activity['user_name'] ?? 'System' ?> - <?= $activity['entity'] ?></p>
                                </div>
                                <div class="text-right">
                                    <p class="text-xs text-gray-400"><?= date('H:i', strtotime($activity['created_at'])) ?></p>
                                </div>
                            </div>
                            <?php endforeach; ?>
                        <?php endif; ?>
                    </div>
                    <div class="mt-6 text-center">
                        <a href="<?= base_url('admin/audit') ?>" class="text-red-400 hover:text-red-300 font-medium">
                            View all activity
                            <i class="fas fa-arrow-right ml-2"></i>
                        </a>
                    </div>
                </div>
            </div>

            <!-- Pending Requests -->
            <div class="bg-gray-800/70 border border-gray-700 rounded-2xl p-6 mb-8">
                <div class="flex justify-between items-center mb-6">
                    <h3 class="text-xl font-bold text-white">Pending Loan Requests</h3>
                    <span class="bg-red-900 text-red-300 text-sm px-3 py-1 rounded-full"><?= count($pendingLoans) ?> requests</span>
                </div>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <?php if (empty($pendingLoans)): ?>
                        <div class="col-span-2 text-center py-8 text-gray-500 border border-dashed border-gray-700 rounded-xl">
                            No pending requests at the moment.
                        </div>
                    <?php else: ?>
                        <?php foreach ($pendingLoans as $loan): ?>
                        <div class="p-4 border border-gray-700 rounded-xl hover:border-red-700 transition-colors duration-200">
                            <div class="flex justify-between items-start mb-2">
                                <div>
                                    <h4 class="font-semibold text-white"><?= $loan['nama_barang'] ?></h4>
                                    <p class="text-sm text-gray-400">Requested by: <?= $loan['user_name'] ?></p>
                                </div>
                            </div>
                            <div class="flex justify-between items-center mt-4">
                                <span class="text-gray-400 text-sm"><i class="far fa-calendar mr-1"></i> <?= $loan['loan_date'] ?></span>
                                <div class="space-x-2 flex">
                                    <form action="<?= base_url('admin/loans/approve/' . $loan['id']) ?>" method="POST">
                                        <button class="px-3 py-1.5 bg-green-600 hover:bg-green-700 text-white text-xs font-medium rounded-lg transition-colors">
                                            Approve
                                        </button>
                                    </form>
                                    <form action="<?= base_url('admin/loans/reject/' . $loan['id']) ?>" method="POST">
                                        <button class="px-3 py-1.5 bg-gray-700 hover:bg-gray-600 text-white text-xs font-medium rounded-lg transition-colors">
                                            Reject
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </div>
                <div class="mt-6 text-center">
                    <a href="<?= base_url('admin/loans') ?>" class="inline-flex items-center justify-center w-full py-3 bg-gray-900 hover:bg-gray-800 border border-gray-700 rounded-xl font-medium text-white transition-colors duration-200">
                        <i class="fas fa-list mr-2"></i>
                        View all loan records
                    </a>
                </div>
            </div>
        </main>
    </div>
</div>
<?= $this->endSection() ?>
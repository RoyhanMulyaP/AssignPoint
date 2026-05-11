<?= $this->extend('templates/header-admin') ?>
<?= $this->section('content') ?>

<div class="flex h-screen overflow-hidden">
    <?= $this->include('admin/sidebar') ?>
    <div class="flex-1 flex flex-col overflow-hidden">
        <?= $this->include('admin/top_nav') ?>
        <main class="flex-1 overflow-y-auto p-6 gradient-bg">
            <div class="flex justify-between items-center mb-8">
                <h2 class="text-3xl font-bold text-white">Reports & Analytics</h2>
                <div class="flex space-x-3">
                    <button onclick="window.print()" class="bg-gray-700 hover:bg-gray-600 text-white px-4 py-2 rounded-xl transition-all no-print">
                        <i class="fas fa-print mr-2"></i> Print Report
                    </button>
                    <button class="bg-red-600 hover:bg-red-700 text-white px-4 py-2 rounded-xl transition-all shadow-lg shadow-red-600/20 no-print">
                        <i class="fas fa-download mr-2"></i> Export Data
                    </button>
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-8 mb-8">
                <div class="bg-gray-800/70 border border-gray-700 rounded-2xl p-6 shadow-xl">
                    <h3 class="text-xl font-bold text-white mb-6">Asset Distribution</h3>
                    <div class="h-64 flex flex-col items-center justify-center bg-gray-900/30 rounded-xl p-4">
                        <div class="w-full space-y-4">
                            <?php foreach ($categoryStats as $stat): ?>
                            <div>
                                <div class="flex justify-between text-sm mb-1">
                                    <span class="text-gray-400"><?= $stat['name'] ?></span>
                                    <span class="text-white font-semibold"><?= $stat['count'] ?></span>
                                </div>
                                <div class="w-full bg-gray-700 rounded-full h-1.5">
                                    <div class="bg-red-500 h-1.5 rounded-full" style="width: 0%"></div>
                                </div>
                            </div>
                            <?php endforeach; ?>
                            <?php if (empty($categoryStats)): ?>
                                <p class="text-gray-500 italic text-center">No category data available</p>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
                <div class="bg-gray-800/70 border border-gray-700 rounded-2xl p-6 shadow-xl">
                    <h3 class="text-xl font-bold text-white mb-6">Loan Activity Overview</h3>
                    <div class="h-64 flex flex-col items-center justify-center bg-gray-900/30 rounded-xl p-4 text-center">
                        <div class="text-5xl font-bold text-red-500 mb-2"><?= $activeLoans ?></div>
                        <p class="text-gray-400">Items currently on loan</p>
                        <div class="mt-8 grid grid-cols-2 gap-8 w-full">
                            <div>
                                <p class="text-2xl font-bold text-white"><?= $totalAssets ?></p>
                                <p class="text-xs text-gray-500 uppercase">Total Assets</p>
                            </div>
                            <div>
                                <p class="text-2xl font-bold text-white"><?= $totalUsers ?></p>
                                <p class="text-xs text-gray-500 uppercase">System Users</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="bg-gray-800/70 border border-gray-700 rounded-2xl p-6 shadow-xl">
                <h3 class="text-xl font-bold text-white mb-6">System Performance Metrics</h3>
                <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
                    <div class="p-4 bg-gray-900/50 rounded-xl text-center">
                        <p class="text-gray-400 text-xs mb-1">Total Assets</p>
                        <p class="text-2xl font-bold text-white"><?= number_format($totalAssets) ?></p>
                    </div>
                    <div class="p-4 bg-gray-900/50 rounded-xl text-center">
                        <p class="text-gray-400 text-xs mb-1">Active Loans</p>
                        <p class="text-2xl font-bold text-green-400"><?= number_format($activeLoans) ?></p>
                    </div>
                    <div class="p-4 bg-gray-900/50 rounded-xl text-center">
                        <p class="text-gray-400 text-xs mb-1">Maintenance</p>
                        <p class="text-2xl font-bold text-red-400"><?= number_format($maintenanceCount) ?></p>
                    </div>
                    <div class="p-4 bg-gray-900/50 rounded-xl text-center">
                        <p class="text-gray-400 text-xs mb-1">Total Users</p>
                        <p class="text-2xl font-bold text-blue-400"><?= number_format($totalUsers) ?></p>
                    </div>
                </div>
            </div>
        </main>
    </div>
</div>

<style>
    @media print {
        .no-print, aside, nav {
            display: none !important;
        }
        main {
            padding: 0 !important;
            background: white !important;
            color: black !important;
        }
        .gradient-bg {
            background: none !important;
        }
        .bg-gray-800\/70, .bg-gray-900\/50 {
            background: #f3f4f6 !important;
            border: 1px solid #d1d5db !important;
        }
        .text-white {
            color: black !important;
        }
        .text-gray-400 {
            color: #4b5563 !important;
        }
    }
</style>

<?= $this->endSection() ?>

<?= $this->extend('templates/header-admin') ?>
<?= $this->section('content') ?>

<div class="flex h-screen overflow-hidden">
    <?= $this->include('admin/sidebar') ?>
    <div class="flex-1 flex flex-col overflow-hidden">
        <?= $this->include('admin/top_nav') ?>
        <main class="flex-1 overflow-y-auto p-6 gradient-bg">
            <div class="flex justify-between items-center mb-8">
                <h2 class="text-3xl font-bold text-white">System Settings</h2>
                <button form="settingsForm" class="bg-red-600 hover:bg-red-700 text-white px-8 py-2 rounded-xl font-bold transition-all shadow-lg shadow-red-600/20">
                    Save All Changes
                </button>
            </div>

            <div class="max-w-4xl">
                <form id="settingsForm" class="space-y-6">
                    <!-- General Settings -->
                    <div class="bg-gray-800/70 border border-gray-700 rounded-2xl p-6 shadow-xl">
                        <h3 class="text-xl font-bold text-white mb-6 flex items-center">
                            <i class="fas fa-globe mr-3 text-red-500"></i> General Configuration
                        </h3>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div>
                                <label class="block text-gray-400 text-sm mb-2">Application Name</label>
                                <input type="text" value="Assign Point" class="w-full bg-gray-700 border border-gray-600 rounded-xl px-4 py-2 text-white focus:ring-2 focus:ring-red-500 outline-none">
                            </div>
                            <div>
                                <label class="block text-gray-400 text-sm mb-2">Support Email</label>
                                <input type="email" value="support@assignpoint.com" class="w-full bg-gray-700 border border-gray-600 rounded-xl px-4 py-2 text-white focus:ring-2 focus:ring-red-500 outline-none">
                            </div>
                        </div>
                    </div>

                    <!-- Notification Settings -->
                    <div class="bg-gray-800/70 border border-gray-700 rounded-2xl p-6 shadow-xl">
                        <h3 class="text-xl font-bold text-white mb-6 flex items-center">
                            <i class="fas fa-bell mr-3 text-yellow-500"></i> Notification Settings
                        </h3>
                        <div class="space-y-4">
                            <div class="flex items-center justify-between p-4 bg-gray-900/30 rounded-xl">
                                <div>
                                    <p class="text-white font-medium">Email Notifications</p>
                                    <p class="text-gray-400 text-xs">Send emails for new loan requests</p>
                                </div>
                                <label class="relative inline-flex items-center cursor-pointer">
                                    <input type="checkbox" checked class="sr-only peer">
                                    <div class="w-11 h-6 bg-gray-700 peer-focus:outline-none rounded-full peer peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all peer-checked:bg-red-600"></div>
                                </label>
                            </div>
                            <div class="flex items-center justify-between p-4 bg-gray-900/30 rounded-xl">
                                <div>
                                    <p class="text-white font-medium">System Maintenance Alerts</p>
                                    <p class="text-gray-400 text-xs">Show alerts when maintenance is scheduled</p>
                                </div>
                                <label class="relative inline-flex items-center cursor-pointer">
                                    <input type="checkbox" checked class="sr-only peer">
                                    <div class="w-11 h-6 bg-gray-700 peer-focus:outline-none rounded-full peer peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all peer-checked:bg-red-600"></div>
                                </label>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </main>
    </div>
</div>

<?= $this->endSection() ?>

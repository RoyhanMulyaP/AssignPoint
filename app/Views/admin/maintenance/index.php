<?= $this->extend('templates/header-admin') ?>
<?= $this->section('content') ?>

<div class="flex h-screen overflow-hidden">
    <?= $this->include('admin/sidebar') ?>
    <div class="flex-1 flex flex-col overflow-hidden">
        <?= $this->include('admin/top_nav') ?>
        <main class="flex-1 overflow-y-auto p-6 gradient-bg">
            <div class="flex justify-between items-center mb-8">
                <h2 class="text-3xl font-bold text-white">Maintenance</h2>
                <button onclick="document.getElementById('addMaintenanceModal').classList.remove('hidden')" class="bg-red-600 hover:bg-red-700 text-white px-6 py-2 rounded-xl font-bold transition-all shadow-lg hover:shadow-red-600/20">
                    <i class="fas fa-plus mr-2"></i> Schedule Maintenance
                </button>
            </div>

            <div class="bg-gray-800/70 border border-gray-700 rounded-2xl overflow-hidden shadow-xl">
                <div class="overflow-x-auto">
                    <table class="w-full text-left">
                        <thead class="bg-gray-900/50">
                            <tr>
                                <th class="px-6 py-4 text-gray-400 font-semibold uppercase text-sm">Item</th>
                                <th class="px-6 py-4 text-gray-400 font-semibold uppercase text-sm">Description</th>
                                <th class="px-6 py-4 text-gray-400 font-semibold uppercase text-sm">Date</th>
                                <th class="px-6 py-4 text-gray-400 font-semibold uppercase text-sm">Status</th>
                                <th class="px-6 py-4 text-gray-400 font-semibold uppercase text-sm">Action</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-700">
                            <?php foreach ($maintenance as $m): ?>
                                <tr class="hover:bg-gray-700/30 transition-colors duration-200">
                                    <td class="px-6 py-4 text-white font-medium"><?= $m['nama_barang'] ?></td>
                                    <td class="px-6 py-4 text-gray-300"><?= $m['description'] ?></td>
                                    <td class="px-6 py-4 text-white"><?= date('d M Y', strtotime($m['start_date'])) ?></td>
                                    <td class="px-6 py-4">
                                        <span class="px-3 py-1 text-xs rounded-full bg-yellow-900/30 text-yellow-400 border border-yellow-500/20">
                                            <?= ucfirst($m['status']) ?>
                                        </span>
                                    </td>
                                    <td class="px-6 py-4">
                                        <form action="<?= base_url('admin/maintenance/updateStatus/' . $m['id']) ?>" method="POST">
                                            <select name="status" onchange="this.form.submit()" class="bg-gray-700 text-white text-xs rounded-lg px-2 py-1 border border-gray-600 outline-none">
                                                <option value="scheduled" <?= $m['status'] == 'scheduled' ? 'selected' : '' ?>>Scheduled</option>
                                                <option value="in_progress" <?= $m['status'] == 'in_progress' ? 'selected' : '' ?>>In Progress</option>
                                                <option value="completed" <?= $m['status'] == 'completed' ? 'selected' : '' ?>>Completed</option>
                                                <option value="cancelled" <?= $m['status'] == 'cancelled' ? 'selected' : '' ?>>Cancelled</option>
                                            </select>
                                        </form>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </main>
    </div>
</div>

<!-- Add Modal -->
<div id="addMaintenanceModal" class="hidden fixed inset-0 z-[60] flex items-center justify-center bg-black/60 backdrop-blur-sm p-4">
    <div class="bg-gray-800 border border-gray-700 rounded-2xl w-full max-w-md overflow-hidden shadow-2xl">
        <div class="p-6 border-b border-gray-700 flex justify-between items-center">
            <h3 class="text-xl font-bold text-white">Schedule Maintenance</h3>
            <button onclick="document.getElementById('addMaintenanceModal').classList.add('hidden')" class="text-gray-400 hover:text-white">
                <i class="fas fa-times"></i>
            </button>
        </div>
        <form action="<?= base_url('admin/maintenance/save') ?>" method="POST" class="p-6 space-y-4">
            <div>
                <label class="block text-gray-400 text-sm mb-2">Item</label>
                <select name="inventaris_id" required class="w-full bg-gray-700 border border-gray-600 rounded-xl px-4 py-2 text-white focus:ring-2 focus:ring-red-500 outline-none">
                    <?php foreach ($inventaris as $item): ?>
                        <option value="<?= $item['id'] ?>"><?= $item['nama_barang'] ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div>
                <label class="block text-gray-400 text-sm mb-2">Issue / Description</label>
                <textarea name="description" rows="3" required class="w-full bg-gray-700 border border-gray-600 rounded-xl px-4 py-2 text-white focus:ring-2 focus:ring-red-500 outline-none"></textarea>
            </div>
            <div>
                <label class="block text-gray-400 text-sm mb-2">Start Date</label>
                <input type="date" name="start_date" required class="w-full bg-gray-700 border border-gray-600 rounded-xl px-4 py-2 text-white focus:ring-2 focus:ring-red-500 outline-none">
            </div>
            <button type="submit" class="w-full bg-red-600 hover:bg-red-700 text-white font-bold py-3 rounded-xl transition-all">
                Schedule
            </button>
        </form>
    </div>
</div>

<?= $this->endSection() ?>

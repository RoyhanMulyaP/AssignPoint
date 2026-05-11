<?= $this->extend('templates/header-admin') ?>
<?= $this->section('content') ?>

<div class="flex h-screen overflow-hidden">
    <?= $this->include('admin/sidebar') ?>
    <div class="flex-1 flex flex-col overflow-hidden">
        <?= $this->include('admin/top_nav') ?>
        <main class="flex-1 overflow-y-auto p-6 gradient-bg">
            <div class="flex justify-between items-center mb-8">
                <h2 class="text-3xl font-bold text-white">Audit Logs</h2>
            </div>

            <div class="bg-gray-800/70 border border-gray-700 rounded-2xl overflow-hidden shadow-xl">
                <div class="overflow-x-auto">
                    <table class="w-full text-left">
                        <thead class="bg-gray-900/50">
                            <tr>
                                <th class="px-6 py-4 text-gray-400 font-semibold uppercase text-sm">Timestamp</th>
                                <th class="px-6 py-4 text-gray-400 font-semibold uppercase text-sm">User</th>
                                <th class="px-6 py-4 text-gray-400 font-semibold uppercase text-sm">Action</th>
                                <th class="px-6 py-4 text-gray-400 font-semibold uppercase text-sm">Entity</th>
                                <th class="px-6 py-4 text-gray-400 font-semibold uppercase text-sm">Details</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-700">
                            <?php foreach ($logs as $log): ?>
                                <tr class="hover:bg-gray-700/30 transition-colors duration-200">
                                    <td class="px-6 py-4 text-gray-400 text-sm"><?= $log['created_at'] ?></td>
                                    <td class="px-6 py-4 text-white font-medium"><?= $log['user_name'] ?? 'System' ?></td>
                                    <td class="px-6 py-4 text-white"><?= $log['action'] ?></td>
                                    <td class="px-6 py-4 text-red-400 font-semibold"><?= $log['entity'] ?></td>
                                    <td class="px-6 py-4 text-gray-400 text-xs max-w-xs truncate"><?= $log['details'] ?></td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </main>
    </div>
</div>

<?= $this->endSection() ?>

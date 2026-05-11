<?= $this->include('templates/header') ?>

<main class="container mx-auto px-4 py-8">
    <!-- Hero Section -->
    <section class="relative overflow-hidden bg-gradient-to-r from-gray-900 via-gray-800 to-red-900 rounded-3xl shadow-2xl mb-16 p-8 md:p-12">
        <div class="absolute inset-0 bg-gradient-to-r from-black/50 to-red-900/30"></div>
        <div class="relative z-10">
            <div class="max-w-3xl">
                <h1 class="text-4xl md:text-5xl font-black text-white mb-6 leading-tight tracking-tighter">
                    Selamat Datang,
                    <span class="text-transparent bg-clip-text bg-gradient-to-r from-red-500 to-red-800">
                        <?= session()->get('name') ?? 'Pengguna' ?>!
                    </span>
                </h1>
                <p class="text-xl text-gray-300 mb-8 leading-relaxed">
                    Sistem inventaris pintar untuk mempermudah pekerjaan Anda.
                    Ajukan peminjaman aset dengan cepat dan pantau status barang secara real-time.
                </p>
                <div class="flex flex-wrap gap-4">
                    <a href="<?= base_url('user/inventaris') ?>" 
                       class="bg-red-600 hover:bg-red-700 text-white px-8 py-3.5 rounded-xl font-bold text-lg shadow-xl shadow-red-600/20 transform hover:-translate-y-1 transition-all duration-300">
                        <i class="fas fa-plus-circle mr-2"></i> Ajukan Peminjaman
                    </a>
                    <a href="#activity" 
                       class="bg-gray-800 hover:bg-gray-700 text-white px-8 py-3.5 rounded-xl font-bold text-lg shadow-xl transform hover:-translate-y-1 transition-all duration-300 border border-gray-700">
                        <i class="fas fa-history mr-2"></i> Riwayat Saya
                    </a>
                </div>
            </div>
        </div>
    </section>

    <!-- Quick Stats -->
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-12">
        <div class="bg-gray-800/50 backdrop-blur-xl rounded-2xl p-6 border border-gray-700 hover:border-red-600/50 transition-all duration-300 group">
            <div class="flex justify-between items-start">
                <div>
                    <p class="text-gray-400 text-sm mb-1">Peminjaman Aktif</p>
                    <h3 id="count-active" class="text-3xl font-bold text-white group-hover:text-red-500 transition-colors"><?= number_format($activeLoansCount) ?></h3>
                    <p class="text-green-400 text-xs mt-2 flex items-center">
                        <i class="fas fa-check-circle mr-1"></i> Sedang Anda gunakan
                    </p>
                </div>
                <div class="w-12 h-12 rounded-xl bg-red-900/20 flex items-center justify-center border border-red-900/50">
                    <i class="fas fa-exchange-alt text-xl text-red-500"></i>
                </div>
            </div>
        </div>
        
        <div class="bg-gray-800/50 backdrop-blur-xl rounded-2xl p-6 border border-gray-700 hover:border-red-600/50 transition-all duration-300 group">
            <div class="flex justify-between items-start">
                <div>
                    <p class="text-gray-400 text-sm mb-1">Total Peminjaman</p>
                    <h3 id="count-total" class="text-3xl font-bold text-white group-hover:text-red-500 transition-colors"><?= number_format($totalLoansCount) ?></h3>
                    <p class="text-blue-400 text-xs mt-2 flex items-center">
                        <i class="fas fa-history mr-1"></i> Seluruh riwayat
                    </p>
                </div>
                <div class="w-12 h-12 rounded-xl bg-blue-900/20 flex items-center justify-center border border-blue-900/50">
                    <i class="fas fa-clipboard-list text-xl text-blue-500"></i>
                </div>
            </div>
        </div>
        
        <div class="bg-gray-800/50 backdrop-blur-xl rounded-2xl p-6 border border-gray-700 hover:border-red-600/50 transition-all duration-300 group">
            <div class="flex justify-between items-start">
                <div>
                    <p class="text-gray-400 text-sm mb-1">Total Unit Tersedia</p>
                    <h3 id="count-available" class="text-3xl font-bold text-white group-hover:text-red-500 transition-colors"><?= number_format($availableItemsCount) ?></h3>
                    <p class="text-yellow-400 text-xs mt-2 flex items-center">
                        <i class="fas fa-boxes mr-1"></i> Siap dipinjam
                    </p>
                </div>
                <div class="w-12 h-12 rounded-xl bg-yellow-900/20 flex items-center justify-center border border-yellow-900/50">
                    <i class="fas fa-box-open text-xl text-yellow-500"></i>
                </div>
            </div>
        </div>
    </div>

    <!-- Loan History Table -->
    <div id="activity" class="bg-gray-800 rounded-3xl border border-gray-700 shadow-2xl overflow-hidden mb-16">
        <div class="p-8 border-b border-gray-700 flex justify-between items-center">
            <div>
                <h2 class="text-2xl font-bold text-white mb-1">Riwayat Peminjaman</h2>
                <p class="text-gray-400 text-sm">Daftar barang yang Anda pinjam saat ini dan sebelumnya</p>
            </div>
            <a href="<?= base_url('user/inventaris') ?>" class="text-red-500 hover:text-red-400 font-bold text-sm flex items-center">
                Lihat Katalog <i class="fas fa-arrow-right ml-2"></i>
            </a>
        </div>
        <div class="overflow-x-auto">
            <table class="w-full text-left">
                <thead class="bg-gray-900/50">
                    <tr>
                        <th class="px-8 py-5 text-gray-400 font-bold uppercase text-xs tracking-wider">Barang</th>
                        <th class="px-8 py-5 text-gray-400 font-bold uppercase text-xs tracking-wider">Peminjam</th>
                        <th class="px-8 py-5 text-gray-400 font-bold uppercase text-xs tracking-wider">Tanggal Pinjam</th>
                        <th class="px-8 py-5 text-gray-400 font-bold uppercase text-xs tracking-wider">Status</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-700">
                    <?php if (empty($myLoans)): ?>
                        <tr>
                            <td colspan="3" class="px-8 py-12 text-center text-gray-500 italic">
                                Anda belum memiliki riwayat peminjaman.
                            </td>
                        </tr>
                    <?php else: ?>
                        <?php foreach ($myLoans as $loan): ?>
                        <tr class="hover:bg-gray-700/30 transition-colors duration-200">
                            <td class="px-8 py-5">
                                <div class="flex items-center">
                                    <div class="w-10 h-10 rounded-lg bg-red-900/20 flex items-center justify-center mr-4">
                                        <i class="fas fa-cube text-red-500"></i>
                                    </div>
                                    <span class="text-white font-bold"><?= $loan['nama_barang'] ?></span>
                                </div>
                            </td>
                            <td class="px-8 py-5 text-gray-300 font-medium"><?= esc($loan['borrower_name'] ?? '-') ?></td>
                            <td class="px-8 py-5 text-gray-300"><?= date('d M Y', strtotime($loan['loan_date'])) ?></td>
                            <td class="px-8 py-5" id="status-container-<?= $loan['id'] ?>">
                                <?php if ($loan['status'] == 'pending'): ?>
                                    <span class="px-3 py-1 bg-yellow-900/30 text-yellow-500 text-xs rounded-full font-bold">Menunggu</span>
                                <?php elseif ($loan['status'] == 'approved'): ?>
                                    <span class="px-3 py-1 bg-green-900/30 text-green-500 text-xs rounded-full font-bold">Dipinjam</span>
                                <?php elseif ($loan['status'] == 'returned'): ?>
                                    <span class="px-3 py-1 bg-blue-900/30 text-blue-500 text-xs rounded-full font-bold">Dikembalikan</span>
                                <?php else: ?>
                                    <span class="px-3 py-1 bg-red-900/30 text-red-500 text-xs rounded-full font-bold"><?= ucfirst($loan['status']) ?></span>
                                <?php endif; ?>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
</main>

<script>
    // Start polling every 3 seconds
    document.addEventListener('DOMContentLoaded', function() {
        async function checkDashboardUpdates() {
            try {
                // Update Loan Statuses
                const statusResponse = await fetch('<?= base_url('user/loans/getStatus') ?>', { cache: 'no-store' });
                const loans = await statusResponse.json();
                
                loans.forEach(loan => {
                    const container = document.getElementById(`status-container-${loan.id}`);
                    if (container) {
                        let html = '';
                        if (loan.status === 'pending') {
                            html = '<span class="px-3 py-1 bg-yellow-900/30 text-yellow-500 text-xs rounded-full font-bold">Menunggu</span>';
                        } else if (loan.status === 'approved') {
                            html = '<span class="px-3 py-1 bg-green-900/30 text-green-500 text-xs rounded-full font-bold">Dipinjam</span>';
                        } else if (loan.status === 'returned') {
                            html = '<span class="px-3 py-1 bg-blue-900/30 text-blue-500 text-xs rounded-full font-bold">Dikembalikan</span>';
                        } else {
                            html = `<span class="px-3 py-1 bg-red-900/30 text-red-500 text-xs rounded-full font-bold">${loan.status.charAt(0).toUpperCase() + loan.status.slice(1)}</span>`;
                        }
                        
                        if (container.innerHTML.trim() !== html.trim()) {
                            container.innerHTML = html;
                        }
                    }
                });

                // Update Card Stats
                const statsResponse = await fetch('<?= base_url('user/dashboard/getStats') ?>', { cache: 'no-store' });
                const stats = await statsResponse.json();
                
                const statsMap = {
                    'count-active': stats.activeLoansCount,
                    'count-total': stats.totalLoansCount,
                    'count-available': stats.availableItemsCount
                };

                for (const [id, value] of Object.entries(statsMap)) {
                    const el = document.getElementById(id);
                    if (el) {
                        el.textContent = Number(value).toLocaleString('id-ID');
                    }
                }

            } catch (err) {
                console.error('Polling error:', err);
            }
        }

        setInterval(checkDashboardUpdates, 3000);
        checkDashboardUpdates();
    });
</script>

<?= $this->include('templates/footer') ?>
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
            <!-- Page Header -->
            <div class="flex justify-between items-center mb-8">
                <div class="flex items-center space-x-4">
                    <div class="p-3 bg-red-600 rounded-2xl shadow-lg shadow-red-600/20">
                        <i class="fas fa-hand-holding-heart text-2xl text-white"></i>
                    </div>
                    <div>
                        <h2 class="text-3xl font-bold text-white">Loan Management</h2>
                        <p class="text-gray-400 text-sm">Manage user loan requests and item returns</p>
                    </div>
                </div>
                <!-- Notification Bell -->
                <div class="relative">
                    <button id="notifBellBtn" onclick="toggleNotifPanel()" class="relative w-12 h-12 bg-gray-800 border border-gray-700 rounded-2xl flex items-center justify-center hover:border-yellow-500/50 transition-all">
                        <i class="fas fa-bell text-gray-300 text-lg"></i>
                        <span id="notifBadge" class="absolute -top-1 -right-1 w-5 h-5 bg-yellow-500 text-gray-900 text-[10px] font-black rounded-full hidden items-center justify-center">0</span>
                    </button>
                    <!-- Notification Panel -->
                    <div id="notifPanel" class="absolute right-0 top-14 w-80 bg-gray-800 border border-gray-700 rounded-2xl shadow-2xl z-[300] hidden overflow-hidden">
                        <div class="px-5 py-4 border-b border-gray-700 flex justify-between items-center">
                            <span class="font-bold text-white text-sm uppercase tracking-wider">Permintaan Baru</span>
                            <button onclick="clearAllNotifs()" class="text-[10px] text-gray-500 hover:text-red-400 font-bold uppercase transition-colors">Hapus semua</button>
                        </div>
                        <div id="notifList" class="max-h-72 overflow-y-auto custom-scrollbar">
                            <p class="px-5 py-6 text-gray-500 text-sm text-center italic">Belum ada notifikasi</p>
                        </div>
                    </div>
                </div>
            </div>

            <?php if (session()->getFlashdata('success')): ?>
                <div class="bg-green-900/50 border border-green-500 text-green-200 px-4 py-3 rounded-xl mb-6 flex items-center space-x-3">
                    <i class="fas fa-check-circle"></i>
                    <span><?= session()->getFlashdata('success') ?></span>
                </div>
            <?php endif; ?>

            <!-- User Cards Grid -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6" id="user-cards-grid">
                <?php foreach ($users as $user): ?>
                    <?php 
                        $userLoans = $groupedLoans[$user['uuid']] ?? [];
                        $hasActive = false;
                        $hasPending = false;
                        foreach ($userLoans as $l) {
                            if (in_array($l['status'], ['pending', 'approved'])) $hasActive = true;
                            if ($l['status'] === 'pending') $hasPending = true;
                        }
                    ?>
                    <div id="card-<?= $user['uuid'] ?>"
                         onclick="showUserLoans('<?= $user['uuid'] ?>', '<?= esc($user['name']) ?>')" 
                         class="bg-gray-800/70 border <?= $hasPending ? 'border-yellow-500/60' : 'border-gray-700' ?> rounded-2xl p-6 cursor-pointer card-hover hover:border-red-500/50 group transition-all duration-300 relative overflow-hidden">
                        
                        <!-- Pending Request Dot (top-right) -->
                        <?php if ($hasPending): ?>
                            <span id="dot-<?= $user['uuid'] ?>" class="absolute top-3 right-3 w-3 h-3 bg-yellow-400 rounded-full animate-pulse shadow-lg shadow-yellow-400/50 z-10"></span>
                        <?php else: ?>
                            <span id="dot-<?= $user['uuid'] ?>" class="absolute top-3 right-3 w-3 h-3 bg-yellow-400 rounded-full animate-pulse shadow-lg shadow-yellow-400/50 z-10 hidden"></span>
                        <?php endif; ?>

                        <!-- Status Glow -->
                        <?php if ($hasActive): ?>
                            <div class="absolute -top-10 -right-10 w-20 h-20 bg-green-500/10 blur-2xl rounded-full"></div>
                        <?php endif; ?>

                        <div class="flex items-center space-x-4 mb-6">
                            <div class="relative">
                                <div class="w-14 h-14 rounded-2xl bg-gradient-to-br from-gray-700 to-gray-900 flex items-center justify-center text-2xl font-bold text-white shadow-xl border border-gray-600 group-hover:border-red-500/50 transition-colors">
                                    <?php if (isset($user['avatar']) && $user['avatar']): ?>
                                        <img src="<?= base_url('uploads/avatars/' . $user['avatar']) ?>" alt="" class="w-full h-full object-cover rounded-2xl">
                                    <?php else: ?>
                                        <?= strtoupper(substr($user['name'], 0, 1)) ?>
                                    <?php endif; ?>
                                </div>
                                <?php if ($hasActive): ?>
                                    <span class="absolute -bottom-1 -right-1 w-4 h-4 bg-green-500 border-2 border-gray-800 rounded-full animate-pulse"></span>
                                <?php endif; ?>
                            </div>
                            <div class="flex-1 min-w-0">
                                <h3 class="text-white font-bold text-lg group-hover:text-red-400 transition-colors truncate"><?= esc($user['name']) ?></h3>
                                <p class="text-gray-500 text-xs font-mono truncate">ID: <?= $user['uuid'] ?></p>
                            </div>
                        </div>
                        
                        <div class="space-y-4">
                            <div class="grid grid-cols-2 gap-4">
                                <div class="bg-gray-900/40 p-3 rounded-xl border border-gray-700/50">
                                    <p class="text-gray-500 text-[10px] uppercase font-bold mb-1">Joined</p>
                                    <p class="text-white text-sm"><?= date('d M Y', strtotime($user['created_at'])) ?></p>
                                </div>
                                <div class="bg-gray-900/40 p-3 rounded-xl border border-gray-700/50">
                                    <p class="text-gray-500 text-[10px] uppercase font-bold mb-1">Total Loans</p>
                                    <p id="loan-count-<?= $user['uuid'] ?>" class="text-white text-sm"><?= count($userLoans) ?> Items</p>
                                </div>
                            </div>

                            <div class="flex justify-between items-center pt-2">
                                <span id="status-badge-<?= $user['uuid'] ?>" class="px-3 py-1 rounded-full text-[10px] font-bold uppercase tracking-wider <?= $hasPending ? 'bg-yellow-900/30 text-yellow-400' : ($hasActive ? 'bg-green-900/30 text-green-400' : 'bg-gray-700/50 text-gray-400') ?>">
                                    <?= $hasPending ? 'Pending Request' : ($hasActive ? 'Active Borrower' : 'Inactive') ?>
                                </span>
                                <i class="fas fa-chevron-right text-gray-600 group-hover:text-red-500 transform group-hover:translate-x-1 transition-all"></i>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </main>
    </div>
</div>

<!-- Detail Modal -->
<div id="loanModal" class="fixed inset-0 z-[100] hidden">
    <div class="absolute inset-0 bg-black/80 backdrop-blur-sm transition-opacity" onclick="closeModal()"></div>
    <div class="flex items-center justify-center min-h-screen p-4">
        <div class="bg-gray-800 border border-gray-700 rounded-3xl w-full max-w-4xl shadow-2xl transform transition-all animate-slide-in-right overflow-hidden">
            <div class="px-8 py-6 border-b border-gray-700 flex justify-between items-center bg-gray-800/50">
                <div class="flex items-center space-x-4">
                    <div class="w-12 h-12 rounded-xl bg-red-600/10 flex items-center justify-center">
                        <i class="fas fa-history text-red-500 text-xl"></i>
                    </div>
                    <div>
                        <h3 class="text-2xl font-bold text-white" id="modalUserName">User Loans</h3>
                        <p class="text-gray-400 text-sm">Loan history and active requests</p>
                    </div>
                </div>
                <button onclick="closeModal()" class="w-10 h-10 rounded-full bg-gray-700/50 flex items-center justify-center text-gray-400 hover:text-white hover:bg-gray-700 transition-all">
                    <i class="fas fa-times"></i>
                </button>
            </div>
            <div class="p-8 max-h-[70vh] overflow-y-auto custom-scrollbar">
                <div class="overflow-x-auto">
                    <table class="w-full text-left">
                        <thead>
                            <tr class="border-b border-gray-700">
                                <th class="pb-4 text-gray-400 font-bold uppercase text-xs tracking-wider">Item</th>
                                <th class="pb-4 text-gray-400 font-bold uppercase text-xs tracking-wider">Peminjam</th>
                                <th class="pb-4 text-gray-400 font-bold uppercase text-xs tracking-wider">Qty</th>
                                <th class="pb-4 text-gray-400 font-bold uppercase text-xs tracking-wider">Date</th>
                                <th class="pb-4 text-gray-400 font-bold uppercase text-xs tracking-wider">Status</th>
                                <th class="pb-4 text-gray-400 font-bold uppercase text-xs tracking-wider text-right">Action</th>
                            </tr>
                        </thead>
                        <tbody id="modal-loan-body" class="divide-y divide-gray-700/50">
                            <!-- Populated via JS -->
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Toast Notification Template (rendered by JS) -->

<style>
.custom-scrollbar::-webkit-scrollbar { width: 6px; }
.custom-scrollbar::-webkit-scrollbar-track { background: transparent; }
.custom-scrollbar::-webkit-scrollbar-thumb { background: #374151; border-radius: 10px; }
.custom-scrollbar::-webkit-scrollbar-thumb:hover { background: #4b5563; }

@keyframes slideInDown {
    from { opacity: 0; transform: translateY(-20px); }
    to   { opacity: 1; transform: translateY(0); }
}
.notif-toast {
    animation: slideInDown 0.4s ease-out;
}
</style>

<script>
let groupedLoans = <?= json_encode($groupedLoans) ?>;
let activeUserUuid = null;

// Track known pending loan IDs to detect NEW ones
let knownPendingIds = new Set();
<?php
    $allPendingIds = [];
    foreach ($groupedLoans as $loans) {
        foreach ($loans as $l) {
            if ($l['status'] === 'pending') $allPendingIds[] = $l['id'];
        }
    }
?>
<?php foreach ($allPendingIds as $pid): ?>
knownPendingIds.add(<?= $pid ?>);
<?php endforeach; ?>

// Notification list (in-memory)
let notifications = [];

// ─── Modal ────────────────────────────────────────────────
function showUserLoans(uuid, name) {
    activeUserUuid = uuid;
    document.getElementById('modalUserName').textContent = name + "'s Loans";
    renderLoanTable(uuid);
    document.getElementById('loanModal').classList.remove('hidden');
    document.body.style.overflow = 'hidden';

    // Remove pending dot once admin opens the card
    clearCardPendingDot(uuid);
}

function closeModal() {
    document.getElementById('loanModal').classList.add('hidden');
    document.body.style.overflow = 'auto';
    activeUserUuid = null;
}

function clearCardPendingDot(uuid) {
    const dot = document.getElementById('dot-' + uuid);
    if (dot) dot.classList.add('hidden');
    const badge = document.getElementById('status-badge-' + uuid);
    if (badge && badge.textContent.trim() === 'Pending Request') {
        // Keep it showing as Active Borrower if they still have approved loans
        const loans = groupedLoans[uuid] || [];
        const hasApproved = loans.some(l => l.status === 'approved');
        badge.className = 'px-3 py-1 rounded-full text-[10px] font-bold uppercase tracking-wider ' +
            (hasApproved ? 'bg-green-900/30 text-green-400' : 'bg-gray-700/50 text-gray-400');
        badge.textContent = hasApproved ? 'Active Borrower' : 'Inactive';
    }
    const card = document.getElementById('card-' + uuid);
    if (card) card.classList.remove('border-yellow-500/60');
}

// ─── Render Table ─────────────────────────────────────────
function renderLoanTable(uuid) {
    const loans = groupedLoans[uuid] || [];
    const tbody = document.getElementById('modal-loan-body');
    
    if (loans.length === 0) {
        tbody.innerHTML = `<tr><td colspan="6" class="py-12 text-center text-gray-500 italic">No loan records found for this user</td></tr>`;
        return;
    }

    let html = '';
    loans.forEach(loan => {
        const statusConfig = {
            'pending':  { class: 'bg-yellow-900/30 text-yellow-400', icon: 'clock' },
            'approved': { class: 'bg-green-900/30 text-green-400',  icon: 'check-circle' },
            'rejected': { class: 'bg-red-900/30 text-red-400',      icon: 'times-circle' },
            'returned': { class: 'bg-blue-900/30 text-blue-400',    icon: 'undo' },
            'overdue':  { class: 'bg-orange-900/30 text-orange-400',icon: 'exclamation-triangle' }
        }[loan.status] || { class: 'bg-gray-700 text-gray-300', icon: 'question' };

        let actions = '';
        if (loan.status === 'pending') {
            actions = `
                <div class="flex justify-end space-x-2">
                    <button onclick="updateLoanStatus(${loan.id}, 'approve')" class="w-8 h-8 flex items-center justify-center bg-green-600 hover:bg-green-700 text-white rounded-lg transition-colors shadow-lg shadow-green-600/20">
                        <i class="fas fa-check text-xs"></i>
                    </button>
                    <button onclick="updateLoanStatus(${loan.id}, 'reject')" class="w-8 h-8 flex items-center justify-center bg-red-600 hover:bg-red-700 text-white rounded-lg transition-colors shadow-lg shadow-red-600/20">
                        <i class="fas fa-times text-xs"></i>
                    </button>
                </div>`;
        } else if (loan.status === 'approved') {
            actions = `
                <div class="flex justify-end">
                    <button onclick="updateLoanStatus(${loan.id}, 'return')" class="px-3 py-1 bg-blue-600 hover:bg-blue-700 text-white rounded-lg transition-colors flex items-center space-x-2 text-xs font-bold shadow-lg shadow-blue-600/20">
                        <i class="fas fa-undo"></i><span>Return</span>
                    </button>
                </div>`;
        }

        html += `
            <tr class="group hover:bg-gray-700/20 transition-colors">
                <td class="py-4">
                    <div class="text-white font-semibold">${loan.nama_barang}</div>
                    <div class="text-gray-500 text-xs italic">${loan.notes || 'No notes'}</div>
                </td>
                <td class="py-4 text-white font-medium">${loan.borrower_name || '-'}</td>
                <td class="py-4 text-white font-mono">${loan.quantity}</td>
                <td class="py-4 text-gray-300 text-sm">${loan.loan_date}</td>
                <td class="py-4">
                    <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium ${statusConfig.class}">
                        <i class="fas fa-${statusConfig.icon} mr-1.5"></i>
                        ${loan.status.charAt(0).toUpperCase() + loan.status.slice(1)}
                    </span>
                </td>
                <td class="py-4 text-right">${actions}</td>
            </tr>`;
    });
    
    tbody.innerHTML = html;
}

// ─── Notification Panel ───────────────────────────────────
function toggleNotifPanel() {
    document.getElementById('notifPanel').classList.toggle('hidden');
}

document.addEventListener('click', function(e) {
    const panel = document.getElementById('notifPanel');
    const btn   = document.getElementById('notifBellBtn');
    if (!panel.classList.contains('hidden') && !panel.contains(e.target) && !btn.contains(e.target)) {
        panel.classList.add('hidden');
    }
});

function addNotification(loan, userName) {
    notifications.unshift({ loan, userName, time: new Date() });
    renderNotifList();
    updateNotifBadge();
    showLoanToast(loan, userName);
}

function renderNotifList() {
    const list = document.getElementById('notifList');
    if (notifications.length === 0) {
        list.innerHTML = '<p class="px-5 py-6 text-gray-500 text-sm text-center italic">Belum ada notifikasi</p>';
        return;
    }
    list.innerHTML = notifications.map(n => `
        <div onclick="showUserLoans('${n.loan.user_uuid}', '${n.userName}')" 
             class="px-5 py-4 border-b border-gray-700/50 hover:bg-gray-700/30 cursor-pointer transition-colors">
            <div class="flex items-start space-x-3">
                <div class="w-8 h-8 rounded-full bg-yellow-500/20 flex items-center justify-center flex-shrink-0 mt-0.5">
                    <i class="fas fa-bell text-yellow-400 text-xs"></i>
                </div>
                <div class="flex-1 min-w-0">
                    <p class="text-white text-sm font-bold truncate">${n.userName}</p>
                    <p class="text-gray-400 text-xs">meminjam <span class="text-yellow-400 font-semibold">${n.loan.nama_barang}</span></p>
                    <p class="text-gray-600 text-[10px] mt-1">${n.time.toLocaleTimeString('id-ID', {hour:'2-digit',minute:'2-digit'})}</p>
                </div>
            </div>
        </div>
    `).join('');
}

function updateNotifBadge() {
    const badge = document.getElementById('notifBadge');
    if (notifications.length > 0) {
        badge.textContent = notifications.length > 9 ? '9+' : notifications.length;
        badge.classList.remove('hidden');
        badge.classList.add('flex');
    } else {
        badge.classList.add('hidden');
        badge.classList.remove('flex');
    }
}

function clearAllNotifs() {
    notifications = [];
    renderNotifList();
    updateNotifBadge();
}

function showLoanToast(loan, userName) {
    const toast = document.createElement('div');
    toast.className = 'notif-toast fixed top-6 right-6 w-80 bg-gray-800 border border-yellow-500/50 rounded-2xl shadow-2xl z-[500] overflow-hidden cursor-pointer';
    toast.innerHTML = `
        <div class="flex items-start space-x-4 p-4">
            <div class="w-10 h-10 rounded-xl bg-yellow-500/20 flex items-center justify-center flex-shrink-0">
                <i class="fas fa-hand-holding-heart text-yellow-400"></i>
            </div>
            <div class="flex-1 min-w-0">
                <p class="text-[10px] text-yellow-400 font-bold uppercase tracking-widest mb-0.5">Permintaan Pinjam Baru</p>
                <p class="text-white font-bold text-sm truncate">${userName}</p>
                <p class="text-gray-400 text-xs">Ingin meminjam <span class="text-white font-semibold">${loan.nama_barang}</span></p>
            </div>
            <button onclick="this.closest('.notif-toast').remove()" class="text-gray-600 hover:text-white transition-colors ml-1 flex-shrink-0">
                <i class="fas fa-times text-xs"></i>
            </button>
        </div>
        <div class="h-1 bg-yellow-500/20">
            <div class="h-full bg-yellow-500 toast-progress" style="width:100%;transition:width 5s linear;"></div>
        </div>`;
    toast.onclick = function(e) {
        if (!e.target.closest('button')) {
            showUserLoans(loan.user_uuid, userName);
            toast.remove();
            document.getElementById('notifPanel').classList.add('hidden');
        }
    };
    document.body.appendChild(toast);

    // Start progress bar
    setTimeout(() => {
        const bar = toast.querySelector('.toast-progress');
        if (bar) bar.style.width = '0%';
    }, 50);

    // Auto-remove after 5s
    setTimeout(() => {
        if (toast.parentElement) {
            toast.style.opacity = '0';
            toast.style.transform = 'translateX(20px)';
            toast.style.transition = 'all 0.3s ease';
            setTimeout(() => toast.remove(), 300);
        }
    }, 5000);
}

// ─── Polling ──────────────────────────────────────────────
async function checkNewLoans() {
    try {
        const response = await fetch('<?= base_url('admin/loans/getLatestLoans') ?>');
        const loans = await response.json();

        // Build user map for name lookup
        const userMap = {};
        <?php foreach ($users as $u): ?>
        userMap['<?= $u['uuid'] ?>'] = '<?= esc($u['name']) ?>';
        <?php endforeach; ?>

        // Regroup
        const newGrouped = {};
        loans.forEach(loan => {
            if (!newGrouped[loan.user_uuid]) newGrouped[loan.user_uuid] = [];
            newGrouped[loan.user_uuid].push(loan);
        });

        // Detect brand-new pending loans
        loans.forEach(loan => {
            if (loan.status === 'pending' && !knownPendingIds.has(loan.id)) {
                knownPendingIds.add(loan.id);
                const userName = userMap[loan.user_uuid] || 'Unknown User';

                // Fire notification
                addNotification(loan, userName);

                // Show pending dot on card
                const dot = document.getElementById('dot-' + loan.user_uuid);
                if (dot) {
                    dot.classList.remove('hidden');
                }

                // Update card border
                const card = document.getElementById('card-' + loan.user_uuid);
                if (card) {
                    card.classList.add('border-yellow-500/60');
                }

                // Update status badge
                const badge = document.getElementById('status-badge-' + loan.user_uuid);
                if (badge) {
                    badge.className = 'px-3 py-1 rounded-full text-[10px] font-bold uppercase tracking-wider bg-yellow-900/30 text-yellow-400';
                    badge.textContent = 'Pending Request';
                }
            }
        });

        // Update grouped data
        groupedLoans = newGrouped;

        // Update loan counts on cards
        Object.keys(newGrouped).forEach(uuid => {
            const el = document.getElementById('loan-count-' + uuid);
            if (el) el.textContent = newGrouped[uuid].length + ' Items';
        });

        // If modal is open, refresh its table
        if (activeUserUuid) renderLoanTable(activeUserUuid);

    } catch (err) {
        console.error('Polling error:', err);
    }
}

setInterval(checkNewLoans, 4000);

// ─── Update Loan Status ───────────────────────────────────
async function updateLoanStatus(id, action) {
    try {
        const response = await fetch(`<?= base_url('admin/loans/') ?>/${action}/${id}`, {
            method: 'POST',
            headers: { 'X-Requested-With': 'XMLHttpRequest' }
        });
        const data = await response.json();
        
        if (data.status === 'success') {
            showToast(data.message, 'success');
            // Remove from knownPendingIds so we don't re-notify
            knownPendingIds.delete(id);
            checkNewLoans();
        } else {
            showToast(data.message, 'error');
        }
    } catch (err) {
        console.error(err);
        showToast('Server error', 'error');
    }
}

// ─── Generic Toast ────────────────────────────────────────
function showToast(message, type) {
    const toast = document.createElement('div');
    toast.className = `fixed bottom-8 right-8 px-8 py-4 rounded-2xl text-white font-bold z-[200] animate-slide-in-right shadow-2xl flex items-center space-x-3 ${type === 'success' ? 'bg-green-600 shadow-green-600/20' : 'bg-red-600 shadow-red-600/20'}`;
    toast.innerHTML = `
        <i class="fas fa-${type === 'success' ? 'check-circle' : 'exclamation-circle'} text-xl"></i>
        <span>${message}</span>`;
    document.body.appendChild(toast);
    setTimeout(() => {
        toast.style.opacity = '0';
        toast.style.transform = 'translateX(20px)';
        toast.style.transition = 'all 0.3s ease-out';
        setTimeout(() => toast.remove(), 300);
    }, 3000);
}
</script>

<?= $this->endSection() ?>

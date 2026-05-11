<?= $this->extend('templates/header-admin') ?>
<?= $this->section('content') ?>

<div class="flex h-screen overflow-hidden">
    <?= $this->include('admin/sidebar') ?>
    <div class="flex-1 flex flex-col overflow-hidden">
        <?= $this->include('admin/top_nav') ?>
        <main class="flex-1 overflow-y-auto p-6 gradient-bg">
            <div class="flex justify-between items-center mb-8">
                <h2 class="text-3xl font-bold text-white">User Management</h2>
            </div>

            <?php if (session()->getFlashdata('success')): ?>
                <div class="bg-green-900/50 border border-green-500 text-green-200 px-4 py-3 rounded-xl mb-6">
                    <?= session()->getFlashdata('success') ?>
                </div>
            <?php endif; ?>

            <div class="bg-gray-800/70 border border-gray-700 rounded-2xl overflow-hidden shadow-xl">
                <div class="overflow-x-auto">
                    <table class="w-full text-left">
                        <thead class="bg-gray-900/50">
                            <tr>
                                <th class="px-6 py-4 text-gray-400 font-semibold uppercase text-sm">Name</th>
                                <th class="px-6 py-4 text-gray-400 font-semibold uppercase text-sm">Email</th>
                                <th class="px-6 py-4 text-gray-400 font-semibold uppercase text-sm">Role</th>
                                <th class="px-6 py-4 text-gray-400 font-semibold uppercase text-sm">Joined</th>
                                <th class="px-6 py-4 text-gray-400 font-semibold uppercase text-sm">Action</th>
                            </tr>
                        </thead>
                        <tbody id="user-table-body" class="divide-y divide-gray-700">
                            <?php foreach ($users as $user): ?>
                                <tr class="hover:bg-gray-700/30 transition-colors duration-200" data-uuid="<?= $user['uuid'] ?>">
                                    <td class="px-6 py-4 text-white"><?= $user['name'] ?></td>
                                    <td class="px-6 py-4 text-white"><?= $user['email'] ?></td>
                                    <td class="px-6 py-4 text-user-role" data-uuid="<?= $user['uuid'] ?>">
                                        <form action="<?= base_url('admin/users/updateRole/' . $user['uuid']) ?>" method="POST">
                                            <select name="role" onchange="this.form.submit()" class="bg-gray-700 text-white text-xs rounded-lg px-2 py-1 border border-gray-600 focus:ring-red-500">
                                                <option value="user" <?= $user['role'] == 'user' ? 'selected' : '' ?>>User</option>
                                                <option value="admin" <?= $user['role'] == 'admin' ? 'selected' : '' ?>>Admin</option>
                                            </select>
                                        </form>
                                    </td>
                                    <td class="px-6 py-4 text-white"><?= date('d M Y', strtotime($user['created_at'])) ?></td>
                                    <td class="px-6 py-4 text-center">
                                        <form action="<?= base_url('admin/users/delete/' . $user['uuid']) ?>" method="POST" onsubmit="return confirm('Are you sure?')">
                                            <button class="text-red-400 hover:text-red-600 transition-colors">
                                                <i class="fas fa-trash"></i>
                                            </button>
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

<script>
let lastUserData = JSON.stringify(<?= json_encode($users) ?>);

async function checkNewUsers() {
    try {
        const response = await fetch('<?= base_url('admin/users/getLatestUsers') ?>');
        const users = await response.json();
        const currentData = JSON.stringify(users);
        
        if (currentData !== lastUserData) {
            updateUserTable(users);
            lastUserData = currentData;
        }
    } catch (err) {
        console.error('User polling error:', err);
    }
}

function updateUserTable(users) {
    const tbody = document.getElementById('user-table-body');
    let html = '';
    
    users.forEach(user => {
        const joinedDate = new Date(user.created_at).toLocaleDateString('id-ID', { day: '2-digit', month: 'short', year: 'numeric' });
        
        html += `
            <tr class="hover:bg-gray-700/30 transition-colors duration-200" data-uuid="${user.uuid}">
                <td class="px-6 py-4 text-white">${user.name}</td>
                <td class="px-6 py-4 text-white">${user.email}</td>
                <td class="px-6 py-4 text-user-role" data-uuid="${user.uuid}">
                    <form action="<?= base_url('admin/users/updateRole/') ?>/${user.uuid}" method="POST">
                        <select name="role" onchange="this.form.submit()" class="bg-gray-700 text-white text-xs rounded-lg px-2 py-1 border border-gray-600 focus:ring-red-500">
                            <option value="user" ${user.role === 'user' ? 'selected' : ''}>User</option>
                            <option value="admin" ${user.role === 'admin' ? 'selected' : ''}>Admin</option>
                        </select>
                    </form>
                </td>
                <td class="px-6 py-4 text-white">${joinedDate}</td>
                <td class="px-6 py-4 text-center">
                    <form action="<?= base_url('admin/users/delete/') ?>/${user.uuid}" method="POST" onsubmit="return confirm('Are you sure?')">
                        <button class="text-red-400 hover:text-red-600 transition-colors">
                            <i class="fas fa-trash"></i>
                        </button>
                    </form>
                </td>
            </tr>
        `;
    });
    
    tbody.innerHTML = html;
}

// Check every 5 seconds
setInterval(checkNewUsers, 5000);
</script>

<?= $this->endSection() ?>
<?= $this->extend('templates/header-admin') ?>
<?= $this->section('content') ?>

<div class="flex h-screen overflow-hidden">
    <?= $this->include('admin/sidebar') ?>
    <div class="flex-1 flex flex-col overflow-hidden">
        <?= $this->include('admin/top_nav') ?>
        <main class="flex-1 overflow-y-auto p-6 gradient-bg">
            <div class="flex justify-between items-center mb-8">
                <h2 class="text-3xl font-bold text-white">Categories</h2>
                <button onclick="document.getElementById('addCategoryModal').classList.remove('hidden')" class="bg-red-600 hover:bg-red-700 text-white px-6 py-2 rounded-xl font-bold transition-all shadow-lg hover:shadow-red-600/20">
                    <i class="fas fa-plus mr-2"></i> Add Category
                </button>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                <?php foreach ($categories as $cat): ?>
                    <div class="bg-gray-800/70 border border-gray-700 rounded-2xl p-6 hover:border-red-500/50 transition-all group">
                        <div class="flex justify-between items-start mb-4">
                            <div class="w-12 h-12 bg-red-900/30 rounded-xl flex items-center justify-center text-red-400 group-hover:scale-110 transition-transform">
                                <i class="fas fa-tag text-xl"></i>
                            </div>
                            <form action="<?= base_url('admin/categories/delete/' . $cat['id']) ?>" method="POST">
                                <button class="text-gray-500 hover:text-red-500 transition-colors">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </form>
                        </div>
                        <h3 class="text-xl font-bold text-white mb-2"><?= $cat['name'] ?></h3>
                        <p class="text-gray-400 text-sm"><?= $cat['description'] ?></p>
                    </div>
                <?php endforeach; ?>
            </div>
        </main>
    </div>
</div>

<!-- Add Modal -->
<div id="addCategoryModal" class="hidden fixed inset-0 z-[60] flex items-center justify-center bg-black/60 backdrop-blur-sm p-4">
    <div class="bg-gray-800 border border-gray-700 rounded-2xl w-full max-w-md overflow-hidden shadow-2xl">
        <div class="p-6 border-b border-gray-700 flex justify-between items-center">
            <h3 class="text-xl font-bold text-white">Add New Category</h3>
            <button onclick="document.getElementById('addCategoryModal').classList.add('hidden')" class="text-gray-400 hover:text-white">
                <i class="fas fa-times"></i>
            </button>
        </div>
        <form action="<?= base_url('admin/categories/save') ?>" method="POST" class="p-6 space-y-4">
            <div>
                <label class="block text-gray-400 text-sm mb-2">Category Name</label>
                <input type="text" name="name" required class="w-full bg-gray-700 border border-gray-600 rounded-xl px-4 py-2 text-white focus:ring-2 focus:ring-red-500 outline-none">
            </div>
            <div>
                <label class="block text-gray-400 text-sm mb-2">Description</label>
                <textarea name="description" rows="3" class="w-full bg-gray-700 border border-gray-600 rounded-xl px-4 py-2 text-white focus:ring-2 focus:ring-red-500 outline-none"></textarea>
            </div>
            <button type="submit" class="w-full bg-red-600 hover:bg-red-700 text-white font-bold py-3 rounded-xl transition-all">
                Save Category
            </button>
        </form>
    </div>
</div>

<?= $this->endSection() ?>

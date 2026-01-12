</main>

<!-- Footer -->
<footer class="gradient-bg mt-12">
    <div class="container mx-auto px-4 py-8">
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            <div>
                <div class="flex items-center space-x-2 mb-4">
                    <div class="w-10 h-10 bg-red-600 rounded-lg flex items-center justify-center">
                        <span class="font-bold text-white text-xl">AP</span>
                    </div>
                    <h2 class="text-2xl font-bold text-white">Assign<span class="text-red-500">Point</span></h2>
                </div>
                <p class="text-gray-400">Sistem manajemen inventaris modern dengan tema elegan hitam dan merah.</p>
            </div>

            <div>
                <h3 class="text-lg font-semibold text-white mb-4">Quick Links</h3>
                <ul class="space-y-2">
                    <li><a href="<?= base_url() ?>" class="text-gray-400 hover:text-red-400">Home</a></li>
                    <li><a href="<?= base_url('about') ?>" class="text-gray-400 hover:text-red-400">About</a></li>
                    <li><a href="<?= base_url('auth/login') ?>" class="text-gray-400 hover:text-red-400">Login</a></li>
                    <li><a href="<?= base_url('auth/register') ?>" class="text-gray-400 hover:text-red-400">Register</a></li>
                </ul>
            </div>

            <div>
                <h3 class="text-lg font-semibold text-white mb-4">Contact</h3>
                <ul class="space-y-2 text-gray-400">
                    <li>Email: info@assignpoint.com</li>
                    <li>Phone: +62 850 1234 5678</li>
                    <li>Address: Jawa Timur, Indonesia</li>
                </ul>
            </div>
        </div>

        <div class="border-t border-gray-800 mt-8 pt-8 text-center text-gray-500">
            <p>&copy; <?= date('Y') ?> Assign Point Inventaris System. All rights reserved.</p>
        </div>
    </div>
</footer>

<!-- <script>
        // Auto-dismiss flash messages after 5 seconds
        setTimeout(() => {
            const flashMessages = document.querySelectorAll('[class*="bg-"]');
            flashMessages.forEach(msg => {
                if (msg.closest('.container')) {
                    msg.style.transition = 'opacity 0.5s';
                    msg.style.opacity = '0';
                    setTimeout(() => msg.remove(), 500);
                }
            });
        }, 5000);
    </script> -->
</body>

</html>
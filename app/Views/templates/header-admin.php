<!DOCTYPE html>
<html lang="en" class="dark">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Assign Point</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        * {
            font-family: 'Inter', sans-serif;
        }

        body {
            background-color: #0f172a;
            color: #e2e8f0;
        }

        /* Custom scrollbar */
        ::-webkit-scrollbar {
            width: 8px;
            height: 8px;
        }

        ::-webkit-scrollbar-track {
            background: #1e293b;
        }

        ::-webkit-scrollbar-thumb {
            background: #7f1d1d;
            border-radius: 4px;
        }

        ::-webkit-scrollbar-thumb:hover {
            background: #991b1b;
        }

        /* Custom animations */
        @keyframes slideInRight {
            from {
                opacity: 0;
                transform: translateX(20px);
            }

            to {
                opacity: 1;
                transform: translateX(0);
            }
        }

        .animate-slide-in-right {
            animation: slideInRight 0.3s ease-out;
        }

        .sidebar-item.active {
            background: linear-gradient(90deg, #7f1d1d 0%, #991b1b 100%);
            border-left: 4px solid #dc2626;
        }

        .gradient-bg {
            background: linear-gradient(135deg, #0f172a 0%, #1e1b4b 50%, #450a0a 100%);
        }

        .card-hover {
            transition: all 0.3s ease;
        }

        .card-hover:hover {
            transform: translateY(-4px);
            box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.5), 0 10px 10px -5px rgba(0, 0, 0, 0.04);
        }

        /* Chart colors */
        .chart-grid line {
            stroke: #374151;
        }

        .chart-text {
            fill: #9ca3af;
        }
    </style>
</head>

<body class="bg-gray-900 text-gray-100">
    <div class="min-h-screen">
        <?= $this->renderSection('content') ?>
    </div>

    <script>
        // Mobile sidebar toggle
        function toggleSidebar() {
            const sidebar = document.getElementById('sidebar');
            sidebar.classList.toggle('-translate-x-full');
        }

        // Notification dropdown
        function toggleNotifications() {
            const dropdown = document.getElementById('notificationDropdown');
            dropdown.classList.toggle('hidden');
        }

        // User dropdown
        function toggleUserMenu() {
            const dropdown = document.getElementById('userDropdown');
            dropdown.classList.toggle('hidden');
        }

        // Close dropdowns when clicking outside
        document.addEventListener('click', function(event) {
            const notifBtn = document.getElementById('notificationBtn');
            const notifDropdown = document.getElementById('notificationDropdown');
            const userBtn = document.getElementById('userBtn');
            const userDropdown = document.getElementById('userDropdown');

            if (notifBtn && !notifBtn.contains(event.target) && notifDropdown && !notifDropdown.contains(event.target)) {
                notifDropdown.classList.add('hidden');
            }

            if (userBtn && !userBtn.contains(event.target) && userDropdown && !userDropdown.contains(event.target)) {
                userDropdown.classList.add('hidden');
            }
        });

        // Initialize charts (simplified for demo)
        function initCharts() {
            // Sales chart
            const salesCtx = document.getElementById('salesChart');
            if (salesCtx) {
                // Chart.js would be initialized here
                console.log('Sales chart initialized');
            }

            // Inventory chart
            const inventoryCtx = document.getElementById('inventoryChart');
            if (inventoryCtx) {
                // Chart.js would be initialized here
                console.log('Inventory chart initialized');
            }
        }

        // Dark mode toggle (if needed)
        function toggleDarkMode() {
            const html = document.documentElement;
            html.classList.toggle('dark');
        }

        // Initialize on page load
        document.addEventListener('DOMContentLoaded', function() {
            initCharts();

            // Update current time
            function updateTime() {
                const now = new Date();
                const timeElement = document.getElementById('currentTime');
                if (timeElement) {
                    timeElement.textContent = now.toLocaleTimeString('id-ID', {
                        hour: '2-digit',
                        minute: '2-digit'
                    });
                }
            }

            setInterval(updateTime, 1000);
            updateTime();
        });
    </script>
</body>

</html>
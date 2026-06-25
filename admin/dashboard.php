<?php

require_once '../config/auth.php';
require_once '../config/database.php';

$totalBookings = $pdo->query("SELECT COUNT(*) FROM bookings")->fetchColumn();
$pendingBookings = $pdo->query("SELECT COUNT(*) FROM bookings WHERE status='pending'")->fetchColumn();
$approvedBookings = $pdo->query("SELECT COUNT(*) FROM bookings WHERE status='approved'")->fetchColumn();
$totalRevenue = $pdo->query("SELECT SUM(total_price) FROM bookings WHERE status='approved'")->fetchColumn();
$totalPackages = $pdo->query("SELECT COUNT(*) FROM packages")->fetchColumn();
$totalPhotos = $pdo->query("SELECT COUNT(*) FROM gallery")->fetchColumn();
?>

<!DOCTYPE html>
<html>
<head>
  <title>Dashboard</title>
  <link rel="stylesheet" href="../assets/css/style.css">
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-slate-100">

  <?php
  include __DIR__ . '/includes/sidebar.php';
  ?>

  <div class="lg:ml-64 p-6 pt-24 lg:pt-10">

  <h1 class="text-4xl font-bold mb-8">
  Dashboard
  </h1>

    <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 gap-6">
        <div class="bg-white p-6 rounded-2xl shadow">
            <h2 class="text-gray-500">
                Total Bookings
            </h2>

            <p class="text-5xl font-bold mt-3">
                <?= $totalBookings ?>
            </p>
        </div>

        <div class="bg-white p-6 rounded-2xl shadow">
            <h2 class="text-gray-500">
                Pending Bookings
            </h2>

            <p class="text-5xl font-bold mt-3">
                <?= $pendingBookings ?>
            </p>
        </div>

        <div class="bg-white p-6 rounded-2xl shadow">
            <h2 class="text-gray-500">
                Revenue
            </h2>

            <p class="text-5xl font-bold mt-3">
                ₱<?= number_format($totalRevenue, 2) ?>
            </p>
        </div>

        <div class="bg-white p-6 rounded-2xl shadow">
            <h2 class="text-gray-500">
                Packages
            </h2>

            <p class="text-5xl font-bold mt-3">
                <?= $totalPackages ?>
            </p>
        </div>

        <div class="bg-white p-6 rounded-2xl shadow">
            <h2 class="text-gray-500">
                Gallery Photos
            </h2>

            <p class="text-5xl font-bold mt-3">
                <?= $totalPhotos ?>
            </p>
        </div>
  </div>

  <h2 class="text-3xl font-bold mt-10 mb-6">
        Recent Reservations
  </h2>

  <div class="bg-white rounded-2xl shadow overflow-hidden table-responsive">
      <table class="w-full">
            <thead class="bg-slate-800 text-white">
                <tr>
                    <th class="p-4 text-left">
                        Customer
                    </th>

                    <th class="p-4 text-left">
                        Date
                    </th>

                    <th class="p-4 text-left">
                        Status
                    </th>
                </tr>
            </thead>

            <tbody>
                <?php

                $recent = $pdo->query(
                    "SELECT *
                    FROM bookings
                    ORDER BY created_at DESC
                    LIMIT 5"
                );

                foreach ($recent as $row):
                ?>
                    <tr class="border-b">
                        <td class="p-4">
                            <?= htmlspecialchars($row['customer_name']) ?>
                        </td>

                        <td class="p-4">
                            <?= $row['reservation_date'] ?>
                        </td>

                        <td class="p-4">
                            <?= ucfirst($row['status']) ?>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
  </div>
<script>

const adminMenuBtn =
document.getElementById('adminMenuBtn');

const adminSidebar =
document.getElementById('adminSidebar');

if(adminMenuBtn){

    adminMenuBtn.addEventListener('click', () => {

        adminSidebar.classList.toggle('-translate-x-full');

    });

}

</script>
</body>
</html>
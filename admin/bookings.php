<?php

require_once '../config/auth.php';
require_once '../config/database.php';

$stmt = $pdo->query("
SELECT
    b.*,
    p.package_name
FROM bookings b
LEFT JOIN packages p
ON b.package_id = p.id
ORDER BY b.created_at DESC
");

$bookings = $stmt->fetchAll(PDO::FETCH_ASSOC);

?>

<body class="bg-slate-100">

<?php
include __DIR__ . '/includes/sidebar.php';
?>

    <div class="ml-64 p-10">

    <h1 class="text-4xl font-bold mb-8">
    Bookings
    </h1>

    <div class="bg-white rounded-2xl shadow overflow-hidden">

    <table class="w-full">

    <thead class="bg-slate-800 text-white">

    <tr>
        <th class="p-4 text-left">Customer</th>
        <th class="p-4 text-left">Package</th>
        <th class="p-4 text-left">Date</th>
        <th class="p-4 text-left">Status</th>
        <th class="p-4 text-left">Reference</th>
        <th class="p-4 text-left">Receipt</th>
        <th class="p-4 text-left"></th>
    </tr>

    </thead>

    <tbody>

    <?php foreach($bookings as $booking): ?>

    <tr class="border-b">

    <td class="p-4">
    <?= htmlspecialchars($booking['customer_name']) ?>
    </td>

    <td class="p-4">
    <?= htmlspecialchars($booking['package_name']) ?>
    </td>

    <td class="p-4">
    <?= $booking['reservation_date'] ?>
    </td>

    <td class="p-4">
    <?= ucfirst($booking['status']) ?>
    </td>

    <td>
    <?= $booking['reference_number'] ?>
    </td>
 
    <td class="px-6">

    <a
    class="text-blue-600 underline"
    target="_blank"
    href="../uploads/payments/<?= $booking['payment_proof'] ?>">

    View

    </a>

    </td>

    <td class="p-3 space-x-2">

    <a
    class="bg-green-600 text-white px-3 py-1 rounded"
    href="../api/approve_booking.php?id=<?= $booking['id'] ?>">

    Approve

    </a>

    <a
    class="bg-yellow-600 text-white px-3 py-1 rounded"
    href="../api/reject_booking.php?id=<?= $booking['id'] ?>">

    Reject

    </a>

    <a
    class="bg-red-600 text-white px-3 py-1 rounded"
    onclick="return confirm('Delete booking?')"
    href="../api/delete_booking.php?id=<?= $booking['id'] ?>">

    Delete

    </a>

    </td>

    </tr>
    </tr>

    <?php endforeach; ?>

    </tbody>

    </table>

    </div>

    </div>

</body>
<script src="https://cdn.tailwindcss.com"></script>
<link rel="stylesheet" href="../assets/css/style.css">
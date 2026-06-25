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

    <div class="lg:ml-64 p-6 pt-24 lg:pt-10">

    <h1 class="text-4xl font-bold mb-8">
    Bookings
    </h1>

    <div class="bg-white rounded-2xl shadow overflow-hidden">

    <!-- RESPONSIVE TABLE CONTAINER -->
    <div class="overflow-x-auto">

        <table class="w-full min-w-[1100px]">

            <thead class="bg-slate-800 text-white">

                <tr>
                    <th class="p-4 text-left">Customer</th>
                    <th class="p-4 text-left">Package</th>
                    <th class="p-4 text-left">Date</th>
                    <th class="p-4 text-left">Status</th>
                    <th class="p-4 text-left">Reference</th>
                    <th class="p-4 text-left">Receipt</th>
                    <th class="p-4 text-left">Actions</th>
                </tr>

            </thead>

            <tbody>

            <?php foreach($bookings as $booking): ?>

                <tr class="border-b hover:bg-slate-50">

                    <td class="p-4 whitespace-nowrap">
                        <?= htmlspecialchars($booking['customer_name']) ?>
                    </td>

                    <td class="p-4 whitespace-nowrap">
                        <?= htmlspecialchars($booking['package_name']) ?>
                    </td>

                    <td class="p-4 whitespace-nowrap">
                        <?= $booking['reservation_date'] ?>
                    </td>

                    <td class="p-4 whitespace-nowrap">
                        <?= ucfirst($booking['status']) ?>
                    </td>

                    <td class="p-4 whitespace-nowrap">
                        <?= $booking['reference_number'] ?>
                    </td>

                    <td class="p-4 whitespace-nowrap">

                        <a
                        class="text-blue-600 underline"
                        target="_blank"
                        href="../uploads/payments/<?= $booking['payment_proof'] ?>">

                        View

                        </a>

                    </td>

                    <td class="p-4 whitespace-nowrap">

                        <div class="flex flex-wrap gap-2">

                            <button
                            class="approveBtn bg-green-600 hover:bg-green-700 text-white px-3 py-2 rounded"
                            data-id="<?= $booking['id'] ?>">

                            Approve

                            </button>

                            <button
                            class="rejectBtn bg-yellow-600 hover:bg-yellow-700 text-white px-3 py-2 rounded"
                            data-id="<?= $booking['id'] ?>">

                            Reject

                            </button>

                            <button
                            class="deleteBtn bg-red-600 hover:bg-red-700 text-white px-3 py-2 rounded"
                            data-id="<?= $booking['id'] ?>">

                            Delete

                            </button>

                        </div>

                    </td>

                </tr>

            <?php endforeach; ?>

            </tbody>

        </table>

    </div>

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

<script>
document.querySelectorAll('.approveBtn').forEach(button=>{button.addEventListener('click',async()=>{const id =button.dataset.id;const response =await fetch('../api/approve_booking.php',{method:'POST',headers:{'Content-Type':'application/x-www-form-urlencoded'},body:'id='+encodeURIComponent(id)});const data =await response.json();alert(data.message);location.reload();});});
document.querySelectorAll('.rejectBtn').forEach(button=>{button.addEventListener('click',async()=>{const id =button.dataset.id;const response =await fetch('../api/reject_booking.php',{method:'POST',headers:{'Content-Type':'application/x-www-form-urlencoded'},body:'id='+encodeURIComponent(id)});const data =await response.json();alert(data.message);location.reload();});});
document.querySelectorAll('.deleteBtn').forEach(button=>{button.addEventListener('click',async()=>{if(!confirm('Delete booking?')){return;}const id =button.dataset.id;const response =await fetch('../api/delete_booking.php',{method:'POST',headers:{'Content-Type':'application/x-www-form-urlencoded'},body:'id='+encodeURIComponent(id)});const data =await response.json();alert(data.message);location.reload();});});
</script>
<script src="https://cdn.tailwindcss.com"></script>
<link rel="stylesheet" href="../assets/css/style.css">

</body>

<?php

require_once 'config/database.php';

$result = null;

if(isset($_GET['ref'])){

    $stmt = $pdo->prepare(
        "SELECT *
        FROM bookings
        WHERE reference_number = ?"
    );

    $stmt->execute([
        trim($_GET['ref'])
    ]);

    $result = $stmt->fetch(PDO::FETCH_ASSOC);
}

?>

<!DOCTYPE html>
<html>
<head>

<title>Track Booking</title>

<link rel="stylesheet" href="assets/css/style.css">
<link href="https://unpkg.com/aos@2.3.4/dist/aos.css" rel="stylesheet">
</head>

<body class="bg-slate-100">
    <nav class="fixed top-0 left-0 w-full z-50 transition-all duration-300 fixed bg-slate-100" id="navbar">
      <div class="max-w-7xl mx-auto px-6 py-4 flex justify-between items-center">
        <a class="text-3xl font-bold text-black" id="logo">CASA TEJADA</a>
        <ul class="flex gap-6 text-black">
          <li><a href="index.php">Home</a></li>
          <li><a href="about.php">About</a></li>
          <li><a href="gallery.php">Gallery</a></li>
          <li><a href="contact.php">Contact</a></li>
          <li><a href="booking.php">Book Now</a></li>
          <li><a href="track.php">Track Booking</a></li>
          <li><a href="available_dates.php">Availability</a></li>
        </ul>
        <a href="booking.php" class="bg-amber-500 hover:bg-amber-600 px-5 py-2 rounded-xl text-white font-semibold">Book Now</a>
      </div>
    </nav>

<div class="max-w-3xl mx-auto py-16 px-6">

<h1 class="text-5xl font-bold text-center py-20" data-aos="fade-up">
Track Reservation
</h1>

<div class="bg-white p-8 rounded-3xl shadow-xl" data-aos="fade-up" data-aos-delay="200">

<form method="GET">

<input
name="ref"
placeholder="Enter Reference Number"
required
class="w-full border p-4 rounded-xl mb-4">

<button
class="w-full bg-teal-600 text-white py-4 rounded-xl">

Track Booking

</button>

</form>

</div>

<?php if(isset($_GET['ref'])): ?>

<div class="bg-white p-8 rounded-3xl shadow-xl mt-8" data-aos="fade-up">

<?php if($result): ?>

<h2 class="text-3xl font-bold mb-4">
Reservation Found
</h2>

<p class="mb-2">
<strong>Reference:</strong>
<?= htmlspecialchars($result['reference_number']) ?>
</p>

<p class="mb-2">
<strong>Name:</strong>
<?= htmlspecialchars($result['customer_name']) ?>
</p>

<p class="mb-2">
<strong>Date:</strong>
<?= $result['reservation_date'] ?>
</p>

<p class="mb-2">
<strong>Total:</strong>
₱<?= number_format($result['total_price'],2) ?>
</p>

<p class="mb-2">
<strong>Status:</strong>
<?= ucfirst($result['status']) ?>
</p>

<?php else: ?>

<h2 class="text-red-600 text-2xl font-bold">
Reference Number Not Found
</h2>

<p class="mt-2">
Check that you entered the reference correctly.
</p>

<?php endif; ?>

</div>

<?php endif; ?>

</div>
<script src="https://unpkg.com/aos@2.3.4/dist/aos.js"></script>
<script>
AOS.init({
    duration: 1000,
    once: true
});
</script>

<script>
AOS.init({
    duration: 1000,
    once: true
});
</script>
</body>
</html>
<?php

require_once 'config/database.php';

$stmt = $pdo->query("
SELECT *
FROM packages
ORDER BY price ASC
");

$packages = $stmt->fetchAll(PDO::FETCH_ASSOC);

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Casa Tejada Reservation</title>
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
  <div class="max-w-4xl mx-auto py-20 px-5 ">
    <h1 class="text-4xl font-bold mb-8 text-center" data-aos="fade-up">Reserve Your Stay</h1>
    <form id="bookingForm" class="bg-white p-8 rounded-3xl shadow-xl space-y-5" enctype="multipart/form-data" data-aos="fade-up" data-aos-delay="200">
      <input type="text" name="customer_name" placeholder="Full Name" required class="w-full border p-3 rounded-xl">
      <input type="email" name="customer_email" placeholder="Email" required class="w-full border p-3 rounded-xl">
      <input type="text" name="customer_phone" placeholder="Phone Number" required class="w-full border p-3 rounded-xl">
      <input type="date" name="reservation_date" required class="w-full border p-3 rounded-xl">
      <select name="package_id" id="packageSelect"
      required
      class="w-full border p-3 rounded-xl">
      <?php foreach($packages as $package): ?>
        <option value="<?= $package['id'] ?>">
          <?= htmlspecialchars($package['package_name']) ?> - ₱<?= number_format($package['price'], 2) ?>
        </option>
      <?php endforeach; ?>
      </select>
      <label class="flex gap-3">
        <input type="checkbox" name="extra_room">
        Extra Room (+₱1500)
      </label>
      <label class="flex gap-3">
        <input type="checkbox" name="function_hall_ac">
        Function Hall AC (+₱2000)
      </label>
      <input type="file" name="payment_proof" accept="image/*" required class="w-full border p-3 rounded-xl">
      <h2 class="text-2xl font-bold">
        Estimated Total:
        <span id="totalPrice">₱0</span>
      </h2>
      <button type="submit" class="w-full bg-teal-600 text-white py-4 rounded-xl">Submit Reservation</button>
    </form>
    <div
      id="bookingResult"
      class="hidden mt-6 bg-green-100 border border-green-300 p-6 rounded-2xl">

    </div>
  </div>
  
</body>
<script src="assets/js/booking.js"></script>
<script src="https://unpkg.com/aos@2.3.4/dist/aos.js"></script>

<script>
AOS.init({
    duration: 1000,
    once: true
});
</script>
</html>
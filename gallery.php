<?php

require_once 'config/database.php';

$stmt =
$pdo->query(
"SELECT *
FROM gallery
ORDER BY id DESC"
);

$photos =
$stmt->fetchAll(PDO::FETCH_ASSOC);

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Gallery | Casa Tejada</title>
	<link rel="stylesheet" href="assets/css/style.css">
	<link href="https://unpkg.com/aos@2.3.4/dist/aos.css" rel="stylesheet">
</head>
<body class="bg-slate-100">
	<div class="max-w-7xl mx-auto px-5 py-20">
        <!-- NAVBAR -->
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
		<h1
		class="text-5xl font-bold mb-8 text-center"
		data-aos="fade-up">
			Gallery
		</h1>

		<div class="grid md:grid-cols-3 gap-6" data-aos="fade-up" data-aos-delay="200">
			<?php foreach ($photos as $photo): ?>
				<div class="bg-white rounded-2xl shadow overflow-hidden" data-aos="fade-up">
					<img
						src="uploads/gallery/<?= $photo['image'] ?>"
						alt="<?= htmlspecialchars($photo['title']) ?>"
						class="w-full h-64 object-cover">

					<div class="p-4">
						<h3 class="text-xl font-semibold">
							<?= htmlspecialchars($photo['title']) ?>
						</h3>
					</div>
				</div>
			<?php endforeach; ?>
		</div>
	</div>
<script src="https://unpkg.com/aos@2.3.4/dist/aos.js"></script>

<script>
AOS.init({
    duration: 1000,
    once: true
});
</script>
</body>
</html>
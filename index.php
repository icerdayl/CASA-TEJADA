<?php

require_once 'config/database.php';


?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Casa Tejada Resort</title>
  <link rel="stylesheet" href="assets/css/style.css">
  <link href="https://unpkg.com/aos@2.3.4/dist/aos.css" rel="stylesheet">
</head>

<body class="bg">
  <!-- NAVBAR -->
  <nav class="fixed top-0 left-0 w-full z-50 transition-all duration-300" id="navbar">
    <div class="max-w-7xl mx-auto px-6 py-4 flex justify-between items-center">
      <a class="text-3xl font-bold text-white" id="logo">CASA TEJADA</a>
      <ul class="flex gap-6 text-white">
        <li><a href="index.php">Home</a></li>
        <li><a href="about.php">About</a></li>
        <li><a href="gallery.php">Gallery</a></li>
        <li><a href="contact.php">Contact</a></li>
        <li><a href="booking.php">Book Now</a></li>
        <li><a href="track.php">Track Booking</a></li>
        <li><a href="available_dates.php">Availability</a></li>
      </ul>
      <a href="booking.html" class="bg-amber-500 hover:bg-amber-600 px-5 py-2 rounded-xl text-white font-semibold">Book Now</a>
    </div>
  </nav>

  <!-- HERO -->
  <section class="h-screen relative overflow-hidden">
    <img src="assets/images/bg.jpg" class="absolute inset-0 w-full h-full object-cover">
    <div class="absolute inset-0 bg-black/50"></div>
    <div class="relative h-full flex items-center justify-center">
      <div class="text-center text-white">
        <h1 class="text-6xl md:text-8xl font-bold mb-4" data-aos="fade-up">CASA TEJADA</h1>
        <p class="text-xl md:text-2xl mb-8" data-aos="fade-up" data-aos-delay="200">Singapore Inspired Private Resort</p>
        <a href="booking.html" class="bg-teal-600 px-8 py-4 rounded-xl text-xl hover:bg-teal-700 transition">Reserve Now</a>
      </div>
    </div>
  </section>

  <script src="assets/js/main.js"></script>
  <script src="https://unpkg.com/aos@2.3.4/dist/aos.js"></script>
  <script>
    AOS.init();

  </script>
</body>
</html>
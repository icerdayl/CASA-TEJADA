<?php
// Reusable site navbar
?>
<nav id="navbar" class="sticky top-0 left-0 w-full z-50 transition-all duration-300">
  <div class="max-w-7xl mx-auto px-6">
    <div class="flex justify-between items-center h-20">
      <!-- Logo -->
      <a href="home.php" class="text-3xl font-bold logoText">CASA TEJADA</a>

      <!-- Desktop Menu -->
      <div class="hidden md:flex items-center gap-8">
        <a href="home.php">Home</a>
        <a href="about.php">About</a>
        <a href="gallery.php">Gallery</a>
        <a href="contact.php">Contact</a>
        <a href="booking.php">Book Now</a>
        <a href="track.php">Track Booking</a>
        <a href="available_dates.php">Availability</a>
      </div>

      <!-- Mobile Button -->
      <button id="menuBtn" class="md:hidden text-3xl">â˜°</button>

      <!-- Book Button -->
      <a href="booking.php" class="hidden md:block bg-amber-500 hover:bg-amber-600 text-white px-6 py-3 rounded-2xl">Book Now</a>
    </div>

    <!-- Mobile Menu -->
    <div id="mobileMenu" class="hidden md:hidden bg-white rounded-xl shadow-lg p-4 space-y-4 absolute top-20 left-0 w-full z-50">
      <a href="home.php" class="block">Home</a>
      <a href="about.php" class="block">About</a>
      <a href="gallery.php" class="block">Gallery</a>
      <a href="contact.php" class="block">Contact</a>
      <a href="booking.php" class="block">Book Now</a>
      <a href="track.php" class="block">Track Booking</a>
      <a href="available_dates.php" class="block">Availability</a>
    </div>
  </div>
</nav>

<script>
  (function () {
    var menuBtn = document.getElementById('menuBtn');
    var mobileMenu = document.getElementById('mobileMenu');
    if (menuBtn && mobileMenu) {
      menuBtn.addEventListener('click', function () {
        if (mobileMenu.style.display === 'none' || mobileMenu.style.display === '') {
          mobileMenu.style.display = 'block';
        } else {
          mobileMenu.style.display = 'none';
        }
      });
    }
  })();
</script>
<li>
    <a href="track.php">
        Track Booking
    </a>
</li>
<li>
    <a href="available_dates.php">
        Availability
    </a>
</li>
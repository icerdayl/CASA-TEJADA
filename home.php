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

    <link
        href="https://unpkg.com/aos@2.3.4/dist/aos.css"
        rel="stylesheet"
    >

    <script src="https://cdn.tailwindcss.com"></script>

</head>

<body class="bg">

    <!-- NAVBAR -->
    <nav
        id="navbar"
        class="fixed top-0 left-0 w-full z-50 transition-all duration-300 bg-white text-black"
    >

        <div class="max-w-7xl mx-auto px-6">

            <div class="flex justify-between items-center h-20 gap-3">

                <!-- Logo -->
                <a
                    href="home.php"
                    class="text-3xl font-bold logoText"
                >
                    CASA TEJADA
                </a>

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
                <button
                    id="menuBtn"
                    class="md:hidden text-3xl text-black z-50"
                >
                    ☰
                </button>

                <!-- Book Button -->
                <a
                    href="booking.php"
                    class="hidden md:block bg-amber-500 hover:bg-amber-600 text-white px-6 py-3 rounded-2xl"
                >
                    Book Now
                </a>

            </div>

            <!-- Mobile Menu -->
            <div
                id="mobileMenu"
                class="hidden md:hidden bg-white rounded-xl shadow-lg p-4 space-y-4 absolute top-20 left-0 w-full z-50 text-black"
            >

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

    <!-- HERO -->
    <section class="h-screen relative overflow-hidden">

        <img
            src="assets/images/bg.jpg"
            class="absolute inset-0 w-full h-full object-cover"
        >

        <div class="absolute inset-0 bg-black/50"></div>

        <div class="relative h-full flex items-center justify-center">

            <div class="text-center text-white">

                <h1
                    class="text-6xl md:text-8xl font-bold mb-4"
                    data-aos="fade-up"
                >
                    CASA TEJADA
                </h1>

                <p
                    class="text-xl md:text-2xl mb-8"
                    data-aos="fade-up"
                    data-aos-delay="200"
                >
                    Singapore Inspired Private Resort
                </p>

                <a
                    href="booking.php"
                    class="bg-teal-600 px-8 py-4 rounded-xl text-xl hover:bg-teal-700 transition"
                >
                    Reserve Now
                </a>

            </div>

        </div>

    </section>

    <script src="https://unpkg.com/aos@2.3.4/dist/aos.js"></script>

    <script>
        AOS.init();
    </script>

    <script>
        document.addEventListener('DOMContentLoaded', () => {

            const menuBtn =
                document.getElementById('menuBtn');

            const mobileMenu =
                document.getElementById('mobileMenu');

            if (menuBtn && mobileMenu) {

                menuBtn.addEventListener('click', () => {
                    mobileMenu.classList.toggle('hidden');
                });

            }

        });
    </script>

</body>

</html>
<!DOCTYPE html>
<html>

<head>

    <title>About Us</title>

    <link rel="stylesheet" href="assets/css/style.css">
    <link
        href="https://unpkg.com/aos@2.3.4/dist/aos.css"
        rel="stylesheet"
    >

    <script src="https://cdn.tailwindcss.com"></script>

</head>

<body class="bg-slate-100">

    <!-- NAVBAR -->
    <nav
        id="navbar"
        class="fixed top-0 left-0 w-full z-50 transition-all duration-300 bg-slate-100"
    >

        <div class="max-w-7xl mx-auto px-6">

            <div class="flex justify-between items-center h-20">

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
                    class="md:hidden text-3xl"
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
                class="hidden md:hidden bg-white rounded-xl shadow-lg p-4 space-y-4 absolute top-20 left-0 w-full z-50"
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

    <div class="page-content max-w-5xl mx-auto py-20">

        <h1
            class="text-5xl font-bold mb-10"
            data-aos="fade-up"
        >
            About Casa Tejada
        </h1>

        <div
            class="bg-white p-8 rounded-2xl shadow"
            data-aos="fade-up"
            data-aos-delay="200"
        >

            <h2 class="text-2xl font-bold">
                Our Story
            </h2>

            <p class="mt-4">
                Casa Tejada is a Singapore-inspired private resort
                designed to provide relaxation and memorable experiences.
            </p>

            <h2 class="text-2xl font-bold mt-8">
                Facilities
            </h2>

            <ul class="list-disc ml-6 mt-4">

                <li>Swimming Pool</li>
                <li>Function Hall</li>
                <li>Airconditioned Rooms</li>
                <li>Outdoor Dining Area</li>

            </ul>

        </div>

    </div>

    <script src="https://unpkg.com/aos@2.3.4/dist/aos.js"></script>

    <script>
        AOS.init({
            duration: 1000,
            once: true
        });
    </script>

    <script>
        const menuBtn =
            document.getElementById('menuBtn');

        const mobileMenu =
            document.getElementById('mobileMenu');

        menuBtn.addEventListener('click', () => {

            if (mobileMenu.style.display === 'none') {
                mobileMenu.style.display = 'block';
            } else {
                mobileMenu.style.display = 'none';
            }

        });
    </script>

</body>

</html>
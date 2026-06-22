<!DOCTYPE html>
<html>

<head>
    <title>Available Dates</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdn.jsdelivr.net/npm/fullcalendar@6.1.11/index.global.min.css" rel="stylesheet">
    <link href="https://unpkg.com/aos@2.3.4/dist/aos.css" rel="stylesheet">
</head>

<body class="bg-slate-100">

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

    <div class="max-w-7xl mx-auto p-10">

        <h1 class="text-5xl font-bold mt-8 mb-8 text-center" data-aos="fade-up">

            Reservation Calendar

        </h1>

        <div class="bg-white p-6 rounded-3xl shadow" data-aos="fade-up" data-aos-delay="200">

            <div id="calendar"></div>

        </div>

        <div class="mt-8 bg-white p-6 rounded-3xl shadow" data-aos="fade-up" data-aos-delay="200">

            <h2 class="text-2xl font-bold mb-4" data-aos="fade-up">
                Legend
            </h2>

            <div class="flex gap-6">

                <div class="flex items-center gap-3">

                    <div class="w-6 h-6 bg-red-500 rounded"></div>

                    <span>Reserved</span>

                </div>

            </div>

        </div>

    </div>

<script src="https://cdn.jsdelivr.net/npm/fullcalendar@6.1.11/index.global.min.js"></script>

<script>

document.addEventListener(

'DOMContentLoaded',

function(){

const calendar = new FullCalendar.Calendar(

document.getElementById('calendar'),

{

initialView:'dayGridMonth',

height:700,

events:'api/get_public_calendar.php'

}

);

calendar.render();

}

);

</script>
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
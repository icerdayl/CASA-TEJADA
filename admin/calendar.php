<?php

require_once '../config/auth.php';

?>

<!DOCTYPE html>
<html>

<head>

<title>Reservation Calendar</title>

<script src="https://cdn.tailwindcss.com"></script>

<link
href="https://cdn.jsdelivr.net/npm/fullcalendar@6.1.11/index.global.min.css"
rel="stylesheet">

</head>

<body class="bg-slate-100">

<?php
include __DIR__ . '/includes/sidebar.php';
?>

<div class="lg:ml-64 p-6 pt-24 lg:pt-10">
    

<h1 class="text-4xl font-bold mb-8">

Reservation Calendar

</h1>

<div
class="bg-white p-6 rounded-2xl shadow">

<div id="calendar"></div>

</div>

</div>

<script src="https://cdn.jsdelivr.net/npm/fullcalendar@6.1.11/index.global.min.js"></script>

<script>

document.addEventListener(
'DOMContentLoaded',
function(){

const calendarEl =
document.getElementById(
'calendar'
);

const calendar =
new FullCalendar.Calendar(

calendarEl,

{

initialView:
'dayGridMonth',

height:700,

events:
'../api/get_calendar_events.php'

}

);

calendar.render();

}
);

</script>
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
</body>

</html>
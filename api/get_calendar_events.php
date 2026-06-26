<?php

require_once '../config/database.php';

header('Content-Type: application/json');

$stmt = $pdo->query(
"SELECT *
FROM bookings
WHERE status='approved'"
);

$events = [];

while($row = $stmt->fetch(PDO::FETCH_ASSOC)){

    // Check if reservation date has already passed
    if($row['reservation_date'] < date('Y-m-d')){

        // Past reservation
        $events[] = [

            'title' => 'BOOKING COMPLETED',

            'start' => $row['reservation_date'],

            'color' => '#22c55e' // Green

        ];

    } else {

        // Upcoming reservation
        $events[] = [

            'title' => 'Reserved',

            'start' => $row['reservation_date'],

            'color' => '#ef4444' // Red

        ];

    }

}

echo json_encode($events);
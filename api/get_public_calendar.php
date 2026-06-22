<?php

require_once '../config/database.php';

header('Content-Type: application/json');

$stmt = $pdo->prepare(

"SELECT
reference_number,
reservation_date,
status
FROM bookings
WHERE status = 'approved'
AND reservation_date >= CURDATE()"

);

$stmt->execute();

$events = [];

while($row = $stmt->fetch(PDO::FETCH_ASSOC)){

    $events[] = [

        'title' => 'Reserved',

        'start' => $row['reservation_date'],

        'color' => '#ef4444'

    ];

}

echo json_encode($events);
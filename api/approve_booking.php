<?php

header('Content-Type: application/json');

require_once '../config/database.php';

$id = $_POST['id'] ?? $_GET['id'] ?? 0;

$stmt = $pdo->prepare(
"UPDATE bookings
SET status='approved'
WHERE id=?"
);

$stmt->execute([$id]);

echo json_encode([
    'success' => true,
    'message' => 'Booking approved successfully.'
]);
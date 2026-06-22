<?php

require_once '../config/database.php';

$id = $_GET['id'];

$stmt = $pdo->prepare(
"UPDATE bookings
SET status='rejected'
WHERE id=?"
);

$stmt->execute([$id]);

header(
"Location: ../admin/bookings.php"
);
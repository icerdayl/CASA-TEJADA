<?php

require_once '../config/database.php';

$id = $_GET['id'];

$stmt = $pdo->prepare(
"DELETE FROM bookings
WHERE id=?"
);

$stmt->execute([$id]);

header(
"Location: ../admin/bookings.php"
);
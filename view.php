<?php

require_once 'config/database.php';

$stmt = $pdo->query("SELECT * FROM bookings");

while ($row = $stmt->fetch()) {
    echo $row['customer_name'];
    echo "<br>";
}
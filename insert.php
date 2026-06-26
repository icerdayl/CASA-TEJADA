<?php

require_once 'config/database.php';

$sql = "INSERT INTO bookings (
    customer_name,
    customer_email,
    customer_phone,
    reservation_date,
    total_price,
    status
) VALUES (
    'Juan Dela Cruz',
    'juan@gmail.com',
    '09123456789',
    '2026-06-20',
    5000,
    'pending'
)";

$pdo->exec($sql);

echo "Inserted";
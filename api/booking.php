<?php

header('Content-Type: application/json');

require_once '../config/database.php';

try {
    $customer_name = $_POST['customer_name'];
    $customer_email = $_POST['customer_email'];
    $customer_phone = $_POST['customer_phone'];
    $reservation_date = $_POST['reservation_date'];
    $package_id = $_POST['package_id'];
    $extra_room = isset($_POST['extra_room']) ? 1 : 0;
    $function_hall_ac = isset($_POST['function_hall_ac']) ? 1 : 0;

    if (
        empty($customer_name) ||
        empty($customer_email) ||
        empty($customer_phone) ||
        empty($reservation_date) ||
        empty($package_id)
    ) {
        echo json_encode([
            'success' => false,
            'message' => 'Please complete all fields.'
        ]);
        exit;
    }

    if (!filter_var($customer_email, FILTER_VALIDATE_EMAIL)) {
        echo json_encode([
            'success' => false,
            'message' => 'Invalid email address.'
        ]);
        exit;
    }

    // Check availability
    $check = $pdo->prepare(
        "SELECT COUNT(*) FROM bookings
         WHERE reservation_date = ? AND status = 'approved'"
    );
    $check->execute([$reservation_date]);

    if ($check->fetchColumn() > 0) {
        echo json_encode([
            'success' => false,
            'message' => 'Date already reserved.'
        ]);
        exit;
    }

    // Package prices
    $prices = [
        1 => 5000,
        2 => 6000,
        3 => 7000,
        4 => 8000,
        5 => 10000,
        6 => 12000
    ];

    $total = $prices[$package_id];

    if ($extra_room) {
        $total += 1500;
    }

    if ($function_hall_ac) {
        $total += 2000;
    }

    // Upload receipt
    $proofName = time() . '_' . basename($_FILES['payment_proof']['name']);
    $target = '../uploads/payments/' . $proofName;
    move_uploaded_file($_FILES['payment_proof']['tmp_name'], $target);

    $referenceNumber =
        "CT-" .
        date('Ymd') .
        "-" .
        str_pad(
        rand(1,9999),
        4,
        "0",
        STR_PAD_LEFT
        );
    // Save to database
    $stmt = $pdo->prepare(
    "INSERT INTO bookings (
        customer_name,
        customer_email,
        reference_number,
        customer_phone,
        package_id,
        reservation_date,
        extra_room,
        function_hall_ac,
        payment_proof,
        total_price
        )
        VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)"
    );

    $stmt->execute([
        $customer_name,
        $customer_email,
        $referenceNumber,
        $customer_phone,
        $package_id,
        $reservation_date,
        $extra_room,
        $function_hall_ac,
        $proofName,
        $total
    ]);

    echo json_encode([

        'success'=>true,

        'reference_number'=>
        $referenceNumber,

        'message'=>
        'Reservation submitted successfully.'

    ]);

} catch (Exception $e) {
    echo json_encode([
        'success' => false,
        'message' => $e->getMessage()
    ]);
}
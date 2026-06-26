<?php

header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET, POST, OPTIONS");
header("Access-Control-Allow-Headers: Content-Type");
header("Content-Type: application/json");

require_once '../config/database.php';

$stmt = $pdo->query("
    SELECT title, image
    FROM gallery
    ORDER BY id DESC
");

echo json_encode(
    $stmt->fetchAll(PDO::FETCH_ASSOC)
);
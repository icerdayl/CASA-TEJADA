<?php

require_once '../config/database.php';

$stmt =
$pdo->query(
"SELECT *
FROM packages
WHERE is_active=1"
);

echo json_encode(
$stmt->fetchAll(PDO::FETCH_ASSOC)
);
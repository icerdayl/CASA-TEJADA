<?php

header('Content-Type: application/json');

require_once '../config/database.php';

$name = $_POST['package_name'];
$description = $_POST['description'];
$pax = $_POST['pax_limit'];
$bedrooms = $_POST['bedrooms'];
$price = $_POST['price'];

$stmt = $pdo->prepare(
"INSERT INTO packages(
package_name,
description,
pax_limit,
bedrooms,
price
)
VALUES(
?,?,?,?,?
)"
);

$stmt->execute([
$name,
$description,
$pax,
$bedrooms,
$price
]);

header("Location: ../admin/packages.php");
exit;
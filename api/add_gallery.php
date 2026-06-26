<?php

header('Content-Type: application/json');

require_once '../config/database.php';

$title = $_POST['title'];

$extension = pathinfo(
    $_FILES['image']['name'],
    PATHINFO_EXTENSION
);

$image = time() . '.' . $extension;

if (
    !move_uploaded_file(
        $_FILES['image']['tmp_name'],
        __DIR__ . '/../uploads/gallery/' . $image
    )
) {
    die("Failed to upload image.");
}

$stmt = $pdo->prepare(
    "INSERT INTO gallery (
        title,
        image
    )
    VALUES (
        ?,
        ?
    )"
);

$stmt->execute([
    $title,
    $image
]);

header(
    "Location: ../admin/gallery.php"
);
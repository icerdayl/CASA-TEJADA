<?php

header('Content-Type: application/json');

require_once '../config/database.php';

$id = $_GET['id'] ?? 0;

$stmt = $pdo->prepare(
    "SELECT image
     FROM gallery
     WHERE id=?"
);

$stmt->execute([$id]);

$photo = $stmt->fetch(PDO::FETCH_ASSOC);

if($photo){

    $file =
    "../uploads/gallery/" .
    $photo['image'];

    if(file_exists($file)){
        unlink($file);
    }

    $delete = $pdo->prepare(
        "DELETE FROM gallery
         WHERE id=?"
    );

    $delete->execute([$id]);
}

header("Location: ../admin/gallery.php");
exit;
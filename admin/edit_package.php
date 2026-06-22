<?php

require_once '../config/auth.php';
require_once '../config/database.php';

$id = $_GET['id'];

$stmt = $pdo->prepare(
"SELECT *
FROM packages
WHERE id=?"
);

$stmt->execute([$id]);

$package = $stmt->fetch(PDO::FETCH_ASSOC);

if(!$package){
    die("Package not found.");
}

if($_SERVER['REQUEST_METHOD'] == 'POST'){

    $name = $_POST['package_name'];
    $description = $_POST['description'];
    $pax = $_POST['pax_limit'];
    $bedrooms = $_POST['bedrooms'];
    $price = $_POST['price'];

    $update = $pdo->prepare(
    "UPDATE packages
    SET
        package_name=?,
        description=?,
        pax_limit=?,
        bedrooms=?,
        price=?
    WHERE id=?"
    );

    $update->execute([
        $name,
        $description,
        $pax,
        $bedrooms,
        $price,
        $id
    ]);

    header("Location: packages.php");
    exit;
}

?>

<!DOCTYPE html>
<html>
<head>

<title>Edit Package</title>

<script src="https://cdn.tailwindcss.com"></script>

</head>

<body class="bg-slate-100">

<?php
include __DIR__ . '/includes/sidebar.php';
?>

<div class="ml-64 p-10">

<h1 class="text-4xl font-bold mb-8">
Edit Package
</h1>

<form
method="POST"
class="bg-white p-8 rounded-2xl shadow max-w-2xl">

<label class="font-semibold">
Package Name
</label>

<input
type="text"
name="package_name"
value="<?= htmlspecialchars($package['package_name']) ?>"
class="w-full border p-3 rounded-lg mb-4"
required>

<label class="font-semibold">
Description
</label>

<textarea
name="description"
class="w-full border p-3 rounded-lg mb-4"
required><?= htmlspecialchars($package['description']) ?></textarea>

<label class="font-semibold">
Pax Limit
</label>

<input
type="number"
name="pax_limit"
value="<?= $package['pax_limit'] ?>"
class="w-full border p-3 rounded-lg mb-4"
required>

<label class="font-semibold">
Bedrooms
</label>

<input
type="number"
name="bedrooms"
value="<?= $package['bedrooms'] ?>"
class="w-full border p-3 rounded-lg mb-4"
required>

<label class="font-semibold">
Price
</label>

<input
type="number"
step="0.01"
name="price"
value="<?= $package['price'] ?>"
class="w-full border p-3 rounded-lg mb-6"
required>

<button
class="bg-teal-600 text-white px-6 py-3 rounded-lg">

Save Changes

</button>

</form>

</div>

</body>
</html>
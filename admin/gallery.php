<body class="bg-slate-100">

<?php
include __DIR__ . '/includes/sidebar.php';
require_once '../config/auth.php';
require_once '../config/database.php';
$stmt = $pdo->query(
    "SELECT *
     FROM gallery
     ORDER BY id DESC"
);

$photos = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<div class="ml-64 p-10">

<h1 class="text-4xl font-bold mb-8">
Gallery
</h1>

<form
action="../api/add_gallery.php"
method="POST"
enctype="multipart/form-data"
class="bg-white p-6 rounded-2xl shadow">

<input
type="text"
name="title"
placeholder="Photo Title"
required
class="w-full border p-3 rounded-lg mb-4">

<input
type="file"
name="image"
required
class="w-full border p-3 rounded-lg mb-4">

<button
class="bg-teal-600 text-white px-6 py-3 rounded-lg">

Upload

</button>

</form>

<h2 class="text-3xl font-bold mt-10 mb-6">
Uploaded Photos
</h2>

<div class="grid md:grid-cols-3 gap-6">

<?php foreach($photos as $photo): ?>

<div class="bg-white rounded-2xl shadow overflow-hidden">

    <img
    src="../uploads/gallery/<?= htmlspecialchars($photo['image']) ?>"
    class="w-full h-64 object-cover">

    <div class="p-4">

        <h3 class="font-bold text-lg">
            <?= htmlspecialchars($photo['title']) ?>
        </h3>

        <a
        href="../api/delete_gallery.php?id=<?= $photo['id'] ?>"
        onclick="return confirm('Delete this photo?')"
        class="inline-block mt-4 bg-red-600 text-white px-4 py-2 rounded-lg">

        Delete

        </a>

    </div>

</div>

<?php endforeach; ?>

</div>

</div>

</body>

<script src="https://cdn.tailwindcss.com"></script>
<link rel="stylesheet" href="../assets/css/style.css">
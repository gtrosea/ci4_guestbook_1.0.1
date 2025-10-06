<!DOCTYPE html>
<html>
<head>
    <title>Guest List</title>
</head>
<body>
    <h1>Daftar Tamu</h1>
    <a href="/guests/create">Tambah Tamu</a>
    <ul>
        <?php foreach($guests as $g): ?>
            <li><?= $g['name']; ?> (<?= $g['status']; ?>)</li>
        <?php endforeach; ?>
    </ul>
</body>
</html>

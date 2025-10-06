<!DOCTYPE html>
<html>
<head>
    <title>Welcome</title>
</head>
<body>
    <h1>Selamat Datang, <?= esc($guest['name']); ?>!</h1>
    <p>Status: <?= esc($guest['status']); ?></p>
    <p>Kota: <?= esc($guest['city']); ?></p>
</body>
</html>

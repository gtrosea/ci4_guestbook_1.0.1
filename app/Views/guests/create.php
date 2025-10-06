<!DOCTYPE html>
<html>
<head>
    <title>Tambah Tamu</title>
</head>
<body>
    <h1>Tambah Tamu</h1>
    <form method="post" action="/guests/store">
        <input type="text" name="name" placeholder="Nama" required><br>
        <input type="text" name="phone" placeholder="No HP"><br>
        <input type="text" name="email" placeholder="Email"><br>
        <input type="text" name="city" placeholder="Kota"><br>
        <select name="status">
            <option value="regular">Regular</option>
            <option value="vip">VIP</option>
            <option value="vvip">VVIP</option>
        </select><br>
        <input type="number" name="invite_quota" value="1"><br>
        <button type="submit">Simpan</button>
    </form>
</body>
</html>

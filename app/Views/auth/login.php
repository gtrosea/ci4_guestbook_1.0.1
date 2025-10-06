<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
</head>
<body>
    <?php if(session()->getFlashdata('error')): ?>
        <p style="color:red"><?= session()->getFlashdata('error') ?></p>
    <?php endif; ?>

    <form action="<?= site_url('/login') ?>" method="post">
        <?= csrf_field() ?> <!-- untuk keamanan CSRF -->
        <label>Email</label>
        <input type="email" name="email" required><br>

        <label>Password</label>
        <input type="password" name="password" required><br>

        <button type="submit">Login</button>
    </form>
</body>
</html>

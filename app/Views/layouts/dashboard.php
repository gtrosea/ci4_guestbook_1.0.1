<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title><?= esc($title ?? 'Dashboard') ?></title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark mb-4">
        <div class="container-fluid">
            <a class="navbar-brand" href="<?= site_url('/dashboard') ?>">Guestbook</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <?php if(session()->get('role') === 'admin'): ?>
                        <li class="nav-item"><a class="nav-link" href="<?= site_url('admin/users') ?>">Users</a></li>
                        <li class="nav-item"><a class="nav-link" href="<?= site_url('admin/events') ?>">Events</a></li>
                    <?php else: ?>
                        <li class="nav-item"><a class="nav-link" href="<?= site_url('events') ?>">My Events</a></li>
                    <?php endif; ?>
                    <li class="nav-item"><a class="nav-link" href="<?= site_url('guests') ?>">Guests</a></li>
                    <li class="nav-item"><a class="nav-link" href="<?= site_url('stats') ?>">Statistics</a></li>
                </ul>
                <span class="navbar-text text-white me-3">
                    <?= esc(session()->get('name')) ?> (<?= esc(session()->get('role')) ?>)
                </span>
                <a href="<?= site_url('/logout') ?>" class="btn btn-outline-light">Logout</a>
            </div>
        </div>
    </nav>

    <main class="container">
        <?= $this->renderSection('content') ?>
    </main>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
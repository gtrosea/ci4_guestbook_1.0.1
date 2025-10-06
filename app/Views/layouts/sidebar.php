<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title><?= esc($title ?? 'Dashboard') ?></title>
  <link rel="icon" type="image/x-icon" href="<?= base_url('favicon.ico') ?>">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
  <style>
    body {
      min-height: 100vh;
      display: flex;
    }
    .sidebar {
      width: 250px;
      background: #f8f9fa;
      border-right: 1px solid #dee2e6;
      flex-shrink: 0;
      display: flex;
      flex-direction: column;
    }
    .sidebar .nav-link {
      color: #333;
      padding: 10px 20px;
    }
    .sidebar .nav-link.active {
      background-color: #3283ff;
      color: white !important;
      border-radius: 8px;
    }
    .content {
      flex-grow: 1;
      padding: 20px;
      background: #f5f7fb;
    }
  </style>
</head>
<body>
  <!-- Sidebar -->
  <div class="sidebar p-3">
    <h4 class="mb-4">Guestbook</h4>
    <ul class="nav flex-column">
      <?php if(session()->get('role') === 'admin'): ?>
        <li><a class="nav-link <?= service('uri')->getSegment(2) == 'users' ? 'active' : '' ?>" href="<?= site_url('users') ?>">👥 Users</a></li>
        <li><a class="nav-link <?= service('uri')->getSegment(2) == 'events' ? 'active' : '' ?>" href="<?= site_url('events') ?>">📅 Events</a></li>
      <?php else: ?>
        <li><a class="nav-link <?= service('uri')->getSegment(1) == 'events' ? 'active' : '' ?>" href="<?= site_url('events') ?>">📅 My Events</a></li>
      <?php endif; ?>
      <li><a class="nav-link <?= service('uri')->getSegment(1) == 'guests' ? 'active' : '' ?>" href="<?= site_url('guests') ?>">🎟️ Guests</a></li>
      <li><a class="nav-link <?= service('uri')->getSegment(1) == 'stats' ? 'active' : '' ?>" href="<?= site_url('stats') ?>">📊 Statistics</a></li>
    </ul>
    <div class="mt-auto">
      <hr>
      <p class="small text-muted mb-1"><?= esc(session()->get('name')) ?> (<?= esc(session()->get('role')) ?>)</p>
      <a href="<?= site_url('/logout') ?>" class="btn btn-outline-danger btn-sm w-100">Logout</a>
    </div>
  </div>

  <!-- Content -->
  <div class="content">
    <?= $this->renderSection('content') ?>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

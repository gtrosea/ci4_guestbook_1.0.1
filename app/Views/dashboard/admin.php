<?= $this->extend('layouts/sidebar') ?>
<?= $this->section('content') ?>

<h1>Admin Dashboard</h1>
<p>Welcome, <?= esc(session()->get('name')) ?>!</p>

<div class="row">
  <div class="col-md-4">
    <div class="card p-3 shadow-sm">
      <h5>Manage Users</h5>
      <a href="<?= site_url('admin/users') ?>" class="btn btn-primary btn-sm mt-2">Go</a>
    </div>
  </div>
  <div class="col-md-4">
    <div class="card p-3 shadow-sm">
      <h5>Manage Events</h5>
      <a href="<?= site_url('admin/events') ?>" class="btn btn-success btn-sm mt-2">Go</a>
    </div>
  </div>
</div>

<?= $this->endSection() ?>

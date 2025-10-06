<?= $this->extend('layouts/sidebar') ?>
<?= $this->section('content') ?>

<div class="container mt-4">
    <h2>Daftar Users</h2>

    <?php if (session()->getFlashdata('success')): ?>
        <div class="alert alert-success"><?= session()->getFlashdata('success') ?></div>
    <?php endif; ?>

    <a href="<?= base_url('/users/create') ?>" class="btn btn-primary mb-3">+ Tambah User</a>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>#</th>
                <th>Nama</th>
                <th>Email</th>
                <th>Role</th>
                <th>Dibuat</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($users as $i => $user): ?>
                <tr>
                    <td><?= $i+1 ?></td>
                    <td><?= esc($user['name']) ?></td>
                    <td><?= esc($user['email']) ?></td>
                    <td><?= esc($user['role']) ?></td>
                    <td><?= user_time($user['created_at'], session()->get('timezone') ?? 'Asia/Jakarta') ?></td>
                    <td>
                        <a href="<?= base_url('/users/edit/'.$user['id']) ?>" class="btn btn-primary btn-sm">Edit</a>
                        <a href="<?= base_url('/users/delete/'.$user['id']) ?>" class="btn btn-danger btn-sm" onclick="return confirm('Hapus user ini?')">Hapus</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>

<?= $this->endSection() ?>
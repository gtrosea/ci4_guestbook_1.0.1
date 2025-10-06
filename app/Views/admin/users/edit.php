<?= $this->extend('layouts/sidebar') ?>
<?= $this->section('content') ?>

<div class="container mt-4">
    <h2>Edit User</h2>

    <?php if (session()->getFlashdata('errors')): ?>
        <div class="alert alert-danger">
            <ul>
                <?php foreach (session()->getFlashdata('errors') as $error): ?>
                    <li><?= esc($error) ?></li>
                <?php endforeach; ?>
            </ul>
        </div>
    <?php endif; ?>

    <form method="post" action="<?= base_url('/users/update/'.$user['id']) ?>">
        <?= csrf_field() ?>

        <div class="mb-3">
            <label>Nama</label>
            <input type="text" name="name" value="<?= old('name', $user['name']) ?>" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Email</label>
            <input type="email" name="email" value="<?= old('email', $user['email']) ?>" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Password (kosongkan jika tidak ingin mengubah)</label>
            <input type="password" name="password" class="form-control">
        </div>

        <div class="mb-3">
            <label>Role</label>
            <select name="role" class="form-control" required>
                <option value="admin" <?= ($user['role'] === 'admin') ? 'selected' : '' ?>>Admin</option>
                <option value="user" <?= ($user['role'] === 'user') ? 'selected' : '' ?>>User</option>
            </select>
        </div>

        <button type="submit" class="btn btn-success">Simpan Perubahan</button>
        <a href="<?= base_url('/users') ?>" class="btn btn-secondary">Batal</a>
    </form>
</div>

<?= $this->endSection() ?>
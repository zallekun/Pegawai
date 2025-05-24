<?= $this->extend('layout/main'); ?>
<?= $this->section('content'); ?>

<div class="container mt-5" style="max-width:400px;">
    <div class="card">
        <div class="card-body">
            <h4 class="mb-3">Ganti Password</h4>
            <form action="/profile/password" method="post">
                <?= csrf_field(); ?>
                <div class="mb-3">
                    <label>Password Lama</label>
                    <input type="password" name="old_password" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label>Password Baru</label>
                    <input type="password" name="new_password" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label>Konfirmasi Password Baru</label>
                    <input type="password" name="confirm_password" class="form-control" required>
                </div>
                <?php if (session()->getFlashdata('error')): ?>
                    <div class="alert alert-danger"><?= session()->getFlashdata('error') ?></div>
                <?php endif; ?>
                <?php if (session()->getFlashdata('success')): ?>
                    <div class="alert alert-success"><?= session()->getFlashdata('success') ?></div>
                <?php endif; ?>
                <button type="submit" class="btn btn-primary w-100">Simpan</button>
            </form>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>
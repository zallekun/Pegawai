<?= $this->extend('layout/main'); ?>
<?= $this->section('content'); ?>
<div class="container d-flex justify-content-center align-items-center" style="min-height: 100vh;">
  <div class="card shadow" style="width: 350px;">
    <div class="card-body">
      <h3 class="card-title text-center mb-4">Login</h3>
      <form action="/login" method="post">
        <?= csrf_field(); ?>
        <div class="mb-3">
          <label for="username" class="form-label">Username</label>
          <input type="text" name="username" id="username" class="form-control" required autofocus>
        </div>
        <div class="mb-3">
          <label for="password" class="form-label">Password</label>
          <input type="password" name="password" id="password" class="form-control" required>
        </div>
        <?php if (session()->getFlashdata('error')): ?>
          <div class="alert alert-danger"><?= session()->getFlashdata('error') ?></div>
        <?php endif; ?>
        <button type="submit" class="btn btn-primary w-100">Login</button>
      </form>
    </div>
  </div>
</div>
<?= $this->endSection(); ?>
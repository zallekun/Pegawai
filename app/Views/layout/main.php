<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Aplikasi CRUD Pegawai</title>
    <link rel="stylesheet" href="/assets/css/bootstrap.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        html, 
        body{
            height: 100%;

        }

        body{
            display: flex;
            flex-direction: column;
        }
    </style>
</head>
<body class="bg-body-tertiary">
    <?php
        $uri = service('uri');
        // Cek jika segmen pertama adalah 'login'
        if ($uri->getSegment(1) !== 'login'):
    ?>
        <?= $this->include('layout/navbar'); ?>
    <?php endif; ?>

    <div class="container py-5">
        <?php if (session()->getFlashdata('success')): ?>
        <div class="alert alert-success alert-dismissible fade show m-3" role="alert">
            <?= session()->getFlashdata('success') ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
        <?php endif; ?>
        <?php if (session()->getFlashdata('error')): ?>
        <div class="alert alert-danger alert-dismissible fade show m-3" role="alert">
            <?= session()->getFlashdata('error') ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
        <?php endif; ?>

        <?= $this->renderSection('content'); ?>
    </div>
    <footer class="footer mt-auto py-3 bg-secondary">
                <div class="container text-center">
                    <span class="text-white">Copyright &copy; 2025 - Codeigniter 4</span>
                </div>
            </footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="/public/assets/js/bootstrap.bundle.min.js"></script>
</body>
</html>
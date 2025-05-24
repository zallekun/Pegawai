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

    <!-- Toast/Alert di sini, setelah navbar -->
    <div aria-live="polite" aria-atomic="true" class="position-fixed top-0 end-0 p-3" style="z-index: 1080; margin-top: 70px;">
        <?php if (session()->getFlashdata('success')): ?>
            <div class="toast align-items-center text-bg-success border-0 show" role="alert" aria-live="assertive" aria-atomic="true">
                <div class="d-flex">
                    <div class="toast-body">
                        <?= session()->getFlashdata('success') ?>
                    </div>
                    <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast"></button>
                </div>
            </div>
        <?php endif; ?>
        <?php if (session()->getFlashdata('error')): ?>
            <div class="toast align-items-center text-bg-danger border-0 show" role="alert" aria-live="assertive" aria-atomic="true">
                <div class="d-flex">
                    <div class="toast-body">
                        <?= session()->getFlashdata('error') ?>
                    </div>
                    <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast"></button>
                </div>
            </div>
        <?php endif; ?>
    </div>

    <div class="container py-5">
        <?= $this->renderSection('content'); ?>
    </div>
    <footer class="footer mt-auto py-3 bg-secondary">
                <div class="container text-center">
                    <span class="text-white">Copyright &copy; 2025 - Codeigniter 4</span>
                </div>
            </footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="/public/assets/js/bootstrap.bundle.min.js"></script>
    <script>
        document.querySelectorAll('.toast').forEach(function(toastEl) {
            new bootstrap.Toast(toastEl, { delay: 7000 }).show();
        });
    </script>
</body>
</html>
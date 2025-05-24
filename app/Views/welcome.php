<?= $this->extend('layout/main'); ?>
<?= $this->section('content'); ?>

<div class="container py-4">
    <!-- Welcome Message -->
    <div class="alert alert-info">
        Selamat datang, <b><?= esc(session()->get('username')) ?></b> di Aplikasi CRUD Pegawai!
    </div>

    <!-- Statistik -->
    <div class="row mb-4">
        <div class="col-md-4">
            <div class="card text-bg-primary mb-3">
                <div class="card-body text-center">
                    <h5 class="card-title">Jumlah Pegawai</h5>
                    <h2><?= $jumlahPegawai ?></h2>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card text-bg-success mb-3">
                <div class="card-body text-center">
                    <h5 class="card-title">Jumlah Jabatan</h5>
                    <h2><?= $jumlahJabatan ?></h2>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card text-bg-secondary mb-3">
                <div class="card-body text-center">
                    <h5 class="card-title">Jumlah User</h5>
                    <h2><?= $jumlahUser ?></h2>
                </div>
            </div>
        </div>
    </div>

    <!-- Quick Links -->
    <div class="mb-4">
        <a href="/pegawai/create" class="btn btn-primary me-2">Tambah Pegawai</a>
        <a href="/pegawai/export/pdf" class="btn btn-danger me-2">Export Pegawai PDF</a>
        <a href="/profile/password" class="btn btn-warning">Ganti Password</a>
    </div>

    <!-- Grafik Jumlah Pegawai per Jabatan -->
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Grafik Pegawai per Jabatan</h5>
            <canvas id="grafikPegawai" style="max-width:800px; max-height:450px;"></canvas>
        </div>
    </div>
</div>

<!-- Chart.js CDN -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    const ctx = document.getElementById('grafikPegawai').getContext('2d');
    const data = {
        labels: [
            <?php foreach ($grafik as $g) : ?>
                "<?= esc($g->nama_jabatan) ?>",
            <?php endforeach ?>
        ],
        datasets: [{
            label: 'Jumlah Pegawai',
            data: [
                <?php foreach ($grafik as $g) : ?>
                    <?= $g->total ?>,
                <?php endforeach ?>
            ],
        }]
    };
    new Chart(ctx, {
        type: 'bar',
        data: data,
        options: {
            scales: {
                y: { beginAtZero: true }
            }
        }
    });
</script>
<?= $this->endSection(); ?>

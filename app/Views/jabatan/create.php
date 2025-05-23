<?= $this->extend('layout/main'); ?>

<?= $this->section('content'); ?>
<div class="my-3 p-3 bg-body rounded shadow-sm">
    <div class="d-flex justify-content-between border-bottom py-2">
        <h3 class="pb-2 mb-0">Tambah Data Jabtan</h3>
        <a href="/jabatan" class="btn btn-primary">Kembali</a>
    </div>
    <div class="pt-3">
        <form action="/jabatan/store" method="post">
            <?= csrf_field(); ?>
            <div class="mb-3">
                <label for="" class="form-label">Nama Jabatan:</label>
                <input type="text" class="form-control" name="nama_jabatan" required>
            </div>
            <div class="mb-3">
                <label for="" class="form-label">Deskripsi Jabatan:</label>
                <input type="text" class="form-control" name="deskripsi_jabatan" required>
            </div>
            <button type="submit" class="btn btn-primary">Simpan</button>
        </form>
    </div>
</div>
<?= $this->endsection(); ?>
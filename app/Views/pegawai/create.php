<?= $this->extend('layout/main'); ?>

<?= $this->section('content'); ?>
<div class="my-3 p-3 bg-body rounded shadow-sm">
    <div class="d-flex justify-content-between border-bottom py-2">
        <h3 class="pb-2 mb-0">Tambah Data Pegawai</h3>
        <a href="/pegawai" class="btn btn-primary">Kembali</a>
    </div>
    <div class="pt-3">
        <form action="/pegawai/store" method="post">
            <?= csrf_field(); ?>
            <div class="mb-3">
                <label for="" class="form-label">Nama pegawai:</label>
                <input type="text" class="form-control" name="nama_pegawai" required>
            </div>
            <div class="mb-3">
                <label for="" class="form-label">Jabatan:</label>
                <select name="id_jabatan" class="form-control" required>
                    <option value="">-- Pilih Jabatan --</option>
                    <?php foreach ($jabatan as $j) {?>
                        <option value="<?= $j->id; ?>"><?= $j->nama_jabatan; ?></option>
                    <?php }?>
                </select>
            <div class="mb-3">
                <label for="" class="form-label">Alamat:</label>
                <input type="text" class="form-control" name="alamat" required>
            </div>
            <div class="mb-3">
                <label for="" class="form-label">Nomor Telepon:</label>
                <input type="text" class="form-control" name="no_telp" required>
            </div>
            <div class="mb-3">
                <label for="" class="form-label">Email:</label>
                <input type="text" class="form-control" name="email" required>
            </div>
            <button type="submit" class="btn btn-primary">Simpan</button>
        </form>
    </div>
</div>
<?= $this->endsection(); ?>
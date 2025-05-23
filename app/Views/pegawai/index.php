<?= $this->extend('layout/main'); ?>

<?= $this->section('content'); ?>
<div class="my-3 p-3 bg-body rounded shadow-sm">
    <div class="d-flex justify-content-between border-bottom py-2">
        <h3 class="pb-2 mb-0">Data Pegawai</h3>
        <a href="/pegawai/create" class="btn btn-primary">Tambatan Data</a>
    </div>
    <div class="pt-3">
        <table class="table table-bordered table-striped">
            <thead>
    <tr>
        <th>No</th>
        <th>Nama Pegawai</th>
        <th>Jabatan</th>
        <th>Alamat</th>
        <th>Telepon</th>
        <th>Email</th>
        <th>Aksi</th>
    </tr>
</thead>
<tbody>
    <?php foreach ($pegawai as $key => $row) {?>
        <tr>
            <td><?= $key+1; ?></td>
            <td><?= $row->nama_pegawai; ?></td>
            <td><?= $row->nama_jabatan; ?></td>
            <td><?= $row->alamat; ?></td>
            <td><?= $row->no_telp; ?></td>
            <td><?= $row->email; ?></td>
            <td>
                <form action="<?= base_url('pegawai/delete/'.$row->id) ?>" method="post">
                    <?= csrf_field(); ?>
                    <a href="/pegawai/edit/<?= $row->id;?>" class="btn btn-warning">Edit</a>
                    <button type="submit" class="btn btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">Hapus</button>
                </form>
            </td>
        </tr>
    <?php }?>
</tbody>
        </table>
    </div>
</div>
<?= $this->endsection(); ?>
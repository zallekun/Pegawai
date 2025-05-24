<?= $this->extend('layout/main'); ?>

<?= $this->section('content'); ?>
<div class="my-3 p-3 bg-body rounded shadow-sm">
    <div class="d-flex justify-content-between border-bottom py-2">
        <h3 class="pb-2 mb-0">Data Pegawai</h3>
        <a href="/pegawai/create" class="btn btn-primary">Tambatan Data</a>
    </div>
    <div class="pt-3">
        <!-- Tambahkan di atas tabel -->
<form method="get" action="/pegawai" class="mb-3">
  <div class="input-group">
    <input type="text" name="q" class="form-control" placeholder="Cari nama pegawai..." value="<?= esc($q ?? '') ?>">
    <button class="btn btn-primary" type="submit">Cari</button>
  </div>
</form>
<a href="/pegawai/export/pdf" class="btn btn-danger mb-3" target="_blank">Export PDF</a>
        <table class="table table-bordered table-striped">
            <thead>
    <tr>
        <th>No</th>
        <th>
    <a href="?sort=nama_pegawai&order=<?= $order === 'asc' ? 'desc' : 'asc' ?>">
        Nama Pegawai
        <?php if ($sort === 'nama_pegawai'): ?>
            <?= $order === 'asc' ? '↑' : '↓' ?>
        <?php endif ?>
    </a>
</th>
        <th>Jabatan</th>
        <th>Alamat</th>
        <th>Telepon</th>
        <th>Email</th>
        <th>Aksi</th>
    </tr>
</thead>
<tbody>
<?php foreach ($pegawai as $key => $row): ?>
<tr>
    <td><?= ($pager->getCurrentPage('pegawai') - 1) * $pager->getPerPage('pegawai') + $key + 1; ?></td>
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
<?php endforeach ?>
</tbody>
        </table>
<?= $pager->links('pegawai', 'bootstrap') ?>
    </div>
</div>
<?= $this->endsection(); ?>
public function index()
{
    $q = $this->request->getGet('q');
    $sort = $this->request->getGet('sort') ?? 'nama_pegawai';
    $order = $this->request->getGet('order') ?? 'asc';

    $db = \Config\Database::connect();
    $builder = $db->table('pegawai');
    $builder->select('pegawai.*, jabatan.nama_jabatan');
    $builder->join('jabatan', 'jabatan.id = pegawai.id_jabatan', 'left');
    if ($q) {
        $builder->like('pegawai.nama_pegawai', $q);
    }
    $builder->orderBy($sort, $order);

    // Pagination: 5 data per halaman
    $pegawai = $builder->get()->getResult();
    // Jika ingin pagination native CI4:
    // $pegawai = $builder->paginate(5, 'pegawai');
    // $pager = $builder->pager;

    return view('pegawai/index', [
        'pegawai' => $pegawai,
        // 'pager' => $pager, // jika pakai paginate
        'q' => $q,
        'sort' => $sort,
        'order' => $order
    ]);
}
?>
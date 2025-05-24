<!DOCTYPE html>
<html>
<head>
    <title>Data Pegawai</title>
    <style>
        table { width:100%; border-collapse:collapse; }
        th, td { border:1px solid #000; padding:5px; }
    </style>
</head>
<body>
    <h3>Data Pegawai</h3>
    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Pegawai</th>
                <th>Jabatan</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($pegawai as $i => $row): ?>
            <tr>
                <td><?= $i+1 ?></td>
                <td><?= esc($row->nama_pegawai) ?></td>
                <td><?= esc($row->nama_jabatan) ?></td>
            </tr>
            <?php endforeach ?>
        </tbody>
    </table>
</body>
</html>
<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class JabatanController extends BaseController
{
    protected $jabatanModel;
    public function __construct()
    {
        $this->jabatanModel = new \App\Models\JabatanModel();
    }
    public function index()
    {
        $model = new \App\Models\JabatanModel();

        $q = $this->request->getGet('q');
        $sort = $this->request->getGet('sort') ?? 'nama_jabatan';
        $order = $this->request->getGet('order') ?? 'asc';

        $builder = $model->orderBy($sort, $order);

        if ($q) {
            $builder->like('nama_jabatan', $q);
        }

        $jabatan = $builder->paginate(8, 'jabatan');
        $pager = $model->pager;

        return view('jabatan/index', [
            'jabatan' => $jabatan,
            'pager' => $pager,
            'q' => $q,
            'sort' => $sort,
            'order' => $order
        ]);
    }
    public function show($id)
    {
        //
    }
     public function create()
    {
        return view ('jabatan/create');
    }
     public function store()
    {
        $data = [
            'nama_jabatan' => $this->request->getPost('nama_jabatan'),
            'deskripsi_jabatan' => $this->request->getPost('deskripsi_jabatan')
        ];
        $this->jabatanModel->save($data);
        return redirect()->to('/jabatan')->with('success', 'Data Jabatan Berhasil Ditambahkan');
    }
     public function edit($id)
    {
        $data['jabatan'] = $this->jabatanModel->find($id);
        if (!$data['jabatan']) {
            return redirect()->to('/jabatan')->with('error', 'Data Jabatan Tidak Ditemukan');
        }
        return view('/jabatan/edit', $data);
    }
     public function update($id)
    {
        $data = [
        'id' => $id,  // tambahkan ID di sini
        'nama_jabatan' => $this->request->getPost('nama_jabatan'),
        'deskripsi_jabatan' => $this->request->getPost('deskripsi_jabatan')
    ];

    $this->jabatanModel->save($data);

    return redirect()->to('/jabatan')->with('success', 'Data Jabatan Berhasil Diupdate');
    }
     public function delete($id)
    {
        $pegawaiModel = new \App\Models\PegawaiModel();
        $jumlahPegawai = $pegawaiModel->where('id_jabatan', $id)->countAllResults();

        if ($jumlahPegawai > 0) {
            return redirect()->to('/jabatan')->with('error', 'Tidak bisa menghapus jabatan yang masih dipakai pegawai!');
        }

        $this->jabatanModel->delete($id);
        return redirect()->to('/jabatan')->with('success', 'Data jabatan berhasil dihapus!');
    }
}

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
        $data['jabatan'] = $this->jabatanModel->findAll();
        return view ('jabatan/index', $data);
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
        $this->jabatanModel->delete($id);
        return redirect()->to('/jabatan')->with('success', 'Data Jabatan Berhasil Dihapus');
    }
}

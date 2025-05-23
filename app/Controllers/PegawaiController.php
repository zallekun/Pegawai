<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\JabatanModel;
use App\Models\PegawaiModel;

class PegawaiController extends BaseController
{
    protected $pegawaiModel;
    public function __construct()
    {
        $this->pegawaiModel = new PegawaiModel();
    }

    public function index()
    {

        $data['pegawai'] = $this->pegawaiModel->getPegawaiWithJabatan();
        return view('pegawai/index', $data);
    }

    public function create()
    {

        $jabatanModel = new JabatanModel();
        $data['jabatan'] = $jabatanModel->findAll();
        return view('pegawai/create', $data);
    }

    public function store()
    {

        $data = [
            'nama_pegawai' => $this->request->getPost('nama_pegawai'),
            'id_jabatan'   => $this->request->getPost('id_jabatan'),
            'alamat'       => $this->request->getPost('alamat'),
            'no_telp'      => $this->request->getPost('no_telp'),
            'email'        => $this->request->getPost('email'),
        ];

        $this->pegawaiModel->save($data);
        return redirect()->to('/pegawai')->with('success', 'Data pegawai Berhasil Ditambahkan');
    }

    public function edit($id)
    {

        $jabatanModel = new JabatanModel();
        $data['jabatan'] = $jabatanModel->findAll();
        $data['pegawai'] = $this->pegawaiModel->find($id);


        return view('pegawai/edit', $data);
    }

    public function update($id)
    {

        $data = [
            'nama_pegawai' => $this->request->getPost('nama_pegawai'),
            'id_jabatan'   => $this->request->getPost('id_jabatan'),
            'alamat'       => $this->request->getPost('alamat'),
            'no_telp'      => $this->request->getPost('no_telp'),
            'email'        => $this->request->getPost('email'),
        ];

        $this->pegawaiModel->update($id, $data);
        return redirect()->to('/pegawai')->with('success', 'Data pegawai Berhasil Diupdate');
    }

    public function delete($id)
    {

        $this->pegawaiModel->delete($id);
        return redirect()->to('/pegawai')->with('success', 'Data pegawai Berhasil Dihapus');
    }
}

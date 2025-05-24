<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\JabatanModel;
use App\Models\PegawaiModel;
use Dompdf\Dompdf;

class PegawaiController extends BaseController
{
    protected $pegawaiModel;
    public function __construct()
    {
        $this->pegawaiModel = new PegawaiModel();
    }

    public function index()
    {
        $q = $this->request->getGet('q');
        $db = \Config\Database::connect();
        $builder = $db->table('pegawai');
        $builder->select('pegawai.*, jabatan.nama_jabatan');
        $builder->join('jabatan', 'jabatan.id = pegawai.id_jabatan', 'left');
        $pegawai = $builder->get()->getResult();

        return view('pegawai/index', [
            'pegawai' => $pegawai,
            'q' => $q
        ]);
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

    public function exportPdf()
    {
        $db = \Config\Database::connect();
        $builder = $db->table('pegawai');
        $builder->select('pegawai.*, jabatan.nama_jabatan');
        $builder->join('jabatan', 'jabatan.id = pegawai.id_jabatan', 'left');
        $pegawai = $builder->get()->getResult();

        $html = view('pegawai/export_pdf', ['pegawai' => $pegawai]);

        $dompdf = new \Dompdf\Dompdf();
        $dompdf->loadHtml($html);
        $dompdf->setPaper('A4', 'portrait');
        $dompdf->render();
        $dompdf->stream('data-pegawai.pdf', ['Attachment' => false]);
    }
}

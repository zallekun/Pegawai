<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index()
    {
        $pegawaiModel = new \App\Models\PegawaiModel();
        $jabatanModel = new \App\Models\JabatanModel();
        $userModel    = new \App\Models\UserModel();

        $jumlahPegawai = $pegawaiModel->countAll();
        $jumlahJabatan = $jabatanModel->countAll();
        $jumlahUser    = $userModel->countAll();

        // Data untuk grafik: jumlah pegawai per jabatan
        $db = \Config\Database::connect();
        $grafik = $db->table('pegawai')
            ->select('jabatan.nama_jabatan, COUNT(pegawai.id) as total')
            ->join('jabatan', 'jabatan.id = pegawai.id_jabatan', 'left')
            ->groupBy('jabatan.nama_jabatan')
            ->get()->getResult();

        return view('welcome', [
            'jumlahPegawai' => $jumlahPegawai,
            'jumlahJabatan' => $jumlahJabatan,
            'jumlahUser'    => $jumlahUser,
            'grafik'        => $grafik,
        ]);
    }
}

<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\UserModel;

class AuthController extends BaseController
{
    public function login()
    {
        return view('login/login');
    }
    public function prosesLogin()
{
    $session = session();
    $model = new UserModel();
    $username = $this->request->getPost('username');
    $password = $this->request->getPost('password');

    $user = $model->where('username', $username)->first();

    if ($user) {
        // Verifikasi password menggunakan password_verify (asumsi password sudah di-hash dengan password_hash saat registrasi)
        if (password_verify($password, $user['password'])) {
            $session->set([
                'id' => $user['id'],
                'username' => $user['username'],
                'logged_in' => true,
            ]);
            return redirect()->to('/pegawai');
        } else {
            return redirect()->back()->with('error', 'Password salah');
        }
    } else {
        return redirect()->back()->with('error', 'Username tidak ditemukan');
    }
    
    }

    public function logout()
    {
        session()->destroy();
        return redirect()->to('/login');
    }
}

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

    if ($user && password_verify($password, $user['password'])) {
        $session->set([
            'id' => $user['id'],
            'username' => $user['username'],
            'logged_in' => true,
        ]);
        // Ubah redirect ke beranda
        return redirect()->to('/');
    } else {
        return redirect()->back()->with('error', 'Username atau password salah');
    }
}

    public function logout()
    {
        session()->destroy();
        return redirect()->to('/login');
    }
    public function changePassword()
    {
        return view('profile/change_password');
    }

    public function updatePassword()
    {
        $session = session();
        $model = new \App\Models\UserModel();
        $userId = $session->get('id');

        $oldPassword = $this->request->getPost('old_password');
        $newPassword = $this->request->getPost('new_password');
        $confirmPassword = $this->request->getPost('confirm_password');

        $user = $model->find($userId);

        if (!$user || !password_verify($oldPassword, $user['password'])) {
            return redirect()->back()->with('error', 'Password lama salah');
        }

        if ($newPassword !== $confirmPassword) {
            return redirect()->back()->with('error', 'Konfirmasi password tidak cocok');
        }

        if (strlen($newPassword) < 6) {
            return redirect()->back()->with('error', 'Password baru minimal 6 karakter');
        }

        $model->update($userId, [
            'password' => password_hash($newPassword, PASSWORD_DEFAULT)
        ]);

        return redirect()->to('/')->with('success', 'Password berhasil diubah');
    }
}

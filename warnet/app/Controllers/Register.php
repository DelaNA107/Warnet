<?php

namespace App\Controllers;

use App\Models\UserModel;
use CodeIgniter\Controller;

class Register extends Controller
{
    public function index()
    {
        echo view('register');
    }

    public function simpan()
    {
        $validation = \Config\Services::validation();

        // Aturan validasi
        $validation->setRules([
            'username' => 'required|is_unique[tbl_user.username]',
            'password' => 'required|min_length[6]',
        ]);

        if (!$this->validate($validation->getRules())) {
            return redirect()->to('/register')->withInput()->with('errors', $validation->getErrors());
        }

        $userModel = new UserModel();

        // Ambil input
        $username = $this->request->getPost('username');
        $password = md5($this->request->getPost('password')); // Enkripsi MD5 (tidak direkomendasikan)

        // Simpan ke database
        $userModel->insert([
            'username' => $username,
            'password' => $password,
            'hak_akses' => 'user',
        ]);

        return redirect()->to('/login')->with('success', 'Registrasi berhasil! Silakan login.');
    }
}

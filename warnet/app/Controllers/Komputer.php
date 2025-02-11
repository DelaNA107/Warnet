<?php

namespace App\Controllers;

use App\Models\KomputerModel;
use CodeIgniter\Controller;

class Komputer extends Controller
{
    public function index()
    {
        // Cek apakah hak_akses bukan 'admin'
        if (session()->get('hak_akses') !== 'admin') {
            return redirect()->to('/')->with('error', 'Anda tidak memiliki akses ke halaman ini.');
        }
        $komputerModel = new KomputerModel();
        $data['komputers'] = $komputerModel->findAll();

        echo view('part_adm/header');
        echo view('part_adm/top_menu');
        echo view('part_adm/side_menu');
        echo view('komputer', $data);
        echo view('part_adm/footer');
    }

    public function store()
    {
        $komputerModel = new KomputerModel();

        $komputerModel->insert([
            'nama' => $this->request->getPost('nama'),
            'status' => $this->request->getPost('status'),
        ]);

        return redirect()->to('/komputer')->with('success', 'Komputer berhasil ditambahkan.');
    }

    public function update($id)
    {
        $komputerModel = new KomputerModel();
        $data = [
            'nama' => $this->request->getPost('nama'),
            'status' => $this->request->getPost('status'),
        ];

        $komputerModel->update($id, $data);
        return redirect()->to('/komputer')->with('success', 'Data berhasil diperbarui.');
    }

    public function delete($id)
    {
        $komputerModel = new KomputerModel();
        $komputerModel->delete($id);
        return redirect()->to('/komputer')->with('success', 'Data berhasil dihapus.');
    }
}

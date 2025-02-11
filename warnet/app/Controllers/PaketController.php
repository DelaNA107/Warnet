<?php

namespace App\Controllers;

use App\Models\PaketModel;
use App\Models\KomputerModel;
use CodeIgniter\Controller;

class PaketController extends Controller
{
    protected $paketModel;
    protected $komputerModel;

    public function __construct()
    {
        $this->paketModel = new PaketModel();
        $this->komputerModel = new KomputerModel();
    }

    public function index()
    {
        $data['pakets'] = $this->paketModel->findAll();
        echo view('part_adm/header');
        echo view('part_adm/top_menu');
        echo view('part_adm/side_menu');
        echo view('paket', $data);
        echo view('part_adm/footer');
    }

    public function store()
    {
        $this->paketModel->save([
            'nama_paket' => $this->request->getPost('nama_paket'),
            'harga' => $this->request->getPost('harga'),
        ]);

        return redirect()->to('/paket')->with('success', 'Paket berhasil ditambahkan.');
    }

    public function update()
    {
        $id = $this->request->getPost('id');
        $paket = $this->paketModel->find($id);

        $this->paketModel->update($id, [
            'nama_paket' => $this->request->getPost('nama_paket'),
            'harga' => $this->request->getPost('harga'),
        ]);

        return redirect()->to('/paket')->with('success', 'Paket berhasil diperbarui.');
    }

    public function delete($id)
    {
        $paket = $this->paketModel->find($id);
        if ($paket) {
            // Hapus paket
            $this->paketModel->delete($id);
            // Kembalikan status komputer ke Tersedia
        }

        return redirect()->to('/paket')->with('success', 'Paket berhasil dihapus.');
    }
}

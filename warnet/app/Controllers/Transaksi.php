<?php

namespace App\Controllers;

use App\Models\KomputerModel;
use App\Models\PaketModel;
use App\Models\TransactionModel;
use CodeIgniter\Controller;

class Transaksi extends Controller
{
    public function index()
    {
        $transaksiModel = new TransactionModel();
        $komputerModel = new KomputerModel();
        $paketModel = new PaketModel();

        $data = [
            'transaksis' => $transaksiModel->select('transaksi.*, komputer.nama as komputer_nama, pakets.nama_paket as paket_nama')
                ->join('komputer', 'komputer.id = transaksi.komputer_id', 'left')
                ->join('pakets', 'pakets.id = transaksi.paket_id', 'left')
                ->findAll(),
            'komputers' => $komputerModel->where('status', 'Tersedia')->findAll(),
            'pakets' => $paketModel->findAll()
        ];
        echo view('part_adm/header');
        echo view('part_adm/top_menu');
        echo view('part_adm/side_menu');
        echo view('transaksi', $data);
        echo view('part_adm/footer');
    }

    public function store()
    {
        $transaksiModel = new TransactionModel();
        $komputerModel = new KomputerModel();
        $paketModel = new PaketModel();

        $komputer_id = $this->request->getPost('komputer_id');
        $paket_id = $this->request->getPost('paket_id');

        // Ambil harga dari paket yang dipilih
        $paket = $paketModel->find($paket_id);
        $harga = $paket ? $paket['harga'] : 0; // Pastikan harga ada

        $data = [
            'nama' => $this->request->getPost('nama'),
            'komputer_id' => $this->request->getPost('komputer_id'),
            'paket_id' => $this->request->getPost('paket_id'),
            'harga' => $harga,
            'user_id' => session('kode_user'),
        ];

        $transaksiModel->insert($data);
        // Ubah status komputer menjadi "Tidak Tersedia"
        $komputerModel->update($komputer_id, ['status' => 'Tidak Tersedia']);

        return redirect()->to('/transaksi');
    }

    public function update()
    {
        $transaksiModel = new TransactionModel();

        $data = [
            'nama' => $this->request->getPost('nama'),
            'komputer_id' => $this->request->getPost('komputer_id'),
            'paket_id' => $this->request->getPost('paket_id'),
            'harga' => $this->request->getPost('harga'),
        ];

        $transaksiModel->update($this->request->getPost('id'), $data);
        return redirect()->to('/transaksi');
    }

    public function delete($id)
    {
        $transaksiModel = new TransactionModel();
        $komputerModel = new KomputerModel();

        // Ambil data transaksi sebelum dihapus
        $transaksi = $transaksiModel->find($id);

        if ($transaksi) {
            // Ubah status komputer menjadi "Tersedia" sebelum menghapus transaksi
            $komputerModel->update($transaksi['komputer_id'], ['status' => 'Tersedia']);

            $transaksiModel->delete($id);
        }

        return redirect()->to('/transaksi');
    }
}

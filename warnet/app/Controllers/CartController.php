<?php

namespace App\Controllers;

use App\Models\CartModel;
use App\Models\KomputerModel;
use App\Models\PaketModel;
use App\Models\TransactionModel;
use CodeIgniter\Controller;

class CartController extends Controller
{
    public function addToCart()
    {
        if (!session()->has('username')) {
            return redirect()->to('/login')->with('error', 'Silakan login terlebih dahulu.');
        }

        $session = session();
        $cartModel = new CartModel();
        $paketModel = new PaketModel();
        $komputerModel = new KomputerModel();
        $userId = session()->get('user_id');
        $username = session()->get('username');

        $paketId = $this->request->getPost('paket_id');
        $komputerId = $this->request->getPost('komputer_id');

        $paket = $paketModel->find($paketId);
        $komputer = $komputerModel->find($komputerId);

        if (!$paket || !$komputer || $komputer['status'] !== 'Tersedia') {
            return redirect()->to('/')->with('error', 'Paket atau komputer tidak tersedia.');
        }

        $cartModel->insert([
            'user_id' => $userId,
            'paket_id' => $paketId,
            'komputer_id' => $komputerId,
            'nama' => $username,
            'harga' => $paket['harga'],
        ]);

        return redirect()->to('/cart')->with('success', 'Paket berhasil ditambahkan ke keranjang.');
    }

    public function checkout()
    {
        $cartModel = new CartModel();
        $transactionModel = new TransactionModel();
        $komputerModel = new KomputerModel();
        $userId = session()->get('user_id');

        $keranjang = $cartModel->where('user_id', $userId)->findAll();
        if (empty($keranjang)) {
            return redirect()->to('/cart')->with('error', 'Keranjang belanja kosong!');
        }

        foreach ($keranjang as $item) {
            $transactionModel->save([
                'user_id' => $userId,
                'nama' => $item['nama'],
                'harga' => $item['harga'],
                'paket_id' => $item['paket_id'],
                'komputer_id' => $item['komputer_id'],
                'created_at' => date('Y-m-d H:i:s')
            ]);

            $komputerModel->update($item['komputer_id'], ['status' => 'Tidak Tersedia']);
        }

        $cartModel->where('user_id', $userId)->delete();
        return redirect()->to('/cart')->with('success', 'Checkout berhasil! Pesanan telah masuk ke riwayat belanja.');
    }

    public function viewCart()
    {
        if (!session()->has('username')) {
            return redirect()->to('/login')->with('error', 'Silakan login terlebih dahulu.');
        }

        $transactionModel = new TransactionModel();
        $cartModel = new CartModel();
        $userId = session()->get('user_id');

        $data['keranjang'] = $cartModel->where('user_id', $userId)->findAll();
        $data['history'] = $transactionModel->where('user_id', $userId)->orderBy('created_at', 'DESC')->findAll();

        echo view('part/header');
        echo view('part/navbar');
        echo view('cart', $data);
        echo view('part/footer');
    }

    public function removeItem($id)
    {
        $cartModel = new CartModel();
        $komputerModel = new KomputerModel();

        $item = $cartModel->find($id);
        if ($item) {
            $komputerModel->update($item['komputer_id'], ['status' => 'Tersedia']);
            $cartModel->delete($id);
        }

        return redirect()->to('/cart')->with('success', 'Item berhasil dihapus dari keranjang.');
    }
}

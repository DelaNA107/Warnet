<?php

namespace App\Controllers;
use App\Models\KategoriModel;
use App\Models\TransaksiModel;

class Cart extends BaseController
{
    public function index()
    {
        if (session()->get('username') == '') {
            session()->setFlashdata('gagal', 'Anda belum login');
            return redirect()->to(base_url('login'));
         }
        $kategori = new KategoriModel();
        $transaksi = new TransaksiModel();
        $data['kat'] = $kategori->findAll();
        $userID=session()->get('id_user');
        $data['statushalaman']="";
        $cek = $transaksi->cek_data($userID);
        $noTransaksi = 0;
        if($cek)
            $noTransaksi = $cek['no_transaksi'];
        $data['total'] = $transaksi->countDataWithCriteria($noTransaksi);
        $data['detail'] = $transaksi->getItems($noTransaksi);
        echo view('part/header');
        //echo view('part/topbar', $data);
        echo view('part/navbar', $data);
        echo view('cart', $data);
        echo view('part/footer');
    }
    public function tambahCart(){
        if (session()->get('username') == '') {
            session()->setFlashdata('gagal', 'Anda belum login');
            return redirect()->to(base_url('login'));
        }
        $kategori = new KategoriModel();
        $transaksi = new TransaksiModel();
        $data['kat'] = $kategori->findAll();
        $userID=session()->get('id_user');
        $data['statushalaman']="";
        $cek = $transaksi->cek_data($userID);
        if($cek){
            $idTransaksi = $cek['no_transaksi'];
            $idItem=$this->request->getPost('id_item');
        }else { 
            $transaksi->insert([
                "tgl_transaksi" => date('Y-m-d'),
                "id_user" => $userID,
                "status" => "awal"
            ]);
        }
        return redirect('cart');
    }
    public function checkout()
    {
        if (session()->get('username') == '') {
            session()->setFlashdata('gagal', 'Anda belum login');
            return redirect()->to(base_url('login'));
         }
        $kategori = new KategoriModel();
        $transaksi = new TransaksiModel();
        $data['kat'] = $kategori->findAll();
        $userID=session()->get('id_user');
        $data['statushalaman']="";
        $cek = $transaksi->cek_data($userID);
        $noTransaksi = 0;
        if($cek)
            $noTransaksi = $cek['no_transaksi'];
        $data['total'] = $transaksi->countDataWithCriteria($transaksi);
        $data['notrans'] = $noTransaksi;
        $data['idtrans'] = $noTransaksi;
        $data['transaksi'] = $transaksi->getItems($noTransaksi);
        echo view('part/header');
        echo view('part/navbar', $data);
        echo view('checkout', $data);
        echo view('part/footer');
    }
    public function finishTrans($id)
    {
        $transaksi = new TransaksiModel();
        $validation =  \Config\Services::validation();
        $validation->setRules(['nama_lengkap' => 'required', 'no_hp' => 'required', 'alamat' => 'required', 'kota' => 'required',]);
        $isDataValid = $validation->withRequest($this->request)->run();
        if($isDataValid){
            $paket = new Paket();
            $mydata=$transaksi->getItems($id);
            $sekarang = date('Y-m-d');
            $transaksi->update($id, [
                    "status" => "selesai" 
                ]);
                return redirect('/');
        }else{
            return redirect('checkout');
        }
        
    }
}

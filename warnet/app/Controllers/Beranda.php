<?php

namespace App\Controllers;
use App\Models\KategoriModel;
use App\Models\TransaksiModel;


class Beranda extends BaseController
{
    public function index()
    {
        $kategori = new KategoriModel();
        $transaksi = new TransaksiModel();

        $data['kat'] = $kategori->findAll();
        $data['statushalaman']="beranda";
        $userID=session()->get('id_user');
        $cek = $transaksi->cek_data($userID);
        $noTransaksi = 0;
        if($cek)
            $noTransaksi = $cek['no_transaksi'];
        $data['total'] = $transaksi->countDataWithCriteria($noTransaksi);
        echo view('part/header');
        echo view('part/navbar',$data);
        echo view('beranda',$data);
        echo view('part/footer');
    }
}

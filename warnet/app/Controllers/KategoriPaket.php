<?php

namespace App\Controllers;
use App\Models\KategoriModel;
use App\Models\PaketModel;

class KategoriBuku extends BaseController
{
    public function index()
    {
        $kategori = new KategoriModel();
        $barang = new PaketModel();
        $data['kat'] = $kategori->findAll();
        $data['brg'] = $barang->findAll();
        $data['statushalaman']="";
        echo view('part/header');
        echo view('part/topbar');
        echo view('part/navbar',$data);
        echo view('kategoribuku',$data);
        echo view('part/footer');
    }

    public function view($id)
    {
        $kategori = new KategoriModel();
        $barang = new PaketModel();
        $data['kat'] = $kategori->findAll();
        $data['statushalaman']="";
        $data['brg'] = $barang->where('id_kategori', $id)->findAll();
        echo view('part/header');
        echo view('part/topbar');
        echo view('part/navbar',$data);
        echo view('kategoribuku',$data);
        echo view('part/footer');
    }
}

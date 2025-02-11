<?php

namespace App\Controllers;

use App\Models\KategoriModel;
use App\Models\KomputerModel;
use App\Models\PaketModel;

class Beranda extends BaseController
{
    public function index()
    {
        $kategoriModel = new KategoriModel();
        $komputerModel = new KomputerModel();
        $paketModel = new PaketModel();

        $data['komputers'] = $komputerModel->where('status', 'Tersedia')->findAll();
        $data['pakets'] = $paketModel->findAll();
        $data['kat'] = $kategoriModel->findAll();
        $data['statushalaman'] = "beranda";

        echo view('part/header');
        echo view('part/navbar', $data);
        echo view('beranda', $data);
        echo view('part/footer');
    }
}

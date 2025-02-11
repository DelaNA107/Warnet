<?php

namespace App\Controllers;

use App\Models\PaketModel;
use App\Models\KategoriModel;
use CodeIgniter\Exceptions\PageNotFoundException;

class Paket extends BaseController
{
    public function index()
    {
        $paket = new PaketModel();
        $data['pkt'] = $paket->findAll();
        echo view('part_adm/header');
        echo view('part_adm/top_menu',$data);
        echo view('part_adm/side_menu',$data);
        echo view('paket',$data);
        echo view('part_adm/footer');
    }
    public function tambah()
    {
        $validation =  \Config\Services::validation();
        $validation->setRules(['nama_paket' => 'required']);
        $isDataValid = $validation->withRequest($this->request)->run();
        if($isDataValid){
            $pkt = new PaketModel();
            $pkt->insert([
                "kode_paket" => $this->request->getPost('kode_paket'),
                "id_kategori" => $this->request->getPost('id_kategori'),
                "nama_paket" => $this->request->getPost('nama_paket'),
                "harga_paket" => $this->request->getPost('harga_paket'),
                "kadaluarsa_paket" => $this->request->getPost('kadaluarsa_paket'),
            ]);
            return redirect('paket');
        }
        $paket = new PaketModel();
        $kategori = new KategoriModel();
        $data['paket'] = $paket->generateKodePaket();
        $data['kategori'] = $kategori->findAll();
        echo view('part_adm/header');
        echo view('part_adm/top_menu');
        echo view('part_adm/side_menu');
        echo view('paket_add',$data);
        echo view('part_adm/footer');
    }
    public function edit($id)
    {
        $pkt = new PaketModel();
        $data['paket'] = $pkt->where('kode_paket', $id)->first();
        $validation =  \Config\Services::validation();
        $validation->setRules(['nama_paket' => 'required']);
        $isDataValid = $validation->withRequest($this->request)->run();
        if($isDataValid){
            $pkt = new PaketModel();
                $pkt->update($id, [
                    "id_kategori" => $this->request->getPost('id_kategori'),
                    "nama_paket" => $this->request->getPost('nama_paket'),
                    "harga_paket" => $this->request->getPost('harga_paket'),
                    "kadaluarsa_paket" => $this->request->getPost('kadaluarsa_paket'),
                ]);
            }else{
                $pkt->update($id, [
                    "id_kategori" => $this->request->getPost('id_kategori'),
                    "nama_paket" => $this->request->getPost('nama_paket'),
                    "harga_paket" => $this->request->getPost('harga_paket'),
                    "kadaluarsa_paket" => $this->request->getPost('kadaluarsa_paket'),
                ]);
            }
            return redirect('paket');
        
        $kategori = new KategoriModel();
        $data['kategori'] = $kategori->findAll();
        echo view('part_adm/header');
        echo view('part_adm/top_menu');
        echo view('part_adm/side_menu');
        echo view('paket_edit',$data);
        echo view('part_adm/footer');
    }
    public function delete($id){
        $bar = new PaketModel();
        $bar->delete($id);
        return redirect('paket');
    }
}

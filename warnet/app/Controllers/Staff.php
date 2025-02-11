<?php

namespace App\Controllers;

use App\Models\StaffModel;
use CodeIgniter\Exceptions\PageNotFoundException;

class Staff extends BaseController
{
    public function index()
    {
        $staff = new StaffModel();
        $data['st'] = $staff->findAll();
        echo view('part_adm/header');
        echo view('part_adm/top_menu');
        echo view('part_adm/side_menu');
        echo view('staff',$data);
        echo view('part_adm/footer'); 
    }

    public function tambah()
    {
        // lakukan validasi
        $validation = \Config\Services::validation();
        $validation->setRules(['nama_staff' => 'required']);
        $isDataValid = $validation->withRequest($this->request)->run();
        // jika data valid, simpan ke database
        if($isDataValid){
            $st =new StaffModel();
            $st->insert([
                "nama_staff" => $this->request->getPost('nama_staff')
            ]);
            return redirect('staff'); 
        }
        echo view('part_adm/header');
        echo view('part_adm/top_menu');
        echo view('part_adm/side_menu');
        echo view('staff_add');
        echo view('part_adm/footer');
    }

    public function edit($id)
    {
        // ambil artikel yang akan diedit
        $st = new StaffModel();
        $data['staff'] = $st->where('kode_staff', $id)->first();
        // lakukan validasi data artikel
        $validation = \Config\Services::validation();
        $validation->setRules([
            'nama_staff' => 'required'
        ]);
        $isDataValid = $validation->withRequest($this->request)->run();
        // jika data valid, maka simpan ke database
        if($isDataValid){
            $st->update($id, [
                "nama_staff" => $this->request->getPost('nama_staff')
            ]);
            return redirect('staff');
        }
        // tampilkan form edit
        echo view('part_adm/header');
        echo view('part_adm/top_menu');
        echo view('part_adm/side_menu');
        echo view('staff_edit',$data);
        echo view('part_adm/footer');
    }

    public function delete($id){
        $st = new StaffModel();
        $st->delete($id);
        return redirect('staff');
    }
}

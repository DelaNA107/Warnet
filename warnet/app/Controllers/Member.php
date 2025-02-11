<?php

namespace App\Controllers;

use App\Models\MemberModel;
use CodeIgniter\Exceptions\PageNotFoundException;

class Member extends BaseController
{
    public function index()
    {
        $member = new MemberModel();
        $data['mem'] = $member->findAll();
        echo view('part_adm/header');
        echo view('part_adm/top_menu');
        echo view('part_adm/side_menu');
        echo view('member',$data);
        echo view('part_adm/footer'); 
    }

    public function tambah()
    {
        // lakukan validasi
        $validation = \Config\Services::validation();
        $validation->setRules(['username' => 'required']);
        $isDataValid = $validation->withRequest($this->request)->run();
        // jika data valid, simpan ke database
        if($isDataValid){
            $member =new MemberModel();
            $member->insert([
                "username" => $this->request->getPost('username')
            ]);
            return redirect('member'); 
        }
        echo view('part_adm/header');
        echo view('part_adm/top_menu');
        echo view('part_adm/side_menu');
        echo view('member_add');
        echo view('part_adm/footer');
    }

    public function edit($id)
    {
        // ambil artikel yang akan diedit
        $member = new MemberModel();
        $data['member'] = $member->where('username', $id)->first();
        // lakukan validasi data artikel
        $validation = \Config\Services::validation();
        $validation->setRules([
            'username' => 'required'
        ]);
        $isDataValid = $validation->withRequest($this->request)->run();
        // jika data valid, maka simpan ke database
        if($isDataValid){
            $member->update($id, [
                "username" => $this->request->getPost('username')
            ]);
            return redirect('member');
        }
        // tampilkan form edit
        echo view('part_adm/header');
        echo view('part_adm/top_menu');
        echo view('part_adm/side_menu');
        echo view('member_edit',$data);
        echo view('part_adm/footer');
    }

    public function delete($id){
        $Member = new MemberModel();
        $Member->delete($id);
        return redirect('Member');
    }
}

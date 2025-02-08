<?php

namespace App\Models;

use CodeIgniter\Model;

class TransaksiModel extends Model
{
    protected $table = 'tbl_transaksi';
    protected $primaryKey = 'no_transaksi';

    protected $useAutoIncrement = 'true';
    protected $allowedFields = ['tanggal_transaksi','kode_staff','nama_staff','kode_member','kode_user','kode_paket','nama_paket','harga_paket','kadaluarsa_paket','total'];

    public function cek_data($kode_user)
    {
      return $this->db->table('tbl_transaksi')
      ->where(array('kode_user' => $kode_user, 'status_halaman' => 'awal'))
      ->get()->getRowArray();
    }

    public function countDataWithCriteria($noTransaksi)
    {
        $hasil=1;
        return $hasil;
        //return $this->where(array('no_transaksi' => $noTransaksi))->countAllResults();
    }

    public function getItems($noTransaksi)
    {
        return $this->join('tbl_paket', 'tbl_transaksi.kode_paket = tbl_paket.kode_paket')
                    ->where(array('no_transaksi' => $noTransaksi))
                    ->select('tbl_transaksi.*, tbl_paket.harga_paket, tbl_paket.nama_paket')
                    ->findAll();
    }

}
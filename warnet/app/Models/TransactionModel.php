<?php

namespace App\Models;

use CodeIgniter\Model;

class TransactionModel extends Model
{
    protected $table = 'transaksi';
    protected $primaryKey = 'id';
    protected $allowedFields = ['user_id', 'komputer_id', 'paket_id', 'nama', 'harga', 'created_at'];

    public function getTransaksiWithUser()
    {
        return $this->select('transaksi.*, tbl_user.username as penyewa')
            ->join('tbl_user', 'tbl_user.kode_user = transaksi.user_id')
            ->findAll();
    }
}

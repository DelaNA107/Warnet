<?php

namespace App\Models;

use CodeIgniter\Model;

class ItemModel extends Model
{
    protected $table      = 'tbl_item';
    protected $primaryKey = 'id_item';

    protected $useAutoIncrement = true;
    protected $allowedFields = ['kode_barang','warna','stok','harga'];

    public function barang()
    {
        return $this->belongsTo(BarangModel::class, 'kode_barang');
    }
}
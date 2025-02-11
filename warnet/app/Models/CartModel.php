<?php

namespace App\Models;

use CodeIgniter\Model;

class CartModel extends Model
{
    protected $table = 'keranjang';
    protected $primaryKey = 'id';
    protected $allowedFields = ['user_id', 'komputer_id', 'paket_id', 'nama', 'harga', 'gambar'];

    public function getCartItems()
    {
        return $this->findAll();
    }
}

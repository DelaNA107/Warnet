<?php

namespace App\Models;

use CodeIgniter\Model;

class PaketModel extends Model
{
    protected $table = 'pakets';
    protected $primaryKey = 'id';
    protected $allowedFields = ['nama_paket', 'harga', 'created_at', 'updated_at'];
}

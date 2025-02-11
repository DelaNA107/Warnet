<?php

namespace App\Models;

use CodeIgniter\Model;

class KomputerModel extends Model
{
    protected $table = 'komputer';
    protected $primaryKey = 'id';
    protected $allowedFields = ['nama', 'status'];
}

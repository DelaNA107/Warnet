<?php

namespace App\Models;

use CodeIgniter\Model;

class StaffModel extends Model
{
    protected $table = 'tbl_staff';
    protected $primaryKey = 'kode_staff';

    protected $useAutoIncrement = 'true';
    protected $allowedFields = ['nama_staf'];
}
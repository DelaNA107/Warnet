<?php

namespace App\Models;

use CodeIgniter\Model;

class MemberModel extends Model
{
    protected $table = 'tbl_member';
    protected $primaryKey = 'kode_member';

    protected $useAutoIncrement = 'true';
    protected $allowedFields = ['username'];
}
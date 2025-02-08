<?php
namespace App\Models;
use CodeIgniter\Model;
class PaketModel extends Model
{
    protected $table      = 'tbl_paket';
    protected $primaryKey = 'kode_paket';
    protected $allowedFields = ['kode_paket','id_kategori','nama_paket'];
    public function generateKodePaket()
    {
        $prefix = 'PKT';
        $query = $this->db->table($this->table)
            ->select('RIGHT(kode_paket,2) AS idbar')
            ->orderBy('kode_paket', 'DESC')
            ->limit(1)
            ->get();

        $result = $query->getRow();
 $lastId = $result ? $result->idbar : 0;
 $lastId = (int) $lastId + 1;
        $kodePaket = $prefix . str_pad($lastId, 2, '0', STR_PAD_LEFT);
        return $kodePaket;
    }
}

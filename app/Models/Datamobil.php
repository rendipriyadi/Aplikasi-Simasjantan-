<?php

namespace App\Models;

use CodeIgniter\Model;

class Datamobil extends Model
{
    protected $table            = 'master_mobil';
    protected $primaryKey       = 'id_mobil';
    protected $allowedFields    = ['id_mobil', 'kode_mobil', 'nama_mobil', 'jenis_mobil', 'nopol_mobil', 'status_mobil', 'kode_pt', 'created_by', 'updated_by'];

    protected $useSoftDeletes = true;
    protected $useTimestamps = true;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    public function tampilData()
    {
        $this->session = \Config\Services::session();
        $pt = $this->session->get('kode_pt');

        return $this->table('master_mobil')->Where(['status_mobil' => 'aktif', 'kode_pt' => $pt])->get()->getResultArray();
    }
}

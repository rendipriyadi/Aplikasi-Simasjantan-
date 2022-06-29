<?php

namespace App\Models;

use CodeIgniter\Model;

class Datasta extends Model
{
    protected $table            = 'sta_system';
    protected $primaryKey       = 'id_sta';
    protected $allowedFields    = ['id_sta', 'kode_lokasi', 'deskripsi_lokasi', 'ruas', 'wilayah', 'km', 'sta', 'jalur', 'kondisi_jalanan', 'alinyemen', 'latitude', 'longitude', 'kode_pt', 'created_by', 'updated_by'];

    protected $useSoftDeletes = true;
    protected $useTimestamps = true;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    public function tampilData()
    {
        $this->session = \Config\Services::session();
        $pt = $this->session->get('kode_pt');

        return $this->table('sta_system')->Where(['kode_pt' => $pt])->get()->getResultArray();
    }
}

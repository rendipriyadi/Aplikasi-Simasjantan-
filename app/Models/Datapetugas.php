<?php

namespace App\Models;

use CodeIgniter\Model;

class Datapetugas extends Model
{
    protected $table            = 'master_petugas';
    protected $primaryKey       = 'id_pt';
    protected $allowedFields    = ['id_pt', 'nip_pt', 'nama_pt', 'jabatan_pt', 'alamat_pt', 'kodepos_pt', 'kota_pt', 'notlp_pt', 'nohp_pt', 'email_pt', 'status_pt', 'kode_pt', 'nama_atasan_pt', 'foto', 'created_by', 'updated_by'];

    protected $useSoftDeletes = true;
    protected $useTimestamps = true;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    public function tampil()
    {
        $this->session = \Config\Services::session();
        $pt = $this->session->get('kode_pt');

        return $this->table('master_petugas')->Where(['status_pt' => 'aktif', 'kode_pt' => $pt])->get()->getResultArray();
    }

    public function tampilData()
    {
        $this->session = \Config\Services::session();
        $pt = $this->session->get('kode_pt');

        return $this->table('master_petugas')->Where(['status_pt' => 'aktif', 'jabatan_pt' => 'SENKOM', 'kode_pt' => $pt])->get()->getResultArray();
    }

    public function tampilPetugas()
    {
        $this->session = \Config\Services::session();
        $pt = $this->session->get('kode_pt');

        return $this->table('master_petugas')->Where(['status_pt' => 'aktif', 'jabatan_pt !=' => 'SENKOM', 'kode_pt' => $pt])->get()->getResultArray();
    }
}

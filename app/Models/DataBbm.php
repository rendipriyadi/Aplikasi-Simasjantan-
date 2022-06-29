<?php

namespace App\Models;

use CodeIgniter\Model;

class DataBbm extends Model
{
    protected $table            = 'pemakaian_bbm';
    protected $primaryKey       = 'id_bbm';
    protected $allowedFields    = ['id_bbm', 'tanggal_bbm', 'mobil_id', 'jenis_bbm', 'jumlah_bbm', 'shift_bbm', 'kode_pt', 'created_by', 'updated_by'];

    protected $useSoftDeletes = true;
    protected $useTimestamps = true;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    public function tampilData()
    {
        $this->session = \Config\Services::session();
        $pt = $this->session->get('kode_pt');

        return $this->table('pemakaian_bbm')
            ->join('master_mobil', 'master_mobil.id_mobil = pemakaian_bbm.mobil_id')
            ->where(['pemakaian_bbm.deleted_at' => null, 'pemakaian_bbm.kode_pt' => $pt])
            ->orderBy('tanggal_bbm', 'DESC')
            ->get();
    }

    public function dataExcel($tglawal, $tglakhir)
    {
        $this->session = \Config\Services::session();
        $pt = $this->session->get('kode_pt');

        return $this->table('pemakaian_bbm')
            ->join('master_mobil', 'master_mobil.id_mobil = pemakaian_bbm.mobil_id')
            ->where('pemakaian_bbm.kode_pt', $pt)
            ->where('tanggal_bbm >=', $tglawal)
            ->where('tanggal_bbm <=', $tglakhir)
            ->orderBy('tanggal_bbm', 'DESC')
            ->get();
    }
}

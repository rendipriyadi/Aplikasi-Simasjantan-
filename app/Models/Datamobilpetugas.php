<?php

namespace App\Models;

use CodeIgniter\Model;

class Datamobilpetugas extends Model
{
    protected $table            = 'mobil_petugas';
    protected $primaryKey       = 'id_mobil_petugas';
    protected $allowedFields    = ['id_mobil_petugas', 'kejadian_id', 'pemakaian_mobil_id', 'waktu_tiba', 'catatan', 'kode_pt', 'created_by', 'updated_by'];

    protected $useSoftDeletes = true;
    protected $useTimestamps = true;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    public function tampil($idkejadian)
    {
        return $this->table('mobil_petugas')
            ->select('id_mobil_petugas,no_laporan,waktu_tiba,kode_mobil,nama_mobil,a.nama_pt as nama_pt1, b.nama_pt as nama_pt2, c.nama_pt as nama_pt3, d.nama_pt as nama_pt4')
            ->join('kejadian', 'id_kejadian=mobil_petugas.kejadian_id')
            ->join('penerimaan_laporan', 'id_pelapor=laporan_id')
            ->join('pemakaian_mobil', 'id_pakai_mobil=pemakaian_mobil_id')
            ->join('master_mobil', 'id_mobil = mobil_id')
            ->join('master_petugas as a', 'a.id_pt = pemakaian_mobil.id_pt1')
            ->join('master_petugas as b', 'b.id_pt = pemakaian_mobil.id_pt2')
            ->join('master_petugas as c', 'c.id_pt = pemakaian_mobil.id_pt3')
            ->join('master_petugas as d', 'd.id_pt = pemakaian_mobil.id_pt4')
            ->where(['mobil_petugas.kejadian_id' => $idkejadian, 'mobil_petugas.deleted_at' => null])
            ->get();
    }

    public function dataExcel($tglawal, $tglakhir)
    {
        $this->session = \Config\Services::session();
        $pt = $this->session->get('kode_pt');

        return $this->table('mobil_petugas')
            ->select('mobil_petugas.kejadian_id as kejadian,no_laporan,nama_mobil,a.nama_pt as nama_pt1, b.nama_pt as nama_pt2, c.nama_pt as nama_pt3, d.nama_pt as nama_pt4, odo_awal, odo_akhir, waktu_tiba')
            ->join('kejadian', 'id_kejadian=mobil_petugas.kejadian_id')
            ->join('penerimaan_laporan', 'id_pelapor=laporan_id')
            ->join('pemakaian_mobil', 'id_pakai_mobil=pemakaian_mobil_id')
            ->join('master_mobil', 'id_mobil = mobil_id')
            ->join('master_petugas as a', 'a.id_pt = pemakaian_mobil.id_pt1')
            ->join('master_petugas as b', 'b.id_pt = pemakaian_mobil.id_pt2')
            ->join('master_petugas as c', 'c.id_pt = pemakaian_mobil.id_pt3')
            ->join('master_petugas as d', 'd.id_pt = pemakaian_mobil.id_pt4')
            ->where('mobil_petugas.kode_pt', $pt)
            ->where('DATE(waktu_kejadian) >=', $tglawal)
            ->where('DATE(waktu_kejadian) <=', $tglakhir)
            ->orderBy('kejadian', 'DESC')
            ->get();
    }
}

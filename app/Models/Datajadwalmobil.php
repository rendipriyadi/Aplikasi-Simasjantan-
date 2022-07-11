<?php

namespace App\Models;

use CodeIgniter\Model;

class Datajadwalmobil extends Model
{
    protected $table            = 'pemakaian_mobil';
    protected $primaryKey       = 'id_pakai_mobil';
    protected $allowedFields    = ['id_pakai_mobil', 'tgl_pakai_mobil', 'mobil_id', 'id_pt1', 'id_pt2', 'id_pt3', 'id_pt4', 'shift_mobil', 'odo_awal', 'odo_akhir', 'kode_pt', 'created_by', 'updated_by', 'deleted_at'];

    protected $useSoftDeletes = true;
    protected $useTimestamps = true;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    public function tampildata($id)
    {
        return $this->table('pemakaian_mobil')
            ->select('tgl_pakai_mobil,kode_mobil,nama_mobil,a.nama_pt as nama_pt1, b.nama_pt as nama_pt2, c.nama_pt as nama_pt3, d.nama_pt as nama_pt4,id_pakai_mobil')
            ->join('master_mobil', 'id_mobil = mobil_id', 'left')
            ->join('master_petugas as a', 'a.id_pt = pemakaian_mobil.id_pt1', 'left')
            ->join('master_petugas as b', 'b.id_pt = pemakaian_mobil.id_pt2', 'left')
            ->join('master_petugas as c', 'c.id_pt = pemakaian_mobil.id_pt3', 'left')
            ->join('master_petugas as d', 'd.id_pt = pemakaian_mobil.id_pt4', 'left')
            ->where('id_pakai_mobil', $id)
            ->get();
    }

    public function dataEdit()
    {
        $this->session = \Config\Services::session();
        $pt = $this->session->get('kode_pt');

        return $this->table('pemakaian_mobil')
            ->select('tgl_pakai_mobil, shift_mobil, kode_mobil,nama_mobil,a.nama_pt as nama_pt1, b.nama_pt as nama_pt2, c.nama_pt as nama_pt3, d.nama_pt as nama_pt4,id_pakai_mobil')
            ->join('master_mobil', 'id_mobil = mobil_id')
            ->join('master_petugas as a', 'a.id_pt = pemakaian_mobil.id_pt1')
            ->join('master_petugas as b', 'b.id_pt = pemakaian_mobil.id_pt2')
            ->join('master_petugas as c', 'c.id_pt = pemakaian_mobil.id_pt3')
            ->join('master_petugas as d', 'd.id_pt = pemakaian_mobil.id_pt4')
            ->where('pemakaian_mobil.kode_pt', $pt)
            ->get();
    }

    public function ambilData()
    {
        $this->session = \Config\Services::session();
        $pt = $this->session->get('kode_pt');

        return $this->table('pemakaian_mobil')
            ->select('tgl_pakai_mobil, shift_mobil,kode_mobil,nama_mobil,a.nama_pt as nama_pt1, b.nama_pt as nama_pt2, c.nama_pt as nama_pt3, d.nama_pt as nama_pt4,id_pakai_mobil')
            ->join('master_mobil', 'id_mobil = mobil_id')
            ->join('master_petugas as a', 'a.id_pt = pemakaian_mobil.id_pt1')
            ->join('master_petugas as b', 'b.id_pt = pemakaian_mobil.id_pt2')
            ->join('master_petugas as c', 'c.id_pt = pemakaian_mobil.id_pt3')
            ->join('master_petugas as d', 'd.id_pt = pemakaian_mobil.id_pt4')
            ->where('tgl_pakai_mobil >=', date('Y-m-d'))
            ->where('tgl_pakai_mobil <=', date('Y-m-d', strtotime('-1 days')))
            ->where('pemakaian_mobil.kode_pt', $pt)
            ->get();
    }
}

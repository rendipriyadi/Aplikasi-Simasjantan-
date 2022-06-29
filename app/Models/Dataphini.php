<?php

namespace App\Models;

use CodeIgniter\Model;

class Dataphini extends Model
{
    protected $table            = 'petugas';
    protected $primaryKey       = 'id_pthariini';
    protected $allowedFields    = ['id_pthariini', 'tgl_tugas', 'jam_shift', 'user_id', 'id_pt1', 'id_pt2', 'id_pt3', 'id_pt4', 'id_kepalashift', 'shift', 'kode_pt', 'created_by', 'updated_by', 'deleted_at'];

    protected $useSoftDeletes = true;
    protected $useTimestamps = true;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    public function tampildata()
    {
        return $this->table('petugas')
            ->select('a.nama_pt as nama_pt1, b.nama_pt as nama_pt2, c.nama_pt as nama_pt3, d.nama_pt as nama_pt4, e.nama_pt as nama_pt5, tgl_tugas, shift, id_pthariini')
            ->join('master_petugas as a', 'a.id_pt = petugas.id_kepalashift')
            ->join('master_petugas as b', 'b.id_pt = petugas.id_pt1')
            ->join('master_petugas as c', 'c.id_pt = petugas.id_pt2')
            ->join('master_petugas as d', 'd.id_pt = petugas.id_pt3')
            ->join('master_petugas as e', 'e.id_pt = petugas.id_pt4')
            ->where('petugas.deleted_at', null)
            ->orderBy('tgl_tugas', 'desc')
            ->get();
    }
}

<?php

namespace App\Models;

use CodeIgniter\Model;

class Datapenerimaanlaporan extends Model
{
    protected $table            = 'penerimaan_laporan';
    protected $primaryKey       = 'id_pelapor';
    protected $allowedFields    = ['id_pelapor', 'kejadian_id', 'no_laporan', 'tgl_laporan', 'nama_pelapor', 'kategori_laporan', 'kontak_pelapor', 'notlp_pelapor', 'informasi_id', 'gangguan_id', 'keterangan_laporan', 'file', 'kode_pt', 'created_by', 'updated_by'];

    protected $useSoftDeletes = true;
    protected $useTimestamps = true;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    public function cekId($id)
    {
        return $this->table('penerimaan_laporan')->getWhere([
            'sha1(id_pelapor)' => $id
        ]);
    }

    public function tampildata($id)
    {
        return $this->table('penerimaan_laporan')
            ->join('sumber_informasi', 'id_informasi=informasi_id')
            ->join('gangguan', 'id_gangguan=gangguan_id')
            ->where('id_pelapor', $id)
            ->get();
    }
    public function tampil($idkejadian)
    {
        return $this->table('penerimaan_laporan')
            ->join('sumber_informasi', 'id_informasi=informasi_id')
            ->join('gangguan', 'id_gangguan=gangguan_id')
            ->where('kejadian_id', $idkejadian)
            ->get();
    }

    public function datatampil()
    {
        return $this->table('penerimaan_laporan')
            ->join('sumber_informasi', 'id_informasi=informasi_id')
            ->join('gangguan', 'id_gangguan=gangguan_id')
            ->get();
    }
}

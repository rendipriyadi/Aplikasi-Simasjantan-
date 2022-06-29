<?php

namespace App\Models;

use CodeIgniter\Model;

class Datadetaillaporan extends Model
{
    protected $table            = 'detail_laporan';
    protected $primaryKey       = 'id_detaillaporan';
    protected $allowedFields    = ['id_detaillaporan', 'laporan_id', 'kejadian_id', 'kode_pt'];

    public function tampil($idkejadian)
    {
        return $this->table('detail_laporan')
            ->join('penerimaan_laporan', 'id_pelapor=laporan_id')
            ->join('kejadian', 'id_kejadian=detail_laporan.kejadian_id')
            ->join('sumber_informasi', 'id_informasi=informasi_id')
            ->join('gangguan', 'id_gangguan=gangguan_id')
            ->where('detail_laporan.kejadian_id', $idkejadian)
            ->get();
    }

    public function dataExcel($tglawal, $tglakhir)
    {
        $this->session = \Config\Services::session();
        $pt = $this->session->get('kode_pt');

        return $this->table('detail_laporan')
            ->join('kejadian', 'id_kejadian=detail_laporan.kejadian_id')
            ->join('penerimaan_laporan', 'penerimaan_laporan.id_pelapor=detail_laporan.laporan_id')
            ->join('gangguan', 'id_gangguan=gangguan_id', 'left')
            ->join('sumber_informasi', 'id_informasi=informasi_id', 'left')
            ->where('detail_laporan.kode_pt', $pt)
            ->where('DATE(tgl_laporan) >=', $tglawal)
            ->where('DATE(tgl_laporan) <=', $tglakhir)
            ->orderBy('detail_laporan.kejadian_id', 'DESC')
            ->get();
    }
}

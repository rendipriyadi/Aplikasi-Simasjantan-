<?php

namespace App\Models;

use CodeIgniter\Model;

class Datamobilkorban extends Model
{
    protected $table            = 'mobil_korban';
    protected $primaryKey       = 'id_mobil_korban';
    protected $allowedFields    = ['id_mobil_korban', 'kejadian_id', 'jenis_mobil_korban', 'golongan_mobil', 'merk_mobil_korban', 'nopol_mobil_korban', 'mobil_derek', 'warna_mobil', 'kondisi_kendaraan', 'catatan', 'foto', 'kode_pt', 'created_by', 'updated_by'];

    protected $useSoftDeletes = true;
    protected $useTimestamps = true;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    public function tampil($idkejadian)
    {
        return $this->table('mobil_korban')
            ->join('kejadian', 'id_kejadian=mobil_korban.kejadian_id')
            ->join('penerimaan_laporan', 'id_pelapor=laporan_id')
            ->where(['mobil_korban.kejadian_id' => $idkejadian, 'mobil_korban.deleted_at' => null])
            ->get();
    }

    public function hitungTidakRusak($idkejadian)
    {
        return $this->table('mobil_korban')
            ->where(['kejadian_id' => $idkejadian, 'kondisi_kendaraan' => 'TIDAK RUSAK'])
            ->countAllResults();
    }
    public function hitungRusakRingan($idkejadian)
    {
        return $this->table('mobil_korban')
            ->where(['kejadian_id' => $idkejadian, 'kondisi_kendaraan' => 'RUSAK RINGAN'])
            ->countAllResults();
    }
    public function hitungRusakBerat($idkejadian)
    {
        return $this->table('mobil_korban')
            ->where(['kejadian_id' => $idkejadian, 'kondisi_kendaraan' => 'RUSAK BERAT'])
            ->countAllResults();
    }

    public function dataExcel($tglawal, $tglakhir)
    {
        $this->session = \Config\Services::session();
        $pt = $this->session->get('kode_pt');

        return $this->table('mobil_korban')
            ->join('kejadian', 'id_kejadian=mobil_korban.kejadian_id')
            ->where('mobil_korban.kode_pt', $pt)
            ->where('DATE(waktu_kejadian) >=', $tglawal)
            ->where('DATE(waktu_kejadian) <=', $tglakhir)
            ->orderBy('mobil_korban.kejadian_id', 'DESC')
            ->get();
    }
}

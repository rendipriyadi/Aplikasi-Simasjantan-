<?php

namespace App\Models;

use CodeIgniter\Model;

class DataKorban extends Model
{
    protected $table            = 'korban_kecelakaan';
    protected $primaryKey       = 'id_korban';
    protected $allowedFields    = ['id_korban', 'kejadian_id', 'nama_korban', 'jenkel_korban', 'notlp_korban', 'sim_korban', 'ktp_korban', 'alamat_korban', 'kondisi_korban', 'catatan', 'foto', 'kode_pt', 'created_by', 'updated_by'];

    protected $useSoftDeletes = true;
    protected $useTimestamps = true;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    public function tampil($idkejadian)
    {
        return $this->table('korban_kecelakaan')
            ->join('kejadian', 'id_kejadian=korban_kecelakaan.kejadian_id')
            ->join('penerimaan_laporan', 'id_pelapor=laporan_id')
            ->where(['korban_kecelakaan.kejadian_id' => $idkejadian, 'korban_kecelakaan.deleted_at' => null])
            ->get();
    }

    public function hitungLukaRingan($idkejadian)
    {
        return $this->table('korban_kecelakaan')
            ->where(['kejadian_id' => $idkejadian, 'kondisi_korban' => 'LUKA RINGAN'])
            ->countAllResults();
    }

    public function hitungLukaBerat($idkejadian)
    {
        return $this->table('korban_kecelakaan')
            ->where(['kejadian_id' => $idkejadian, 'kondisi_korban' => 'LUKA BERAT'])
            ->countAllResults();
    }

    public function hitungMeninggal($idkejadian)
    {
        return $this->table('korban_kecelakaan')
            ->where(['kejadian_id' => $idkejadian, 'kondisi_korban' => 'MENINGGAL'])
            ->countAllResults();
    }

    public function dataExcel($tglawal, $tglakhir)
    {
        $this->session = \Config\Services::session();
        $pt = $this->session->get('kode_pt');

        return $this->table('korban_kecelakaan')
            ->join('kejadian', 'id_kejadian=korban_kecelakaan.kejadian_id')
            ->where('korban_kecelakaan.kode_pt', $pt)
            ->where('DATE(waktu_kejadian) >=', $tglawal)
            ->where('DATE(waktu_kejadian) <=', $tglakhir)
            ->orderBy('korban_kecelakaan.kejadian_id', 'DESC')
            ->get();
    }
}

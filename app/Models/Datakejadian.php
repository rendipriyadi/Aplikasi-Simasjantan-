<?php

namespace App\Models;

use CodeIgniter\Model;

class Datakejadian extends Model
{
    protected $table            = 'kejadian';
    protected $primaryKey       = 'id_kejadian';
    protected $allowedFields    = ['id_kejadian', 'laporan_id', 'status_id', 'tipe_kejadian', 'waktu_kejadian', 'waktu_penanganan', 'waktu_selesai_penanganan', 'cuaca_kejadian', 'harilibur_kejadian', 'sta_id', 'lokasi_kejadian', 'lajur_kejadian', 'penyebab_id', 'tipe_tabrakan_id', 'kode_gangguan', 'kondisi_jalan', 'posisi_mobil', 'klr_kejadian', 'klb_kejadian', 'km_kejadian', 'ktr_kejadian', 'krr_kejadian', 'krb_kejadian', 'keterangan', 'file', 'kode_pt', 'created_by', 'updated_by'];

    protected $useSoftDeletes = true;
    protected $useTimestamps = true;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    public function cekId($id)
    {
        return $this->table('kejadian')
            ->getWhere([
                'sha1(id_kejadian)' => $id
            ]);
    }

    public function ambilDataTerakhir()
    {
        return $this->table('kejadian')->limit(1)->orderBy('id_kejadian', 'DESC')->get();
    }

    public function dataDahsboard()
    {
        $this->session = \Config\Services::session();
        $pt = $this->session->get('kode_pt');

        return $this->table('kejadian')
            ->join('status_kejadian', 'id_status = status_id')
            ->join('penerimaan_laporan', 'id_pelapor=laporan_id')
            ->join('gangguan', 'id_gangguan=kode_gangguan')
            ->join('sta_system', 'id_sta=sta_id')
            ->where('kejadian.kode_pt', $pt)
            ->like('DATE(waktu_kejadian)', date('Y-m-d'))
            ->orderBy('waktu_kejadian', 'DESC')
            ->get();
    }

    public function dataExcel($tglawal, $tglakhir)
    {
        $this->session = \Config\Services::session();
        $pt = $this->session->get('kode_pt');

        return $this->table('kejadian')
            ->join('penerimaan_laporan', 'id_pelapor=laporan_id', 'left')
            ->join('sumber_informasi', 'id_informasi=informasi_id', 'left')
            ->join('status_kejadian', 'id_status = status_id', 'left')
            ->join('sta_system', 'id_sta=sta_id', 'left')
            ->join('penyebab', 'id_penyebab=penyebab_id', 'left')
            ->join('tipe_tabrakan', 'id_tipe_tabrakan=tipe_tabrakan_id', 'left')
            ->join('gangguan', 'id_gangguan=kode_gangguan', 'left')
            ->join('tindakan_kejadian', 'tindakan_kejadian.kejadian_id=id_kejadian', 'left')
            ->join('users', 'user_id=kejadian.created_by', 'left')
            ->where('kejadian.kode_pt', $pt)
            ->where('DATE(waktu_kejadian) >=', $tglawal)
            ->where('DATE(waktu_kejadian) <=', $tglakhir)
            ->orderBy('id_kejadian', 'DESC')
            ->get();
    }
}

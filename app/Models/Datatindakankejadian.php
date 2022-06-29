<?php

namespace App\Models;

use CodeIgniter\Model;

class Datatindakankejadian extends Model
{
    protected $table            = 'tindakan_kejadian';
    protected $primaryKey       = 'id_tindakan';
    protected $allowedFields    = ['id_tindakan','kejadian_id','tindakan','waktu_tindakan','catatan', 'created_by', 'updated_by'];

    protected $useSoftDeletes = true;
    protected $useTimestamps = true;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    public function tampil($idkejadian) {
         return $this->table('tindakan_kejadian')
                ->join('kejadian', 'id_kejadian=tindakan_kejadian.kejadian_id')
                ->join('penerimaan_laporan', 'id_pelapor=laporan_id')
                ->where(['tindakan_kejadian.kejadian_id' => $idkejadian, 'tindakan_kejadian.deleted_at' => null])
                ->get();
    }
}

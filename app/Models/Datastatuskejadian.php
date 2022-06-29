<?php

namespace App\Models;

use CodeIgniter\Model;

class Datastatuskejadian extends Model
{
    protected $table            = 'status_kejadian';
    protected $primaryKey       = 'id_status';
    protected $allowedFields    = ['id_status','kejadian_id','deskripsi_status','waktu','petugas_id','catatan', 'created_by', 'updated_by'];

    protected $useSoftDeletes = true;
    protected $useTimestamps = true;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    public function ambilDataTerakhir(){
        return $this->table('status_kejadian')->limit(1)->orderBy('id_status', 'DESC')->get();
    }

    public function ambilDataEditStatus($idstatus) {
        return $this->table('status_kejadian')->limit(1)->orderBy('id_status', 'DESC')->where('id_status', $idstatus)->get();
    }
}

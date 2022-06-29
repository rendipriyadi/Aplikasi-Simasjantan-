<?php

namespace App\Models;

use CodeIgniter\Model;

class Datatipe extends Model
{
    protected $table            = 'tipe_tabrakan';
    protected $primaryKey       = 'id_tipe_tabrakan';
    protected $allowedFields    = ['id_tipe_tabrakan','deskripsi_tipe','icon', 'created_by', 'updated_by'];

    protected $useSoftDeletes = true;
    protected $useTimestamps = true;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';
}

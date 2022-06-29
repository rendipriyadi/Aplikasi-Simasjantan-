<?php

namespace App\Models;

use CodeIgniter\Model;

class Datagangguan extends Model
{
    protected $table            = 'gangguan';
    protected $primaryKey       = 'id_gangguan';
    protected $allowedFields    = ['id_gangguan','deskripsi_gangguan', 'created_by', 'updated_by'];

    protected $useSoftDeletes = true;
    protected $useTimestamps = true;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';
}

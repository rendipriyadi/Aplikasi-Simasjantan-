<?php

namespace App\Models;

use CodeIgniter\Model;

class Datainformasi extends Model
{
    protected $table            = 'sumber_informasi';
    protected $primaryKey       = 'id_informasi';
    protected $allowedFields    = ['id_informasi','deskripsi_informasi', 'created_by', 'updated_by'];

    protected $useSoftDeletes = true;
    protected $useTimestamps = true;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';
}

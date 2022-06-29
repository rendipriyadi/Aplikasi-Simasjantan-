<?php

namespace App\Models;

use CodeIgniter\Model;

class Datapenyebab extends Model
{
    protected $table            = 'penyebab';
    protected $primaryKey       = 'id_penyebab';
    protected $allowedFields    = ['id_penyebab','deskripsi_penyebab', 'created_by', 'updated_by'];

    protected $useSoftDeletes = true;
    protected $useTimestamps = true;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';
}

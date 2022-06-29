<?php

namespace App\Models;

use CodeIgniter\Model;

class Datalogin extends Model
{
    protected $table            = 'users';
    protected $primaryKey       = 'user_id';
    protected $allowedFields    = [
        'user_id',
        'username',
        'password',
        'name',
        'kode_pt',
        'level_user',
        'shift',
    ];

    protected $useTimestamps = true;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
}

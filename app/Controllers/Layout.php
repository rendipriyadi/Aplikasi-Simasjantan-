<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Datakejadian;

class Layout extends BaseController
{
    public function index()
    {
        $modelKejadian = new Datakejadian();
        $dataKejadian = $modelKejadian->dataDahsboard();
        $data = [
            'datakejadian' => $dataKejadian,
        ];
        return view('template/index', $data);  
    }
}

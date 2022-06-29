<?php

namespace App\Filters;

use CodeIgniter\Filters\FilterInterface;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;

class Filteruser implements FilterInterface
{

    public function before(RequestInterface $request, $arguments = null)
    {
       if (session()->level_user == null) {
            return redirect()->to('login/index');
        }
    }

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        if (session()->level_user == 'user') {
            return redirect()->to('layout/index');
        } 
    }
}

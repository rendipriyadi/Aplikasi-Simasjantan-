<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Datapenyebab;

class Penyebab extends BaseController
{
    public function __construct()
    {
        $this->datapenyebab = new Datapenyebab();
    }
  
    public function index()                                    
    {
        $data = [
            'datapenyebab' => $this->datapenyebab->findAll()
        ];
        return view('penyebab/index', $data);
    }

    public function formtambah()
    {
        if ($this->request->isAJAX()) {
            $msg = [
                'data' => view('penyebab/modaltambah')
            ];
            echo json_encode($msg);
        }else{
            exit('Maaf anda tidak dapat mengakses halaman ini');
        }
        
    }

    public function simpandata()
    {
        if ($this->request->isAJAX()) {
            $deskripsi = $this->request->getVar('deskripsi');

            $validation =  \Config\Services::validation();

            $valid = $this->validate([
                'deskripsi' => [
                    'label' => 'Deskripsi',
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} tidak boleh kosong'
                    ]
                ]
            ]);

            if(!$valid){
                $msg = [
                    'error' => [
                        'errorDeskripsi' => $validation->getError('deskripsi')
                    ]
                ];
            }else{
                $data = [
                    'deskripsi_penyebab' => $deskripsi,
                    'created_by' => $this->session->get('user_id'),
                    'updated_by' => $this->session->get('user_id')
                ];
                $this->datapenyebab->insert($data);
                $msg = [
                    'sukses' => 'Data berhasil ditambahkan'
                ];
            }
            echo json_encode($msg);
        }else{
            exit('Maaf anda tidak dapat mengakses halaman ini');
        
        }
    }

    public function hapus()
    {
        if ($this->request->isAJAX()) {
            $id = $this->request->getVar('id');

            $this->datapenyebab->delete($id);
            $msg = [
                'sukses' => 'Data berhasil dihapus'
            ];
            echo json_encode($msg);
        }else{
            exit('Maaf anda tidak dapat mengakses halaman ini');
        }
    }

    public function formedit()
    {
        if ($this->request->isAJAX()) {
            $id = $this->request->getVar('id');

            $row = $this->datapenyebab->find($id);
            $data = [
                    'id' => $row['id_penyebab'],
                    'deskripsi' => $row['deskripsi_penyebab']
            ];

            $msg = [
                    'data' => view('penyebab/modaledit', $data)
            ];

            echo json_encode($msg);
        }   
    }

    public function updatedata()
    {
        if ($this->request->isAJAX()) {
            $id = $this->request->getVar('id');
            $deskripsi = $this->request->getVar('deskripsi');

            $validation =  \Config\Services::validation();

            $valid = $this->validate([
                'deskripsi' => [
                    'label' => 'Deskripsi',
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} tidak boleh kosong'
                    ]
                ]
            ]);

            if(!$valid){
                $msg = [
                    'error' => [
                        'errorDeskripsi' => $validation->getError('deskripsi')
                    ]
                ];
            }else{
                $data = [
                    'deskripsi_penyebab' => $deskripsi,
                    'updated_by' => $this->session->get('user_id')
                ];
                $this->datapenyebab->update($id,$data);
                $msg = [
                    'sukses' => 'Data berhasil diupdate'
                ];
            }
            echo json_encode($msg);
        }else{
            exit('Maaf anda tidak dapat mengakses halaman ini');
        
        }
    }
}

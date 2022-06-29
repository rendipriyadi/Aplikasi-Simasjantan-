<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Datainformasi;

class Sumberinformasi extends BaseController
{
    public function __construct()
    {
        $this->datainformasi = new Datainformasi();
    }
  
    public function index()                                    
    {
        $data = [
            'datainformasi' => $this->datainformasi->findAll()
        ];
        return view('sumberinformasi/index', $data);
    }

    public function formtambah()
    {
        if ($this->request->isAJAX()) {
            $msg = [
                'data' => view('sumberinformasi/modaltambah')
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
                    'deskripsi_informasi' => $deskripsi,
                    'created_by' => $this->session->get('user_id'),
                    'updated_by' => $this->session->get('user_id')
                ];
                $this->datainformasi->insert($data);
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

            $this->datainformasi->delete($id);
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

            $row = $this->datainformasi->find($id);
            $data = [
                    'id' => $row['id_informasi'],
                    'deskripsi' => $row['deskripsi_informasi']
            ];

            $msg = [
                    'data' => view('sumberinformasi/modaledit', $data)
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
                    'deskripsi_informasi' => $deskripsi,
                    'updated_by' => $this->session->get('user_id')
                ];
                $this->datainformasi->update($id,$data);
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

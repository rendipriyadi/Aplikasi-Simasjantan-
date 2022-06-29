<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Datagangguan;

class Gangguan extends BaseController
{
    public function __construct()
    {
        $this->datagangguan = new Datagangguan();
    }
  
    public function index()
    {
        $data = [
            'datagangguan' => $this->datagangguan->findAll()
        ];
        return view('gangguan/index', $data);
    }

    public function formtambah()
    {
        if ($this->request->isAJAX()) {
            $msg = [
                'data' => view('gangguan/modaltambah')
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
                    'deskripsi_gangguan' => $deskripsi,
                    'created_by' => $this->session->get('user_id'),
                    'updated_by' => $this->session->get('user_id')
                ];
                $this->datagangguan->insert($data);
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

            $this->datagangguan->delete($id);
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

           $row = $this->datagangguan->find($id);
           $data = [
                'id' => $row['id_gangguan'],
                'deskripsi' => $row['deskripsi_gangguan'],
           ];

           $msg = [
                'data' => view('gangguan/modaledit', $data)
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
                    'deskripsi_gangguan' => $deskripsi,
                    'updated_by' => $this->session->get('user_id')
                ];
                $this->datagangguan->update($id,$data);
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

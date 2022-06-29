<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Datatipe;

class Tipe extends BaseController
{
    public function __construct()
    {
        $this->datatipe = new Datatipe();
    }
  
    public function index()                                    
    {
        $data = [
            'datatipe' => $this->datatipe->findAll()
        ];
        return view('tipe/index', $data);
    }

    public function formtambah()
    {
        if ($this->request->isAJAX()) {
            $msg = [
                'data' => view('tipe/modaltambah')
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
                ],
                'icon' => [
                    'label' => 'Icon',
                    'rules' => 'mime_in[icon,image/png,image/jpeg,image/jpg]|ext_in[icon,png,jpeg,jpg]|is_image[icon]',
                    'errors' => [
                        'mime_in' => 'Yang anda upload bukan gambar',
                        'ext_in' => 'Yang anda upload bukan gambar',
                    ]
                ]
            ]);

            if(!$valid){
                $msg = [
                    'error' => [
                        'errorDeskripsi' => $validation->getError('deskripsi'),
                        'errorIcon' => $validation->getError('icon')
                    ]
                ];
            }else{
                $fileUpload = $_FILES['icon']['name'];

                if ($fileUpload != null) {
                    $namaFile = $this->request->getFile('icon')->getRandomName();
                    $fileGambar = $this->request->getFile('icon');
                    $fileGambar->move('file/kecelakaan', $namaFile . '.' . $fileGambar->getExtension());

                    $pathFile = 'file/kecelakaan/' . $fileGambar->getName();
                }else{
                    $pathFile = '';
                }

                $data = [
                    'deskripsi_tipe' => $deskripsi,
                    'icon' => $pathFile,
                    'created_by' => $this->session->get('user_id'),
                    'updated_by' => $this->session->get('user_id')
                ];
                $this->datatipe->insert($data);
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

            $cekdata = $this->datatipe->find($id);
            $fotolama = $cekdata['icon'];

            if ($fotolama != null) {
                unlink($fotolama);
            }

            $this->datatipe->delete($id);
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

            $row = $this->datatipe->find($id);
            $data = [
                'id' => $row['id_tipe_tabrakan'],
                'deskripsi' => $row['deskripsi_tipe'],
                'icon' => $row['icon']
            ];

            $msg = [
                'data' => view('tipe/modaledit', $data)
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
                ],
                'icon' => [
                    'label' => 'Icon',
                    'rules' => 'mime_in[icon,image/png,image/jpeg,image/jpg]|ext_in[icon,png,jpeg,jpg]|is_image[icon]',
                    'errors' => [
                        'mime_in' => 'Yang anda upload bukan gambar',
                        'ext_in' => 'Yang anda upload bukan gambar',
                    ]
                ]
            ]);

            if(!$valid){
                $msg = [
                    'error' => [
                        'errorDeskripsi' => $validation->getError('deskripsi'),
                        'errorIcon' => $validation->getError('icon')
                    ]
                ];
            }else{
                $fileUpload = $_FILES['icon']['name'];

                $rowData = $this->datatipe->find($id);
                $fileLama =  $rowData['icon'];

                    if ($fileUpload != null) {
                        ($fileLama == '' || $fileLama == null) ? '' : unlink($fileLama);

                        $namaFile = $this->request->getFile('icon')->getRandomName();;
                        $fileGambar = $this->request->getFile('icon');
                        $fileGambar->move('file/kecelakaan', $namaFile . '.' . $fileGambar->getExtension());

                        $pathFile = 'file/kecelakaan/' . $fileGambar->getName();
                    }else{
                        $pathFile = $fileLama;
                    }

                $data = [
                    'deskripsi_tipe' => $deskripsi,
                    'icon' => $pathFile,
                    'updated_by' => $this->session->get('user_id')
                ];
                $this->datatipe->update($id,$data);
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

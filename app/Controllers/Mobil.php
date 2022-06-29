<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Datamobil;
use App\Models\Datapetugas;

class Mobil extends BaseController
{
    public function __construct()
    {
        $this->datamobil = new Datamobil();
        $this->datapetugas = new Datapetugas();
    }

    public function index()
    {
        $data = [
            'datamobil' => $this->datamobil->tampilData()
        ];
        return view('mobil/index', $data);
    }

    public function formtambah()
    {
        if ($this->request->isAJAX()) {
            $msg = [
                'data' => view('mobil/modaltambah')
            ];
            echo json_encode($msg);
        } else {
            exit('Maaf anda tidak dapat mengakses halaman ini');
        }
    }

    public function simpandata()
    {
        if ($this->request->isAJAX()) {
            $kode_mobil = $this->request->getPost('kode');
            $nama_mobil = $this->request->getPost('nama');
            $jenis_mobil = $this->request->getPost('jenis');
            $nopol_mobil = $this->request->getPost('nopol');
            $status_mobil = $this->request->getPost('status');

            $validation = \Config\Services::validation();

            $valid = $this->validate([
                'kode' => [
                    'rules' => 'required|is_unique[master_mobil.kode_mobil]',
                    'errors' => [
                        'required' => 'Kode mobil harus diisi',
                        'is_unique' => 'Kode mobil sudah ada'
                    ]
                ],
                'nama' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Nama mobil harus diisi'
                    ]
                ]
            ]);

            if (!$valid) {
                $msg = [
                    'error' => [
                        'errorKode' => $validation->getError('kode'),
                        'errorNama' => $validation->getError('nama')
                    ]
                ];
            } else {
                $data = [
                    'kode_mobil' => $kode_mobil,
                    'nama_mobil' => $nama_mobil,
                    'jenis_mobil' => $jenis_mobil,
                    'nopol_mobil' => $nopol_mobil,
                    'status_mobil' => $status_mobil,
                    'kode_pt' => $this->session->get('kode_pt'),
                    'created_by' => $this->session->get('user_id'),
                    'updated_by' => $this->session->get('user_id')
                ];
                $this->datamobil->insert($data);
                $msg = [
                    'sukses' => 'Data berhasil ditambahkan'
                ];
            }
            echo json_encode($msg);
        } else {
            exit('Maaf anda tidak dapat mengakses halaman ini');
        }
    }

    public function hapus()
    {
        if ($this->request->isAJAX()) {
            $id = $this->request->getVar('id');

            $this->datamobil->delete($id);
            $msg = [
                'sukses' => 'Data berhasil dihapus'
            ];
            echo json_encode($msg);
        } else {
            exit('Maaf anda tidak dapat mengakses halaman ini');
        }
    }

    public function formedit()
    {
        if ($this->request->isAJAX()) {
            $id = $this->request->getVar('id');

            $row = $this->datamobil->find($id);
            $data = [
                'id' => $row['id_mobil'],
                'kode' => $row['kode_mobil'],
                'nama' => $row['nama_mobil'],
                'jenis' => $row['jenis_mobil'],
                'nopol' => $row['nopol_mobil'],
                'status' => $row['status_mobil']
            ];

            $msg = [
                'data' => view('mobil/modaledit', $data)
            ];

            echo json_encode($msg);
        }
    }

    public function updatedata()
    {
        if ($this->request->isAJAX()) {
            $id = $this->request->getVar('id');
            $kode_mobil = $this->request->getPost('kode');
            $nama_mobil = $this->request->getPost('nama');
            $jenis_mobil = $this->request->getPost('jenis');
            $nopol_mobil = $this->request->getPost('nopol');
            $status_mobil = $this->request->getPost('status');

            $validation = \Config\Services::validation();

            $valid = $this->validate([
                'kode' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Kode mobil harus diisi',
                    ]
                ],
                'nama' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Nama mobil harus diisi'
                    ]
                ]
            ]);

            if (!$valid) {
                $msg = [
                    'error' => [
                        'errorKode' => $validation->getError('kode'),
                        'errorNama' => $validation->getError('nama')
                    ]
                ];
            } else {
                $data = [
                    'kode_mobil' => $kode_mobil,
                    'nama_mobil' => $nama_mobil,
                    'jenis_mobil' => $jenis_mobil,
                    'nopol_mobil' => $nopol_mobil,
                    'status_mobil' => $status_mobil,
                    'kode_pt' => $this->session->get('kode_pt'),
                    'updated_by' => $this->session->get('user_id')
                ];
                $this->datamobil->update($id, $data);
                $msg = [
                    'sukses' => 'Data berhasil diupdate'
                ];
            }
            echo json_encode($msg);
        } else {
            exit('Maaf anda tidak dapat mengakses halaman ini');
        }
    }
}

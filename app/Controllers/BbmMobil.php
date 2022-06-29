<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\DataBbm;
use App\Models\Datamobil;

class BbmMobil extends BaseController
{
    public function __construct()
    {
        $this->databbm = new DataBbm();
        $this->datamobil = new Datamobil();
    }

    public function index()
    {
        $data = [
            'databbm' => $this->databbm->tampilData()
        ];
        return view('bbmmobil/index', $data);
    }

    public function formtambah()
    {
        if ($this->request->isAJAX()) {
            $data = [
                'datamobil' => $this->datamobil->findAll()
            ];
            $msg = [
                'data' => view('bbmmobil/modaltambah', $data)
            ];
            echo json_encode($msg);
        } else {
            exit('Maaf anda tidak dapat mengakses halaman ini');
        }
    }

    public function simpandata()
    {
        if ($this->request->isAJAX()) {
            $tanggal = $this->request->getVar('tanggal');
            $mobil = $this->request->getVar('mobil');
            $jenis = $this->request->getVar('jenis');
            $jumlah = $this->request->getVar('jumlah');
            $shift = $this->request->getVar('shift');

            $validation =  \Config\Services::validation();

            $valid = $this->validate([
                'tanggal' => [
                    'label' => 'Tanggal',
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} tidak boleh kosong'
                    ]
                ],
                'mobil' => [
                    'label' => 'Mobil',
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} tidak boleh kosong'
                    ]
                ]
            ]);

            if (!$valid) {
                $msg = [
                    'error' => [
                        'errorTanggal' => $validation->getError('tanggal'),
                        'errorMobil' => $validation->getError('mobil')
                    ]
                ];
            } else {
                $data = [
                    'tanggal_bbm' => $tanggal,
                    'mobil_id' => $mobil,
                    'jenis_bbm' => $jenis,
                    'jumlah_bbm' => $jumlah,
                    'shift_bbm' => $shift,
                    'kode_pt' => $this->session->get('kode_pt'),
                    'created_by' => $this->session->get('user_id'),
                    'updated_by' => $this->session->get('user_id')
                ];
                $this->databbm->insert($data);
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

            $this->databbm->delete($id);
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

            $row = $this->databbm->find($id);
            $data = [
                'id' => $row['id_bbm'],
                'tanggal' => date('Y-m-d\TH:i', strtotime($row['tanggal_bbm'])),
                'mobil' => $row['mobil_id'],
                'datamobil' => $this->datamobil->findAll(),
                'jenis' => $row['jenis_bbm'],
                'jumlah' => $row['jumlah_bbm'],
                'shift' => $row['shift_bbm']
            ];

            $msg = [
                'data' => view('bbmmobil/modaledit', $data)
            ];

            echo json_encode($msg);
        }
    }

    public function updatedata()
    {
        if ($this->request->isAJAX()) {
            $id = $this->request->getVar('id');
            $tanggal = $this->request->getVar('tanggal');
            $mobil = $this->request->getVar('mobil');
            $jenis = $this->request->getVar('jenis');
            $jumlah = $this->request->getVar('jumlah');
            $shift = $this->request->getVar('shift');

            $validation =  \Config\Services::validation();

            $valid = $this->validate([
                'tanggal' => [
                    'label' => 'Tanggal',
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} tidak boleh kosong'
                    ]
                ],
                'mobil' => [
                    'label' => 'Mobil',
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} tidak boleh kosong'
                    ]
                ]
            ]);

            if (!$valid) {
                $msg = [
                    'error' => [
                        'errorTanggal' => $validation->getError('tanggal'),
                        'errorMobil' => $validation->getError('mobil')
                    ]
                ];
            } else {
                $data = [
                    'tanggal_bbm' => $tanggal,
                    'mobil_id' => $mobil,
                    'jenis_bbm' => $jenis,
                    'jumlah_bbm' => $jumlah,
                    'shift_bbm' => $shift,
                    'kode_pt' => $this->session->get('kode_pt'),
                    'updated_by' => $this->session->get('user_id')
                ];
                $this->databbm->update($id, $data);
                $msg = [
                    'sukses' => 'Data berhasil diupate'
                ];
            }
            echo json_encode($msg);
        } else {
            exit('Maaf anda tidak dapat mengakses halaman ini');
        }
    }
}

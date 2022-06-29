<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Datasta;

class Sta extends BaseController
{
    public function __construct()
    {
        $this->datasta = new Datasta();
    }

    public function index()
    {
        $data = [
            'datasta' => $this->datasta->tampilData()
        ];
        return view('sta/index', $data);
    }

    public function formtambah()
    {
        if ($this->request->isAJAX()) {
            $msg = [
                'data' => view('sta/modaltambah')
            ];
            echo json_encode($msg);
        } else {
            exit('Maaf anda tidak dapat mengakses halaman ini');
        }
    }

    public function simpandata()
    {
        if ($this->request->isAJAX()) {
            $kode = $this->request->getVar('kode');
            $deskripsi = $this->request->getVar('deskripsi');
            $ruas = $this->request->getVar('ruas');
            $wilayah = $this->request->getVar('wilayah');
            $km = $this->request->getVar('km');
            $sta = $this->request->getVar('sta');
            $jalur = $this->request->getVar('jalur');
            $kondisi = $this->request->getVar('kondisi');
            $alinyemen = $this->request->getVar('alinyemen');
            $latitude = $this->request->getVar('latitude');
            $longitude = $this->request->getVar('longitude');

            $validation =  \Config\Services::validation();

            $valid = $this->validate([
                'kode' => [
                    'label' => 'Kode',
                    'rules' => 'required|is_unique[sta_system.kode_lokasi]',
                    'errors' => [
                        'required' => '{field} tidak boleh kosong',
                        'is_unique' => '{field} sudah ada'
                    ]
                ],
                'deskripsi' => [
                    'label' => 'Deskripsi',
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} tidak boleh kosong'
                    ]
                ],
                'ruas' => [
                    'label' => 'Ruas',
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} tidak boleh kosong'
                    ]
                ],
                'wilayah' => [
                    'label' => 'Wilayah',
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} tidak boleh kosong'
                    ]
                ]
            ]);

            if (!$valid) {
                $msg = [
                    'error' => [
                        'errorKode' => $validation->getError('kode'),
                        'errorDeskripsi' => $validation->getError('deskripsi'),
                        'errorRuas' => $validation->getError('ruas'),
                        'errorWilayah' => $validation->getError('wilayah')
                    ]
                ];
            } else {
                $data = [
                    'kode_lokasi' => $kode,
                    'deskripsi_lokasi' => $deskripsi,
                    'ruas' => $ruas,
                    'wilayah' => $wilayah,
                    'km' => $km,
                    'sta' => $sta,
                    'jalur' => $jalur,
                    'kondisi_jalanan' => $kondisi,
                    'alinyemen' => $alinyemen,
                    'latitude' => $latitude,
                    'longitude' => $longitude,
                    'kode_pt' => $this->session->get('kode_pt'),
                    'created_by' => $this->session->get('user_id'),
                    'updated_by' => $this->session->get('user_id')
                ];
                $this->datasta->insert($data);
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

            $this->datasta->delete($id);
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

            $row = $this->datasta->find($id);
            $data = [
                'id' => $row['id_sta'],
                'kode' => $row['kode_lokasi'],
                'deskripsi' => $row['deskripsi_lokasi'],
                'ruas' => $row['ruas'],
                'wilayah' => $row['wilayah'],
                'km' => $row['km'],
                'sta' => $row['sta'],
                'jalur' => $row['jalur'],
                'kondisi' => $row['kondisi_jalanan'],
                'alinyemen' => $row['alinyemen'],
                'latitude' => $row['latitude'],
                'longitude' => $row['longitude']
            ];

            $msg = [
                'data' => view('sta/modaledit', $data)
            ];

            echo json_encode($msg);
        }
    }

    public function updatedata()
    {
        if ($this->request->isAJAX()) {
            $id = $this->request->getVar('id');
            $kode = $this->request->getVar('kode');
            $deskripsi = $this->request->getVar('deskripsi');
            $ruas = $this->request->getVar('ruas');
            $wilayah = $this->request->getVar('wilayah');
            $km = $this->request->getVar('km');
            $sta = $this->request->getVar('sta');
            $jalur = $this->request->getVar('jalur');
            $kondisi = $this->request->getVar('kondisi');
            $alinyemen = $this->request->getVar('alinyemen');
            $latitude = $this->request->getVar('latitude');
            $longitude = $this->request->getVar('longitude');

            $validation =  \Config\Services::validation();

            $valid = $this->validate([
                'kode' => [
                    'label' => 'Kode',
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} tidak boleh kosong',
                    ]
                ],
                'deskripsi' => [
                    'label' => 'Deskripsi',
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} tidak boleh kosong'
                    ]
                ],
                'ruas' => [
                    'label' => 'Ruas',
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} tidak boleh kosong'
                    ]
                ],
                'wilayah' => [
                    'label' => 'Wilayah',
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} tidak boleh kosong'
                    ]
                ]
            ]);

            if (!$valid) {
                $msg = [
                    'error' => [
                        'errorKode' => $validation->getError('kode'),
                        'errorDeskripsi' => $validation->getError('deskripsi'),
                        'errorRuas' => $validation->getError('ruas'),
                        'errorWilayah' => $validation->getError('wilayah')
                    ]
                ];
            } else {
                $data = [
                    'kode_lokasi' => $kode,
                    'deskripsi_lokasi' => $deskripsi,
                    'ruas' => $ruas,
                    'wilayah' => $wilayah,
                    'km' => $km,
                    'sta' => $sta,
                    'jalur' => $jalur,
                    'kondisi_jalanan' => $kondisi,
                    'alinyemen' => $alinyemen,
                    'latitude' => $latitude,
                    'longitude' => $longitude,
                    'kode_pt' => $this->session->get('kode_pt'),
                    'updated_by' => $this->session->get('user_id')
                ];
                $this->datasta->update($id, $data);
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

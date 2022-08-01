<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Datajadwalmobil;
use App\Models\Datamobil;
use App\Models\Datapetugas;
use \Hermawan\DataTables\DataTable;

class Jadwalmobil extends BaseController
{
    public function __construct()
    {
        $this->jadwalmobil = new Datajadwalmobil();
        $this->datamobil = new Datamobil();
        $this->datapetugas = new Datapetugas();
    }

    public function tampil()
    {
        return view('jadwalmobil/tampil');
    }

    public function listData()
    {
        if ($this->request->isAJAX()) {
            $db = \Config\Database::connect();

            $this->session = \Config\Services::session();
            $pt = $this->session->get('kode_pt');

            $builder = $db->table('pemakaian_mobil')
                ->select('id_pakai_mobil,tgl_pakai_mobil,kode_mobil,nama_mobil,a.nama_pt as nama_pt1, b.nama_pt as nama_pt2, c.nama_pt as nama_pt3, d.nama_pt as nama_pt4,shift_mobil,odo_awal,odo_akhir')
                ->join('master_mobil', 'id_mobil = mobil_id')
                ->join('master_petugas as a', 'a.id_pt = pemakaian_mobil.id_pt1')
                ->join('master_petugas as b', 'b.id_pt = pemakaian_mobil.id_pt2')
                ->join('master_petugas as c', 'c.id_pt = pemakaian_mobil.id_pt3')
                ->join('master_petugas as d', 'd.id_pt = pemakaian_mobil.id_pt4')
                ->where(['pemakaian_mobil.deleted_at' => null, 'pemakaian_mobil.kode_pt' => $pt])
                ->orderBy('tgl_pakai_mobil', 'desc');

            return DataTable::of($builder)
                ->addNumbering('no')
                ->add('aksi', function ($row) {
                    return "<button type=\"button\" class=\"btn btn-outline-success btn-sm\" onclick=\"edit('" . $row->id_pakai_mobil . "')\"><i class=\"fa fa-pencil-alt\"></i></button>
                    <button type=\"button\" class=\"btn btn-outline-danger btn-sm\" onclick=\"hapus('" . $row->id_pakai_mobil . "')\"><i class=\"fa fa-trash-alt\"></i></button>";
                })
                ->toJson(true);
        } else {
            echo "Maaf, halaman tidak ditemukan";
        }
    }

    public function formtambah()
    {
        if ($this->request->isAJAX()) {
            $data = [
                'datamobil' => $this->datamobil->tampilData(),
                'datapetugas' => $this->datapetugas->tampilPetugas()
            ];
            $msg = [
                'data' => view('jadwalmobil/modaltambah', $data)
            ];
            echo json_encode($msg);
        } else {
            exit('Maaf anda tidak dapat mengakses halaman ini');
        }
    }

    public function simpandata()
    {
        if ($this->request->isAJAX()) {
            $tglpakai = $this->request->getPost('tglpakai');
            $mobil = $this->request->getPost('mobil');
            $petugas1 = $this->request->getPost('petugas1');
            $petugas2 = $this->request->getPost('petugas2');
            $petugas3 = $this->request->getPost('petugas3');
            $petugas4 = $this->request->getPost('petugas4');
            $shift = $this->request->getPost('shift');
            $odoawal = $this->request->getPost('odoawal');
            $odoakhir = $this->request->getPost('odoakhir');

            $validation =  \Config\Services::validation();

            $valid = $this->validate([
                'mobil' => [
                    'label' => 'Mobil',
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} tidak boleh kosong',
                    ]
                ],
                'shift' => [
                    'label' => 'Shift',
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} tidak boleh kosong',
                    ]
                ],
                'petugas1' => [
                    'label' => 'Petugas 1',
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} tidak boleh kosong',
                    ]
                ],
            ]);

            if (!$valid) {
                $msg = [
                    'error' => [
                        'errorMobil' => $validation->getError('mobil'),
                        'errorPetugas1' => $validation->getError('petugas1'),
                        'errorShift' => $validation->getError('shift'),
                    ]
                ];
            } else {
                $data = [
                    'tgl_pakai_mobil' => $tglpakai,
                    'mobil_id' => $mobil,
                    'id_pt1' => $petugas1,
                    'id_pt2' => $petugas2,
                    'id_pt3' => $petugas3,
                    'id_pt4' => $petugas4,
                    'shift_mobil' => $shift,
                    'odo_awal' => $odoawal,
                    'odo_akhir' => $odoakhir,
                    'kode_pt' => $this->session->get('kode_pt'),
                    'created_by' => $this->session->get('user_id'),
                    'updated_by' => $this->session->get('user_id')
                ];
                $this->jadwalmobil->insert($data);
                // }

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

            $this->jadwalmobil->delete($id);
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

            $row = $this->jadwalmobil->find($id);
            $data = [
                'id' => $row['id_pakai_mobil'],
                'tglpakai' => $row['tgl_pakai_mobil'],
                'mobil' => $row['mobil_id'],
                'datamobil' => $this->datamobil->tampilData(),
                'id_pt1' => $row['id_pt1'],
                'id_pt2' => $row['id_pt2'],
                'id_pt3' => $row['id_pt3'],
                'id_pt4' => $row['id_pt4'],
                'datapetugas' => $this->datapetugas->tampilPetugas(),
                'shift' => $row['shift_mobil'],
                'odoawal' => $row['odo_awal'],
                'odoakhir' => $row['odo_akhir']
            ];

            $msg = [
                'data' => view('jadwalmobil/modaledit', $data)
            ];

            echo json_encode($msg);
        }
    }

    public function updatedata()
    {
        if ($this->request->isAJAX()) {
            $id = $this->request->getPost('id');
            $tglpakai = $this->request->getPost('tglpakai');
            $mobil = $this->request->getPost('mobil');
            $petugas1 = $this->request->getPost('petugas1');
            $petugas2 = $this->request->getPost('petugas2');
            $petugas3 = $this->request->getPost('petugas3');
            $petugas4 = $this->request->getPost('petugas4');
            $shift = $this->request->getPost('shift');
            $odoawal = $this->request->getPost('odoawal');
            $odoakhir = $this->request->getPost('odoakhir');

            $validation =  \Config\Services::validation();

            $valid = $this->validate([
                'mobil' => [
                    'label' => 'Mobil',
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} tidak boleh kosong',
                    ]
                ],
                'shift' => [
                    'label' => 'Shift',
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} tidak boleh kosong',
                    ]
                ],
                'petugas1' => [
                    'label' => 'Petugas 1',
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} tidak boleh kosong',
                    ]
                ],
            ]);

            if (!$valid) {
                $msg = [
                    'error' => [
                        'errorMobil' => $validation->getError('mobil'),
                        'errorPetugas1' => $validation->getError('petugas1'),
                        'errorShift' => $validation->getError('shift'),
                    ]
                ];
            } else {
                $data = [
                    'tgl_pakai_mobil' => $tglpakai,
                    'mobil_id' => $mobil,
                    'id_pt1' => $petugas1,
                    'id_pt2' => $petugas2,
                    'id_pt3' => $petugas3,
                    'id_pt4' => $petugas4,
                    'shift_mobil' => $shift,
                    'odo_awal' => $odoawal,
                    'odo_akhir' => $odoakhir,
                    'kode_pt' => $this->session->get('kode_pt'),
                    'updated_by' => $this->session->get('user_id')
                ];
                $this->jadwalmobil->update($id, $data);
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

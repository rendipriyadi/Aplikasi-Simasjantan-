<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Dataphini;
use App\Models\Datapetugas;
use \Hermawan\DataTables\DataTable;

class Petugashariini extends BaseController
{
    public function __construct()
    {
        $this->dataphini = new Dataphini();
        $this->datapetugas = new Datapetugas();
    }

    public function index()
    {
        return view('petugashariini/index');
    }

    public function listData()
    {
        if ($this->request->isAJAX()) {
            $db = \Config\Database::connect();
            $this->session = \Config\Services::session();
            $pt = $this->session->get('kode_pt');

            $builder = $db->table('petugas')
                ->select(' b.nama_pt as nama_pt2, c.nama_pt as nama_pt3, d.nama_pt as nama_pt4, e.nama_pt as nama_pt5, tgl_tugas, shift, id_pthariini')
                ->join('master_petugas as b', 'b.id_pt = petugas.id_pt1')
                ->join('master_petugas as c', 'c.id_pt = petugas.id_pt2')
                ->join('master_petugas as d', 'd.id_pt = petugas.id_pt3')
                ->join('master_petugas as e', 'e.id_pt = petugas.id_pt4')
                ->where(['petugas.deleted_at' => null, 'petugas.kode_pt' => $pt])
                ->orderBy('tgl_tugas', 'desc');

            return DataTable::of($builder)
                ->addNumbering('no')
                ->add('aksi', function ($row) {
                    return "<button type=\"button\" class=\"btn btn-outline-success btn-sm\" onclick=\"edit('" . $row->id_pthariini . "')\"><i class=\"fa fa-pencil-alt\"></i></button>
                    <button type=\"button\" class=\"btn btn-outline-danger btn-sm\" onclick=\"hapus('" . $row->id_pthariini . "')\"><i class=\"fa fa-trash-alt\"></i></button>";
                })
                ->toJson(true);
        } else {
            echo "Maaf, halaman tidak ditemukan";
        }
    }

    public function formedit()
    {
        if ($this->request->isAJAX()) {
            $id = $this->request->getVar('id');

            $row = $this->dataphini->find($id);
            $data = [
                'id' => $row['id_pthariini'],
                'id_pt1' => $row['id_pt1'],
                'id_pt2' => $row['id_pt2'],
                'id_pt3' => $row['id_pt3'],
                'id_pt4' => $row['id_pt4'],
                'datapetugas' => $this->datapetugas->tampilData(),
            ];

            $msg = [
                'data' => view('petugashariini/modaledit', $data)
            ];

            echo json_encode($msg);
        }
    }

    public function updatedata()
    {
        if ($this->request->isAJAX()) {
            $id = $this->request->getPost('id');
            $petugas1 = $this->request->getPost('petugas1');
            $petugas2 = $this->request->getPost('petugas2');
            $petugas3 = $this->request->getPost('petugas3');
            $petugas4 = $this->request->getPost('petugas4');

            $validation =  \Config\Services::validation();

            $valid = $this->validate([
                'petugas1' => [
                    'label' => 'Petugas 1',
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} tidak boleh kosong',
                    ]
                ]
            ]);

            if (!$valid) {
                $msg = [
                    'error' => [
                        'errorPetugas1' => $validation->getError('petugas1')
                    ]
                ];
            } else {
                $data = [
                    'id_pt1' => $petugas1,
                    'id_pt2' => $petugas2,
                    'id_pt3' => $petugas3,
                    'id_pt4' => $petugas4,
                    'kode_pt' => $this->session->get('kode_pt'),
                    'updated_by' => $this->session->get('user_id')
                ];

                $this->dataphini->update($id, $data);
                $msg = [
                    'sukses' => 'Data berhasil diupdate'
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

            $this->dataphini->delete($id);
            $msg = [
                'sukses' => 'Data berhasil dihapus'
            ];
            echo json_encode($msg);
        } else {
            exit('Maaf anda tidak dapat mengakses halaman ini');
        }
    }
}

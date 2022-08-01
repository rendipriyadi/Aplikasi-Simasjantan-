<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Datakejadian;
use App\Models\Datapenyebab;
use App\Models\Datatipe;
use App\Models\Datasta;
use App\Models\Datapenerimaanlaporan;
use App\Models\Datagangguan;
use App\Models\Datainformasi;
use App\Models\Datapetugas;
use App\Models\Datastatuskejadian;
use App\Models\Datamobilkorban;
use App\Models\Datajadwalmobil;
use App\Models\Datamobilpetugas;
use App\Models\Datadetaillaporan;
use App\Models\Datatindakankejadian;
use App\Models\ModelDataKejadian;
use App\Models\ModelDataLaporanKejadian;
use App\Models\DataKorban;
use Config\Services;

class Kejadian extends BaseController
{
    public function __construct()
    {
        $this->kejadian = new Datakejadian();
        $this->penyebab = new Datapenyebab();
        $this->tipe = new Datatipe();
        $this->sta = new Datasta();
        $this->penerimaanlaporan = new Datapenerimaanlaporan();
        $this->gangguan = new Datagangguan();
        $this->informasi = new Datainformasi();
        $this->petugas = new Datapetugas();
        $this->statuskejadian = new Datastatuskejadian();
        $this->mobilkorban = new Datamobilkorban();
        $this->jadwalmobil = new Datajadwalmobil();
        $this->mobilpetugas = new Datamobilpetugas();
        $this->detaillaporan = new Datadetaillaporan();
        $this->tindakankejadian = new Datatindakankejadian();
        $this->korban = new DataKorban();
    }

    public function index()
    {
        return view('kejadian/index');
    }

    public function listData()
    {
        $tglawal = $this->request->getPost('tglawal');
        $tglakhir = $this->request->getPost('tglakhir');

        $request = Services::request();
        $datamodel = new ModelDataKejadian($request);
        if ($request->getMethod(true) == 'POST') {
            $lists = $datamodel->get_datatables($tglawal, $tglakhir);
            $data = [];
            $no = $request->getPost("start");
            foreach ($lists as $list) {
                $no++;
                $row = [];

                $tombolDetail = "<button type=\"button\" class=\"btn btn-sm btn-outline-primary\" onclick=\"detail('" . sha1($list->id_kejadian) . "')\"><i class=\"fa fa-eye\"></i></button>";
                $tombolEdit = "<button type=\"button\" class=\"btn btn-sm btn-outline-success\" onclick=\"edit('" . sha1($list->id_kejadian) . "')\"><i class=\"fa fa-pencil-alt\"></i></button>";
                $tombolHapus = "<button type=\"button\" class=\"btn btn-sm btn-outline-danger\" onclick=\"hapus('" . $list->id_kejadian . "')\"><i class=\"fa fa-trash-alt\"></i></button>";

                $row[] = $no;
                $row[] = $list->no_laporan;
                $row[] = date('d-m-Y H:i', strtotime($list->tgl_laporan));
                $row[] = $list->kategori_laporan;
                $row[] = $list->tipe_kejadian;
                $row[] = date('d-m-Y H:i', strtotime($list->waktu_kejadian));
                $row[] = $list->deskripsi_status;
                $row[] = $list->cuaca_kejadian;
                $row[] = $list->kode_lokasi;
                $row[] = $list->ruas;
                $row[] = $list->lajur_kejadian;
                $row[] = $tombolDetail . " " . $tombolEdit . " " . $tombolHapus;
                $data[] = $row;
            }
            $output = [
                "draw" => $request->getPost('draw'),
                "recordsTotal" => $datamodel->count_all($tglawal, $tglakhir),
                "recordsFiltered" => $datamodel->count_filtered($tglawal, $tglakhir),
                "data" => $data
            ];
            echo json_encode($output);
        }
    }

    public function input()
    {
        $data = [
            'penyebab' => $this->penyebab->findAll(),
            'tipe' => $this->tipe->findAll(),
            'gangguan' => $this->gangguan->findAll(),
        ];
        return view('kejadian/forminput', $data);
    }

    public function cariDataSta()
    {
        if ($this->request->isAJAX()) {
            $data = [
                'datasta' => $this->sta->tampilData()
            ];
            $msg = [
                'data' => view('kejadian/modalcarista', $data)
            ];

            echo json_encode($msg);
        } else {
            echo "Maaf, halaman tidak ditemukan";
        }
    }

    public function ambilDataSta()
    {
        if ($this->request->isAJAX()) {
            $id = $this->request->getPost('id');

            $ambilData = $this->sta->find($id);

            if ($ambilData == null) {
                $msg = [
                    'error' => 'Data tidak ditemukan'
                ];
            } else {
                $data = [
                    'sta' => $ambilData['kode_lokasi'],
                    'keterangan' => $ambilData['deskripsi_lokasi'],
                    'ruas' => $ambilData['ruas'],
                    'wilayah' => $ambilData['wilayah']
                ];
                $msg = [
                    'sukses' => $data
                ];
            }

            echo json_encode($msg);
        } else {
            echo "Maaf, halaman tidak ditemukan";
        }
    }

    public function cariDataLaporan()
    {
        if ($this->request->isAJAX()) {
            $data = [
                'datapenerimaanlaporan' => $this->penerimaanlaporan->findAll()
            ];

            $msg = [
                'data' => view('kejadian/modalcarilaporan', $data)
            ];

            echo json_encode($msg);
        } else {
            echo "Maaf, halaman tidak ditemukan";
        }
    }

    public function laporanTerkait()
    {
        if ($this->request->isAJAX()) {
            $id = $this->request->getPost('idkejadian');

            $rowData = $this->kejadian->find($id);
            $data = [
                'idkejadian' => $rowData['id_kejadian'],
                'datapenerimaanlaporan' => $this->penerimaanlaporan->findAll()
            ];

            $msg = [
                'data' => view('kejadian/modallaporanterkait', $data)
            ];

            echo json_encode($msg);
        } else {
            echo "Maaf, halaman tidak ditemukan";
        }
    }

    public function tampilDataLaporan()
    {

        if ($this->request->isAJAX()) {
            $id = $this->request->getPost('idlaporanterkait');
            $idkejadian = $this->request->getPost('idkejadian');

            $this->penerimaanlaporan->update($id, [
                'kejadian_id' => $idkejadian
            ]);

            $this->detaillaporan->insert([
                'laporan_id' => $id,
                'kejadian_id' => $idkejadian,
                'kode_pt' => $this->session->get('kode_pt'),
            ]);

            $dataLaporan = $this->detaillaporan->tampil($idkejadian);
            $data = [
                'tampildata' => $dataLaporan
            ];


            $msg = [
                'sukses' => 'Data berhasil ditambahkan',
                'data' => view('kejadian/detaillaporan', $data)
            ];

            echo json_encode($msg);
        } else {
            echo "Maaf, halaman tidak ditemukan";
        }
    }

    public function tampilDataLaporanHapus()
    {

        if ($this->request->isAJAX()) {
            $idkejadian = $this->request->getPost('idkejadian');

            $dataLaporan = $this->detaillaporan->tampil($idkejadian);
            $data = [
                'tampildata' => $dataLaporan
            ];


            $msg = [
                'data' => view('kejadian/detaillaporan', $data)
            ];

            echo json_encode($msg);
        } else {
            echo "Maaf, halaman tidak ditemukan";
        }
    }

    public function hapusDetailLaporan()
    {
        if ($this->request->isAJAX()) {
            $id = $this->request->getPost('id');

            $this->detaillaporan->delete($id);

            $msg = [
                'sukses' => 'Data berhasil dihapus'
            ];
            echo json_encode($msg);
        } else {
            exit('Maaf anda tidak dapat mengakses halaman ini');
        }
    }

    public function listDataLaporan()
    {
        $tglawal = $this->request->getPost('tglawal');
        $tglakhir = $this->request->getPost('tglakhir');

        $request = Services::request();
        $datamodel = new ModelDataLaporanKejadian($request);
        if ($request->getMethod(true) == 'POST') {
            $lists = $datamodel->get_datatables($tglawal, $tglakhir);
            $data = [];
            $no = $request->getPost("start");
            foreach ($lists as $list) {
                $no++;
                $row = [];

                $tombolPilih = "<button type=\"button\" class=\"btn btn-outline-primary btn-sm\" onclick=\"pilih('" . $list->id_pelapor . "')\">Pilih</i></button>";

                $row[] = $no;
                $row[] = $tombolPilih;
                $row[] = $list->no_laporan;
                $row[] = date('d-m-Y H:i', strtotime($list->tgl_laporan));
                $row[] = $list->nama_pelapor;
                $row[] = $list->kategori_laporan;
                $row[] = $list->kontak_pelapor;
                $row[] = $list->notlp_pelapor;
                $row[] = $list->deskripsi_informasi;
                $row[] = $list->deskripsi_gangguan;
                $data[] = $row;
            }
            $output = [
                "draw" => $request->getPost('draw'),
                "recordsTotal" => $datamodel->count_all($tglawal, $tglakhir),
                "recordsFiltered" => $datamodel->count_filtered($tglawal, $tglakhir),
                "data" => $data
            ];
            echo json_encode($output);
        }
    }

    public function ambilDataLaporan()
    {
        if ($this->request->isAJAX()) {
            $id = $this->request->getPost('idlaporan');

            $cariData = $this->penerimaanlaporan->tampildata($id);
            $ambilData = $cariData->getRowArray();

            if ($ambilData == null) {
                $msg = [
                    'error' => 'Data tidak ditemukan'
                ];
            } else {
                $data = [
                    'nolaporan' => $ambilData['no_laporan'],
                ];

                $this->kejadian->insert([
                    'laporan_id' => $id,
                    'created_by' => $this->session->get('user_id'),
                    'updated_by' => $this->session->get('user_id')
                ]);

                $rowData = $this->kejadian->ambilDataTerakhir()->getRowArray();

                $msg = [
                    'sukses' => $data,
                    'idkejadian' => $rowData['id_kejadian']
                ];
            }

            echo json_encode($msg);
        } else {
            echo "Maaf, halaman tidak ditemukan";
        }
    }

    public function formstatus()
    {
        if ($this->request->isAJAX()) {
            $id = $this->request->getPost('idkejadian');

            $rowData = $this->kejadian->find($id);
            $data = [
                'idkejadian' => $rowData['id_kejadian'],
            ];
            $msg = [
                'data' => view('kejadian/formstatus', $data)
            ];
            echo json_encode($msg);
        } else {
            exit('Maaf anda tidak dapat mengakses halaman ini');
        }
    }

    public function simpanstatus()
    {
        if ($this->request->isAJAX()) {
            $idkejadian = $this->request->getPost('idkejadian');
            $status = $this->request->getVar('status');
            $waktu = $this->request->getVar('waktu');

            $validation =  \Config\Services::validation();

            $valid = $this->validate([
                'status' => [
                    'label' => 'Status',
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Status tidak boleh kosong'
                    ]
                ],
            ]);

            if (!$valid) {
                $msg = [
                    'error' => [
                        'errorStatus' => $validation->getError('status'),
                    ]
                ];
            } else {
                $data = [
                    'kejadian_id' => $idkejadian,
                    'deskripsi_status' => $status,
                    'waktu' => $waktu,
                    'created_by' => $this->session->get('user_id'),
                    'updated_by' => $this->session->get('user_id')
                ];
                $this->statuskejadian->insert($data);

                $rowData = $this->statuskejadian->ambilDataTerakhir()->getRowArray();
                $msg = [
                    'sukses' => 'Status Berhasil Diupdate',
                    'idstatus' => $rowData['id_status'],
                    'status' => $rowData['deskripsi_status'],
                    'waktu' => date('Y-m-d\TH:i', strtotime($rowData['waktu'])),
                ];
            }
            echo json_encode($msg);
        } else {
            exit('Maaf anda tidak dapat mengakses halaman ini');
        }
    }

    public function formeditstatus()
    {
        if ($this->request->isAJAX()) {
            $id = $this->request->getPost('idstatus');

            $idkejadian = $this->request->getPost('idkejadian');

            $rowData = $this->kejadian->find($idkejadian);
            $row = $this->statuskejadian->find($id);
            $data = [
                'idstatus' => $row['id_status'],
                'idkejadian' => $rowData['id_kejadian'],
            ];

            $msg = [
                'data' => view('kejadian/formeditstatus', $data)
            ];

            echo json_encode($msg);
        }
    }

    public function updatestatus()
    {
        if ($this->request->isAJAX()) {
            $idstatus = $this->request->getPost('idstatus');
            $idkejadian = $this->request->getPost('idkejadian');
            $status = $this->request->getVar('status');
            $waktu = $this->request->getVar('waktu');

            $validation =  \Config\Services::validation();

            $valid = $this->validate([
                'status' => [
                    'label' => 'Status',
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Status tidak boleh kosong'
                    ]
                ],
            ]);

            if (!$valid) {
                $msg = [
                    'error' => [
                        'errorStatus' => $validation->getError('status'),
                    ]
                ];
            } else {
                $data = [
                    'kejadian_id' => $idkejadian,
                    'deskripsi_status' => $status,
                    'waktu' => $waktu,
                    'created_by' => $this->session->get('user_id'),
                    'updated_by' => $this->session->get('user_id')
                ];
                $this->statuskejadian->update($idstatus, $data);

                $rowData = $this->statuskejadian->ambilDataEditStatus($idstatus)->getRowArray();
                $msg = [
                    'sukses' => 'Status Berhasil Diupdate',
                    'idstatus' => $rowData['id_status'],
                    'status' => $rowData['deskripsi_status'],
                    'waktu' => date('Y-m-d\TH:i', strtotime($rowData['waktu'])),
                ];
            }
            echo json_encode($msg);
        } else {
            exit('Maaf anda tidak dapat mengakses halaman ini');
        }
    }

    public function formMobilPetugas()
    {
        if ($this->request->isAJAX()) {
            $id = $this->request->getPost('idkejadian');

            $rowData = $this->kejadian->find($id);
            $data = [
                'idkejadian' => $rowData['id_kejadian'],
                'datamobil' => $this->jadwalmobil->ambilData()
            ];
            $msg = [
                'data' => view('kejadian/formmobilpetugas', $data)
            ];
            echo json_encode($msg);
        } else {
            exit('Maaf anda tidak dapat mengakses halaman ini');
        }
    }

    public function ambilDataMobil()
    {
        if ($this->request->isAJAX()) {
            $id = $this->request->getPost('idmobil');

            $cariData = $this->jadwalmobil->tampildata($id);
            $ambilData = $cariData->getRowArray();

            if ($ambilData == null) {
                $msg = [
                    'error' => 'Data tidak ditemukan'
                ];
            } else {
                $data = [
                    'namapt1' => $ambilData['nama_pt1'],
                    'namapt2' => $ambilData['nama_pt2'],
                    'namapt3' => $ambilData['nama_pt3'],
                    'namapt4' => $ambilData['nama_pt4'],
                ];
                $msg = [
                    'sukses' => $data,
                ];
            }

            echo json_encode($msg);
        } else {
            echo "Maaf, halaman tidak ditemukan";
        }
    }

    public function simpanmobilpetugas()
    {
        if ($this->request->isAJAX()) {
            $idkejadian = $this->request->getPost('idkejadian');
            $mobil = $this->request->getPost('mobil');
            $waktu = $this->request->getPost('waktu');
            $catatan = $this->request->getPost('catatan');


            $validation =  \Config\Services::validation();

            $valid = $this->validate([
                'mobil' => [
                    'label' => 'Mobil',
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Mobil tidak boleh kosong'
                    ]
                ],
            ]);

            if (!$valid) {
                $msg = [
                    'error' => [
                        'errorMobil' => $validation->getError('mobil'),
                    ]
                ];
            } else {
                $data = [
                    'kejadian_id' => $idkejadian,
                    'pemakaian_mobil_id' => $mobil,
                    'waktu_tiba' => $waktu,
                    'catatan' => $catatan,
                    'kode_pt' => $this->session->get('kode_pt'),
                    'created_by' => $this->session->get('user_id'),
                    'updated_by' => $this->session->get('user_id')
                ];

                $this->mobilpetugas->insert($data);

                $msg = [
                    'sukses' => 'Data Berhasil Disimpan',
                ];
            }
            echo json_encode($msg);
        } else {
            exit('Maaf anda tidak dapat mengakses halaman ini');
        }
    }

    public function formEditMobilPetugas()
    {
        if ($this->request->isAJAX()) {
            $id = $this->request->getPost('id');

            $row = $this->mobilpetugas->find($id);
            $data = [
                'idmobil' => $row['id_mobil_petugas'],
                'idkejadian' => $row['kejadian_id'],
                'mobil' => $row['pemakaian_mobil_id'],
                'petugas1' => $row['pemakaian_mobil_id'],
                'petugas2' => $row['pemakaian_mobil_id'],
                'petugas3' => $row['pemakaian_mobil_id'],
                'petugas4' => $row['pemakaian_mobil_id'],
                'datamobil' => $this->jadwalmobil->dataEdit(),
                'waktu' =>  date('Y-m-d\TH:i', strtotime($row['waktu_tiba'])),
                'catatan' => $row['catatan'],
            ];

            $msg = [
                'data' => view('kejadian/formeditmobilpetugas', $data)
            ];

            echo json_encode($msg);
        }
    }

    public function updateMobilPetugas()
    {
        if ($this->request->isAJAX()) {
            $idmobil = $this->request->getPost('idmobil');
            $idkejadian = $this->request->getPost('idkejadian');
            $mobil = $this->request->getPost('mobil');
            $waktu = $this->request->getPost('waktu');
            $catatan = $this->request->getPost('catatan');


            $validation =  \Config\Services::validation();

            $valid = $this->validate([
                'mobil' => [
                    'label' => 'Mobil',
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Mobil tidak boleh kosong'
                    ]
                ],
            ]);

            if (!$valid) {
                $msg = [
                    'error' => [
                        'errorMobil' => $validation->getError('mobil'),
                    ]
                ];
            } else {
                $data = [
                    'kejadian_id' => $idkejadian,
                    'pemakaian_mobil_id' => $mobil,
                    'waktu_tiba' => $waktu,
                    'catatan' => $catatan,
                    'kode_pt' => $this->session->get('kode_pt'),
                    'updated_by' => $this->session->get('user_id')
                ];

                $this->mobilpetugas->update($idmobil, $data);

                $msg = [
                    'sukses' => 'Data Berhasil Di Update',
                ];
            }
            echo json_encode($msg);
        } else {
            exit('Maaf anda tidak dapat mengakses halaman ini');
        }
    }

    public function tampilDataMobilPetugas()
    {

        if ($this->request->isAJAX()) {
            $idkejadian = $this->request->getPost('idkejadian');

            $dataLaporan = $this->mobilpetugas->tampil($idkejadian);
            $data = [
                'tampildata' => $dataLaporan
            ];


            $msg = [
                'data' => view('kejadian/detailmobilpetugas', $data)
            ];

            echo json_encode($msg);
        } else {
            echo "Maaf, halaman tidak ditemukan";
        }
    }

    public function hapusDetailMobilPetugas()
    {
        if ($this->request->isAJAX()) {
            $id = $this->request->getPost('id');

            $this->mobilpetugas->delete($id);

            $msg = [
                'sukses' => 'Data berhasil dihapus'
            ];
            echo json_encode($msg);
        } else {
            exit('Maaf anda tidak dapat mengakses halaman ini');
        }
    }

    public function formKorban()
    {
        if ($this->request->isAJAX()) {
            $id = $this->request->getPost('idkejadian');

            $rowData = $this->kejadian->find($id);
            $data = [
                'idkejadian' => $rowData['id_kejadian'],
            ];
            $msg = [
                'data' => view('kejadian/formkorban', $data)
            ];
            echo json_encode($msg);
        } else {
            exit('Maaf anda tidak dapat mengakses halaman ini');
        }
    }

    public function simpankorban()
    {
        if ($this->request->isAJAX()) {
            $idkejadian = $this->request->getPost('idkejadian');
            $nama = $this->request->getPost('nama');
            $jenkel = $this->request->getPost('jenkel');
            $notlp = $this->request->getPost('notlp');
            $nosim = $this->request->getPost('nosim');
            $noktp = $this->request->getPost('noktp');
            $alamat = $this->request->getPost('alamat');
            $catatan = $this->request->getVar('catatan');
            $kondisi = $this->request->getVar('kondisi');

            $validation =  \Config\Services::validation();

            $valid = $this->validate([
                'nama' => [
                    'label' => 'Nama',
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Nama tidak boleh kosong'
                    ]
                ],
                'foto' => [
                    'label' => 'Foto',
                    'rules' => 'mime_in[foto,image/png,image/jpeg,image/jpg]|ext_in[foto,png,jpeg,jpg]|is_image[foto]',
                    'errors' => [
                        'mime_in' => 'Yang anda upload bukan gambar',
                        'ext_in' => 'Yang anda upload bukan gambar',
                    ]
                ]
            ]);

            if (!$valid) {
                $msg = [
                    'error' => [
                        'errorNama' => $validation->getError('nama'),
                        'errorFoto' => $validation->getError('foto')
                    ]
                ];
            } else {

                $fileUpload = $_FILES['foto']['name'];

                if ($fileUpload != null) {
                    $namaFile = $idkejadian;
                    $fileGambar = $this->request->getFile('foto');
                    $fileGambar->move('file/korban', $namaFile . '.' . $fileGambar->getExtension());

                    $pathFile = 'file/korban/' . $fileGambar->getName();
                } else {
                    $pathFile = '';
                }

                $data = [
                    'kejadian_id' => $idkejadian,
                    'nama_korban' => $nama,
                    'jenkel_korban' => $jenkel,
                    'notlp_korban' => $notlp,
                    'sim_korban' => $nosim,
                    'ktp_korban' => $noktp,
                    'alamat_korban' => $alamat,
                    'catatan' => $catatan,
                    'kondisi_korban' => $kondisi,
                    'foto' => $pathFile,
                    'kode_pt' => $this->session->get('kode_pt'),
                    'created_by' => $this->session->get('user_id'),
                    'updated_by' => $this->session->get('user_id')
                ];
                $this->korban->insert($data);

                $msg = [
                    'sukses' => 'Data Berhasil Disimpan',
                ];
            }

            echo json_encode($msg);
        } else {
            exit('Maaf anda tidak dapat mengakses halaman ini');
        }
    }

    public function formEditKorban()
    {
        if ($this->request->isAJAX()) {
            $id = $this->request->getPost('id');

            $row = $this->korban->find($id);
            $data = [
                'idKorban' => $row['id_korban'],
                'idKejadian' => $row['kejadian_id'],
                'namaKorban' => $row['nama_korban'],
                'jenkelKorban' => $row['jenkel_korban'],
                'notlpKorban' => $row['notlp_korban'],
                'simKorban' => $row['sim_korban'],
                'ktpKorban' => $row['ktp_korban'],
                'alamatKorban' => $row['alamat_korban'],
                'kondisiKorban' => $row['kondisi_korban'],
                'catatanKorban' => $row['catatan'],
                'foto' => $row['foto']
            ];

            $msg = [
                'data' => view('kejadian/formeditkorban', $data)
            ];

            echo json_encode($msg);
        }
    }

    public function updateKorban()
    {
        if ($this->request->isAJAX()) {
            $idkorban = $this->request->getPost('idkorban');
            $idkejadian = $this->request->getPost('idkejadian');
            $nama = $this->request->getPost('nama');
            $jenkel = $this->request->getPost('jenkel');
            $notlp = $this->request->getPost('notlp');
            $nosim = $this->request->getPost('nosim');
            $noktp = $this->request->getPost('noktp');
            $alamat = $this->request->getPost('alamat');
            $catatan = $this->request->getVar('catatan');
            $kondisi = $this->request->getVar('kondisi');

            $validation =  \Config\Services::validation();

            $valid = $this->validate([
                'nama' => [
                    'label' => 'Nama',
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Nama tidak boleh kosong'
                    ]
                ],
                'foto' => [
                    'label' => 'Foto',
                    'rules' => 'mime_in[foto,image/png,image/jpeg,image/jpg]|ext_in[foto,png,jpeg,jpg]|is_image[foto]',
                    'errors' => [
                        'mime_in' => 'Yang anda upload bukan gambar',
                        'ext_in' => 'Yang anda upload bukan gambar',
                    ]
                ]
            ]);

            if (!$valid) {
                $msg = [
                    'error' => [
                        'errorNama' => $validation->getError('nama'),
                        'errorFoto' => $validation->getError('foto')
                    ]
                ];
            } else {

                $fileUpload = $_FILES['foto']['name'];
                $rowData = $this->korban->find($idkorban);
                $fileLama =  $rowData['foto'];

                if ($fileUpload != null) {
                    ($fileLama == '' || $fileLama == null) ? '' : unlink($fileLama);

                    $namaFile = $idkejadian;
                    $fileGambar = $this->request->getFile('foto');
                    $fileGambar->move('file/korban', $namaFile . '.' . $fileGambar->getExtension());

                    $pathFile = 'file/korban/' . $fileGambar->getName();
                } else {
                    $pathFile = $fileLama;
                }

                $data = [
                    'kejadian_id' => $idkejadian,
                    'nama_korban' => $nama,
                    'jenkel_korban' => $jenkel,
                    'notlp_korban' => $notlp,
                    'sim_korban' => $nosim,
                    'ktp_korban' => $noktp,
                    'alamat_korban' => $alamat,
                    'catatan' => $catatan,
                    'kondisi_korban' => $kondisi,
                    'foto' => $pathFile,
                    'kode_pt' => $this->session->get('kode_pt'),
                    'updated_by' => $this->session->get('user_id')
                ];
                $this->korban->update($idkorban, $data);

                $msg = [
                    'sukses' => 'Data Berhasil Diupdate',
                ];
            }

            echo json_encode($msg);
        } else {
            exit('Maaf anda tidak dapat mengakses halaman ini');
        }
    }

    public function tampilDataKorban()
    {

        if ($this->request->isAJAX()) {
            $idkejadian = $this->request->getPost('idkejadian');

            $dataLaporan = $this->korban->tampil($idkejadian);
            $data = [
                'tampildata' => $dataLaporan
            ];


            $msg = [
                'data' => view('kejadian/detailkorban', $data)
            ];

            echo json_encode($msg);
        } else {
            echo "Maaf, halaman tidak ditemukan";
        }
    }

    public function hapusDetailKorban()
    {
        if ($this->request->isAJAX()) {
            $id = $this->request->getPost('id');

            $cekdata = $this->korban->find($id);
            $fotolama = $cekdata['foto'];

            if ($fotolama != null) {
                unlink($fotolama);
            }


            $this->korban->delete($id);

            $msg = [
                'sukses' => 'Data berhasil dihapus'
            ];
            echo json_encode($msg);
        } else {
            exit('Maaf anda tidak dapat mengakses halaman ini');
        }
    }

    public function formMobilKorban()
    {
        if ($this->request->isAJAX()) {
            $id = $this->request->getPost('idkejadian');

            $rowData = $this->kejadian->find($id);
            $data = [
                'idkejadian' => $rowData['id_kejadian'],
            ];
            $msg = [
                'data' => view('kejadian/formmobilkorban', $data)
            ];
            echo json_encode($msg);
        } else {
            exit('Maaf anda tidak dapat mengakses halaman ini');
        }
    }

    public function simpanmobilkorban()
    {
        if ($this->request->isAJAX()) {
            $idkejadian = $this->request->getPost('idkejadian');
            $nama = $this->request->getPost('nama');
            $jenkel = $this->request->getPost('jenkel');
            $mobil = $this->request->getVar('mobil');
            $golongan = $this->request->getVar('golongan');
            $merek = $this->request->getVar('merek');
            $nopol = $this->request->getVar('nopol');
            $derek = $this->request->getVar('derek');
            $kondisi = $this->request->getVar('kondisi');
            $catatan = $this->request->getVar('catatan');

            $validation =  \Config\Services::validation();

            $valid = $this->validate([
                'nopol' => [
                    'label' => 'No Polisi',
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'No Polisi tidak boleh kosong'
                    ]
                ],
                'nama' => [
                    'label' => 'Nama Pengemudi',
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} tidak boleh kosong'
                    ]
                ],
                'jenkel' => [
                    'label' => 'Jenis Kelamin',
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} tidak boleh kosong'
                    ]
                ],
                'golongan' => [
                    'label' => 'Golongan Mobil',
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} tidak boleh kosong'
                    ]
                ],
                'foto' => [
                    'label' => 'Foto',
                    'rules' => 'mime_in[foto,image/png,image/jpeg,image/jpg]|ext_in[foto,png,jpeg,jpg]|is_image[foto]|max_size[foto, 2048]',
                    'errors' => [
                        'mime_in' => 'Yang anda upload bukan gambar',
                        'ext_in' => 'Yang anda upload bukan gambar',
                    ]
                ]
            ]);

            if (!$valid) {
                $msg = [
                    'error' => [
                        'errorNopol' => $validation->getError('nopol'),
                        'errorNama' => $validation->getError('nama'),
                        'errorJenkel' => $validation->getError('jenkel'),
                        'errorGolongan' => $validation->getError('golongan'),
                        'errorFoto' => $validation->getError('foto')
                    ]
                ];
            } else {

                $fileUpload = $_FILES['foto']['name'];

                if ($fileUpload != null) {
                    $namaFile = $idkejadian;
                    $fileGambar = $this->request->getFile('foto');
                    $fileGambar->move('file/mobil', $namaFile . '.' . $fileGambar->getExtension());

                    $pathFile = 'file/mobil/' . $fileGambar->getName();
                } else {
                    $pathFile = '';
                }

                $data = [
                    'kejadian_id' => $idkejadian,
                    'nama' => $nama,
                    'jenis_kelamin' => $jenkel,
                    'jenis_mobil_korban' => $mobil,
                    'golongan_mobil' => $golongan,
                    'merk_mobil_korban' => $merek,
                    'nopol_mobil_korban' => $nopol,
                    'mobil_derek' => $derek,
                    'kondisi_kendaraan' => $kondisi,
                    'catatan' => $catatan,
                    'foto' => $pathFile,
                    'kode_pt' => $this->session->get('kode_pt'),
                    'created_by' => $this->session->get('user_id'),
                    'updated_by' => $this->session->get('user_id')
                ];
                $this->mobilkorban->insert($data);

                $msg = [
                    'sukses' => 'Data Berhasil Disimpan',
                ];
            }

            echo json_encode($msg);
        } else {
            exit('Maaf anda tidak dapat mengakses halaman ini');
        }
    }

    public function formEditMobilKorban()
    {
        if ($this->request->isAJAX()) {
            $id = $this->request->getPost('id');

            $row = $this->mobilkorban->find($id);
            $data = [
                'idmobilkorban' => $row['id_mobil_korban'],
                'nama' => $row['nama'],
                'jenkel' => $row['jenis_kelamin'],
                'idkejadian' => $row['kejadian_id'],
                'jenismobil' => $row['jenis_mobil_korban'],
                'golongan' => $row['golongan_mobil'],
                'merk' => $row['merk_mobil_korban'],
                'nopol' => $row['nopol_mobil_korban'],
                'derek' => $row['mobil_derek'],
                'kondisi' => $row['kondisi_kendaraan'],
                'catatan' => $row['catatan'],
                'foto' => $row['foto']
            ];

            $msg = [
                'data' => view('kejadian/formeditmobilkorban', $data)
            ];

            echo json_encode($msg);
        }
    }

    public function updateMobilKorban()
    {
        if ($this->request->isAJAX()) {
            $idmobilkorban = $this->request->getPost('idmobilkorban');
            $idkejadian = $this->request->getPost('idkejadian');
            $nama = $this->request->getPost('nama');
            $jenkel = $this->request->getPost('jenkel');
            $mobil = $this->request->getVar('mobil');
            $golongan = $this->request->getVar('golongan');
            $merek = $this->request->getVar('merek');
            $nopol = $this->request->getVar('nopol');
            $derek = $this->request->getVar('derek');
            $kondisi = $this->request->getVar('kondisi');
            $catatan = $this->request->getVar('catatan');

            $validation =  \Config\Services::validation();

            $valid = $this->validate([
                'nopol' => [
                    'label' => 'No Polisi',
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'No Polisi tidak boleh kosong'
                    ]
                ],
                'nama' => [
                    'label' => 'Nama Pengemudi',
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} tidak boleh kosong'
                    ]
                ],
                'jenkel' => [
                    'label' => 'Jenis Kelamin',
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} tidak boleh kosong'
                    ]
                ],
                'golongan' => [
                    'label' => 'Golongan Mobil',
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} tidak boleh kosong'
                    ]
                ],
                'foto' => [
                    'label' => 'Foto',
                    'rules' => 'mime_in[foto,image/png,image/jpeg,image/jpg]|ext_in[foto,png,jpeg,jpg]|is_image[foto]|max_size[foto, 2048]',
                    'errors' => [
                        'mime_in' => 'Yang anda upload bukan gambar',
                        'ext_in' => 'Yang anda upload bukan gambar',
                    ]
                ]
            ]);

            if (!$valid) {
                $msg = [
                    'error' => [
                        'errorNopol' => $validation->getError('nopol'),
                        'errorNama' => $validation->getError('nama'),
                        'errorJenkel' => $validation->getError('jenkel'),
                        'errorGolongan' => $validation->getError('golongan'),
                        'errorFoto' => $validation->getError('foto')
                    ]
                ];
            } else {
                $fileUpload = $_FILES['foto']['name'];
                $rowData = $this->mobilkorban->find($idmobilkorban);
                $fileLama =  $rowData['foto'];

                if ($fileUpload != null) {
                    ($fileLama == '' || $fileLama == null) ? '' : unlink($fileLama);

                    $namaFile = $idkejadian;
                    $fileGambar = $this->request->getFile('foto');
                    $fileGambar->move('file/mobil', $namaFile . '.' . $fileGambar->getExtension());

                    $pathFile = 'file/mobil/' . $fileGambar->getName();
                } else {
                    $pathFile = $fileLama;
                }

                $data = [
                    'kejadian_id' => $idkejadian,
                    'nama' => $nama,
                    'jenis_kelamin' => $jenkel,
                    'jenis_mobil_korban' => $mobil,
                    'golongan_mobil' => $golongan,
                    'merk_mobil_korban' => $merek,
                    'nopol_mobil_korban' => $nopol,
                    'mobil_derek' => $derek,
                    'kondisi_kendaraan' => $kondisi,
                    'catatan' => $catatan,
                    'foto' => $pathFile,
                    'kode_pt' => $this->session->get('kode_pt'),
                    'updated_by' => $this->session->get('user_id')
                ];
                $this->mobilkorban->update($idmobilkorban, $data);

                $msg = [
                    'sukses' => 'Data Berhasil Di Update',
                ];
            }

            echo json_encode($msg);
        } else {
            exit('Maaf anda tidak dapat mengakses halaman ini');
        }
    }

    public function tampilDataMobilKorban()
    {

        if ($this->request->isAJAX()) {
            $idkejadian = $this->request->getPost('idkejadian');

            $dataLaporan = $this->mobilkorban->tampil($idkejadian);
            $data = [
                'tampildata' => $dataLaporan
            ];


            $msg = [
                'data' => view('kejadian/detailmobilkorban', $data)
            ];

            echo json_encode($msg);
        } else {
            echo "Maaf, halaman tidak ditemukan";
        }
    }

    public function hapusDetailMobilKorban()
    {
        if ($this->request->isAJAX()) {
            $id = $this->request->getPost('id');

            $cekdata = $this->mobilkorban->find($id);
            $fotolama = $cekdata['foto'];

            if ($fotolama != null) {
                unlink($fotolama);
            }


            $this->mobilkorban->delete($id);

            $msg = [
                'sukses' => 'Data berhasil dihapus'
            ];
            echo json_encode($msg);
        } else {
            exit('Maaf anda tidak dapat mengakses halaman ini');
        }
    }

    public function formTindakan()
    {
        if ($this->request->isAJAX()) {
            $id = $this->request->getPost('idkejadian');

            $rowData = $this->kejadian->find($id);
            $data = [
                'idkejadian' => $rowData['id_kejadian'],
            ];
            $msg = [
                'data' => view('kejadian/formtindakan', $data)
            ];
            echo json_encode($msg);
        } else {
            exit('Maaf anda tidak dapat mengakses halaman ini');
        }
    }

    public function simpantindakan()
    {
        if ($this->request->isAJAX()) {
            $idkejadian = $this->request->getPost('idkejadian');
            $tindakan = $this->request->getPost('tindakan');
            $waktu = $this->request->getPost('waktu');
            $catatan = $this->request->getPost('catatan');


            $validation =  \Config\Services::validation();

            $valid = $this->validate([
                'tindakan' => [
                    'label' => 'Tindakan',
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Tindakan tidak boleh kosong'
                    ]
                ],
            ]);

            if (!$valid) {
                $msg = [
                    'error' => [
                        'errorTindakan' => $validation->getError('tindakan'),
                    ]
                ];
            } else {
                $data = [
                    'kejadian_id' => $idkejadian,
                    'tindakan' => $tindakan,
                    'waktu_tindakan' => $waktu,
                    'catatan' => $catatan,
                    'created_by' => $this->session->get('user_id'),
                    'updated_by' => $this->session->get('user_id')
                ];

                $this->tindakankejadian->insert($data);

                $msg = [
                    'sukses' => 'Data Berhasil Disimpan',
                ];
            }
            echo json_encode($msg);
        } else {
            exit('Maaf anda tidak dapat mengakses halaman ini');
        }
    }

    public function formEditTindakan()
    {
        if ($this->request->isAJAX()) {
            $id = $this->request->getPost('id');

            $row = $this->tindakankejadian->find($id);
            $data = [
                'idtindakan' => $row['id_tindakan'],
                'idkejadian' => $row['kejadian_id'],
                'tindakan' => $row['tindakan'],
                'waktu' => date('Y-m-d\TH:i', strtotime($row['waktu_tindakan'])),
                'catatan' => $row['catatan'],
            ];

            $msg = [
                'data' => view('kejadian/formedittindakan', $data)
            ];

            echo json_encode($msg);
        }
    }

    public function updateTindakan()
    {
        if ($this->request->isAJAX()) {
            $idtindakan = $this->request->getPost('idtindakan');
            $idkejadian = $this->request->getPost('idkejadian');
            $tindakan = $this->request->getPost('tindakan');
            $waktu = $this->request->getPost('waktu');
            $catatan = $this->request->getPost('catatan');


            $validation =  \Config\Services::validation();

            $valid = $this->validate([
                'tindakan' => [
                    'label' => 'Tindakan',
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Tindakan tidak boleh kosong'
                    ]
                ],
            ]);

            if (!$valid) {
                $msg = [
                    'error' => [
                        'errorTindakan' => $validation->getError('tindakan'),
                    ]
                ];
            } else {
                $data = [
                    'kejadian_id' => $idkejadian,
                    'tindakan' => $tindakan,
                    'waktu_tindakan' => $waktu,
                    'catatan' => $catatan,
                    'updated_by' => $this->session->get('user_id')
                ];

                $this->tindakankejadian->update($idtindakan, $data);

                $msg = [
                    'sukses' => 'Data Berhasil Di Update',
                ];
            }
            echo json_encode($msg);
        } else {
            exit('Maaf anda tidak dapat mengakses halaman ini');
        }
    }

    public function tampilDataTindakan()
    {
        if ($this->request->isAJAX()) {
            $idkejadian = $this->request->getPost('idkejadian');

            $dataLaporan = $this->tindakankejadian->tampil($idkejadian);
            $data = [
                'tampildata' => $dataLaporan
            ];


            $msg = [
                'data' => view('kejadian/detailtindakan', $data)
            ];

            echo json_encode($msg);
        } else {
            echo "Maaf, halaman tidak ditemukan";
        }
    }

    public function hapusDetailTindakan()
    {
        if ($this->request->isAJAX()) {
            $id = $this->request->getPost('id');

            $this->tindakankejadian->delete($id);

            $msg = [
                'sukses' => 'Data berhasil dihapus'
            ];
            echo json_encode($msg);
        } else {
            exit('Maaf anda tidak dapat mengakses halaman ini');
        }
    }

    public function simpandata()
    {
        if ($this->request->isAJAX()) {
            $idkejadian = $this->request->getPost('idkejadian');
            $laporan = $this->request->getPost('idlaporan');
            $status = $this->request->getPost('idstatus');
            $tipekejadian = $this->request->getPost('tipe');
            $waktukejadian = $this->request->getPost('waktukejadian');
            $waktupenanganan = $this->request->getPost('waktupenanganan');
            $waktuselesai = $this->request->getPost('waktuselesai');
            $cuaca = $this->request->getPost('cuaca');
            $harilibur = $this->request->getPost('harilibur');
            $lokasi = $this->request->getPost('id');
            $lajur = $this->request->getPost('lajur');
            $penyebab = $this->request->getPost('penyebab');
            $lokasitabrakan = $this->request->getPost('lokasi');
            $tipetabrakan = $this->request->getPost('tipeTabrakan');
            $lalulintas = $this->request->getPost('lalulintas');
            $gangguan = $this->request->getPost('gangguan');
            $posisi = $this->request->getPost('posisi');
            $keterangan = $this->request->getPost('keterangan');

            $validation =  \Config\Services::validation();

            $valid = $this->validate([
                'sta' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Lokasi kejadian harus diisi'
                    ]
                ],
                'nolaporan' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'No. Laporan harus diisi'
                    ]
                ],
                'cuaca' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Cuaca harus diisi'
                    ]
                ],
                'file' => [
                    'label' => 'File',
                    'rules' => 'ext_in[file,png,jpeg,jpg,mp4]',
                    'errors' => [
                        'ext_in' => 'Ekstensi File Tidak diketahui',
                    ]
                ]
            ]);

            if (!$valid) {
                $msg = [
                    'error' => [
                        'errorSta' => $validation->getError('sta'),
                        'errorCuaca' => $validation->getError('cuaca'),
                        'errorNolaporan' => $validation->getError('nolaporan'),
                        'errorFile' => $validation->getError('file')
                    ]
                ];
            } else {
                $fileUpload = $_FILES['file']['name'];

                if ($fileUpload != null) {
                    $namaFile = $idkejadian;
                    $fileGambar = $this->request->getFile('file');
                    $fileGambar->move('file/kejadian', $namaFile . '.' . $fileGambar->getExtension());

                    $pathFile = 'file/kejadian/' . $fileGambar->getName();
                } else {
                    $pathFile = '';
                }

                $data = [
                    'laporan_id' => $laporan,
                    'status_id' => $status,
                    'tipe_kejadian' => $tipekejadian,
                    'waktu_kejadian' => $waktukejadian,
                    'waktu_penanganan' => $waktupenanganan,
                    'waktu_selesai_penanganan' => $waktuselesai,
                    'cuaca_kejadian' => $cuaca,
                    'harilibur_kejadian' => $harilibur,
                    'sta_id' => $lokasi,
                    'lajur_kejadian' => $lajur,
                    'penyebab_id' => $penyebab,
                    'lokasi_kejadian' => $lokasitabrakan,
                    'tipe_tabrakan_id' => $tipetabrakan,
                    'kondisi_jalan' => $lalulintas,
                    'kode_gangguan' => $gangguan,
                    'posisi_mobil' => $posisi,
                    'klr_kejadian' => $this->korban->hitungLukaRingan($idkejadian),
                    'klb_kejadian' => $this->korban->hitungLukaBerat($idkejadian),
                    'km_kejadian' => $this->korban->hitungMeninggal($idkejadian),
                    'ktr_kejadian' => $this->mobilkorban->hitungTidakRusak($idkejadian),
                    'krr_kejadian' => $this->mobilkorban->hitungRusakRingan($idkejadian),
                    'krb_kejadian' => $this->mobilkorban->hitungRusakBerat($idkejadian),
                    'keterangan' => $keterangan,
                    'file' => $pathFile,
                    'kode_pt' => $this->session->get('kode_pt'),
                    'created_by' => $this->session->get('user_id'),
                    'updated_by' => $this->session->get('user_id')
                ];

                $this->kejadian->update($idkejadian, $data);

                $msg = [
                    'sukses' => [
                        'link' => site_url('kejadian/index')
                    ]
                ];
            }

            echo json_encode($msg);
        } else {
            exit('Maaf, halaman tidak ditemukan');
        }
    }

    public function hapus()
    {
        if ($this->request->isAJAX()) {
            $id = $this->request->getVar('id');

            $cekdata = $this->kejadian->find($id);
            $fotolama = $cekdata['file'];

            if ($fotolama != null) {
                unlink($fotolama);
            }

            $this->kejadian->delete($id);
            $msg = [
                'sukses' => 'Data berhasil dihapus'
            ];
            echo json_encode($msg);
        } else {
            exit('Maaf anda tidak dapat mengakses halaman ini');
        }
    }

    public function detailKejadian($id)
    {
        $cekId = $this->kejadian->cekId($id);

        if ($cekId->getNumRows() > 0) {
            $row = $cekId->getRowArray();
            $data = [
                'idkejadian' => $row['id_kejadian'],
                'nolaporan' => $row['laporan_id'],
                'datalaporan' => $this->penerimaanlaporan->datatampil(),
                'status' => $row['status_id'],
                'datastatus' => $this->statuskejadian->findAll(),
                'tipe' => $row['tipe_kejadian'],
                'waktukejadian' => $row['waktu_kejadian'],
                'waktupenanganan' => $row['waktu_penanganan'],
                'waktuselesai' => $row['waktu_selesai_penanganan'],
                'cuaca' => $row['cuaca_kejadian'],
                'harilibur' => $row['harilibur_kejadian'],
                'sta' => $row['sta_id'],
                'keteranganlokasi' => $row['sta_id'],
                'ruas' => $row['sta_id'],
                'wilayah' => $row['sta_id'],
                'datasta' => $this->sta->findAll(),
                'lajur' => $row['lajur_kejadian'],
                'penyebab' => $row['penyebab_id'],
                'penyebabTab' => $this->penyebab->findAll(),
                'lokasi' => $row['lokasi_kejadian'],
                'tipetabrakan' => $row['tipe_tabrakan_id'],
                'tipeTab' => $this->tipe->findAll(),
                'lalulintas' => $row['kondisi_jalan'],
                'gangguan' => $row['kode_gangguan'],
                'gangguanTab' => $this->gangguan->findAll(),
                'posisi' => $row['posisi_mobil'],
                'keterangan' => $row['keterangan'],
                'file' => $row['file']

            ];
            return view('kejadian/detailkejadian', $data);
        } else {
            exit('Maaf, Data tidak ditemukan');
        }
    }

    public function editKejadian($id)
    {
        $cekId = $this->kejadian->cekId($id);

        if ($cekId->getNumRows() > 0) {
            $row = $cekId->getRowArray();
            $data = [
                'idkejadian' => $row['id_kejadian'],
                'nolaporan' => $row['laporan_id'],
                'datalaporan' => $this->penerimaanlaporan->datatampil(),
                'status' => $row['status_id'],
                'datastatus' => $this->statuskejadian->findAll(),
                'tipe' => $row['tipe_kejadian'],
                'waktukejadian' => $row['waktu_kejadian'],
                'waktupenanganan' => $row['waktu_penanganan'],
                'waktuselesai' => $row['waktu_selesai_penanganan'],
                'cuaca' => $row['cuaca_kejadian'],
                'harilibur' => $row['harilibur_kejadian'],
                'sta' => $row['sta_id'],
                'keteranganlokasi' => $row['sta_id'],
                'ruas' => $row['sta_id'],
                'wilayah' => $row['sta_id'],
                'datasta' => $this->sta->findAll(),
                'lajur' => $row['lajur_kejadian'],
                'penyebab' => $row['penyebab_id'],
                'penyebabTab' => $this->penyebab->findAll(),
                'lokasi' => $row['lokasi_kejadian'],
                'tipetabrakan' => $row['tipe_tabrakan_id'],
                'tipeTab' => $this->tipe->findAll(),
                'lalulintas' => $row['kondisi_jalan'],
                'gangguan' => $row['kode_gangguan'],
                'gangguanTab' => $this->gangguan->findAll(),
                'posisi' => $row['posisi_mobil'],
                'keterangan' => $row['keterangan'],
                'file' => $row['file']

            ];
            return view('kejadian/editkejadian', $data);
        } else {
            exit('Maaf, Data tidak ditemukan');
        }
    }

    public function updatedata()
    {
        if ($this->request->isAJAX()) {
            $idkejadian = $this->request->getPost('idkejadian');
            $laporan = $this->request->getPost('idlaporan');
            $status = $this->request->getPost('status');
            $tipekejadian = $this->request->getPost('tipe');
            $waktukejadian = $this->request->getPost('waktukejadian');
            $waktupenanganan = $this->request->getPost('waktupenanganan');
            $waktuselesai = $this->request->getPost('waktuselesai');
            $cuaca = $this->request->getPost('cuaca');
            $harilibur = $this->request->getPost('harilibur');
            $lokasi = $this->request->getPost('id');
            $lajur = $this->request->getPost('lajur');
            $penyebab = $this->request->getPost('penyebab');
            $lokasitabrakan = $this->request->getPost('lokasi');
            $tipetabrakan = $this->request->getPost('tipeTabrakan');
            $lalulintas = $this->request->getPost('lalulintas');
            $gangguan = $this->request->getPost('gangguan');
            $posisi = $this->request->getPost('posisi');
            $keterangan = $this->request->getPost('keterangan');

            $validation =  \Config\Services::validation();

            $valid = $this->validate([
                'sta' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Lokasi kejadian harus diisi'
                    ]
                ],
                'nolaporan' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'No. Laporan harus diisi'
                    ]
                ],
                'cuaca' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Cuaca harus diisi'
                    ]
                ],
            ]);

            if (!$valid) {
                $msg = [
                    'error' => [
                        'errorSta' => $validation->getError('sta'),
                        'errorCuaca' => $validation->getError('cuaca'),
                        'errorNolaporan' => $validation->getError('nolaporan')
                    ]
                ];
            } else {
                $fileUpload = $_FILES['file']['name'];

                $rowData = $this->kejadian->find($idkejadian);
                $fileLama =  $rowData['file'];

                if ($fileUpload != null) {
                    ($fileLama == '' || $fileLama == null) ? '' : unlink($fileLama);

                    $namaFile = $idkejadian;
                    $fileGambar = $this->request->getFile('file');
                    $fileGambar->move('file/kejadian', $namaFile . '.' . $fileGambar->getExtension());

                    $pathFile = 'file/kejadian/' . $fileGambar->getName();
                } else {
                    $pathFile = $fileLama;
                }

                $data = [
                    'laporan_id' => $laporan,
                    'status_kejadian' => $status,
                    'tipe_kejadian' => $tipekejadian,
                    'waktu_kejadian' => $waktukejadian,
                    'waktu_penanganan' => $waktupenanganan,
                    'waktu_selesai_penanganan' => $waktuselesai,
                    'cuaca_kejadian' => $cuaca,
                    'harilibur_kejadian' => $harilibur,
                    'sta_id' => $lokasi,
                    'lajur_kejadian' => $lajur,
                    'penyebab_id' => $penyebab,
                    'lokasi_kejadian' => $lokasitabrakan,
                    'tipe_tabrakan_id' => $tipetabrakan,
                    'kondisi_jalan' => $lalulintas,
                    'kode_gangguan' => $gangguan,
                    'posisi_mobil' => $posisi,
                    'klr_kejadian' => $this->korban->hitungLukaRingan($idkejadian),
                    'klb_kejadian' => $this->korban->hitungLukaBerat($idkejadian),
                    'km_kejadian' => $this->korban->hitungMeninggal($idkejadian),
                    'ktr_kejadian' => $this->mobilkorban->hitungTidakRusak($idkejadian),
                    'krr_kejadian' => $this->mobilkorban->hitungRusakRingan($idkejadian),
                    'krb_kejadian' => $this->mobilkorban->hitungRusakBerat($idkejadian),
                    'keterangan' => $keterangan,
                    'file' => $pathFile,
                    'kode_pt' => $this->session->get('kode_pt'),
                    'updated_by' => $this->session->get('user_id')
                ];

                $this->kejadian->update($idkejadian, $data);

                $msg = [
                    'sukses' => [
                        'link' => site_url('kejadian/index')
                    ]
                ];
            }

            echo json_encode($msg);
        } else {
            exit('Maaf, halaman tidak ditemukan');
        }
    }
}

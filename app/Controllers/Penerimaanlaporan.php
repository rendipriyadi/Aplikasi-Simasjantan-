<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Datainformasi;
use App\Models\Datagangguan;
use App\Models\Datapenerimaanlaporan;
use App\Models\ModelDataLaporan;
use Config\Services;

class Penerimaanlaporan extends BaseController
{
    public function __construct()
    {
        $this->informasi = new Datainformasi();
        $this->gangguan = new Datagangguan();
        $this->penerimaanlaporan = new Datapenerimaanlaporan();
    }
    public function index()
    {
        return view('penerimaanlaporan/index');
    }

    public function listData()
    {
        $tglawal = $this->request->getPost('tglawal');
        $tglakhir = $this->request->getPost('tglakhir');

        $request = Services::request();
        $datamodel = new ModelDataLaporan($request);
        if ($request->getMethod(true) == 'POST') {
            $lists = $datamodel->get_datatables($tglawal, $tglakhir);
            $data = [];
            $no = $request->getPost("start");
            foreach ($lists as $list) {
                $no++;
                $row = [];

                $tombolDetail = "<button type=\"button\" class=\"btn btn-sm btn-outline-primary\" onclick=\"detail('" . sha1($list->id_pelapor) . "')\"><i class=\"fa fa-eye\"></i></button>";
                $tombolEdit = "<button type=\"button\" class=\"btn btn-sm btn-outline-success\" onclick=\"edit('" . sha1($list->id_pelapor) . "')\"><i class=\"fa fa-pencil-alt\"></i></button>";
                $tombolHapus = "<button type=\"button\" class=\"btn btn-sm btn-outline-danger\" onclick=\"hapus('" . $list->id_pelapor . "')\"><i class=\"fa fa-trash-alt\"></i></button>";

                $row[] = $no;
                $row[] = $list->no_laporan;
                $row[] = date('d-m-Y H:i', strtotime($list->tgl_laporan));
                $row[] = $list->nama_pelapor;
                $row[] = $list->kategori_laporan;
                $row[] = $list->kontak_pelapor;
                $row[] = $list->notlp_pelapor;
                $row[] = $list->deskripsi_informasi;
                $row[] = $list->deskripsi_gangguan;
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

    public function buatNo()
    {
        $tgl = date('Y-m-d');
        $query = $this->db->query("SELECT MAX(no_laporan) AS nopelapor FROM penerimaan_laporan WHERE DATE_FORMAT(tgl_laporan, '%Y-%m-%d') = '$tgl'");
        $hasil = $query->getRowArray();
        $data = $hasil['nopelapor'];

        $lastnourut = substr($data, -3);

        // nomor urut ditambah 1
        $nextnourut = intval($lastnourut) + 1;

        // membuat format nomor berikutnya
        $noLaporan = 'NKH' . date('dmy', strtotime($tgl)) . sprintf('%03s', $nextnourut);

        return $noLaporan;
    }

    public function inputLaporan()
    {
        $data = [
            'datainformasi' => $this->informasi->findAll(),
            'datagangguan' => $this->gangguan->findAll(),
            'nopelapor' => $this->buatNo()
        ];

        return view('penerimaanlaporan/forminput', $data);
    }

    public function simpandata()
    {
        if ($this->request->isAJAX()) {
            $nolaporan = $this->request->getVar('nolaporan');
            $tgllaporan = $this->request->getVar('tgllaporan');
            $kategorilaporan = $this->request->getVar('kategori');
            $informasilaporan = $this->request->getVar('informasi');
            $gangguanlaporan = $this->request->getVar('gangguan');
            $namapelapor = $this->request->getVar('nama');
            $kontakpelapor = $this->request->getVar('kontak');
            $keteranganlaporan = $this->request->getVar('keterangan');
            $notlp = $this->request->getVar('notlp');

            $validation =  \Config\Services::validation();

            $valid = $this->validate([
                'kategori' => [
                    'label' => 'Kategori',
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} tidak boleh kosong'
                    ]
                ],
                'informasi' => [
                    'label' => 'Informasi',
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} tidak boleh kosong'
                    ]
                ],
                'gangguan' => [
                    'label' => 'Gangguan',
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} tidak boleh kosong'
                    ]
                ],
                'nama' => [
                    'label' => 'Nama',
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} tidak boleh kosong'
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
                        'errorKategori' => $validation->getError('kategori'),
                        'errorInformasi' => $validation->getError('informasi'),
                        'errorGangguan' => $validation->getError('gangguan'),
                        'errorNama' => $validation->getError('nama'),
                        'errorFile' => $validation->getError('file')
                    ]
                ];
            } else {
                $fileUpload = $_FILES['file']['name'];

                if ($fileUpload != null) {
                    $namaFile = $nolaporan;
                    $fileGambar = $this->request->getFile('file');
                    $fileGambar->move('file/laporan', $namaFile . '.' . $fileGambar->getExtension());

                    $pathFile = 'file/laporan/' . $fileGambar->getName();
                } else {
                    $pathFile = '';
                }

                $data = [
                    'no_laporan' => $nolaporan,
                    'tgl_laporan' => $tgllaporan,
                    'kategori_laporan' => $kategorilaporan,
                    'informasi_id' => $informasilaporan,
                    'gangguan_id' => $gangguanlaporan,
                    'nama_pelapor' => $namapelapor,
                    'kontak_pelapor' => $kontakpelapor,
                    'keterangan_laporan' => $keteranganlaporan,
                    'notlp_pelapor' => $notlp,
                    'file' => $pathFile,
                    'kode_pt' => $this->session->get('kode_pt'),
                    'created_by' => $this->session->get('user_id'),
                    'updated_by' => $this->session->get('user_id')
                ];

                $this->penerimaanlaporan->insert($data);

                $msg = [
                    'sukses' => [
                        'link' => site_url('penerimaanlaporan/index')
                    ]
                ];
            }

            echo json_encode($msg);
        } else {
            exit('Maaf anda tidak dapat mengakses halaman ini');
        }
    }

    public function detailLaporan($id)
    {
        $cekId = $this->penerimaanlaporan->cekId($id);

        if ($cekId->getNumRows() > 0) {
            $row = $cekId->getRowArray();
            $data = [
                'id' => $row['id_pelapor'],
                'nolaporan' => $row['no_laporan'],
                'tgllaporan' => date('Y-m-d\TH:i', strtotime($row['tgl_laporan'])),
                'namapelapor' => $row['nama_pelapor'],
                'kategorilaporan' => $row['kategori_laporan'],
                'kontakpelapor' => $row['kontak_pelapor'],
                'notlppelapor' => $row['notlp_pelapor'],
                'informasilaporan' => $row['informasi_id'],
                'datainformasi' => $this->informasi->findAll(),
                'gangguanlaporan' => $row['gangguan_id'],
                'datagangguan' => $this->gangguan->findAll(),
                'keteranganlaporan' => $row['keterangan_laporan'],
                'file' => $row['file']
            ];
            return view('penerimaanlaporan/detaillaporan', $data);
        } else {
            exit('Maaf Data tidak ditemukan');
        }
    }

    public function hapus()
    {
        if ($this->request->isAJAX()) {
            $id = $this->request->getVar('id');

            $cekdata = $this->penerimaanlaporan->find($id);
            $fotolama = $cekdata['file'];

            if ($fotolama != null) {
                unlink($fotolama);
            }

            $this->penerimaanlaporan->delete($id);
            $msg = [
                'sukses' => 'Data berhasil dihapus'
            ];
            echo json_encode($msg);
        } else {
            exit('Maaf anda tidak dapat mengakses halaman ini');
        }
    }

    public function editLaporan($id)
    {
        $cekId = $this->penerimaanlaporan->cekId($id);

        if ($cekId->getNumRows() > 0) {
            $row = $cekId->getRowArray();
            $data = [
                'id' => $row['id_pelapor'],
                'nolaporan' => $row['no_laporan'],
                'tgllaporan' => date('Y-m-d\TH:i', strtotime($row['tgl_laporan'])),
                'namapelapor' => $row['nama_pelapor'],
                'kategorilaporan' => $row['kategori_laporan'],
                'kontakpelapor' => $row['kontak_pelapor'],
                'notlppelapor' => $row['notlp_pelapor'],
                'informasilaporan' => $row['informasi_id'],
                'datainformasi' => $this->informasi->findAll(),
                'gangguanlaporan' => $row['gangguan_id'],
                'datagangguan' => $this->gangguan->findAll(),
                'keteranganlaporan' => $row['keterangan_laporan'],
                'file' => $row['file']
            ];
            return view('penerimaanlaporan/editlaporan', $data);
        } else {
            exit('Maaf Data tidak ditemukan');
        }
    }

    public function updatedata()
    {
        if ($this->request->isAJAX()) {
            $id = $this->request->getVar('id');
            $nolaporan = $this->request->getVar('nolaporan');
            $tgllaporan = $this->request->getVar('tgllaporan');
            $kategorilaporan = $this->request->getVar('kategori');
            $informasilaporan = $this->request->getVar('informasi');
            $gangguanlaporan = $this->request->getVar('gangguan');
            $namapelapor = $this->request->getVar('nama');
            $kontakpelapor = $this->request->getVar('kontak');
            $keteranganlaporan = $this->request->getVar('keterangan');
            $notlp = $this->request->getVar('notlp');

            $validation =  \Config\Services::validation();

            $valid = $this->validate([
                'kategori' => [
                    'label' => 'Kategori',
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} tidak boleh kosong'
                    ]
                ],
                'informasi' => [
                    'label' => 'Informasi',
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} tidak boleh kosong'
                    ]
                ],
                'gangguan' => [
                    'label' => 'Gangguan',
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} tidak boleh kosong'
                    ]
                ],
                'nama' => [
                    'label' => 'Nama',
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} tidak boleh kosong'
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
                        'errorKategori' => $validation->getError('kategori'),
                        'errorInformasi' => $validation->getError('informasi'),
                        'errorGangguan' => $validation->getError('gangguan'),
                        'errorNama' => $validation->getError('nama'),
                        'errorFile' => $validation->getError('file')
                    ]
                ];
            } else {
                $fileUpload = $_FILES['file']['name'];

                $rowData = $this->penerimaanlaporan->find($id);
                $fileLama =  $rowData['file'];

                if ($fileUpload != null) {
                    ($fileLama == '' || $fileLama == null) ? '' : unlink($fileLama);

                    $namaFile = $nolaporan;
                    $fileGambar = $this->request->getFile('file');
                    $fileGambar->move('file/laporan', $namaFile . '.' . $fileGambar->getExtension());

                    $pathFile = 'file/laporan/' . $fileGambar->getName();
                } else {
                    $pathFile = $fileLama;
                }

                $data = [
                    'no_laporan' => $nolaporan,
                    'tgl_laporan' => $tgllaporan,
                    'kategori_laporan' => $kategorilaporan,
                    'informasi_id' => $informasilaporan,
                    'gangguan_id' => $gangguanlaporan,
                    'nama_pelapor' => $namapelapor,
                    'kontak_pelapor' => $kontakpelapor,
                    'keterangan_laporan' => $keteranganlaporan,
                    'notlp_pelapor' => $notlp,
                    'file' => $pathFile,
                    'kode_pt' => $this->session->get('kode_pt'),
                    'updated_by' => $this->session->get('user_id')
                ];

                $this->penerimaanlaporan->update($id, $data);

                $msg = [
                    'sukses' => [
                        'link' => site_url('penerimaanlaporan/index')
                    ]
                ];
            }

            echo json_encode($msg);
        } else {
            exit('Maaf anda tidak dapat mengakses halaman ini');
        }
    }
}

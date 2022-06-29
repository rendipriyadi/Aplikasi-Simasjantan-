<?php

namespace App\Controllers;

use App\Models\Datapetugas;

use App\Controllers\BaseController;

class Petugas extends BaseController
{
    public function __construct()
    {
        $this->datapetugas = new Datapetugas();
    }

    public function index()
    {
        $data = [
            'datapetugas' => $this->datapetugas->tampil()
        ];
        return view('petugas/index', $data);
    }

    public function formtambah()
    {
        if ($this->request->isAJAX()) {
            $msg = [
                'data' => view('petugas/modaltambah')
            ];
            echo json_encode($msg);
        } else {
            exit('Maaf anda tidak dapat mengakses halaman ini');
        }
    }

    public function simpandata()
    {
        if ($this->request->isAJAX()) {
            $nip = $this->request->getVar('nip');
            $nama = $this->request->getVar('nama');
            $jabatan = $this->request->getVar('jabatan');
            $notlp = $this->request->getVar('notlp');
            $nohp = $this->request->getVar('nohp');
            $email = $this->request->getVar('email');
            $status = $this->request->getVar('status');
            $namaats = $this->request->getVar('namaats');
            $alamat = $this->request->getVar('alamat');
            $kota = $this->request->getVar('kota');
            $kodepos = $this->request->getVar('kodepos');

            $validation =  \Config\Services::validation();


            $valid = $this->validate([
                'nip' => [
                    'label' => 'NIP',
                    'rules' => 'required|is_unique[master_petugas.nip_pt]',
                    'errors' => [
                        'required' => '{field} tidak boleh kosong',
                        'is_unique' => '{field} sudah ada'
                    ]
                ],
                'nama' => [
                    'label' => 'Nama',
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} tidak boleh kosong'
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
                        'errorNip' => $validation->getError('nip'),
                        'errorNama' => $validation->getError('nama'),
                        'errorFoto' => $validation->getError('foto')
                    ]
                ];
            } else {
                $fileUpload = $_FILES['foto']['name'];

                if ($fileUpload != null) {
                    $namaFile = $nama;
                    $fileGambar = $this->request->getFile('foto');
                    $fileGambar->move('file/petugas', $namaFile . '.' . $fileGambar->getExtension());

                    $pathFile = 'file/petugas/' . $fileGambar->getName();
                } else {
                    $pathFile = '';
                }

                $data = [
                    'nip_pt' => $nip,
                    'nama_pt' => $nama,
                    'jabatan_pt' => $jabatan,
                    'notlp_pt' => $notlp,
                    'nohp_pt' => $nohp,
                    'email_pt' => $email,
                    'status_pt' => $status,
                    'kode_pt' => $this->session->get('kode_pt'),
                    'nama_atasan_pt' => $namaats,
                    'alamat_pt' => $alamat,
                    'kota_pt' => $kota,
                    'kodepos_pt' => $kodepos,
                    'foto' => $pathFile,
                    'created_by' => $this->session->get('user_id'),
                    'updated_by' => $this->session->get('user_id')
                ];
                $this->datapetugas->insert($data);
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

            $this->datapetugas->delete($id);
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

            $row = $this->datapetugas->find($id);
            $data = [
                'id' => $row['id_pt'],
                'nip' => $row['nip_pt'],
                'nama' => $row['nama_pt'],
                'jabatan' => $row['jabatan_pt'],
                'notlp' => $row['notlp_pt'],
                'nohp' => $row['nohp_pt'],
                'email' => $row['email_pt'],
                'status' => $row['status_pt'],
                'namaats' => $row['nama_atasan_pt'],
                'alamat' => $row['alamat_pt'],
                'kota' => $row['kota_pt'],
                'kodepos' => $row['kodepos_pt'],
                'foto' => $row['foto']
            ];

            $msg = [
                'data' => view('petugas/modaledit', $data)
            ];

            echo json_encode($msg);
        }
    }

    public function updatedata()
    {
        if ($this->request->isAJAX()) {
            $id = $this->request->getVar('id');
            $nip = $this->request->getVar('nip');
            $nama = $this->request->getVar('nama');
            $jabatan = $this->request->getVar('jabatan');
            $notlp = $this->request->getVar('notlp');
            $nohp = $this->request->getVar('nohp');
            $email = $this->request->getVar('email');
            $status = $this->request->getVar('status');
            $namaats = $this->request->getVar('namaats');
            $alamat = $this->request->getVar('alamat');
            $kota = $this->request->getVar('kota');
            $kodepos = $this->request->getVar('kodepos');

            $validation =  \Config\Services::validation();

            $valid = $this->validate([
                'nip' => [
                    'label' => 'NIP',
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} tidak boleh kosong',
                    ]
                ],
                'nama' => [
                    'label' => 'Nama',
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} tidak boleh kosong'
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
                        'errorNip' => $validation->getError('nip'),
                        'errorNama' => $validation->getError('nama'),
                        'errorFoto' => $validation->getError('foto')
                    ]
                ];
            } else {
                $fileUpload = $_FILES['foto']['name'];

                $rowData = $this->datapetugas->find($id);
                $fileLama =  $rowData['foto'];

                if ($fileUpload != null) {
                    ($fileLama == '' || $fileLama == null) ? '' : unlink($fileLama);

                    $namaFile = $nama;
                    $fileGambar = $this->request->getFile('foto');
                    $fileGambar->move('file/petugas', $namaFile . '.' . $fileGambar->getExtension());

                    $pathFile = 'file/petugas/' . $fileGambar->getName();
                } else {
                    $pathFile = $fileLama;
                }

                $data = [
                    'nip_pt' => $nip,
                    'nama_pt' => $nama,
                    'jabatan_pt' => $jabatan,
                    'notlp_pt' => $notlp,
                    'nohp_pt' => $nohp,
                    'email_pt' => $email,
                    'status_pt' => $status,
                    'kode_pt' => $this->session->get('kode_pt'),
                    'nama_atasan_pt' => $namaats,
                    'alamat_pt' => $alamat,
                    'kota_pt' => $kota,
                    'kodepos_pt' => $kodepos,
                    'foto' => $pathFile,
                    'updated_by' => $this->session->get('user_id')
                ];
                $this->datapetugas->update($id, $data);
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

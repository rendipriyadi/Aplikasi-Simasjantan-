<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Datalogin;
use App\Models\Datapetugas;
use App\Models\Dataphini;

class Login extends BaseController
{
    public function __construct()
    {
        $this->datalogin = new Datalogin();
        $this->datapetugas = new Datapetugas();
        $this->dataphini = new Dataphini();
    }

    public function index()
    {
        if (session()->login) {
            return redirect()->to('layout');
        }
        return view('auth/login');
    }

    public function cekuser()
    {
        if ($this->request->isAjax()) {
            $username = $this->request->getPost('username');
            $password = $this->request->getPost('password');
            $shift = $this->request->getPost('shift');

            $validation = \Config\Services::validation();

            $valid = $this->validate([
                'username' => [
                    'label' => 'Username',
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} tidak boleh kosong',
                    ]
                ],
                'password' => [
                    'label' => 'Password',
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
            ]);

            if (!$valid) {
                $msg = [
                    'error' => [
                        'username' => $validation->getError('username'),
                        'password' => $validation->getError('password'),
                        'shift' => $validation->getError('shift'),
                    ]
                ];
            } else {

                $modeldatalogin = new Datalogin();

                $cekUserLogin = $modeldatalogin->where('username', $username)->first();
                $ambilData = $modeldatalogin->findAll();

                if ($cekUserLogin == null) {
                    $msg = [
                        'error' => [
                            'username' => 'Username tidak terdaftar'
                        ]
                    ];
                } else {
                    $passwordUser = $cekUserLogin['password'];
                    if (password_verify($password, $passwordUser)) {
                        // simpan session
                        $simpan_session = [
                            'login' => true,
                            'shift' => $shift,
                            'user_id' => $cekUserLogin['user_id'],
                            'username' => $username,
                            'name' => $cekUserLogin['name'],
                            'kode_pt' => $cekUserLogin['kode_pt'],
                            'level_user' => $cekUserLogin['level_user'],
                        ];

                        session()->set($simpan_session);

                        $this->datalogin->update(['user_id' => $cekUserLogin['user_id']], ['shift' => $shift]);

                        if (date('H:i:s') >= '00:00:00' && date('H:i:s') <= '07:00:00') {
                            $this->dataphini->where('tgl_tugas',  date('Y-m-d', strtotime('-1 days')))->first();

                            $msg = [
                                'sukses' => [
                                    'link' => site_url('layout/index')
                                ]
                            ];
                        } else {
                            $tgltugas = date('Y-m-d');
                            $datashift = $this->session->get('shift');
                            $pt = $this->session->get('kode_pt');

                            $where['tgl_tugas'] = $tgltugas;
                            $where['shift'] = $datashift;
                            $where['kode_pt'] = $pt;

                            $cekShift = $this->dataphini->where($where)->first();

                            if ($cekShift === null) {
                                $data = [
                                    'datapetugas' => $this->datapetugas->tampilData()
                                ];

                                $msg = [
                                    'gagal' => view('auth/petugas', $data)
                                ];
                            } else {
                                $msg = [
                                    'sukses' => [
                                        'link' => site_url('layout/index')
                                    ]
                                ];
                            }
                        }
                    } else {
                        $msg = [
                            'error' => [
                                'password' => 'Password anda salah'
                            ]
                        ];
                    }
                }
            }
            echo json_encode($msg);
        }
    }

    public function keluar()
    {
        $this->session->destroy();
        return redirect()->to('login/index');
    }

    public function simpandata()
    {
        if ($this->request->isAJAX()) {
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
                    'tgl_tugas' => date('Y-m-d'),
                    'jam_shift' => date('H:i:s'),
                    'user_id' => $this->session->get('user_id'),
                    'shift' => $this->session->get('shift'),
                    'id_pt1' => $petugas1,
                    'id_pt2' => $petugas2,
                    'id_pt3' => $petugas3,
                    'id_pt4' => $petugas4,
                    'kode_pt' => $this->session->get('kode_pt'),
                    'created_by' => $this->session->get('user_id'),
                    'updated_by' => $this->session->get('user_id')
                ];
                $this->dataphini->insert($data);
                $msg = [
                    'sukses' => [
                        'link' => site_url('layout/index')
                    ]
                ];
            }
            echo json_encode($msg);
        } else {
            exit('Maaf anda tidak dapat mengakses halaman ini');
        }
    }
}

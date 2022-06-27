<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\UserModelMhs;

class LoginMhs extends BaseController
{
    public function index()
    {
        //load view login form
        return view('login_mhs');

    }

    public function proses_login_mhs()
    {
        if ($this->request->isAJAX()) {
            //lakukan validasi data
            if (!$this->validate([
                'nim_mhs' => [
                    'label' => 'Username',
                    'rules' => 'required'
                ],
                'password_mhs' => [
                    'label' => 'Password',
                    'rules' => 'required'
                ]
            ]))
            
            {
                $data = [
                    'status' => 'failed',
                    'message' => 'Data yang dimasukkan tidak valid'
                ];
            } else {
                //load model user
                $user = new UserModelMhs();
                //ambil data sesuai
                $nim_mhs = $this->request->getPost('nim_mhs');
                $password_mhs = $this->request->getPost('password_mhs');

                $get = $user->where('nim_mhs', $nim_mhs)->first();
                if ($get) {
                    //validasi password
                    if (password_verify($password_mhs, $get['password_mhs'])) {
                        //masukkan data ke session
                        $this->session->set([
                            'idUser'    => encrypt_url($get['id_mhs']),
                            'user'      => $get['nim_mhs'],
                            'nama_mhs'      => $get['nama_mhs'],
                            'status'    => $get['status'],
                            'isLogin'   => true
                        ]);

                        $data = [
                            'status' => 'success',
                            'message' => 'Login Berhasil'
                        ];
                    } else {
                        $data = [
                            'status' => 'failed',
                            'message' => 'Password yang anda masukkan salah'
                        ];
                    }
                } else {
                    $data = [
                        'status' => 'failed',
                        'message' => 'Username tidak dikenali'
                    ];
                }
            }
            $data['token'] = csrf_hash();

            echo json_encode($data);
        }
    }
}

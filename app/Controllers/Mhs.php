<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\MhsModel;
use App\Models\AlternativeModel;
use App\Models\KriteriaModel;
use App\Models\PenilaianModel;
use App\Models\SubKriteriaModel;


class Mhs extends BaseController
{
    public function index()


    
    {
        $data = [
            'title' => 'Data Mahasiswa'
        ];

        return view('mhs', $data);
    }

    public function add()
    {

        //load model alternative
   $alternative = new AlternativeModel();
   //load model kriteria
   $kriteria = new KriteriaModel();
   //load model sub kriteria
   $sub_kriteria = new SubKriteriaModel();
   //ambil data kriteria yang memiliki sub kategori
   $getKriteria = $kriteria->getFormKriteria();
   $form = '';
   foreach ($getKriteria->getResult() as $k) {
       $form .= '<input type="hidden" name="idKriteria[]" value="' . $k->id_kriteria . '" />';
       $form .= '<div class="form-group mb-2">';
       $form .= '<label>' . $k->judul_kriteria . '</label>';
       $form .= '<select name="kriteria[]" class="form-control form-control-sm">';
       $form .= '<option value="" selected>Pilih ' . $k->judul_kriteria . '</option>';
       //ambil data sub kriteria sesuai id kriteria
       $getSub = $sub_kriteria->getSubkriteriaPenilaian($k->id_kriteria);
       foreach ($getSub->getResult() as $s) {
           $pilih = ($s->id_sub_kriteria == $this->session->getFlashdata('kriteria_' . $k->id_kriteria)) ? 'selected' : '';

           $form .= '<option value="' . $s->id_sub_kriteria . '" ' . $pilih . '>' . $s->keterangan . '</option>';
       }

       $form .= '</select>';
       $form .= '</div>';
   }

   //load model penilaian
   $model = new PenilaianModel();
   //ambil data penilaian
   $getPenilaian = $model->getPenilaian();

   $data = [
       'title'         => 'Penilaian',
       'form'          => $form,
       'alternative'    => $alternative->findAll(),
       'penilaian'     => $getPenilaian

        ];

        return view('add_mhs', $data);
    }

    public function simpan()
    {
        // echo var_dump($this->request->getMethod());
        // return false;
        
		$db = \Config\Database::connect();

        if ($this->request->getMethod() === 'post') {

			$rules = [
                'nim' => [
					'label' => 'nim_mhs',
                    'rules' => 'required|is_unique[tbl_mhs.nim_mhs]|min_length[5]|max_length[35]',

				],
				'nama' => [
					'label' => 'nama_mhs',
					'rules' => 'required'
                ],
                'tempat' => [
					'label' => 'Tempat_lahir',
					'rules' => 'required'
				],
                'tgl' => [
					'label' => 'tangal_ahir',
					'rules' => 'required'
				],
                'email' => [
					'label' => 'email',
					'rules' => 'required'
				],
                'jurusan' => [
					'label' => 'jurusan_mhs',
					'rules' => 'required'
				],
                'alamat' => [
					'label' => 'alamat',
					'rules' => 'required'
				],
                'semester' => [
					'label' => 'Semester ',
					'rules' => 'required'
				],
            'ipk' => [
                'label' => 'ipk ',
                'rules' => 'required'
            ],

        //     'file_ipk' => [
        //         'label' => 'file_ipk ',
        //         'rules' => 'uploaded[image]|is_image[image]|max_size[image,1024]'
            
        // ],

        'idKriteria.*' => [
            'label' => 'Kriteria',
            'rules' => 'required'
        ]
        
    
        
        // 'file_organisasi' => [
        //     'label' => 'file_organisasi',
        //     'rules' => 'uploaded[image]|is_image[image]|max_size[image,1024]'
        // ],
        // 'foto_mhs' => [
        //     'label' => 'foto_mhs',
        //     'rules' => 'uploaded[image]|is_image[image]|max_size[image,1024]'
        // ],
        
        // 'status' => [
        //     'label' => 'status',
        //     'rules' => 'required'
        // ]

				
				];


			if ($this->validate($rules)) {

               // echo var_dump($this->request);
                //return false;

				$foto_mhs = $this->request->getFile('foto_mhs');
				$fileName_foto_mhs = time().$foto_mhs->getClientName();
				$foto_mhs->move('uploads', $fileName_foto_mhs);

                $file_prestasi = $this->request->getFile('file_prestasi');
				$fileName_file_prestasi = time().$file_prestasi->getClientName();
				$file_prestasi->move('uploads', $fileName_file_prestasi);

                $file_pengabdian_masyarakat = $this->request->getFile('file_pengabdian_masyarakat');
				$fileName_file_pengabdian_masyarakat = time().$file_pengabdian_masyarakat->getClientName();
				$file_pengabdian_masyarakat->move('uploads', $fileName_file_pengabdian_masyarakat);

                $file_organisasi = $this->request->getFile('file_organisasi');
				$fileName_file_organisasi = time().$file_organisasi->getClientName();
				$file_organisasi->move('uploads', $fileName_file_organisasi);

                $file_ipk = $this->request->getFile('file_ipk');
				$fileName_file_ipk = time().$file_ipk->getClientName();
				$file_ipk->move('uploads', $fileName_file_ipk);

				$idmhs = $db->table('tbl_mhs')->insert([
					
                'nim_mhs' => $this->request->getPost('nim'),
                'nama_mhs' => $this->request->getPost('nama'),
                'tempat_lahir' => $this->request->getPost('tempat'),
                'tgl_lahir' => $this->request->getPost('tgl'),
                'email' => $this->request->getPost('email'),
                'jurusan_mhs' => $this->request->getPost('jurusan'),
                'alamat' => $this->request->getPost('alamat'),
                'semester' => $this->request->getPost('semester'),
                'ipk' => $this->request->getPost('ipk'),
                'prestasi' => $this->request->getPost('prestasi'),
                'pengabdian_masyarakat' => $this->request->getPost('pengabdian_masyarakat'),
                'organisasi' => $this->request->getPost('organisasi'),
            

					'foto_mhs' => $fileName_foto_mhs,
                    'file_ipk' => $fileName_file_ipk,
                    'file_prestasi' => $fileName_file_prestasi,
					'file_pengabdian_masyarakat' => $fileName_file_pengabdian_masyarakat,
                    'file_organisasi' => $fileName_file_organisasi

				]);

                $idmhs = $db->insertID();
                $nama_mhs = $this->request->getPost('nama');
                $nim_mhs = $this->request->getPost('nim');
                 //load model alternative
                $modelAlternative = new AlternativeModel();
                //simpan data
                $dataAlternative = [
                    'kode_alternative' => $idmhs.time(),
                    'nama_alternative' => $nama_mhs." ".$nim_mhs,
                    'id_mhs' => $idmhs
                ];

                $idAlternative = $modelAlternative->insert($dataAlternative);

                $id_alternative = $idAlternative;
                $id_kriteria = $this->request->getPost('idKriteria');
                $id_sub_kriteria = $this->request->getPost('kriteria');

                $arr_data = array();

                for ($i = 0; $i < count($id_sub_kriteria); $i++) {
                    $data = [
                        'id_alternative' => $id_alternative,
                        'id_kriteria' => $id_kriteria[$i],
                        'id_sub_kriteria' => $id_sub_kriteria[$i]
                    ];
                    //push array
                    array_push($arr_data, $data);
                }

                //cek apakah terdapat alternative yang sama di database
                $modelPenilaian = new PenilaianModel();

                $cekAlternative = $modelPenilaian->cekAlternative($id_alternative);

                if ($cekAlternative > 0) {
                    $this->session->setFlashdata('failed', 'Data sudah ada dalam penilaian');

                    return redirect()->back();
                }

                //simpan penilaian
                $modelPenilaian->multiSave($arr_data);

			
				return redirect()->back()->with('success', 'Data berhasil disimpan');
			}
            
            echo var_dump($this->validator->getErrors());
            return false;
			return redirect()->back()->withInput()->with('validation', $this->validator->getErrors());

		}
        return redirect()->back()->withInput()->with('error', 'Ada kesalahan');

    }
    public function edit($id = null)
    {
        //decrypt dan cek id
        $id_mhs = decrypt_url($id);

        if ($id_mhs == null || $id_mhs == '') {
            return redirect()->back();
        }

        //load model mhs
        $model = new MhsModel();
        //ambil data
        $get = $model->find($id_mhs);

        //cek data
        if (!$get) {
            return redirect()->back();
        }

        $data = [
            'title' => 'Edit User',
            'data'  => $get
        ];

        return view('edit_mhs', $data);
    }
    

    public function update($id = null)
    {
        //decrypt dan cek id
        $id_mhs = decrypt_url($id);

        if ($id_mhs == null || $id_mhs== '') {
            return redirect()->back();
        }

        //load model user
        $model = new MhsModel();
        //ambil data
        $get = $model->find($id_mhs);

        if (!$get) {
            //masukkan pesan kesalahan ke flashdata
            $this->session->setFlashdata('failed', 'User tidak terdaftar');
            //redirect ke halaman manajemen user
            return redirect()->to('/mhs');
        }


        if ($this->request->getPost('Submit') == 'Submit') {
            //validasi data
            if (!$this->validate([
                'nim' => [
                    'label'     => 'mim_mhs',
                    'rules'     => 'required|is_unique[tbl_mhs.nim_mhs]|min_length[5]|max_length[35]',
                    'errors'    => [
                        'required'      => '{field} wajib diisi',
                        'is_unique'     => '{field} sudah digunakan, silahkan pilih yang lain',
                        'min_length'    => '{field} minimal 5 karakter',
                        'max_length'    => '{field} maksimal 35 karakter'
                    ]
                    
                ],

                'nama' => [
                    'label'     => 'nama_mhs',
                    'rules'     => 'required|min_length[3]|max_length[50]',
                    'errors'    => [
                        'required'      => '{field} wajib diisi',
                        'min_length'    => '{field} minimal 3 karakter',
                        'max_length'    => '{field} maksimal 50 karakter'
                    ]
                ],
                'tempat' => [
                    'label'     => 'tempat_lahir',
                    'rules'     => 'required|min_length[3]|max_length[50]',
                    'errors'    => [
                        'required'      => '{field} wajib diisi',
                        'min_length'    => '{field} minimal 3 karakter',
                        'max_length'    => '{field} maksimal 50 karakter'
                    ]
                ],

                'tgl' => [
                    'label'     => 'tgl_lahir',
                    'rules'     => 'required|min_length[3]|max_length[50]',
                    'errors'    => [
                        'required'      => '{field} wajib diisi',
                        'min_length'    => '{field} minimal 3 karakter',
                        'max_length'    => '{field} maksimal 50 karakter'
                    ]
                ],
                'email' => [
                    'label'     => 'email',
                    'rules'     => 'required|min_length[3]|max_length[50]',
                    'errors'    => [
                        'required'      => '{field} wajib diisi',
                        'min_length'    => '{field} minimal 3 karakter',
                        'max_length'    => '{field} maksimal 50 karakter'
                    ]
                ],
                'jurusan' => [
                    'label'     => 'jurusan_mhs',
                    'rules'     => 'required|min_length[3]|max_length[50]',
                    'errors'    => [
                        'required'      => '{field} wajib diisi',
                        'min_length'    => '{field} minimal 3 karakter',
                        'max_length'    => '{field} maksimal 50 karakter'
                    ]
                ],
                'alamat' => [
                    'label'     => 'alamat',
                    'rules'     => 'required|min_length[3]|max_length[50]',
                    'errors'    => [
                        'required'      => '{field} wajib diisi',
                        'min_length'    => '{field} minimal 3 karakter',
                        'max_length'    => '{field} maksimal 50 karakter'
                    ]
                ],

            
            'semester' => [
                'label'     => 'semester',
                'rules'     => 'required|min_length[3]|max_length[50]',
                'errors'    => [
                    'required'      => '{field} wajib diisi',
                    'min_length'    => '{field} minimal 3 karakter',
                    'max_length'    => '{field} maksimal 50 karakter'
                ]
            ],

        'ipk' => [
            'label'     => 'ipk',
            'rules'     => 'required|min_length[3]|max_length[50]',
            'errors'    => [
                'required'      => '{field} wajib diisi',
                'min_length'    => '{field} minimal 3 karakter',
                'max_length'    => '{field} maksimal 50 karakter'
                    ]
                ]
            ])) {
                $validation = \Config\Services::validation();
                //masukkan pesan kesalahan ke flashdata
                $this->session->setFlashdata('validation', $validation->getErrors());
                //redirect ke halaman sebelumnya beserta mengirimkan isian input
                return redirect()->back()->withInput();
            }

            $password = $get['password'];
            if ($this->request->getPost('password')) {
                $password = password_hash($this->request->getPost('password'), PASSWORD_DEFAULT, ['cost' => 8]);
            }

            $data = [
                'id_mhs'   => $get['id_mhs'],
                'nim_mhs' => $this->request->getPost('nim'),
                'nama_mhs' => $this->request->getPost('nama'),
                'tempat_lahir' => $this->request->getPost('tempat'),
                'tgl_lahir' => $this->request->getPost('tgl'),
                'email' => $this->request->getPost('email'),
                'jurusan_mhs' => $this->request->getPost('jurusan'),
                'alamat' => $this->request->getPost('alamat'),
                'semester' => $this->request->getPost('semester'),
                'ipk' => $this->request->getPost('ipk'),
                
            ];

            $update = $model->save($data);

            if ($update) {
                $this->session->setFlashdata('success', 'Data User berhasil diperbarui');
            } else {
                $this->session->setFlashdata('failed', 'Data User gagal diperbarui');
            }

            return redirect()->to('mhs');
        }

        return redirect()->back();
    }




/*
    public function getData()
    {
        //cek apakah request berupa ajax atau bukan
        if ($this->request->isAJAX()) {
            //tampung data dan decrypt
            $id = decrypt_url($this->request->getPost('id'));
            //cek data
            if ($id == null || $id == '') {
                $data = [
                    'status' => 'failed'
                ];
            } else {
                //load model
                $model = new MhsModel();
                //ambil data
                $get = $model->find($id);
                //cek data
                if ($get) {
                    $data = [
                        'status'        => 'success',
                        'header'        => 'Update Data',
                        'nim'          => $get['nim_mhs'],
                        'nama'          => $get['nama_mhs'],
                        'tempat'          => $get['tempat_lahir'],
                        'tgl'          => $get['tgl_lahir'],
                        'jurusan'          => $get['jurusan_mhs'],
                        'alamat'          => $get['alamat'],
                        'semester'          => $get['semester'],
                        'ipk'          => $get['ipk'],
                        'prestasi'          => $get['prestasi'],
                        'pengabdian'          => $get['pengabdian_masyarakat'],
                        'organisasi'          => $get['organisasi'],
                        'foto_mhs'          => $get['foto_mhs'],
                        'url_action'    => base_url('mhs/' . encrypt_url($get['id_mhs']))
                    ];
                } else {
                    $data = [
                        'status' => 'failed'
                    ];
                }
            }

            $data['token'] = csrf_hash();

            echo json_encode($data);
        } else {
            return redirect()->back();
        }
    }
*/
  
    public function ajaxList()
    {
        //load model alternative
        $model = new MhsModel();

        if ($this->request->isAJAX()) {
            //ambil data
            $lists = $model->get_datatables();

            $data = [];
            $no = $this->request->getPost("start");

            foreach ($lists as $list) {
                $button = '

                <a href="' . base_url('mhs/' . encrypt_url($list->id_mhs)) . '" class="btn btn-xs btn-warning">
                <i class="fa fa-edit"></i>
            </a>
				<button type="button" class="btn btn-xs btn-danger my-1" onclick="sweetDelete(\'' . encrypt_url($list->id_mhs) . '\')">
					<i class="fa fa-trash"></i>
				</button>';
                $button1 = '
				<button type="button" class="btn btn-xs btn-warning my-1" onclick="getData(\'' . encrypt_url($list->id_mhs) . '\')">
					<i class="fa label-warning">Pending</i>
				</button>';
                $no++;
                $row = [];
                $row[] = $no;
                $row[] = $list->nim_mhs;
                $row[] = $list->nama_mhs;
                $row[] = $list->tempat_lahir;
                $row[] = $list->tgl_lahir;
                $row[] = $list->email;
                $row[] = $list->jurusan_mhs;
                $row[] = $list->alamat;
                $row[] = $list->semester;
                $row[] = $button1;
                $row[] = $button;
                $data[] = $row;
            }

            $output = [
                "draw" => $this->request->getPost('draw'),
                "recordsTotal" => $model->count_all(),
                "recordsFiltered" => $model->count_filtered(),
                "data" => $data
            ];

            $output[csrf_token()] = csrf_hash();
            echo json_encode($output);
        }
    }

    
}

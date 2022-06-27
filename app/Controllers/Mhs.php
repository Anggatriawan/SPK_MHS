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
					'label' => 'nim mahasiswa',
                    'rules' => 'required|is_unique[tbl_mhs.nim_mhs]|min_length[5]|max_length[35]',

				],
				'nama' => [
					'label' => 'nama mahsiswa',
					'rules' => 'required'
                ],
                'tempat' => [
					'label' => 'Tempat lahir',
					'rules' => 'required'
				],
                'tgl' => [
					'label' => 'tangal ahir',
					'rules' => 'required'
				],
                'email' => [
					'label' => 'email',
					'rules' => 'required'
				],
                'jurusan' => [
					'label' => 'jurusan mhs',
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
           'file_ipk' => [
               'label' => 'file ipk',
               'rules' => 'uploaded[file_ipk]|mime_in[file_ipk,application/pdf]|max_size[file_ipk,2048]',
               'errors' => [
                'uploaded' => '{field} Harus Ada File yang diupload',
                   'mime_in' => '{field} File Extention Harus Berupa pdf',
                   'max_size' => '{field} Ukuran File Maksimal 2 MB'

               ]
         ],
         
        'idKriteria.*' => [
            'label' => 'Kriteria',
            'rules' => 'required'
        ],
        
        'file_organisasi' => [
         'label' => 'file organisasi',
         'rules' => 'uploaded[file_organisasi]|mime_in[file_organisasi,application/pdf]|max_size[file_organisasi,2048]',
         'errors' => [
            'uploaded' => 'Harus Ada File yang diupload',
             'mime_in'  => 'File Extention Harus Berupa pdf',
             'max_size' => 'Ukuran File Maksimal 2 MB'

         ]
       ],

       'file_prestasi' => [
        'label' => 'file prestasi',
        'rules' => 'uploaded[file_prestasi]|mime_in[file_prestasi,application/pdf]|max_size[file_prestasi,2048]',
        'errors' => [
            'uploaded' => 'Harus Ada File yang diupload',
            'mime_in' => 'File Extention Harus Berupa pdf',
            'max_size' => 'Ukuran File Maksimal 2 MB'

        ]
      ],
      
      'file_pengabdian_masyarakat' => [
        'label' => 'file pengabdian masyarakat',
        'rules' => 'uploaded[file_pengabdian_masyarakat]|mime_in[file_pengabdian_masyarakat,application/pdf]|max_size[file_pengabdian_masyarakat,2048]',
        'errors' => [
            'uploaded' => 'Harus Ada File yang diupload',
            'mime_in' => 'File Extention Harus Berupa pdf',
            'max_size' => 'Ukuran File Maksimal 2 MB'

        ]
      ],

          'foto_mhs' => [
           'label' => 'foto mahsiswa',
           'rules' => 'uploaded[foto_mhs]|mime_in[foto_mhs,image/jpg,image/jpeg,image/gif,image/png]|max_size[foto_mhs,2048]',
           'errors' => [
                'uploaded' => 'Harus Ada File yang diupload',
                'mime_in' => 'File Extention Harus Berupa jpg,jpeg,gif,png',
                'max_size' => 'Ukuran File Maksimal 2 MB'
   
            ]
         ],
     
    'tgl_input' => [
        'label' => 'tanggal upload data',
        'rules' => 'required'
    ]
  
 			
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
                'password_mhs'  => password_hash($this->request->getPost('password'), PASSWORD_DEFAULT, ['cost' => 8]),
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
                'tgl_input' => $this->request->getPost('tgl_input'),

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
                    'kode_alternative' => $idmhs.".".$nim_mhs,
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


                {
                    $validation = \Config\Services::validation();
                    //masukkan pesan kesalahan ke flashdata
                    $this->session->setFlashdata('validation', $validation->getErrors());
                    //redirect ke halaman sebelumnya beserta mengirimkan isian input
                }

				return redirect()->to('mhs')->with('success', 'Data berhasil disimpan');
			}
            $validation = \Config\Services::validation();
                    //masukkan pesan kesalahan ke flashdata
              $this->session->setFlashdata('validation', $validation->getErrors());
			return redirect()->back()->withInput()->with('validation', $this->validator->getErrors());

            return redirect()->back()->withInput()->with('failed', 'Data Belum sesuai. periksa kembali');

		}
        return redirect()->back();

    }


    public function edit($id = null)
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
           //ambil data sub kriteria sesuai id kriteria
           $getSub = $sub_kriteria->getSubkriteriaPenilaian($k->id_kriteria);
           foreach ($getSub->getResult() as $s) {
               $pilih = ($s->id_sub_kriteria == $this->session->getFlashdata('kriteria_' . $k->id_kriteria)) ? 'selected' : '';
    
               $form .= '<option value="' . $s->id_sub_kriteria . '" ' . $pilih . '>' . $s->keterangan . '</option>';
           }
    
           $form .= '</select>';
           $form .= '</div>';
       }
        //decrypt dan cek id
        $id_mhs = decrypt_url($id);
    
        if ($id_mhs == null || $id_mhs == '') {
            return redirect()->back();
        }
    
         //load model user
         $model = new MhsModel();
         //ambil data
         $get = $model->find($id_mhs);
    
         //cek data
         if (!$get) {
             return redirect()->back();
         }
    
         $data = [
             'title' => 'Edit User',
             'data'  => $get,
             'form' => $form
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
					'label' => 'nim mahasiswa',
                    'rules' => 'required',

				],
				'nama' => [
					'label' => 'nama mahsiswa',
					'rules' => 'required'
                ],
                'tempat' => [
					'label' => 'Tempat lahir',
					'rules' => 'required'
				],
                'tgl' => [
					'label' => 'tangal ahir',
					'rules' => 'required'
				],
                'email' => [
					'label' => 'email',
					'rules' => 'required'
				],
                'jurusan' => [
					'label' => 'jurusan mhs',
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
           'file_ipk' => [
               'label' => 'file ipk',
               'rules' => 'permit_empty|mime_in[file_ipk,application/pdf]|max_size[file_ipk,2048]',
               'errors' => [
                'mime_in'  => 'File Extention Harus Berupa pdf',
                'max_size' => 'Ukuran File Maksimal 2 MB'
   
            ]
         ],
         
        'idKriteria.*' => [
            'label' => 'Kriteria',
            'rules' => 'required'
        ],
        
        'file_organisasi' => [
         'label' => 'file organisasi',
         'rules' => 'permit_empty|mime_in[file_organisasi,application/pdf]|max_size[file_organisasi,2048]',
         'errors' => [
             'mime_in'  => 'File Extention Harus Berupa pdf',
             'max_size' => 'Ukuran File Maksimal 2 MB'

         ]
       ],

       'file_prestasi' => [
        'label' => 'file prestasi',
        'rules' => 'permit_empty|mime_in[file_prestasi,application/pdf]|max_size[file_prestasi,2048]',
        'errors' => [
            'mime_in' => 'File Extention Harus Berupa pdf',
            'max_size' => 'Ukuran File Maksimal 2 MB'

        ]
      ],
      
      'file_pengabdian_masyarakat' => [
        'label' => 'file pengabdian masyarakat',
        'rules' => 'permit_empty|mime_in[file_pengabdian_masyarakat,application/pdf]|max_size[file_pengabdian_masyarakat,2048]',
        'errors' => [
            'mime_in' => 'File Extention Harus Berupa pdf',
            'max_size' => 'Ukuran File Maksimal 2 MB'

        ]
      ],

          'foto_mhs' => [
           'label' => 'foto mahsiswa',
           'rules' => 'permit_empty|mime_in[foto_mhs,image/jpg,image/jpeg,image/gif,image/png]|max_size[foto_mhs,2048]',
           'errors' => [
                'mime_in' => 'File Extention Harus Berupa jpg,jpeg,gif,png',
                'max_size' => 'Ukuran File Maksimal 2 MB'
   
            ]
         ]
    
        ]
        )) {
            $validation = \Config\Services::validation();
            //masukkan pesan kesalahan ke flashdata
            $this->session->setFlashdata('validation', $validation->getErrors());
            //redirect ke halaman sebelumnya beserta mengirimkan isian input
            return redirect()->back()->withInput();
        }

        $password = $get['password_mhs'];
        if ($this->request->getPost('password_mhs')) {
            $password = password_hash($this->request->getPost('password_mhs'), PASSWORD_DEFAULT, ['cost' => 8]);
        }
     
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
        
        $data = [
            'id_mhs'   => $get['id_mhs'],
            'nim_mhs' => $this->request->getPost('nim'),
            'nama_mhs' => $this->request->getPost('nama'),
            'tempat_lahir' => $this->request->getPost('tempat'),
            'tgl_lahir' => $this->request->getPost('tgl'),
            'email' => $this->request->getPost('email'),
            'jurusan_mhs' => $this->request->getPost('jurusan'),
            'alamat' => $this->request->getPost('alamat'),
            'tahun_angkatan' => $this->request->getPost('tahun_angkatan'),
            'semester' => $this->request->getPost('semester'),
            'ipk' => $this->request->getPost('ipk'),
            'prestasi' => $this->request->getPost('prestasi'),
            'pengabdian_masyarakat' => $this->request->getPost('pengabdian_masyarakat'),
            'organisasi' => $this->request->getPost('organisasi'),
            'tgl_input' => $this->request->getPost('tgl_input'),
            'password_mhs'  => $password,


                'foto_mhs' => $fileName_foto_mhs,
                'file_ipk' => $fileName_file_ipk,
                'file_prestasi' => $fileName_file_prestasi,
                'file_pengabdian_masyarakat' => $fileName_file_pengabdian_masyarakat,
                'file_organisasi' => $fileName_file_organisasi

        ];

        $update = $model->save($data);
            
        if ($update) {
            $this->session->setFlashdata('success', 'Data User berhasil diperbarui');
        } else {
            $this->session->setFlashdata('failed', 'Data User gagal diperbarui');
        }
               // echo var_dump($this->request);
                //return false;
                $nama_mhs = $this->request->getPost('id_mhs');
                $nama_mhs = $this->request->getPost('nama');
                $nim_mhs = $this->request->getPost('nim');
                 //load model alternative
                $modelAlternative = new AlternativeModel();
                //simpan data
                $dataAlternative = [
                    'nama_alternative' => $nama_mhs." ".$nim_mhs,
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
			
				return redirect()->to('mhs')->with('success', 'Data berhasil disimpan');
			}
            
            echo var_dump($this->validator->getErrors());
            return false;
			return redirect()->back()->withInput()->with('validation', $this->validator->getErrors());

          

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
                $row[] = $list->status;
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

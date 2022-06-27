<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\UserModelMhs;
use App\Models\AlternativeModel;
use App\Models\KriteriaModel;
use App\Models\PenilaianModel;
use App\Models\SubKriteriaModel;


class UserMhs extends BaseController
{
    function __construct()
    {
     
    }
	public function index()
	{
        $data = [
			'title' => 'Dashboard'
		];

		return view('profil_mhs', $data);
    }

    //--------------------------------------------------------------------------
    
    public function preview($id)
	{
		$news = new UserModelMhs();
		$data['news'] = $news->where('id_mhs', $id)->first();
		
		if(!$data['news']){
		}
		echo view('profil_mhs', $data);
    }

    //--------------------------------------------------------------------------
    /*
    public function create()
    {
        // lakukan validasi
        $validation =  \Config\Services::validation();
        $validation->setRules(['title' => 'required']);
        $isDataValid = $validation->withRequest($this->request)->run();

        // jika data valid, simpan ke database
        if($isDataValid){
            $news = new UserModelMhs();
            $news->insert([
                "title" => $this->request->getPost('title'),
                "content" => $this->request->getPost('content'),
                "status" => $this->request->getPost('status'),
                "slug" => url_title($this->request->getPost('title'), '-', TRUE)
            ]);
            return redirect('admin/news');
        }
		
        // tampilkan form create
        echo view('admin_create_news');
    }

    //--------------------------------------------------------------------------

    public function edit($id_mhs)
    {
        // ambil artikel yang akan diedit
        $news = new UserModelMhs();
        $data['news'] = $news->where('id_mhs', $id_mhs)->first();
        
        // lakukan validasi data artikel
        $validation =  \Config\Services::validation();
        $validation->setRules([
            'id_mhs' => 'required',
        ]);
        $isDataValid = $validation->withRequest($this->request)->run();
        // jika data vlid, maka simpan ke database
        if($isDataValid){
            
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

            $news->update($id_mhs, [
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
            

					'foto_mhs' => $fileName_foto_mhs,
                    'file_ipk' => $fileName_file_ipk,
                    'file_prestasi' => $fileName_file_prestasi,
					'file_pengabdian_masyarakat' => $fileName_file_pengabdian_masyarakat,
                    'file_organisasi' => $fileName_file_organisasi
            ]);


            return redirect('profil_mhs');
        }

        // tampilkan form edit
        echo view('edit_mhs_user', $data);
        $this->session->setFlashdata('failed', 'Data User gagal diperbarui');

    }
*/


  
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
    //decrypt dan cek id
    $id_mhs = decrypt_url($id);

    if ($id_mhs == null || $id_mhs == '') {
        return redirect()->back();
    }

     //load model user
     $model = new UserModelMhs();
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

     return view('edit_mhs_user', $data);
 }


public function update($id = null)

{
    $db = \Config\Database::connect();

    //decrypt dan cek id
    $id_mhs = decrypt_url($id);

    if ($id_mhs == null || $id_mhs== '') {
        return redirect()->back();
    }

    //load model user
    $model = new UserModelMhs();
    //ambil data
    $get = $model->find($id_mhs);

    if (!$get) {
        //masukkan pesan kesalahan ke flashdata
        $this->session->setFlashdata('failed', 'User tidak terdaftar');
        //redirect ke halaman manajemen user
        return redirect()->to('/profil_mhs');
    }


    if ($this->request->getPost('Submit') == 'Submit') {
        //validasi data
        if (!$this->validate([
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
            
                ];

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

				return redirect()->to('profl_mhs')->with('success', 'Data berhasil disimpan');
			}
            $validation = \Config\Services::validation();
                    //masukkan pesan kesalahan ke flashdata
              $this->session->setFlashdata('validation', $validation->getErrors());
			return redirect()->back()->withInput()->with('validation', $this->validator->getErrors());

            return redirect()->back()->withInput()->with('failed', 'Data Belum sesuai. periksa kembali');

		}

        
		
   
    //--------------------------------------------------------------------------

	public function delete($id){
        $news = new UserModelMhs();
        $news->delete($id);
        return redirect('profil_mhs');
    }
}

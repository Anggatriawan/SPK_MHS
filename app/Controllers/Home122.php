<?php

namespace App\Controllers;

use App\Models\ProfilModelMhs;

class Home1 extends BaseController
{
	public function index()
	{
		$data = [
			'title' => 'Dashboard'
		];

		return view('dashboard', $data);
	}

	public function profil_mhs()
	{
		//load model user
		$model = new ProfilModelMhs();
		//ambil data sesuai session
		$get = $model->where('id_user_mhs', decrypt_url($this->session->get('idUser')))->first();
		if (!$get) {
			return redirect()->back();
		}

		$data = [
			'title' => 'Profil',
			'data'	=> $get
		];

		return view('profil_user_mhs', $data);
	}

	public function update_profil_mhs()
	{
		if ($this->request->getPost('Submit') == 'Submit') {
			//load model user
			$model = new ProfilModelMhs();
			//ambil data
			$get = $model->where('id_user_mhs', decrypt_url($this->session->get('idUser')))->first();
			if (!$get) {
				return redirect()->back();
			}
			//validasi data
			if (!$this->validate([
				'username_mhs' => [
					'label'		=> 'Username',
					'errors'	=> [
						'required'		=> '{field} wajib diisi',
						'min_length'	=> '{field} minimal 5 karakter',
						'max_length'	=> '{field} maksimal 35 karakter'
					]
				
				],
				'password_mhs' => [
					'label'		=> 'Password',
					'rules'		=> 'required',
					'errors'	=> [
						'required'		=> '{field} wajib diisi'
					]
				],
			])) {
				$validation = \Config\Services::validation();
				//masukkan pesan kesalahan ke flashdata
				$this->session->setFlashdata('validation', $validation->getErrors());
				//redirect ke halaman sebelumnya beserta mengirimkan isian input
				return redirect()->back()->withInput();
			}

			//cek password
			if (!password_verify($this->request->getPost('password_mhs'), $get['password_mhs'])) {
				$this->session->setFlashdata('failed', 'Password yang anda masukkan salah...');
				//redirect ke halaman sebelumnya beserta mengirimkan isian input
				return redirect()->back()->withInput();
			}

			//simpan data
			$data = [
				'id'	=> $get['id'],
				'username'	=> $this->request->getPost('user'),
				'fullname'	=> $this->request->getPost('nama')
			];

			$simpan = $model->save($data);

			if ($simpan) {
				//update session
				$this->session->set([
					'user'      => $this->request->getPost('nama')
				]);
				$this->session->setFlashdata('success', 'Profil berhasil diperbarui');
			} else {
				$this->session->setFlashdata('failed', 'Profil gagal diperbarui');
			}

			return redirect()->back();
		}

		return redirect()->back();
	}

	public function change_password()
	{
		$data = [
			'title' => 'Ganti Password'
		];

		return view('password', $data);
	}

	public function update_password()
	{
		if ($this->request->getPost('Submit') == 'Submit') {
			//load model user
			$model = new ProfilModelMhs();
			//ambil data
			$get = $model->where('id_user', decrypt_url($this->session->get('idUser')))->first();
			if (!$get) {
				return redirect()->back();
			}
			//validasi data
			if (!$this->validate([
				'password_baru' => [
					'label'	=> 'Password Baru',
					'rules'		=> 'required|min_length[5]',
					'errors'	=> [
						'required' 		=> '{field} wajib diisi',
						'min_length'	=> '{field} minimal 5 karakter'
					]
				],
				'password_baru2' => [
					'label'	=> 'Retype Password Baru',
					'rules'		=> 'required|min_length[5]|matches[password_baru]',
					'errors'	=> [
						'required' 		=> '{field} wajib diisi',
						'min_length'	=> '{field} minimal 5 karakter',
						'matches'		=> '{field} harus sama dengan Password Baru'
					]
				],
				'password' => [
					'label'		=> 'Password',
					'rules'		=> 'required',
					'errors'	=> [
						'required'		=> '{field} wajib diisi'
					]
				],
			])) {
				$validation = \Config\Services::validation();
				//masukkan pesan kesalahan ke flashdata
				$this->session->setFlashdata('validation', $validation->getErrors());
				//redirect ke halaman sebelumnya
				return redirect()->back();
			}

			//cek password
			if (!password_verify($this->request->getPost('password'), $get['password'])) {
				$this->session->setFlashdata('failed', 'Password yang anda masukkan salah...');
				//redirect ke halaman sebelumnya
				return redirect()->back();
			}

			//simpan data
			$data = [
				'id_user'	=> $get['id_user'],
				'password'	=> password_hash($this->request->getPost('password_baru'), PASSWORD_DEFAULT, ['cost' => 8])
			];

			$simpan = $model->save($data);

			if ($simpan) {
				$this->session->setFlashdata('success', 'Password berhasil diperbarui');
			} else {
				$this->session->setFlashdata('failed', 'Password gagal diperbarui');
			}

			return redirect()->back();
		}

		return redirect()->back();
	}

	public function logout1()
	{
		//hapus session
		$this->session->destroy();
		//redirect ke halaman awal
		return redirect()->to('/');
	}
}

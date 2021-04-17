<?php

class Registrasi extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');
	}
	public function index()
	{
		$jdul['title'] = 'User Registration Page';
		$this->form_validation->set_rules('nama', ' Nama', 'required', [
			'required'	=> 'Nama wajib diisi!'
		]);
		$this->form_validation->set_rules('username', ' Username', 'required', [
			'required'	=> 'Username wajib diisi!'
		]);
		$this->form_validation->set_rules('password_1', ' Password', 'required|matches[password_2]|min_length[6]', [
			'required'	=> 'Password wajib diisi!',
			'matches'	=> 'Password tidak cocok',
			'min_length' => 'Password terlalu pendek'
		]);
		$this->form_validation->set_rules('password_2', ' Password', 'required|matches[password_1]');

		if ($this->form_validation->run() == FALSE) {
			$this->load->view('templates/header', $jdul);
			$this->load->view('registrasi');
			$this->load->view('templates_admin/footer');
		} else {
			$data = array(
				'id'		=> '',
				'nama'		=> $this->input->post('nama'),
				'username'	=> $this->input->post('username'),
				'password'	=> $this->input->post('password_1'),
				'role_id'	=> 2,
			);

			$this->db->insert('tb_user', $data);
			// untuk menampilkan pesan bahwa regis akun sudah berhasil
			$this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissable" role="alert">Congratulation! Your Account has been created.</div>');
			redirect('auth/login');
		}
	}
}

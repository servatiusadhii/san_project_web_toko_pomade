<?php

class Kategori extends CI_Controller
{
	public function local()
	{
		$jdul['title'] = 'Pomade Local | Pomade Store';
		$data['local'] = $this->model_kategori->data_local()->result();
		$this->load->view('templates/header', $jdul);
		$this->load->view('templates/sidebar');
		$this->load->view('pomade_local', $data);
		$this->load->view('templates/footer');
	}

	public function interlocal()
	{
		$jdul['title'] = 'Pomade Interlocal | Pomade Store';
		$data['interlocal'] = $this->model_kategori->data_interlocal()->result();
		$this->load->view('templates/header', $jdul);
		$this->load->view('templates/sidebar');
		$this->load->view('pomade_interlocal', $data);
		$this->load->view('templates/footer');
	}

	
}

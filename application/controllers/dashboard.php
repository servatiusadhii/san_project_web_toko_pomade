<?php

class Dashboard extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();

		if ($this->session->userdata('role_id') != '2') {
			$this->session->set_flashdata('pesan', '<div
					class="alert alert-danger
					alert-dismissible fade show"
					role="alert">
					Anda Belum Login!
					<button type="button" class="close" data-dismiss="alert" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>');
			redirect('auth/login');
		}
	}

	public function tambah_ke_keranjang($id)
	{
		$barang = $this->model_barang->find($id);

		$data = array(
			'id'      => $barang->id_brg,
			'qty'     => 1,
			'price'   => $barang->harga,
			'name'    => $barang->nama_brg
		);

		$this->cart->insert($data);
		redirect('welcome');
	}

	public function detail_keranjang()
	{
		$jdul['title'] = 'Keranjang';
		$this->load->view('templates/header', $jdul);
		$this->load->view('templates/sidebar');
		$this->load->view('keranjang');
		$this->load->view('templates_admin/footer');
	}

	public function hapus_keranjang()
	{
		$this->cart->destroy();
		redirect('welcome');
	}

	public function pembayaran()
	{
		$jdul['title'] = 'Pembayaran';
		$this->load->view('templates/header', $jdul);
		$this->load->view('templates/sidebar');
		$this->load->view('pembayaran');
		$this->load->view('templates_admin/footer');
	}

	public function proses_pesanan()
	{
		$jdul['title'] = 'Proses Pesanan';

		$this->form_validation->set_rules('nama', 'Nama', 'required|trim', [
			'required'	=> 'Nama wajib diisi!'
		]);
		$this->form_validation->set_rules('alamat', 'Alamat', 'required|trim', [
			'required'	=> 'Alamat wajib diisi!'
		]);
		$this->form_validation->set_rules('no_telp', 'No_Telp', 'required|trim', [
			'required'	=> 'No Telepon wajib diisi!'
		]);
		$this->form_validation->set_rules('kurir', 'Kurir', 'required', [
			'required'	=> 'Pilih kurir terlebih dahulu!'
		]);
		$this->form_validation->set_rules('bank', 'Bank', 'required', [
			'required'	=> 'Wajib pilih metode pembayaran!'
		]);

		if ($this->form_validation->run() == FALSE) {
			$this->load->view('templates/header', $jdul);
			$this->load->view('templates/sidebar');
			$this->load->view('pembayaran');
			$this->load->view('templates/footer');
		} else {
			$is_processed = $this->model_invoice->index();
			if ($is_processed) {
				$this->cart->destroy();
				$this->load->view('templates/header', $jdul);
				$this->load->view('templates/sidebar');
				$this->load->view('proses_pesanan');
				$this->load->view('templates/footer');
			} else {
				echo "Maaf, Pesanana Anda Gagal diproses!";
			}
		}
	}

	public function detail($id_brg)
	{
		$jdul['title'] = 'Detail Barang';
		$data['barang'] = $this->model_barang->detail_brg($id_brg);
		$this->load->view('templates/header', $jdul);
		$this->load->view('templates/sidebar');
		$this->load->view('detail_barang', $data);
		$this->load->view('templates/footer');
	}
}

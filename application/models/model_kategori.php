<?php 

class Model_kategori extends CI_Model{
	public function data_local()
	{
		return $this->db->get_where("tb_barang",array('kategori' => 'Pomade Local'));
	}

	public function data_interlocal()
	{
		return $this->db->get_where("tb_barang",array('kategori' => 'Pomade Interlocal'));
	}

}

 ?>
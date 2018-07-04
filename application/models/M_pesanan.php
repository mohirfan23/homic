<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_pesanan extends CI_Model {

	function tampil_pesanan()	
	{
		return $this->db->get('data_pesanan');
	}

	//insert pesanan
	function insert_pesanan($data)
	{
		$this->db->insert('data_pesanan', $data);
	}

	//get data
	function get_data($id)
	{
		return $this->db->get('data_pesanan');
	}

	//update pesanan
	function update_pesanan($data, $id)
	{
		$this->db->where('id_pesanan', $id);
		$this->db->update('data_pesanan', $data);
		return TRUE;
	}

	//delete pesanan
	function delete_pesanan($id)
	{
		$this->db->where('id_pesanan',$id);
		$this->db->delete('data_pesanan');
	}

}

/* End of file M_pesanan.php */
/* Location: ./application/models/M_pesanan.php */
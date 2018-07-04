<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_tdl extends CI_Model {

	function tampil_tdl()	
	{
		return $this->db->get('tdl');
	}

	//insert tdl
	function insert_tdl($data)
	{
		$this->db->insert('tdl', $data);
	}
	
	//get untuk join
	function get_tdl()
	{
		return $this->db->get('tdl');
	}

	//get id tdl
	function get_data($id)
	{
		return $this->db->get('tdl');
	}

	//update tdl
	function update_tdl($data, $id)
	{
		$this->db->where('id_tdl', $id);
		$this->db->update('tdl', $data);
		return TRUE;
	}

	//delete tdl
	function delete_tdl($id)
	{
		$this->db->where('id_tdl', $id);
		$this->db->delete('tdl');
	}

}

/* End of file M_tdl.php */
/* Location: ./application/models/M_tdl.php */
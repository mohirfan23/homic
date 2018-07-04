<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_regisalat extends CI_Model {

	function tampil_regisalat()	
	{
		return $this->db->get('tb_reggt');
	}

	function delete_regalat($id)
	{
		$this->db->where('id_reggt', $id);
		$this->db->delete('tb_reggt');
	}

}

/* End of file M_regisalat.php */
/* Location: ./application/models/M_regisalat.php */
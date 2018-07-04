<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_regsocket extends CI_Model {

	function tampil_regsocket()
	{
		return $this->db->get('tb_regsocket');
	}

}

/* End of file M_regsocket.php */
/* Location: ./application/models/M_regsocket.php */
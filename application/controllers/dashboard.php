<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends MY_Controller {

	protected $access = array('Admin','Pengguna');
	
	public function index()
	{
		$this->load->view('cover/header');
		$this->load->view('cover/content');
		$this->load->view('cover/footer');
	}

}

/* End of file dashboard.php */
/* Location: ./application/controllers/dashboard.php */
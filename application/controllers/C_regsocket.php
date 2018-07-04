<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_regsocket extends CI_Controller {

	protected $acces = array('Admin','Pengguna');

	public function __construct()
	{
		parent::__construct();
		$this->load->model('M_regsocket');
	}

	public function index()
	{
		$data = array(
			'regsocket'	=> $this->M_regsocket->tampil_regsocket()->result(),
		);

		$this->load->view('cover/header');
		$this->load->view('regsocket/tampil_regsocket', $data);
		$this->load->view('cover/footer');
	}

}

/* End of file C_regsocket.php */
/* Location: ./application/controllers/C_regsocket.php */
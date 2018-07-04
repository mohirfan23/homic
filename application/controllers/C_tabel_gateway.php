<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_tabel_gateway extends CI_Controller {

	protected $access = array('Admin','Pengguna');

	public function __construct()
	{
		parent::__construct();
		$this->load->model('M_datagt');
	}

	public function index()
	{
		$data = array(
			'datagt'	=> $this->M_datagt->tampil_datagt()->result(),
		);

		$this->load->view('cover/header');
		$this->load->view('v_datagt/tabel_gateway', $data);
		$this->load->view('cover/footer');
	}

}

/* End of file C_tabel_gateway.php */
/* Location: ./application/controllers/C_tabel_gateway.php */
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_regisalat extends MY_Controller {

	protected $access = array('Admin','Pengguna');

	public function __construct()
	{
		parent::__construct();
		$this->load->model('M_regisalat');
	}

	public function index()
	{
		$data = array( 
			'regisalat' => $this->M_regisalat->tampil_regisalat()->result()
		);

		$this->load->view('cover/header');
		$this->load->view('regisalat/tampil_regisalat', $data);
		$this->load->view('cover/footer');
	}

	public function delete_regalat($id)
	{
		$this->M_regisalat->delete_regalat($id);
		redirect(site_url('C_regisalat'));
	}

}

/* End of file C_regisalat.php */
/* Location: ./application/controllers/C_regisalat.php */
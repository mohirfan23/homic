<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_tdl extends CI_Controller {

	protected $access = array('Admin','Pengguna');

	public function __construct()
	{
		parent::__construct();
		$this->load->model('M_tdl');
	}

	public function index()
	{
		$data = array(
			'tarif_dasar_listrik' => $this->M_tdl->tampil_tdl()->result()
		);

		$this->load->view('cover/header');	
		$this->load->view('v_tdl/tampil_tdl', $data);
		$this->load->view('cover/footer');
	}

	//input data tdl
	public function input_tdl()
	{
		$this->load->view('cover/header');
		$this->load->view('v_tdl/insert_tdl');
		$this->load->view('cover/footer');
	}

	public function create_tdl()
	{
		$data = array(
			'gol_tarif'			 => $this->input->post('gol_tarif',TRUE),
			'kelas_daya'		 => $this->input->post('kelas_daya',TRUE),
			'tarif_daya_listrik' => $this->input->post('tarif_daya_listrik',TRUE),
			);

		$this->M_tdl->insert_tdl($data);
		redirect(site_url('C_tdl'));
	}

	//update data tdl
	public function get_data($id)
	{
		$data['tarif'] = $this->M_tdl->get_data($id)->row();

		$this->load->view('cover/header');
		$this->load->view('v_tdl/update_tdl', $data);
		$this->load->view('cover/footer');
	}

	public function update_tdl()
	{
		$id = $this->input->post('id');
		$data = array(
			'gol_tarif'			 => $this->input->post('gol_tarif',TRUE),
			'kelas_daya'		 => $this->input->post('kelas_daya',TRUE),
			'tarif_daya_listrik' => $this->input->post('tarif_daya_listrik',TRUE),
		);

		$this->M_tdl->update_tdl($data,$id);
		redirect(site_url('C_tdl'));
	}

	//delete tdl
	public function delete_tdl($id)
	{
		$this->M_tdl->delete_tdl($id);
		redirect(site_url('C_tdl'));
	}
}

/* End of file C_tdl.php */
/* Location: ./application/controllers/C_tdl.php */
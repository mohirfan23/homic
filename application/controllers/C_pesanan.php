<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_pesanan extends MY_Controller {

	
	protected $access = array('Admin','Pengguna');

	public function __construct()
	{
		parent::__construct();
		$this->load->model('M_pesanan');
	}

	public function index()
	{
		$data = array(
			'pesanan' =>$this->M_pesanan->tampil_pesanan()->result() 
		);

		$this->load->view('cover/header');
		$this->load->view('pesanan/tampil_pesanan', $data);
		$this->load->view('cover/footer');
	}

	//input data pesanan
	public function input_pesanan()
	{
		$this->load->view('cover/header');
		$this->load->view('pesanan/insert_pesanan');
		$this->load->view('cover/footer');
		
	}

	public function create_pesanan()
	{
		$data = array(
			'nama_pemesan' 		 => $this->input->post('nama_pemesan',TRUE),
			'barang' 		 	 => $this->input->post('barang',TRUE),
			'jumlah'	 		 => $this->input->post('jumlah',TRUE),
			'pembayaran' 	 	 => $this->input->post('pembayaran',TRUE),
			);

		$this->M_pesanan->insert_pesanan($data);
		redirect(site_url('C_pesanan'));
	}

	//update data pesanan
	public function get_data($id)
	{
		$data['pesanan'] = $this->M_pesanan->get_data($id)->row();

		$this->load->view('cover/header');
		$this->load->view('pesanan/update_pesanan', $data);
		$this->load->view('cover/footer');

	}

	public function update_pesanan()
	{
		$id = $this->input->post('id');
		$data = array(
			'nama_pemesan' 		 => $this->input->post('nama_pemesan',TRUE),
			'barang' 			 => $this->input->post('barang',TRUE),
			'jumlah'			 => $this->input->post('jumlah',TRUE),
			'pembayaran' 		 => $this->input->post('pembayaran',TRUE)
			);

		$this->M_pesanan->update_pesanan($data, $id);
		redirect(site_url('C_pesanan'));
	}	

	//delete row
	public function delete_pesanan($id)
	{
		$this->M_pesanan->delete_pesanan($id);
		redirect(site_url('C_pesanan'));
	}
}

/* End of file master.php */
/* Location: ./application/controllers/master.php */
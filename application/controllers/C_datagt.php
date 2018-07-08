<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_datagt extends MY_Controller {

	protected $access = array('Admin','Pengguna');

	public function __construct()
	{
		parent::__construct();
		$this->load->model('M_datagt');
	}

	public function index()
	{

		$data = array(
			'datagt' => $this->M_datagt->get_data() 
		);

		$this->load->view('cover/header');
		$this->load->view('v_datagt/tampil_datagt', $data);
		$this->load->view('cover/footer');
	}

	public function get_data()
	{
		date_default_timezone_set('Asia/Jakarta');

		$data = $this->M_datagt->get_data_daya()->result_array();
		
		$array = array();
		$data_gas = array();
		$data_suhu = array();
		$data_kelembaban = array();
		

		foreach ($data as $key => $value) {
			$time = strtotime($value['tanggal']) * 1000;
			$gas = $value['gas'];
			$suhu = $value['suhu'];
			$kelembaban = $value['kelembaban'];

			array_push($data_gas, [$time, (float) $gas]);
			array_push($data_suhu, [$time, (float) $suhu]);
			array_push($data_kelembaban, [$time, (float) $kelembaban]);
			
		}

		array_push($array, array('gas' => $data_gas, 'suhu' => $data_suhu, 'kelembaban' => $data_kelembaban));
		echo json_encode($array);
	}

	public function insert_data()
	{
		date_default_timezone_set("Asia/Jakarta");

		$data = array(
			'id_socket' => $this->input->post('id'),
			'arus' => $this->input->post('a'),
			'daya' => $this->input->post('w'),
			'tegangan' => $this->input->post('v'),
			'relay' => $this->input->post('r'),
			'kwh' => $this->input->post('kwh'),
			'tanggal' => date('Y-m-d H:i:s') 
		);

		$this->M_datagt->insert_data($data);

	}

	

	

}

/* End of file C_datagt.php */
/* Location: ./application/controllers/C_datagt.php */
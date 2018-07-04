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
		$data['suhu']=array();
		$data['kelembaban']=array();
		$data['gas']=array();
		$data['id_gateway'] = $this->M_datagt->get_data()->result();

		$id_gateway = $this->input->post('kirim_id');

   		foreach($this->M_datagt->get($id_gateway)->result_array() as $row){
   			array_push($data['suhu'], (int) $row['suhu']);
    		array_push($data['kelembaban'], (int) $row['kelembaban']);
    		array_push($data['gas'], (int) $row['gas']);
   		}

		$this->load->view('cover/header');
		$this->load->view('v_datagt/tampil_datagt', array('data'=>$data));
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

	

	

}

/* End of file C_datagt.php */
/* Location: ./application/controllers/C_datagt.php */
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_datasocket extends CI_Controller {

	protected $access = array('Admin','Pengguna');

	public function __construct()
	{
		parent::__construct();
		$this->load->model('M_datasocket','alat');
	}

	public function index()
	{
		// $data['arus']=array();
		// $data['daya']=array();
		// $data['id_gateway'] = $this->alat->get_data()->result();

		// $id_socket = $this->input->post('kirim_idsocket');
		// $id_gateway = $this->input->post('kirim_idgateway');

		// foreach($this->alat->get($id_socket, $id_gateway)->result_array() as $row){
		// 	array_push($data['arus'], (int) $row['arus']);
		// 	array_push($data['daya'], (int) $row['daya']);
		// }

		$this->load->view('cover/header');
		$this->load->view('v_datasocket/tampil_datasocket');
		$this->load->view('cover/footer');
	}

	public function cek_kondisi_alat()
	{
		$cek = $this->alat->get_where_akun(); 

		$data = array(
			'set_kwh' => $cek['set_kwh'],
			'set_switch' => $cek['set_switch'],
			'id_socket' => $cek['id_socket']
		);

		echo json_encode($data);
	}

	public function get_data()
	{
		date_default_timezone_set('Asia/Jakarta');

		$data = $this->alat->get_data_daya();
		$array = array();
		$data_daya = array();
		$data_arus = array();

		$i = 1;
		$now = new DateTime(null, new DateTimeZone('Asia/Jakarta'));
		$now->format('Y-m-d H:i:s');
		foreach ($data as $key => $value) {
			$time = strtotime($value['tanggal']) * 1000;
			$daya = $value['daya'];
			$arus = $value['arus'];
			array_push($data_daya, [$time, (float) $daya]);
			array_push($data_arus, [$time, (float) $arus]);
			$i++;
		}
		array_push($array, array('daya' => $data_daya, 'arus' => $data_arus));
		echo json_encode($array);
	}

	public function tampil_data()
	{

		$data = array(
			'alat' => $this->alat->get_data() 
		);
		$this->load->view('cover/header');
		$this->load->view('alat/tampil_data', $data);
		$this->load->view('cover/footer');
	}

	public function tambah_data()
	{
		$this->load->view('cover/header');
		$this->load->view('alat/tambah_alat');
		$this->load->view('cover/footer');
	}

	public function insert_alat()
	{
		$cek = $this->alat->insert_alat();

		if($cek){
			$this->session->set_flashdata('success','Berhasil tambah alat');
			redirect('C_datasocket/tambah_data');
		}
	}

	public function update_data()
	{
		$this->alat->update_data();
	}

	public function update_kwh()
	{
		
	}

	public function kombinasi_acak()
    {
        $result = "";

        $chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWYZ0123456789";

        $charArray = str_split($chars);

        for($i = 0; $i < 7; $i++){

        	$randItem = array_rand($charArray);

       	 	$result .= "".$charArray[$randItem];
        }

       echo $result;

    }


}

/* End of file C_datasocket.php */
/* Location: ./application/controllers/C_datasocket.php */
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_bayar_listrik extends CI_Controller {

	protected $access = array('Admin','Pengguna');

	public function __construct()
	{
		parent::__construct();
		$this->load->model('M_bayar_listrik');
	}

	public function index()
	{
		$data = array(
			'bayar'	=> $this->M_bayar_listrik->tampil_bayarlistrik()->result(),
		);

		$this->load->view('cover/header');
		$this->load->view('pembayaran/bayar_listrik', $data);
		$this->load->view('cover/footer');
	}

	public function delete_listrik($id)
	{
		$this->M_bayar_listrik->delete_listrik($id);
		redirect(site_url('C_bayar_listrik'));
	}

	public function get_data_tanggal()
	{
		$data = $this->M_bayar_listrik->get_data_tanggal();
		$html = '';
		$array_hari = ["Senin","Selasa","Rabu","Kamis","Jumat","Sabtu","Minggu"];
		if($data->num_rows() > 0){
			foreach ($data->result() as $isi)
			{
				$hari = $array_hari[date('w', strtotime($isi->tanggal))];
				$link = site_url('C_bayar_listrik/delete_listrik/'.$isi->tanggal);
				$html .='
					<tr>
                        <td class="highlight">
                            <div class="success"></div>
                            <a href="#">'.$isi->tanggal.'</a>
                        </td>
                        <td class="hidden-xs">'.$hari.'</td>
                        <td>Rp. '.number_format($isi->jumlah).'</td>
                        <td>
                            <a href="'.$link.'" class="btn default btn-xs black">
                                <i class="fa fa-trash-o"></i>
                                Delete
                            </a>
                         </td>
                    </tr>
				';	
			}
		}else{
			$html .='<tr>
				<td>Tabel Kosong</td>
			</tr>';
		}

		echo $html;
		

	}

	public function get_data_bulan()
	{
		$data  = $this->M_bayar_listrik->get_bulan();
		$bulan = ["Januari","Februari","Maret","April","Mei","Juni","Juli","Agustus","September","Oktober","November","Desember"];
		$html  = '';

		foreach ($data->result() as $nilai) 
		{
			
			$html .='
				<div class="panel panel-success">
					<div class="panel-heading" role="tab" id="headingOne">
                        <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                            <h4 class="panel-title">'.$bulan[$nilai->bulan - 1].' Rp. '.number_format($nilai->jumlah).'</h4>
                        </a>
                    </div>
                    <div id="collapseOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
                                        <div class="panel-body">
                                            <table class="table table-striped table-bordered table-advance table-hover">
                                                <thead>
                                                    <tr>
                                                        <th>
                                                            <i class="fa fa-calendar"></i>
                                                            Tanggal
                                                        </th>
                                                        <th class="hidden-xs">
                                                            <i class="fa fa-calendar-o"></i>
                                                            Hari
                                                        </th>
                                                        <th>
                                                            <i class="fa fa-usd"></i>
                                                            Total
                                                        </th>
                                                        
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                 '.$this->get_bulan($nilai->bulan) .
                                                 	
                                                 '                
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                </div>    
			';
			
		}

		echo $html;
	}

	public function get_bulan($bulan)
	{
		$array_hari = ["Senin","Selasa","Rabu","Kamis","Jumat","Sabtu","Minggu"];
		$bul = $this->M_bayar_listrik->get_detail_bulan($bulan);
		$html = '';
													if($bul->num_rows() > 0){
														foreach ($bul->result() as $data_isi) 
														{
															$hari = $array_hari[date('w', strtotime($data_isi->tanggal))];
															$html .='
																<tr>
											                        <td class="highlight">
											                            <div class="success"></div>
											                            <a href="#">'.$data_isi->tanggal.'</a>
											                        </td>
											                        <td class="hidden-xs">'.$hari.'</td>
											                        <td>Rp. '.number_format($data_isi->harga).'</td>
						
											                    </tr>
															';
														}	
													}

		return $html;											
													
	}

}

/* End of file C_bayar_listrik.php */
/* Location: ./application/controllers/C_bayar_listrik.php */
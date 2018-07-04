<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_bayar_listrik extends CI_Model {

	function tampil_bayarlistrik()
	{
		return $this->db->get('pembayaran_listrik');
	}

	function delete_listrik($id)
	{
		$this->db->where('tanggal', $id);
		$this->db->delete('pembayaran_listrik');
	}

	function get_data_tanggal(){

		return $this->db->query('SELECT *, SUM(harga) as jumlah FROM pembayaran_listrik GROUP BY tanggal');
	}

	function get_bulan(){
		return $this->db->query('SELECT *, SUM(harga) as jumlah, month(tanggal) as bulan FROM pembayaran_listrik GROUP BY month(tanggal)');
	}

	function get_detail_bulan($bulan){
		return $this->db->query("SELECT * FROM pembayaran_listrik where month(tanggal) = '$bulan' ");	
	}

}

/* End of file M_datapengukuran.php */
/* Location: ./application/models/M_datapengukuran.php */
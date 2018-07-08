<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_datagt extends CI_Model {

	 public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }
     
    public function get($id)
    {

        date_default_timezone_set('Asia/jakarta');
        $date= date("Y/m/d");
        $this->db->order_by('tanggal','asc');
        if($id != '')
        {
            return $this->db->get_where('tb_datagt', array('id_gateway' => $id));
        }else{
            return $this->db->get('tb_datagt');
        }

    }

    //get data
    function get_data()
    {
        $where = 
            array('id_socket' => $this->session->userdata('no_seri'), 
        );

        $this->db->where($where);
        $this->db->order_by('tanggal','DESC');
        return $this->db->get('tb_datagt')->result();
    }

    function tampil_datagt()
    {
        return $this->db->get('tb_datagt');
    }

    public function get_data_daya()
    {
        return $this->db->query("SELECT * FROM tb_datagt GROUP BY tanggal");
    }

    public function insert_data($data)
    {
        $this->db->insert('tb_datagt', $data);
    }

}

/* End of file M_datagt.php */
/* Location: ./application/models/M_datagt.php */
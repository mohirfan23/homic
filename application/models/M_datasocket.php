<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_datasocket extends CI_Model {

	function get($id_gateway, $id_socket)	
	{
		$this->db->like('tanggal','2017-');
        $this->db->order_by('tanggal','asc');
        if($id_gateway != '' and $id_socket != '' )
        {
            return $this->db->get_where('tb_datasocket', array('id_gateway' => $id_gateway, 'id_socket' =>$id_socket ));
        }else{
            return $this->db->get('tb_datasocket');
        }
    }
    
    public function get_where_akun()
    {
        $this->db->where(array('id_akun' => $this->session->userdata('id_akun')));
        return $this->db->get('tb_datasocket')->row_array();
    }

    public function update_data()
    {
        $this->db->where(array('id_akun' => $this->session->userdata('id_akun')));
        $this->db->update('tb_datasocket', array('set_switch' => $this->input->post('status')));
    }

	//get data
    function get_data()
    {
        $this->db->from('tb_datasocket');
        $this->db->join('tb_akun','tb_datasocket.id_akun = tb_akun.id_akun','left');
        return $this->db->get()->result();
    }

    public function get_data_socket()
    {
        $this->db->where('status', 'b_aktif');
        return $this->db->get('tb_datasocket');
    }

    public function insert_alat($user)
    {
        $data = array(
            'id_akun' => $user,
            'no_seri' => $this->session->userdata('kom_acak'),
            'tanggal' => date("Y-m-d")
        );

        if($this->db->insert('tb_datasocket', $data)){
            return true;
        }
    }

    function get_data_daya(){
        return $this->db->get('tb_datasocket')->result_array();
    
    }

    public function update_pemilik($kondisi, $data)
    {
       $this->db->where('id_socket', $kondisi);
       $this->db->update('tb_datasocket', array('id_akun' => $data));
    }

    public function update_alat($kondisi1,$data1)
    {
        $this->db->where($kondisi1);
        $this->db->update('tb_datasocket', $data1);
    }

}

/* End of file M_datasocket.php */
/* Location: ./application/models/M_datasocket.php */
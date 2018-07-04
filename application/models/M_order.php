<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_order extends CI_Model {

    protected $order = 'tb_order';
    protected $akun = 'tb_akun';

    public function get_data()
    {
        $this->db->from('tb_order');
        $this->db->join('tb_akun', 'tb_order.id_akun = tb_akun.id_akun', 'left');
        return $this->db->get()->result_array();
    }

    function cek_email(){
        $this->db->where('email', $this->input->post('email'));
        return $this->db->get($this->akun)->num_rows() > 0;
    }

    public function insert_pengguna()
    {
        $data = array(
            'nama' => $this->input->post('nama_pemesan'),
            'alamat' => $this->input->post('alamat'),
            'email' => $this->input->post('email'),
            'no_hp' => $this->input->post('no_hp'),
            'lat' => $this->input->post('lat'),
            'lon' => $this->input->post('lon') 
        );

        $this->db->insert($this->akun, $data);

        $data = $this->insert_order();

        return $data;
    }

    public function insert_order()
    {
        $data['id_akun'] = $this->db->insert_id();
        $data['jumlah'] = $this->input->post('jumlah');
        $data['total'] = $this->input->post('jumlah') * 500000;
        $data['created_at'] = date('Y-m-d H:i:s');

        if($this->db->insert($this->order, $data)){

            $data['success'] = true;
            $data['id_order'] = $this->db->insert_id();
            $data['email'] = $this->input->post('email');
            $data['nama'] = $this->input->post('nama_pemesan');

            return $data;
        }
    }

    public function cek_db($kondisi)
    {
        $this->db->from('tb_order');
        $this->db->join('tb_akun', 'tb_order.id_akun = tb_akun.id_akun', 'left');
        $this->db->where($kondisi);
        return $this->db->get();
    }

    public function cek_db2($kondisi)
    {
        $this->db->from('tb_akun');
        $this->db->join('tb_datasocket', 'tb_akun.id_akun = tb_datasocket.id_akun', 'left');
        $this->db->where($kondisi);
        return $this->db->get();
    }

    public function cek_data_order($kondisi)
    {
      $this->db->from('tb_akun');
      $this->db->join('tb_order', 'tb_akun.id_akun = tb_order.id_akun', 'left');

      $this->db->where($kondisi);
      return $this->db->get()->row();
    }

    public function update_status_bayar($kondisi, $data)
    {
        $this->db->where($kondisi);
        return $this->db->update('tb_order', $data);
    }

    public function get_data_where($kondisi)
    {
        $this->db->from('tb_akun');
        $this->db->join('tb_order', 'tb_akun.id_akun = tb_order.id_akun', 'left');
        $this->db->join('tb_datasocket', 'tb_akun.id_akun = tb_datasocket.id_akun','left');
        
        $this->db->where($kondisi);
        return $this->db->get()->row();
    }

    public function ubah_konfirmasi($kondisi, $data)
    {
        $this->db->where($kondisi);
        return $this->db->update('tb_order', $data);
    }

    public function cek_data_order1($kondisi)
    {
        $this->db->from('tb_akun');
        $this->db->join('tb_order', 'tb_akun.id_akun = tb_order.id_akun', 'left');
        $this->db->join('tb_datasocket', 'tb_akun.id_akun =  tb_datasocket.id_akun', 'left');

        $this->db->where($kondisi);

        return $this->db->get()->row();
    }

    public function update_akun($kondisi1,$data1)
    {
        $this->db->where($kondisi1);
        $this->db->update('tb_akun', $data1);
    }

}

/* End of file M_datasocket.php */
/* Location: ./application/models/M_datasocket.php */
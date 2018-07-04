<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_order extends MY_Controller {

	protected $access = array('Admin','Pengguna');

	public function __construct()
	{
		parent::__construct();
        $this->load->model('M_order','order');
        $this->load->model('M_datasocket','alat');
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

	public function store()
	{
		if($this->order->cek_email()){
            $this->session->set_flashdata('info','Email sudah dipakai');
            return redirect(site_url('C_pesanan/input_pesanan'));
        }

        $cek = $this->order->insert_pengguna();


        $this->send_email($cek);

        if($cek['success']){
            $this->session->set_flashdata('success','Silahkan cek email');
            redirect(site_url('C_pesanan/input_pesanan'));
        }
    }
    public function send_email($cek)
    {

        $this->load->library('email');

        $subject = 'Konfirmasi Pembayaran';
        $url = site_url('C_order/show_konfrim/'.$cek['id_order'].'/'.$cek['id_akun']);

        $body = '
        <!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <title>Document</title>
        </head>
        <style>
            @import url("https://fonts.googleapis.com/css?family=Lato");
        </style>
        <body style="background-color: #e2e2e2; padding-top: 80px; padding-bottom: 80px;">
            <div style="width: 50%;margin:0 auto;padding: 25px 25px 25px 25px;font-family: Lato, sans-serif;border: 1px solid rgba(179,179,179,0.8); background-color: #fff;">
                <div id="header">
                    <table style="width: 100%">
                        <tr align="center">
                            <td>Konfirmasi Pembayaran</td>
                        </tr>
                    </table>
                    <hr style="border: 0;background-image: linear-gradient(to right, rgba(179,179,179,0.8), rgba(179,179,179,0.3), rgba(179,179,179,0.8));height: 1px;">
                </div>
                <div id="body">
                    <table style="width: 100%">
                        <tr>
                            <td style="text-align: left;width: 70%;">
                                <br>
                                <div style="font-size: 13px;">
                                    Hai, '.$cek['nama'].'
                                </div>
                                <div style="font-size: 13px;">
                                    Terimakasi sudah membeli produk kami
                                </div>
                            </td>
                            
                        </tr>
                    </table>
                    <br>
                    <p> Totoal pembelian anda : Rp. '.$cek['total'].'<br />
                        Silahakan transfer di rekening dibawa ini
                    </p><br />

                    <ul>
                        <li>BRI : xxxxx</li>
                        <li>BNI : xxxxx</li>
                    </ul>
                    <br />

                    <p>Silahkan click <a href="'.$url.'">disini</a> untuk konfirmasi pembayaran</p>
                </div>
                <hr style="border: 0;background-image: linear-gradient(to right, rgba(179,179,179,0.8), rgba(179,179,179,0.3), rgba(179,179,179,0.8));height: 1px;">
                <div style="text-align: center;">
                    <div style="font-size: 13px;">
                    &copy; 2018 atol.unikom.ac.id
                    </div>
                    <div style="font-size: 13px;">
                        Mohon untuk tidak membalas karena email ini dikirimkan secara otomatis oleh sistem.
                    </div>
                </div>
            </div>
        </body>
        </html>
        ';

        $result = $this->email
        ->from('atol@email.unikom.ac.id','Homic')
        ->to($cek['email'])
        ->subject($subject)
        ->message($body)
        ->send();
    }

    public function show_konfrim()
    {
        $id = $this->uri->segment(3);
        $user = $this->uri->segment(4);

        $kondisi = array(
            'tb_order.id_order' => $id,
            'tb_akun.id_akun' => $user
        );

        $db = $this->order->cek_db($kondisi);

        if ($db->num_rows() == 0) {
            $this->load->view('errors/html/buatan');
        }else{
            $this->load->view('order/tampil_konfrim', array('data' => $db->row()));
        }

    }

    public function send_konfirmasi($id, $user)
    {
        $this->form_validation->set_rules('tanggal', 'Date', 'required');


        if ($this->form_validation->run() == FALSE)
        {
            $this->session->set_flashdata("message","
            <div class='alert alert-warning alert-dismissible fade show' role='alert'>
                <strong>".validation_errors()."</strong>
                <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                <span aria-hidden='true'>&times;</span>
                </button>
            </div>
            ");

            return redirect(site_url('C_order/show_konfrim/'.$id.'/'.$user));
        }
        else
        {

            $nama = 'gbr_'.time();
            $config['upload_path']          = './assets/img/sementara/';
            $config['allowed_types']        = 'gif|jpg|png';
            $config['max_size']             = 100;
            $config['max_width']            = 50000;
            $config['max_height']           = 50000;
            $config['file_name']            = $nama;

            $this->load->library('upload', $config);

            if (!$this->upload->do_upload('gambar'))
            {
                $this->session->set_flashdata("message","
                    <div class='alert alert-warning alert-dismissible fade show' role='alert'>
                    <strong>".$this->upload->display_errors()."</strong>
                    <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                        <span aria-hidden='true'>&times;</span>
                    </button>
                    </div>

                ");

                return redirect(site_url('C_order/show_konfrim/'.$id.'/'.$user));
            }
            else
            {
                
                $gbr = $this->upload->data();

                $config2['image_library'] = 'gd2';
                $config2['source_image'] = $this->upload->upload_path.$gbr['file_name'];
                $config2['new_image'] = 'assets/img/upload/'.$gbr['file_name']; // folder tempat menyimpan hasil resize
                $config2['maintain_ratio'] = TRUE;
                $config2['width'] = 1000; //lebar setelah resize menjadi 100 px
                $config2['height'] = 1000; //lebar setelah resize menjadi 100 px
                $this->load->library('image_lib');
                $this->image_lib->clear();
                $this->image_lib->initialize($config2);

                $this->image_lib->resize();

                @unlink( $this->upload->upload_path.$gbr['file_name']);

                $kondisi = array(
                    'id_order' => $id,
                );

                $data = array(
                    'status_bayar' => $gbr['file_name'],
                    'updated_at' => $this->input->post('tanggal')
                );

                $get_alat = $this->alat->get_data_socket();

                if($get_alat->num_rows() > 0){
                    
                    $ambil_id = $get_alat->result_array()[0]['id_socket'];
                    $this->alat->update_pemilik($ambil_id, $user);

                }else{

                    $this->kombinasi_acak();
                    $this->alat->insert_alat($user);
                }

                $cek_data = $this->order->cek_data_order($kondisi);

                $cek = $this->order->update_status_bayar($kondisi, $data);
        

                redirect(site_url('C_order/show_konfrim/'.$id.'/'.$user));
                
            }
        }
    }

    public function tampil_order()
    {
        $data = array(
            'konten' => $this->order->get_data(), 
        );
        
        $this->load->view('cover/header');
        $this->load->view('order/tampil_order', $data);
        $this->load->view('cover/footer');
    }

    public function get_where_pengguna()
    {
        $data = array(
            'tb_akun.id_akun' => $this->input->post('id_akun')
        );

        echo json_encode($this->order->get_data_where($data));
    }

    public function konfirmasi($id)
    {
        $kondisi = array(
            'id_order' => $id
        );

        $data = array(
            'konfirmasi' => 1
        );

        $cek = $this->order->ubah_konfirmasi($kondisi, $data);

        if ($cek >= 1) {

            $cek_data = $this->order->cek_data_order1($kondisi);

            $this->load->library('email');

            $subject = 'Konfirmasi permintaan';
            $url = site_url('C_order/konfrim_akun/'.$cek_data->no_seri.'/'.$cek_data->id_akun);

            $body = '
            <!DOCTYPE html>
            <html lang="en">
            <head>
                <meta charset="UTF-8">
                <title>Document</title>
            </head>
            <style>
                @import url("https://fonts.googleapis.com/css?family=Lato");
            </style>
            <body style="background-color: #e2e2e2; padding-top: 80px; padding-bottom: 80px;">
                <div style="width: 50%;margin:0 auto;padding: 25px 25px 25px 25px;font-family: Lato, sans-serif;border: 1px solid rgba(179,179,179,0.8); background-color: #fff;">
                    <div id="header">
                        <table style="width: 100%">
                            <tr align="center">
                                <td>Konfirmasi Permintaan</td>
                            </tr>
                        </table>
                        <hr style="border: 0;background-image: linear-gradient(to right, rgba(179,179,179,0.8), rgba(179,179,179,0.3), rgba(179,179,179,0.8));height: 1px;">
                    </div>
                    <div id="body">
                        <table style="width: 100%">
                            <tr>
                                <td style="text-align: left;width: 70%;">
                                    <br>
                                    <div style="font-size: 13px;">
                                        Hai, '.$cek_data->nama.'
                                    </div>
                                </td>
                                
                            </tr>
                        </table>
                        <br>
                        <p> Permintaan anda sudah kami konfirmasi <br />
                        dan dalam proses pembuatan alat
                        </p>
                        <br />

                        <p>Silahkan click <a href="'.$url.'">disini</a> untuk konfirmasi username dan password</p>
                    </div>
                    <hr style="border: 0;background-image: linear-gradient(to right, rgba(179,179,179,0.8), rgba(179,179,179,0.3), rgba(179,179,179,0.8));height: 1px;">
                    <div style="text-align: center;">
                        <div style="font-size: 13px;">
                        &copy; 2018 atol.unikom.ac.id
                        </div>
                        <div style="font-size: 13px;">
                            Mohon untuk tidak membalas karena email ini dikirimkan secara otomatis oleh sistem.
                        </div>
                    </div>
                </div>
            </body>
            </html>
            ';

            $result = $this->email
            ->from('atol@email.unikom.ac.id','Homic')
            ->to($cek_data->email)
            ->subject($subject)
            ->message($body)
            ->send();

            $this->session->set_flashdata('Success','update status');
            redirect(site_url('C_order/tampil_order'));

        }
    }

    public function konfrim_akun()
    {
        $no_seri = $this->uri->segment(3);
        $id_akun = $this->uri->segment(4);

        $kondisi = array(
            'tb_akun.id_akun' => $id_akun,
            'tb_datasocket.no_seri' => $no_seri
        );

        $db = $this->order->cek_db2($kondisi);

        if ($db->num_rows() == 0) {
            $this->load->view('errors/html/buatan');
        }else{
            $this->load->view('order/tampil_akun', array('data' => $db->row()));
        }

    }

    public function send_akun()
    {   
        $no_seri = $this->input->post('no_seri');
        $id_akun = $this->input->post('id_akun');

        $this->form_validation->set_rules(
            'username', 'Username',
            'required|min_length[5]|max_length[12]|is_unique[tb_akun.username]',
            array(
                    'required'      => 'You have not provided %s.',
                    'is_unique'     => 'This %s already exists.'
            )
        );

        $this->form_validation->set_rules('password', 'Password', 'required');
        $this->form_validation->set_rules('passconf', 'Password Confirmation', 'required|matches[password]');

        if ($this->form_validation->run() == FALSE)
        {

            $this->session->set_flashdata("message","
                <div class='alert alert-warning alert-dismissible fade show' role='alert'>
                <strong>".validation_errors()."</strong>
                <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                    <span aria-hidden='true'>&times;</span>
                </button>
                </div>

            ");

            redirect(site_url('C_order/konfrim_akun/'.$no_seri.'/'.$id_akun));

        }else{
            
            $kondisi1 = array(
                'id_akun' =>  $this->input->post('id_akun')
            );

            $kondisi2 = array(
                'no_seri' =>  $this->input->post('no_seri')
            );

            $data1 = array(
                'username' => $this->input->post('username'),
                'password' => sha1($this->input->post('password')),
                'status' => 'aktif'
            );

            $data2 = array(
                'status' => 'aktif',
            );

            $this->order->update_akun($kondisi1,$data1);
            $this->alat->update_alat($kondisi2,$data2);

            redirect(site_url('C_order/konfrim_akun/'.$no_seri.'/'.$id_akun));
        }
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

        $this->session->set_userdata('kom_acak', $result);

    }

}

/* End of file C_bayar_listrik.php */
/* Location: ./application/controllers/C_bayar_listrik.php */
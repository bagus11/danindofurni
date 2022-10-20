<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home_controller extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Home_model');
		$this->load->library('email');
		$this->load->library('form_validation');
		$this->load->library('session');
	
	}
	public function index()
	{
		$jenis_product = $this->Home_model->get_jenis_product();
		$profile = $this->Home_model->get_profile_perusahaan();
		$product = $this->Home_model->get_product();
		$karyawan = $this->Home_model->get_karyawan();
		$data['jenis_product'] = $jenis_product;
		$data['profile'] = $profile;
		$data['product'] = $product;
		$data['karyawan'] = $karyawan;
		$this->load->view('template/header');
		$this->load->view('template/navbar');
		$this->load->view('welcome_message',$data);
		$this->load->view('template/footer');

	//	echo json_encode($data);
	}

    public function detail_barang($id_barang)
	{
     
		$detail_barang = $this->Home_model->detail_product_by_id($id_barang);
        // var_dump($detail_barang);
        $profile = $this->Home_model->get_profile_perusahaan();
        $data['profile'] = $profile;
		$data['detail_barang'] = $detail_barang;
		$this->load->view('template/header');
		$this->load->view('template_product/navbar');
		$this->load->view('template_product/v_detail_barang',$data);
		$this->load->view('template/footer');
	}

	public function contact()
	{
		
		
		$this->form_validation->set_rules('name', 'Name', 'trim|required|min_length[4]|max_length[55]');
		$this->form_validation->set_rules('subject', 'Subject', 'trim|required|min_length[4]|max_length[55]');
		$this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email|min_length[6]|max_length[60]');
		$this->form_validation->set_rules('message', 'Message', 'trim|required|min_length[5]|max_length[200]');

		$jenis_product = $this->Home_model->get_jenis_product();
		$profile = $this->Home_model->get_profile_perusahaan();
		$product = $this->Home_model->get_product();
		$karyawan = $this->Home_model->get_karyawan();
		$data['jenis_product'] = $jenis_product;
		$data['profile'] = $profile;
		$data['product'] = $product;
		$data['karyawan'] = $karyawan;
		if ($this->form_validation->run() === FALSE)
		{
			echo('test');
		
		} else {
	
			//Get the form data
			$name = $this->input->post('name');
			$from_email = $this->input->post('email');
			$subject = $this->input->post('subject');
			$message = $this->input->post('message');
			$email_to= $this->input->post('email_to');

			$data = array(
				 'name' => $name,
				 'from_email' => $from_email,
				 'subject' => $subject,
				 'message' => $message,
			 );
			 // var_dump($data);die();
			 $this->db->insert('feedback', $data);
			//Web master email
			$to_email = $email_to; //Webmaster email, who receive mails
			

			//Mail settings
			$config['protocol'] = 'smtp';
			$config['smtp_host'] = 'ssl://smtp.gmail.com';
			$config['smtp_port'] = '465';
			$config['smtp_user'] = 'kutukan3@gmail.com'; // Your email address
			$config['smtp_pass'] = 'kokopolo123123'; // Your email account password
			$config['mailtype'] = 'html'; // or 'text'
			$config['charset'] = 'iso-8859-1';
			$config['wordwrap'] = TRUE; //No quotes required
			$config['newline'] = "\r\n"; //Double quotes required
	
			$email = $this->load->view('send_mail.php', $data, TRUE);
			$this->email->initialize($config);                        
	
			//Send mail with data
			$this->email->from($from_email, $name);
			$this->email->to($to_email);
			$this->email->subject($subject);
			$this->email->message($email);
			
			if ($this->email->send())
			{
				$this->session->set_flashdata('msg','<div class="alert alert-success">Mail sent!</div>');
				redirect('/');
			} else {

				show_error($this->email->print_debugger());
			}
	
		}
	}

}

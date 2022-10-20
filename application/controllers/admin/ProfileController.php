<?php
defined('BASEPATH') or exit('No direct script access allowed');

class ProfileController extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        checkSession();
        $this->load->model('admin/Profile_model');
    }

    public function index($js = null)
    {   
        $data = [
            'js' => $js,
            'profile' =>  $this->Profile_model->getDataProfile()
        ];
        $this->load->view('admin/templates/header');
        $this->load->view('admin/templates/sidebar');
        $this->load->view('admin/v_profile',$data);
        $this->load->view('admin/templates/footer',$js);
    }

    public function updateData()
    {
        $id = $this->input->post('id');
        $nama = $this->input->post('nama');
        $deskripsi = $this->input->post('deskripsi');
        $visi = $this->input->post('visi');
        $misi = $this->input->post('misi');
        $email = $this->input->post('email');
        $lokasi = $this->input->post('lokasi');
        $maps = $this->input->post('maps');
        $nohp = $this->input->post('nohp');
        $wa = $this->input->post('wa');
        $ig = $this->input->post('ig');
        $fb = $this->input->post('fb');

        $data = array(
            'nama' => $nama,
            'deskripsi' => $deskripsi,
            'visi' => $visi,
            'misi' => $misi,
            'email' => $email,
            'lokasi' => $lokasi,
            'link_google' => $maps,
            'no_hp' => $nohp,
            'link_wa' => $wa,
            'link_instagram' => $ig,
            'link_facebook' => $fb,
        );

        $kondisi = array(
            'id' => $id
        );

        $update = $this->Profile_model->update($data,$kondisi);

        if($update){
            redirect('kaji-admin-login/profile','refresh');
        }else{
            echo 'data gagal diupdate';
        }
    }

    public function updateLogo()
    {
        $id = $this->input->post('id');
        $oldFoto = $this->input->post('oldFoto');
        $logo = $_FILES["logo"]["name"];
        
        // var_dump($logo);
        // die();
        
        if($logo != null)
        {
            if($oldFoto != null)
            {
                unlink('upload/profile/' . $oldFoto);
            }

            $config['upload_path']          = 'upload/profile/';
            $config['allowed_types']        = 'gif|jpg|png';
            $config['file_name']            = 'Logo_1';
            
            $config['overwrite']			= true;
            $config['max_size']             = 2048; // 1MB
            // $config['max_width']            = 1024;
            // $config['max_height']           = 768;
            $this->load->library('upload', $config);
            if ($this->upload->do_upload('logo')) {
                $avatar =  $this->upload->data("file_name");
            }
            // print_r($this->upload->display_errors()); exit;
            // $avatar = "default.jpg";
        }else{
            $avatar = $oldFoto;
        }

        $data = array(
            'logo'  => $avatar,
        );

        $kondisi = array(
            'id' => $id
        );

        $update = $this->Profile_model->update($data,$kondisi);

        if($update){
            redirect('kaji-admin-login/profile','refresh');
        }else{
            echo 'data gagal diupdate';
        }
    }

    private function _uploadImage()
	{
		$config['upload_path']          = './upload/profile/';
		$config['allowed_types']        = 'gif|jpg|png';
		
		$config['overwrite']			= true;
		$config['max_size']             = 1024; // 1MB
		// $config['max_width']            = 1024;
		// $config['max_height']           = 768;
		$this->load->library('upload', $config);
		if ($this->upload->do_upload('ft_karyawan')) {
			return $this->upload->data("file_name");
		}
		print_r($this->upload->display_errors()); exit;
		return "default.jpg";
    }
}
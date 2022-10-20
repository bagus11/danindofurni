<?php
defined('BASEPATH') or exit('No direct script access allowed');

class KaryawanController extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        checkSession();
        $this->load->model('admin/Karyawan_model', 'modelKaryawan');
        $this->load->library('form_validation');
    }

    public function rules()
    {
        $this->form_validation->set_rules(
            'nama',
            'Nama',
            'required',
            array(
                'required' => 'Nama karyawan Tidak boleh kosong.',
            )
        );
        $this->form_validation->set_rules(
            'jabatan',
            'Jabatan',
            'required',
            array('required' => 'Jabatan Tidak boleh kosong.')
        );$this->form_validation->set_rules(
            'ig',
            'IG',
            'required',
            array('required' => 'Link IG Tidak boleh kosong.')
        );
        $this->form_validation->set_rules(
            'fb',
            'FB',
            'required',
            array('required' => 'Link FB Tidak boleh kosong.')
        );
        $this->form_validation->set_rules(
            'twitter',
            'Twitter',
            'required',
            array('required' => 'Link Twitter Tidak boleh kosong.')
        );
        $this->form_validation->set_rules(
            'linked',
            'LinkedIN',
            'required',
            array('required' => 'Link LinkedIN Tidak boleh kosong.')
        );
        // $this->form_validation->set_rules(
        //     'foto',
        //     'Foto',
        //     'required',
        //     array('required' => 'Foto Tidak boleh kosong.')
        // );
        if ($this->form_validation->run()) {
            $array = array(
                'success' => false
            );
        } else {
            $array = array(
                'success'   => true,
                'nama_error' => form_error('nama'),
                'jabatan_error' => form_error('jabatan'),
                'ig_error' => form_error('ig'),
                'fb_error' => form_error('fb'),
                'twitter_error' => form_error('twitter'),
                'linked_error' => form_error('linked'),
                // 'foto_error' => form_error('foto'),
            );
        }

        return $array;
    }

    public function index($js='js_karyawan')
    {
        $data['js'] = $js;
        $data['karyawan'] = $this->modelKaryawan->getDataKaryawan();
        $this->load->view('admin/templates/header');
        $this->load->view('admin/templates/sidebar');
        $this->load->view('admin/v_karyawan',$data);
        $this->load->view('admin/templates/footer',$js);
    }

    public function simpanKaryawan()
    {
        $data = array(

           // 'id'       => $this->input->post("id"),
            'nama_karyawan' => $this->input->post("nama"),
            'jabatan'         => $this->input->post("jabatan"),
            'link_instagram'         => $this->input->post("ig"),
            'link_facebook'         => $this->input->post("fb"),
            'link_twitter'         => $this->input->post("twitter"),
            'link_linked'         => $this->input->post("linked"),
            'image' => $this->_uploadImage()

        );
        // var_dump($data);die();
        $validate = $this->rules();
        $this->db->insert('profile_karyawan', $data);
    }

    private function _uploadImage()
	{
        
		$config['upload_path']          = 'upload/profile/';
		$config['allowed_types']        = 'gif|jpg|png';
        // $config['file_name']            = explode(' ',$name)[0];
		
        // $foto_karyawan=;
      
		$config['overwrite']			= true;
		$config['max_size']             = 1024; // 1MB
		// $config['max_width']            = 1024;
		// $config['max_height']           = 768;
		$this->load->library('upload', $config);
		if (    $this->upload->do_upload('ft_karyawan')) {
			return $this->upload->data("file_name");
		}
		print_r($this->upload->display_errors()); exit;
		return "default.jpg";
    }

    public function hapus_karyawan()
    {
        $id = $this->input->post('id', true);

        $delete = $this->modelKaryawan->deleteKaryawan($id);
        $data['delete'] = $delete;
        echo json_encode($data);
    }
    
    public function updateKaryawan()
    {
        
        $id = $this->input->post('id');
        $nama = $this->input->post('nama');
        $jabatan = $this->input->post('jabatan');
        $ig = $this->input->post('ig');
        $fb = $this->input->post('fb');
        $twitter = $this->input->post('twitter');
        $linked = $this->input->post('linked');
        $oldFoto = $this->input->post('oldFoto');
        $foto = $_FILES['foto']['name'];
        // $input...

        // tanpa foto
        if ($foto == null) {
            $data = array(
                'nama_karyawan' => $nama,
                'jabatan' => $jabatan,
                'link_instagram' => $ig,
                'link_facebook' => $fb,
                'link_twitter' => $twitter,
                'link_linked' => $linked,
                'image' => $oldFoto
            );

            $validate = $this->rules();
            if ($validate['success']) {
                // $this->modelKaryawan->update_karyawan($id, $data);
                $this->db->where('id', $id);
                $this->db->update('profile_karyawan', $data);
                $this->session->set_flashdata('success', 'Sukses gan');
                redirect(base_url('kaji-admin-login/karyawan'));
                $response = array('status_image' => false, 'success' => true, 'messages' => 'berhasil menyimpan data', 'validate' => $validate, 'token' => $this->security->get_csrf_hash());
            }
            else{
                $response = array('status_image' => false, 'success' => false, 'validate' => $validate, 'token' => $this->security->get_csrf_hash());
                }
        } else {
            // include foto
            if ($oldFoto !== null)
            {
                unlink('upload/profile/'.$oldFoto);
            }

            $config ["upload_path"] = 'upload/profile/';
            $config ["allowed_types"] = 'gif|jpg|png|jpeg';
            $config ["max_size"] = 2048;
            $config ["file_name"]   = 'Profile_'.$nama;
            
            $this->load->library('upload',$config);
            if(!$this->upload->do_upload('foto'))
            {
                echo "Upload gagal";
                die();
            }else {
                $avatar = $this->upload->data('file_name');
            }
            // insert db
            $data = array(
                'nama_karyawan' => $nama,
                'jabatan' => $jabatan,
                'link_instagram' => $ig,
                'link_facebook' => $fb,
                'link_twitter' => $twitter,
                'link_linked' => $linked,
                'image' => $avatar
            );

            $validate = $this->rules();
            if ($validate['success']) {
                // $this->modelKaryawan->update_karyawan($id, $data);
                $this->db->where('id', $id);
                $this->db->update('profile_karyawan', $data);
                $this->session->set_flashdata('success', 'Sukses gan');
                redirect(base_url('kaji-admin-login/karyawan'));
                $response = array('status_image' => false, 'success' => true, 'messages' => 'berhasil menyimpan data', 'validate' => $validate, 'token' => $this->security->get_csrf_hash());
            }
            else{
                $response = array('status_image' => false, 'success' => false, 'validate' => $validate, 'token' => $this->security->get_csrf_hash());
                }
        }
        
    }
}
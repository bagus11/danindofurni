<?php
defined('BASEPATH') or exit('No direct script access allowed');

class ProductController extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        checkSession();
        $this->load->model('product_model');
        $this->load->library('form_validation');
    }

    public function rules()
    {
        $this->form_validation->set_rules(
            'product',
            'Product',
            'required',
            array(
                'required' => 'Product Tidak boleh kosong.',
            )
        );
        $this->form_validation->set_rules(
            'harga',
            'Harga',
            'required',
            array(
                'required' => 'Harga tidak boleh kosong.',
            )
        );
        $this->form_validation->set_rules(
            'panjang',
            'Panjang',
            'required',
            array(
                'required' => 'Harga tidak boleh kosong.',
            )
        );
        if ($this->form_validation->run()){
            $array = array(
                'success' => false
            );
        }else{
            $array = array(
                'success' => true,
                'jenis_error' => form_error('jenis'),
                'deskripsi_error' => form_error('deskripsi'),
                'icon_error' => form_error('icon')
            );
        }

        return $array;
    }

    public function rules_ubah()
    {
        $this->form_validation->set_rules(
            'judul_ubah',
            'Judul',
            'required',
            array(
                'required' => 'Judul Tidak boleh kosong.',
            )
        );
        $this->form_validation->set_rules(
            'deskripsi_ubah',
            'Deskripsi',
            'required',
            array(
                'required' => 'Deskripsi tidak boleh kosong.',
            )
        );
        if ($this->form_validation->run()){
            $array = array(
                'success' => false
            );
        }else{
            $array = array(
                'success' => true,
                'judul_ubah_error' => form_error('judul'),
                'deskripsi_ubah_error' => form_error('deskripsi'),
                // 'icon_error' => form_error('icon')
            );
        }
        
        return $array;
    }

    public function index()
    {
        $get_product = $this->product_model->get_product();
        $get_jenis = $this->product_model->get_jenis_product();
        $data['product'] = $get_product;
        $data['jenis'] = $get_jenis;
        admin_template('admin/v_product', $data, 'js_product');
    }

    public function simpan_product()
    {
        $config["upload_path"] = 'upload/product';
        $config["allowed_types"] = 'gif|jpg|png|jpeg';
        $config['max_size'] = 2048;
        $img = $this->input->post('gambar');
        

        if ($img != 'undefined') 
        {
            $ext = pathinfo($_FILES['gambar']['name'], PATHINFO_EXTENSION);
            $config['file_name'] = $this->input->post('nama') . date("d-m-Y H_i_s")  . '.' . $ext;
        }

        // if ($this->input->post('image2') != 'undefined') 
        // {
        //     $ext = pathinfo($_FILES['image2']['name'], PATHINFO_EXTENSION);
        //     $config['file_name'] = $this->input->post('nama') . date("d-m-Y H_i_s")  . '.' . $ext;
        // }

        // if ($this->input->post('image3') != 'undefined') 
        // {
        //     $ext = pathinfo($_FILES['image3']['name'], PATHINFO_EXTENSION);
        //     $config['file_name'] = $this->input->post('nama') . date("d-m-Y H_i_s")  . '.' . $ext;
        // }

        $this->load->library('upload', $config);
        $validate = $this->rules();

        if (!$validate['success']){
            if (!$this->upload->do_upload('image1')) {
                $msg = $this->upload->display_errors();
                $response = array('status_image' => true, 'messages' => $msg, 'validate' => $validate, 'token' => $this->security->get_csrf_hash());
                echo json_encode($response);
                exit();
            } else {
                $input = $this->input->post();
                $upload = $this->upload->data();
                chmod($upload['full_path'], 0777);
                $params = array(
                    'nama' => $input['nama'],
                    'deskripsi' => $input['deskripsi'],
                    'image1' => $upload['image_1'],
                );

                $this->db->insert('product', $params);
                $response = array('status_image' => false, 'success' => true, 'messages' => 'berhasil menyimpan data', 'validate' => $validate);
            }
        } else {
            $response = array('status_image' => false, 'success' => false, 'validate' => $validate, 'token' => $this->security->get_csrf_hash());
        }

        echo json_encode($response);
        
    }

    function add(){
        if($this->input->post('membersubmit')){
            
            //Check whether Member upload profile_img
            if(!empty($_FILES['profile_img']['name'])){
                $config['upload_path'] = 'uploads/images/';
                $config['allowed_types'] = 'jpg|jpeg|png|gif';
                $config['file_name'] = $_FILES['profile_img']['name'];
                
                //Load upload library and initialize here configuration
                $this->load->library('upload',$config);
                $this->upload->initialize($config);
                
                if($this->upload->do_upload('profile_img')){
                    $uploadData = $this->upload->data();
                    $profile_img = $uploadData['file_name'];
                }else{
                    $profile_img = '';
                }
            }else{
                $profile_img = '';
            }
            
            //Prepare array of Member data
            $MemberData = array(
                'name' => $this->input->post('name'),
                'email' => $this->input->post('email'),
                'profile_img' => $profile_img
            );
            
            //Pass Member data to model
            $insertMemberData = $this->Member->insert($MemberData);
            
            //Storing insertion status message.
            if($insertMemberData){
                $this->session->set_flashdata('success_msg', 'Member data have been added successfully.');
            }else{
                $this->session->set_flashdata('error_msg', 'Some problems occured, please try again.');
            }
        }
        //Form for adding Member data
        $this->load->view('members/add');
    }
}
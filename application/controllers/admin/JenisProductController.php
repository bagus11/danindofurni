<?php
defined('BASEPATH') or exit('No direct script access allowed');

class JenisProductController extends CI_Controller
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
            'jenis',
            'Jenis',
            'required',
            array(
                'required' => 'Jenis product Tidak boleh kosong.',
            )
        );
        $this->form_validation->set_rules(
            'deskripsi',
            'Deskripsi',
            'required',
            array('required' => 'Deskripsi Tidak boleh kosong.')
        );$this->form_validation->set_rules(
            'icon',
            'Icon',
            'required',
            array('required' => 'Icon Tidak boleh kosong.')
        );
        if ($this->form_validation->run()) {
            $array = array(
                'success' => false
            );
        } else {
            $array = array(
                'success'   => true,
                'jenis_error' => form_error('jenis'),
                'deskripsi_error' => form_error('deskripsi'),
                'icon_error' => form_error('icon'),
            );
        }

        return $array;
    }


    public function rules_ubah()
    {
        $this->form_validation->set_rules(
            'jenis_ubah',
            'Jenis',
            'required',
            array(
                'required' => 'Jenis Tidak boleh kosong.',
            )
        );
        $this->form_validation->set_rules(
            'deskripsi_ubah',
            'Deskripsi',
            'required',
            array('required' => 'Deskripsi Tidak boleh kosong.')
        );
        $this->form_validation->set_rules(
            'ikon',
            'Icon',
            'required',
            array('required' => 'Icon Tidak boleh kosong.')
        );
        if ($this->form_validation->run()) {
            $array = array(
                'success' => false
            );
        } else {
            $array = array(
                'success'   => true,
                'judul_ubah_error' => form_error('judul_ubah'),
                'deskripsi_ubah_error' => form_error('deskripsi_ubah'),
                'ikon_error' => form_error('ikon_ubah')
            );
        }

        return $array;
    }

    public function index()
    {
        $get_jenis_product = $this->product_model->get_jenis_product();
        $data['jenis'] = $get_jenis_product->result();
        admin_template('admin/v_jenis_product', $data, 'js_jenis_product');
    }

    public function simpan_jenis()
     {
            $input = $this->input->post();
            $params = array(
                'jenis_product' => $input['jenis'],
                'deskripsi' => $input['deskripsi'],
                'icon' => $input['icon'],
            );

            $validate = $this->rules();
            if (!$validate['success']) {
            $this->db->insert('jenis_product', $params);
            $response = array('status_image' => false, 'success' => true, 'messages' => 'berhasil menyimpan data', 'validate' => $validate, 'token' => $this->security->get_csrf_hash());
            }
            else {
                $response = array('status_image' => false, 'success' => false, 'validate' => $validate, 'token' => $this->security->get_csrf_hash());
            }
        echo json_encode($response);
        
    }

    public function ubah_jenis()
    {
        $input = $this->input->post(null, true);
        $params = array(
            'id' => $input['id'],
            'jenis_product' => $input['jenis_ubah'],
            'deskripsi' => $input['deskripsi_ubah'],
            'icon' => $input['ikon']
        );
        $validate = $this->rules_ubah();
        if (!$validate['success']) {
            $this->db->where('id', $input['id']);
            $this->db->update('jenis_product', $params);
            $response = array('success' => true, 'messages' => 'berhasil menyimpan data', 'validate' => $validate);
        } else {
            $response = array('success' => false, 'validate' => $validate, 'token' => $this->security->get_csrf_hash());
        }
        
        echo json_encode($response);

    }

    public function hapus_jenis()
    {
        $id = $this->input->post('id', true);

        $delete = $this->product_model->delete_jenis($id);
        $data['delete'] = $delete;
        echo json_encode($data);
    }

    public function get_data_jenis(){
		$data_jenis = $this->product_model->getDataJenis();

		$data['data_jenis'] = $data_jenis;
		echo json_encode($data);
	}
}
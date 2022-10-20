<?php
defined('BASEPATH') or exit('No direct script access allowed');

class ProfileController extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        checkSession();
        $this->load->model('admin/Profile_model');
        $this->load->library('form_validation');
    }

    public function rules_identitas()
    {
        $this->form_validation->set_rules(
            'nama_perusahaan',
            'Nama Perusahaan',
            'required',
            array(
                'required' => 'Nama Perusahaan Tidak boleh kosong.',
            )
        );

        $this->form_validation->set_rules(
            'deskripsi_profile',
            'Deskripsi Profile',
            'required',
            array(
                'required' => 'Deskripsi Perusahaan Tidak boleh kosong.',
            )
        );

        $this->form_validation->set_rules(
            'visi',
            'Visi Perusahaan',
            'required',
            array(
                'required' => 'Visi Perusahaan Tidak boleh kosong.',
            )
        );

        $this->form_validation->set_rules(
            'misi',
            'Misi Perusahaan',
            'required',
            array(
                'required' => 'Misi Perusahaan Tidak boleh kosong.',
            )
        );

        $this->form_validation->set_rules(
            'slogan',
            'Slogan Perusahaan',
            'required',
            array(
                'required' => 'Slogan Perusahaan Tidak boleh kosong.',
            )
        );

        $this->form_validation->set_rules(
            'email',
            'Email Perusahaan',
            'required',
            array(
                'required' => 'Email Perusahaan Tidak boleh kosong.',
            )
        );

        $this->form_validation->set_rules(
            'lokasi',
            'Lokasi Perusahaan',
            'required',
            array(
                'required' => 'Lokasi Perusahaan Tidak boleh kosong.',
            )
        );

        $this->form_validation->set_rules(
            'gmap',
            'Link Google Maps',
            'required',
            array(
                'required' => 'Link Google Maps Tidak boleh kosong.',
            )
        );

        $this->form_validation->set_rules(
            'nohp',
            'No HP',
            'required',
            array(
                'required' => 'No HP Tidak boleh kosong.',
            )
        );

        if ($this->form_validation->run()) {
            $array = array(
                'success' => false
            );
        } else {
            $array = array (
                'success' => true,
                'nama_perusahaan_error'      => form_error('nama_perusahaan'),
                'deskripsi_perusahaan_error' => form_error('deskripsi_profile'),
                'visi_perusahaan_error'      => form_error('visi'),
                'misi_perusahaan_error'      => form_error('misi'),
                'slogan_perusahaan_error'    => form_error('slogan'),
                'email_error'                => form_error('email'),
                'lokasi_error'               => form_error('lokasi'),
                'gmap_error'                 => form_error('gmap'),
                'wa_error'                   => form_error('link_wa'),
            );
        }
        return $array;
    }

    public function index()
    {
        admin_template('admin/v_profile', null, 'js_profile');
    }

    public function simpan_identitas_perusahaan()
     {
        $input = $this->input->post(null, true);
        $validate = $this->rules_identitas();
        if (!$validate['success']) {
            $this->profile_model->simpan_identitas($input);
            $response = array('success' => true, 'messages' => 'berhasil menyimpan data', 'validate' => $validate, 'token' => $this->security->get_csrf_hash());
        } else {
            $response = array('success' => false, 'validate' => $validate, 'token' => $this->security->get_csrf_hash());
        }
        echo json_encode($response);
    }

    // public function simpan_identitas()
    // {
    //     $input = $this->input->post();
    //     $data = [
    //         'nama'          => $input['nama_perusahaan'],
    //         'deskripsi'     => $input['deskripsi_profile'],
    //         'visi'          => $input['visi'],
    //         'misi'          => $input['misi'],
    //         'slogan'        => $input['slogan'],
    //         'email'         => $input['email'],
    //         'lokasi'        => $input['lokasi'],
    //         'gmap'          => $input['gmap'],
    //         'nohp'          => $input['nohp'],
    //         'link_wa'       => $input['link_wa'],
    //     ];
    //     $this->db->where('id',1);
    //     $this->db->update('product_profile',$data);
    // }


}
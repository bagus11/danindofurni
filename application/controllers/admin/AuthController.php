<?php
defined('BASEPATH') or exit('No direct script access allowed');

class AuthController extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        hasLogin();
        $this->load->view('admin/v_login');
    }

    public function login()
    {
        $username = $this->input->post('username',TRUE);
        $password = $this->input->post('password',TRUE);

        $cek  = $this->db->get_where('user',['username' => $username]);
        if ($cek->num_rows() > 0){
            // isi record
            $users = $cek->row();
            if (password_verify($password, $users->password)){
                // membuat session
                $this->session->set_userdata('user', $users);

                redirect(base_url('kaji-admin-login/dashboard'));
            }else{
                
                $this->session->set_flashdata('failed','Password salah !');
                redirect(base_url('kaji-admin-login'));
            }
        }
        else{
            $this->session->set_flashdata('failed', 'Username tidak tersedia !');
            redirect(base_url('kaji-admin-login'));
        }
    }

    public function logout()
    {
        $this->session->sess_destroy();
        redirect(base_url('kaji-admin-login'));
    }
}
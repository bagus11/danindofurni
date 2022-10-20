<?php

function admin_template($view, $data = null, $js = null)
{
    $ci = get_instance();
    $dataJs['js'] = $js;
    $ci->load->view('admin/templates/header');
    $ci->load->view('admin/templates/sidebar');
    $ci->load->view($view, $data);
    $ci->load->view('admin/templates/footer', $dataJs);
}

function get_perusahaan()
{
    $ci = get_instance();
    $query = $ci->db->get('profile_perusahaan');
    return $query->row();
}

// function get_logo()
// {
//     // $ci = get_instance();
//     if (get_perusahaan()->logo != null || get_perusahaan()->logo != '') {
//         if (file_exists('uploads/logo/' . get_perusahaan()->logo)) {
//             $logo = base_url('uploads/logo/' . get_perusahaan()->logo);
//         } else {
//             $logo = base_url('assets/img/default_image.png');
//         }
//     } else {
//         $logo = base_url('assets/img/default_image.png');
//     }
//     return $logo;
// }

function userdata()
{
    $ci = get_instance();

    $user = $ci->session->userdata("user");
    $userdata = $ci->db->get_where("user", ["id" => $user->id]);

    return $userdata;
}

function checkSession()
{
    $ci = get_instance();
    if (!$ci->session->userdata("user")) {
        $ci->session->set_flashdata('failed', 'Anda Belum login, silahkan login terlebih dahulu !');
        redirect(base_url('kaji-admin-login'));
    }
}

function hasLogin()
{
    $ci = get_instance();
    if ($ci->session->userdata("user")) {
        redirect(base_url('kaji-admin-login/dashboard'));
    }
}

function uploadImage($request)
{
    $ci = get_instance();
    $config ["upload_path"] = 'upload/profile';
            $config ["allowed_types"] = 'gif|jpg|png|jpeg';
            $config ["max_size"] = 2048;
            $config ["file_name"]   = 'Profile_'.$request;
            
            $ci->load->library('upload',$config);
            if(!$ci->upload->do_upload('foto'))
            {
                echo "Upload gagal";
                die();
            }else {
                return $ci->upload->data('file_name');
            }

}
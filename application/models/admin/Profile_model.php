<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Profile_model extends CI_Model
{
    public function __construct()
    {
        $this->load->database();
    }

    // function simpan_logo_perusahaan($data)
    // {
    //     $this->db->where('id', get_perusahaan()->id);
    //     $query = $this->db->update('dek_perusahaan', $data);
    //     return $query;
    // }

    public function simpan_identitas($data)
    {
        $this->db->where('id', get_perusahaan()->id);
        $query = $this->db->update('profile_perusahaan', $data);
        return $query;
    }

    // public function simpan_profile($data)
    // {
    //     $this->db->where('id', get_perusahaan()->id);
    //     $query = $this->db->update('dek_perusahaan', $data);
    //     return $query;
    // }

    public function getDataProfile()
    {
        $query = $this->db->query('SELECT * FROM profile_perusahaan ORDER BY id ASC');
        return $query->result();
    }

    public function update($data,$kondisi)
    {
        $this->db->where($kondisi);
        $this->db->update('profile_perusahaan',$data);

        return true;
    }
}

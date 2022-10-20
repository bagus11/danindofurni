<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Karyawan_model extends CI_Model
{
    public function __construct()
    {
        $this->load->database();
    }

    public function getDataKaryawan()
    {
        $query = $this->db->query('SELECT * FROM PROFILE_KARYAWAN ORDER BY id ASC');
        return $query->result();
    }

    public function insertKaryawan($data)
    {
        $query = $this->db->insert('profile_karyawan',$data);
        if($query){
            return true;
        }else{
            return false;
        }
       
    }

    public function deleteKaryawan($id)
    {
        $this->db->trans_begin();
        $this->db->query("DELETE FROM profile_karyawan
                        WHERE id='$id'");
        if ($this->db->trans_status() === FALSE)
        {
            $this->db->trans_rollback();
            return 'fail';
        }
        else
        {
            $this->db->trans_commit();
            return 'sukses';
        }
    }

    public function updateKaryawan($id, $value)
    {
        $this->db->where('id', $id);
        $this->db->update('profile_karyawan', $value);
        return true;
    }
}
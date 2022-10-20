<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home_model extends CI_Model
{
    public function __construct()
    {
        $this->load->database();
    }

    public function get_jenis_product($id = null)
    {
        // $query = $this->db->select("*")
        //          ->from('jenis_product')
        //          ->get();
        //     return $query->result();
        //     echo $this->db->last_query();
        $query = $this->db->get('jenis_product');
        
        return $query->result();
    }

    public function get_profile_perusahaan($id = null)
    {
        $query = $this->db->select("*")
                 ->from('profile_perusahaan')
                 ->get();
            return $query->result();
          //  echo $this->db->last_query();
    }
    public function get_karyawan($id = null)
    {
        $query = $this->db->select("*")
                 ->from('profile_karyawan',4)
                 ->get();
            return $query->result();
          //  echo $this->db->last_query();
    }
    public function get_product($id = null)
    {
             $this->db->select('*');
             $this->db->from('view_product');
             $this->db->order_by('report_id','desc');
             $this->db->limit('3');
            $query= $this->db->get();
            return $query->result();
        
        }
        public function detail_product_by_id($id_barang)
        {
            $this->db->select('*');
            $this->db->from('product');
            $this->db->where('report_id',$id_barang);
            return $this->db->get()->row();
        }

  
}

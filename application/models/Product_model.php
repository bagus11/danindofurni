<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Product_model extends CI_Model
{
    public function __construct()
    {
        $this->load->database();
    }

    // public function get_jenis_product($id = null)
    // {
    //     $query = $this->db->get('jenis_product');
        
    //     return $query;
    // }

    public function get_profile_perusahaan($id = null)
    {
        $query = $this->db->select("*")
                 ->from('profile_perusahaan')
                 ->get();
            return $query;
          //  echo $this->db->last_query();
    }
    public function get_product($id = null)
    {
    $query = $this->db->get('view_product');
        return $query;
        echo $this->db->last_query();
    }
    public function detail_product_by_id($id_barang)
    {
        $this->db->select('*');
        $this->db->from('product');
        $this->db->where('report_id',$id_barang);
        return $this->db->get()->row();
    }
    public function get_jenis_product()
    {
        $this->db->select('*');
        $this->db->from('jenis_product');
        $query = $this->db->get();
        return $query;
    }

    public function getJenis()
    {
        return $this->db->get('jenis_product')->result();
        
    }

     public function getProduct()
     {
             return $this->db->select("product.*, jenis_product.jenis_product")
                     ->from('product')
                     ->join('jenis_product','jenis_product.id = product.id_jenis','inner')
                     ->order_by('report_id')->get()->result();
     }



    public function delete_jenis($id)
    {
        $this->db->trans_begin();
        $this->db->query("DELETE FROM jenis_product
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

    public function getDataJenis(){ 
        $this->db = $this->load->database('db_kaji', true);
        $str    = "SELECT * FROM jenis_product";
        $query  = $this->db->query($str);
        return $query->result_array();
    }

    public function insertProduct($data)
    {
        $this->db->insert('product', $data);

    }

    public function deleteProduct($id)
    {
        $this->db->trans_begin();
        $this->db->query("DELETE FROM product
                        WHERE report_id = '$id'");
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
  
}

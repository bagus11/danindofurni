<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Product_controller extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Product_model');
	}
	public function index()
	{
        $this->load->library('Pagination_bootstrap');
        $this->pagination_bootstrap->offset('15');
        $links = array(
            'next'=>'Next',
            'prev'=>'Previous'
        );
        $this->pagination_bootstrap->set_links($links);
		$jenis_product = $this->Product_model->get_jenis_product();
		$profile = $this->Product_model->get_profile_perusahaan();
		$product = $this->Product_model->get_product();
        $result = $this->pagination_bootstrap->config('/Product_controller/index',$product);
        $result_profile = $this->pagination_bootstrap->config('/Product_controller/index',$profile);
        $result_jenis = $this->pagination_bootstrap->config('/Product_controller/index',$jenis_product);
		$data['jenis_product'] = $jenis_product;
		//$data['profile'] = $profile;
		$data['results'] = $result;
		$data['profile'] = $result_profile;
		$data['result_jenis'] = $result_jenis;
		$data['product'] = $product;
		 $this->load->view('template/header');
		 $this->load->view('template_product/navbar');
		$this->load->view('product_view',$data);
		$this->load->view('template/footer');
        
        //	echo json_encode($data);
	}


}


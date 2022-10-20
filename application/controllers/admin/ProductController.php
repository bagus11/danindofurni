<?php
defined('BASEPATH') or exit('No direct script access allowed');

class ProductController extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        checkSession();
        $this->load->model('Product_model', 'modelProduct');
        $this->load->library('form_validation');
    }

    public function index($js = 'js_product')
    {   
        $data = [
            'js' => $js,
            'product' => $this->modelProduct->getProduct(),
            'jenis' => $this->modelProduct->getJenis(),
        ];
        $this->load->view('admin/templates/header');
        $this->load->view('admin/templates/sidebar');
        $this->load->view('admin/v_product',$data);
        $this->load->view('admin/templates/footer',$js);
    }

    public function insertProduct()
    {
        $nama = $this->input->post('nama');
        $jenis= $this->input->post('jenis');
        $harga= $this->input->post('harga');
        $panjang=$this->input->post('panjang');
        $lebar= $this->input->post('lebar');
        $tinggi= $this->input->post('tinggi');
        $deskripsi= $this->input->post('deskripsi');
        // $foto = $_FILES;
        // $hitung = count($_FILES['foto']['name']);

        // die(print_r($hitung));

        // $image = '';

        // for ($i=0; $i < $hitung ; $i++) { 
        //     $_FILES['foto']['name'] = $foto['foto']['name'][$i];
        //     $_FILES['foto']['type'] = $foto['foto']['type'][$i];
        //     $_FILES['foto']['tmp_name'] = $foto['foto']['tmp_name'][$i];
        //     $_FILES['foto']['error'] = $foto['foto']['error'][$i];
        //     $_FILES['foto']['size'] = $foto['foto']['size'][$i];  

        //     $this->upload->initialize($this->set_upload_options($nama, $i));
        //     $this->upload->do_upload('foto');
        //     $dataInfo[] = $this->upload->data('file_name');
            
        //     $image .= $dataInfo[$i].'|';
        // }

        // die(print_r($image));
        $data = [
            'id_jenis' => $jenis,
            'nama' => $nama,
            'harga'=>$harga,
            'panjang' => $panjang,
            'lebar' => $lebar,
            'tinggi'=> $tinggi,
            'deskripsi' => $deskripsi,
            'image_1' => $this->_uploadImage1(),
            'image_2' => $this->_uploadImage2(),
            'image_3' => $this->_uploadImage3(),
            'image_4' => $this->_uploadImage4(),
        ];

        $this->modelProduct->insertProduct($data);
        redirect(base_url('/kaji-admin-login/product'));
    }

    public function updateProduct()
    {
        $id = $this->input->post("id");
        $oldFoto1 =$this->input->post('old_image1');
        $oldFoto2 =$this->input->post('old_image2');
        $oldFoto3 =$this->input->post('old_image3');
        $oldFoto4 =$this->input->post('old_image4');
        ///print_r($_FILES); exit;
        if(!empty($_FILES["image_1"]["name"])) {
            unlink('upload/product/'.$oldFoto1);
            $image_1 = $this->_uploadImage1();
            //echo "ada"; exit;
        }else{
            $image_1 =$this->input->post("old_image1");
            //echo "kosong"; exit;
        }

        if(!empty($_FILES["image_2"]["name"])) {
            unlink('upload/product/'.$oldFoto2);
            $image_2 = $this->_uploadImage2();
            //echo "ada"; exit;
        }else{
            $image_2 =$this->input->post("old_image2");
            //echo "kosong"; exit;
        }

        if(!empty($_FILES["image_3"]["name"])) {
            unlink('upload/product/'.$oldFoto3);
            $image_3 = $this->_uploadImage3();
            //echo "ada"; exit;
        }else{
            $image_3 =$this->input->post("old_image3");
            //echo "kosong"; exit;
        }

        if(!empty($_FILES["image_4"]["name"])) {
            unlink('upload/product/'.$oldFoto4);
            $image_4 = $this->_uploadImage4();
            //echo "ada"; exit;
        }else{
            $image_4 =$this->input->post("old_image4");
            //echo "kosong"; exit;
        }
       
            $data = array(

                'nama'       => $this->input->post("nama"),
                'id_jenis' => $this->input->post("jenis"),
                'harga'         => $this->input->post("harga"),
                'panjang'    => $this->input->post("panjang"),
                'lebar'    => $this->input->post("lebar"),
                'tinggi'    => $this->input->post("tinggi"),
                'deskripsi'    => $this->input->post("deskripsi"),
                'image_1'    => $image_1,
                'image_2'    => $image_2,
                'image_3'    => $image_3,
                'image_4'    => $image_4,
            );
    


            $this->db->where('report_id', $id);
            $this->db->update('product', $data);
        $this->session->set_flashdata('success', 'Product berhasil ditambahkan');
        redirect(base_url('kaji-admin-login/product'));
        // $this->session->set_flashdata('notif', '<div class="alert alert-success alert-dismissible"> Success! data berhasil diupdate didatabase.
        //                                         </div>');

        //redirect
        redirect('admin/karyawan');

    }

    //function upload 4 image
    private function _uploadImage1()
	{
        $nama = $this->input->post('nama');
		$config['upload_path']          = 'upload/product/';
		$config['allowed_types']        = 'gif|jpg|png';
        $config['file_name']            = $nama.'_1';
		
        // $foto_karyawan=;
      
		$config['overwrite']			= true;
		$config['max_size']             = 1024; // 1MB
		// $config['max_width']            = 1024;
		// $config['max_height']           = 768;
		$this->load->library('upload', $config);
		if ($this->upload->do_upload('image_1')) {
			return $this->upload->data("file_name");
		}
		// print_r($this->upload->display_errors()); exit;
		return "default.jpg";
    }

    private function _uploadImage2()
	{
        $nama = $this->input->post('nama');
		$config['upload_path']          = 'upload/product/';
		$config['allowed_types']        = 'gif|jpg|png';
        $config['file_name']            = $nama.'_2';
        // $config['file_name']            = explode(' ',$name)[0];
		
        // $foto_karyawan=;
      
		$config['overwrite']			= true;
		$config['max_size']             = 1024; // 1MB
		// $config['max_width']            = 1024;
		// $config['max_height']           = 768;
		$this->load->library('upload', $config);
		if (    $this->upload->do_upload('image_2')) {
			return $this->upload->data("file_name");
		}
		// print_r($this->upload->display_errors()); exit;
		return "default.jpg";
    }

    private function _uploadImage3()
	{
        $nama = $this->input->post('nama');
		$config['upload_path']          = 'upload/product/';
		$config['allowed_types']        = 'gif|jpg|png';
        $config['file_name']            = $nama.'_3';
		
        // $foto_karyawan=;
      
		$config['overwrite']			= true;
		$config['max_size']             = 1024; // 1MB
		// $config['max_width']            = 1024;
		// $config['max_height']           = 768;
		$this->load->library('upload', $config);
		if (    $this->upload->do_upload('image_3')) {
			return $this->upload->data("file_name");
		}
		// print_r($this->upload->display_errors()); exit;
		return "default.jpg";
    }

    private function _uploadImage4()
	{
        $nama = $this->input->post('nama');
		$config['upload_path']          = 'upload/product/';
		$config['allowed_types']        = 'gif|jpg|png';
        $config['file_name']            = $nama.'_4';
		
        // $foto_karyawan=;
      
		$config['overwrite']			= true;
		$config['max_size']             = 1024; // 1MB
		// $config['max_width']            = 1024;
		// $config['max_height']           = 768;
		$this->load->library('upload', $config);
		if (    $this->upload->do_upload('image_4')) {
			return $this->upload->data("file_name");
		}
		// print_r($this->upload->display_errors()); exit;
		return "default.jpg";
    }

    public function hapusProduct()
    {
        $id = $this->input->post('report_id', true);
        
        $delete = $this->modelProduct->deleteProduct($id);
        $data['delete'] = $delete;
        echo json_encode($data);
    }
}
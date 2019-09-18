<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Product extends CI_Controller {


	function __construct() {
		parent::__construct();
		$this->load->model('Product_Model');
	}

	public function index(){

	}

	public function insert_new_product(){
		$response = array();
		
		if($_FILES['IMG'] && $_FILES['IMG']['name'] != ''){
			$target_dir = "public/images/product_logo/";
			$file_name = date('Y_m_d_h_m_s_').basename($_FILES["IMG"]["name"]);
			$target_file = $target_dir.$file_name;
			$_POST['IMG'] = $target_file;
			if (move_uploaded_file($_FILES["IMG"]["tmp_name"], $target_file)) {
				$res = $this->Product_Model->insert_item($_POST);
			} else {
				$response = array('code'=>1001 , 'status'=>'faield');
				echo json_encode($response);
				exit;
			}
		}else{
			$res = $this->Product_Model->insert_item($_POST);
		}
		
		if($res){
			$response = array('code'=>1000 , 'status'=>'success' , 'data'=>$res);
		}else{
			$response = array('code'=>1001 , 'status'=>'faield');
		}

		echo json_encode($response);
	}
	
}

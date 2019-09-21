<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Category extends CI_Controller {


	function __construct() {
		parent::__construct();
		$this->load->model('Category_Model');
	}

	public function index(){

	}

	public function insert_new_category(){
		$response = array();
		
		if($_FILES['IMG'] && $_FILES['IMG']['name'] != ''){
			$target_dir = "public/images/category_logo/";
			$file_name = date('Y_m_d_h_m_s_').basename($_FILES["IMG"]["name"]);
			$target_file = $target_dir.$file_name;
			$_POST['IMG'] = $target_file;
			if (move_uploaded_file($_FILES["IMG"]["tmp_name"], $target_file)) {
				$res = $this->Category_Model->insert_category($_POST);
			} else {
				$response = array('code'=>1001 , 'status'=>'faield');
				echo json_encode($response);
				exit;
			}
		}else{
			$res = $this->Category_Model->insert_category($_POST);
		}
		
		if($res){
			$response = array('code'=>1000 , 'status'=>'success' , 'data'=>$res);
		}else{
			$response = array('code'=>1001 , 'status'=>'faield');
		}

		echo json_encode($response);
	}

	
	
}

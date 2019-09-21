<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class SubCategory extends CI_Controller {


	function __construct() {
		parent::__construct();
		$this->load->model('Category_Model');
	}

	public function index(){

	}

	public function insert_new_subCategory(){
        $response = array();
        
			$res = $this->Category_Model->insert_new_subCategory($_POST);
		
		if($res){
			$response = array('code'=>1000 , 'status'=>'success' , 'data'=>$res);
		}else{
			$response = array('code'=>1001 , 'status'=>'faild');
		}

		echo json_encode($response);
	}
	
}

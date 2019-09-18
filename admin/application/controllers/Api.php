<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Api extends CI_Controller {

	function __construct() {
		parent::__construct();
		$this->load->model('APi_Model');
	}
	
	function get_top_category(){
		$response = array();
		$res = $this->APi_Model->get_top_categories();
		echo json_encode($res);
	}
}

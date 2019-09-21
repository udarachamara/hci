<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Api extends CI_Controller {

	function __construct() {
		parent::__construct();
		$this->load->model('APi_Model');
	}
	
	function get_top_category(){
		header('Content-type: application/json');
		header("Access-Control-Allow-Origin: *");
		header('Access-Control-Allow-Headers: X-Requested-With, content-type, access-control-allow-origin, access-control-allow-methods, access-control-allow-headers');
		$res = $this->APi_Model->get_top_categories();
		echo json_encode($res);
	}

	function get_active_products(){
		$res = $this->APi_Model->get_active_products();
		echo json_encode($res);
	}

	function get_active_products_by_category(){
		if(isset($_GET['category']))
			$category = $_GET['category'];
		else
		$category = 0;

		$res = $this->APi_Model->get_active_products_by_category($category);
		echo json_encode($res);
	}

	function get_active_products_by_search(){

		$postdata = file_get_contents("php://input");
		$request = json_decode($postdata,true);
		header('Content-type: application/json');
		header("Access-Control-Allow-Origin: *");
		header('Access-Control-Allow-Headers: X-Requested-With, content-type, access-control-allow-origin, access-control-allow-methods, access-control-allow-headers');

		if($request['Name'])
			$name = $request['Name'];
		else
			$name = '';

		$priceFrom = $request['PriceFrom'];
		$priceTo = $request['PriceTo'];

		$res = $this->APi_Model->get_active_products_by_search($name,$priceFrom,$priceTo);
		echo json_encode($res);

	}

	function get_active_product_by_id(){
		if(isset($_GET['Id']))
			$id = $_GET['Id'];
		else
			$id = 0;

		$res = $this->APi_Model->get_active_product_by_id($id);
		echo json_encode($res);
	}
}

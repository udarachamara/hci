<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Route extends CI_Controller {


	function __construct() {
		parent::__construct();
    }

    public function index(){
    	$this->load->view('dashboard');
    }

    public function login(){
        $data['disabled'] = true;
        $this->load->view('login_page',$data);
    }
    
    public function dashboard(){
        $this->load->view('dashboard');
    }


    public function product_all(){
        $this->load->model('Product_Model');
        $data['title'] = 'Product';
        $data['grid_data'] = $this->Product_Model->get_all_products();
        $this->load->view('product_page',$data);
	}

	public function category_all(){
        $this->load->model('Category_Model');
        $data['title'] = 'Category';
        $data['grid_data'] = $this->Category_Model->get_all_categories();
        $this->load->view('category_page',$data);
	}
	
	

}

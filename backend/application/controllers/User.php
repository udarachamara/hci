<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

	function __construct() {
		parent::__construct();
        $this->load->model('User_Model');
    }
	
	public function index()
	{
		$this->load->view('welcome_page');
	}
}

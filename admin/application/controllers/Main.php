<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Main extends CI_Controller {

	function __construct() {
		parent::__construct();
        $this->load->model('Main_Model');
    }
	
	public function index()
	{
		$this->load->view('welcome_page');
	}
}

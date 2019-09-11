<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {


	function __construct() {
		parent::__construct();
    }

    public function index(){
    	
    }
	
	public function authentication(){
        $this->load->model('Login_Model');
	    $username = $_POST['email'];
	    $password = sha1($_POST['password']);
	    $user = $this->Login_Model->get_auth_user($username , $password);
	    $response = array();
	    if($user){
	        $this->session->set_userdata('login_user' , $user);
	        $response = array('code'=>1000 , 'status'=> true , 'data'=>$user);
	    }else{
	        $response = array('code'=>1001 , 'status'=> false );
	    }
	    echo json_encode($response);
	}
	
	
	public function log_out(){
	    $this->session->unset_userdata('login_user');
	    redirect('login');
	}

}

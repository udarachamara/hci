<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class Login_Model extends CI_Model{

	function __construct() {
		parent::__construct();
    }

	
    function get_auth_user($username , $password){
        $this->db->select('*');
        $this->db->from('users');
        $this->db->where('EMAIL',$username);
        $this->db->where('PASSWORD',$password);
        $this->db->where('STATUS','active');
        return $this->db->get()->result_array();
    }

}

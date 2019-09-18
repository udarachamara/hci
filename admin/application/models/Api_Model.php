<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class Api_Model extends CI_Model{
	function __construct() {
		parent::__construct();
	}
	
	function get_top_categories(){
		$this->db->select('ID as Id , NAME as Name , IMG as Image , STATUS as Status , CREATE_AT as CreateAt , MODIFIED_AT as ModifiedAt');
		$this->db->from('categories');
		$this->db->where('STATUS','active');
		$this->db->where('RANK < ','3');
		return $this->db->get()->result_array();
	}

}

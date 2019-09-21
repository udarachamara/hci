<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class Category_Model extends CI_Model{

	function __construct() {
		parent::__construct();
    	}

    	function get_all_categories(){
		$this->db->select('*');
		$this->db->from('categories');
		$this->db->where('STATUS','active');
		return $this->db->get()->result_array();
	}

	function get_all_subcategories(){
		$this->db->select('*');
		$this->db->from('subcategories');
		$this->db->where('STATUS','active');
		return $this->db->get()->result_array();
	}
	
	function get_category_by($id){
		$this->db->select('*');
		$this->db->from('categories');
		$this->db->where('ID',$id);
		$this->db->where('STATUS','active');
		return $this->db->get()->result_array();
	}
	
	function get_subcategory_by_Category($id){
		$this->db->select('*');
		$this->db->from('items');
		$this->db->where('SUBCATEGORY',$id);
		$this->db->where('STATUS','active');
		return $this->db->get()->result_array();
	}
	
	function insert_category($category){
	   return $this->db->insert('categories',$category);
	}
	
	function update_category($category , $id){
        	$this->db->where('ID',$id);
	  return $this->db->update('categories',$category);
	}
}

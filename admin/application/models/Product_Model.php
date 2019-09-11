<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class Product_Model extends CI_Model{
	function __construct() {
		parent::__construct();
    }

	
    function get_all_products(){
        $this->db->select('*');
        $this->db->from('items');
        $this->db->join('subcategories' , 'subcategories.ID=items.SUBCATEGORY');
        $this->db->where('items.STATUS','active');
        return $this->db->get()->result_array();
	}
	
	function get_products_by($id){
        $this->db->select('*');
        $this->db->from('items');
        $this->db->where('ID',$id);
        $this->db->where('STATUS','active');
        return $this->db->get()->result_array();
	}
	
	function get_products_by_Category($id){
        $this->db->select('*');
        $this->db->from('items');
        $this->db->where('SUBCATEGORY',$id);
        $this->db->where('STATUS','active');
        return $this->db->get()->result_array();
	}
	
	function insert_item($item){
		return $this->db->insert('items',$item);
	}
	
	function update_items($item , $id){
        $this->db->where('ID',$id);
		return $this->db->update('items',$item);
	}
}

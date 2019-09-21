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

	function get_active_products(){
		$this->db->select('items.ID as Id , items.NAME as Name, subcategories.NAME as SubCategory , items.PRICE as Price , items.IMG as Image , items.STATUS as Status , items.CREATE_AT as CreateAt , items.MODIFIED_AT as ModifiedAt');
		$this->db->from('items');
		$this->db->join('subcategories','items.SUBCATEGORY=subcategories.ID');
		$this->db->where('items.STATUS','active');
		return $this->db->get()->result_array();
	}

	function get_active_products_by_category($category){
		$this->db->select('items.ID as Id , items.NAME as Name, subcategories.NAME as SubCategory , items.PRICE as Price , items.IMG as Image , items.STATUS as Status , items.CREATE_AT as CreateAt , items.MODIFIED_AT as ModifiedAt');
		$this->db->from('items');
		$this->db->join('subcategories','items.SUBCATEGORY=subcategories.ID');
		$this->db->join('categories','categories.ID=subcategories.CATEGORY');
		$this->db->where('items.STATUS','active');
		$this->db->where('categories.NAME',$category);
		return $this->db->get()->result_array();
	}

	function get_active_products_by_search($name,$priceFrom,$priceTo){
		$this->db->select('items.ID as Id , items.NAME as Name, items.PRICE as Price , subcategories.NAME as SubCategory , items.IMG as Image , items.STATUS as Status , items.CREATE_AT as CreateAt , items.MODIFIED_AT as ModifiedAt');
		$this->db->from('items');
		$this->db->join('subcategories','items.SUBCATEGORY=subcategories.ID');
		if($name != '')
			$this->db->like('items.NAME', $name);
		if($priceFrom != 0)
			$this->db->where('items.PRICE >=', $priceFrom);
		if($priceTo != 0)
			$this->db->where('items.PRICE <=', $priceTo);
		$this->db->where('items.STATUS','active');
		return $this->db->get()->result_array();
	}

	function get_active_product_by_id($id){
		$this->db->select('items.ID as Id , items.NAME as Name, subcategories.NAME as SubCategory , items.IMG as Image , items.STATUS as Status , items.CREATE_AT as CreateAt , items.MODIFIED_AT as ModifiedAt');
		$this->db->from('items');
		$this->db->join('subcategories','items.SUBCATEGORY=subcategories.ID');
		if($id != 0)
			$this->db->where('items.ID', $id);
		$this->db->where('items.STATUS','active');
		return $this->db->get()->result_array();
	}

}

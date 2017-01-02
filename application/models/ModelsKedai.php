<?php
class ModelsKedai extends CI_Model{
	
	function __construct()
	{
		parent::__construct();
	}
	
	function select_where($table,$column,$where)
	{
		$this->db->select("*");
		$this->db->from($table);
		$this->db->where($column,$where);
		return $this->db->get();
	}
	
	function insert($table,$data)
	{
		$this->db->insert($table,$data);
	}
	
	function select_all($table)
	{
		$this->db->select("*");
		$this->db->from($table);
		$column = 'trash';
		$where = 'N';
		$this->db->where($column,$where);
		return $this->db->get();
	}
	
	function delete($table,$column,$id)
	{
		$this->db->where($column,$id);
		$this->db->delete($table);
	}
	
	function update($table,$column,$id,$data)
	{
		$this->db->where($column,$id);
		$this->db->update($table,$data);
	}
	
	function custom($query)
	{
		$this->db->query($query);
		return $this->db->get();
	}
	
	function select_arr($table,$where_data = array(),$order_col="", $type="", $limit_start = "", $limit_end = "")
	{
		$this->db->select("*");
		$this->db->from($table);
		$where_data['trash'] = 'N';
		$this->db->where($where_data);
		$this->db->order_by($order_col, $type);
		if($limit_start !="" AND $limit_end !="")
			$this->db->limit($limit_start,$limit_end);
		return $this->db->get();
	}
	
	function select_order($table,$column = "",$where="",$order_col="", $type="")
	{
		$this->db->select("*");
		$this->db->from($table);
		if($column != "")
			$this->db->where($column,$where);
		$this->db->order_by($order_col, $type);
		return $this->db->get();
	}
}
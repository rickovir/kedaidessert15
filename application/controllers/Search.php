<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Search extends CI_Controller 
{
	public function __construct()
    {
		parent::__construct();
	}
	public function index()
	{
		$key = $_GET['key'];
		$query = "select * from barang where trash = 'N' and nama_barang like '%$key%'";
		$barang_q = $this->db->query($query);
		$data['banyak'] = $barang_q->num_rows();
		$data['result_barang'] = $barang_q->result();
		$data['key'] = $key;
		$this->template->main_template('search',$data);
	}
}
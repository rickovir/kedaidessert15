<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kategori extends CI_Controller 
{
	public function __construct()
    {
		parent::__construct();
	}
	public function index($kode_kategori)
	{
		$query = 'select * from barang, kategori where barang.trash="N" and barang.kode_kategori = kategori.kode_kategori and kategori.kode_kategori = "'.$kode_kategori.'" ';
		$barang_q = $this->db->query($query);
		$data['result_barang'] = $barang_q->result();
		$data['nama_kategori'] = $barang_q->row()->nama_kategori;
		$this->template->main_template('kategori',$data);
	}
}
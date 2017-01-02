<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Barang extends CI_Controller 
{
	public function __construct()
    {
		parent::__construct();
	}
	
	public function index($kode_barang)
	{
		$query = 'select * from barang, kategori where barang.trash="N" and barang.kode_kategori = kategori.kode_kategori and barang.kode_barang = "'.$kode_barang.'" ';
		$barang_q = $this->db->query($query);
		$data['row_barang'] = $barang_q->row();
		$this->template->main_template('barang',$data);
	}
	
	public function add_cart($sisa)
	{
		$json_data = $_GET['json_data'];
		$data_barang = json_decode($json_data,true);
		$data_barang['session_id'] = session_id();
		session_regenerate_id();
		$updata_stok['stok'] = $sisa;
		$this->ModelsKedai->update('barang','kode_barang',$data_barang['kode_barang'],$updata_stok);
		$_SESSION['cart'][] = $data_barang;
		if(empty($_SESSION['total']))
			$_SESSION['total'] = 0;
		
		$_SESSION['total'] += ($data_barang['harga_barang']*$data_barang['banyak']);
		if($_GET['json_data'])
			echo 1;
	}
	
	public function show_cart()
	{
		$json_data = json_encode(array_values($_SESSION["cart"]));
		echo $json_data;
	}
}
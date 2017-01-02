<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Customer extends CI_Controller 
{
	public function __construct()
    {
		parent::__construct();
		if(empty($_SESSION['customer_logged_in']))
			redirect("main/signin");
	}
	
	public function index()
	{
		$customer_q = $this->ModelsKedai->select_where("customer", "kode_customer", $_SESSION['kode_customer']);
		$data['row_customer'] = $customer_q->row();
		$total_pemesanan_q = $this->db->query("select count(*) as jumlah, sum(total_harga) as total_harga from pesanan where trash = 'N' and kode_customer = '$_SESSION[kode_customer]'");
		$lunas_q = $this->db->query("select count(*) lunas from pesanan where trash = 'N' and kode_customer = '$_SESSION[kode_customer]' and status_lunas='Y'");
		$data['total_pesanan'] = $total_pemesanan_q->row()->jumlah;
		$data['total_harga'] = $total_pemesanan_q->row()->total_harga;
		$data['lunas'] = $lunas_q->row()->lunas;
		$this->template->main_template('profile_customer', $data);
	}
	
	public function random_val()
	{
		return substr(md5(uniqid(rand(), true)), 0, 5);
	}
	
	public function signout()
	{
		if(session_destroy())
			redirect("./");
	}
	
	public function checkout()
	{
		$kota_q = $this->ModelsKedai->select_all("kota_pengiriman");
		$data['result_kota'] = $kota_q->result();
		$this->template->main_template('checkout', $data);
	}
	
	public function checkout_proses()
	{
		$token = strtoupper(substr($this->random_val().''.date('m1d').''.$this->random_val(),2, 11));
		$kota_pengiriman = explode("-", $_POST['kota_pengiriman']);
		$biaya_pengiriman = $kota_pengiriman[0];
		$kode_kota = $kota_pengiriman[1];
		$_SESSION['total'] += $biaya_pengiriman;
		
		$indata = array(
			"tanggal_pesanan"	=> date('Y-m-d'),
			"token"				=> $token,
			"total_harga"		=> $_SESSION['total'],
			"kode_customer"		=> $_SESSION['kode_customer'],
			"alamat"			=> $_POST['alamat'],
			"kode_kota"			=> $kode_kota
		);
		$this->ModelsKedai->insert("pesanan", $indata);
		
		$wh_data = array(
			"tanggal_pesanan"	=> $indata['tanggal_pesanan'],
			"token"				=> $token,
			"kode_customer"		=> $indata['kode_customer']
		);
		
		$pesanan_q = $this->ModelsKedai->select_arr('pesanan',$wh_data);
		$kode_pesanan = $pesanan_q->row()->kode_pesanan;
		
		foreach($_SESSION['cart'] as $cart)
		{
			$dt_data = array(
				"banyak" 		=> $cart['banyak'],
				"kode_barang"	=> $cart['kode_barang'],
				"kode_pesanan"	=> $kode_pesanan
			);
			
			$this->ModelsKedai->insert("detail_pesanan", $dt_data);
		}
		unset($_SESSION['cart']);
		unset($_SESSION['total']);
		redirect("customer/pembayaran/".$kode_pesanan);
	}
	
	public function pembayaran($kode_pesanan)
	{
		$bayar_q = $this->db->query("select * from barang, detail_pesanan where barang.kode_barang = detail_pesanan.kode_barang and detail_pesanan.kode_pesanan = '".$kode_pesanan."'");
		$pesanan_r = $this->ModelsKedai->select_where("pesanan","kode_pesanan", $kode_pesanan)->row();
		
		$biaya_pengiriman_r = $this->ModelsKedai->select_where("kota_pengiriman","kode_kota",$pesanan_r->kode_kota)->row();
		$data['biaya_pengiriman'] = $biaya_pengiriman_r->biaya_pengiriman;
		$data['nama_kota'] = $biaya_pengiriman_r->nama_kota;
		
		$data['result_barang'] = $bayar_q->result();
		$data['total'] = $pesanan_r->total_harga;
		$data['token'] = $pesanan_r->token;
		$data['token'] = $pesanan_r->token;
		$data['alamat'] = $pesanan_r->alamat;
		$data['tanggal_pesanan'] = $pesanan_r->tanggal_pesanan;
		if($pesanan_r->status_lunas == 'N')
			$data['status_lunas'] = 'Belum Lunas';
		else
			$data['status_lunas'] = 'Lunas';
		
		$this->template->main_template('pembayaran', $data);
	}
	
	public function pesanan()
	{
		$pesanan_q = $this->ModelsKedai->select_order("pesanan","kode_customer", $_SESSION['kode_customer'],"kode_pesanan","desc");
		$data['result_pesanan'] = $pesanan_q->result();
		$data['num_pesanan'] = $pesanan_q->num_rows();
		$this->template->main_template('pesanan_customer', $data);
	}
	
}
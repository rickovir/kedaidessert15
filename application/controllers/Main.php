<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Main extends CI_Controller 
{
	public function __construct()
    {
		parent::__construct();
	}
	
	public function index()
	{
		$barang_q = $this->db->query('select * from barang where trash="N" order by kode_barang desc limit 8');
		$kategori_q = $this->ModelsKedai->select_all('kategori');
		$data['barang'] = $barang_q;
		$data['kategori'] = $kategori_q ;
		$data['home'] = true;
		$this->template->main_template('home',$data);
	}
	
	public function shoppingcart()
	{
		$this->template->main_template('shoppingcart');
	}
	
	public function cancel_item_stok($jumlah,$kode_barang)
	{
		$stok_lama = $this->ModelsKedai->select_where("barang","kode_barang",$kode_barang)->row()->stok;
		$updata_stok['stok'] = $stok_lama + $jumlah;
		$this->ModelsKedai->update('barang','kode_barang',$kode_barang,$updata_stok);
	}
	
	public function delete_cart_item($sess_id)
	{
		foreach($_SESSION['cart'] as $key=>$cart)
		{
			if($cart['session_id'] == $sess_id)
			{
				$_SESSION['total'] = $_SESSION['total'] - ($cart['harga_barang']*$cart['banyak']);
				$this->cancel_item_stok($cart['banyak'], $cart['kode_barang']);
				unset($_SESSION['cart'][$key]);
			}
		}
		$_SESSION['cart'] = array_values($_SESSION['cart']);
		$this->template->main_template('shoppingcart');
	}
	
	public function batal_cart()
	{
		foreach($_SESSION['cart'] as $cart)
		{
			$this->cancel_item_stok($cart['banyak'], $cart['kode_barang']);
		}
		unset($_SESSION['cart']);
		unset($_SESSION['total']);
		redirect('../index.php');
	}
	
	public function signin($checkout = "")
	{
		$data['checkout'] = $checkout;
		$this->template->main_template('signin',$data);
	}
	
	public function daftar($checkout = "")
	{
		$data['checkout'] = $checkout;
		$this->template->main_template('daftar',$data);
	}
	
	public function email_check()
	{
		$json_data = $_GET['email'];
		$email = json_decode($json_data,true);
		$num = $this->db->query("select * from customer where email like '%$email[email]%'")->num_rows();
		echo $num;
	}
	
	public function enter_customer_session($email, $password)
	{
        $sign_q = $this->ModelsKedai->select_where('customer','email',$email);
        $sign_r = $sign_q->row();
        if($sign_q->num_rows() > 0)
        {
			if(password_verify($password,$sign_r->password))
            {
				echo"1";
				$session_array = array(
				"email" => $email,
				"kode_customer" => $sign_r->kode_customer,
				"nama_customer" => $sign_r->nama_customer,
				"customer_logged_in" => true
				);
				// add session with CI SESSION
				$this->session->set_userdata($session_array);
			}
            else
            {
				echo"0";
			}
		}
	}
	
	public function daftar_proses()
	{
		$indata = array(
			'nama_customer' => $_POST['nama_customer'],
			'email' => $_POST['email'],
			'alamat' => $_POST['alamat'],
			'no_telepon' => $_POST['no_telepon'],
		);
		$indata['password'] = password_hash($_POST['password'],PASSWORD_DEFAULT);
		$this->ModelsKedai->insert("customer", $indata);
		
		$this->enter_customer_session($_POST['email'], $_POST['password']);
	}
	
	public function login_proses()
	{
		$this->enter_customer_session($_POST['email'], $_POST['password']);
	}
	
	public function cek_sesi()
	{
		var_dump($_SESSION);
	}
	
}
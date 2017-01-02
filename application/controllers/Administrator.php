<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Administrator extends CI_Controller 
{
    public function __construct()
    {
		parent::__construct();
		if(empty($_SESSION['logged_in']))
			$_SESSION['logged_in'] = false;
		$this->load->library('image_lib'); 
	}

    public function signin_process()
    {
        $username = $_POST['username'];
        $password = $_POST['password'];
        $sign_q = $this->ModelsKedai->select_where('admin','username',$username);
        $sign_r = $sign_q->row();
        if($sign_q->num_rows() > 0)
        {
			if(password_verify($password,$sign_r->password))
            {
				echo"1";
				$_SESSION = array(
				"username" => $username,
				"id_admin" => $sign_r->id_admin,
				"logged_in" => true
				);
			}
            else
            {
				echo"0";
			}
		}
    }
	
	public function signout()
	{
		// destroying all session
		if(session_destroy())
			redirect('administrator');
	}

    private function page($view, $data_link = array())
    {
        $data = $data_link;
        $data['skin'] = 'red';
		// data from this function passed to template library
        $this->template->load('administrator/template', $view, $data);
    }

	public function password_test($test)
    {
		echo password_hash($test,PASSWORD_DEFAULT);
	}
	
	/* 
	=============================================================================================================
	this is crud process section 
	=============================================================================================================
	*/

	
	/* --------------crud barang--------------------- */

	public function barang_tambah_proses()
	{
		// define array data for insert
		$indata = array(
		'nama_barang' => $_POST['nama_barang'],
		'harga_barang' => $_POST['harga'],
		'stok' => $_POST['stok'],
		'deskripsi' => $_POST['isi'],
		'kode_kategori' => $_POST['kategori']
		);
		
		// define configuration for upload image
		$config['upload_path']          = './uploads/';
		$config['allowed_types']        = 'gif|jpg|png';
		$config['max_size']             = 2000;
		$config['max_width']            = 2048;
		$config['max_height']           = 1024;
		
		// set configuration
		$this->load->library('upload', $config);
		
		// if image is can't to uploaded
		if ( ! $this->upload->do_upload('gambar'))
		{
			echo $this->upload->display_errors();
		}
		else // can to upload
		{
			// define array name for gambar from data uploaded
			$indata['gambar'] = $this->upload->data('file_name');
		}
		
		// insert execution
		$this->ModelsKedai->insert("barang",$indata);
		
		// goto barang page
		redirect('administrator/barang/1');
	}
	
	public function barang_delete_proses($kode_barang)
	{
		// memanggil row barang dengan kode barang
		$row_cari = $this->ModelsKedai->select_where("barang","kode_barang",$kode_barang)->row();
		
		// delete gambar
		unlink('./uploads/'.$row_cari->gambar);
		
		// testing...
		echo $row_cari->gambar;
		
		// definisikan data untuk dipindahkan ke trash
		$trdata = array(
			'trash' => 'Y',
			'gambar' => 'default_gerbage.jpg'
		);
		
		// update execution or take data to trash
		$this->ModelsKedai->update("barang","kode_barang",$kode_barang,$trdata);
		
		// goto barang page
		redirect('administrator/barang/1');
	}
	/* 
	public function barang_delete_proses($kode_barang)
	{
		$row_cari = $this->ModelsKedai->select_where("barang","kode_barang",$kode_barang)->row();
		unlink('./uploads/'.$row_cari->gambar);
		echo $row_cari->gambar;
		$this->ModelsKedai->delete("barang","kode_barang",$kode_barang);
		
		redirect('administrator/barang/1');
	} */
	
	public function barang_update_proses($kode_barang)
	{
		// define array data for upload
		$updata = array(
		'nama_barang' => $_POST['nama_barang'],
		'harga_barang' => $_POST['harga'],
		'stok' => $_POST['stok'],
		'deskripsi' => $_POST['isi'],
		'kode_kategori' => $_POST['kategori']
		);
		
		// jika ada gambar yang diupload
		if($_FILES['gambar_ganti']['name'] != "")
		{
			// define configuration for upload image
			$config['upload_path']          = './uploads/';
			$config['allowed_types']        = 'gif|jpg|png';
			$config['max_size']             = 2000;
			$config['max_width']            = 2048;
			$config['max_height']           = 1024;
			
			// set configuration
			$this->load->library('upload', $config);
			
			// if image can't to uploaded
			if ( ! $this->upload->do_upload('gambar_ganti'))
			{
				echo $this->upload->display_errors();
			}
			else // can to upload
			{
				// memanggil row barang dengan kode barang
				$row_cari = $this->ModelsKedai->select_where("barang","kode_barang",$kode_barang)->row();
				
				// delete gambar lama
				unlink('./uploads/'.$row_cari->gambar);
				
				// define array name for gambar from data uploaded
				$updata['gambar'] = $this->upload->data('file_name');
				
				// update execution
				$this->ModelsKedai->update("barang","kode_barang",$kode_barang,$updata);
			}
		}
		else // tidak ada gambar yang diupload
		{
			// update execution
			$this->ModelsKedai->update("barang","kode_barang",$kode_barang,$updata);
		}
		
		// goto barang page
		redirect('administrator/barang/1');
	}
	
	/* --------------end crud barang--------------------- */
	
	
	/* --------------crud kategori--------------------- */
	
	public function kategori_tambah_proses()
	{
		// define array data for insert
		$indata = array(
			'nama_kategori' => $_POST['nama_kategori']
		);
		
		// insert execution
		$this->ModelsKedai->insert("kategori",$indata);
		
		// goto kategori page
		redirect('administrator/kategori/1');
	}
	
	public function kategori_delete_proses($kode_kategori)
	{
		// definisikan data untuk dipindahkan ke trash
		$trdata = array(
			'trash' => 'Y'
		);
		
		// update execution or take data to trash
		$this->ModelsKedai->update("kategori","kode_kategori",$kode_kategori,$trdata);
		
		// goto kategori page
		redirect('administrator/kategori/1');
	}
	
	public function kategori_update_proses($kode_kategori)
	{
		// define array data for upload
		$updata = array(
		'nama_kategori' => $_POST['nama_kategori']
		);
		
		// update execution
		$this->ModelsKedai->update("kategori","kode_kategori",$kode_kategori,$updata);
		
		// goto kategori page
		redirect('administrator/kategori/1');
	}
	
	/* --------------crud kota--------------------- */
	
	public function kota_tambah_proses()
	{
		// define array data for insert
		$indata = array(
			'nama_kota' => $_POST['nama_kota'],
			'biaya_pengiriman' => $_POST['biaya_pengiriman']
		);
		
		// insert execution
		$this->ModelsKedai->insert("kota_pengiriman",$indata);
		
		// goto kategori page
		redirect('administrator/kota/1');
	}
	
	public function kota_delete_proses($kode_kota)
	{
		// definisikan data untuk dipindahkan ke trash
		$trdata = array(
			'trash' => 'Y'
		);
		
		// update execution or take data to trash
		$this->ModelsKedai->update("kota_pengiriman","kode_kota",$kode_kota,$trdata);
		
		// goto kota page
		redirect('administrator/kota/1');
	}
	
	public function kota_update_proses($kode_kota)
	{
		// define array data for upload
		$updata = array(
			'nama_kota' => $_POST['nama_kota'],
			'biaya_pengiriman' => $_POST['biaya_pengiriman']
		);
		
		// update execution
		$this->ModelsKedai->update("kota_pengiriman","kode_kota",$kode_kota,$updata);
		
		// goto kota page
		redirect('administrator/kota/1');
	}
	
	/* 
	public function kota_delete_proses($kode_kota)
	{
		
		// update execution or take data to trash
		$this->ModelsKedai->delete("kota_pengiriman","kode_kota",$kode_kota);
		
		// goto kategori page
		redirect('administrator/kota_pengiriman/1');
	} */
	
	
	/* --------------crud pesanan--------------------- */
	/* 
	public function pesanan_tambah_proses()
	{
		// define array data for insert
		$indata = array(
			'tanggal_pesanan' => $_POST['tanggal_pesanan'],
			'status_lunas' => $_POST['status_lunas']
		);
		
		// insert execution
		$this->ModelsKedai->insert("pesanan",$indata);
		
		// goto kategori page
		redirect('administrator/kota/1');
	}
	 */
	public function pesanan_delete_proses($kode_pesanan)
	{
		// definisikan data untuk dipindahkan ke trash
		$trdata = array(
			'trash' => 'Y'
		);
		
		// update execution or take data to trash
		$this->ModelsKedai->update("pesanan","kode_pesanan",$kode_pesanan,$trdata);
		
		// goto pesanan page
		redirect('administrator/pesanan/1');
	}
	
	public function pesanan_update_proses($kode_pesanan)
	{
		// define array data for upload
		$updata = array(
			'tanggal_pesanan' => $_POST['tanggal_pesanan'],
			'status_lunas' => $_POST['status_lunas']
		);
		
		// update execution
		$this->ModelsKedai->update("pesanan","kode_pesanan",$kode_pesanan,$updata);
		
		// goto pesanan page
		redirect('administrator/pesanan/1');
	}
	
	public function pesanan_update_lunas($kode_pesanan, $status)
	{
		if($status == 'Y')
			$status = 'N';
		else
			$status = 'Y';
		// define array data for upload
		$updata = array(
			'status_lunas' => $status
		);
		
		// update execution
		$this->ModelsKedai->update("pesanan","kode_pesanan",$kode_pesanan,$updata);
		
		// goto pesanan page
		redirect('administrator/pesanan/1');
	}
	
	/* 
	public function kota_delete_proses($kode_kota)
	{
		
		// update execution or take data to trash
		$this->ModelsKedai->delete("kota_pengiriman","kode_kota",$kode_kota);
		
		// goto kategori page
		redirect('administrator/kota_pengiriman/1');
	} */
	
	/* --------------end crud kategori--------------------- */
	
	
	/*
	=============================================================================================================
	end of crud process section 
	=============================================================================================================
	*/
	
	
	/* 
	=============================================================================================================
	this is page section 
	=============================================================================================================
	*/
	
    public function index()
    {
        $this->load->view('administrator/signin');
    }
	
    public function home()
    {
		// if session logged_in is false
		if(!$_SESSION['logged_in'])
			redirect('administrator');
		
        $data = array(
            'admin' => $_SESSION['username']
        );
        $this->page('administrator/home',$data);
    }
	
	/* --------------barang--------------------- */
	
	public function barang($notif = 0)
	{
		// if session logged_in is false
		if(!$_SESSION['logged_in'])
			redirect('administrator');
		
		// untuk fetch barang
		$barang_q = $this->ModelsKedai->select_all('barang');
		$data['result_barang'] = $barang_q->result();
		
		// untuk fetch kategori
		$kategori_q = $this->ModelsKedai->select_all('kategori');
		$data['result_ketegori'] = $kategori_q->result();
		
		// data notifikasi none / block
		$data['notif'] = 'display:none';
		if($notif == 1)
			$data['notif'] = '';
			
		$this->page('administrator/barang',$data);
	}
	
	public function barang_update($kode_barang)
	{
		// if session logged_in is false
		if(!$_SESSION['logged_in'])
			redirect('administrator');
		
		// output row barang yang diupdate
		$barang_q = $this->ModelsKedai->select_where("barang","kode_barang",$kode_barang);
		$data['row_barang'] = $barang_q->row();
		
		// untuk fetch kategori
		$kategori_q = $this->ModelsKedai->select_all('kategori');
		$data['result_ketegori'] = $kategori_q->result();
		
		$this->page('administrator/barang_update',$data);
	}
	
	/* --------------end barang--------------------- */
	
	
	/* --------------kategori--------------------- */
	
	public function kategori($notif = 0)
	{
		// if session logged_in is false
		if(!$_SESSION['logged_in'])
			redirect('administrator');
		
		// untuk fetch kategori
		$kategori_q = $this->ModelsKedai->select_all('kategori');
		$data['result_ketegori'] = $kategori_q->result();
		
		// data notifikasi none / block
		$data['notif'] = 'display:none';
		if($notif == 1)
			$data['notif'] = '';
			
		$this->page('administrator/kategori',$data);
	}
	
	public function kategori_update($kode_kategori)
	{
		// if session logged_in is false
		if(!$_SESSION['logged_in'])
			redirect('administrator');
		
		// output row kategori yang diupdate
		$kategori_q = $this->ModelsKedai->select_where("kategori","kode_kategori",$kode_kategori);
		$data['row_kategori'] = $kategori_q->row();
		
		$this->page('administrator/kategori_update',$data);
	}
	
	/* --------------end kategori--------------------- */
	
	
	/* --------------kota pengiriman--------------------- */
	
	public function kota($notif = 0)
	{
		// if session logged_in is false
		if(!$_SESSION['logged_in'])
			redirect('administrator');
		
		// untuk fetch kategori
		$kota_q = $this->ModelsKedai->select_all('kota_pengiriman');
		$data['result_kota'] = $kota_q->result();
		
		// data notifikasi none / block
		$data['notif'] = 'display:none';
		if($notif == 1)
			$data['notif'] = '';
			
		$this->page('administrator/kota',$data);
	}
	
	public function kota_update($kode_kota)
	{
		// if session logged_in is false
		if(!$_SESSION['logged_in'])
			redirect('administrator');
		
		// output row kategori yang diupdate
		$kota_q  = $this->ModelsKedai->select_where("kota_pengiriman","kode_kota",$kode_kota);
		$data['row_kota'] = $kota_q ->row();
		
		$this->page('administrator/kota_update',$data);
	}
	
	/* --------------end kota--------------------- */
	
	
	/* --------------pesanan--------------------- */
	
	public function pesanan($notif = 0)
	{
		// if session logged_in is false
		if(!$_SESSION['logged_in'])
			redirect('administrator');
		
		// untuk fetch kategori
		$pesanan_q = $this->db->query("
		select 
			customer.email, 
			pesanan.tanggal_pesanan, 
			pesanan.total_harga, 
			pesanan.token, 
			pesanan.status_lunas, 
			pesanan.kode_pesanan 
		from 
			pesanan, customer 
		where 
			pesanan.trash = 'N' 
		and 
			pesanan.kode_customer = customer.kode_customer
		order by
			pesanan.kode_pesanan
		desc
		");
		$data['result_pesanan'] = $pesanan_q->result();
		
		// data notifikasi none / block
		$data['notif'] = 'display:none';
		if($notif == 1)
			$data['notif'] = '';
			
		$this->page('administrator/pesanan',$data);
	}
	
	public function pesanan_update($kode_pesanan)
	{
		// if session logged_in is false
		if(!$_SESSION['logged_in'])
			redirect('administrator');
		
		// output row kategori yang diupdate
		$pesanan_q  = $this->ModelsKedai->select_where("pesanan","kode_pesanan",$kode_pesanan);
		$data['row_pesanan'] = $pesanan_q ->row();
		
		$this->page('administrator/pesanan_update',$data);
	}
	
	/* --------------end kota--------------------- */
	
	
	/*
	=============================================================================================================
	end of page section
	=============================================================================================================
	*/
}
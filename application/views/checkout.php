		<div class="container">
			<br />
			<br />
			<br />
			<br />
			<br />
		</div>
		<!-- main content exp-category -->
		<div class="container kategori">
			<div class="row">
				<div class="col-md-3"></div>
				<div class="col-md-6 login-page">
					<h1>Checkout Pemesanan</h1>
					<p>Mohon diisi form dibawah ini untuk keperluan pemesanan dan pengiriman barang</p>
					<form method="POST" action="<?php echo site_url("customer/checkout_proses") ?>">
						<div class="form-group">
							<label class="">Pilih Kota</label>
							<select class="form-control input-lg" name="kota_pengiriman">
								<?php 
								foreach($result_kota as $row)
								{
									echo'<option value="'.$row->biaya_pengiriman.'-'.$row->kode_kota.'">'.$row->nama_kota.'   -   '.rupiah($row->biaya_pengiriman).'</option>';
								}
								?>
							</select>
						</div>
						<div class="form-group">
							<label class="">Alamat</label>
							<textarea name="alamat" class="form-control input-lg" placeholder="Alamat lengkap Pengiriman" ></textarea>
							<span class="help-block has-warning">* Mohon Di isi dengan alamat yang lengkap</span>
						</div>
						<div class="form-group">
							<label class="">Total Harga Item</label>
							<input type="text" class="form-control input-lg" value="<?php echo rupiah($_SESSION['total']); ?>" disabled />
						</div>
						<div class="form-group">
							<button class="btn btn-primary btn-lg btn-block" type="submit">CHECKOUT</button>
						</div>
					</form>
				</div>
				<div class="col-md-3"></div>
			</div>
		</div>
		
		<div class="container">
			<br />
			<br />
			<br />
			<br />
		</div>
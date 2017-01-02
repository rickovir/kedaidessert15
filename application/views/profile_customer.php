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
				<div class="col-md-12">
					<h1>Profile</h1>
				</div>
				<div class="col-md-6 login-page">
					<button class="btn btn-warning" id="ubah-profile">Ubah Profile</button>
					<br />
					<br />
					<form action="<?php echo site_url("main/daftar_proses"); ?>" method="POST" id="profile" link_sukses = "<?php echo site_url("customer/"); ?>">
						<div class="form-group">
							<label>Nama Lengkap</label>
							<input type="text" name="nama_customer" class="form-control input-lg" placeholder="Nama lengkap Anda" value="<?php echo $row_customer->nama_customer; ?>"/>
						</div>
						<div class="form-group" id="email-group">
							<label>Email</label>
							<input type="email" id="email-input" disabled name="email" class="form-control input-lg" placeholder="Email Anda. Ex: rickovir@kedai15.com" value="<?php echo $row_customer->email; ?>" />
						</div>
						<div class="form-group">
							<label>Password</label>
							<input type="password" id="pass1" name="password" class="form-control input-lg" />
							<span id="email_check" class="help-block" style="display:none">Di Isi jika ingin ganti password</span>
						</div>
						<div class="form-group">
							<label>Ganti Password</label>
							<input type="password" id="pass1" name="password" class="form-control input-lg" />
						</div>
						<div class="form-group">
							<label>Nomor Telepon</label>
							<input type="text" required pattern="([0-9])+(?:-?\d){4,}" name="no_telepon" class="form-control input-lg" placeholder="Nomor telepon Anda. Ex: 081222883030"  value="<?php echo $row_customer->no_telepon; ?>"/>
						</div>
						<div class="form-group">
							<label>Alamat</label>
							<textarea name="alamat" class="form-control input-lg" placeholder="Alamat lengkap Anda" ><?php echo $row_customer->alamat; ?></textarea>
						</div>
						<div class="form-group">
							<input type="hidden" id="success" />
							<button id="btn-perbaharui" class="btn btn-info btn-lg btn-block" style="display:none" type="submit">Perbaharui</button>
						</div>
					</form>
					<div id="alert_warning" style="display:none" class="alert alert-danger alert-dismissable">
						<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
						<h4>
							<i class="icon fa fa-remove"></i> Warning !
						</h4>
						Mohon Periksa lagi
					</div>									
					<span id="masuk_loading" style="display:none">
						<h4>Sedang Memproses.... <i class="fa fa-refresh fa-spin fa-fw"></i> </h4>
					</span>
				</div>
				<div class="col-md-6">
					<h5>Banyak Transaksi yang pernah dilakukan</h5>
					<h3><b><?php echo $total_pesanan; ?></b> Transaksi</h3>
					<br />
					<h5>Besar Harga Transaksi yang pernah dilakukan</h5>
					<h3><b><?php echo rupiah($total_harga); ?></b></h3>
					<br />
					<h5>Banyak Transaksi Lunas</h5>
					<h3><b><?php echo $lunas; ?></b></h3>
					<br />
					<h5>Banyak Transaksi Belum Lunas</h5>
					<h3><b><?php echo ($total_pesanan-$lunas); ?></b></h3>
					<br />
				</div>
			</div>
		</div>
		
		<div class="container">
			<br />
			<br />
			<br />
			<br />
		</div>
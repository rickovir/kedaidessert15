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
					<h1>DAFTAR</h1>
					<p>Sudah Memiliki Akun ? <a href="<?php echo site_url("main/signin/".$checkout);?>">Login</a></p>
					<form action="<?php echo site_url("main/daftar_proses"); ?>" method="POST" id="daftar" link_sukses = "<?php echo site_url("customer/".$checkout); ?>">
						<div class="form-group">
							<label>Nama Lengkap</label>
							<input type="text" name="nama_customer" class="form-control input-lg" placeholder="Nama lengkap Anda" />
						</div>
						<div class="form-group" id="email-group">
							<label>Email</label>
							<input type="email" id="email-input" link_em_valid="<?php echo site_url("main/email_check/");?>" name="email" class="form-control input-lg" placeholder="Email Anda. Ex: rickovir@kedai15.com" />
							<span id="email_check" class="help-block" style="display:none">Maaf email yang anda masukan sudah digunakan.</span>
						</div>
						<div class="form-group">
							<label>Password</label>
							<input type="password" id="pass1" name="password" class="form-control input-lg" placeholder="Password Anda" />
						</div>
						<div class="form-group">
							<label>Nomor Telepon</label>
							<input type="text" required pattern="([0-9])+(?:-?\d){4,}" name="no_telepon" class="form-control input-lg" placeholder="Nomor telepon Anda. Ex: 081222883030" />
						</div>
						<div class="form-group">
							<label>Alamat</label>
							<textarea name="alamat" class="form-control input-lg" placeholder="Alamat lengkap Anda" ></textarea>
						</div>
						<div class="form-group">
							<input type="hidden" id="success" />
							<button class="btn btn-info btn-lg btn-block" type="submit">DAFTAR</button>
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
				<div class="col-md-3"></div>
			</div>
		</div>
		
		<div class="container">
			<br />
			<br />
			<br />
			<br />
		</div>
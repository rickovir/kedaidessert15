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
					<h1>SIGN IN</h1>
					<p>Belum Memiliki Akun ? <a href="<?php echo site_url("main/daftar/".$checkout);?>">Daftar</a></p>
					<form action="<?php echo site_url("main/login_proses"); ?>" method="POST" id="signin" link_sukses="<?php echo site_url("customer/".$checkout); ?>">
						<div class="form-group">
							<label class="">Email</label>
							<input type="email" name="email" class="form-control input-lg" placeholder="Email Anda" />
						</div>
						<div class="form-group">
							<label class="">Password</label>
							<input type="password" name="password" class="form-control input-lg" placeholder="Password Anda" />
						</div>
						<div class="form-group">
							<button class="btn btn-info btn-lg btn-block">SIGN IN</button>
						</div>
					</form>
					<div id="alert_warning" style="display:none" class="alert alert-danger alert-dismissable">
						<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
						<h4>
							<i class="icon fa fa-remove"></i> Warning !
						</h4>
						Mohon Periksa lagi. Username atau password Salah
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
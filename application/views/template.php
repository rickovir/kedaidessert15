<?php 
$active_header = "";
if(empty($home))
	$active_header = "def-top-nav-collapse";
$nick="";
if(!empty($_SESSION['nama_customer']))
{
	$letak = strpos($_SESSION['nama_customer'], " ");
	if($letak > 8)
		$letak = 8;
	$nick = substr($_SESSION['nama_customer'], 0, $letak);
}
?>
<!DOCTYPE html>
<html>
	<head>
		<title>Kedai Dessert 15</title>
		<!-- css -->
		<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/css/bootstrap.min.css">
		<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/css/custom.css">
		<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>font-awesome/css/font-awesome.min.css">
		<!-- DATA TABLES -->
		<link href="<?php echo base_url();?>assets/plugins/datatables/dataTables.bootstrap.css" rel="stylesheet" type="text/css" />
		<!-- js -->
		<script src="<?php echo base_url();?>assets/plugins/jQuery/jQuery-2.1.4.min.js"></script>
		<!-- DATA TABES SCRIPT -->
		<script src="<?php echo base_url();?>assets/plugins/datatables/jquery.dataTables.min.js" type="text/javascript"></script>
		<script src="<?php echo base_url();?>assets/plugins/datatables/dataTables.bootstrap.min.js" type="text/javascript"></script>
		
		<script src="<?php echo base_url();?>assets/js/bootstrap.min.js"></script>
		<!--<script src="<?php echo base_url();?>assets/js/jquery.nav.js"></script> -->
		<script src="<?php echo base_url();?>assets/js/custom.js"></script>
	</head>
	<body>		
		<div class="container">
			<!-- navbar (konten navigasi dan link)-->
			<div class="navbar navbar-custom navbar-fixed-top <?php echo $active_header; ?>" role="navigation">
				<div class="container-fluid">
					<div class="navbar-header">
						<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
							<span class="sr-only">Toggle navigation</span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
						</button>
						<a class="navbar-brand" href="<?php echo base_url('index.php'); ?>">Kedai Dessert 15</a>
					</div>
					<div class="navbar-collapse collapse">
						<ul class="nav navbar-nav navbar-left">
							<li>
								<form action="<?php echo site_url('search/index/'); ?>" method="GET" class="navbar-form" role="search">
								  <div class="input-group">
									<input type="text" class="form-control" placeholder="Search" name="key" id="srch-term">
									<div class="input-group-btn">
									  <button class="btn btn-default" type="submit"><span class="glyphicon glyphicon-search"></span></button>
									</div>
								  </div>
								</form>
							</li>
							<li class="dropdown">
								<a href="#" class="dropdown-toggle" data-toggle="dropdown">Category <span class="caret"></span></a>
								<ul class="dropdown-menu" role="menu">
								<?php foreach($result_kategori as $kategori) 
								{
									echo'<li><a href="'.site_url('kategori/index/'.$kategori->kode_kategori).'">'.$kategori->nama_kategori.'</a></li>';
								}
								?>
								</ul>
							</li>
							<li class="dropdown">
								<a href="#" class="dropdown-toggle" data-toggle="dropdown">
									<i class="fa fa-shopping-cart"></i> Cart 
								</a>
								<!-- shopping-cart-->
								<ul class="dropdown-menu shopping-item" role="menu">
									<!-- shopping-cart item detail -->
									<?php 
									if(!empty($_SESSION['cart']))
									{
										foreach($_SESSION['cart'] as $cart)
										{ 
									?>
									<li>
										<a href="#">
											<div class="row">
												<div class="col-xs-4">
													<img src="<?php echo base_url("uploads/".$cart['gambar']);?>"/>
												</div>
												<div class="col-xs-6">
													<p><?php echo $cart['nama_barang'];?></p>
													<p><?php echo rupiah($cart['harga_barang']);?> x <?php echo $cart['banyak']; ?> pcs</p>
												</div>
											</div>
										</a>
									</li>
									<?php 
										} 
									}
									?>
									<!-- end shopping-cart item detail -->
									
									<li>
										<button class="btn btn-primary btn-block" onclick="window.location.href='<?php echo site_url("main/shoppingcart");?>'">Detail Keranjang</button>
									</li>
								</ul>
							</li>
						</ul>
						<ul class="nav navbar-nav navbar-right">
							<li class="active"><a href="<?php echo base_url('index.php'); ?>">Home</a></li>
							<li><a href="#about">About Us</a></li>
							<?php
							if(empty($_SESSION['customer_logged_in'])){ ?>
							
							<li><a href="<?php echo site_url("main/signin");?>">Sign In</a></li>
							
							<?php 
							}else{
							?>
							<li class="dropdown">
								<a href="#" class="dropdown-toggle" data-toggle="dropdown"><?php echo $nick; ?> <span class="caret"></span></a>
								<ul class="dropdown-menu" role="menu">
									<li><a href="<?php echo site_url("customer/"); ?>">Profile</a></li>
									<li><a href="<?php echo site_url("customer/pesanan"); ?>">Pesanan</a></li>
									<li><a href="<?php echo site_url("customer/signout"); ?>">Keluar</a></li>
								</ul>
							</li>
							<?php 
							} ?>
						</ul>
					</div><!--/.nav-collapse -->
				</div><!--/.container-fluid -->
			</div>
		</div>
		<?php echo $contents; ?>

		<!-- about us -->
		<div class="container about-us" id="about">
			<div class="row">
				<div class="col-md-12">
					<h2>About Us</h2>
				</div>
				<div class="col-md-2"></div>
				<div class="col-md-4 ab-profile">
					<img src="<?php echo base_url();?>assets/img/ricko.jpg" class="img-circle call-r-detail" />
					<h4>Ricko Virnanda</h4>
					<h4>201581200</h4>
					<center>
						<div class="socmed">
							<img src="<?php echo base_url();?>assets/img/google-plus.png" /><p>rickovir</p>
							<img src="<?php echo base_url();?>assets/img/facebook.png" /><p>ricko.vir</p>
						</div>
					</center>
				</div>
				<div class="col-md-4 ab-profile">
					<img src="<?php echo base_url();?>assets/img/mia.jpg" class="img-circle call-m-detail" />
					<h4>Mia Kastina</h4>
					<h4>201581178</h4>
					<center>
						<div class="socmed">
							<img src="<?php echo base_url();?>assets/img/instagram.png" /><p>m.miakastina</p>
							<img src="<?php echo base_url();?>assets/img/facebook.png" /><p>Miakastina</p>
						</div>
					</center>
				</div>
				<div class="col-md-2"></div>
				<div class="col-md-12"></div>
				<div class="col-md-2"></div>
				<div class="col-md-4">
					<div class="list-group detail-ricko">
						<a href="#" class="list-group-item">
							<h4 class="list-group-item-heading">Nama</h4>
							<p class="list-group-item-text">Ricko Virnanda</p>
						</a>
						<a href="#" class="list-group-item">
							<h4 class="list-group-item-heading">NIM</h4>
							<p class="list-group-item-text">201581200</p>
						</a>
						<a href="#" class="list-group-item">
							<h4 class="list-group-item-heading">Alamat</h4>
							<p class="list-group-item-text">Jl. Laksa 2</p>
						</a>
						<a href="#" class="list-group-item">
							<h4 class="list-group-item-heading">Moto</h4>
							<p class="list-group-item-text">Maju terus pantang mundur</p>
						</a>
					</div>
				</div>
				<div class="col-md-4">
					<div class="list-group detail-mia">
						<a href="#" class="list-group-item">
							<h4 class="list-group-item-heading">Nama</h4>
							<p class="list-group-item-text">Mia Kastina</p>
						</a>
						<a href="#" class="list-group-item">
							<h4 class="list-group-item-heading">NIM</h4>
							<p class="list-group-item-text">201581178</p>
						</a>
						<a href="#" class="list-group-item">
							<h4 class="list-group-item-heading">Alamat</h4>
							<p class="list-group-item-text">Duri Kepa</p>
						</a>
						<a href="#" class="list-group-item">
							<h4 class="list-group-item-heading">Moto</h4>
							<p class="list-group-item-text">Apabila mengalami kegagalan maka bangunlah dan kembali kepada Allah</p>
						</a>
					</div>
				</div>
				<div class="col-md-2"></div>
			</div>
		</div>
		<!-- end about us -->
		<div class="container footer">
			<p>Copyright by ricko & mia </p>
			<p class="pull-right">Universitas Esa Unggul </p>
		</div>
		
		
	</body>
</html>


<?php
$num_kategori = $kategori->num_rows();
$result_kategori = $kategori->result();
$result_barang = $barang->result();
 ?>
		
		<!-- Carousel (gambar berjalan dan slide)
		================================================== -->
		<div id="myCarousel" class="carousel slide" data-ride="carousel">
			<!-- Indicators -->
			<ol class="carousel-indicators">
				<li data-target="#myCarousel" data-slide-to="0" class="active"></li>
				<li data-target="#myCarousel" data-slide-to="1"></li>
			</ol>
			<div class="carousel-inner">
				<div class="item active">
					<img src="<?php echo base_url();?>assets/img/header1.jpg" alt="First slide">
					<div class="container">
						<div class="carousel-caption" style="text-align:right">
						</div>
					</div>
				</div>
				<div class="item">
					<img src="<?php echo base_url();?>assets/img/header2.jpg" alt="Second slide">
					<div class="container">
						<div class="carousel-caption">
						</div>
					</div>
				</div>
			</div>
			<a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev"><span class="glyphicon glyphicon-chevron-left"></span></a>
			<a class="right carousel-control" href="#myCarousel" role="button" data-slide="next"><span class="glyphicon glyphicon-chevron-right"></span></a>
		</div>
		<!-- end carousel -->
		
		
		<!-- main content -->
		<!-- main content why -->
		<div class="container m-why">
			<div class="row">
				<div class="col-md-2"></div>
				<div class="col-md-8 m-why-detail">
					<p><i>Mengapa memilih Kedai Dessert 15 ?</i></p>
					<h1>G E N</h1>
					<h3>Gurih, Enak dan Nikmat</h3>
					<p>
					<i>
					Sajian dessert sering dinamakan The 
					final course atau The last course dan berasa manis atau disebut sweet
					Hidangan penutup (dessert) adalah hidangan yang disajikan setelah hidangan
					utama (main course) sebagai hidangan penutup atau biasa disebut dengan 
					istilah pencuci mulut
					</i>
					</p>
				</div>
				<div class="col-md-2"></div>
			</div>
		</div>
		<!-- end main content why -->
		
		
		<!-- main content exp-category -->
		<div class="container ">
			<div class="row">
				<div class="col-md-12">
					<center><h2>BEST PRODUCT</h2></center>
				</div>
				<?php 
				foreach($result_barang as $row_barang)
				{
					?>
				<div class="col-sm-3">
					<div class="panel panel-solid">
						<div class="panel-heading">
							<span class=""><?php echo $row_barang->nama_barang; ?></span>
						</div>
						<div class="panel-body">
							<div class="row item-img">
								<div class="col-xs-12 tocenter">
									<img src="<?php echo base_url("uploads/".$row_barang->gambar); ?>"/>
								</div>
							</div>
						</div>
						<div class="panel-footer acara-panel-footer">
							<div class="row">
								<div class="col-xs-9">
									<span><?php echo rupiah($row_barang->harga_barang); ?></span>
								</div>
								<div class="col-xs-3">
									<button class="btn btn-success" onclick="window.location.href='<?php echo site_url("barang/index/".$row_barang->kode_barang); ?>'">
										<i class="fa fa-shopping-cart"></i>
									</button>
								</div>
							</div>
						</div>
					</div>
			</div>
				<?php } ?>
			</div>
		</div>
		
		<!-- end main content -->
		
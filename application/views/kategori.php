		<div class="container">
			<br />
			<br />
			<br />
		</div>
		<!-- main content exp-category -->
		<div class="container kategori">
			<div class="row">
				<div class="col-md-12">
					<h2>Kategori <?php echo $nama_kategori; ?></h2>
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
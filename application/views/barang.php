		<div class="container">
			<br />
			<br />
			<br />
		</div>
		<!-- main content exp-category -->
		<div class="container kategori">
			<div class="row">
				<div class="col-md-12">
					<h2>Detail Item</h2>
				</div>
				<div class="col-md-6 image_deskripsi_item">
					<img src="<?php echo base_url("uploads/".$row_barang->gambar); ?>"/>
				</div>
				<div class="col-md-6 deskripsi_item">
					<dl>
						<dt>Nama Item</dt>
						<dd><?php echo $row_barang->nama_barang ?></dd>
					</dl>
					<dl>
						<dt>Harga</dt>
						<!-- data harga rupiah -->
						<dd id="harga_rupiah"><?php echo rupiah($row_barang->harga_barang); ?></dd>
						<!-- end data harga rupiah -->
					</dl>
					<dl>
						<dt>Stok</dt>
						<dd id="stok"><?php echo $row_barang->stok ?></dd>
					</dl>
					<dl>
						<dt>Kategori</dt>
						<dd><?php echo $row_barang->nama_kategori ?></dd>
					</dl>
					<dl>
						<dt>Deskripsi</dt>
						<dd><?php echo $row_barang->deskripsi ?></dd>
					</dl>
					<dl>
						<dt>Masukan Ke Keranjang</dt>
						<select id="banyak_item">
							<?php 
							for($i = 1; $i <= $row_barang->stok; $i++)
								echo '<option value="'.$i.'">'.$i.'</option>';
							$dis_add ='';
							if($row_barang->stok == 0)
								$dis_add = 'disabled';
							?>
						</select>
						
						<!-- menaruh data di button untuk di kirim menggunakan ajax -->
						<button id="add_cart" class="btn btn-success" link="<?php echo site_url("barang/add_cart"); ?>" 
						kode_barang="<?php echo $row_barang->kode_barang ?>" nama_barang="<?php echo $row_barang->nama_barang ?>" 
						harga_barang ="<?php echo $row_barang->harga_barang ?>" gambar="<?php echo $row_barang->gambar ?>" 
						<?php echo $dis_add; ?> >
							<i class="fa fa-shopping-cart"></i>
							&nbsp Add To Cart
						</button>
						<!-- menaruh data -->
						
						<!-- data link gambar -->
						<input type="hidden" id="link_gambar" value="<?php echo base_url("uploads/")?>">
						<!-- end link gambar -->
											
						<span id="add_cart_loading" style="display:none">
							<i class="fa fa-refresh fa-spin fa-2x fa-fw"></i>
						</span>
					</dl>
					<div id="alert_success" style="display:none" class="alert alert-success alert-dismissable">
						<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
						<h4>
							<i class="icon fa fa-check"></i> Success!
						</h4>
						Item berhasil dimasukkan ke Keranjang
					</div>
					
					<div id="alert_warning" style="display:none" class="alert alert-danger alert-dismissable">
						<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
						<h4>
							<i class="icon fa fa-remove"></i> Warning !
						</h4>
						Stok tidak mencukupi
					</div>
				</div>
				<div class="col-md-6">
				</div>
			</div>
		</div>
		
		<div class="container">
			<br />
			<br />
			<br />
		</div>
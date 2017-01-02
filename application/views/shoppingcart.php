		<div class="container">
			<br />
			<br />
			<br />
		</div>
		<!-- main content exp-category -->
		<div class="container kategori">
			<div class="row">
				<div class="col-md-12">
					<h2>Detail Shopping Cart</h2>
				</div>
				<div class="col-md-12">
					<table class="table table-hover">
						<thead>
							<tr>
								<th>No.</th>
								<th>Gambar</th>
								<th>Nama Barang</th>
								<th>Harga Barang</th>
								<th>Banyaknya</th>
								<th>Jumlah</th>
								<th>Hapus</th>
						</thead>
						<tbody>
							<?php 
							$n=0;
							if(empty($_SESSION['cart']))
								echo "<h2>Anda belum memesan barang apapun</h2>";
							else
							{
							foreach($_SESSION['cart'] as $cart){
								$n++;
							?>
							<tr class="cart-<?php echo $n;?>">
								<td><?php echo $n;?></td>
								<td><img class="cart-gambar" src="<?php echo base_url('uploads/'.$cart['gambar']);?>" /></td>
								<td><?php echo $cart['nama_barang'];?></td>
								<td><?php echo rupiah($cart['harga_barang']);?></td>
								<td><?php echo $cart['banyak'];?></td>
								<td><?php echo rupiah($cart['harga_barang']*$cart['banyak']);?></td>
								<td><a href="<?php echo site_url("main/delete_cart_item/".$cart['session_id']);?>"><i class="fa fa-remove fa-2x"></i></a></td>
							</tr>
							<?php } ?>
							<tr>
								<th colspan="5">Total harga</td>
								<th colspan="2"><?php echo rupiah($_SESSION['total']); ?></td>
							<tr>
							<?php 
							}?>
						</tbody>
					</table>
					<button class="btn btn-danger pull-right" onclick="window.location.href='<?php echo site_url("main/batal_cart"); ?>'"><i class="fa fa-remove"></i> Batalkan</button>
					<?php 
					$link_checkout = site_url("customer/checkout");
					if(empty($_SESSION['customer_logged_in']))
						$link_checkout = site_url("main/signin/checkout");
					?>
					<button 
						class="btn btn-primary pull-right" 
						style="margin-right:10px" 
						onclick="window.location.href='<?php echo $link_checkout; ?>'"
						>
						<i class="fa fa-check"></i> Checkout
					</button>
				</div>
			</div>
		</div>
		
		<div class="container">
			<br />
			<br />
			<br />
		</div>
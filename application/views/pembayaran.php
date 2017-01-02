		<div class="container">
			<br />
			<br />
			<br />
			<br />
		</div>
		<!-- main content exp-category -->
		<div class="container kategori">
			<div class="row">
				<div class="col-md-12">
					<h1>Pembayaran Pesanan</h1>
				</div>
				<div class="col-md-8">
					
					<h3>Detail Item</h3>
					<table class="table table-hover">
						<thead>
							<tr>
								<th>No.</th>
								<th>Gambar</th>
								<th>Nama Barang</th>
								<th>Harga Barang</th>
								<th>Banyaknya</th>
								<th>Jumlah</th>
						</thead>
						<tbody>
						<?php 
							$n = 0;
							foreach($result_barang as $row){
								$n++;
							?>
							<tr>
								<td><?php echo $n;?></td>
								<td><img class="bayar-gambar" src="<?php echo base_url('uploads/'.$row->gambar);?>" /></td>
								<td><?php echo $row->nama_barang;?></td>
								<td><?php echo rupiah($row->harga_barang);?></td>
								<td><?php echo $row->banyak;?></td>
								<td><?php echo rupiah($row->harga_barang*$row->banyak);?></td>
							</tr>
							<?php } ?>
						</tbody>
					</table> 
					<br />
					<hr />
					<div class="row">
						<div class="col-sm-6">
							<h5>Tanggal Pemesanan</h5>
							<h3><b><?php echo tgl_indo($tanggal_pesanan); ?></b></h3>
						</div>
						<div class="col-sm-6">
							<h5>Kota Pemesanan</h5>
							<h3><b><?php echo $nama_kota; ?></b></h3>
						</div>
						<div class="col-sm-12">
							<h5>Detail Alamat</h5>
							<p><?php echo $alamat; ?></p>
						</div>
					</div>
					<br />
					<hr />
					<button class="btn btn-success" onclick="window.location.href='<?php echo site_url("customer/pesanan"); ?>'">Lihat pembayaran lainnya</button>
				</div>
				<div class="col-md-4 detail-pembayaran">
					<h5>Status Pembayaran</h5>
					<h3 class="text-danger"><b><?php echo $status_lunas; ?></h3>
					<br />
					
					<h5>Total Pembayaran</h5>
					<table>
						<tr>
							<td><h3><b><?php echo rupiah($total-$biaya_pengiriman); ?></b></h3></td>
							<td><span>&nbsp (Total Item)</span></td>
						</tr>
						<tr>
							<td><h3><b><?php echo rupiah($biaya_pengiriman); ?></b></h3> </td>
							<td><span>&nbsp (Ongkos Kirim)</span></td>
						</tr>
						<tr>
							<td colspan="2"><hr /></td>
						</tr>
						<tr>
							<td colspan="2"><h3><b><?php echo rupiah($total); ?></b></h3></td>
						</tr>
					</table>
					
					
					<h5>Token</h5>
					<h3><b><?php echo $token; ?></b></h3>
					<p class="text-info">*Masukkan kode token pada saat pembayaran</p>
					<br />
					
					<h5>Nomor Rekening Transfer</h5>
					<h3><b>4564645421</b></h3>
					
					<h5>Atas Nama</h5>
					<h3><b>Mia Kastina</b></h3>
				</div>
			</div>
		</div>
		
		<div class="container">
			<br />
			<br />
			<br />
		</div>
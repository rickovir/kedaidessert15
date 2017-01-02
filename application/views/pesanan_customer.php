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
					<h1>Pesanan Anda</h1>
					<br />
					<hr />
				</div>
				<div class="col-md-12">
					<table id="table_data" class="table table-hover">
						<thead>
							<tr>
								<th>No.</th>
								<th>Tanggal Pesanan</th>
								<th>Total Harga</th>
								<th>Token</th>
								<th>Status</th>
								<th>Detail</th>
						</thead>
						<tbody>
						<?php 
							$n = 0;
							if($num_pesanan == 0)
							{
								echo "<h3>Anda Belum Melakukan Transaksi</h3>";
							}
							else{
							foreach($result_pesanan as $row){
								$n++;
								if($row->status_lunas == 'Y')
								{
									$status = "Lunas";
									$ststatus = "label-success";
								}
								else
								{
									$status = "Belum Lunas";
									$ststatus = "label-danger";
								}
							?>
							<tr>
								<td><?php echo $n;?></td>
								<td><?php echo tgl_indo($row->tanggal_pesanan);?></td>
								<td><?php echo rupiah($row->total_harga);?></td>
								<td><?php echo $row->token;?></td>
								<td><?php echo "<span class='label ".$ststatus."'>".$status."</span>";?></td>
								<td><button class="btn btn-success" onclick="window.location.href='<?php echo site_url('customer/pembayaran/'.$row->kode_pesanan); ?>'"><i class="fa fa-share-square-o"></i></button></td>
							</tr>
							<?php } 
							}?>
						</tbody>
					</table> 
				</div>
			</div>
		</div>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<section class="content-header">
	  <h1>
		<i class="fa fa-pesanan"></i> Pesanan
		<small>Kelola Pesanan</small>
	  </h1>
	  <ol class="breadcrumb">
		<li><a href="<?php echo site_url("administrator/home"); ?>"><i class="fa fa-dashboard"></i> Home</a></li>
		<li><a href="<?php echo site_url("administrator/pesanan"); ?>"><i class="fa fa-inbox"></i> Pesanan</a></li>
	  </ol>
	</section>
	
	<!-- Main content -->
	<section class="content">
	  <div class="row">
		<div class="col-xs-12">
		
		<!-- notifikasi -->
		
		<div id="alert_success" style="<?php echo $notif ?>" class="alert alert-success alert-dismissable">
			<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
			<h4><i class="icon fa fa-check"></i> Success!</h4>
			Aksi Berhasil
		 </div>
		
		<!-- end of notifikasi -->
		
		
        <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
				<li class="active">
					<a href="#view_data" data-toggle="tab">
						<i class="fa fa-table"></i> Tabel Pesanan
					</a>
				</li>
				<!--
                <li>
					<a href="#add_data" data-toggle="tab">
						<i class="fa fa-plus"></i> Tambah Data
					</a>
				</li>
				-->
			</ul><!-- /.nav-tabs -->
			
            <div class="tab-content">
			
				<!-- tab pane tampil data -->
                <div class="tab-pane active" id="view_data" >
					<table id="table_data" class="table table-bordered table-striped table-hover">
						<thead>
						  <tr>
							<th>No.</th>
							<th>Email</th>
							<th>Tanggal Pesanan</th>
							<th>Total Harga</th>
							<th>Token</th>
							<th>Status Lunas</th>
							<th width="15%">Action</th>
						  </tr>
						</thead>
						<tbody>
						<?php
						$n = 1;
						foreach($result_pesanan as $row){
							$status = "Lunas";
							$stystatus = "label-success";
							if($row->status_lunas == 'N')
							{
								$status = "Belum Lunas";
								$stystatus = "label-danger";
							}
							echo'
							<td>'.$n.'</td>
							<td>'.$row->email.'</td>
							<td>'.tgl_indo($row->tanggal_pesanan).'</td>
							<td>'.rupiah($row->total_harga).'</td>
							<td>'.$row->token.'</td>
							<td>
							<a href="'.site_url('administrator/pesanan_update_lunas/'.$row->kode_pesanan.'/'.$row->status_lunas).'">
								<span class="label '.$stystatus.'">'.$status.'</span>
							</a>
							</td>
							<td>
							<center>
							<a href="'.site_url('administrator/pesanan_update/'.$row->kode_pesanan).'">
							<button class="btn btn-info update" title="Edit Data">
								<i class="fa fa-pencil"></i>
							</button>
							</a>
							<button class="btn btn-warning" id="call_del" data-whatever="'.$row->kode_pesanan.'" data-toggle="modal" data-target="#del_modal" title="Delete Data">
								<i class="fa fa-trash"></i>
							</button>
							</center>
							</td>
						  </tr>';
						  $n++;
						}
						?>
						</tbody>
					</table>
				</div>	
					
				<!-- end of tab pane tampil data -->
				
				
				<!-- modal untuk delete -->
				
				<div class="modal fade" id="del_modal" role="dialog" >
					  <div class="modal-dialog">
						<div class="modal-content">
						  <div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
							<h4 class="modal-title"><i class="fa fa-warning"></i> Perhatian</h4>
						  </div>
						  <div class="modal-body">
							<p>Yakin anda ingin menghapus data ini ?</p>
						  </div>
						  <div class="modal-footer">
							<input type="hidden" class="link" value="<?php echo site_url('administrator/pesanan_delete_proses/');?>"/>
							<button type="button" class="btn btn-danger del" >Hapus Data</button>
							<button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
						  </div>
						</div><!-- /.modal-content -->
					</div><!-- /.modal-dialog -->
				</div>
					
				<!-- end of modal untuk delete -->
					
					
				<!-- tab pane tambah data 
				
				<div class="tab-pane" id="add_data">
					<form id="form_pesanan" method="POST" action="<?php echo site_url("administrator/pesanan_tambah_proses"); ?>">
						<div class="form-group">
							<label>Tanggal Pesanan</label>
							<input type="text" class="form-control" id="datepicker" name="tanggal_pesanan" placeholder="Tanggal Pesanan" />
						</div>
						<div class="form-group">
							<label>Status Lunas</label>
							<select class="form-control" name="status_lunas">
								<option value="N">Belum Lunas</option>
								<option value="Y">Lunas</option>
							</select>
						</div>
						
						<div class="form-group">
							<button type="submit" class="btn btn-primary" >Submit</button>
							<button class="btn btn-success" type="reset">Reset</button>
							 &nbsp <i style="display:none" class="loading fa fa-refresh fa-spin fa-2x"></i>
						</div>
						
					</form>	

				</div>
				
				 end of tab pane tambah data -->
				
			</div><!-- /.content-tab -->
		  </div><!-- /.tabs-custom -->
		</div><!-- /.col -->
	  </div><!-- /.row -->
	</section><!-- /.content -->
</div><!-- /.content-wrapper -->

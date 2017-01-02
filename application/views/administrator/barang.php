<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<section class="content-header">
	  <h1>
		<i class="fa fa-th"></i> Barang
		<small>Kelola Barang</small>
	  </h1>
	  <ol class="breadcrumb">
		<li><a href="<?php echo site_url("administrator/home"); ?>"><i class="fa fa-dashboard"></i> Home</a></li>
		<li><a href="<?php echo site_url("administrator/barang"); ?>"><i class="fa fa-th"></i> Barang</a></li>
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
						<i class="fa fa-table"></i> Tabel Barang
					</a>
				</li>
                <li>
					<a href="#add_data" data-toggle="tab">
						<i class="fa fa-plus"></i> Tambah Data
					</a>
				</li>
			</ul><!-- /.nav-tabs -->
			
            <div class="tab-content">
			
				<!-- tab pane tampil data -->
                <div class="tab-pane active" id="view_data" >
					<table id="table_data" class="table table-bordered table-striped table-hover">
						<thead>
						  <tr>
							<th>No.</th>
							<th>Nama Barang</th>
							<th>Harga</th>
							<th>Stok</th>
							<th width="15%">Action</th>
						  </tr>
						</thead>
						<tbody>
						<?php
						$n = 1;
						foreach($result_barang as $row){
							echo'
							<td>'.$n.'</td>
							<td>'.$row->nama_barang.'</td>
							<td>'.rupiah($row->harga_barang).'</td>
							<td>'.$row->stok.'</td>
							<td>
							<center>
							<a href="'.site_url('administrator/barang_update/'.$row->kode_barang).'">
							<button class="btn btn-info update" title="Edit Data">
								<i class="fa fa-pencil"></i>
							</button>
							</a>
							<button class="btn btn-warning" id="call_del" data-whatever="'.$row->kode_barang.'" data-toggle="modal" data-target="#del_modal" title="Delete Data">
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
							<input type="hidden" class="link" value="<?php echo site_url('administrator/barang_delete_proses/');?>"/>
							<button type="button" class="btn btn-danger del" >Hapus Data</button>
							<button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
						  </div>
						</div><!-- /.modal-content -->
					</div><!-- /.modal-dialog -->
				</div>
					
				<!-- end of modal untuk delete -->
					
					
				<!-- tab pane tambah data -->
				
				<div class="tab-pane" id="add_data">
					<form id="form_barang" method="POST" action="<?php echo site_url("administrator/barang_tambah_proses"); ?>" enctype="multipart/form-data">
						<div class="form-group">
							<label>Nama Dessert</label>
							<input type="text" class="form-control" name="nama_barang" placeholder="Nama Dessert" />
						</div>
						<div class="form-group">
							<label>Harga</label>
							<input type="text" class="form-control" name="harga" placeholder="Harga" />
						</div>
						<div class="form-group">
							<label>Stok</label>
							<input type="text" class="form-control" name="stok" placeholder="Stok" />
						</div>
						<div class="form-group">
							<label>Deskripsi</label>
							<textarea class="textarea" placeholder="Masukan Isi Deskripsi" style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>
							<input type="hidden" class="hide" name="isi" />
						</div>
						<div class="form-group">
							<label>Gambar</label>
							<input type="file" name="gambar"/></div>
						<div class="form-group">
							<label>Kategori</label>
							<select class="form-control" name="kategori">
							<?php foreach($result_ketegori as $kategori) 
							{
								echo '<option value="'.$kategori->kode_kategori.'">'.$kategori->nama_kategori.'</option>';
							}
							?>
							</select>
						</div>
						<div class="form-group">
							<button type="submit" class="btn btn-primary sg" >Submit</button>
							<button class="btn btn-success" type="reset">Reset</button>
							 &nbsp <i style="display:none" class="loading fa fa-refresh fa-spin fa-2x"></i>
						</div>
						
					</form>	

				</div>
				
				<!-- end of tab pane tambah data -->
				
			</div><!-- /.content-tab -->
		  </div><!-- /.tabs-custom -->
		</div><!-- /.col -->
	  </div><!-- /.row -->
	</section><!-- /.content -->
</div><!-- /.content-wrapper -->

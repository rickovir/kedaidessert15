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
		<div class="box">
		  <div class="box-header with-border">
			<h3 class="box-title"><i class="fa fa-pencil"></i> Update Barang</h3>
			<div class="box-tools pull-right">
			  <!-- Buttons, labels, and many other things can be placed here! -->
			  <!-- Here is a label for example -->
			  <button class="btn btn-primary" onclick="self.history.back()" data-toggle="tooltip" data-placement="top" title="Kembali"><i class="fa fa-arrow-left"></i></button>
			</div><!-- /.box-tools -->
		  </div><!-- /.box-header -->
		  <div class="box-body">
			<form id="form_barang" method="POST" action="<?php echo site_url("administrator/barang_update_proses/".$row_barang->kode_barang); ?>" enctype="multipart/form-data">
				<div class="form-group">
					<label>Nama Dessert</label>
					<input type="text" class="form-control" name="nama_barang" placeholder="Nama Dessert" value="<?php echo $row_barang->nama_barang ?>" />
				</div>
				<div class="form-group">
					<label>Harga</label>
					<input type="text" class="form-control" name="harga" placeholder="Harga" value="<?php echo $row_barang->harga_barang ?>" />
				</div>
				<div class="form-group">
					<label>Stok</label>
					<input type="text" class="form-control" name="stok" placeholder="Stok" value="<?php echo $row_barang->stok ?>"/>
				</div>
				<div class="form-group">
					<label>Deskripsi</label>
					<textarea class="textareaup" placeholder="Masukan Isi Deskripsi" style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>
					<input type="hidden" class="hideup" name="isi" value="<?php echo $row_barang->deskripsi ?>" />
				</div>
				<div class="form-group">
					<label>Gambar</label>
					</br>
					<img src="<?php echo base_url()."uploads/".$row_barang->gambar;?>" />
				</div>
				<div class="form-group">
					<label>Ganti Gambar</label>
					<input type="file" name="gambar_ganti"/>
				</div>
				<div class="form-group">
					<label>Kategori</label>
					<select class="form-control" name="kategori">
					<?php foreach($result_ketegori as $kategori) 
					{
						$selected = '';
						if($row_barang->kode_kategori == $kategori->kode_kategori)
							$selected = 'selected';
						
						echo '<option '.$selected.' value="'.$kategori->kode_kategori.'">'.$kategori->nama_kategori.'</option>';
					}
					?>
					</select>
				</div>
				<div class="form-group">
					<button type="submit" class="btn btn-primary sgup" >Submit</button>
					<button class="btn btn-success" type="reset">Reset</button>
					 &nbsp <i style="display:none" class="loading fa fa-refresh fa-spin fa-2x"></i>
				</div>		
			</form>	
		  </div><!-- /.box-body -->
		</div><!-- /.box -->
		</div><!-- /.col -->
	  </div><!-- /.row -->
	</section><!-- /.content -->
</div><!-- /.content-wrapper -->

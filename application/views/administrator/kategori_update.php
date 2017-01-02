<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<section class="content-header">
	  <h1>
		<i class="fa fa-bookmark"></i> Kategori
		<small>Kelola Kategori</small>
	  </h1>
	  <ol class="breadcrumb">
		<li><a href="<?php echo site_url("administrator/home"); ?>"><i class="fa fa-dashboard"></i> Home</a></li>
		<li><a href="<?php echo site_url("administrator/kategori"); ?>"><i class="fa fa-bookmark"></i> Kategori</a></li>
	  </ol>
	</section>
	<!-- Main content -->
	<section class="content">
	  <div class="row">
		<div class="col-xs-12">
		<div class="box">
		  <div class="box-header with-border">
			<h3 class="box-title"><i class="fa fa-pencil"></i> Update Kategori</h3>
			<div class="box-tools pull-right">
			  <!-- Buttons, labels, and many other things can be placed here! -->
			  <!-- Here is a label for example -->
			  <button class="btn btn-primary" onclick="self.history.back()" data-toggle="tooltip" data-placement="top" title="Kembali"><i class="fa fa-arrow-left"></i></button>
			</div><!-- /.box-tools -->
		  </div><!-- /.box-header -->
		  <div class="box-body">
			<form id="form_kategori" method="POST" action="<?php echo site_url("administrator/kategori_update_proses/".$row_kategori->kode_kategori); ?>" enctype="multipart/form-data">
				<div class="form-group">
					<label>Nama Dessert</label>
					<input type="text" class="form-control" name="nama_kategori" placeholder="Nama Kategori" value="<?php echo $row_kategori->nama_kategori ?>" />
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

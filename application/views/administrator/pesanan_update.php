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
		<div class="box">
		  <div class="box-header with-border">
			<h3 class="box-title"><i class="fa fa-pencil"></i> Update Pesanan</h3>
			<div class="box-tools pull-right">
			  <!-- Buttons, labels, and many other things can be placed here! -->
			  <!-- Here is a label for example -->
			  <button class="btn btn-primary" onclick="self.history.back()" data-toggle="tooltip" data-placement="top" title="Kembali"><i class="fa fa-arrow-left"></i></button>
			</div><!-- /.box-tools -->
		  </div><!-- /.box-header -->
		  <div class="box-body">
			<form id="form_pesanan" method="POST" action="<?php echo site_url("administrator/pesanan_update_proses/".$row_pesanan->kode_pesanan); ?>">
				<div class="form-group">
					<label>Tanggal Pesanan</label>
					<input type="text" class="form-control" id="datepicker" name="tanggal_pesanan" placeholder="Tanggal Pesanan" value="<?php echo $row_pesanan->tanggal_pesanan;?>" />
				</div>
				<div class="form-group">
					<label>Status Lunas</label>
					<select class="form-control" name="status_lunas">
						<?php 
						$slc_lunas = "selected";
						$nonslc_lunas = "";
						if($row_pesanan->status_lunas == "N")
						{
							$slc_lunas = "";
							$nonslc_lunas = "selected";
						}
						echo'
						<option '.$nonslc_lunas.' value="N">Belum Lunas</option>
						<option '.$slc_lunas.' value="Y">Lunas</option>';
						?>
					</select>
				</div>
				
				<div class="form-group">
					<button type="submit" class="btn btn-primary" >Submit</button>
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

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Halaman Admin</title>

    <script src="<?php echo base_url() ?>assets/plugins/jQuery/jQuery-2.1.4.min.js"></script>
	
    <!-- Bootstrap core CSS -->
    <link href="<?php echo base_url() ?>assets/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="<?php echo base_url() ?>assets/css/signin.css" rel="stylesheet">
    <link href="<?php echo base_url() ?>font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
	
	<script>
	$(document).ready(function(){
		$(".form-signin").submit(function(eve){
			eve.preventDefault();
			$.ajax({
				url:"<?php echo site_url("administrator/signin_process"); ?>",
				type:"POST",
				data: $(this).serialize(),
				beforeSend: function(){
					$('.loading').show();
					$('.alert-danger').hide();
				},
				success: function(hasil){
					if(hasil == 0){
						$('.alert-danger').show();
					}else{
						window.location = "<?php echo site_url("administrator/home"); ?>";
					}
					$('.loading').hide();
				}
			});
		});
	});
	</script>
  </head>

  <body id="login-page">

    <div class="container">
	<br /><br />
      <center><i class="fa fa-user logo"></i></center>
	  <form class="form-signin" role="form" method="POST" action="<?php echo site_url("administrator/signin_process"); ?>">
	  
      <h3 class="form-login-header3">SIGN IN ADMIN</h3>
		<div class="form-group input-group">
            <span class="input-group-addon"><i class="fa fw fa-user icon-form-login"></i></span>
            <input type="text" class="form-control" placeholder="Username" required autofocus style="margin-bottom:0;" name="username">
        </div>
		<div class="form-group input-group">
            <span class="input-group-addon"><i class="fa fw fa-lock icon-form-login"></i></span>
            <input type="password" class="form-control" placeholder="Password" required style="margin-bottom:0;" name="password">
        </div>
        <button class="btn btn-lg btn-success btn-block" type="submit">Masuk</button>
		</br>
		<div class="form-group input-group">
		<a href="">Bantuan</a>
		</div>
		<img class="loading" src="<?php echo base_url(); ?>assets/img/ajax-loader.gif" />
		<div class="alert alert-danger" style="display:none">Username atau Password salah !</div>
      </form>

    </div> 
	
	<footer class="footer">
		<div class="container">
			<span>Tugas PBW</span>
		</div>
	</footer>
	</body>
</html>

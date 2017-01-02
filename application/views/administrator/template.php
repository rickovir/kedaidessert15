<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>Kedai Admin</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
	<meta name="author" content="Ricko Virnanda">
	<meta name="description" content="Exam web application based">
    <!-- Bootstrap 3.3.4 -->
    <link href="<?php echo base_url();?>assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <!-- FontAwesome 4.3.0 -->
    <link href="<?php echo base_url();?>font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
    <!-- Theme style -->
    <link href="<?php echo base_url();?>assets/css/AdminLTE.css" rel="stylesheet" type="text/css" />
    <!-- Admin style -->
    <link href="<?php echo base_url();?>assets/css/adminstyle.css" rel="stylesheet" type="text/css" />
    <!-- Bootstrap Validator	-->
    <link href="<?php echo base_url();?>assets/css/bootstrapValidator.css" rel="stylesheet" type="text/css" />
    <!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
    <link href="<?php echo base_url();?>assets/css/skins/_all-skins.min.css" rel="stylesheet" type="text/css" />
    <!-- iCheck -->
    <link href="<?php echo base_url();?>assets/plugins/iCheck/flat/blue.css" rel="stylesheet" type="text/css" />
   <!-- bootstrap wysihtml5 - text editor -->
    <link href="<?php echo base_url();?>assets/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css" rel="stylesheet" type="text/css" />
	<!-- DATA TABLES -->
	<link href="<?php echo base_url();?>assets/plugins/datatables/dataTables.bootstrap.css" rel="stylesheet" type="text/css" />
	<!-- DATE PICKER -->
	<link href="<?php echo base_url();?>assets/plugins/datepicker/datepicker.css" rel="stylesheet" type="text/css" />


    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body class="skin-<?php echo $skin?> sidebar-mini">
    <div class="wrapper">

      <header class="main-header">
        <!-- Logo -->
        <a href="" class="logo">
          <!-- mini logo for sidebar mini 50x50 pixels -->
          <span class="logo-mini"><b>AD</b>MIN</span>
          <!-- logo for regular state and mobile devices -->
          <span class="logo-lg">Kedai Admin</span>
        </a>
        <!-- Header Navbar: style can be found in header.less -->
        <nav class="navbar navbar-static-top" role="navigation">
          <!-- Sidebar toggle button-->
          <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only">Toggle navigation</span>
          </a>
          <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
              <!-- Notifications: style can be found in dropdown.less -->
              <li class="dropdown notifications-menu">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                  <i class="fa fa-bullhorn"></i>
                  <span class="label label-warning"></span>
                </a>
              </li>
              <!-- Tasks: style can be found in dropdown.less -->
              <li class="dropdown user user-menu">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                  <img src="<?php echo base_url();?>assets/img/avatar5.png" class="user-image" alt="User Image" />
                  <span class="hidden-xs capital">Admin</span>
                </a>
                <ul class="dropdown-menu">
                  <!-- User image -->
                  <li class="user-header">
                    <img src="<?php echo base_url() ?>assets/img/avatar5.png" class="img-circle" alt="User Image" />
                    <p class="capital">Admin</p>
                  </li>
         
                  <!-- Menu Footer-->
                  <li class="user-footer">
                    <div class="pull-left">
                      <a href="#" class="btn btn-default btn-flat">Profile</a>
                    </div>
                    <div class="pull-right">
                      <a href="<?php echo site_url("administrator/signout"); ?>" class="btn btn-default btn-flat">Sign out</a>
                    </div>
                  </li>
                </ul>
              </li>
            </ul>
          </div>
        </nav>
      </header>
      <!-- Left side column. contains the logo and sidebar -->
      <aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">
          <!-- Sidebar user panel -->
          <div class="user-panel">
            <div class="pull-left image">
              <img src="<?php echo base_url();?>assets/img/avatar5.png" class="img-circle" alt="User Image" />
            </div>
            <div class="pull-left info">
              <p class="capital">Admin</p>
              <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
          </div>
          <!-- search form 
          <form action="#" method="get" class="sidebar-form">
            <div class="input-group">
              <input type="text" name="q" class="form-control" placeholder="Search..." />
              <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i></button>
              </span>
            </div>
          </form>
          <!-- /.search form -->
          <!-- sidebar menu: : style can be found in sidebar.less -->
		  <!-- Content of menu >> menu.php -->
		  
        <ul class="sidebar-menu">
            <li class="header">MAIN NAVIGATION</li>
            <li>
              <a href="<?php echo site_url('administrator/home') ?>">
                <i class="fa fa-dashboard"></i> <span>Dashboard</span>
              </a>
            </li>
            <li>
              <a href="<?php echo site_url('administrator/barang') ?>">
                <i class="fa fa-th"></i> <span>Barang</span>
              </a>
            </li>
            <li>
              <a href="<?php echo site_url('administrator/kategori') ?>">
                <i class="fa fa-bookmark"></i> <span>Kategori Barang</span>
              </a>
            </li>
            <li>
              <a href="<?php echo site_url('administrator/kota') ?>">
                <i class="fa fa-truck"></i> <span>Kota Pengiriman</span>
              </a>
            </li>
            <li>
              <a href="<?php echo site_url('administrator/pesanan') ?>">
                <i class="fa fa-inbox"></i> <span>Pesanan</span>
              </a>
            </li>
        </ul>


		  <!-- end of menu -->
        </section>
        <!-- /.sidebar -->
      </aside>

		<!-- Main content section process by administrator -->
		<?php echo $contents; ?>
		<!-- End of main content section -->
      <footer class="main-footer">
        <div class="pull-right hidden-xs">
        </div>
        <strong>Copyright &copy; By 201581200 & 201581178</strong> All rights reserved.
      </footer>

    </div><!-- ./wrapper -->

    <!-- jQuery 2.1.4 -->
    <script src="<?php echo base_url();?>assets/plugins/jQuery/jQuery-2.1.4.min.js"></script>
    <!-- Bootstrap 3.3.2 JS -->
    <script src="<?php echo base_url();?>assets/js/bootstrap.min.js" type="text/javascript"></script>
	<!-- DATA TABES SCRIPT -->
	<script src="<?php echo base_url();?>assets/plugins/datatables/jquery.dataTables.min.js" type="text/javascript"></script>
	<script src="<?php echo base_url();?>assets/plugins/datatables/dataTables.bootstrap.min.js" type="text/javascript"></script>
    <!-- Bootstrap WYSIHTML5 -->
    <script src="<?php echo base_url();?>assets/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js" type="text/javascript"></script>
    <!-- Slimscroll -->
    <script src="<?php echo base_url();?>assets/plugins/slimScroll/jquery.slimscroll.min.js" type="text/javascript"></script>
    <!-- AdminLTE App -->
    <script src="<?php echo base_url();?>assets/js/app.min.js" type="text/javascript"></script>
    <!-- Bootstrap Validator -->
    <script src="<?php echo base_url();?>assets/js/bootstrapValidator.min.js" type="text/javascript"></script>
	<!-- DATEPICKER -->
	<script src="<?php echo base_url();?>assets/plugins/datepicker/bootstrap-datepicker.js" type="text/javascript"></script>
	<!-- page script -->
	<script src="<?php echo base_url();?>assets/js/administrator.js" type="text/javascript"></script>
    
  </body>
</html>

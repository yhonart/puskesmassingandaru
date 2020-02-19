<?php
  include '../exe/session.php';  
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
		<meta charset="utf-8" />
		<title>System Management Puskesmas</title>

		<meta name="description" content="" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />

		<!-- bootstrap & fontawesome -->
		<link rel="stylesheet" href="../assets/css/bootstrap.min.css" />
		<link rel="stylesheet" href="../assets/font-awesome/4.5.0/css/font-awesome.min.css" />

		<!-- page specific plugin styles -->

		<!-- text fonts -->
		<link rel="stylesheet" href="../assets/css/fonts.googleapis.com.css" />

		<!-- ace styles -->
		<link rel="stylesheet" href="../assets/css/ace.min.css" class="ace-main-stylesheet" id="main-ace-style" />
		<!-- Alerttify -->
		<link rel="stylesheet" href="../assets/alertifyjs/css/alertify.css">
    	<link rel="stylesheet" href="../assets/alertifyjs/css/themes/bootstrap.css">

		<!--[if lte IE 9]>
			<link rel="stylesheet" href="../assets/css/ace-part2.min.css" class="ace-main-stylesheet" />
		<![endif]-->
		<link rel="stylesheet" href="../assets/css/ace-skins.min.css" />
		<link rel="stylesheet" href="../assets/css/ace-rtl.min.css" />

		<script src="../assets/alertifyjs/alertify.js"></script>

		<!--[if lte IE 9]>
		  <link rel="stylesheet" href="../assets/css/ace-ie.min.css" />
		<![endif]-->

		<!-- inline styles related to this page -->

		<!-- ace settings handler -->
		<script src="../assets/js/ace-extra.min.js"></script>

		<!-- HTML5shiv and Respond.js for IE8 to support HTML5 elements and media queries -->

		<!--[if lte IE 8]>
		<script src="../assets/js/html5shiv.min.js"></script>
		<script src="../assets/js/respond.min.js"></script>
		<![endif]-->
		<script src="../assets/js/jquery-2.1.4.min.js"></script>
		<script type="text/javascript">
			if('ontouchstart' in document.documentElement) document.write("<script src='../assets/js/jquery.mobile.custom.min.js'>"+"<"+"/script>");
		</script>
		<script src="../assets/js/bootstrap.min.js"></script>

		<!-- page specific plugin scripts -->
		<!-- page specific plugin scripts -->
		<script src="../assets/js/jquery.dataTables.min.js"></script>
		<script src="../assets/js/jquery.dataTables.bootstrap.min.js"></script>
		<script src="../assets/js/dataTables.buttons.min.js"></script>
		<script src="../assets/js/buttons.flash.min.js"></script>
		<script src="../assets/js/buttons.html5.min.js"></script>
		<script src="../assets/js/buttons.print.min.js"></script>
		<script src="../assets/js/buttons.colVis.min.js"></script>
		<script src="../assets/js/dataTables.select.min.js"></script>

		<!-- ace scripts -->
		<script src="../assets/js/ace-elements.min.js"></script>
		<script src="../assets/js/ace.min.js"></script>
		<script src="../assets/js/moment.min.js"></script>
	</head>

	<body class="no-skin">
		<div id="navbar" class="navbar navbar-default          ace-save-state">
			<div class="navbar-container ace-save-state" id="navbar-container">
				<button type="button" class="navbar-toggle menu-toggler pull-left" id="menu-toggler" data-target="#sidebar">
					<span class="sr-only">Toggle sidebar</span>

					<span class="icon-bar"></span>

					<span class="icon-bar"></span>

					<span class="icon-bar"></span>
				</button>

				<div class="navbar-header pull-left">
					<a href="#" class="navbar-brand">
						<small>
							<i class="fa fa-heartbeat"></i>
							SYMASKES
						</small>
					</a>
				</div>

				<div class="navbar-buttons navbar-header pull-right" role="navigation">
					<ul class="nav ace-nav">
						<li class="light-blue dropdown-modal">
							<a data-toggle="dropdown" href="#" class="dropdown-toggle">
								<img class="nav-user-photo" src="../assets/images/avatars/avatar2.png" alt="<?php echo $_SESSION['fullname'];?>" />
								<span class="user-info">
									<small>Selamat Datang,</small>
									<?php echo $_SESSION['fullname'];?>
								</span>

								<i class="ace-icon fa fa-caret-down"></i>
							</a>

							<ul class="user-menu dropdown-menu-right dropdown-menu dropdown-yellow dropdown-caret dropdown-close">
								<li>
									<a href="#">
										<i class="ace-icon fa fa-cog"></i>
										Settings
									</a>
								</li>

								<li>
									<a href="profile.html">
										<i class="ace-icon fa fa-user"></i>
										Profile
									</a>
								</li>

								<li class="divider"></li>

								<li>
									<a href="logout.php">
										<i class="ace-icon fa fa-power-off"></i>
										Logout
									</a>
								</li>
							</ul>
						</li>
					</ul>
				</div>
			</div><!-- /.navbar-container -->
		</div>

		<div class="main-container ace-save-state" id="main-container">
			<script type="text/javascript">
				try{ace.settings.loadState('main-container')}catch(e){}
			</script>

			<div id="sidebar" class="sidebar                  responsive                    ace-save-state">
				<script type="text/javascript">
					try{ace.settings.loadState('sidebar')}catch(e){}
				</script>

				<div class="sidebar-shortcuts" id="sidebar-shortcuts">
					<div class="sidebar-shortcuts-large" id="sidebar-shortcuts-large">
						<button class="btn btn-success" title="Logout">
							<i class="ace-icon fa fa-sign-out"></i>
						</button>

						<button class="btn btn-info" title="Edit Profile">
							<i class="ace-icon fa fa-user"></i>
						</button>

						<button class="btn btn-danger">
							<i class="ace-icon fa fa-cogs"></i>
						</button>
					</div>

					<div class="sidebar-shortcuts-mini" id="sidebar-shortcuts-mini">
						<span class="btn btn-success"></span>
						
						<span class="btn btn-warning"></span>

						<span class="btn btn-danger"></span>
					</div>
				</div><!-- /.sidebar-shortcuts -->

				<ul class="nav nav-list">
					<li class="">
						<a href="?page=dashboard">
							<i class="menu-icon fa fa-tachometer"></i>
							<span class="menu-text"> Dashboard </span>
						</a>

						<b class="arrow"></b>
					</li>
					
					<?php
						if ($row['HAKACC']=='1') {
							
					?>
					<li class="">
						<a href="?page=Konfigurasi_Petugas">
							<i class="menu-icon fa fa-users"></i>
							<span class="menu-text"> Konfigurasi Petugas </span>
						</a>

						<b class="arrow"></b>
					</li>
					<li class="">
						<a href="?page=Konfigurasi_Pembayaran">
							<i class="menu-icon fa fa-money"></i>
							<span class="menu-text"> Konfigurasi Biaya </span>
						</a>

						<b class="arrow"></b>
					</li>
					<?php
						}
						else if ($row['HAKACC']=='2') {
					?>
					<li class="">
						<a href="?page=Pendaftaran">
							<i class="menu-icon fa fa-list-alt"></i>
							<span class="menu-text"> PENDAFTARAN </span>
						</a>

						<b class="arrow"></b>
					</li>
					<?php
						}
						else if ($row['HAKACC']>='3'&&$row['HAKACC']<='7') {
					?>
					<li class="">
						<a href="?page=Poli">
							<i class="menu-icon fa fa-calendar"></i>

							<span class="menu-text">
								Halaman Poli

								<span class="badge badge-transparent tooltip-error" title="2 Important Events">
									<i class="ace-icon fa fa-exclamation-triangle red bigger-130"></i>
								</span>
							</span>
						</a>

						<b class="arrow"></b>
					</li>
					<?php
						}
						else if ($row['HAKACC']=='8') {
					?>
					<li class="">
						<a href="?page=Apotik">
							<i class="menu-icon fa fa-picture-o"></i>
							<span class="menu-text"> APOTIKER </span>
						</a>

						<b class="arrow"></b>
					</li>
					<?php
						}
						else if ($row['HAKACC']=='9') {
					?>
					<li class="">
						<a href="?page=Lab">
							<i class="menu-icon fa fa-picture-o"></i>
							<span class="menu-text"> LABORATURIUM </span>
						</a>

						<b class="arrow"></b>
					</li>
					<?php
						}
						else if ($row['HAKACC']=='10') {
					?>
					<li class="">
						<a href="?page=Kasir">
							<i class="menu-icon fa fa-picture-o"></i>
							<span class="menu-text"> KASIR </span>
						</a>

						<b class="arrow"></b>
					</li>
					<?php
						}
						else if ($row['HAKACC']=='11') {
					?>
					<li class="">
						<a href="?page=Anamnesa">
							<i class="menu-icon fa fa-stethoscope"></i>
							<span class="menu-text"> Anamnesa Pasien </span>
						</a>

						<b class="arrow"></b>
					</li>
					<?php
						}
					?>
				</ul><!-- /.nav-list -->

				<div class="sidebar-toggle sidebar-collapse" id="sidebar-collapse">
					<i id="sidebar-toggle-icon" class="ace-icon fa fa-angle-double-left ace-save-state" data-icon1="ace-icon fa fa-angle-double-left" data-icon2="ace-icon fa fa-angle-double-right"></i>
				</div>
			</div>

			<div class="main-content">
				<div class="main-content-inner">
					<div class="breadcrumbs ace-save-state" id="breadcrumbs">
						<ul class="breadcrumb">
							<marquee width="1130"><strong>Selamat Datang Di Aplikasi System Management Puskesmas Singandaru</strong></marquee>
						</ul><!-- /.breadcrumb -->
					</div>

					<div class="page-content">
						<div class="ace-settings-container" id="ace-settings-container">
							<div class="btn btn-app btn-xs btn-warning ace-settings-btn" id="ace-settings-btn">
								<i class="ace-icon fa fa-cog bigger-130"></i>
							</div>

							<div class="ace-settings-box clearfix" id="ace-settings-box">
								<div class="pull-left width-50">
									<div class="ace-settings-item">
										<div class="pull-left">
											<select id="skin-colorpicker" class="hide">
												<option data-skin="no-skin" value="#438EB9">#438EB9</option>
												<option data-skin="skin-1" value="#222A2D">#222A2D</option>
												<option data-skin="skin-2" value="#C6487E">#C6487E</option>
												<option data-skin="skin-3" value="#D0D0D0">#D0D0D0</option>
											</select>
										</div>
										<span>&nbsp; Choose Skin</span>
									</div>

									<div class="ace-settings-item">
										<input type="checkbox" class="ace ace-checkbox-2 ace-save-state" id="ace-settings-navbar" autocomplete="off" />
										<label class="lbl" for="ace-settings-navbar"> Fixed Navbar</label>
									</div>

									<div class="ace-settings-item">
										<input type="checkbox" class="ace ace-checkbox-2 ace-save-state" id="ace-settings-sidebar" autocomplete="off" />
										<label class="lbl" for="ace-settings-sidebar"> Fixed Sidebar</label>
									</div>

									<div class="ace-settings-item">
										<input type="checkbox" class="ace ace-checkbox-2 ace-save-state" id="ace-settings-breadcrumbs" autocomplete="off" />
										<label class="lbl" for="ace-settings-breadcrumbs"> Fixed Breadcrumbs</label>
									</div>

									<div class="ace-settings-item">
										<input type="checkbox" class="ace ace-checkbox-2" id="ace-settings-rtl" autocomplete="off" />
										<label class="lbl" for="ace-settings-rtl"> Right To Left (rtl)</label>
									</div>

									<div class="ace-settings-item">
										<input type="checkbox" class="ace ace-checkbox-2 ace-save-state" id="ace-settings-add-container" autocomplete="off" />
										<label class="lbl" for="ace-settings-add-container">
											Inside
											<b>.container</b>
										</label>
									</div>
								</div><!-- /.pull-left -->

								<div class="pull-left width-50">
									<div class="ace-settings-item">
										<input type="checkbox" class="ace ace-checkbox-2" id="ace-settings-hover" autocomplete="off" />
										<label class="lbl" for="ace-settings-hover"> Submenu on Hover</label>
									</div>

									<div class="ace-settings-item">
										<input type="checkbox" class="ace ace-checkbox-2" id="ace-settings-compact" autocomplete="off" />
										<label class="lbl" for="ace-settings-compact"> Compact Sidebar</label>
									</div>

									<div class="ace-settings-item">
										<input type="checkbox" class="ace ace-checkbox-2" id="ace-settings-highlight" autocomplete="off" />
										<label class="lbl" for="ace-settings-highlight"> Alt. Active Item</label>
									</div>
								</div><!-- /.pull-left -->
							</div><!-- /.ace-settings-box -->
						</div><!-- /.ace-settings-container -->
							<!-- PAGE CONTENT BEGINS -->
							<?php
								$page = (isset($_GET['page']))? $_GET['page'] : "main";
								switch ($page) {
								
								case 'dashboard' : include "dashboard.php"; break;
								case 'Konfigurasi_Petugas' : include "konfiguser.php"; break;
								case 'Konfigurasi_Pembayaran' : include "konfigpembayaran.php"; break;
								case 'Pendaftaran' : include "pendaftaran.php"; break;            
								case 'Poli' : include "poli.php"; break;
								case 'Lab' : include "lab.php"; break;
								case 'Apotik' : include "apotik.php"; break;
								case 'Kasir' : include "kasir.php"; break;
								case 'Anamnesa' : include "anamnesa.php"; break;
								case 'main' :
								default : include "dashboard.php"; 

								}
							?>
							<!-- PAGE CONTENT ENDS -->
					</div><!-- /.page-content -->
				</div>
			</div><!-- /.main-content -->

			<div class="footer">
				<div class="footer-inner">
					<div class="footer-content">
						<span class="bigger-120">
							<span class="blue bolder">SYMASKES</span>
							System Management Perawatan Puskesmas
						</span>
						&nbsp; &nbsp;
						<strong>PUSEKESMAS SINGANDARU</strong> Jl. 
					</div>
				</div>
			</div>

			<a href="#" id="btn-scroll-up" class="btn-scroll-up btn btn-sm btn-inverse">
				<i class="ace-icon fa fa-angle-double-up icon-only bigger-110"></i>
			</a>
		</div><!-- /.main-container -->

		<!-- basic scripts -->

		

		<!-- <![endif]-->

		<!--[if IE]>
		<script src="../assets/js/jquery-1.11.3.min.js"></script>
		<![endif]-->
		

		<!-- inline scripts related to this page -->
	</body>
</html>

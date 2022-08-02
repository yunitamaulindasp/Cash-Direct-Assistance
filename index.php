<?php
	require 'koneksi.php';
	session_start();
	
	if (!isset($_SESSION['status'])) //bila tidak ada var, session
	{	echo "<script>window.location.replace('login.php')</script>";
		die();
	}
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="icon" href="production/images/garuda.jpg" type="image/ico" />
		<title> SPK Moora </title>
		<link href="vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
		<link href="vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
		<link href="vendors/iCheck/skins/flat/green.css" rel="stylesheet">
		<link href="build/css/custom.min.css" rel="stylesheet">
		<link href="vendors/datatables.net-bs/css/dataTables.bootstrap.min.css" rel="stylesheet">
		<link href="vendors/datatables.net-buttons-bs/css/buttons.bootstrap.min.css" rel="stylesheet">
		<link href="vendors/datatables.net-fixedheader-bs/css/fixedHeader.bootstrap.min.css" rel="stylesheet">
		<link href="vendors/datatables.net-responsive-bs/css/responsive.bootstrap.min.css" rel="stylesheet">
		<link href="vendors/datatables.net-scroller-bs/css/scroller.bootstrap.min.css" rel="stylesheet">
		<script src="src/js/echarts.js"></script>
	</head>
	<body class="nav-md">
		<div class="container body">
			<div class="main_container">
				<div class="col-md-3 left_col">
					<div class="left_col scroll-view">
						<div class="navbar nav_title" style="border: 0;">
							<a href="?kode=dashboard" class="site_title"><i class="fa fa-money"></i> <span>BLT</span></a>
						</div>
						<div class="clearfix"></div>
						<div class="profile clearfix">
							<div class="profile_pic">
								<img src="production/images/garuda.jpg" alt="?kode=dashboard" class="img-circle profile_img">
							</div>
							<div class="profile_info">
								<span>Welcome</span>
								<?php
									echo "<h2>".$_SESSION['nama']."</h2>";
								?>
							</div>
						</div>
						<br />
						<div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
							<div class="menu_section">
								<h3>General</h3>
								<ul class="nav side-menu">
									<li><a href="?kode=dashboard"><i class="fa fa-home"></i> Home </a></li>
									<li><a href="?kode=kriteria"><i class="fa fa-edit"></i> Kriteria </a></li>
									<li><a href="?kode=subkriteria"><i class="fa fa-pencil"></i> Sub Kriteria </a></li>
									<li><a href="?kode=alternatif"><i class="fa fa-group"></i> Alternatif </a></li>
									<li><a href="?kode=rangking"><i class="fa fa-bar-chart-o"></i> MOORA Rangking </a></li>
<?php
	if ($_SESSION['status'] == 'admin')
	{
?>
									<li><a href="?kode=user"><i class="fa fa-institution"></i>User</a></li>
<?php
	}
?>
								</ul>
							</div>
						</div>
					</div>
				</div>
				<div class="top_nav">
					<div class="nav_menu">
						<div class="nav toggle">
							<a id="menu_toggle"><i class="fa fa-bars"></i></a>
						</div>
						<nav class="nav navbar-nav">
							<ul class=" navbar-right">
								<li class="nav-item dropdown open" style="padding-left: 15px;">
									<a href="javascript:;" class="user-profile dropdown-toggle" aria-haspopup="true" id="navbarDropdown" data-toggle="dropdown" aria-expanded="false">
										<img src="production/images/garuda.jpg" alt="">
										<?php
											echo $_SESSION['nama'];
										?>
									</a>
									<div class="dropdown-menu dropdown-usermenu pull-right" aria-labelledby="navbarDropdown">
										<a class="dropdown-item"  href="logout.php"><i class="fa fa-sign-out pull-right"></i> Log Out</a>
									</div>
								</li>
							</ul>
						</nav>
					</div>
				</div>
				<div class="right_col" role="main">
					<?php
						if ($_SESSION['status'] == 'admin')
						{
							if (isset($_GET['kode']))
							{
								$kode = $_GET['kode'];
								if ( $kode == 'dashboard')
								{ include ('production/admin/dashboard.php'); }
								if ( $kode == 'kriteria')
								{ include ('production/admin/kriteria.php'); }
								if ( $kode == 'inputkriteria')
								{ include ('production/admin/kriteria-input.php'); }
								if ( $kode == 'simpankriteria')
								{ include ('production/admin/simpankriteria.php'); }
								if ( $kode == 'editkriteria')
								{ include ('production/admin/kriteria-update.php'); }
								if ( $kode == 'updatekriteria')
								{ include ('production/admin/updatekriteria.php'); }
								if ( $kode == 'hapuskriteria')
								{ include ('production/admin/hapuskriteria.php'); }
								if ( $kode == 'subkriteria')
								{ include ('production/admin/subkriteria.php'); }
								if ( $kode == 'inputsubkriteria')
								{ include ('production/admin/subkriteria-input.php'); }
								if ( $kode == 'simpansubkriteria')
								{ include ('production/admin/simpansubkriteria.php'); }
								if ( $kode == 'editsubkriteria')
								{ include ('production/admin/subkriteria-update.php'); }
								if ( $kode == 'updatesubkriteria')
								{ include ('production/admin/updatesubkriteria.php'); }
								if ( $kode == 'hapussubkriteria')
								{ include ('production/admin/hapussubkriteria.php'); }
								if ( $kode == 'alternatif')
								{ include ('production/admin/alternatif.php'); }
								if ( $kode == 'inputalternatif')
								{ include ('production/admin/alternatif-input.php'); }
								if ( $kode == 'simpanalternatif')
								{ include ('production/admin/simpanalternatif.php'); }
								if ( $kode == 'editalternatif')
								{ include ('production/admin/alternatif-update.php'); }
								if ( $kode == 'updatealternatif')
								{ include ('production/admin/updatealternatif.php'); }
								if ( $kode == 'hapusalternatif')
								{ include ('production/admin/hapusalternatif.php'); }
								if ( $kode == 'rangking')
								{ include ('production/admin/moora.php'); }
								if ( $kode == 'user')
								{ include ('production/admin/user.php'); }
								if ( $kode == 'inputuser')
								{ include ('production/admin/inputuser.php'); }
								if ( $kode == 'simpanuser')
								{ include ('production/admin/simpanuser.php'); }
								if ( $kode == 'edituser')
								{ include ('production/admin/edituser.php'); }
								if ( $kode == 'updateuser')
								{ include ('production/admin/updateuser.php'); }
								if ( $kode == 'hapususer')
								{ include ('production/admin/hapususer.php'); }
							}
						}
						else if ($_SESSION['status'] == 'staf')
						{
							if (isset($_GET['kode']))
							{
								$kode = $_GET['kode'];
								if ( $kode == 'dashboard')
								{ include ('production/staf/dashboard.php'); }
								if ( $kode == 'kriteria')
								{ include ('production/staf/kriteria.php'); }
								if ( $kode == 'subkriteria')
								{ include ('production/staf/subkriteria.php'); }
								if ( $kode == 'alternatif')
								{ include ('production/staf/alternatif.php'); }
								if ( $kode == 'rangking')
								{ include ('production/staf/moora.php'); }
							}
						}
					?>
				</div>
				<footer>
					<div class="pull-right">
						© 2022 Yunita Maulinda
					</div>
					<div class="clearfix"></div>
				</footer>
			</div>
		</div>
		<script src="vendors/jquery/dist/jquery.min.js"></script>
		<script src="vendors/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
		<script src="vendors/iCheck/icheck.min.js"></script>
		<script src="build/js/custom.min.js"></script>
		<script src="vendors/datatables.net/js/jquery.dataTables.min.js"></script>
		<script src="vendors/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
		<script src="vendors/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
		<script src="vendors/datatables.net-buttons/js/buttons.flash.min.js"></script>
		<script src="vendors/datatables.net-buttons/js/buttons.html5.min.js"></script>
		<script src="vendors/datatables.net-buttons/js/buttons.print.min.js"></script>
		<script src="vendors/jszip/dist/jszip.min.js"></script>
		<script src="vendors/pdfmake/build/pdfmake.min.js"></script>
		<script src="vendors/pdfmake/build/vfs_fonts.js"></script>
		<script src="vendors/bootbox/bootbox.min.js"> </script>
	</body>
</html>

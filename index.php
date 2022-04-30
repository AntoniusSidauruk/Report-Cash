	<?php 


	?>


	<!DOCTYPE html>
	<html>
	<head>
	<title>Halaman Utama</title>
	<link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="assets/font-awesome/css/all.css">
	<link rel="stylesheet" type="text/css" href="assets/css/style.css">

	</head>
	<body>
	<?php
	session_start();
	if (!isset($_SESSION['username'])){
	header("Location:login/login.php");
	}
	?>
	<input type="checkbox" id="checkbox">
	<header class="header">
	<h2 class="judul"><b style="color: white">Keuangan</b>App
	<label for="checkbox">
	<i id="navbtn" class="fa fa-bars" aria-hidden="true"></i>
	</label>
	</h2>
	<a style="font-weight: bold;"><?php echo strtoupper($_SESSION['nama']) ?>&nbsp;&nbsp;<i class="fa fa-user"  arie-hidden="true"></i></a>
	</header>
	<div class="body">
	<nav class="side-bar">
	<div class="user">
	<img src="assets/image/find_user.png">
	
	</div>
	<ul>
	<li><a href="index.php">
		<i class="fa fa-desktop" aria-hidden="true"></i>
		<span>Dashboard</span></a></li>

		<li><a href="?report=add">
			<i class='fa fa-edit' aria-hidden="true"></i>
			<span>Input Data</span></a></li>

			<li><a href="?report=report">
				<i class="fa fa-envelope" aria-hidden="true"></i>
				<span>Laporan</span></a></li>

				<li><a href="logout.php">
					<i class="fa fa-power-off" aria-hidden="true"></i>
					<span>Logout</span></a></li>
				</ul>
			</nav>
			<section class="section">
				<?php 
				if (isset($_GET['report'])){
					$report = $_GET['report'];

					switch ($report){
						case 'report';
						include "report/laporan.php";
						break;

						case 'add';
						include "report/add.php";
						break;

						case 'proses';
						include "report/proses.php";
						break;

						case 'hapus';
						include "report/hapus.php";
						break;

						case 'edit';
						include "report/edit.php";
						break;

						case 'bulan';
						include "report/bulan.php";
						break;
					}

				}else{
					include "home.php";	
				}
				?>
			</section>
		</div>

		
	</body>
	</html>
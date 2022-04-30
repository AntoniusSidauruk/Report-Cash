<!DOCTYPE html>
<html>
<head>
	<title>Masukan Sesuai Akses</title>
	<link rel="stylesheet" type="text/css" href="login/style.css">
</head>
<body>
	<?php 
	if (isset($_GET['pesan'])){
		if($_GET['pesan']=="gagal"){
			echo "<center style='padding=20px'><div class='alert'>Username dan Password tidak sesuai !</div></center>";
		}else if($_GET['isi']=="isi"){
			echo "Isi";
		}
	}
	?>
	 
	<div class="container">
		<form method="POST" action="logic.php">
			<h2>SIGN IN HERE</h2>
			<input type="text" name="username" autocomplete="off" placeholder="Username ..." autofocus>
			<input type="password" name="password" autocomplete="off" placeholder="Password ...">
			<button class="btn-login" name="login">Login</button>
		</form>
	</div>

	
</body>
</html>
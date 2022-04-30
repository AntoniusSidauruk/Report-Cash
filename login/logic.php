<?php
include "../config/koneksi.php"; 

session_start();
if (isset($_SESSION['username'])){
	header("Location:../index.php");
}

if (isset($_POST["login"])){
	$username = $_POST['username'];
	$password = md5($_POST['password']);
	
	$sql = mysqli_query($connect,"SELECT * FROM user WHERE username='$username' and password = '$password'");
	$login = mysqli_fetch_assoc($sql);
	
	if (!empty($login)){
		$_SESSION['username'] = $login['username']; 
		$_SESSION['nama'] = $login['nama']; 
		header("Location:../index.php");
	
	}else{
		header("Location:login.php?pesan=gagal");
	}
}


?>
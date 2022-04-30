<?php 

$connect = mysqli_connect("localhost","root","","db_keuangan");

if (mysqli_connect_errno()){
	echo "Login Invalid " . mysqli_connect_error();
}

?>
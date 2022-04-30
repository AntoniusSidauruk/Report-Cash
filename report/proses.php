<?php 

include "config/koneksi.php";
if(isset($_POST['save'])){
	$tanggal = $_POST['tanggal'];
	$jenis = $_POST['jenis'];
	$kategori = $_POST['kategori'];
	$nominal = $_POST['nominal'];
	$ket = $_POST['keterangan'];

	$sql = mysqli_query($connect, "INSERT INTO transaksi (tanggal,jenis,kategori,nominal,keterangan) VALUES ('$tanggal','$jenis','$kategori','$nominal', '$ket')");
	if ($sql){
		    echo "<script>alert('Berhasil Disimpan').loca</script>";

	}else{
		echo "Gagal";
	}


}


?>
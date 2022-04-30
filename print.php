<html>
<head>
  <title>Cetak PDF</title>
  <style>
    table {
      border-collapse:collapse;
      table-layout:fixed;width: 630px;
      padding: 30px;

    }
    table td {
      word-wrap:break-word;
      width: 20%;
      text-align: center;
      padding: 6px;
    }
    table th{
      text-align: center;
      padding: 10px;
    }
    div{
      border-bottom: 3px solid black;
      padding-bottom: 10px;
    }
  </style>
</head>
<body>
  <div style="text-align: center;"><h3>PT.KEUANGAN INDONESIA</h3>
  Alamat : Menara Bank Danamon,
Jl.Rasuna Said <br> Blok C No.10,Jakarta Selatan 12940</div><br>
  <?php
  include "config/koneksi.php";
  if(isset($_GET['filter']) && ! empty($_GET['filter'])){ 
    $filter = $_GET['filter'];
    if($filter == '1'){
      $tgl1 = date('d-m-y', strtotime($_GET['tgl1'] AND $_GET['tgl2']));
      //echo '<b>Data Transaksi Tanggal '.$tgl.'</b><br /><br />';
      $query= "SELECT * FROM transaksi WHERE tanggal BETWEEN 'tgl1' AND 'tgl2'"; 

    }else if($filter == '2'){ 
      $nama_bulan = array('', 'Januari','Februari','Maret','April','Mei','Juni','Juli','Agustus','September','Oktober','November','Desember');
      $query = "SELECT * FROM transaksi WHERE MONTH(tanggal)='".$_GET['bulan']."' AND YEAR(tanggal)='".$_GET['tahun']."'"; 

    }else{ 
      echo '<b style=text-align=center>Data Laporan Tahun '.$_GET['tahun'].'</b>';
      $query = "SELECT * FROM transaksi WHERE YEAR(tanggal)='".$_GET['tahun']."'"; 
    }

  }else{ 
    echo '<b>Semua Data Transaksi</b><br /><br />';
    $query = "SELECT * FROM transaksi ORDER BY tanggal"; 
  }
  ?>
  <table border="1">
  <tr>
    <th style="width: 4px">No</th>
    <th>Tanggal</th>
    <th>Kategori</th>
    <th>Keterangan</th>
    <th>Jenis</th>
    <th>Nominal</th>
  </tr>
  <?php
  $no = 1;
  $sql = mysqli_query($connect, $query);
  $row = mysqli_num_rows($sql);
  if($row > 0){ 
    while($data = mysqli_fetch_array($sql)){
      $tgl = date('d-m-Y', strtotime($data['tanggal'])); 
      echo "<tr>";
      echo "<td style:width=5px>".$no++."</td>";
      echo "<td>".$tgl."</td>";
      echo "<td>".$data['kategori']."</td>";
      echo "<td>".$data['keterangan']."</td>";
      echo "<td>".$data['jenis']."</td>";
      echo "<td>".$data['nominal']."</td>";
      echo "</tr>";
    }
  }else{ 
    echo "<tr><td colspan='5'>Data tidak ada</td></tr>";
  }
  ?>
  </table>
</body>
</html>
<?php
$html = ob_get_contents();
ob_end_clean();
require 'assets/html2pdf/autoload.php';
$pdf = new Spipu\Html2Pdf\Html2Pdf('P','A4','en');
$pdf->WriteHTML($html);
$pdf->Output();
?>
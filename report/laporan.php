<!DOCTYPE html>
<html>
<head>
  <title></title>
  <link rel="stylesheet" href="assets/jquery-ui/jquery-ui.min.css" /> <!-- Load file css jquery-ui -->
  <script src="assets/js/jquery.min.js"></script> 
  <style type="text/css">
    th{
      text-align: center;
    }
    option {
      background: #00000008 ;
    </style>
  </head>
  <body>
   <div class="card mb-3">
    <div class="card-header" style=" font-family: arial; font-size: 17px">
      <b>Filter Laporan</b><a href="?page=laporanbln"></a><br><br>
      <form method="POST">
         <!--  <b style="margin-right: 143px">Mulai Tanggal</b>
          <b style="margin-right: 135px">Sampai Tanggal</b>
          <b style="margin-right: 135px">Kategori</b><br> -->

          <div id="form-tanggal">
            <input style="margin-right: 25px; float: left; width: 317px"  class="form-control" class="tgl1" type="date" name="tgl1">
            <input style="margin-right: 25px; float: left; width: 316px" class="form-control" class="tgl2" type="date" name="tgl2">
          </div>
          <div id="form-bulan">
<!--           <label>Bulan</label><br>
-->        <select name="bulan" style="width: 235px; float: left; border-collapse:" class="form-control">
  <option value="">--Pilih Bulan Kabisat--</option>
  <option value="1">Januari</option>
  <option value="2">Februari</option>
  <option value="3">Maret</option>
  <option value="4">April</option>
  <option value="5">Mei</option>
  <option value="6">Juni</option>
  <option value="7">Juli</option>
  <option value="8">Agustus</option>
  <option value="9">September</option>
  <option value="10">Oktober</option>
  <option value="11">November</option>
  <option value="12">Desember</option>
</select>
</div>
<div id="form-tahun">
  <select name="tahun" style="float: left;  width:  400px" class="form-control">
    <option value="">--Plilih Tahun Kabisat--</option>
    <?php 
    include "config/koneksi.php";
    $query = "SELECT YEAR(tanggal) AS tahun FROM transaksi GROUP BY YEAR(tanggal)";
    $sql = mysqli_query($connect,$query);
    while($data = mysqli_fetch_array($sql)){
      echo '<option values=""'.$data['tahun'].'">'.$data['tahun'].'</option>';
    }
    ?>
  </select>
</div>
          <!-- <select style="margin-right: 25px; float: left; width: 225px" class="form-control" type="date" name="kategori">
            <option>-Semua Kategori-</option>
            <option>Keperluan Kantor</option>
            <option>Pembuatan Aplikasi</option>
            <option>Tunjangan Karyawan</option>
            <option>Beli barang</option>
          </select> -->

          <select style="width: 500px; background-color: #3498DB; font-weight: bold; color: white; float: right;" name="filter" id="filter" class="form-control">
            <option style="background: #fff; color: black;">--Pilih Waktu--</option>
            <option value="1" style="background: #fff; color: black">Per Tanggal</option>
            <option value="2" style="background: #fff; color: black">Per Bulan</option>
            <option value="3" style="background: #fff; color: black">Per Tahun</option>
          </select><br><br>
          <input type="submit" name="search" style="width: 100%;  font-weight: bold;" value="Tampilkan" class="btn btn-success"></a>

        </form>
      </div>
    </div>
    <?php 
    if (isset($_POST['search'])){
      error_reporting(0);
      $tgl1 = $_POST['tgl1'];
      $tgl2 = $_POST['tgl2'];
    }

    ?>

    <div class="card mb-3">

      <div class="card-header" style=" font-family: arial; font-size: 17px">
        Laporan Pemasukan & Pengeluaran<a href="?page=laporanbln"></a><br><br>
        <ul>
          <b><li style="list-style-type: none;" >DARI TANGGAL &nbsp &nbsp &nbsp  &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp : <?php error_reporting(0); echo $tgl1?></li></b><br>
          <b><li style="list-style-type: none;">SAMPAI TANGGAL &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;: <?php error_reporting(0); echo $tgl2;  ?></li></b>
          <!-- <b><li style="list-style-type: none;">KATEGORI &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp :</li></b> -->
        </ul>
        <a href="?report=report" class="btn btn-danger">Reset</a>
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
          <thead>
            <tr>
              <th>NO</th>
              <th>TANGGAL</th>
              <th>KATEGORI</th>
              <th>KETERANGAN</th>
              <th>PEMASUKAN</th>
              <th>PENGELUARAN</th>
            </tr>
            <?php 
            include "config/koneksi.php";
            $no = 1;

            if(isset($_POST['filter']) && ! empty($_POST['filter'])){
              $filter = $_POST['filter'];
             if($filter == '1'){ 
              $tgl1 = $_POST['tgl1'];
              $tgl2 = $_POST['tgl2'];
              
              
            // echo '<b>Data Transaksi Tanggal '.$tgl.'</b><br /><br />';
              echo '<a class="btn btn-success" href="print.php?filter=1&tgl1&tgl2='.$_POST['tgl1']. ' ' .$_POST['tgl2'].'">Cetak PDF</a><br /><br />';
            $query = mysqli_query($connect, "SELECT * FROM transaksi WHERE tanggal BETWEEN '$tgl1' and '$tgl2' " ); 

        }else if($filter == '2'){ 
          $bulan = $_POST['bulan'];
          $tahun = $_POST['tahun'];
            // $nama_bulan = array('', 'Januari','Februari','Maret','April','Mei','Juni','Juli','Agustus','September','Oktober','November','Desember');
            // echo '<b>Data Transaksi Bulan '.$nama_bulan[$_POST['bulan']].' '.$_POST['tahun'].'</b><br /><br />';
          echo '<a style="" class="btn btn-success" href="print.php?filter=2&bulan='.$_POST['bulan'].'&tahun='.$_POST['tahun'].' ">Cetak PDF</a><br /><br />';
            $query = mysqli_query($connect, "SELECT * FROM transaksi WHERE month(tanggal)='$bulan' and year(tanggal)='$tahun'"); 

        }else{ 
          $tahun = $_POST['tahun'];
            // echo '<b>Data Transaksi Tahun '.$_GET['tahun'].'</b><br /><br />';
          echo '<a class="btn btn-success" href="print.php?filter=3&tahun='.$_POST['tahun'].'">Cetak PDF</a><br /><br />';
            $query = mysqli_query($connect,"SELECT * FROM transaksi WHERE year(tanggal)='$tahun'"); 
          }

    }else{ 
        // echo '<b>Semua Data Transaksi</b><br /><br />';
        echo '<a href="print.php" class="btn btn-success">Cetak PDF</a><br /><br />';
        $query = mysqli_query($connect, "SELECT * FROM transaksi"); 
      }

      if (mysqli_num_rows($query)){
        while($data = mysqli_fetch_array($query)){
         ?>
         <tr>
           <td><?php echo $no++ ?></td>
           <td><?php echo date('d F Y' , strtotime($data['tanggal'])) ?></td>
           <td><?php echo $data['kategori'] ?></td>
           <td><?php echo $data['keterangan'] ?></td>
           <td style='font-weight:bold'>
            <?php if($data['jenis'] == 'Pemasukan'){
              echo 'Rp. ' . number_format($data['nominal']). "</td>";
            }else if($data['jenis'] == 'Pengeluaran'){
             echo  "<td style='font-weight:bold'>" . 'Rp. ' . number_format($data['nominal']) . "</td>";
           }
           ?>
         </tr>
       <?php  }} ?>
    </thead>

  </div>

  <script>
   $(document).ready(function(){ 
    $('.tgl1, .tgl2').datepicker({
      dateFormat: 'yy-mm-dd' 
    });
    $('#form-bulan,#form-tahun,#form-tanggal').hide();
    $('#filter').change(function(){ 
     if($(this).val() == '1'){ 
      $('#form-bulan, #form-tahun').hide(); 
      $('#form-tanggal').show(); 
    }else if($(this).val() == '2'){ 
      $('#form-tanggal').hide(); 
      $('#form-bulan, #form-tahun').show(); 
    }else if($(this).val() == '3'){
      $('#form-tanggal, #form-bulan').hide(); 
      $('#form-tahun').show(); 
    }else{
      $('#form-tanggal, #form-bulan, #form-tahun').hide(); 
    }
    $('#form-tanggal input, #form-bulan select, #form-tahun select').val(''); 

  })
  })
</script>
<script type="" src="assets/jquery-ui/jquery-ui.min.js"></script>
</body>
</html>

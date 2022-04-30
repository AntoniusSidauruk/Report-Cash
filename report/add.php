<!DOCTYPE html>
<html>
<head>
  <title></title>
  <link rel="stylesheet" type="text/css" href="../assets/css/bootstrap.css">
</head>
<body>

  <a href="" id="exampleModal" data-toggle="modal" data-target="#myModal" style="padding: 10px; background: #62f970; border-radius: 10px; text-align: center; text-decoration: none; color: white;"><b>Tambah Transaksi</b></a><br>
  <table class="table table-hover">
    <thead>
      <tr>
        <th scope="col" style="text-align: center;">NO</th>
        <th scope="col" style="text-align: center;">Tanggal</th>
        <th scope="col" style="text-align: center;">Kategori</th>
        <th scope="col" style="text-align: center;">Keterangan</th>
        <th scope="col" style="text-align: center;">Jenis</th>
        <th scope="col" style="text-align: center;">Nominal</th>
        <th scope="col" style="text-align: center;">OPSI</th>
      </tr>
    </thead>
    <tbody>
      <?php
      include "config/koneksi.php";
      $no = 1;
      $sql = mysqli_query($connect, "SELECT * FROM transaksi");
      while($data = mysqli_fetch_array($sql)){
        ?>
        <tr>
          <td scope="row" style="text-align: center;"><?php echo $no++ ?></td>
          <td style="text-align: center;"><?php echo $data['tanggal']  ?></td>
          <td style="text-align: center;"><?php echo $data['kategori'] ?></td>
          <td style="text-align: center;"><?php echo $data['keterangan'] ?></td>
          <td style="text-align: center;"><?php echo $data['jenis'] ?></td>
          <td style="text-align: center;"><?php echo "Rp. " . number_format($data['nominal']) ?></td>
          <td style="text-align: center;"><a class="btn btn-warning" href=""><i class="fa fa-edit"></i></a>
            <a class="btn btn-danger" href=""><i class="fa fa-trash"></i></a>

          </tr>
        <?php } ?>
      </tbody>
    </table>

    <!-- Modal Untul Tambah -->
    <div id="myModal" class="modal fade" role="dialog">
      <div class="modal-dialog">
        <!-- konten modal-->
        <div class="modal-content">
          <!-- heading modal -->
          <div class="modal-header">
            <h4 class="modal-title">Tambah Transaksi</h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
          </div>
          <!-- body modal -->
          <div class="modal-body">
            <form role="form" method="POST" action="?report=proses">
              <div class="form-group">
                <label for="inputName">Tanggal</label>
                <input type="date" class="form-control" name="tanggal" id="inputName" placeholder="Enter your name"/>
              </div>
              <div class="form-group">
                <label for="inputEmail">Jenis</label>
                <select name="jenis" name="jenis" class="form-control" id="inputEmail"/>
                <option>--Pilih--</option>
                <option>Pemasukan</option>
                <option>Pengeluaran</option>
              </select>
            </div>
            <div class="form-group">
              <label for="inputMessage">Kategori</label>
              <select style="background-color: #00000008" class="form-control" type="date" name="kategori">
                <option>-Semua Kategori-</option>
                <option>Keperluan Kantor</option>
                <option>Pembuatan Aplikasi</option>
                <option>Tunjangan Karyawan</option>
              </select>
            </div>
            <div class="form-group">
              <label for="inputEmail">Nominal</label>
              <input type="number" name="nominal" class="form-control" id="inputEmail"/>
            </div>
            <div class="form-group">
              <label for="inputEmail">Keterangan</label>
              <textarea class="form-control" name="keterangan" id="inputEmail"/></textarea>
            </div>

            <div class="modal-footer">
              <button type="submit" name="save" class="btn btn-primary">Save</button>
              <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
            </div>
          </form>
        </div>
        <!-- footer modal -->
        
      </div>
    </div>
  </div>
</div>


<script src="assets/js/jquery.js"></script> 
<script src="assets/js/popper.js"></script> 
<script src="assets/js/bootstrap.js"></script>

</body>
</html>
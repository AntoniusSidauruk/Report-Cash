<div class="card mb-3">
      <div class="card-header" style=" font-family: arial; font-size: 17px">
        Filter Laporan<a href="?page=laporanbln"></a><br><br>
        <form method="POST">
          <b style="margin-right: 143px">Mulai Tanggal</b>
          <b style="margin-right: 135px">Sampai Tanggal</b>
          <b style="margin-right: 135px">Kategori</b><br>


          <input style="margin-right: 25px; float: left; width: 235px"  class="form-control" type="date" name="tgl1">
          <input style="margin-right: 25px; float: left; width: 235px" class="form-control" type="date" name="tgl2">
          <select style="margin-right: 25px; float: left; width: 235px" class="form-control" type="date" name="kategori">
            <option>-Semua Kategori-</option>
            <option>Keperluan Kantor</option>
            <option>Pembuatan Aplikasi</option>
            <option>Tunjangan Karyawan</option>
            <option>Beli barang</option>
          </select>

          <input type="submit" name="search" style="width: 290px; font-weight: bold;" value="Tampilkan" class="btn btn-success"></a>

          <input type="submit" name="bulan" style="width:; font-weight: bold;" value="Bulanan" class="btn btn-primary"></a><br>
        </form>
      </div>
    </div>
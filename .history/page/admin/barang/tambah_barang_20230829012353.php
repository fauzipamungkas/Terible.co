<div class="box-title">
    <p>Barang / <b>Manajemen Barang Jualan</b></p>
</div>
<div id="box">

  <h1>Barang Jualan Tambah</h1>
  <form name="add" method="post" action="?page=tambah_barangpro" enctype="multipart/form-data">
  
    <table class="article">

      <tr>
        <td>Gambar</td>
        <td>
          <input type="file" name="gambar" required>
        </td>
      </tr>
      <tr>
        <td>Deskripsi Jersey</td>
        <td>
          <input type="text" name="deskripsi" class="form-control" placeholder="ex: jersey barcelona away" required>
        </td>
      </tr>
      <tr>
        <td>Harga</td>
        <td>
          <input type="text" name="harga" class="form-control" placeholder="ex: 130000" required>
        </td>
      </tr>
      <tr>
        <td>Stok Jersey</td>
        <td>
          <input type="text" name="stok" class="form-control" placeholder="ex: 100" required>
        </td>
      </tr>
      <tr>
        <td>Berat :</td>
        <td>
          <input type="text" name="berat" class="form-control" placeholder="ex: 100" required>
        </td>
      </tr>
      <tr>
        <td></td>
        <td>
          <input class="tombol-biru m-5" type="submit" name="add" value="Tambah & Simpan">
          <a class="tombol-merah" href="?page=barang">Tutup</a>
        </td>
      </tr>
    </table>
  </form>


</div>

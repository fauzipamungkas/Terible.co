<div class="box-title">
    <p>Barang / <b>Manajemen Barang Jualan</b></p>
</div>
<div id="box">

  <h1>Barang Jualan Tambah</h1>
  <form name="add" method="post" action="?page=tambah_barangpro" enctype="multipart/form-data">
  
    <div class="article">

      <div class="d-flex p-3">
        <div class="w-25">Gambar</div>
        <div>
          <input type="file" name="gambar" required>
        </div>
      </div>
      <div class="d-flex p-3">
        <div class="w-25">Deskripsi Jersey</div>
        <div>
          <input type="text" name="deskripsi" class="form-control" placeholder="ex: jersey barcelona away" required>
        </div>
      </div>
      <div class="d-flex p-3">
        <div class="w-25">Harga</div>
        <div>
          <input type="text" name="harga" class="form-control" placeholder="ex: 130000" required>
        </div>
      </div>
      <div class="d-flex p-3">
        <div class="w-25">Stok Jersey</div>
        <div>
          <input type="text" name="stok" class="form-control" placeholder="ex: 100" required>
        </div>
      </div>
      <div class="d-flex p-3">
        <div class="w-25">Berat </div>
        <div>
          <input type="text" name="berat" class="form-control" placeholder="ex: 100" required>
        </div>
      </div>
      <div class="text-center p-4">
        <div>
          <input class="btn btn-primary" type="submit" name="add" value="Tambah & Simpan">
          <a class="btn btn-danger" href="?page=barang">Tutup</a>
        </div>
      </div>
    </div>
  </form>


</div>

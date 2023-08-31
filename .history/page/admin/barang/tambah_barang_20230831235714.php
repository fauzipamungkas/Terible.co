<div class="box-title">
    <p>Barang / <b>Manajemen Barang Jualan</b></p>
</div>
<div id="box">

  <h1>Barang Jualan Tambah</h1>
  <form name="add" method="post" action="?page=tambah_barangpro" enctype="multipart/form-data">
  
    <div class="article mt-3">

      <div class="d-flex p-3">
        <div class="w-25">Gambar</div>
        <div>
          <input type="file" name="gambar" required>
        </div>
      </div>
      <div class="d-flex p-3">
        <div class="w-25">Nama Barang</div>
        <div>
          <input type="text" name="nama_barang" class="form-control" placeholder="isi nama barang" required>
        </div>
      </div>
      <div class="d-flex p-3">
        <div class="w-25">Deskripsi Barang</div>
        <div>
          <input type="text" name="deskripsi" class="form-control" placeholder="isi deskripsi barang" required>
        </div>
      </div>
      <div class="d-flex p-3">
        <div class="w-25">Harga</div>
        <div>
          <input type="text" name="harga" class="form-control" placeholder="isi harga" required>
        </div>
      </div>
      <div class="d-flex p-3">
        <div class="w-25">Stok</div>
        <div>
          <input type="text" name="stok" class="form-control" placeholder="isi stok barang" required>
        </div>
      </div>
      <div class="d-flex p-3">
        <div class="w-25">Berat </div>
        <div>
          <input type="text" name="berat" class="form-control" placeholder="isi berat barang per gram" required>
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

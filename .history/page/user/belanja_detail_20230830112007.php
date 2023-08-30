<div class="box-title">
    <p>Beranda / <b>Produk Jualan</b></p>
</div>
<div id="box">

<?php
  include "lib/koneksi.php";

    $user = $_SESSION['username'];
    $ambiluser = $conn->prepare("SELECT * FROM tbl_users WHERE username =:user");
    $ambiluser->bindparam(':user', $user);
    $ambiluser->execute();
    $data = $ambiluser->fetch(PDO::FETCH_OBJ);

    $id = $_GET['id'];
    $sisa = $_GET['st'];
    $result = $conn->prepare("SELECT * FROM tbl_barang WHERE id_barang =:id");
    $result->bindparam(':id', $id);
    $result->execute();
    $row=$result->fetch(PDO::FETCH_OBJ);
 ?>

<h1>Detail Barang</h1>
<form name="belanja" method="post" action="?page=belanja_detailpro" enctype="multipart/form-data">

<div class="container">
  <div class="row">
    <div class="col d-flex justify-content-center">
      <input type="hidden" name="id_user" value="<?php echo $data->id_user ?>">
      <input type="hidden" name="id_barang" value="<?php echo $row->id_barang ?>">
      <img src="img/jersey/<?php echo $row->nama_image ?>" width="30%"><br><br>
    </div>
  </div>
</div>

  <div class="row">
    <div class="col">
      <p width="20%">
        Nama Barang
      </p>
      <p>
        <?php echo $row->nama_barang ?>
      </p>
    </div>
    <div class="row">
      <div class="col">
        <p>Deskripsi Jersey</p>
          <p>
            <?php echo $row->deskripsi ?>
        </p>
      </div>
    <div>
    <div class="row">
      <div class="col">
        <p>Harga</p>
          <p>
            <input type="hidden" name="harga" value="<?php echo $row->harga; ?>">
            <?php echo "Rp.".number_format($row->harga,0,",","."); ?>
          </p>
      </div>
    <div>
      <div class="row">
        <div class="col">
          <p>Stok</p>
            <p>
              <input type="hidden" name="sisa" value="<?php echo $sisa ?>">
              <?php echo $sisa ?>
            </p>
          </div>
        </div>
    <div class="row">
      <div class="col">
        <p>Ukuran</p>
          <div>
            <select name="ukuran" class="form-control">
              <option>-- pilih salah satu --</option>
              <option value="S">S</option>
              <option value="M">M</option>
              <option value="L">L</option>
              <option value="XL">XL</option>
              <option value="XXL">XXL</option>
            </select>
            <div>
        </div>
    <div>
      <div class="row">

        <div class="col">
          <p>Qty</p>
          <p>
            <input type="number" name="qty" class="form-control" value="1">
          </p>
        </div>
    <div>
    <div class="col">
      <p>Provinsi : <div>
      <p>
        <select name="provinsi" class="form-control">
        </select>
      <div>
    <div>
    <div class="col">
      <p>Kota : <div>
      <p>
        <select name="kota" class="form-control">
        </select>
      <div>
    <div>
    <div class="col">
      <p>Kurir Pengiriman<div>
      <p>
        <select name="kurir" class="form-control">
          
        </select>
      <div>
    <div>
    <div class="col">
      <p>Pilih Paket<div>
      <p>
        <select name="paket" class="form-control">
          
          </select>
        <div>
      <div>
      <div class="col">
        <p>Alamat<div>
        <p>
          <textarea name="alamat" class="form-control"></textarea>
        <div>
      <div>
        <div class="col">
          <p>Berat/satuan<div>
        <p>
          <input type="text" name="totalberat" class="form-control" value="<?php echo $row->berat ?>" hidden>
        <div>
      <div>
      <div class="col">
        <p>
          <input type="text" name="provinsi" class="form-control" hidden>
        <div>
        <p>
          <input type="text" name="kota" class="form-control" hidden>
      <div>
      <p>
        <input type="text" name="type_kota" class="form-control" hidden>
      <div>
      <p>
        <input type="text" name="kode_pos" class="form-control" hidden>
      <div>
    <div>
      <div class="col">
        
      <p>
        <input type="text" name="kurir" class="form-control" hidden>
      <div>
      <p>
        <input type="text" name="paket" class="form-control" hidden>
      <div>
      <p>
        <input type="text" name="ongkir" class="form-control" hidden>
      <div>
      <p>
        <input type="text" name="estimasi" class="form-control" hidden>
      <div>
    <div>
    <div class="col">
      <p>
        <input type="text" name="total" class="form-control" value="" hidden>
      <div>
      <p>
        <input class="tombol-biru" type="submit" name="belanja" value="Isi dalam keranjang">
        <a class="tombol-merah" href="?page=beranda">Kembali</a>
      <div>
    <div>
  </div>
</form>
</div>

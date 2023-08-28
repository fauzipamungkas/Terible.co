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

  <table class="article">
    <tr>
      <td>Gambar</td>
      <td>
        <input type="hidden" name="id_user" value="<?php echo $data->id_user ?>">
        <input type="hidden" name="id_barang" value="<?php echo $row->id_barang ?>">
        <img src="img/jersey/<?php echo $row->nama_image ?>" width="100"><br><br>
      </td>
    </tr>
    <tr>
      <td>Deskripsi Jersey</td>
      <td>
        <?php echo $row->deskripsi ?>
      </td>
    </tr>
    <tr>
      <td>Harga</td>
      <td>
        <input type="hidden" name="harga" value="<?php echo $row->harga; ?>">
        <?php echo "Rp.".number_format($row->harga,0,",","."); ?>
      </td>
    </tr>
    <tr>
      <td>Stok</td>
      <td>
        <input type="hidden" name="sisa" value="<?php echo $sisa ?>">
        <?php echo $sisa ?>
      </td>
    </tr>
    <tr>
      <td>Ukuran</td>
      <td>
        <select name="ukuran" class="form-control">
          <option>-- pilih salah satu --</option>
          <option value="S">S</option>
          <option value="M">M</option>
          <option value="L">L</option>
          <option value="XL">XL</option>
          <option value="XXL">XXL</option>
        </select>
      </td>
    </tr>
    <tr>
      <td>Qty</td>
      <td>
        <input type="number" name="qty" class="form-control" value="1">
      </td>
    </tr>
    <tr>
      <td>Provinsi : </td>
      <td>
        <select name="provinsi" class="form-control">
        </select>
      </td>
    </tr>
    <tr>
      <td>Kota : </td>
      <td>
        <select name="kota" class="form-control">
        </select>
      </td>
    </tr>
    <tr>
      <td>Kurir Pengiriman</td>
      <td>
        <select name="kurir" class="form-control">
          
        </select>
      </td>
    </tr>
    <tr>
      <td>Pilih Paket</td>
      <td>
        <select name="paket" class="form-control">
          
          </select>
        </td>
      </tr>
      <tr>
        <td>Berat</td>
        <td>
          <input type="text" name="totalberat" class="form-control" value="120">
        </td>
      </tr>
      <tr>
        <td>
          <input type="text" name="provinsi" class="form-control">
        </td>
        <td>
          <input type="text" name="kota" class="form-control">
      </td>
      <td>
        <input type="text" name="type_kota" class="form-control">
      </td>
      <td>
        <input type="text" name="kode_pos" class="form-control">
      </td>
      <td>
        <input type="text" name="kurir" class="form-control">
      </td>
      <td>
        <input type="text" name="paket" class="form-control">
      </td>
      <td>
        <input type="text" name="ongkir" class="form-control">
      </td>
      <td>
        <input type="text" name="estimasi" class="form-control">
      </td>
    </tr>
    <tr>
      <td></td>
      <td>
        <input class="tombol-biru" type="submit" name="belanja" value="Isi dalam keranjang">
        <a class="tombol-merah" href="?page=beranda">Kembali</a>
      </td>
    </tr>
  </table>
</form>
</div>

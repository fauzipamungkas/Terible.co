<?php include("slider.php")?>

<hr class="w-75 mx-auto border border-3 border-dark">

<div id="box">
  <?php
  if (isset ($_SESSION['username']) == ""){ ?>
    <div class="pesan">
      <p>Masuk dengan <b>akun</b> terlebih dahulu sebelum mulai belanja, belum punya akun ?
      <a href="page/daftar.php" class="tombol-biru">Yuk Daftar</a></p>
    </div>
  <?php } ?>

  <table>
  <tr>
  <?php
  include 'lib/koneksi.php';
  $no = 1;
  $query = $conn->prepare("SELECT * FROM tbl_barang");
  $query->execute();

  $data = $query->fetchAll();

  foreach ($data as $value) { ?>
    <div class="card" style="width: 18rem;">
  <img src="img/jersey/<?php echo $value['nama_image']; ?>" class="card-img-top" alt="...">
  <div class="card-body">
    <h5 class="card-title">Card title</h5>
    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
    <a href="#" class="btn btn-primary">Go somewhere</a>
  </div>
</div>

    <td class="list">
      <img src="img/jersey/<?php echo $value['nama_image']; ?>" width="100">
    <br><?php echo $value['deskripsi']; ?>
    <br><b><?php echo "Rp.".$value['harga']; ?></b>
    <br>
    <?php

    $id = $value['id_barang'];
    $query = $conn->prepare("SELECT SUM(qty)AS jumlah FROM tbl_pesanan WHERE id_barang=:id");
    $query->bindparam(':id', $id);
    $query->execute();
    $data = $query->fetch(PDO::FETCH_OBJ);
    $hasil = $data->jumlah;

    $stok = $value['stok'];
    $sisa = ($stok-$hasil);
    ?>
    <button type="button">Stok : <?php
    if ($sisa > 0) echo $sisa;
    else echo "Habis";
    ?></button>
    <?php
    if ($sisa > 0){
    if (isset ($_SESSION['username']) != ""){ ?>
      <a class="link"href="?page=belanja_detail&id=<?php echo $value['id_barang']; ?>&st=<?php echo $sisa; ?>">Beli</a>
    <?php }} ?>
    </td>
  <?php
    if ($no%4 == 0) echo "</tr><tr>";
    $no++;
    } ?>
</tr>
</table>
</div>

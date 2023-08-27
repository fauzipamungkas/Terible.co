<?php include("slider.php")?>

<hr class="w-75 mx-auto border border-3 border-dark">

<div class="row mb-5">
  <div class="col-12">
    <?php
      if (isset ($_SESSION['username']) == ""){ ?>
        <div class="pesan p-3">
          <p>Masuk dengan <b>akun</b> terlebih dahulu sebelum mulai belanja, belum punya akun ?
          <a href="page/daftar.php" class="tombol-biru">Yuk Daftar</a></p>
        </div>
    <?php } ?>
  </div>

  <div class="m-5">
    <h3>Produk Kami</h3>
  </div>
  
  <?php
  include 'lib/koneksi.php';
  $no = 1;
  $query = $conn->prepare("SELECT * FROM tbl_barang");
  $query->execute();

  $data = $query->fetchAll();

  foreach ($data as $value) { ?>
    
      <div class="col-3">
        <div class="card shadow ps-3 pe-3" style="width: 18rem;">
        <div style="height: 150px" class="text-center">
          <img src="img/jersey/<?php echo $value['nama_image']; ?>" class="card-img-top w-50 mx-auto mt-3" alt="...">
        </div>
            <div class="card-body">
            <h5 class="card-title text-truncate"><?php echo $value['deskripsi']; ?></h5>
            <div class="col-6 fw-bold"><?php echo "Rp.".$value['harga']; ?></div>
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
            <div class="col-6">Stok : <?php
            if ($sisa > 0) echo $sisa;
            else echo "Habis";
            ?></div>
            <div class="d-grid gap-2">
              <?php
            if ($sisa > 0){
              if (isset ($_SESSION['username']) != ""){ ?>
                <a href="?page=belanja_detail&id=<?php echo $value['id_barang']; ?>&st=<?php echo $sisa; ?>" class="btn btn-primary">Beli</a>
                <?php }} ?>
              </div>
          </div>
        </div>
      </div>
  <?php } ?>
</div>

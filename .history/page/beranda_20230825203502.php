<?php include("slider.php")?>

<hr class="w-75 mx-auto border border-3 border-dark">

<div class="row">
  <div class="col-12">
    <?php
      if (isset ($_SESSION['username']) == ""){ ?>
        <div class="pesan p-3">
          <p>Masuk dengan <b>akun</b> terlebih dahulu sebelum mulai belanja, belum punya akun ?
          <a href="page/daftar.php" class="tombol-biru">Yuk Daftar</a></p>
        </div>
    <?php } ?>
  </div>

  
  <?php
  include 'lib/koneksi.php';
  $no = 1;
  $query = $conn->prepare("SELECT * FROM tbl_barang");
  $query->execute();

  $data = $query->fetchAll();

  foreach ($data as $value) { ?>
    
      <div class="col-4 justify-content-center">
        <div class="card" style="width: 18rem;">
          <img src="img/jersey/<?php echo $value['nama_image']; ?>" class="card-img-top w-50 text-center" alt="...">
            <div class="card-body">
            <h5 class="card-title"><?php echo $value['deskripsi']; ?></h5>
            <p class="fw-bold"><?php echo "Rp.".$value['harga']; ?></p>
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
            <p>Stok : <?php
            if ($sisa > 0) echo $sisa;
            else echo "Habis";
            ?></p>
            <a href="?page=belanja_detail&id=<?php echo $value['id_barang']; ?>&st=<?php echo $sisa; ?>" class="btn btn-primary">Go somewhere</a>
          </div>
        </div>
      </div>
  <?php
    } ?>
</div>

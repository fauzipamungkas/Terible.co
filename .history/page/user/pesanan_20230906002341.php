<div class="box-title">
    <p>Beranda / <b>Produk Jualan</b></p>
</div>
<div id="box">
<h1>Pembayaran</h1>
<?php
// code by muh iriansyah putra pratama
    include 'lib/koneksi.php';
// code by muh iriansyah putra pratama

    $total = $_GET['jum'];
    $id = $_GET['id'];
    try {
      $conn ->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      $insert = $conn->prepare("INSERT INTO tbl_pesanan (id_user,id_barang,ukuran,qty,kurir,date_in,total,alamat_pesan,bayar) SELECT id_user,id_barang,ukuran,qty,kurir,date_in,total,alamat_pesan,bayar FROM tbl_keranjang WHERE id_user=:id");
      $insert->bindparam(':id', $id);
      $insert->execute();

      $delete = $conn->prepare("DELETE FROM tbl_keranjang WHERE id_user=:id");
      $delete->bindparam(':id', $id);
      $delete->execute();
      ?>
      
  <form name="add" method="post" action="?page=bukti&id=<?php echo $id ?>" enctype="multipart/form-data">
  <div class="article">
    <div class="d-flex p-3">
      <div class="w-25">Status</div>
      <div><a class="btn btn-primary">Pesanan Berhasil</a></div>
    </div>
    <div class="d-flex p-3">
      <div class="w-25">Jumlah Pembayaran</div>
      <div><b><?php echo "Rp. ".number_format($total,0,",","."); ?></b></div>
    </div>
    <div class="d-flex p-3">
      <div class="w-25">Deskripsi</div>
      <div>
        Lakukan pembayaran dengan mentransfer nominal <b>Jumlah Pembayaran</b> pada rekening :<br>
        BANK MANDIRI<br>
        Rekening : 118-000-972525-9<br>
        A.N : Muh Iriansyah<br>
      </div>
    </div>
    <div class="d-flex p-3">
      <div class="w-25">Lanjutan</div>
      <div>
        Jika sudah melakukan pembayaran, segera <b>Konfirmasi Pembayaran</b> dengan mengirimkan bukti pembayaran di : <br>
        <div class="mt-4 mb-4"><input type="file" name="bukti" required></div>
        <div class="mt-4 mb-4"><input type="text" name="id" value="<?php echo $id ?>" required></div>
        <div>
          <input class="btn btn-primary" type="submit" name="add" value="Kirim Bukti">
        </div>
      </div>
    </div>
    <div class="d-flex justify-content-center p-3">
      <div>
        Terima kasih telah membeli jersey di website kami <br>
        anda dapat melihat <a class="link" href="?page=belanja">Detail Pesanan</a>
      </div>
    </div>
  </div>
    </form>

   <?php
    } catch (PDOexception $e) {
      print "Added data failed: " . $e->getMessage() . "<br/>";
       die();
    }
// code by muh iriansyah putra pratama
 ?>
</div>

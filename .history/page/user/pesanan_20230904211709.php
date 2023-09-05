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
      $insert = $conn->prepare("INSERT INTO tbl_pesanan (id_user,id_barang,ukuran,qty,kurir,date_in,total,alamat_pesan) SELECT id_user,id_barang,ukuran,qty,kurir,date_in,total,alamat_pesan FROM tbl_keranjang WHERE id_user=:id");
      $insert->bindparam(':id', $id);
      $insert->execute();

      $delete = $conn->prepare("DELETE FROM tbl_keranjang WHERE id_user=:id");
      $delete->bindparam(':id', $id);
      $delete->execute();
      ?>
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
        <div class="mt-3"><input type="file" name="bukti" id="" required></div>
      </div>
    </div>
    <div class="d-flex justify-content-center p-3">
      <div>
        Terima kasih telah membeli jersey di website kami <br>
        anda dapat melihat <a class="link" href="?page=belanja">Detail Pesanan</a>
      </div>
    </div>
  </div>

   <?php
    } catch (PDOexception $e) {
      print "Added data failed: " . $e->getMessage() . "<br/>";
       die();
    }
// code by muh iriansyah putra pratama
 ?>
</div>

<div class="box-title">
    <p>Transaksi / <b>Transaksi Pembelian Barang</b></p>
</div>
<div id="box">
  <h1>Transaksi</h1>

  <?php
  include 'lib/koneksi.php';
  $query = $conn->prepare("SELECT * FROM tbl_pesanan
                           JOIN tbl_barang ON tbl_pesanan.id_barang=tbl_barang.id_barang
                           JOIN tbl_users ON tbl_pesanan.id_user=tbl_users.id_user
                           ORDER BY date_in DESC");
  $query->execute();
  $data = $query->fetchAll();
  $count = $query->rowCount();
  ?>

  <table class="news">
    <tr class="text-center">
      <th>id_Pesanan</th>
      <th>Pemesan</th>
      <th>Id_Barang</th>
      <th>Ukuran</th>
      <th>Qty</th>
      <th>Alamat</th>
      <th>Kurir</th>
      <th>Tanggal Masuk</th>
      <th>Total</th>
      <th>Status</th>
    </tr>
    <?php
    foreach ($data as $value): ?>
        <tr>
            <td><?php echo $value['id_pesanan'] ?></td>
            <td><?php echo "(".$value['id_user'].") ".$value['nama_lengkap'] ?></td>
            <td><?php echo $value['id_barang'] ?></td>
            <td><?php echo $value['ukuran'] ?></td>
            <td><?php echo $value['qty'] ?></td>
            <td><?php echo $value['alamat_pesan'] ?></td>
            <td><?php echo $value['kurir'] ?></td>
            <td><?php echo $value['date_in'] ?></td>
            <td><?php echo "Rp.".number_format($value['total'],0,",",".") ?></td>
            <td>
              <div class="d-flex justify-content-column">
                <input type="checkbox" name="proses" id="">proses
                <input type="checkbox" name="sukses" id="">sukses
              </div>
              <a class="tombol-biru" href="?page=transaksi_detail&id=<?php echo $value['id_pesanan']; ?>">Detail</a>
            </td>
        </tr>
    <?php
    endforeach;
     ?>
  </table>
  <br>
  <?php
  if ($count == 0){
    echo "<center>-- Belum ada pesanan barang --</center>";
    echo "<br>";
  }
   ?>

</div>

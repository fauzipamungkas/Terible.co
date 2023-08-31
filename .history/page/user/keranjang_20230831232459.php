<?php

include 'lib/koneksi.php';

if (isset($_SESSION['username'])) $user = $_SESSION['username'];
$ambiluser = $conn->prepare("SELECT * FROM tbl_users WHERE username =:user");
$ambiluser->bindparam(':user', $user);
$ambiluser->execute();
$data = $ambiluser->fetch(PDO::FETCH_OBJ);
if (isset($_SESSION['username'])) $id = $data->id_user;

$query = $conn->prepare("SELECT id,nama_barang,harga,ukuran,qty,kurir,total,alamat
                        FROM tbl_keranjang
                        JOIN tbl_barang ON tbl_keranjang.id_barang=tbl_barang.id_barang
                        WHERE tbl_keranjang.id_user=:id
                        GROUP BY tbl_keranjang.id");
$query->bindparam(':id', $id);
$query->execute();
$data = $query->fetchAll();
$count = $query->rowCount();

 ?>

<div class="keranjang-title pb-3">
    <p>Keranjang Belanja :<a class="tombol-biru"><?php echo $count; ?></a></p>
</div>
<div id="keranjang">
  <table class="news des">
    <tr align="center">
      <th>No</th>
      <th>Id Pesanan</th>
      <th>Barang</th>
      <th>Harga</th>
      <th>Ukuran</th>
      <th>Qty</th>
      <th>Kurir</th>
      <th>Total</th>
      <th>Aksi</th>
    </tr>
    <?php
    $no=1;
    $jumlah=0;
    foreach ($data as $value): ?>
        <tr align="center">
            <td><?php echo $no; ?></td>
            <td><?php echo $value['id'] ?></td>
            <td><?php echo $value['nama_barang'] ?></td>
            <td><?php echo "Rp.".number_format($value['harga'],0,",",".") ?></td>
            <td><?php echo $value['ukuran'] ?></td>
            <td><?php echo $value['qty'] ?></td>
            <td><?php echo $value['kurir'] ?></td>
            <td><?php echo "Rp.".number_format($value['total'],0,",",".") ?></td>
            <td>
              <a class="tombol-merah" href="?page=keranjang_hapus&id=<?php echo $value['id']; ?>">hapus</a>
            </td>
        </tr>
    <?php
    $no++;
    $jumlah = $jumlah + $value['total'];
    endforeach;
     ?>
     <tr>
       <td colspan="7"><b>TOTAL PEMBAYARAN</b></td>
       <td colspan="2" align="center"><b><?php echo "Rp.".number_format($jumlah,0,",","."); ?></td></b>
     </tr>
    <?php if ($count > 0) { ?>
     <tr>
       <td colspan="8">Anda dapat <b>menghapus</b> barang dalam keranjang jika ada perubahan. jika tidak ada perubahan lagi,
       anda dapat melanjutkan <b>Pemesanan</b> dengan memilih tombol <b>Proses</b>.
       </td>

       <td><a class="tombol-biru" href="?page=pesanan&id=<?php echo $id ?>&jum=<?php echo $jumlah ?>">Proses</a></td>
     </tr>
   <?php } ?>
  </table>

</div>

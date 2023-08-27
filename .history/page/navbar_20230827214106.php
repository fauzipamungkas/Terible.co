<?php
session_start();
if (isset ($_SESSION['username'])){
  if ($_SESSION['status'] == 'user'){
    $user = $_SESSION['username'];

    $query = $conn->prepare("SELECT id,deskripsi,harga,ukuran,qty,kurir,total
                        FROM tbl_keranjang
                        JOIN tbl_barang ON tbl_keranjang.id_barang=tbl_barang.id_barang
                        WHERE tbl_keranjang.id_user=:id
                        GROUP BY tbl_keranjang.id");
$query->bindparam(':id', $id);
$query->execute();
$data = $query->fetchAll();
$count = $query->rowCount();

    echo "
          <a href='?page=profil'><b>Hey, </b>$user</a>
          <a href='?page=beranda'>Beranda</a>
          <a href='?page=belanja'>Pesanan</a>
          <a href='?page=tentang'>Tentang <p><?php echo $count; ?></p></a>
          <a href='page/logout.php' class='logout'>keluar</a>";

  } elseif ($_SESSION['status'] == 'admin') {
    $user = $_SESSION['username'];

    echo "
          <a href='?page=profilad'><b>Hey, </b>$user</a>
          <a href='?page=beranda'>Beranda</a>
          <a href='?page=barang'>Barang</a>
          <a href='?page=transaksi'>Transaksi</a>
          <a href='?page=user'>User</a>
          <a href='page/logout.php' class='logout'>keluar</a>";
  }
} else {
  echo "<a href='?page=beranda'>Beranda</a>
        <a href='?page=tentang'>Tentang</a>
        <a href='page/login.php'>Masuk</a>";
}
 ?>

<?php
session_start();
if (isset ($_SESSION['username'])){
  if ($_SESSION['status'] == 'user'){
    $user = $_SESSION['username'];

    echo "
          <a href='?page=profil'><b>Hey, </b>$user</a>
          <a href='?page=beranda'>Beranda</a>
          <a href='?page=belanja'>Pesanan</a>
          <a href='?page=tentang'>Tentang</a>
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

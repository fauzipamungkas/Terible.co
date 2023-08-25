<?php
session_start();
if (isset ($_SESSION['username'])){
  if ($_SESSION['status'] == 'user'){
    $user = $_SESSION['username'];
    // $title = $_SESSION['status'];

    echo "<a href='?page=beranda'>Beranda</a>
          <a href='?page=belanja'>Pesanan</a>
          <a href='?page=profil'>Profil</a>
          <a href='?page=tentang'>Tentang</a>
          <a href='page/logout.php' class='logout'>keluar</a>
          <a class='login'><b>Hey, </b>$user</a>";

  } elseif ($_SESSION['status'] == 'admin') {
    $user = $_SESSION['username'];
    // $title = $_SESSION['status'];

    echo "<a href='?page=beranda'>Beranda</a>
          <a href='?page=barang'>Barang</a>
          <a href='?page=transaksi'>Transaksi</a>
          <a href='?page=user'>User</a>
          <a href='?page=profilad'>Profil</a>
          <li class='logout'><a href='page/logout.php'>keluar</a></li>
          <li class='login'><a><b>Hey, </b>$user</a></li>";
  }
} else {
  echo "<a href='?page=beranda'>Beranda</a>
        <a href='?page=tentang'>Tentang</a>
        <a href='?page/login.php' class='login'>Masuk</a>";
}
 ?>

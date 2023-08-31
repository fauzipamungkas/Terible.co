<!-- code by muh iriansyah putra pratama -->
<div class="box-title">
    <p>Barang / <b>Manajemen Barang Jualan</b></p>
</div>
<div id="box">

<h1>Tambah Barang Jualan</h1>
<?php

	include 'lib/koneksi.php';

$nama = $_POST['nama_barang'];
$desk = $_POST['deskripsi'];
$harga = $_POST['harga'];
$stok = $_POST['stok'];
$berat = $_POST['berat'];

$name_image = $_FILES['gambar']['name'];
$loc_image = $_FILES['gambar']['tmp_name'];
$type_image = $_FILES['gambar']['type'];

$date = date('Ymd');

$cek         = array('png','jpg','jpeg','gif');
$x           = explode('.',$name_image);
$extension   = strtolower(end($x));
$size_image  = $_FILES['gambar']['size'];
// code by muh iriansyah putra pratama

if (in_array($extension, $cek) === TRUE){
  if ($size_image < 5044070){
// code by muh iriansyah putra pratama
    move_uploaded_file($loc_image,"img/jersey/$name_image");

    try {
			$conn ->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			$pdo = $conn->prepare('INSERT INTO tbl_barang (nama_barang,deskripsi, harga, stok, created, nama_image, type_image, size_image, berat)
									values (:nama_barang, :deskripsi, :harga, :stok, :created, :nama_image, :type_image, :size_image, :berat)');

			$insertdata = array(':nama_barang'=>$nama, ':deskripsi' => $desk, ':harga' => $harga, ':stok' => $stok, 'created' => $date,
						              ':nama_image' => $name_image, ':type_image' => $type_image, ':size_image' => $size_image, ':berat'=> $berat);
// code by muh iriansyah putra pratama
			$pdo->execute($insertdata);

			echo "<center><img src='img/icons/ceklist.png' width='60'></center>";
			echo "<center><b>barang berhasil ditambahkan</b></center>";
      echo "</br>";
			echo"<meta http-equiv='refresh' content='1;
			url=?page=barang'>";

		} catch (PDOexception $e) {
			print "tambah barang gagal: " . $e->getMessage() . "<br/>";
		   die();
		}

// code by muh iriansyah putra pratama

}else{
	echo "<center><img src='img/icons/cancel.png' width='60'></center>";
	echo "<center><b>ukuran file gambar terlalu besar</b></center>";
	echo "<center><a href='?page=tambah_barang'>back</a></center>";
  echo "</br>";
}
}else {
	echo "<center><img src='img/icons/cancel.png' width='60'></center>";
	echo"<center><b>ekstensi file tidak sesuai</b></center>";
	echo "<center><a href='?page=tambah_barang'>back</a></center>";
  echo "</br>";
}

 ?>
<!-- code by muh iriansyah putra pratama -->
</div>

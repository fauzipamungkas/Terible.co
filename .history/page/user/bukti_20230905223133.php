
<div id="box">

<h1>Bukti pembayaran</h1>
<?php

	include 'lib/koneksi.php';

$id = $_GET["id"]
$name_bukti = $_FILES['bukti']['name'];
$loc_bukti = $_FILES['bukti']['tmp_name'];
$type_bukti = $_FILES['bukti']['type'];


$cek         = array('png','jpg','jpeg','gif');
$x           = explode('.',$name_bukti);
$extension   = strtolower(end($x));
$size_bukti  = $_FILES['bukti']['size'];

if (in_array($extension, $cek) === TRUE){
  if ($size_bukti < 5044070){


    move_uploaded_file($loc_bukti,"img/bukti/$name_bukti");

    try {
			$conn ->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			$pdo = $conn->prepare('INSERT INTO tbl_ongkir (id_pesanan, nama_bukti, type_bukti, size_bukti)
			values (:id_pesanan, :nama_bukti, :type_bukti, :size_bukti)');

			$insertdata = array(':nama_bukti' => $name_bukti, ':type_bukti' => $type_bukti, ':size_bukti' => $size_bukti,':id_pesanan' => $id);

			$pdo->execute($insertdata);

			echo "<center><img src='img/icons/ceklist.png' width='60'></center>";
			echo "<center><b>Bukti pembayaran berhasil dikirim!</b></center>";
      echo "</br>";
			// echo"<meta http-equiv='refresh' content='1;
			// url=?page=belanja'>";

		} catch (PDOexception $e) {
			print "kirim bukti gagal!: " . $e->getMessage() . "<br/>";
		   die();
		}


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
</div>

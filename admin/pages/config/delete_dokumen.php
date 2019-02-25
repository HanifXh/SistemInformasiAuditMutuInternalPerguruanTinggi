<?php  

require '../../../koneksi/koneksi.php';
$id_dokumen = $_GET['id_dokumen'];

$hapus		= mysqli_query($connect, "SELECT * FROM dokumen WHERE id_dokumen = '$id_dokumen'");
$rows		= mysqli_fetch_array($hapus);
$a	= $rows['dokumen'];




unlink("../dokumen/".$a);
$delete = mysqli_query($connect, "DELETE FROM dokumen WHERE id_dokumen = '$id_dokumen'");

if ($delete) {
		echo "<script>alert('data berhasil di hapus')</script>";
	}	

// var_dump($hapus);

header('Location:../../index3.php?page=dokumen');

?>
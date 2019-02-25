<?php  

require '../../../koneksi/koneksi.php';
$id = $_GET['id'];

$hapus		= mysqli_query($connect, "SELECT * FROM staf WHERE id = '$id'");
$rows		= mysqli_fetch_array($hapus);
$foto	= $rows['foto'];

unlink("../foto/staf/".$foto);
$delete = mysqli_query($connect, "DELETE FROM staf WHERE id = '$id'");

if ($delete) {
		echo "<script>alert('data berhasil di hapus')</script>";
	}	

// var_dump($hapus);

header('Location:../../index2.php?page=staf');

?>
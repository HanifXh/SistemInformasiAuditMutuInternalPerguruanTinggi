<?php  

require '../../../koneksi/koneksi.php';
$id_auditor = $_GET['id_auditor'];

$hapus		= mysqli_query($connect, "SELECT * FROM auditor WHERE id_auditor = '$id_auditor'");
$rows		= mysqli_fetch_array($hapus);
$foto	= $rows['foto'];

unlink("../foto/auditor/".$foto);
$delete = mysqli_query($connect, "DELETE FROM auditor WHERE id_auditor = '$id_auditor'");

if ($delete) {
		echo "<script>alert('data berhasil di hapus')</script>";
	}	

// var_dump($hapus);

header('Location:../../index.php?page=data_auditor');

?>
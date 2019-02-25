<?php  

require '../../../koneksi/koneksi.php';
$id_wakil_ketua = $_GET['id_wakil_ketua'];

$hapus		= mysqli_query($connect, "SELECT * FROM wakil_ketua WHERE id_wakil_ketua = '$id_wakil_ketua'");
$rows		= mysqli_fetch_array($hapus);
$foto_wakil_ketua	= $rows['foto_wakil_ketua'];

unlink("../foto/wakil ketua/".$foto_wakil_ketua);
$delete = mysqli_query($connect, "DELETE FROM wakil_ketua WHERE id_wakil_ketua = '$id_wakil_ketua'");

if ($delete) {
		echo "<script>alert('data berhasil di hapus')</script>";
	}	

// var_dump($hapus);

header('Location:../../index.php?page=data_wakil_ketua');

?>
<?php  

require '../../../koneksi/koneksi.php';




	$id_jbt  = $_POST['id_jbt'];
	$nama_jbt = $_POST['nama_jbt'];
	

	$query = mysqli_query($connect, "UPDATE jabatan SET id_jbt='$id_jbt', nama_jbt='$nama_jbt' WHERE id_jbt='$id_jbt'");
	
// var_dump($query);
// print_r($query);

	header('Location:../../index2.php?page=jabatan');

?>
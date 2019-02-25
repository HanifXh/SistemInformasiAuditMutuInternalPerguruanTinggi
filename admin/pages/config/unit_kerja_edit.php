
<?php  
	require '../../../koneksi/koneksi.php';

	

		$kode_unit	= $_POST['kode_unit'];
		$nama_unit	= $_POST['nama_unit'];
		$id_jbt=$_POST['id_jbt'];
		$nik=$_POST['nik'];
		
		
		
		
		$query = mysqli_query($connect, "UPDATE unit_kerja SET kode_unit='$kode_unit', nama_unit='$nama_unit', id_jbt = '$id_jbt', nik = '$nik' WHERE kode_unit='$kode_unit'");
	
// var_dump($query);
// print_r($query);

	header('Location:../../index2.php?page=unit_kerja');




?>
<?php  

require '../../../koneksi/koneksi.php';




		$kode_sn	= $_POST['kode_sn'];
		$nama_sn	= $_POST['nama_sn'];
		$tanggal_sn	= $_POST['tanggal_sn'];

		
	

	$query = mysqli_query($connect, "UPDATE standar_nasional SET kode_sn='$kode_sn', nama_sn='$nama_sn', tanggal_sn='$tanggal_sn' WHERE kode_sn='$kode_sn'");
	
// var_dump($query);
// print_r($query);

	header('Location:../../index.php?page=standar_nasional');

?>
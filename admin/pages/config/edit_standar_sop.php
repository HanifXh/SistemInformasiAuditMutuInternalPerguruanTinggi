<?php  

require '../../../koneksi/koneksi.php';




		$kode_sn	= $_POST['kode_sn'];
		$kode_sop	= $_POST['kode_sop'];
		$nama_sop	= $_POST['nama_sop'];
		$tgl_sop	= $_POST['tgl_sop'];
		$kode_unit = $_POST['kode_unit'];
		$id_penanggung_jawab = $_POST['id_penanggung_jawab'];
		

		
	

	$query = mysqli_query($connect, "UPDATE standar_operasional SET kode_sn='$kode_sn',kode_sop='$kode_sop',nama_sop='$nama_sop',tgl_sop='$tgl_sop',kode_unit='$kode_unit',id_penanggung_jawab='$id_penanggung_jawab' WHERE kode_sop='$kode_sop'");
	
// var_dump($query);
// print_r($query);

	header('Location:../../index.php?page=standar_operasional');

?>
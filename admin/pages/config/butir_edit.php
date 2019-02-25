<?php  

require '../../../koneksi/koneksi.php';




		
		$kode_sop	= $_POST['kode_sop'];
		$kode_butir = $_POST['kode_butir'];
		$isi_butir	= $_POST['isi_butir'];
		$indikator = $_POST['indikator'];
		$tgl_butir = $_POST['tgl_butir'];
		
		

		
	

	$query = mysqli_query($connect, "UPDATE butir_sop SET kode_sop='$kode_sop',kode_butir='$kode_butir',isi_butir='$isi_butir',indikator='$indikator',tgl_butir='$tgl_butir'WHERE kode_butir='$kode_butir'");
	
// var_dump($query);
// print_r($query);

	header('Location:../../index3.php?page=butir_sop');

?>
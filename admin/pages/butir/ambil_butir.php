<?php  
	require '../../../koneksi/koneksi.php';

	$id_gedung = $_GET['id_gedung'];
	$kode_gedung = $_GET['kode_gedung'];

	$carikode = mysqli_query($connect, "SELECT * from lokasi where id_gedung = '$id_gedung'")or die(mysqli_error());
	$jumlah = mysqli_num_rows($carikode);
	$kode = $jumlah + 1;
	$kode_otomatis = $kode_gedung.str_pad($kode, 4, "0", STR_PAD_LEFT);

	echo $kode_otomatis;



	// 	$datakode = mysqli_fetch_array($carikode);
 //  		$jumlah_data = mysqli_num_rows($carikode);	
	// foreach($carikode as $item){
	// 	echo $item['id_kelas'];
	// }

	// echo 'Hallo';

	// echo json_encode($carikode);
?>
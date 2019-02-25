<?php  

require '../../../koneksi/koneksi.php';




		
		$id_evaluasi	= $_POST['id_evaluasi'];
		$kode_jadwal = $_POST['kode_jadwal'];
		$kode_sop	= $_POST['kode_sop'];
		$kode_butir = $_POST['kode_butir'];
		$kode_deskripsi = $_POST['kode_deskripsi'];
		$id_auditor = $_POST['id_auditor'];
		$kode_unit = $_POST['kode_unit'];
		$hasil = $_POST['hasil'];
		$persentase = $_POST['persentase'];
		$temuan = $_POST['temuan'];
		$kategori_temuan = $_POST['kategori_temuan'];

		
		

		
	

	$query = mysqli_query($connect, "UPDATE evaluasi SET id_evaluasi='$id_evaluasi',kode_jadwal='$kode_jadwal',kode_sop='$kode_sop',kode_butir='$kode_butir',kode_deskripsi='$kode_deskripsi',id_auditor='$id_auditor',kode_unit='$kode_unit',hasil='$hasil',persentase='$persentase',temuan='$temuan',kategori_temuan='$kategori_temuan' WHERE id_evaluasi='$id_evaluasi'");
	
// var_dump($query);
// print_r($query);

	header('Location:../../index4.php?page=data_audit');

?>
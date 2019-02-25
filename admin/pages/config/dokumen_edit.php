<?php  

require '../../../koneksi/koneksi.php';

	$id_dokumen		= $_POST['id_dokumen'];
	$kode_sop		= $_POST['kode_sop'];
	$nama_dokumen		= $_POST['nama_dokumen'];
	$lokasi_file	= $_FILES['fupload']['tmp_name'];
	$nama_file   	= $_FILES['fupload']['name'];

	if(empty($lokasi_file)){
		if($edit = mysqli_query($connect, "UPDATE dokumen SET id_dokumen='$id_dokumen',kode_sop='$kode_sop',nama_dokumen='$nama_dokumen'WHERE id_dokumen='$id_dokumen'")){
			header("Location:../../index3.php?page=dokumen");
			exit();
		}
		die("terdapat Kesalahan: ".mysqli_error($connect));
	}else{
		$hapus = mysqli_query($connect, "SELECT * FROM dokumen WHERE id_dokumen = '$id_dokumen'");
		$rows = mysqli_fetch_array($hapus);
		$d = '../dokumen/'.$rows['dokumen'];

		unlink("$d");
		move_uploaded_file($lokasi_file, "../dokumen/$nama_file");
		if($edit = mysqli_query($connect,"UPDATE dokumen SET id_dokumen='$id_dokumen',kode_sop='$kode_sop',nama_dokumen='$nama_dokumen', dokumen = '$nama_file' WHERE id_dokumen = '$id_dokumen'")){
			header("Location:../../index3.php?page=dokumen");
			exit();
		}
		die("Terdapat Kesalahan: ".mysqli_error($connect));
	}

	header('Location:../../index3.php?page=dokumen');

?>
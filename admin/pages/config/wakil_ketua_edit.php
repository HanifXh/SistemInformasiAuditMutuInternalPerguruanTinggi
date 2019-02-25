<?php  

require '../../../koneksi/koneksi.php';

	$id_wakil_ketua			= $_POST['id_wakil_ketua'];
	$nip_wakil_ketua		= $_POST['nip_wakil_ketua'];
	$nama_wakil_ketua		= $_POST['nama_wakil_ketua'];
	$email_wakil_ketua		= $_POST['email_wakil_ketua'];
	$no_telp_wakil_ketua	= $_POST['no_telp_wakil_ketua'];
	$jabatan_wakil_ketua   			= $_POST['jabatan_wakil_ketua'];
	$lokasi_file	= $_FILES['fupload']['tmp_name'];
	$nama_file   	= $_FILES['fupload']['name'];

	if(empty($lokasi_file)){
		if($edit = mysqli_query($connect, "UPDATE wakil_ketua SET id_wakil_ketua='$id_wakil_ketua',nip_wakil_ketua='$nip_wakil_ketua',nama_wakil_ketua='$nama_wakil_ketua',email_wakil_ketua='$email_wakil_ketua',no_telp_wakil_ketua='$no_telp_wakil_ketua',jabatan_wakil_ketua='$jabatan_wakil_ketua' WHERE id_wakil_ketua='$id_wakil_ketua'")){
			header("Location:../../index.php?page=data_wakil_ketua");
			exit();
		}
		die("terdapat Kesalahan: ".mysqli_error($connect));
	}else{
		$hapus = mysqli_query($connect, "SELECT * FROM wakil_ketua WHERE id_wakil_ketua = '$id_wakil_ketua'");
		$rows = mysqli_fetch_array($hapus);
		$d = '../foto/wakil ketua/'.$rows['foto_wakil_ketua'];

		unlink("$d");
		move_uploaded_file($lokasi_file, "../foto/wakil ketua/$nama_file");
		if($edit = mysqli_query($connect,"UPDATE wakil_ketua SET id_wakil_ketua='$id_wakil_ketua',nip_wakil_ketua='$nip_wakil_ketua',nama_wakil_ketua='$nama_wakil_ketua',email_wakil_ketua='$email_wakil_ketua',no_telp_wakil_ketua='$no_telp_wakil_ketua',jabatan_wakil_ketua='$jabatan_wakil_ketua', foto_wakil_ketua = '$nama_file' WHERE id_wakil_ketua = '$id_wakil_ketua'")){
			header("Location:../../index.php?page=data_wakil_ketua");
			exit();
		}
		die("Terdapat Kesalahan: ".mysqli_error($connect));
	}

	header('Location:../../index.php?page=data_wakil_ketua');

?>
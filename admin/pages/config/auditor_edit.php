<?php  

require '../../../koneksi/koneksi.php';

	$id_auditor			= $_POST['id_auditor'];
	$nama_auditor		= $_POST['nama_auditor'];
	$alamat_auditor		= $_POST['alamat_auditor'];
	$email_auditor		= $_POST['email_auditor'];
	$no_telp_auditor	= $_POST['no_telp_auditor'];
	$jabatan   			= $_POST['jabatan'];
	$lokasi_file	= $_FILES['fupload']['tmp_name'];
	$nama_file   	= $_FILES['fupload']['name'];

	if(empty($lokasi_file)){
		if($edit = mysqli_query($connect, "UPDATE auditor SET id_auditor='$id_auditor',nama_auditor='$nama_auditor',alamat_auditor='$alamat_auditor',email_auditor='$email_auditor',no_telp_auditor='$no_telp_auditor',jabatan='$jabatan' WHERE id_auditor='$id_auditor'")){
			header("Location:../../index.php?page=data_auditor");
			exit();
		}
		die("terdapat Kesalahan: ".mysqli_error($connect));
	}else{
		$hapus = mysqli_query($connect, "SELECT * FROM auditor WHERE id_auditor = '$id_auditor'");
		$rows = mysqli_fetch_array($hapus);
		$d = '../foto/auditor/'.$rows['foto'];

		unlink("$d");
		move_uploaded_file($lokasi_file, "../foto/auditor/$nama_file");
		if($edit = mysqli_query($connect,"UPDATE auditor SET id_auditor='$id_auditor',nama_auditor='$nama_auditor',alamat_auditor='$alamat_auditor',email_auditor='$email_auditor',no_telp_auditor='$no_telp_auditor',jabatan='$jabatan', foto = '$nama_file' WHERE id_auditor = '$id_auditor'")){
			header("Location:../../index.php?page=data_auditor");
			exit();
		}
		die("Terdapat Kesalahan: ".mysqli_error($connect));
	}

	header('Location:../../index.php?page=data_auditor');

?>
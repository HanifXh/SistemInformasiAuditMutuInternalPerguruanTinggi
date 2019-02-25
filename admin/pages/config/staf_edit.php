<?php  

require '../../../koneksi/koneksi.php';

	
	$nik_staf 			= $_POST['nik_staf'];
	$id_jbt 			= $_POST['id_jbt'];
	$nama_staf 			= $_POST['nama_staf'];
	$tgl_lahir_staf 	= $_POST['tgl_lahir_staf'];
	$email				= $_POST['email'];
	$no_hp 				= $_POST['no_hp'];
	$lokasi_file		= $_FILES['fupload']['tmp_name'];
	$nama_file   		= $_FILES['fupload']['name'];

	

if (empty($lokasi_file)) {
	$query = mysqli_query($connect, "UPDATE staf SET nik_staf='$nik_staf', id_jbt='$id_jbt', nama_staf='$nama_staf', tgl_lahir_staf='$tgl_lahir_staf', email='$email', no_hp='$no_hp' WHERE nik_staf='$nik_staf'");{

	header('Location:../../index2.php?page=staf');
		exit();
	}
	die ("Terdapat kesalahan : ". mysqli_error($connect));

}else {	
	$hapus=mysqli_query($connect, "SELECT * FROM staf WHERE nik_staf='$nik_staf'");
    $rows=mysqli_fetch_array($hapus);
	$d = '../foto/staf/'.$rows['foto'];
	unlink ("$d");
	move_uploaded_file($lokasi_file,"../foto/staf/$nama_file,");
	if ($query = mysqli_query($connect, "UPDATE staf SET nik_staf='$nik_staf', id_jbt='$id_jbt', nama_staf='$nama_staf', tgl_lahir_staf='$tgl_lahir_staf', email='$email', no_hp='$no_hp', foto='$nama_file' WHERE nik_staf='$nik_staf'"));{
// var_dump($query);
// print_r($query);

	header('Location:../../index2.php?page=staf');
			exit();
		}
	die ("Terdapat kesalahan : ". mysqli_error($connect));
}


// 	$query = mysqli_query($connect, "UPDATE gedung SET id_gedung='$id_gedung', nama_gedung='$nama_gedung', kondisi_gd='$kondisi_gd' WHERE id_gedung='$id_gedung'");
// // var_dump($query);
// // print_r($query);

// 	header('Location:../../index.php?page=gedung');

?>
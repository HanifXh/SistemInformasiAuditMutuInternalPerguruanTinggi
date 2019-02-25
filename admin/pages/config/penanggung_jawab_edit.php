<?php  

require '../../../koneksi/koneksi.php';

	
	$nik = $_POST['nik'];
	$id_jbt = $_POST['id_jbt'];
	$nama = $_POST['nama'];
	$email = $_POST['email'];
	$no_hp = $_POST['no_hp'];
	$lokasi_file	= $_FILES['fupload']['tmp_name'];
	$nama_file   	= $_FILES['fupload']['name'];

	

if (empty($lokasi_file)) {
	$query = mysqli_query($connect, "UPDATE penanggung_jawab SET nik='$nik', id_jbt='$id_jbt', nama='$nama', email='$email', no_hp='$no_hp' WHERE nik='$nik'");{

	header('Location:../../index2.php?page=penanggung_jawab');
		exit();
	}
	die ("Terdapat kesalahan : ". mysqli_error($connect));

}else {	
	$hapus=mysqli_query($connect, "SELECT * FROM penanggung_jawab WHERE nik='$nik'");
    $rows=mysqli_fetch_array($hapus);
	$d = '../foto/pnjwb/'.$rows['foto'];
	unlink ("$d");
	move_uploaded_file($lokasi_file,"../foto/pnjwb/$nama_file,");
	if ($query = mysqli_query($connect, "UPDATE penanggung_jawab SET nik='$nik',id_jbt='$id_jbt', nama='$nama', email='$email', no_hp='$no_hp', foto='$nama_file' WHERE nik ='$nik'"));{
// var_dump($query);
// print_r($query);

	header('Location:../../index2.php?page=penanggung_jawab');
			exit();
		}
	die ("Terdapat kesalahan : ". mysqli_error($connect));
}


// 	$query = mysqli_query($connect, "UPDATE gedung SET id_gedung='$id_gedung', nama_gedung='$nama_gedung', kondisi_gd='$kondisi_gd' WHERE id_gedung='$id_gedung'");
// // var_dump($query);
// // print_r($query);

// 	header('Location:../../index.php?page=gedung');

?>
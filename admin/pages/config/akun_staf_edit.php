<?php  

require '../../../koneksi/koneksi.php';




	$id_staf  = $_POST['id_staf'];
	$username = $_POST['username'];
	$password = $_POST['password'];
	

	$query = mysqli_query($connect, "UPDATE login_staf SET id_staf='$id_staf', username='$username' ,password='$password' WHERE id_staf='$id_staf'");
	
// var_dump($query);
// print_r($query);

	header('Location:../../index2.php?page=olah_akun_staf');

?>
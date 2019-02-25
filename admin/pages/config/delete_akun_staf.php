<?php  

require '../../../koneksi/koneksi.php';



$id_staf = $_GET['id_staf'];

$query = mysqli_query($connect, "DELETE FROM login_staf WHERE id_staf='$id_staf'");

// var_dump($query);

header('Location:../../index2.php?page=olah_akun_staf');

?>
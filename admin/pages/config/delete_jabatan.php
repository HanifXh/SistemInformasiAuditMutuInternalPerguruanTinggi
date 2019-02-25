<?php  

require '../../../koneksi/koneksi.php';



$id_jbt = $_GET['id_jbt'];

$query = mysqli_query($connect, "DELETE FROM jabatan WHERE id_jbt='$id_jbt'");

// var_dump($query);

header('Location:../../index2.php?page=jabatan');

?>
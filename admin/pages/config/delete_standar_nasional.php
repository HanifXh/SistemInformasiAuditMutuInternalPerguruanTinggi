<?php  

require '../../../koneksi/koneksi.php';



$kode_sn = $_GET['kode_sn'];

$query = mysqli_query($connect, "DELETE FROM standar_nasional WHERE kode_sn='$kode_sn'");

// var_dump($query);

header('Location:../../index.php?page=standar_nasional');

?>
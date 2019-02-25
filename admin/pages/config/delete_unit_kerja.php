<?php  

require '../../../koneksi/koneksi.php';



$kode_unit = $_GET['kode_unit'];

$query = mysqli_query($connect, "DELETE FROM unit_kerja WHERE kode_unit='$kode_unit'");

// var_dump($query);

header('Location:../../index2.php?page=unit_kerja');

?>
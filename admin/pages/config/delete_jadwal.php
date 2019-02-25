<?php  

require '../../../koneksi/koneksi.php';



$kode_jadwal = $_GET['kode_jadwal'];

$query = mysqli_query($connect, "DELETE FROM jadwal WHERE kode_jadwal='$kode_jadwal'");
$query = mysqli_query($connect, "DELETE FROM evaluasi WHERE kode_jadwal='$kode_jadwal'");


// var_dump($query);

header('Location:../../index.php?page=jadwal');

?>
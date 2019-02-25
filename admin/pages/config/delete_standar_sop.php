<?php  

require '../../../koneksi/koneksi.php';



$kode_sop = $_GET['kode_sop'];

$query = mysqli_query($connect, "DELETE FROM standar_operasional WHERE kode_sop='$kode_sop'");
$query = mysqli_query($connect, "DELETE FROM butir_sop WHERE kode_sop='$kode_sop'");
$query = mysqli_query($connect, "DELETE FROM deskriptor WHERE kode_sop='$kode_sop'");
$query = mysqli_query($connect, "DELETE FROM dokumen WHERE kode_sop='$kode_sop'");
$query = mysqli_query($connect, "DELETE FROM jadwal WHERE kode_sop='$kode_sop'");
$query = mysqli_query($connect, "DELETE FROM evaluasi WHERE kode_sop='$kode_sop'");

// var_dump($query);

header('Location:../../index.php?page=standar_operasional');

?>
<?php  

require '../../../koneksi/koneksi.php';



$kode_butir = $_GET['kode_butir'];

$query = mysqli_query($connect, "DELETE FROM butir_sop WHERE kode_butir='$kode_butir'");

// var_dump($query);

header('Location:../../index3.php?page=butir_sop');

?>
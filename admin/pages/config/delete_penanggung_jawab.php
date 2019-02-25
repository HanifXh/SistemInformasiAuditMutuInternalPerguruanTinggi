<?php  

require '../../../koneksi/koneksi.php';

			




$id_penanggung_jawab = $_GET['id_penanggung_jawab'];

$query = mysqli_query($connect, "DELETE FROM penanggung_jawab WHERE id_penanggung_jawab = '$id_penanggung_jawab'");

// var_dump($query);

header('Location:../../index2.php?page=penanggung_jawab');

?>
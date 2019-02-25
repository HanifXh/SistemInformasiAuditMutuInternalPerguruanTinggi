<?php  

require '../../../koneksi/koneksi.php';



$id_evaluasi = $_GET['id_evaluasi'];

$query = mysqli_query($connect, "DELETE FROM evaluasi WHERE id_evaluasi='$id_evaluasi'");

// var_dump($query);

header('Location:../../index4.php?page=data_audit');

?>
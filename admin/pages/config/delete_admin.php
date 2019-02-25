<?php  

require '../../../koneksi/koneksi.php';
$id = $_GET['id'];

$query = mysqli_query($connect, "DELETE FROM admin WHERE id = '$id'");


// var_dump($query);

header('Location:../../index.php?page=admin');

?>
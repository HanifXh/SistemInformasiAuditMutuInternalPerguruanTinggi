<?php  

require '../../../koneksi/koneksi.php';

			




$kode_jobdesk = $_GET['kode_jobdesk'];

$query = mysqli_query($connect, "DELETE FROM job_desk WHERE kode_jobdesk = '$kode_jobdesk'");

// var_dump($query);

header('Location:../../index2.php?page=job_desk');

?>
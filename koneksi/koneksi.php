<?php

$server = "localhost";
$user = "root";
$pass = "";
$database = "audit";

$connect = mysqli_connect($server, $user, $pass, $database);
	
	if (!$connect) {
		die("Gagal: " .mysqli_connect_error());
	}

			
?>
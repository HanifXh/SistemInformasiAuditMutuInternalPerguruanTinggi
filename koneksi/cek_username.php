<?php
	require 'koneksi/koneksi.php';
		$username = $_POST['username'];
		$sql = "select * from admin where username='$username'";
		$hasil = mysqli_query($conn, $sql);
		$num = mysqli_num_rows($hasil);
			if ($num>0){
				echo 0;
		} else {
				echo 1;
}		
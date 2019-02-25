<?php
	require 'koneksi.php';
		$nama = $_POST['nama'];
		$username = $_POST['username'];
		$password = md5($_POST['password']);
		$email = $_POST['email'];
		$foto = $_FILES['foto']['tmp_name'];
		$nama_foto = $_FILES['foto']['name'];

		$move = move_uploaded_file($foto, "../images/".$nama_foto);

	
	
		$tgldaftar = date('Y-m-d H:i:s');


		$sql_check = "SELECT * FROM admin WHERE email='$email'";
		$hasil = mysqli_query($connect, $sql_check);
		$num = mysqli_num_rows($hasil);
		if ($num>0){
			// header("Location: ../admin/register.php");
		}else{
			$sql = "INSERT into admin values('','$nama','$username','$password','$email', '$nama_foto','$tgldaftar')";
			echo "<script>alert('Terima kasih, Anda Berhasil Registrasi')</script>";
			echo "<meta http-equiv='refresh' content='1 url=../admin/login.php'>";

mysqli_query($connect, $sql);
		}
?>
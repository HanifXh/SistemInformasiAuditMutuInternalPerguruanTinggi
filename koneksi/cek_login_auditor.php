<?php 
include 'koneksi.php';
 
$username = $_POST['username'];
$password = $_POST['password'];
 
	$login = mysqli_query($connect, "SELECT * from login_auditor where username='$username' and password='$password'");
	$cek = mysqli_num_rows($login);
 
		if($cek > 0){

			session_start();
			$row_akun = mysqli_fetch_array($login);
			$_SESSION['username'] = $username;
			$_SESSION['id_auditor'] = $row_akun['id_auditor'];
			$_SESSION['status'] = "login";
			header("location:../admin/index4.php");
		}else{

			echo "<script>alert('Maaf Username atau Password salah')</script>";
			echo "<meta http-equiv='refresh' content='1 url=../admin/login_auditor.php'>";

}
 
?>
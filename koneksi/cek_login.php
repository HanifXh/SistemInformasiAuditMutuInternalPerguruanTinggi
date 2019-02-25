<?php 
include 'koneksi.php';
 
$username = $_POST['username'];
$password = md5($_POST['password']);
 
	$login = mysqli_query($connect, "SELECT * from admin where username='$username' and password='$password'");
	$cek = mysqli_num_rows($login);
 
		if($cek > 0){
			session_start();
			$_SESSION['username'] = $username;
			$_SESSION['status'] = "login";
			header("location:../admin/index.php");
		}else{

			echo "<script>alert('Maaf Username atau Password salah')</script>";
			echo "<meta http-equiv='refresh' content='1 url=../admin/login.php'>";

}
 
?>
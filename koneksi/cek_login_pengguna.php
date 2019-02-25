<?php
include 'koneksi.php';
$username = $_POST['username'];
$password = $_POST['password'];
$cek      = mysqli_query($connect, "select * from login_pengguna where username='$username' and password='$password'");
$result   = mysqli_num_rows($cek);
$data = mysqli_fetch_array($cek);

if($result>0){
	if ($data['level'] == 'wakil') {
	    session_start();
	    $_SESSION['username'] = $data['username'];
	    // $data['level'] level digunaan untu memanggil value level dari username yang telah login dan disimpan dalam $_SESSION['level']
	    $_SESSION['level'] 	  = $data['level'];
	    echo "<script>alert('Selamat Datang, Wakil Ketua.');document.location.href='../admin/index2.php'</script>";

	}elseif($data['level'] == 'staf'){
	    session_start();
	    $_SESSION['username'] = $data['username'];
	    // $data['level'] level digunaan untu memanggil value level dari username yang telah login dan disimpan dalam $_SESSION['level']
	    $_SESSION['level'] 	  = $data['level'];
	    echo "<script>alert('Selamat Datang, Staf.');document.location.href='../admin/index3.php'</script>";
	}elseif($data['level'] == 'auditor'){
	    session_start();
	    $row_akun = mysqli_fetch_array($login);
	    $_SESSION['username'] = $data['username'];
	    $_SESSION['id_auditor'] = $row_akun['id_auditor'];
	    // $data['level'] level digunaan untu memanggil value level dari username yang telah login dan disimpan dalam $_SESSION['level']
	    $_SESSION['level'] 	  = $data['level'];
	    echo "<script>alert('Selamat Datang, Auditor.');document.location.href='../admin/index4.php'</script>";
	}
}else{
    header("location:../admin/login_pengguna.php");
}
?>








<!-- <?php 
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
 
?> -->
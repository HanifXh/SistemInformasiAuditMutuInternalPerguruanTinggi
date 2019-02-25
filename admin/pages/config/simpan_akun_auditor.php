
<?php  
	require '../../../koneksi/koneksi.php';

	

		$id_auditor = $_POST['id_auditor'];
		$username	= $_POST['username'];
		$password	= $_POST['password'];
		
		
		
		
		$cek = mysqli_query($connect, "SELECT * FROM login_auditor WHERE id_auditor ='$id_auditor'");
				if(mysqli_num_rows($cek) == 0){

		$query = mysqli_query($connect, "INSERT INTO login_auditor VALUES ('$id_auditor','$username','$password')");
		

		echo "<script>alert('Data Akun Auditor Berhasil Ditambah')</script>";
		echo "<meta http-equiv='refresh' content='1 url=../../index.php?page=akun_auditor'>";

		// var_dump($query);
		}else{

					echo "<script>alert('Username Sudah Ada')</script>";
					echo "<meta http-equiv='refresh' content='1 url=../../index.php?page=akun_auditor'>";

				}



?>
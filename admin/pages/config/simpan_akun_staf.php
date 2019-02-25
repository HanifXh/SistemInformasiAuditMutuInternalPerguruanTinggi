
<?php  
	require '../../../koneksi/koneksi.php';

	

		$id = $_POST['id'];
		$username	= $_POST['username'];
		$password	= $_POST['password'];

		
		
		
		
		$cek = mysqli_query($connect, "SELECT * FROM login_staf WHERE id_staf ='$id'");
				if(mysqli_num_rows($cek) == 0){

		$query = mysqli_query($connect, "INSERT INTO login_staf VALUES ('$id','$username','$password')");
		

		echo "<script>alert('Data Akun Staf Berhasil Ditambah')</script>";
		echo "<meta http-equiv='refresh' content='1 url=../../index2.php?page=olah_akun_staf'>";

		// var_dump($query);
		}else{

					echo "<script>alert('Id Sudah Ada')</script>";
					echo "<meta http-equiv='refresh' content='1 url=../../index2.php?page=olah_akun_staf'>";

				}



?>
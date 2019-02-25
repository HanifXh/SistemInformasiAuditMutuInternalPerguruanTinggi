
<?php  
	require '../../../koneksi/koneksi.php';

	

		$id_wakil_ketua = $_POST['id_wakil_ketua'];
		$username	= $_POST['username'];
		$password	= $_POST['password'];
	
		
		
		
		$cek = mysqli_query($connect, "SELECT * FROM login_wakil_ketua WHERE id_wakil_ketua ='$id_wakil_ketua'");
				if(mysqli_num_rows($cek) == 0){

		$query = mysqli_query($connect, "INSERT INTO login_wakil_ketua VALUES ('$id_wakil_ketua','$username','$password')");
		

		echo "<script>alert('Data Akun Berhasil Ditambah')</script>";
		echo "<meta http-equiv='refresh' content='1 url=../../index.php?page=akun_wakilketua'>";

		// var_dump($query);
		}else{

					echo "<script>alert('Username Sudah Ada')</script>";
					echo "<meta http-equiv='refresh' content='1 url=../../index.php?page=akun_wakilketua'>";

				}



?>
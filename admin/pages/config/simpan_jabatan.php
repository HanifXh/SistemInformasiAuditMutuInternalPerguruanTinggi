
<?php  
	require '../../../koneksi/koneksi.php';

	$username_session = $_POST['username_session'];


		$id_jbt	= $_POST['id_jbt'];
		$nama_jbt	= $_POST['nama_jbt'];
		
		
		
		$cek = mysqli_query($connect, "SELECT * FROM jabatan WHERE nama_jbt='$nama_jbt'");
				if(mysqli_num_rows($cek) == 0){

		$query = mysqli_query($connect, "INSERT INTO jabatan VALUES ('$id_jbt','$nama_jbt')");
		

		echo "<script>alert('Data jabatan Berhasil Disimpan')</script>";
		echo "<meta http-equiv='refresh' content='1 url=../../index2.php?page=jabatan'>";

		// header('Location:../../index.php?page=kamera');
		// var_dump($query);
		}else{

					echo "<script>alert('Nama Jabatan Sudah Ada')</script>";
					echo "<meta http-equiv='refresh' content='1 url=../../index2.php?page=jabatan'>";




					// echo '<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>nama kamera sudah ada..!</div>';
				}



?>

<?php  
	require '../../../koneksi/koneksi.php';

	

		$kode_unit	= $_POST['kode_unit'];
		$nama_unit	= $_POST['nama_unit'];
		$id_jbt=$_POST['id_jbt'];
		$nik=$_POST['nik'];
		
		
		
		
		$cek = mysqli_query($connect, "SELECT * FROM unit_kerja WHERE nama_unit ='$nama_unit'");
				if(mysqli_num_rows($cek) == 0){

		$query = mysqli_query($connect, "INSERT INTO unit_kerja VALUES ('$kode_unit','$nama_unit','$id_jbt','$nik')");
		

		echo "<script>alert('Data Unit Kerja Disimpan')</script>";
		echo "<meta http-equiv='refresh' content='1 url=../../index2.php?page=unit_kerja'>";

		// header('Location:../../index.php?page=kamera');
		// var_dump($query);
		}else{

					echo "<script>alert('Nama Unit Kerja Sudah Ada')</script>";
					echo "<meta http-equiv='refresh' content='1 url=../../index2.php?page=unit_kerja'>";




					// echo '<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>nama kamera sudah ada..!</div>';
				}



?>
<?php  
	require '../../../koneksi/koneksi.php';

		
		$nik		= $_POST['nik'];
		$id_jbt	    = $_POST['id_jbt'];
		$nama		= $_POST['nama'];
		$email		= $_POST['email'];
		$no_hp 		= $_POST['no_hp'];
		
		$lokasi_foto = $_FILES['foto']['tmp_name'];
		$nama_foto = $_FILES['foto']['name'];

		$move = move_uploaded_file($lokasi_foto,"../foto/pnjwb/".$nama_foto);

		$cek = mysqli_query($connect, "SELECT * FROM penanggung_jawab WHERE nama='$nama'");
				if(mysqli_num_rows($cek) == 0){

		$query = mysqli_query($connect, "INSERT INTO penanggung_jawab values('','$nik','$id_jbt','$nama','$email','$no_hp','$nama_foto')");

		
		echo "<script>alert('Data Penanggung Jawab Berhasil Disimpan')</script>";
		echo "<meta http-equiv='refresh' content='1 url=../../index2.php?page=penanggung_jawab'>";
	// var_dump($query);
	// var_dump($query2);

		// header('Location:../../index.php?page=gedung');
		}else{
					echo "<script>alert('Nama Penanggung Jawab Sudah Ada')</script>";
					echo "<meta http-equiv='refresh' content='1 url=../../index2.php?page=penanggung_jawab'>";
				}



?>
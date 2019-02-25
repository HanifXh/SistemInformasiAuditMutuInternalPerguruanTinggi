<?php
	require '../../../koneksi/koneksi.php';
		
		$nama_auditor 	 	 = $_POST['nama_auditor'];
		$alamat_auditor 	 = $_POST['alamat_auditor'];
		$email_auditor 		 = $_POST['email_auditor'];
		$no_telp_auditor 	 = $_POST['no_telp_auditor'];
		$jabatan    	 	 = $_POST['jabatan'];
		$foto 				 = $_FILES['foto']['tmp_name'];
		$nama_foto 			 = $_FILES['foto']['name'];

		$move = move_uploaded_file($foto, "../foto/auditor/".$nama_foto);

		

			$query = "INSERT into auditor values('','$nama_auditor','$alamat_auditor','$email_auditor','$no_telp_auditor','$jabatan','$nama_foto')";

			var_dump($query);
			// echo "<script>alert('Terima kasih, Anda Berhasil Registrasi')</script>";
			// echo "<meta http-equiv='refresh' content='1 url=../register.php'>";
mysqli_query($connect, $query);
header('location:../../index.php?page=data_auditor')

?>
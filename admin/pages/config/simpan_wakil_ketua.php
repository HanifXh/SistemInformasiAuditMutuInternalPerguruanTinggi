<?php
	require '../../../koneksi/koneksi.php';
		
		$nip_wakil_ketua 	 	 = $_POST['nip_wakil_ketua'];
		$nama_wakil_ketua 	 	 = $_POST['nama_wakil_ketua'];
		$email_wakil_ketua 		 = $_POST['email_wakil_ketua'];
		$no_telp_wakil_ketua 	 = $_POST['no_telp_wakil_ketua'];
		$jabatan_wakil_ketua     = $_POST['jabatan_wakil_ketua'];
		$foto_wakil_ketua 	     = $_FILES['foto_wakil_ketua']['tmp_name'];
		$nama_foto 			     = $_FILES['foto_wakil_ketua']['name'];

		$move = move_uploaded_file($foto_wakil_ketua, "../foto/wakil ketua/".$nama_foto);

		

			$query = "INSERT into wakil_ketua values('','$nip_wakil_ketua','$nama_wakil_ketua','$email_wakil_ketua','$no_telp_wakil_ketua','$jabatan_wakil_ketua','$nama_foto')";

			var_dump($query);
			// echo "<script>alert('Terima kasih, Anda Berhasil Registrasi')</script>";
			// echo "<meta http-equiv='refresh' content='1 url=../register.php'>";
mysqli_query($connect, $query);
header('location:../../index.php?page=data_wakil_ketua')

?>
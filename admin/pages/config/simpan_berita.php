<?php
	require '../../../koneksi/koneksi.php';
		$isi_berita = $_POST['isi_berita'];
		$tanggal_berita = $_POST['tanggal_berita'];

		function ubahTanggal($tgl_berita){
 			$pisah = explode('/',$tgl_berita);
 			$array = array($pisah[2],$pisah[0],$pisah[1]);
 			$satukan = implode('-',$array);
 			return $satukan;
	}
		$tgl_berita = ubahTanggal($tanggal_berita);

			$sql = "INSERT into berita values('','$isi_berita','$tgl_berita')";
			// echo "<script>alert('Terima kasih, Anda Berhasil Registrasi')</script>";
			// echo "<meta http-equiv='refresh' content='1 url=../register.php'>";

mysqli_query($connect, $sql);
?>
<?php
	require '../../../koneksi/koneksi.php';
		$kode_sop 	 = $_POST['kode_sop'];
		$nama_dokumen 	 = $_POST['nama_dokumen'];
		$tgl_dokumen= $_POST['tgl_dokumen'];
		$dokumen = $_FILES['dokumen']['tmp_name'];
		$n_dokumen = $_FILES['dokumen']['name'];

		$move = move_uploaded_file($dokumen, "../dokumen/".$n_dokumen);
	
		function ubahTanggal($tgl_dokumen){
 		$pisah = explode('/',$tgl_dokumen);
 		$array = array($pisah[2],$pisah[0],$pisah[1]);
 		$satukan = implode('-',$array);
 		return $satukan;
}
		$tgl_dkmn = ubahTanggal($tgl_dokumen);
		

			$query = "INSERT into dokumen values('','$kode_sop','$nama_dokumen','$n_dokumen', '$tgl_dkmn')";

			var_dump($query);
			// echo "<script>alert('Terima kasih, Anda Berhasil Registrasi')</script>";
			// echo "<meta http-equiv='refresh' content='1 url=../register.php'>";
mysqli_query($connect, $query);
header('location:../../index3.php?page=dokumen')

?>
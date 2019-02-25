<?php  
	require '../../../koneksi/koneksi.php';

		
		$nik_staf			= $_POST['nik_staf'];
		$id_jbt				= $_POST['id_jbt'];
		$nama_staf			= $_POST['nama_staf'];
		$tgl_lahir_staf		= $_POST['tgl_lahir_staf'];
		$email				= $_POST['email'];
		$no_hp 				= $_POST['no_hp'];
		
		function ubahTanggal($tgl_lahir_staf){
 		$pisah = explode('/',$tgl_lahir_staf);
 		$array = array($pisah[2],$pisah[0],$pisah[1]);
 		$satukan = implode('-',$array);
 		return $satukan;
}
		$tgl_lhrs = ubahTanggal($tgl_lahir_staf);
		


		
		$lokasi_foto = $_FILES['foto']['tmp_name'];
		$nama_foto = $_FILES['foto']['name'];

		$move = move_uploaded_file($lokasi_foto,"../foto/staf/".$nama_foto);

		

		$cek = mysqli_query($connect, "SELECT * FROM staf WHERE nama_staf='$nama_staf'");
				if(mysqli_num_rows($cek) == 0){

		$query = mysqli_query($connect, "INSERT INTO staf values('','$nik_staf','$id_jbt','$nama_staf','$tgl_lhrs','$email','$no_hp','$nama_foto')");

		
		echo "<script>alert('Data Staf Berhasil Disimpan')</script>";
		echo "<meta http-equiv='refresh' content='1 url=../../index2.php?page=staf'>";
	// var_dump($query);
	// var_dump($query2);

		// header('Location:../../index.php?page=gedung');
		}else{
					echo "<script>alert('Nama Staf Sudah Ada')</script>";
					echo "<meta http-equiv='refresh' content='1 url=../../index2.php?page=staf'>";
				}



?>

<?php  
	require '../../../koneksi/koneksi.php';

	

		$kode_sn	= $_POST['kode_sn'];
		$nama_sn	= $_POST['nama_sn'];
		$tanggal_sn	= $_POST['tanggal_sn'];

		function ubahTanggal($tanggal_sn){
 		$pisah = explode('/',$tanggal_sn);
 		$array = array($pisah[2],$pisah[0],$pisah[1]);
 		$satukan = implode('-',$array);
 		return $satukan;
}
		$tgl_standar_nasional = ubahTanggal($tanggal_sn);

		
		
		
		$cek = mysqli_query($connect, "SELECT * FROM standar_nasional WHERE nama_sn ='$nama_sn'");
				if(mysqli_num_rows($cek) == 0){

		$query = mysqli_query($connect, "INSERT INTO standar_nasional VALUES ('$kode_sn','$nama_sn','$tgl_standar_nasional')");
		

		echo "<script>alert('Data Standar Nasional Berhasil Disimpan')</script>";
		echo "<meta http-equiv='refresh' content='1 url=../../index.php?page=standar_nasional'>";

		// header('Location:../../index.php?page=kamera');
		// var_dump($query);
		}else{

					echo "<script>alert('Nama Standar Nasional Sudah Ada')</script>";
					echo "<meta http-equiv='refresh' content='1 url=../../index.php?page=standar_nasional'>";




					// echo '<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>nama kamera sudah ada..!</div>';
				}



?>
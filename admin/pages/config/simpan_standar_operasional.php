
<?php  
	require '../../../koneksi/koneksi.php';

	

		$kode_unit	= $_POST['kode_unit'];
		$kode_sn	= $_POST['kode_sn'];
		$kode_sop	= $_POST['kode_sop'];
		$nama_sop	= $_POST['nama_sop'];
		$id_penanggung_jawab	= $_POST['id_penanggung_jawab'];
		$tgl_sop	= $_POST['tgl_sop'];

		function ubahTanggal($tgl_sop){
 		$pisah = explode('/',$tgl_sop);
 		$array = array($pisah[2],$pisah[0],$pisah[1]);
 		$satukan = implode('-',$array);
 		return $satukan;
}
		$tgl_standar_operasional = ubahTanggal($tgl_sop);

		
		
		
		$cek = mysqli_query($connect, "SELECT * FROM standar_operasional WHERE kode_sop ='$kode_sop'");
				if(mysqli_num_rows($cek) == 0){

		$query = mysqli_query($connect, "INSERT INTO standar_operasional VALUES ('$kode_unit','$kode_sn','$kode_sop','$nama_sop','$id_penanggung_jawab','$tgl_standar_operasional')");
		

		echo "<script>alert('Data Sub Standar Berhasil Disimpan')</script>";
		echo "<meta http-equiv='refresh' content='1 url=../../index.php?page=standar_operasional'>";

		// var_dump($query);
		}else{

					echo "<script>alert('Kode Sub Standar Sudah Ada')</script>";
					echo "<meta http-equiv='refresh' content='1 url=../../index.php?page=standar_operasional'>";

				}



?>
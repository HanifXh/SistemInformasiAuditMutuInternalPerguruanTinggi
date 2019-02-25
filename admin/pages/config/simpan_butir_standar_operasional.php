
<?php  
	require '../../../koneksi/koneksi.php';

	

		$kode_sop	= $_POST['kode_sop'];
		$kode_butir	= $_POST['kode_butir'];
		$isi_butir	= $_POST['isi_butir'];
		$indikator	= $_POST['indikator'];
		$tgl_butir	= $_POST['tgl_butir'];

		function ubahTanggal($tgl_butir){
 		$pisah = explode('/',$tgl_butir);
 		$array = array($pisah[2],$pisah[0],$pisah[1]);
 		$satukan = implode('-',$array);
 		return $satukan;
}
		$tgl_btr = ubahTanggal($tgl_butir);

		
		
		
		$cek = mysqli_query($connect, "SELECT * FROM butir_sop WHERE isi_butir ='$isi_butir'");
				if(mysqli_num_rows($cek) == 0){

		$query = mysqli_query($connect, "INSERT INTO butir_sop VALUES ('$kode_sop','$kode_butir','$isi_butir','$indikator','$tgl_btr')");
		

		echo "<script>alert('Data Butir Standar Operasional Berhasil Disimpan')</script>";
		echo "<meta http-equiv='refresh' content='1 url=../../index3.php?page=butir_sop'>";

		// var_dump($query);
		}else{

					echo "<script>alert('Isi Butir Standar Operasional Sudah Ada')</script>";
					echo "<meta http-equiv='refresh' content='1 url=../../index3.php?page=butir_sop'>";

				}



?>
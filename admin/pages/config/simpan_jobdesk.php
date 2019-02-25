<?php  
	require '../../../koneksi/koneksi.php';

	

		$kode_jobdesk	= $_POST['kode_jobdesk'];
		$id_jbt			= $_POST['id_jbt'];
		$nik			= $_POST['nik'];
		$fungsi			= $_POST['fungsi'];
		$tgl_penetapan	= $_POST['tgl_penetapan'];

		
		
		function ubahTanggal($tgl_penetapan){
 		$pisah = explode('/',$tgl_penetapan);
 		$array = array($pisah[2],$pisah[0],$pisah[1]);
 		$satukan = implode('-',$array);
 		return $satukan;
}
		$tgl_pntp = ubahTanggal($tgl_penetapan);

		$cek = mysqli_query($connect, "SELECT * FROM job_desk WHERE id_jbt ='$id_jbt'");
				if(mysqli_num_rows($cek) == 0){


		$query = mysqli_query($connect, "INSERT INTO job_desk VALUES ('$kode_jobdesk','$id_jbt','$nik','$fungsi','$tgl_pntp')");
		

		echo "<script>alert('Data Job Desk Berhasil Disimpan')</script>";
		echo "<meta http-equiv='refresh' content='1 url=../../index2.php?page=job_desk'>";

		
		//var_dump($query);
		}else{

					echo "<script>alert('Jabatan Sudah Ada')</script>";
					echo "<meta http-equiv='refresh' content='1 url=../../index2.php?page=job_desk'>";




					// echo '<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>nama kamera sudah ada..!</div>';
				}



?>
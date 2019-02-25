<?php  
	require '../../../koneksi/koneksi.php';

		$kode_jadwal			= $_POST['kode_jadwal'];
		$kode_sop			= $_POST['kode_sop'];
		$id_auditor			= $_POST['id_auditor'];
		$program_studi		= $_POST['program_studi'];
		$tahun_pengukuran	= $_POST['tahun_pengukuran'];
		$tanggal_mulai		= $_POST['tanggal_mulai'];
		$tanggal_selesai		= $_POST['tanggal_selesai'];
	
		
		function ubahTanggal($tanggal_mulai){
 		$pisah = explode('/',$tanggal_mulai);
 		$array = array($pisah[2],$pisah[0],$pisah[1]);
 		$satukan = implode('-',$array);
 		return $satukan;
}
		
function ubahTanggalselesai($tanggal_selesai){
 		$pisah = explode('/',$tanggal_selesai);
 		$array = array($pisah[2],$pisah[0],$pisah[1]);
 		$satukan = implode('-',$array);
 		return $satukan;
}
		$tgl_adt = ubahTanggal($tanggal_mulai);
		$tgl_sls = ubahTanggalselesai($tanggal_selesai);
		
		

		$cek = mysqli_query($connect, "SELECT * FROM jadwal WHERE kode_sop='$kode_sop'");
				if(mysqli_num_rows($cek) == 0){

		$query = mysqli_query($connect, "INSERT INTO jadwal values('$kode_jadwal','$kode_sop','$id_auditor','$program_studi','$tahun_pengukuran','$tgl_adt','$tgl_sls')");

		
		echo "<script>alert('Data Jadwal Audit Berhasil Disimpan')</script>";
		echo "<meta http-equiv='refresh' content='1 url=../../index.php?page=jadwal'>";
	// var_dump($query);
	// var_dump($query2);

		// header('Location:../../index.php?page=gedung');
		}else{
					echo "<script>alert('Standar Mutu  Sudah Ada')</script>";
					echo "<meta http-equiv='refresh' content='1 url=../../index.php?page=jadwal'>";
				}



?>
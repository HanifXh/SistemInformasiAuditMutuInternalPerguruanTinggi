
<?php  
	require '../../../koneksi/koneksi.php';

		$kode_jadwal	= $_POST['kode_jadwal'];
		$kode_sop	= $_POST['kode_sop'];
		$kode_butir	= $_POST['kode_butir'];
		$kode_deskripsi	= $_POST['kode_deskripsi'];
		$id_auditor	= $_POST['id_auditor'];
		$kode_unit	= $_POST['kode_unit'];
		$hasil	= $_POST['hasil'];
		$persentase	= $_POST['persentase'];
		$temuan	= $_POST['temuan'];
		$kategori_temuan	= $_POST['kategori_temuan'];
		
		
	

		
		
		
		
		$cek = mysqli_query($connect, "SELECT * FROM evaluasi WHERE kode_butir='$kode_butir'");
				if(mysqli_num_rows($cek) == 0){

		$query = mysqli_query($connect, "INSERT INTO evaluasi VALUES ('','$kode_jadwal','$kode_sop','$kode_butir','$kode_deskripsi','$id_auditor','$kode_unit','$hasil','$persentase','$temuan','$kategori_temuan')");
		

	 echo "<script>alert('Data Evaluasi Berhasil Disimpan')</script>";
	 echo "<meta http-equiv='refresh' content='1 url=../../index4.php?page=audit'>";
// var_dump($query);
	
		}else{

					 echo "<script>alert('Butir standar sudah di evaluasi')</script>";
					 echo "<meta http-equiv='refresh' content='1 url=../../index4.php?page=audit'>";

				}



?>
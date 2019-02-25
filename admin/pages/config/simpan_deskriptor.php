
<?php  
	require '../../../koneksi/koneksi.php';

	

		$kode_sop	= $_POST['kode_sop'];
		$kode_butir	= $_POST['kode_butir'];
		$deskripsi	= $_POST['deskripsi'];
		$pengendali_dokumen	= $_POST['pengendali_dokumen'];
	

		
		
		
		
		$cek = mysqli_query($connect, "SELECT * FROM deskriptor WHERE kode_butir ='$kode_butir'");
				if(mysqli_num_rows($cek) == 0){

		$query = mysqli_query($connect, "INSERT INTO deskriptor VALUES ('','$kode_sop','$kode_butir','$deskripsi','$pengendali_dokumen')");
		

	 echo "<script>alert('Data Deskriptor Berhasil Disimpan')</script>";
	 echo "<meta http-equiv='refresh' content='1 url=../../index.php?page=tambah_deskripsi'>";

	
		}else{

					 echo "<script>alert('Isi Deskriptor Sudah Ada')</script>";
					 echo "<meta http-equiv='refresh' content='1 url=../../index.php?page=tambah_deskripsi'>";

				}



?>
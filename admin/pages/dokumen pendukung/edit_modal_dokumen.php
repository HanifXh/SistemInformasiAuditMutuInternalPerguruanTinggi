<?php 
	require	'../../../koneksi/koneksi.php';
	if ($_POST['idx']) {
		$id_dokumen = $_POST['idx'];
		$query = mysqli_query($connect, "SELECT * FROM dokumen WHERE id_dokumen = '$id_dokumen'");
		while ($rows = mysqli_fetch_array($query)) {
 	// var_dump($query);
 ?>

		<div class="form-group">
			<label>Id Dokumen</label>
			<input type="text" class="form-control" name="id_dokumen" value="<?php echo $rows['id_dokumen'];?>" readonly>	
		</div>
		
		<div class="form-group">
			<label>Kode Standar</label>
			<input type="text" class="form-control" name="kode_sop" value="<?php echo $rows['kode_sop'];?>">
		</div>
		
		<div class="form-group">
			<label>Nama Dokumen</label>			
			<input type="text" class="form-control" name="nama_dokumen" value="<?php echo $rows['nama_dokumen']; ?>">
		</div>
		<div class="form-group">
			<label>Dokumen</label>			
			<input type="text" class="form-control" name="dokumen" value="<?php echo $rows['dokumen']; ?>" readonly>
		</div>			
		<div class="form-group">
			<label>Dokumen</label> <span style="color: #f22">*Dokumen Berbentuk pdf</span>
				<div class="input-group">
					<div class="input-group-addon">
						<i class="fa fa-files-o"></i>
					</div>
						<input name="fupload" type="file" accept=".pdf , .docx"/>
				</div>
		</div>
			
		
 
 <?php }} 

 ?>
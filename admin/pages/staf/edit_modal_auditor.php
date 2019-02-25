<?php 
	require	'../../../koneksi/koneksi.php';
	if ($_POST['idx']) {
		$id_auditor = $_POST['idx'];
		$query = mysqli_query($connect, "SELECT * FROM auditor WHERE id_auditor = '$id_auditor'");
		while ($rows = mysqli_fetch_array($query)) {
 	// var_dump($query);
 ?>

 						 <div class="form-group">
                            <label for="id_auditor">Id Auditor</label>
                            <input type="text" class="form-control" name="id_auditor" id="id_auditor" value="<?php echo $rows['id_auditor']?>" readonly>
                          </div>

						 <div class="form-group">
                            <label for="nama_auditor">Nama Auditor</label>
                            <input type="text" class="form-control" name="nama_auditor" id="nama_auditor"  value="<?php echo $rows['nama_auditor']?>">
                          </div>
                        
                          <div class="form-group">
                            <label for="alamat_auditor">Alamat Auditor</label>
                            <input type="text" class="form-control" name="alamat_auditor" id="alamat_auditor"  value="<?php echo $rows['alamat_auditor']?>">
                   		  </div>
                          
                          <div class="form-group">
                            <label for="email_auditor">Email Auditor</label>
                            <input type="text" class="form-control" name="email_auditor" id="email_auditor"  value="<?php echo $rows['email_auditor']?>">
                          </div>

                          <div class="form-group">
                            <label for="no_telp_auditor">Nomor HandPhone</label>
                            <input type="text" class="form-control" name="no_telp_auditor" id="no_telp_auditor"  value="<?php echo $rows['no_telp_auditor']?>">
                          </div>  

                          <div class="form-group">
                            <label for="jabatan">Jabatan</label>
                            <input type="text" class="form-control" name="jabatan" id="jabatan"  value="<?php echo $rows['jabatan']?>">
                          </div>
		
		<div class="form-group">
			<label>Photo</label>
				<div class="input-group">
					<?php
						echo "<img src='pages/foto/auditor/$rows[foto]' height=90>";
					?>
				</div>
		</div>
		<div class="form-group">
			<label>Photo</label> <span style="color: #f22">*Masukan foto baru apabila ingin diganti</span>
				<div class="input-group">
					<div class="input-group-addon">
						<i class="fa fa-camera"></i>
					</div>
						<input name="fupload" type="file" accept=".jpg , .png"/>
				</div>
		</div>
			
		
 
 <?php }} 

 ?>
<?php 
	require	'../../../koneksi/koneksi.php';
	if ($_POST['idx']) {
		$id_wakil_ketua = $_POST['idx'];
		$query = mysqli_query($connect, "SELECT * FROM wakil_ketua WHERE id_wakil_ketua = '$id_wakil_ketua'");
		while ($rows = mysqli_fetch_array($query)) {
 	// var_dump($query);
 ?>

 						<div class="form-group">
                            <label for="id_wakil_ketua">Id Wakil Ketua</label>
                            <input type="text" class="form-control" name="id_wakil_ketua" id="id_wakil_ketua" value="<?php echo $rows['id_wakil_ketua']?>" readonly>
                          </div>

                          <div class="form-group">
                            <label for="nip_wakil_ketua">Nip Wakil Ketua</label>
                            <input type="text" class="form-control" name="nip_wakil_ketua" id="nip_wakil_ketua" value="<?php echo $rows['nip_wakil_ketua']?>">
                          </div>
                      
                    
                        
                          <div class="form-group">
                            <label for="nama_wakil_ketua">Nama Wakil Ketua</label>
                            <input type="text" class="form-control" name="nama_wakil_ketua" id="nama_wakil_ketua" value="<?php echo $rows['nama_wakil_ketua']?>">
                     </div>
                          
                          <div class="form-group">
                            <label for="email_wakil_ketua">Email Wakil Ketua</label>
                            <input type="text" class="form-control" name="email_wakil_ketua" id="email_wakil_ketua" value="<?php echo $rows['email_wakil_ketua']?>">
                          </div>

                          <div class="form-group">
                            <label for="no_telp_wakil_ketua">Nomor HandPhone</label>
                            <input type="text" class="form-control" name="no_telp_wakil_ketua" id="no_telp_wakil_ketua" value="<?php echo $rows['no_telp_wakil_ketua']?>">
                          </div>  

                        <div class="form-group">
                        <label for="jabatan_wakil_ketua">Jabatan Wakil Ketua</label>
                        
                        <select name="jabatan_wakil_ketua" class="form-control">
                          <option value="Wakil Ketua 1">Wakil Ketua 1</option>
                          <option value="Wakil Ketua 2">Wakil Ketua 2</option>
                        </select>
                          
                        </div> 
		
		<div class="form-group">
			<label>Photo</label>
				<div class="input-group">
					<?php
						echo "<img src='pages/foto/wakil ketua/$rows[foto_wakil_ketua]' height=90>";
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
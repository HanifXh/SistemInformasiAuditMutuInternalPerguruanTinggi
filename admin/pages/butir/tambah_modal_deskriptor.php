
<?php 
  require '../../../koneksi/koneksi.php';
  if ($_POST['idx']) {
    $kode_butir = $_POST['idx'];
    $query = mysqli_query($connect, "SELECT * FROM butir_sop WHERE kode_butir ='$kode_butir'");
    while ($rows = mysqli_fetch_array($query)) {
  // var_dump($query);

 ?>
    
                          <div class="form-group">
                          
                              <label for="kode_sop">Kode Standar</label>
                              <input type="text" class="form-control" name="kode_sop" id="kode_sop" value="<?php echo $rows['kode_sop']?>" readonly>   
                          </div>
                          <div class="form-group">
                          
                              <label for="kode_butir">Kode Butir Standar Operasional</label>
                              <input type="text" class="form-control" name="kode_butir" id="kode_butir" value="<?php echo $rows['kode_butir']?>" readonly>   
                          </div>

                         
                         
                         <div class="form-group">
                                   <label>Isi Deskriptor</label>
                                    <textarea name="deskripsi"  id="deskripsi" class="form-control" rows="7"></textarea>
                         </div>
                         <div class="form-group">
                                    <label>Pengendali Dokumen</label>
                                    <textarea name="pengendali_dokumen"  id="pengendali_dokumen" class="form-control"rows="5"></textarea>
                         </div>
                         

                         
                         
                          
 
 <?php }} 

 ?>
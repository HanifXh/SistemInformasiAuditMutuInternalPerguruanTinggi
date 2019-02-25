
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
                                   <label>Isi Butir SOP</label>
                                    <textarea name="isi_butir" class="form-control" rows="10" value="<?php echo $rows['isi_butir']?>"></textarea>
                         </div>
                          <div class="form-group">
                          
                              <label for="indikator">Indikator</label>
                              <input type="text" class="form-control" name="indikator" id="indikator" value="<?php echo $rows['indikator']?>">   
                          </div>
                          <div class="form-group">
                          
                              <label for="tgl_butir">tgl_butir</label>
                              <input type="text" class="form-control" name="tgl_butir" id="tgl_butir" value="<?php echo $rows['tgl_butir']?>" readonly>   
                          </div>
                          
 
 <?php }} 

 ?>
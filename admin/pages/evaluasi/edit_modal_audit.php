
<?php 
  require '../../../koneksi/koneksi.php';
  if ($_POST['idx']) {
    $id_evaluasi = $_POST['idx'];
    $query = mysqli_query($connect, "SELECT sop.*,adt.*,btr.*,dsk.*,evl.*,jdw.* FROM evaluasi evl INNER JOIN standar_operasional sop ON sop.kode_sop = evl.kode_sop INNER JOIN auditor adt ON adt.id_auditor = evl.id_auditor INNER JOIN butir_sop btr ON btr.kode_butir = evl.kode_butir INNER JOIN deskriptor dsk ON dsk.kode_deskripsi = evl.kode_deskripsi INNER JOIN jadwal jdw ON jdw.kode_jadwal = evl.kode_jadwal WHERE id_evaluasi ='$id_evaluasi'");
    while ($rows = mysqli_fetch_array($query)) {
  // var_dump($query);

 ?>
                          <div class="form-group" hidden>
                          
                              <label for="id_evaluasi">Id Evaluasi</label>
                              <input type="text" class="form-control" name="id_evaluasi" id="id_evaluasi" value="<?php echo $rows['id_evaluasi']?>" readonly>   
                          </div>
                          <div class="form-group" hidden>
                          
                              <label for="kode_jadwal">Kode Jadwal</label>
                              <input type="text" class="form-control" name="kode_jadwal" id="kode_jadwal" value="<?php echo $rows['kode_jadwal']?>" readonly>   
                          </div>
                          <div class="form-group">
                          
                              <label for="kode_sop">Kode Standar</label>
                              <input type="text" class="form-control" name="kode_sop" id="kode_sop" value="<?php echo $rows['kode_sop']?>" readonly>   
                          </div>
                          <div class="form-group">
                          
                              <label for="kode_butir">Kode Butir Standar Operasional</label>
                              <input type="text" class="form-control" name="kode_butir" id="kode_butir" value="<?php echo $rows['kode_butir']?>" readonly>   
                          </div>
                          <div class="form-group" hidden>
                          
                              <label for="kode_deskripsi">Kode Deskripsi</label>
                              <input type="text" class="form-control" name="kode_deskripsi" id="kode_deskripsi" value="<?php echo $rows['kode_deskripsi']?>" readonly>   
                          </div>
                          <div class="form-group" hidden>
                          
                              <label for="id_auditor">Id Auditor</label>
                              <input type="text" class="form-control" name="id_auditor" id="id_auditor" value="<?php echo $rows['id_auditor']?>" readonly>   
                          </div>
                          <div class="form-group" hidden>
                          
                              <label for="kode_unit">Kode Unit</label>
                              <input type="text" class="form-control" name="kode_unit" id="kode_unit" value="<?php echo $rows['kode_unit']?>" readonly>   
                          </div>
                         

                         
                         
                         <div class="form-group">
                        <label for="hasil">Hasil</label>
                        
                        <select name="hasil" class="form-control">
                          <option value="ada">ada</option>
                          <option value="tidak">tidak</option>
                        </select>
                          
                        </div> 
                          <div class="form-group">
                          
                              <label for="persentase">persentase</label>
                              <input type="text" class="form-control" name="persentase" id="persentase" value="<?php echo $rows['persentase']?>">   
                          </div>
                          <div class="form-group">
                          
                              <label for="temuan">Temuan Audit</label>
                              <input type="text" class="form-control" name="temuan" id="temuan" value="<?php echo $rows['temuan']?>">   
                          </div>
                       <div class="form-group">
                        <label for="kategori_temuan">Kategori Temuan</label>
                        
                        <select name="kategori_temuan" class="form-control">
                          <option value="1">Ringan</option>
                          <option value="2">Sedang</option>
                          <option value="3">Berat</option>
                        </select>
                          
                        </div> 
                          
 
 <?php }} 

 ?>
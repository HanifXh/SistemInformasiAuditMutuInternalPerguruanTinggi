
<?php 
  require '../../../koneksi/koneksi.php';
  if ($_POST['idx']) {
    $kode_sop = $_POST['idx'];
    $query = mysqli_query($connect, "SELECT * FROM standar_operasional WHERE kode_sop ='$kode_sop'");
    while ($rows = mysqli_fetch_array($query)) {
  // var_dump($query);

 ?>
    
                          <div class="form-group">

                          
                              <label for="kode_sn">Kode Standar Nasional</label>
                              <input type="text" class="form-control" name="kode_sn" id="kode_sn" value="<?php echo $rows['kode_sn']?>" readonly>   
                          </div>

                          <div class="form-group">
                          
                              <label for="kode_sop">Kode Standar</label>
                              <input type="text" class="form-control" name="kode_sop" id="kode_sop" value="<?php echo $rows['kode_sop']?>" readonly>   
                          </div>
                          <div class="form-group">
                            <label for="nama_sop">Nama Standar Operasional</label>
                            <input type="text" class="form-control" name="nama_sop" id="nama_sop" value="<?php echo $rows['nama_sop']?>">
                          </div>
                          <div class="form-group">
                            <label for="tgl_sop">Tanggal Penetapan</label>
                            <input type="text" class="form-control" name="tgl_sop" id="tgl_sop" value="<?php echo $rows['tgl_sop']?>">
                          </div>     
                      <div class="form-group"> 
                          <label for="kode_unit">Unit Kerja</label>
                          <select name="kode_unit" id="kode_unit" class="form-control">
                            <option>--Unit Kerja--</option>
                            <?php  
                              //Mengambil nama jabatan dalam Database
                              $unit_kerja = mysqli_query($connect,"SELECT * from unit_kerja order by nama_unit ASC");
                              while ($rows = mysqli_fetch_array($unit_kerja)) {
                                echo "<option value=\"$rows[kode_unit]\">$rows[nama_unit]</option>\n";
                              }
                            ?>
                          </select>
                       </div>    
                         <div class="form-group"> 
                          <label for="id_penanggung_jawab">Penanggung Jawab</label>
                          <select name="id_penanggung_jawab" id="id_penanggung_jawab" class="form-control">
                            <option>--Penanggung Jawab--</option>
                            <?php  
                              //Mengambil nama penanggung jawab dalam Database
                              $penanggung_jawab = mysqli_query($connect,"SELECT * from penanggung_jawab order by nama ASC");
                              while ($rows = mysqli_fetch_array($penanggung_jawab)) {
                                echo "<option value=\"$rows[id_penanggung_jawab]\">$rows[nama]</option>\n";
                              }
                            ?>
                          </select>
                       </div>
                          
 
 <?php }} 

 ?>

<?php 
  require '../../../koneksi/koneksi.php';
  if ($_POST['idx']) {
    $kode_unit = $_POST['idx'];
    $query = mysqli_query($connect, "SELECT unt.*, pnjwb.*, jbt.* FROM unit_kerja unt INNER JOIN penanggung_jawab pnjwb on unt.nik =  pnjwb.nik INNER JOIN jabatan jbt ON jbt.id_jbt = unt.id_jbt WHERE kode_unit ='$kode_unit'");
    while ($rows = mysqli_fetch_array($query)) {
  // var_dump($query);

 ?>
                           <div class="form-group">
                          
                              <label for="kode_unit">Kode Unit Kerja</label>
                              <input type="text" class="form-control" name="kode_unit" id="kode_unit" value="<?php echo $rows['kode_unit']?>" readonly>   
                          </div>
                          <div class="form-group">
                            <label for="nama_unit">Nama Unit Kerja</label>
                            <input type="text" class="form-control" name="nama_unit" id="nama_unit" value="<?php echo $rows['nama_unit']?>">
                          </div>
                          <div class="form-group"> 
                          <label for="nama_jbt">Jabatan</label>
                          <select name="id_jbt" id="id_jbt" class="form-control">
                            <option>--Jabatan--</option>
                            <?php  
                              //Mengambil nama jabatan dalam Database
                              $jabatan = mysqli_query($connect,"SELECT * from jabatan order by nama_jbt ASC");
                              while ($rows = mysqli_fetch_array($jabatan)) {
                                echo "<option value=\"$rows[id_jbt]\">$rows[nama_jbt]</option>\n";
                              }
                            ?>
                          </select>
                       </div>

                       <div class="form-group"> 
                          <label for="nama">Penanggung Jawab</label>
                          <select name="nik" id="nik" class="form-control">
                            <option>--Penanggung Jawab--</option>
                            <?php  
                              //Mengambil nama penanggung jawab dalam Database
                              $penanggung_jawab = mysqli_query($connect,"SELECT * from penanggung_jawab order by nama ASC");
                              while ($rows = mysqli_fetch_array($penanggung_jawab)) {
                                echo "<option value=\"$rows[nik]\">$rows[nama]</option>\n";
                              }
                            ?>
                          </select>
                       </div>
                          
   
 
 <?php }} 

 ?>
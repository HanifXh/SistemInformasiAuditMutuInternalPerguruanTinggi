<?php 
  require '../../../koneksi/koneksi.php';
  if ($_POST['idx']) {
    $id = $_POST['idx'];
    $query = mysqli_query($connect, "SELECT * FROM staf WHERE id = '$id'");
    while ($rows = mysqli_fetch_array($query)) {
  // var_dump($query);


 ?>



   <div class="form-group">
                            <label for="nik">Nik</label>
                            <input type="text" class="form-control" name="nik_staf" id="nik_staf" value="<?php echo $rows['nik_staf']?>" readonly>
                          </div>
                       
                          <div class="form-group">
                            <label for="nama">Nama Staf</label>
                            <input type="text" class="form-control" name="nama_staf" id="nama_staf" value="<?php echo $rows['nama_staf']?>">
                          </div>
                      
                      </div>
                         <div class="form-group">
            <label>Tanggal lahir</label>
            <input type="text" class="form-control" name="tgl_lahir_staf" value="<?php echo $rows['tgl_lahir_staf'];?> ">  
      </div>
                          
                          <div class="form-group">
                            <label for="email">Email</label>
                            <input type="text" class="form-control" name="email" id="email" value="<?php echo $rows['email']?>">
                          </div>
                          <div class="form-group">
                            <label for="no_hp">Nomor HandPhone</label>
                            <input type="text" class="form-control" name="no_hp" id="no_hp" value="<?php echo $rows['no_hp']?>">
                          </div> 
                       
    <div class="form-group">
      <label>Photo</label>
        <div class="input-group">
          <?php
            echo "<img src='pages/foto/staf/$rows[foto_staf]' height=30>";
          ?>
        </div>
    </div>
    <div class="form-group">
      <label>Photo</label> 
        <div class="input-group">
          <div class="input-group-addon">
            <i class="fa fa-camera"></i>
          </div>
            <input name="fupload" type="file" />
        </div>
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
    
 
 <?php }} 

 ?>

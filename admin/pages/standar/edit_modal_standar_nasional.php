
<?php 
  require '../../../koneksi/koneksi.php';
  if ($_POST['idx']) {
    $kode_sn = $_POST['idx'];
    $query = mysqli_query($connect, "SELECT * FROM standar_nasional WHERE kode_sn ='$kode_sn'");
    while ($rows = mysqli_fetch_array($query)) {
  // var_dump($query);

 ?>
    
                          <div class="form-group">
                          
                              <label for="kode_sn">Kode Standar Nasional</label>
                              <input type="text" class="form-control" name="kode_sn" id="kode_sn" value="<?php echo $rows['kode_sn']?>" readonly>   
                          </div>
                          <div class="form-group">
                            <label for="nama_sn">Nama Standar Nasional</label>
                            <input type="text" class="form-control" name="nama_sn" id="nama_sn" value="<?php echo $rows['nama_sn']?>">
                          </div>
                          <div class="form-group">
                            <label for="tanggal_sn">Tanggal Penetapan SN</label>
                            <input type="text" class="form-control" name="tanggal_sn" id="tanggal_sn" value="<?php echo $rows['tanggal_sn']?>">
                          </div>
   
 
 <?php }} 

 ?>
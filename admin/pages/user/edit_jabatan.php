
<?php 
  require '../../../koneksi/koneksi.php';
  if ($_POST['idx']) {
    $id_jbt = $_POST['idx'];
    $query = mysqli_query($connect, "SELECT * FROM jabatan WHERE id_jbt ='$id_jbt'");
    while ($rows = mysqli_fetch_array($query)) {
  // var_dump($query);

 ?>
    
    <div class="form-group">
      <label>Id Jabatan</label>
      <input type="text" class="form-control" name="id_jbt" value="<?php echo $rows['id_jbt']; ?> ">  
    </div>
    <div class="form-group">
      <label>Nama Jabatan </label>
      <input type="text" class="form-control" name="nama_jbt" value="<?php echo $rows['nama_jbt']; ?> ">  
    </div>
   
 
 <?php }} 

 ?>
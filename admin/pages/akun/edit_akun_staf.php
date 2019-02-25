
<?php 
  require '../../../koneksi/koneksi.php';
  if ($_POST['idx']) {
    $id_staf = $_POST['idx'];
    $query = mysqli_query($connect, "SELECT * FROM login_staf WHERE id_staf ='$id_staf'");
    while ($rows = mysqli_fetch_array($query)) {
  // var_dump($query);

 ?>
    
    <div class="form-group">
      <label>Id Staf</label>
      <input type="text" class="form-control" name="id_staf" value="<?php echo $rows['id_staf']; ?> "readonly>  
    </div>
    <div class="form-group">
      <label>Username Staf</label>
      <input type="text" class="form-control" name="username" value="<?php echo $rows['username']; ?> ">  
    </div>
    <div class="form-group">
      <label>Password Staf</label>
      <input type="text" class="form-control" name="password" value="<?php echo $rows['password']; ?> ">  
    </div>
   
 
 <?php }} 

 ?>
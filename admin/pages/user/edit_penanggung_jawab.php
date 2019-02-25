<?php 
	require	'../../../koneksi/koneksi.php';
	if ($_POST['idx']) {
		$nik = $_POST['idx'];
		$query = mysqli_query($connect, "SELECT * FROM penanggung_jawab WHERE nik = '$nik'");
		while ($rows = mysqli_fetch_array($query)) {
 	// var_dump($query);
 	$url = '/spmi/';

 ?>

  <link rel="stylesheet" href="<?=$url.'admin/'?>bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="<?=$url.'admin/'?>bower_components/bootstrap-daterangepicker/daterangepicker.css">

	 <div class="form-group">
                            <label for="nik">Nik</label>
                            <input type="text" class="form-control" name="nik" id="nik" value="<?php echo $rows['nik']?>" placeholder="Masukan Nik">
                          </div>

                          <div class="form-group">
                            <label for="nama">Nama Penanggung Jawab</label>
                            <input type="text" class="form-control" name="nama" id="nama" value="<?php echo $rows['nama']?>" placeholder="Masukan Nama">
                          </div>
                          <div class="form-group">
                            <label for="email">Email</label>
                            <input type="text" class="form-control" name="email" id="email" value="<?php echo $rows['email']?>" placeholder="Masukan Email">
                          </div>
                          <div class="form-group">
                            <label for="no_hp">Nomor HandPhone</label>
                            <input type="text" class="form-control" name="no_hp" id="no_hp" value="<?php echo $rows['no_hp']?>" placeholder="Masukan No hp">
                          </div> 

                       
		<div class="form-group">
			<label>Photo</label>
				<div class="input-group">
					<?php
						echo "<img src='pages/foto/pnjwb/$rows[foto_p]' height=30>";
					?>
				</div>
		</div>
		<div class="form-group">
			<label>Photo</label> 
				<div class="input-group">
					<div class="input-group-addon">
						<i class="fa fa-camera"></i>
					</div>
						<input name="fupload" type="file" accept=".jpg , .png"/>
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
 <script src="<?=$url.'admin/';?>bower_components/jquery/dist/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="<?=$url.'admin/';?>bower_components/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button);
</script>
<!-- Bootstrap 3.3.7 -->
<script src="<?=$url.'admin/';?>bower_components/bootstrap/dist/js/bootstrap.min.js"></script>


<script src="<?=$url.'admin/';?>bower_components/bootstrap-daterangepicker/daterangepicker.js"></script>

<!-- datepicker -->
<script src="<?=$url.'admin/';?>bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
<!-- Bootstrap WYSIHTML5 -->
<script src="plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
<!-- Slimscroll -->
<script src="<?=$url.'admin/';?>bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="<?=$url.'admin/';?>bower_components/fastclick/lib/fastclick.js"></script>

<script type="text/javascript" src="../../../assets/vendor/jquery/jquery.min.js"></script>
<script>
   $(document).ready(function(){
    $(".input-group.date").datepicker({
    })
   })
  </script>
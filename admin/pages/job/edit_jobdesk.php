
<?php 
  require '../../../koneksi/koneksi.php';
  if ($_POST['idx']) {
    $kode_jobdesk = $_POST['idx'];
    $query = mysqli_query($connect, "SELECT jbd.*, pnjwb.*, jbt.* FROM job_desk jbd INNER JOIN penanggung_jawab pnjwb on jbd.nik =  pnjwb.nik INNER JOIN jabatan jbt ON jbt.id_jbt = jbd.id_jbt WHERE kode_jobdesk ='$kode_jobdesk'");
    while ($rows = mysqli_fetch_array($query)) {
  // var_dump($query);
   
 ?>
    <div class="form-group">
                        
                              <label for="kode_jobdesk">Kode Job Desk</label>
                              <input type="text" class="form-control" name="kode_jobdesk" value="<?php echo $rows['kode_jobdesk']; ?>" id="kode_jobdesk" readonly>   
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


         <div class="box">
            <div class="box-header">
              <h3 class="box-title">Deskripsi Pekerjaan
              </h3>
              <!-- tools box -->
              <div class="pull-right box-tools">
                <button type="button" class="btn btn-default btn-sm" data-widget="collapse" data-toggle="tooltip"
                        title="Collapse">
                  <i class="fa fa-minus"></i></button>
                <button type="button" class="btn btn-default btn-sm" data-widget="remove" data-toggle="tooltip"
                        title="Remove">
                  <i class="fa fa-times"></i></button>
              </div>
              <!-- /. tools -->
            </div>
            <!-- /.box-header -->
            <div class="box-body pad">
                <textarea class="textarea" name="fungsi" placeholder="Masukan Deskripsi Pekerjaan" value="<?php echo $rows['fungsi']; ?>"
                          style="width: 100%; height: 100px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>
            
            </div>
          </div>



                       <div class="form-group">
                          <label for="tgl_penetapan"> Tanggal Penetapan</label>
                          <div class="row">
                            <div class="col-md-8">
                              <div class="input-group date">
                                <input class="form-control" type="text" name="tgl_penetapan" id="date" readonly="readonly" placeholder="Tanggal Penempatan">
                                <span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
                              </div>
                            </div>
                          </div>
                      </div>
 <?php }} 

 ?>
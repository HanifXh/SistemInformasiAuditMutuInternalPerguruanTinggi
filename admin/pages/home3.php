<?php 

  require '../koneksi/koneksi.php';
 ?>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          
          <!-- /.box --> 

          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Data Deskripsi Pekerjaan</h3>
            </div>
            
            <!-- /.box-header -->
           <div class="box-body table-responsive">
              <table id="example1" class="display nowrap table-responsive table-striped"  style="width:100%">
                <thead>
                <tr>
                  <th>No</th>
                  
                  <th>Jabatan</th>
                  <th>Fungsi</th>
                  <th>Penanggung Jawab</th>
                  <th>Tanggal</th>
                 
                
                </tr>
                </thead>
                <tbody>
                  <?php require '../koneksi/koneksi.php';
                    $no_urut = 0;
                    $query = mysqli_query($connect, "SELECT jbd.*, pnjwb.*, jbt.* FROM job_desk jbd INNER JOIN penanggung_jawab pnjwb on jbd.nik =  pnjwb.nik INNER JOIN jabatan jbt ON jbt.id_jbt = jbd.id_jbt");
                    while ($rows = mysqli_fetch_array($query)) {
                      $no_urut++;
                      ;
                   
                ?>
                  <tr >
                      <td><?php echo  $no_urut;  ?></td>
                    
                      
                      
                      <td> <?php echo $rows['nama_jbt']; ?> </td>
                      <td> <?php echo $rows['fungsi']; ?></td>
                      <td> <?php echo $rows['nama']; ?> </td>
                      <td> <?php echo $rows['tgl_penetapan']; ?></td>
                     
                      
                      

                    
                  </tr>
                   <?php } ?>
                </tbody>
                <tfoot>
                <tr>
                  <th>No</th>
            
                  <th>Jabatan</th>
                  <th>Fungsi</th>
                  <th>Penanggung Jawab</th>
                  <th>Tanggal</th>
                
                </tr>
                </tfoot>
              </table>
            </div>
          </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <div class="modal fade" id="modal-default">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Deskripsi Pekerjaan</h4>
              </div>
              <div class="modal-body">
                <form action="pages/config/simpan_jobdesk.php"  method="POST">
                  <div class="row">
                    <div class="col-md-1">
                      
                    </div>
                    
                    <div class="col-md-9">

                      <div class="form-group">
                        
                              <label for="kode_jobdesk">Kode Job Desk</label>
                              <input type="text" class="form-control" name="kode_jobdesk" id="kode_jobdesk" value="<?php echo $kd_jobdesk;?>"readonly>   
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
                <textarea class="textarea" name="fungsi" placeholder="Masukan Deskripsi Pekerjaan"
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
                                
                      
                    </div>
                  </div>  
                </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-danger pull-left" data-dismiss="modal">Close</button>
                      <button type="submit" class="btn btn-success" name="btn-simpan">Save changes</button>
                    </div>                  
                </form>
              </div>
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div>


<div class="modal fade" id="edit_modal_jobdesk" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Edit Deksripsi Pekerjaan</h4>
            </div>
        <form action="pages/config/jobdesk_edit.php" method="POST" accept-charset="utf-8">
        <div class="modal-body">
            <div class="hasil-data">
              
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Keluar</button>
                <button type="submit" class="btn btn-success">UPDATE</button>
            </div>
          </div>  
        </form> 
        </div>
      
    </div>
  
</div>

<div class="modal fade" id="konfirmasi_hapus_pnp_kamera" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
   <input type="hidden" name="username_session" value="<?php echo $username_session; ?>">
        <div class="modal-dialog" style="margin-top: 15%;">
            <div class="modal-content" style="margin-top: 100px;">
              <div class="modal-header">
                  <h4 class="modal-title" style="text-align: center;">Anda yakin akan menghapus data ini ?</h4>
              </div>
                <div class="modal-footer" style="margin:0px; border-top:0px; text-align:center;">
                    <a class="btn btn-danger btn-ok"> Hapus</a> 
                    <button type="button" class="btn btn-primary" data-dismiss="modal"><i class="fa fa-close"></i> Batal</button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="konfirmasi_arsip_event" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
        <div class="modal-dialog" style="margin-top: 15%;">
            <div class="modal-content" style="margin-top: 100px;">
              <div class="modal-header">
                  <h4 class="modal-title" style="text-align: center;">Anda yakin akan mengarsipkan data ini ?</h4>
              </div>
                <div class="modal-footer" style="margin:0px; border-top:0px; text-align:center;">
                    <a class="btn btn-success btn-ok"> Arsipkan</a> 
                    <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-close"></i> Batal</button>
                </div>
            </div>
        </div>
    </div>
    </section>

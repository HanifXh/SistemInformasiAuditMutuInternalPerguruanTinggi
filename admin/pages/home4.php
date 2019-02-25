
<?php 
    require '../koneksi/koneksi.php';
// mencari kode barang dengan nilai paling besar
// $query = "SELECT max(kode_kamera) as maxKode FROM kamera";
// $hasil = mysqli_query($connect,$query);
// $data = mysqli_fetch_array($hasil);
// $kodeKamera = $data['maxKode'];
// 
// mengambil angka atau bilangan dalam kode anggota terbesar,
// dengan cara mengambil substring mulai dari karakter ke-1 diambil 6 karakter
// misal 'BRG001', akan diambil '001'
// setelah substring bilangan diambil lantas dicasting menjadi integer
// $noUrut = (int) substr($kodeKamera, 3, 3);

// bilangan yang diambil ini ditambah 1 untuk menentukan nomor urut berikutnya
// $noUrut++;

// membentuk kode anggota baru
// perintah sprintf("%03s", $noUrut); digunakan untuk memformat string sebanyak 3 karakter
// misal sprintf("%03s", 12); maka akan dihasilkan '012'
// atau misal sprintf("%03s", 1); maka akan dihasilkan string '001'
// $char = "KMR";
// $kodeBarang = $char . sprintf("%03s", $noUrut);
// echo $kodeBarang;

 $id_auditor_session = $_SESSION['id_auditor'];

?>
     <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          
          <!-- /.box --> 

          <div class="box">
           
            <!-- /.box-header -->
            <div class="box-body table-responsive">
              <table id="example1" class="display nowrap table-responsive table-striped"  style="width:100%">
                <thead>
                <tr>
                  <th>No</th>
                  <th>Kode Jadwal</th>
                  <th>Kode Standar Nasional</th>
                  <th>Kode Standar</th>
                  <th>Auditor</th>
                  <th>Program Studi</th>
                  <th>Tahun</th>
                  <th>Tanggal Audit</th>
                  
                  
                  
               
                
                </tr>
                </thead>
                <tbody>
                  <?php require '../koneksi/koneksi.php';
                    $no_urut = 0;
                    $query = mysqli_query($connect, "SELECT sop.*,adt.*,jdw.* FROM jadwal jdw INNER JOIN standar_operasional sop ON sop.kode_sop = jdw.kode_sop INNER JOIN auditor adt ON adt.id_auditor = jdw.id_auditor  WHERE adt.id_auditor = $id_auditor_session AND jdw.tanggal_selesai between date(now()) and DATE_ADD(date(now()), INTERVAL +14 DAY)");
                    while ($rows = mysqli_fetch_array($query)) {
                      $no_urut++;
                       
             
                   
                ?>
                  <tr >
                      <td> <?php echo  $no_urut;  ?></td>
                      <td><?php echo $rows['kode_jadwal']?></td>
                      <td> <?php echo $rows['kode_sn']?></td>
                      <td> <?php echo $rows['kode_sop']?></td>
                      <td> <?php echo $rows['nama_auditor'];?></td>
                      <td> <?php echo $rows['program_studi'];?></td>
                      <td> <?php echo $rows['tahun_pengukuran']?></td>
                      <td> <?php echo $rows['tanggal_mulai']?>||<?php echo $rows['tanggal_selesai']?></td>
                   
                    
                  </tr>
                   <?php } ?>
                </tbody>
                <tfoot>
                <tr>
                  
                  <th>No</th>
                  <th>Nama</th>
            
          
           
                  <th>Foto</th>
                  
                  
              
                
                
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
                <h4 class="modal-title">Tambah Data Wakil Ketua</h4>
              </div>
          <div class="modal-body">
            <form action="pages/config/simpan_jadwal_audit.php" onsubmit="return validasidata_jadwal_audit()" method="POST" enctype="multipart/form-data">
               <div class="row">
                    <div class="col-md-1">
                      
                    </div>
                    <div class="col-md-9">
                        <div class="form-group">
                          
                              <label for="kode_jadwal">Kode Jadwal</label>
                              <input type="text" class="form-control" name="kode_jadwal" id="kode_jadwal" placeholder="Masukan Kode Jadwal" value="<?php echo $kd_jdw;?>"readonly>   
                          </div>
                      <div class="form-group"> 
                          <label for="kode_sop">Standar</label>
                          <select name="kode_sop" id="kode_sop" class="form-control">
                            <option>--Standar--</option>
                            <?php  
                              //Mengambil nama penanggung jawab dalam Database
                              $standar_operasional = mysqli_query($connect,"SELECT * from standar_operasional order by nama_sop ASC");
                              while ($rows = mysqli_fetch_array($standar_operasional)) {
                                echo "<option value=\"$rows[kode_sop]\">$rows[nama_sop]</option>\n";
                              }
                            ?>
                          </select>
                       </div>

                       <div class="form-group"> 
                          <label for="id_auditor">Auditor</label>
                          <select name="id_auditor" id="id_auditor" class="form-control">
                            <option>--Auditor--</option>
                            <?php  
                              //Mengambil nama penanggung jawab dalam Database
                              $auditor = mysqli_query($connect,"SELECT * from auditor order by nama_auditor ASC");
                              while ($rows = mysqli_fetch_array($auditor)) {
                                echo "<option value=\"$rows[id_auditor]\">$rows[nama_auditor]</option>\n";
                              }
                            ?>
                          </select>
                       </div>
                      
                    
                        
                          <div class="form-group">
                            <label for="program_studi">Program Studi</label>
                            <input type="text" class="form-control" name="program_studi" id="program_studi" placeholder="Masukan Program Studi">
                          </div>
                          
                          <div class="form-group">
                            <label for="tahun_pengukuran">Tahun Pengukuran Mutu</label>
                            <input type="text" class="form-control" name="tahun_pengukuran" id="tahun_pengukuran" placeholder="Masukan Tahun Pengukuran Mutu">
                          </div>

                      <div class="form-group">
                          <label for="tanggal_audit"> Tanggal Audit</label>
                          <div class="row">
                            <div class="col-md-8">
                              <div class="input-group date">
                                <input class="form-control" type="text" name="tanggal_audit" id="tanggal_audit" readonly="readonly" placeholder="Tanggal Audit">
                                <span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
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


<div class="modal fade" id="edit_modal_wakil_ketua" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Edit Wakil Ketua</h4>
            </div>
        <form action="pages/config/wakil_ketua_edit.php" method="POST" accept-charset="utf-8" enctype="multipart/form-data">
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



<div class="modal fade" id="konfirmasi_hapus_wakil_ketua" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
  
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

    
    </section>

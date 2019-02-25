<?php 
    require '../koneksi/koneksi.php';
// mencari kode barang dengan nilai paling besar
$query = "SELECT max(kode_jadwal) as maxKode FROM jadwal";
$hasil = mysqli_query($connect,$query);
$data = mysqli_fetch_array($hasil);
$jdw = $data['maxKode'];

// mengambil angka atau bilangan dalam kode anggota terbesar,
// dengan cara mengambil substring mulai dari karakter ke-1 diambil 6 karakter
// misal 'BRG001', akan diambil '001'
// setelah substring bilangan diambil lantas dicasting menjadi integer
$noUrut = (int) substr($jdw, 3, 3);

// bilangan yang diambil ini ditambah 1 untuk menentukan nomor urut berikutnya
$noUrut++;

// membentuk kode anggota baru
// perintah sprintf("%03s", $noUrut); digunakan untuk memformat string sebanyak 3 karakter
// misal sprintf("%03s", 12); maka akan dihasilkan '012'
// atau misal sprintf("%03s", 1); maka akan dihasilkan string '001'
$char = "JDW";
$kd_jdw= $char . sprintf("%03s", $noUrut);
// echo $kodeBarang;


?>


     <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          
          <!-- /.box --> 

          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Data Table Jadwal Audit</h3>
            </div>
            <div class="row">
              <div class="col-xs-4" style="margin-left: 5px;">
                  <button type="button" class="btn btn-success" data-toggle="modal" data-target="#modal-default">

                <i class="fa fa-plus"> </i> Tambah Data Jadwal Audit

              </button>  
              <!--  <a class="btn btn-success" href="pages/config/export_kamera.php">Export ke Excel <i class="fa fa-file-excel-o"></i></a>               -->
              </div>
              
            </div>
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
                  <th>Tanggal Mulai</th>
                  <th>Tanggal Selesai</th>
                  
                  
                  
                  <th><center>Pengaturan Data</center></th>
                
                </tr>
                </thead>
                <tbody>
                  <?php require '../koneksi/koneksi.php';
                    $no_urut = 0;
                    $query = mysqli_query($connect, "SELECT sop.*,adt.*,jdw.* FROM jadwal jdw INNER JOIN standar_operasional sop ON sop.kode_sop = jdw.kode_sop INNER JOIN auditor adt ON adt.id_auditor = jdw.id_auditor");
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
                      <td> <?php echo $rows['tanggal_mulai']?></td>
                       <td> <?php echo $rows['tanggal_selesai']?></td>
                      <td><center>
                             <div class="btn-group">
                  <button type="button" class="btn btn-danger">Action</button>
                  <button type="button" class="btn btn-danger dropdown-toggle" data-toggle="dropdown">
                    <span class="caret"></span>
                    <span class="sr-only"></span>
                  </button>
                  <ul class="dropdown-menu" role="menu">
                    <li><a href="#edit_modal_jadwal" data-toggle='modal' data-id="<?php echo $rows['kode_jadwal']; ?>" >Edit</a></li>
                    <li><a href="" data-toggle='modal' data-target='#konfirmasi_hapus_jadwal' data-href="pages/config/delete_jadwal.php?kode_jadwal=<?php echo $rows['kode_jadwal']; ?>"'>Delete</a></li>
                   
                  </ul>
                </div>

                    </td>

                    
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
                              $standar_operasional = mysqli_query($connect,"SELECT * from standar_operasional order by kode_sop ASC");
                              while ($rows = mysqli_fetch_array($standar_operasional)) {
                                echo "<option value=\"$rows[kode_sop]\">$rows[nama_sop]||$rows[kode_sop]</option>\n";
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
                          <label for="tanggal_mulai"> Tanggal Mulai</label>
                          <div class="row">
                            <div class="col-md-8">
                              <div class="input-group date">
                                <input class="form-control" type="text" name="tanggal_mulai" id="tanggal_mulai" readonly="readonly" placeholder="Tanggal Mulai">
                                <span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
                              </div>
                            </div>
                          </div>
                      </div>
                      <div class="form-group">
                          <label for="tanggal_selesai"> Tanggal Selesai</label>
                          <div class="row">
                            <div class="col-md-8">
                              <div class="input-group date">
                                <input class="form-control" type="text" name="tanggal_selesai" id="tanggal_selesai" readonly="readonly" placeholder="Tanggal Selesai">
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


<div class="modal fade" id="edit_modal_jadwal" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Edit Wakil Ketua</h4>
            </div>
        <form action="pages/config/jadwal_edit.php" method="POST" accept-charset="utf-8" enctype="multipart/form-data">
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



<div class="modal fade" id="konfirmasi_hapus_jadwal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
  
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

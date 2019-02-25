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


?>


    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          
          <!-- /.box --> 

          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Data Table Standar</h3>
            </div>
            <div class="row">
              <div class="col-xs-4" style="margin-left: 5px;">
                  <button type="button" class="btn btn-success" data-toggle="modal" data-target="#modal-default">

                <i class="fa fa-plus"> </i> Tambah Data Standar

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
                  <th>Unit Kerja</th>
                  <th>Standar Nasional</th>
                  <th>Kode Standar </th>
                  <th>Nama Standar</th>
                  <th>Penanggung Jawab</th>
                  <th>Tanggal Standar</th>
                  
                  <th><center>Pengaturan Data</center></th>
                
                </tr>
                </thead>
                <tbody>
                  <?php require '../koneksi/koneksi.php';
                    $no_urut = 0;
                    $query = mysqli_query($connect, "SELECT sop.*,unt.*,sn.*,pnjwb.* FROM standar_operasional sop INNER JOIN unit_kerja unt ON sop.kode_unit = unt.kode_unit INNER JOIN standar_nasional sn ON sn.kode_sn = sop.kode_sn INNER JOIN penanggung_jawab pnjwb ON sop.id_penanggung_jawab = pnjwb.id_penanggung_jawab");
                    while ($rows = mysqli_fetch_array($query)) {
                      $no_urut++;
                       
             
                   
                ?>
                  <tr >
                      <td> <?php echo  $no_urut;  ?></td>
                      <td> <?php echo $rows['nama_unit']?></td>
                      <td> <?php echo $rows['nama_sn'];?></td>
                      <td> <?php echo $rows['kode_sop']?></td>
                      
                      <td> <?php echo $rows['nama_sop']?></td>
                      <td><?php echo $rows['nama']?></td>
                      <td> <?php echo $rows['tgl_sop'];?></td>
               
                      
                    
                     <!--  <td>
                        <textarea name="" id="" cols="45" rows="15" style="align-content:left; overflow:auto; width:18px; height:18px">
                          <?php echo $rows['keterangan'];?></textarea> 
                       </td> -->
                      
                      <td><center>
                             <div class="btn-group">
                  <button type="button" class="btn btn-danger">Action</button>
                  <button type="button" class="btn btn-danger dropdown-toggle" data-toggle="dropdown">
                    <span class="caret"></span>
                    <span class="sr-only"></span>
                  </button>
                  <ul class="dropdown-menu" role="menu">
                    <li><a href="#edit_modal_standar_sop" data-toggle='modal' data-id="<?php echo $rows['kode_sop']; ?>" >Edit</a></li>
                    <li><a href="" data-toggle='modal' data-target='#konfirmasi_hapus_standar_sop' data-href="pages/config/delete_standar_sop.php?kode_sop=<?php echo $rows['kode_sop']; ?>"'>Delete</a></li>
                    <!-- <li class="divider"></li>
                    <li><a href="#edit_modal_foto_kamera" data-toggle='modal' data-id="<?php echo $rows['kode_kamera']; ?>" >Info</a></li> -->
                  </ul>
                </div>

                    </td>

                    
                  </tr>
                   <?php } ?>
                </tbody>
                <tfoot>
                <tr>
                  <th>No</th>
                  <th>Kode Standar</th>
                  <th>Nama Standar</th>
                  <th>Tanggal Standar</th>
              
                
                
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
                <h4 class="modal-title">Masukan Data Standar Stmik Bandung</h4>
              </div>
          <div class="modal-body">
            <form action="pages/config/simpan_standar_operasional.php" onsubmit="return validasidata_tambah_sub_standar()" method="POST" enctype="multipart/form-data">
               <div class="row">
                    <div class="col-md-1">
                      
                    </div>
                    <div class="col-md-9">

                          <div class="form-group"> 
                          <label for="kode_unit">Unit Kerja</label>
                          <select name="kode_unit" id="kode_unit" class="form-control">
                            <option>--Unit Kerja--</option>
                            <?php  
                              //Mengambil nama jabatan dalam Database
                              $unit_kerja = mysqli_query($connect,"SELECT * from unit_kerja order by nama_unit ASC");
                              while ($rows = mysqli_fetch_array($unit_kerja)) {
                                echo "<option value=\"$rows[kode_unit]\">$rows[nama_unit]</option>\n";
                              }
                            ?>
                          </select>
                       </div>

                       <div class="form-group"> 
                          <label for="kode_sn">Standar Nasional</label>
                          <select name="kode_sn" id="kode_sn" class="form-control">
                            <option>--Standar Nasional--</option>
                            <?php  
                              //Mengambil nama penanggung jawab dalam Database
                              $standar_nasional = mysqli_query($connect,"SELECT * from standar_nasional order by nama_sn ASC");
                              while ($rows = mysqli_fetch_array($standar_nasional)) {
                                echo "<option value=\"$rows[kode_sn]\">$rows[nama_sn]</option>\n";
                              }
                            ?>
                          </select>
                       </div>




                         <div class="form-group">
                          
                              <label for="kode_sop">Kode Standar Operasional</label>
                              <input type="text" class="form-control" name="kode_sop" id="kode_sop" placeholder="Masukan Kode Standar Operasional">   
                          </div>
                         <div class="form-group">
                          
                              <label for="nama_sop">Nama Standar Operasional</label>
                              <input type="text" class="form-control" name="nama_sop" id="nama_sop" placeholder="Masukan Nama Standar Operasional">   
                          </div>
                                         
                         <div class="form-group"> 
                          <label for="id_penanggung_jawab">Penanggung Jawab</label>
                          <select name="id_penanggung_jawab" id="id_penanggung_jawab" class="form-control">
                            <option>--Penanggung Jawab--</option>
                            <?php  
                              //Mengambil nama penanggung jawab dalam Database
                              $penanggung_jawab = mysqli_query($connect,"SELECT * from penanggung_jawab order by nama ASC");
                              while ($rows = mysqli_fetch_array($penanggung_jawab)) {
                                echo "<option value=\"$rows[id_penanggung_jawab]\">$rows[nama]</option>\n";
                              }
                            ?>
                          </select>
                       </div>
                            <div class="form-group">
                                <label for="tgl_sop"> Tanggal Standar Operasional</label>
                                <div class="row">
                                  <div class="col-md-8">
                                    <div class="input-group date">
                                      <input class="form-control" type="text" name="tgl_sop" id="tgl_sop" readonly="readonly" placeholder="Tanggal Penetapan Standar">
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


<div class="modal fade" id="edit_modal_standar_sop" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Edit Standar Operasional</h4>
            </div>
        <form action="pages/config/edit_standar_sop.php" method="POST" accept-charset="utf-8" enctype="multipart/form-data">
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


</div>

<div class="modal fade" id="konfirmasi_hapus_standar_sop" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
  
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

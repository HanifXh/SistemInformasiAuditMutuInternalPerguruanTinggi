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
              <h3 class="box-title">Data Table Butir Standar</h3>
            </div>
            <div class="row">
              <div class="col-xs-4" style="margin-left: 5px;">
                  <button type="button" class="btn btn-success" data-toggle="modal" data-target="#modal-default">

                <i class="fa fa-plus"> </i> Tambah Data Butir Standar

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
                 
                  <th>Nama Standar</th>
                  <th>Kode Butir</th>
                  <th>Butir Standar</th>
                  <th>Indikator</th>
                  <th>Tanggal</th>
                  
                  <th><center>Pengaturan Data</center></th>
                
                </tr>
                </thead>
                <tbody>
                  <?php require '../koneksi/koneksi.php';
                    $no_urut = 0;
                    $query = mysqli_query($connect, "SELECT sop.*,btr.* FROM butir_sop btr INNER JOIN standar_operasional sop ON sop.kode_sop = btr.kode_sop ");
                    while ($rows = mysqli_fetch_array($query)) {
                      $no_urut++;
                       
             
                   
                ?>
                  <tr >
                      <td> <?php echo  $no_urut;  ?></td>
                   
                      <td> <?php echo $rows['nama_sop'];?></td>
                      <td> <?php echo $rows['kode_butir'];?></td>
                     
                      <td><textarea name="" id="" cols="45" rows="15" style="align-content:left; overflow:auto; width:150px; height:80px" readonly><?php echo $rows['isi_butir'];?></textarea></td>
                      <td><textarea name="" id="" cols="45" rows="15" style="align-content:left; overflow:auto; width:150px; height:80px" readonly><?php echo $rows['indikator']?></textarea></td>
                      <td> <?php echo $rows['tgl_butir'];?></td>
               
                      
                    
                    
                      
                      <td><center>
                             <div class="btn-group">
                  <button type="button" class="btn btn-danger">Action</button>
                  <button type="button" class="btn btn-danger dropdown-toggle" data-toggle="dropdown">
                    <span class="caret"></span>
                    <span class="sr-only"></span>
                  </button>
                  <ul class="dropdown-menu" role="menu">
                    <li><a href="#edit_modal_butir" data-toggle='modal' data-id="<?php echo $rows['kode_butir']; ?>" >Edit</a></li>
                    <li><a href="" data-toggle='modal' data-target='#konfirmasi_hapus_butir' data-href="pages/config/delete_butir.php?kode_butir=<?php echo $rows['kode_butir']; ?>"'>Delete</a></li>
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
                   <th>Kode SOP</th>
                  <th>Nama SOP</th>
                
               
              
                
                
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
                <h4 class="modal-title">Masukan Data Butir Butir Standar</h4>
              </div>
          <div class="modal-body">
            <form action="pages/config/simpan_butir_standar_operasional.php" onsubmit="return validasidata_butir_sop()" method="POST" enctype="multipart/form-data">
               <div class="row">
                    <div class="col-md-1">
                      
                    </div>
                    <div class="col-md-9">

                      

                       <div class="form-group"> 
                          <label for="kode_sop">Standar Operasional</label>
                          <select name="kode_sop" id="kode_sop" class="form-control">
                            <option>--Standar Operasional--</option>
                            <?php  
                              
                              $standar_operasional = mysqli_query($connect,"SELECT * from standar_operasional order by kode_sop ASC");
                              while ($rows = mysqli_fetch_array($standar_operasional)) {
                                echo "<option value=\"$rows[kode_sop]\">$rows[nama_sop]||$rows[kode_sop]</option>\n";
                              }
                            ?>
                          </select>
                       </div>




                         <div class="form-group">
                          
                              <label for="kode_butir">Kode Butir Standar Operasional</label>*Contoh Pengisian butir S.01.18.1
                              <input type="text" class="form-control" name="kode_butir" id="kode_butir" value="S.0" placeholder="Masukan Kode Butir Standar Operasional">   
                          </div>

                         
                         
                         <div class="form-group">
                                   <label>Isi Butir SOP</label>
                                    <textarea name="isi_butir" class="form-control" rows="10" id="isi_butir" placeholder="Masukan Isi Butir Standar Operasional"></textarea>
                         </div>
                          <div class="form-group">
                          
                              <label for="indikator">Indikator</label>
                              <input type="text" class="form-control" name="indikator" id="indikator" placeholder="Masukan Indikator Butir Standar Operasional">   
                          </div>
                                         
                         
                            <div class="form-group">
                                <label for="tgl_butir"> Tanggal Butir Standar Operasional</label>
                                <div class="row">
                                  <div class="col-md-8">
                                    <div class="input-group date">
                                      <input class="form-control" type="text" name="tgl_butir" id="tgl_butir" readonly="readonly" placeholder="Tanggal Penetapan Standar">
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


<div class="modal fade" id="edit_modal_butir" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Edit Butir Standar</h4>
            </div>
        <form action="pages/config/butir_edit.php" method="POST" accept-charset="utf-8" enctype="multipart/form-data">
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

<div class="modal fade" id="konfirmasi_hapus_butir" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
  
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

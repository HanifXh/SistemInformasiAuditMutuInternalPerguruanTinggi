<?php 
    require '../koneksi/koneksi.php';
// mencari kode barang dengan nilai paling besar
$query = "SELECT max(kode_unit) as maxKode FROM unit_kerja";
$hasil = mysqli_query($connect,$query);
$data = mysqli_fetch_array($hasil);
$unk = $data['maxKode'];

// mengambil angka atau bilangan dalam kode anggota terbesar,
// dengan cara mengambil substring mulai dari karakter ke-1 diambil 6 karakter
// misal 'BRG001', akan diambil '001'
// setelah substring bilangan diambil lantas dicasting menjadi integer
$noUrut = (int) substr($unk, 3, 3);

// bilangan yang diambil ini ditambah 1 untuk menentukan nomor urut berikutnya
$noUrut++;

// membentuk kode anggota baru
// perintah sprintf("%03s", $noUrut); digunakan untuk memformat string sebanyak 3 karakter
// misal sprintf("%03s", 12); maka akan dihasilkan '012'
// atau misal sprintf("%03s", 1); maka akan dihasilkan string '001'
$char = "UNK";
$kd_unit= $char . sprintf("%03s", $noUrut);
// echo $kodeBarang;


?>


    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          
          <!-- /.box --> 

          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Data Table Unit Kerja</h3>
            </div>
            <div class="row">
              <div class="col-xs-4" style="margin-left: 5px;">
                  <button type="button" class="btn btn-success" data-toggle="modal" data-target="#modal-default">

                <i class="fa fa-plus"> </i> Tambah Data Unit Kerja

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
                  <th>Kode Unit Kerja</th>
                  <th>Nama Unit Kerja</th>
                  <th>Pengampu Unit Kerja</th>
                  <th>Penanggung Jawab</th>
                  
                  <th><center>Pengaturan Data</center></th>
                
                </tr>
                </thead>
                <tbody>
                  <?php require '../koneksi/koneksi.php';
                    $no_urut = 0;
                    $query = mysqli_query($connect, "SELECT unt.*, pnjwb.*, jbt.* FROM unit_kerja unt INNER JOIN penanggung_jawab pnjwb on unt.nik =  pnjwb.nik INNER JOIN jabatan jbt ON jbt.id_jbt = unt.id_jbt");
                    while ($rows = mysqli_fetch_array($query)) {
                      $no_urut++;
                       
             
                   
                ?>
                  <tr >
                      <td> <?php echo  $no_urut;  ?></td>
                      <td> <?php echo $rows['kode_unit']?></td>
                      <td> <?php echo $rows['nama_unit'];?></td>
                      <td> <?php echo $rows['nama_jbt'];?></td>
                      <td> <?php echo $rows['nama'];?></td>
               
                      
                    
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
                    <li><a href="#edit_modal_unit_kerja" data-toggle='modal' data-id="<?php echo $rows['kode_unit']; ?>" >Edit</a></li>
                    <li><a href="" data-toggle='modal' data-target='#konfirmasi_hapus_unit_kerja' data-href="pages/config/delete_unit_kerja.php?kode_unit=<?php echo $rows['kode_unit']; ?>"'>Delete</a></li>
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
                  <th>Kode Unit Kerja</th>
                  <th>Nama Unit Kerja</th>
                  <th>Pengampu Unit Kerja</th>
                  <th>Penanggung Jawab</th>
                
                
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
                <h4 class="modal-title">Masukan Data Unit Kerja</h4>
              </div>
          <div class="modal-body">
            <form action="pages/config/simpan_unit_kerja.php" onsubmit="return validasidata_tambah_unit_kerja()" method="POST" enctype="multipart/form-data">
               <div class="row">
                    <div class="col-md-1">
                      
                    </div>
                    <div class="col-md-9">
                         <div class="form-group">
                          
                              <label for="kode_unit">Kode Unit Kerja</label>
                              <input type="text" class="form-control" name="kode_unit" id="kode_unit" placeholder="Masukan Kode Unit Kerja" value="<?php echo $kd_unit;?>"readonly>   
                          </div>
                          <div class="form-group">
                            <label for="nama_unit">Nama Unit Kerja</label>
                            <input type="text" class="form-control" name="nama_unit" id="nama_unit" placeholder="Masukan Nama Unit Kerja">
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


<div class="modal fade" id="edit_modal_unit_kerja" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Edit Unit Kerja</h4>
            </div>
        <form action="pages/config/unit_kerja_edit.php" method="POST" accept-charset="utf-8" enctype="multipart/form-data">
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

<div class="modal fade" id="konfirmasi_hapus_unit_kerja" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
  
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

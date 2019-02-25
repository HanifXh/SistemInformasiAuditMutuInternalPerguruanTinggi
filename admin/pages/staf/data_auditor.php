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
              <h3 class="box-title">Data Table Auditor</h3>
            </div>
            <div class="row">
              <div class="col-xs-4" style="margin-left: 5px;">
                  <button type="button" class="btn btn-success" data-toggle="modal" data-target="#modal-default">

                <i class="fa fa-plus"> </i> Tambah Data Auditor

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
                  <th>Nama</th>
                  <th>Alamat</th>
                  <th>Email</th>
                  <th>No HP</th>
                  <th>Jabatan</th>
                  <th>Foto</th>
                  
                  
                  
                  <th><center>Pengaturan Data</center></th>
                
                </tr>
                </thead>
                <tbody>
                  <?php require '../koneksi/koneksi.php';
                    $no_urut = 0;
                    $query = mysqli_query($connect, "SELECT * FROM auditor order by nama_auditor");
                    while ($rows = mysqli_fetch_array($query)) {
                      $no_urut++;
                       
             
                   
                ?>
                  <tr >
                      <td> <?php echo  $no_urut;  ?></td>
                      <td> <?php echo $rows['nama_auditor']?></td>
                      <td> <?php echo $rows['alamat_auditor']?></td>
                      <td> <?php echo $rows['email_auditor'];?></td>
                      <td> <?php echo $rows['no_telp_auditor'];?></td>
                      <td> <?php echo $rows['jabatan']?></td>
                      <td><img src="pages/foto/auditor/<?php echo $rows['foto']; ?>" alt="" width="60" class="img-responsive img-thumbnail"></td>
               
                      
                    
                    
                      
                      <td><center>
                             <div class="btn-group">
                  <button type="button" class="btn btn-danger">Action</button>
                  <button type="button" class="btn btn-danger dropdown-toggle" data-toggle="dropdown">
                    <span class="caret"></span>
                    <span class="sr-only"></span>
                  </button>
                  <ul class="dropdown-menu" role="menu">
                    <li><a href="#edit_modal_auditor" data-toggle='modal' data-id="<?php echo $rows['id_auditor']; ?>" >Edit</a></li>
                    <li><a href="" data-toggle='modal' data-target='#konfirmasi_hapus_auditor' data-href="pages/config/delete_auditor.php?id_auditor=<?php echo $rows['id_auditor']; ?>"'>Delete</a></li>
                   
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
                <h4 class="modal-title">Tambah Data Auditor</h4>
              </div>
          <div class="modal-body">
            <form action="pages/config/simpan_auditor.php"  onsubmit="return validasidata_auditor()" method="POST" enctype="multipart/form-data">
               <div class="row">
                    <div class="col-md-1">
                      
                    </div>
                    <div class="col-md-9">
                        
                          <div class="form-group">
                            <label for="nama_auditor">Nama Auditor</label>
                            <input type="text" class="form-control" name="nama_auditor" id="nama_auditor" placeholder="Masukan nama auditor">
                          </div>
                      
                    
                        
                          <div class="form-group">
                            <label for="alamat_auditor">Alamat Auditor</label>
                            <input type="text" class="form-control" name="alamat_auditor" id="alamat_auditor" placeholder="Masukan alamat auditor">
                     </div>
                          
                          <div class="form-group">
                            <label for="email_auditor">Email Auditor</label>
                            <input type="text" class="form-control" name="email_auditor" id="email_auditor" placeholder="Masukan Email">
                          </div>

                          <div class="form-group">
                            <label for="no_telp_auditor">Nomor HandPhone</label>
                            <input type="text" class="form-control" name="no_telp_auditor" id="no_telp_auditor" placeholder="Masukan No hp">
                          </div>  

                          <div class="form-group">
                            <label for="jabatan">Jabatan</label>
                            <input type="text" class="form-control" name="jabatan" id="jabatan" placeholder="Masukan jabatan">
                          </div>

                                              
                           <div class="form-group">
                        <label for="foto">Foto Auditor</label>
                        <input type="file" name="foto" id="foto" class="form-control btn btn-success">
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


<div class="modal fade" id="edit_modal_auditor" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Edit Auditor</h4>
            </div>
        <form action="pages/config/auditor_edit.php" method="POST" accept-charset="utf-8" enctype="multipart/form-data">
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



<div class="modal fade" id="konfirmasi_hapus_auditor" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
  
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

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
              <h3 class="box-title">Data Akun Wakil Ketua</h3>
            </div>
            <div class="row">
              <div class="col-xs-4" style="margin-left: 5px;">
              <button type="button" class="btn btn-success" data-toggle="modal" data-target="#akun_wakilketua">
                <i class="fa fa-plus"> </i>Olah Akun Wakil Ketua
              </button>
                      
              </div>
              
            </div>
            <!-- /.box-header -->
            <div class="box-body table-responsive">
              <table id="example1" class="display nowrap table-responsive table-striped"  style="width:100%">
                <thead>
                <tr>
                  <th>No</th>
                  <th>Nama Wakil Ketua</th>
                  <th>Username</th>
                  <th>Password</th>
                  
                  
                  
                  
                  <th><center>Pengaturan Data</center></th>
                
                </tr>
                </thead>
                <tbody>
                  <?php require '../koneksi/koneksi.php';
                    $no_urut = 0;
                    $query = mysqli_query($connect, "SELECT lwk.*,wkt.* FROM login_wakil_ketua lwk INNER JOIN wakil_ketua wkt ON wkt.id_wakil_ketua=lwk.id_wakil_ketua");
                    while ($rows = mysqli_fetch_array($query)) {
                      $no_urut++;
                       
             
                   
                ?>
                  <tr >
                      <td> <?php echo  $no_urut;  ?></td>
                      <td> <?php echo $rows['nama_wakil_ketua']?></td>
                      <td> <?php echo $rows['username'];?></td>
                      <td> <?php echo $rows['password'];?></td>
                      
               
                      
                    
                    
                      
                      <td><center>
                             <div class="btn-group">
                  <button type="button" class="btn btn-danger">Action</button>
                  <button type="button" class="btn btn-danger dropdown-toggle" data-toggle="dropdown">
                    <span class="caret"></span>
                    <span class="sr-only"></span>
                  </button>
                  <ul class="dropdown-menu" role="menu">
                    <li><a href="#edit_modal_wakil_ketua" data-toggle='modal' data-id="<?php echo $rows['id_wakil_ketua']; ?>" >Edit</a></li>
                    <li><a href="" data-toggle='modal' data-target='#konfirmasi_hapus_wakil_ketua' data-href="pages/config/delete_wakil_ketua.php?id_wakil_ketua=<?php echo $rows['id_wakil_ketua']; ?>"'>Delete</a></li>
                   
                  </ul>
                </div>

                    </td>

                    
                  </tr>
                   <?php } ?>
                </tbody>
                <tfoot>
                <tr>
                  
                  <th>No</th>
                  <th>Nama Wakil Ketua</th>
                  <th>Username</th>
                  <th>Password</th>
             
          
           
             
                  
                  
              
                
                
                </tr>
                </tfoot>
              </table>
            </div>
          </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
       <div class="modal fade" id="akun_wakilketua">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Tambah Data Wakil Ketua</h4>
              </div>
          <div class="modal-body">
            <form action="pages/config/simpan_akun_wakil_ketua.php" onsubmit="" method="POST" enctype="multipart/form-data">
               <div class="row">
                    <div class="col-md-1">
                      
                    </div>
                    <div class="col-md-9">
                        
                          <div class="form-group"> 
                          <label for="id_wakil_ketua">Wakil Ketua</label>
                          <select name="id_wakil_ketua" id="id_wakil_ketua" class="form-control">
                            <option>--Wakil Ketua--</option>
                            <?php  
                              //Mengambil nama jabatan dalam Database
                              $wakil_ketua = mysqli_query($connect,"SELECT * from wakil_ketua order by nama_wakil_ketua ASC");
                              while ($rows = mysqli_fetch_array($wakil_ketua)) {
                                echo "<option value=\"$rows[id_wakil_ketua]\">$rows[nama_wakil_ketua]</option>\n";
                              }
                            ?>
                          </select>
                       </div>
                      
                    
                        
                          
                          <div class="form-group">
                            <label for="username">Username</label>
                            <input type="text" class="form-control" name="username" id="username" placeholder="Masukan Username Wakil Ketua">
                          </div>

                          <div class="form-group">
                            <label for="password">Password</label>
                            <input type="text" class="form-control" name="password" id="password" placeholder="Masukan Password Wakil Ketua">
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

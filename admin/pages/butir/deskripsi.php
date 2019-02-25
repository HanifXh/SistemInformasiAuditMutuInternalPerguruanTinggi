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
              <h3 class="box-title">Data Table Isian UPMI</h3>
            </div>
            <div class="row">
              <div class="col-xs-4" style="margin-left: 5px;">
                         
              </div>
              
            </div> 
            <!-- /.box-header -->
            <div class="box-body table-responsive">
              <table id="example1" class="display nowrap table-responsive table-striped"  style="width:100%">
                <thead>
                <tr>
                  <th>No</th>
                  <th>Kode Standar</th>
                  <th>Nama Standar</th>
                  <th>Butir Standar</th>
                <!--   <th>Deskriptor</th> -->
                  <th>Indikator</th>
               <!--    <th>Pengendali Dokumen</th> -->
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
                      <td> <?php echo $rows['kode_sop']?></td>
                      <td> <?php echo $rows['nama_sop'];?></td>
                      <td><textarea name="" id="" cols="45" rows="15" style="align-content:left; overflow:auto; width:200px; height:80px" readonly><?php echo $rows['isi_butir'];?></textarea></td>
                      <td><textarea name="" id="" cols="45" rows="15" style="align-content:left; overflow:auto; width:200px; height:80px" readonly><?php echo $rows['indikator']?></textarea></td>
                      <td> <?php echo $rows['tgl_butir'];?></td>
                      <td><center>
                             <div class="btn-group">
                  <button type="button" class="btn btn-danger">Action</button>
                  <button type="button" class="btn btn-danger dropdown-toggle" data-toggle="dropdown">
                    <span class="caret"></span>
                    <span class="sr-only"></span>
                  </button>
                  <ul class="dropdown-menu" role="menu">
                    <li><a href="#tambah_modal_deskriptor" data-toggle='modal' data-id="<?php echo $rows['kode_butir']; ?>">Tambah</a></li>
                    <li class="divider"></li>
                    <li><a href="#edit_modal_download_dokumen" data-toggle='modal' data-id="<?php echo $rows['kode_sop']; ?>" >Dokumen</a></li>
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
       
<div class="modal fade" id="tambah_modal_deskriptor" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Tambah Data Deskriptor</h4>
            </div>
        <form action="pages/config/simpan_deskriptor.php" method="POST" accept-charset="utf-8" enctype="multipart/form-data">
        <div class="modal-body">
            <div class="hasil-data">
              
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Keluar</button>
                <button type="submit" class="btn btn-success">Tambah</button>
            </div>
          </div>  
        </form> 
        </div>
      
    </div>
  
</div>

<div class="modal fade" id="edit_modal_download_dokumen" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Dokumen Pendukung</h4>
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

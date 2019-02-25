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
              <h3 class="box-title">Laporan Hasil Evaluasi</h3>
            </div>
            <div class="row">
              <div class="col-xs-4" style="margin-left: 5px;">
                  <!-- <button type="button" class="btn btn-success" data-toggle="modal" data-target="#modal-default">

                <i class="fa fa-plus"> </i> Tambah Data Audit

              </button>   -->
              <!--  <a class="btn btn-success" href="pages/config/export_kamera.php">Export ke Excel <i class="fa fa-file-excel-o"></i></a>               -->
              </div>
              
            </div>
            <!-- /.box-header -->
            <div class="box-body table-responsive">
              <table id="example" class="display nowrap table-responsive table-striped"  style="width:100%">
                <thead>
                <tr>
               <!--    <th>No</th> -->
                  <!-- <th>kode jadwal</th> -->
                 <!--  <th>Kode Standar Nasional</th> -->
                  <th>Standar</th>
                 <!--  <th>Kode Butir</th> -->
                  <!-- <th>Auditor</th> -->
                  <th>Elemen</th>
                  <th>Deskriptor</th>
                  <th>Indikator</th>
                  <th>Pengendali</th>
                  <th>Hasil</th>
                  <th>Persentase</th>
                  <th>Temuan</th>
                  <th>Ktgr Temuan</th>
               <!--    <th>Program Studi</th> -->
                  <th>Tahun</th>
           <!--        <th>Tanggal</th> -->
                  
                  
                  
                 
                
                </tr>
                </thead>
                <tbody>
                  <?php require '../koneksi/koneksi.php';
                    $no_urut = 0;
                    $query = mysqli_query($connect, "SELECT sop.*,adt.*,btr.*,dsk.*,evl.*,jdw.* FROM evaluasi evl INNER JOIN standar_operasional sop ON sop.kode_sop = evl.kode_sop INNER JOIN auditor adt ON adt.id_auditor = evl.id_auditor INNER JOIN butir_sop btr ON btr.kode_butir = evl.kode_butir INNER JOIN deskriptor dsk ON dsk.kode_deskripsi = evl.kode_deskripsi INNER JOIN jadwal jdw ON jdw.kode_jadwal = evl.kode_jadwal");
                    while ($rows = mysqli_fetch_array($query)) {
                      $no_urut++;
                       
             
                   
                ?>
                  <tr >
                      <!-- <td><?php echo  $no_urut;  ?></td> -->
                      <!-- <td><?php echo $rows['kode_jadwal']?></td> -->
                      <!-- <td><?php echo $rows['kode_sn']?></td> -->
                      <td><?php echo $rows['kode_sop']?></td>
                 <!--      <td><?php echo $rows['kode_butir']?></td> -->
                     <!--  <td><?php echo $rows['nama_auditor'];?></td> -->
                      <td><textarea name="" id="" cols="45" rows="15" style="align-content:left; overflow:auto; width:200px; height:80px" readonly><?php echo $rows['isi_butir'];?></textarea></td>
                      <td><textarea name="" id="" cols="45" rows="15" style="align-content:left; overflow:auto; width:200px; height:80px" readonly><?php echo $rows['deskripsi'];?></textarea></td>
                      <td><textarea name="" id="" cols="45" rows="15" style="align-content:left; overflow:auto; width:200px; height:80px" readonly><?php echo $rows['indikator'];?></textarea></td>
                      <td><textarea name="" id="" cols="45" rows="15" style="align-content:left; overflow:auto; width:200px; height:80px" readonly><?php echo $rows['pengendali_dokumen'];?></textarea></td>
                      <td><?php echo $rows['hasil']?></td>
                      <td><?php echo $rows['persentase']?>%</td>
                     <td><textarea name="" id="" cols="45" rows="15" style="align-content:left; overflow:auto; width:200px; height:80px" readonly><?php echo $rows['temuan']?></textarea></td></td>
                      <td><?php echo $rows['kategori_temuan']?></td>
                   <!--    <td><?php echo $rows['program_studi'];?></td> -->
                      <td><?php echo $rows['tahun_pengukuran']?></td>
                    <!--   <td><?php echo $rows['tanggal_audit']?></td> -->
            
                      

                    
                  </tr>
               
                   <?php } ?>
                </tbody>

           <!--  <tbody>
                  <?php require '../koneksi/koneksi.php';
                    $no_urut = 0;
                    $query = mysqli_query($connect, "SELECT evl.kode_sop
     , evl.kode_jadwal
     , evl.hasil
     , COUNT(*) as jumlah_butir_evaluasi_pada_kode_sop
     , AVG(persentase) AS rata_rata_persentase
     , SUM(IF(hasil='ada',1,0)) AS ada
     , SUM(IF(hasil='tidak',1,0)) AS tidak
     , COUNT(*) AS jumlah,sop.*,adt.*,btr.*,dsk.*,evl.*,jdw.* FROM evaluasi evl INNER JOIN standar_operasional sop ON sop.kode_sop = evl.kode_sop INNER JOIN auditor adt ON adt.id_auditor = evl.id_auditor INNER JOIN butir_sop btr ON btr.kode_butir = evl.kode_butir INNER JOIN deskriptor dsk ON dsk.kode_deskripsi = evl.kode_deskripsi INNER JOIN jadwal jdw ON jdw.kode_jadwal = evl.kode_jadwal GROUP BY
       evl.kode_sop
     , evl.kode_jadwal
     , evl.hasil
ORDER BY
       evl.kode_sop
     , evl.kode_jadwal
     , evl.hasil");
                    while ($rows = mysqli_fetch_array($query)) {
                      $no_urut++;
                       
             
                   
                ?>
                  <tr >
                  
                      <td></td>
                     
                      <td><?php echo $rows['kode_sop']?></td>
                      <td></td>
                      <td></td>
                      <td></td>
                      <td></td>
                      <td></td>
                      <td>ADA|<?php echo $rows['ada']?>|TIDAK<?php echo $rows['tidak']?></td>
                      <td><?php echo $rows['rata_rata_persentase']?>%</td>
                      <td></td>
                      <td></td>
                      <td></td>

      
            
                      

                    
                  </tr>
               
                   <?php } ?>
                </tbody> -->




                <tfoot>
                <tr>
                  
                  <th>No</th>
                  <th>Kode Standar Nasional</th>
                  <th>Kode Standar</th>
                  <th>Auditor</th>
                  <th>Elemen Standar</th>
                  <th>Deskriptor</th>
                  <th>Indikator</th>
                  <th>Pendendali Dokumen</th>
                  <th>Program Studi</th>
                  <th>Tahun</th>
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
       


<div class="modal fade" id="tambah_modal_audit" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Tambah Evauasi Standar</h4>
            </div>
        <form action="pages/config/simpan_evaluasi.php" method="POST" accept-charset="utf-8" enctype="multipart/form-data">
        <div class="modal-body">
            <div class="hasil-data">
              
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Keluar</button>
                <button type="submit" class="btn btn-success">Simpan</button>
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

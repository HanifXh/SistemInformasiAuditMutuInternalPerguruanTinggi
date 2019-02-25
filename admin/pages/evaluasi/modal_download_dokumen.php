<?php 
  require '../../../koneksi/koneksi.php';
  if ($_POST['idx']) {
    $kode_sop = $_POST['idx'];
    $query = mysqli_query($connect, "SELECT sop.*,dk.* FROM dokumen dk INNER JOIN standar_operasional sop ON sop.kode_sop = dk.kode_sop WHERE dk.kode_sop = '$kode_sop'");
    while ($rows = mysqli_fetch_array($query)) {
  // var_dump($query);
 ?>

                <table id="example1" class="display nowrap table-responsive table-striped"  style="width:100%">
                <thead>
                <tr>
                  <th>Nama Dokumen</th>
                  
                  <th>Download</th>
                </tr>
                </thead>
                <tbody>
                  <tr>
                          <td><?php echo $rows['nama_dokumen'];?> </td>
                      

                          <td><a href="pages/dokumen/<?php echo $rows["dokumen"] ?>"><?php echo $rows["dokumen"] ?></a></td>
                  </tr>
                 
                </tbody>
                <tfoot>
                <tr>
                  <th>Nama Dokumen</th>
                  
                  <th>Download</th>
                </tr>
                </tfoot>
              </table>
 <?php }} 

 ?>
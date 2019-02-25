<?php  
  
  require '../../../koneksi/koneksi.php';

  $gedung = $_GET['gedung'];

  $lokasi = mysqli_query($connect, "SELECT * FROM lokasi WHERE id_gedung ='$gedung' order by nama_lokasi asc");

  echo "<option>Pilih--<>--lokasi</option>";
  while ($k = mysqli_fetch_array($lokasi)) {

    echo "<option value=\"".$k['id_lokasi']."\">".$k['nama_lokasi']."</option>\n";
  }

?>
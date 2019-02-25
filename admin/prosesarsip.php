<?php
$simpan = $con->query("INSERT INTO jadwal (id_jadwal,tgl_khutbah,id_mubaligh,id_masjid,kd_jadwal) SELECT id_tjadwal,tgl_tkhutbah,id_tmubaligh,id_tmasjid,kd_tjadwal FROM temp_jadwal WHERE kd_tjadwal ='$_GET[kdjadwal]'");

 $delete = $con->query("DELETE FROM temp_jadwal WHERE kd_tjadwal = '$_GET[kdjadwal]'");

 ?>
<?PHP
if (isset($_POST['registrasi'])) {  
$error = array();
    if (empty($_POST['nama'])) {  
        $error[] = 'Nama lengkap tidak boleh kosong'; 
    } else {
        $nama =mysqli_real_escape_string($mysqli, $_POST['nama']);
 
    }
 
if (empty($_POST['username'])) {  
        $error[] = 'Username tidak boleh kosong'; 
    } else {
       $username =mysqli_real_escape_string($mysqli, $_POST['username']);
    }
 
 
    if (empty($_POST['password'])) {
        $error[] = 'Kata sandi tidak boleh kosong'; }
 
 if(strlen($_POST['password']) < 5 || strlen($_POST['password']) > 15){
 $error['password'] = "Masukkan Pasword minimal 5 karakter maksimal 15 karakter";
 } else {
     $password = mysqli_real_escape_string($mysqli,md5($_POST['password']));}
 
 
$email = mysqli_real_escape_string($mysqli, $_POST['email']);
if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
$error[] = 'Alamat Email yang anda masukkan salah';
} else {
$email = mysqli_real_escape_string($mysqli, $_POST['email']);
 }
 
 
 
$tgl_daftar=date("j-M-Y");
$jam_tgl_login =date("h:i:s-j-M-Y"); 
if(!empty($_SERVER['HTTP_CLIENT_IP'])){
      $ip=$_SERVER['HTTP_CLIENT_IP'];
    }
    elseif(!empty($_SERVER['HTTP_X_FORWARDED_FOR'])){
      $ip=$_SERVER['HTTP_X_FORWARDED_FOR'];
    }
    else{
      $ip=$_SERVER['REMOTE_ADDR'];
    }
 
if (empty($error)){
 
// query untuk mencari email yg sdh ada di database
$query ="SELECT * FROM admin WHERE email ='$email'";
$result = $mysqli->query($query) or die($mysqli->error.__LINE__);
if(!$result->num_rows > 0){
 
$insert="INSERT INTO admin values('','$nama', '$username', '$password', '$email', '$tgl_daftar', '$ip', '$jam_tgl_login', 'Ofline')"
or die($mysqli->error.__LINE__);
if($mysqli->query($insert) === false) { 
 
echo'<div class="alert alert-danger alert-dismissable">
<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>Maaf anda tidak bisa mendaftar karena sistem kami ada kesalahan..!</div>';
  } 
  else   {
echo'<div class="alert alert-warning alert-dismissable">
<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>Pendaftaran menjadi admin berhasil..!</div>';
 
 
 }
 }
 
 
 
else   {
echo'<div class="alert alert-danger alert-dismissable">
<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>Maaf Sebelumnya akun ini sudah terdaftar...!</div>';
 }
}
 
else {echo'<div class="alert alert-danger alert-dismissable"><ul>';
foreach ($error as $key => $values) {            
echo'<li>'.$values.'</li>';}
echo'</ul></div>';
}
unset($_POST['registrasi']);
mysqli_close($mysqli); }

?>
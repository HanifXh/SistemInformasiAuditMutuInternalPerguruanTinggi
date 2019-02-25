<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Registration Admin</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="abower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="bower_components/Ionicons/css/ionicons.min.css">
  <link rel="stylesheet" href="bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/AdminLTE.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="plugins/iCheck/square/blue.css">
<link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">
  <script type="text/javascript" src="assets/js/jquery.min.js"></script>
  <link rel="stylesheet" type="text/css" href="assets/sweetalert/sweetalert.css">
<script type="text/javascript" src="assets/sweetalert/sweetalert.min.js"></script>  


  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition register-page">
<div class="register-box">
  <div class="register-logo">
    Corpu Informasi
  </div>

  <div class="register-box-body">
    <p class="login-box-msg">Register a new Admin</p>

    <form action="../koneksi/simpan.php" method="post" enctype="multipart/form-data">
      <div class="form-group has-feedback">
        <span class="glyphicon glyphicon-user form-control-feedback"></span>
        <input type="text" class="required form-control" id="nama" placeholder="Full name" name="nama">
        <i class="form-control-feedback"></i>
        <span class="text-warning"></span>
      </div>

      <div class="form-group has-feedback">
        <span class="glyphicon glyphicon-user form-control-feedback "></span>
        <input type="text" class="required form-control" id="username" placeholder="Username" name="username">
         <i class="form-control-feedback"></i>
        <span class="text-warning"></span>
      </div>

      <div class="form-group has-feedback">
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
        <input type="password" class="required form-control" id="password" placeholder="Password" name="password">
        <i class="form-control-feedback"></i>
        <span class="text-warning"></span>
      </div>            
      
      <div class="form-group has-feedback">
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
        <input type="password" class="required form-control" id="conf_password" placeholder="Retype password">
        <i class="form-control-feedback"></i>
        <span class="text-warning"></span>
      </div>      

      <div class="form-group has-feedback">
        <span class="glyphicon glyphicon-envelope form-control-feedback "></span>
        <input type="email" class="required form-control" id="email" placeholder="Email" name="email">
        <i class="form-control-feedback"></i>
        <span class="text-warning"></span>
      </div>

      <div class="form-group has-feedback">
        <select name="jenkel" id="jenkel" class="required form-control">
          <option value="">Jenis Kelamin</option>
          <option value="Laki - Laki" class="fa fa-mars"> Laki - Laki</option>
          <option value="Perempuan" class="fa fa-venus"> Perempuan</option>
        </select>
       <span class="fa fa-genderless form-control-feedback"></span>
      </div> 

      <!-- <div class="form-group">
        <input type="text" name="tgl_lahir" id="datepicker" class="tanggal form-control" required="" placeholder="Tanggal Lahir" />
        <!-- <span class="fa fa-calendar form-control-feedback"></span> -->
        <!-- </div>    
       -->
      <div class="form-group">
                  <label>Profile Picture</label>
                  <input type="file" name="foto" class="form-control btn btn-success" >

        </div>      

     <!--  <div class="form-group">
        <label class="control-label">File upload with different text</label>
        <input type="file" class="filestyle" data-buttonText="Select a File">
    </div>
 -->
      <div class="row">
        <div class="col-xs-8">
          <div class="checkbox icheck">
            <label>
              <input type="checkbox"> I agree to the <a href="#">terms</a>
            </label>
          </div>
        </div>
        <!-- /.col -->
        <div class="col-xs-4">
          <button type="submit" name="btn_simpan" class="btn btn-primary btn-block btn-flat">Register</button>
        </div>
        <!-- /.col -->
      </div>
    </form>

  </div>
  <!-- /.form-box -->
</div>
<!-- /.register-box -->

<script src="bower_components/bootstrap-daterangepicker/daterangepicker.js"></script>
<!-- bootstrap datepicker -->
<script src="bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
<!-- jQuery 3 -->
<script src="bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- iCheck -->
<script src="plugins/iCheck/icheck.min.js"></script>

<!-- jQuery -->
    <script src="bower_components/jquery/jquery.min.js"></script>
 <!--Date Picke -->
 <script src="bower_components/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
<script>

 $('#datepicker').datepicker({
      autoclose: true
    })  
</script>
 <!-- Date Picker -->
   <script type="text/javascript">
            $(document).ready(function () {
                $('.tgl_lahir').datepicker({
                    format: "Y-m-d",
                    autoclose:true
                });
            });
        </script>
<script>
  $(function () {
    $('input').iCheck({
      checkboxClass: 'icheckbox_square-blue',
      radioClass: 'iradio_square-blue',
      increaseArea: '20%' /* optional */
    });
  });
</script>
<script type="text/javascript">
  $(document).ready(function(){
    //semua element dengan class text-warning akan di sembunyikan saat load
    $('.text-warning').hide();
    //untuk mengecek bahwa semua textbox tidak boleh kosong
    $('input').each(function(){ 
      $(this).blur(function(){ //blur function itu dijalankan saat element kehilangan fokus
        if (! $(this).val()){ //this mengacu pada text box yang sedang fokus
          return get_error_text(this); //function get_error_text ada di bawah
        } else {
          $(this).removeClass('no-valid'); 
          $(this).parent().find('.text-warning').hide();//cari element dengan class has-warning dari element induk text yang sedang focus
          $(this).closest('div').removeClass('has-warning');
          $(this).closest('div').addClass('has-success');
          $(this).parent().find('.form-control-feedback').removeClass('glyphicon glyphicon-warning-sign');
          $(this).parent().find('.form-control-feedback').addClass('glyphicon glyphicon-ok');
        }
      });
    });
    //mengecek textbox Nama Valid Atau Tidak
    $('#nama').blur(function(){
      var nama= $(this).val();
      var len= nama.length;
      if(len>0){ //jika ada isinya
        if(!valid_nama(nama)){ //jika nama tidak valid
          $(this).parent().find('.text-warning').text("");
          $(this).parent().find('.text-warning').text("Nama Tidak Valid");
          return apply_feedback_error(this);
        } else {
          if (len>30){ //jika karakter >30
            $(this).parent().find('.text-warning').text("");
            $(this).parent().find('.text-warning').text("Maximal Karakter 30");
            return apply_feedback_error(this);
          }
        }
      } 
    });

//mengecek text box username
    $('#username').blur(function(){
      var username= $(this).val();
      var len= username.length;
      if(len>0){ 
        if(!valid_username(username)){ 
          $(this).parent().find('.text-warning').text("");
          $(this).parent().find('.text-warning').text("Username Tidak Valid (ex: telkom or telkom_corpu)");
          return apply_feedback_error(this);
        } else {
          if (len>32){ 
            $(this).parent().find('.text-warning').text("");
            $(this).parent().find('.text-warning').text("Maximal Karakter 32");
            return apply_feedback_error(this);
          } else {
            var valid = false;
            $.ajax({
                                       url: "cek_username.php",
                                       type: "POST",
                                       data: "username="+username,
                                       dataType: "text",
                                       success: function(data){
                                               if (data==0){ //pada file check email.php, apabila email sudah ada di database makan akan mengembalikan nilai 0
                                         $('#username').parent().find('.text-warning').text("");
                   $('#username').parent().find('.text-warning').text("Username sudah ada");
                   return apply_feedback_error('#username');
                                               }
                                                 }
              });
            }
        }
      } 
    });    

    //Mengecek textbox tanggal lahir
    $('#tgl_lahir').blur(function(){
      var tgl= $(this).val();
      var len= tgl.length;
      if(len>0){
        if(!valid_tanggal(tgl)){
          $(this).parent().find('.text-warning').text("");
          $(this).parent().find('.text-warning').text("Format Tanggal yang diperbolehkan mm-dd-yyy, mm/dd/yyyy atau dd/mm/yyyy, dd-mm-yyyy");
          return apply_feedback_error(this);
        }
      }
    });
    //mengecek text box email
    $('#email').blur(function(){
      var email= $(this).val();
      var len= email.length;
      if(len>0){ 
        if(!valid_email(email)){ 
          $(this).parent().find('.text-warning').text("");
          $(this).parent().find('.text-warning').text("E-mail Tidak Valid (ex: aaaa@yahoo.co.id)");
          return apply_feedback_error(this);
        } else {
          if (len>60){ 
            $(this).parent().find('.text-warning').text("");
            $(this).parent().find('.text-warning').text("Maximal Karakter 60");
            return apply_feedback_error(this);
          } else {
            var valid = false;
            $.ajax({
                                       url: "checkemail.php",
                                       type: "POST",
                                       data: "email="+email,
                                       dataType: "text",
                                       success: function(data){
                                               if (data==0){ //pada file check email.php, apabila email sudah ada di database makan akan mengembalikan nilai 0
                                         $('#email').parent().find('.text-warning').text("");
                   $('#email').parent().find('.text-warning').text("email sudah ada");
                   return apply_feedback_error('#email');
                                               }
                                                 }
              });
            }
        }
      } 
    });
    //mengecek password
    $('#password').blur(function(){
      var password=$(this).val();
      var len=password.length;
      if (len>0 && len<8) {
        $(this).parent().find('.text-warning').text("");
        $(this).parent().find('.text-warning').text("password minimal 8 karakter");
        return apply_feedback_error(this);
      } else {
        if(len>35) {
          $(this).parent().find('.text-warning').text("");
          $(this).parent().find('.text-warning').text("password maximal 35 karakter");
          return apply_feedback_error(this);
        }
      }
    });
    //mengecek konfirmasi password
    $('#conf_password').blur(function(){
      var pass = $("#password").val();
      var conf=$(this).val();
      var len=conf.length;
      if (len>0 && pass!==conf) {
        $(this).parent().find('.text-warning').text("");
        $(this).parent().find('.text-warning').text("Konfirmasi Password tidak sama dengan password");
        return apply_feedback_error(this);
      }
    });

  
    //submit form validasi
    $('#formInput').submit(function(e){
      e.preventDefault();
      var valid=true;   
      $(this).find('.textbox').each(function(){
        if (! $(this).val()){
          get_error_text(this);
          valid = false;
          $('html,body').animate({scrollTop: 0},"slow");
        } 
        if ($(this).hasClass('no-valid')){
          valid = false;
          $('html,body').animate({scrollTop: 0},"slow");
        }
      });
      if (valid){
        swal({
                            title: "Konfirmasi Simpan Data",
                            text: "Data Akan di Simpan Ke Database",
                            type: "info",
                            showCancelButton: true,
                            confirmButtonColor: "#1da1f2",
                            confirmButtonText: "Yakin, dong!",
                            closeOnConfirm: false,
                            showLoaderOnConfirm: true,
                  }, function () { //apabila sweet alert d confirm maka akan mengirim data ke simpan.php melalui proses ajax
                    $.ajax({
                        url: "simpan.php",
                        type: "POST",
                        data: $('#formInput').serialize(), //serialize() untuk mengambil semua data di dalam form
                        dataType: "html",
                        success: function(){                
                              setTimeout(function(){
                                swal({
                                  title:"Data Berhasil Disimpan",
                                  text: "Terimakasih",
                                  type: "success"
                                }, function(){
                                  window.location="tampil.php";
                                });
                              }, 2000);
                            },
                        error: function (xhr, ajaxOptions, thrownError) {
                            setTimeout(function(){
                                swal("Error", "Tolong Cek Koneksi Lalu Ulangi", "error");
                              }, 2000);}
        });
              });
        }
    });
  });

  //fungsi cek nama
  function valid_nama(nama) {
    var pola= new RegExp(/^[a-z A-Z]+$/);
    return pola.test(nama);
  }
  //fungsi cek tanggal lahir
  function valid_tanggal(tanggal){
    var pola= new RegExp(/\b\d{1,2}[\/-]\d{1,2}[\/-]\d{4}\b/);
    return pola.test(tanggal);
  }
  //fungsi cek email
  function valid_email(email){
    var pola= new RegExp(/^[\w-]+(\.[\w-]+)*@([\w-]+\.)+[a-zA-Z]+$/);
    return pola.test(email);
  }
  //fungsi cek phone 
  function valid_hp(hp){
    var pola = new RegExp(/^[0-9-+]+$/);
    return pola.test(hp);
  }
  //menerapkan gaya validasi form bootstrap saat terjadi eror
  function apply_feedback_error(textbox){
    $(textbox).addClass('no-valid'); //menambah class no valid
    $(textbox).parent().find('.text-warning').show();
    $(textbox).closest('div').removeClass('has-success');
    $(textbox).closest('div').addClass('has-warning');
    $(textbox).parent().find('.form-control-feedback').removeClass('glyphicon glyphicon-ok');
    $(textbox).parent().find('.form-control-feedback').addClass('glyphicon glyphicon-warning-sign');
  }

  //untuk mendapat eror teks saat textbox kosong, digunakan saat submit form dan blur fungsi
  function get_error_text(textbox){
    $(textbox).parent().find('.text-warning').text("");
    $(textbox).parent().find('.text-warning').text("Text Box Ini Tidak Boleh Kosong");
    return apply_feedback_error(textbox);
  }
</script>
</body>
</html>


<?php
include "../koneksi/koneksi.php";
session_start();
if (!isset($_SESSION['username'])){
header ("location:login_wakil_ketua.php");
}
?>
<!DOCTYPE html>
<html>
<?php



    $username_session = $_SESSION['username'];


    $query = mysqli_query($connect, "SELECT lwk.*,wkt.* FROM login_wakil_ketua lwk INNER JOIN wakil_ketua wkt ON wkt.id_wakil_ketua=lwk.id_wakil_ketua WHERE username='$username_session'");

    while ($rows = mysqli_fetch_array($query)) {
    
 ?>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">  
  <title>AMI-Wakil Ketua</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="bower_components/Ionicons/css/ionicons.min.css">
<!-- DataTables -->
  <link rel="stylesheet" href="bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css"> 
  <link rel="stylesheet" href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css">
  <link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.5.1/css/buttons.dataTables.min.css"> 
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="dist/css/skins/_all-skins.css">
  <!-- Morris chart -->
  <link rel="stylesheet" href="bower_components/morris.js/morris.css">
  <!-- jvectormap -->
  <link rel="stylesheet" href="bower_components/jvectormap/jquery-jvectormap.css">
  <!-- Date Picker -->
  <link rel="stylesheet" href="bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="bower_components/bootstrap-daterangepicker/daterangepicker.css">
  <!-- bootstrap wysihtml5 - text editor -->
  <link rel="stylesheet" href="plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
    <link rel="shortcut icon" href="../images/stmik bandung.png">

  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
    <style>
    .example-modal .modal {
      position: relative;
      top: auto;
      bottom: auto;
      right: auto;
      left: auto;
      display: block;
      z-index: 1;
    }

    .example-modal .modal {
      background: transparent !important;
    }
  </style>
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

  <header class="main-header">
    <!-- Logo -->
    <a href="index2.php" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>AMI</b></span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>Audit Mutu Internal</b></span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>

      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">   
         
          <!-- User Account: style can be found in dropdown.less -->
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <img src="../admin/pages/foto/wakil ketua/<?php echo $rows['foto_wakil_ketua']; ?>" class="user-image" alt="User Image">
              <span class="hidden-xs"><?php echo $rows['nama_wakil_ketua']; ?></span>
            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header">
                <img src="../admin/pages/foto/wakil ketua/<?php echo $rows['foto_wakil_ketua']; ?>" class="img-circle" alt="User Image">

                <p>
                  <?php echo $rows['nama_wakil_ketua']; ?>
                  <small> Wakil Ketua </small>
                </p>
              </li>

              <!-- Menu Footer-->
              <li class="user-footer">
                <div class="pull-left">
                  <a href="#" class="btn btn-default btn-flat">Profile</a>
                </div>
                <div class="pull-right">
                  <a href="../koneksi/logout_wakil_ketua.php" class="btn btn-default btn-flat">Sign out</a>
                </div>
              </li>
            </ul>
          </li>
          <!-- Control Sidebar Toggle Button -->
          <!-- <li>
            <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
          </li> -->
        </ul>
      </div>
    </nav>
  </header>
  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="../admin/pages/foto/wakil ketua/<?php echo $rows['foto_wakil_ketua']; ?>" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p><?php echo $rows['nama_wakil_ketua']; ?></p>
        </div>
      </div>
      <!-- search form -->
  <!--     <form action="#" method="get" class="sidebar-form">
        <div class="input-group">
          <input type="text" name="q" class="form-control" placeholder="Search...">
          <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
        </div>
      </form> -->
      <!-- /.search form -->
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">NAVIGASI</li>
        <li class="active treeview">
          <a href="index.php">
            <i class="fa fa-dashboard"></i> <span>Dashboard</span>
            <span class="pull-right-container">
              <!-- <i class="fa fa-angle-left pull-right"></i> -->
            </span>
          </a>
        </li>

   


        <li class="treeview">
          <a href="#">
            <i class="glyphicon glyphicon-education"></i>
            <span>Wakil Ketua</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="index2.php?page=jabatan"><i class="glyphicon glyphicon-user"></i> Jabatan</a></li>
            <li><a href="index2.php?page=penanggung_jawab"><i class="glyphicon glyphicon-user"></i> Penanggung jawab</a></li>
            <li><a href="index2.php?page=job_desk"><i class="glyphicon glyphicon-list"></i>Deskripsi Pekerjaan</a></li>
          </ul>
        </li>


        <li class="treeview">
          <a href="#">
            <i class="glyphicon glyphicon-pushpin"></i>
            <span>Master Data Staf</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="index2.php?page=staf"><i class="glyphicon glyphicon-user"></i> Staf</a></li>
            <li><a href="index2.php?page=olah_akun_staf"><i class="glyphicon glyphicon-user"></i>Akun Staf</a></li>
          </ul>
          
        </li>

        <li class="treeview">
          <a href="#">
            <i class="glyphicon glyphicon-briefcase"></i>
            <span>Unit Kerja</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="index2.php?page=unit_kerja"><i class="glyphicon glyphicon-briefcase"></i>Unit Kerja</a></li>
       
          </ul>
        </li>     

   
    </section>
   </aside>
<div class="content-wrapper">
      <?php 
  if(isset($_GET['page'])){
    $page = $_GET['page'];
 
    switch ($page) {
      case 'home':
        include "pages/home2.php";
        break;
      case 'jabatan':
        include "pages/user/jabatan.php";
        break;
      case 'penanggung_jawab':
        include "pages/user/penanggung_jawab.php";
        break;
      case 'job_desk':
        include "pages/job/job_desk.php";
        break;
      case 'staf':
        include "pages/staf/staf.php";
        break;
      case 'unit_kerja':
        include "pages/unit/unit_kerja.php";
        break;
      case 'standar_nasional':
        include "pages/standar/standar_nasional.php";
        break;
      case 'standar_operasional':
        include "pages/standar/standar_operasional.php";
        break;
      case 'butir_sop':
        include "pages/butir/butir_sop.php";
        break;
      case 'dokumen':
        include "pages/dokumen pendukung/dokumen.php";
        break;
      case 'data_auditor':
        include "pages/staf/data_auditor.php";
        break;
      case 'data_wakil_ketua':
        include "pages/staf/data_wakil_ketua.php";
        break;
      case 'tambah_deskripsi':
        include "pages/butir/deskripsi.php";
        break;
      case 'deskripsi':
        include "pages/butir/data_deskripsi.php";
        break;
      case 'jadwal':
        include "pages/jadwal/jadwal.php";
        break;
      case 'audit':
        include "pages/evaluasi/audit.php";
        break;
      case 'akun_wakilketua':
        include "pages/akun/akun_wakilketua.php";
        break;
      case 'akun_auditor':
        include "pages/akun/akun_auditor.php";
        break;
      case 'olah_akun_staf':
        include "pages/akun/akun_staf.php";
        break;










      case 'gedung':
        include "pages/ruangan/gedung.php";
        break;
      case 'lokasi':
        include "pages/ruangan/lokasi.php";
        break;
      case 'kamera':
        include "pages/informasi/data_kamera.php";
        break;
        case 'pnpkamera':
        include "pages/informasi/penempatan_kamera.php";
        break;
      case 'ipkamera':
        include "pages/informasi/ip_kamera.php";
        break;
      case 'minipc':
        include "pages/informasi/minipc.php";
        break;
        case 'infominipc':
        include "pages/informasi/info_minipc.php";
        break;
      // case 'arsip':
      //   include "pages/informasi/arsip.php";
      //   break;
        case 'laporan_ipkamera':
        include "pages/informasi/laporan_kamera.php";
        break;
        case 'log_kamera':
        include "pages/informasi/log.php";
        break;
        case 'admin':
        include "pages/informasi/admin.php";
        break;
        case 'laporan_log_kamera':
        include "pages/informasi/laporan_log_kamera.php";
        break;
        case 'laporan_log':
        include "pages/informasi/laporan_log.php";
        break;
      // case 'peserta':
      //   include "pages/peserta/peserta.php";
      //   break;
      // case 'berita':
      //   include "pages/runningtext/berita.php";
      //   break;
      // case 'training':
      //   include "pages/training/training.php";
      //   break;              
      default:
        echo "<center><h3>Maaf. Halaman tidak di temukan !</h3></center>";
        break;
    }
  
  }else{
    include "pages/home2.php";
  }
 


   ?>
    </div>
 <footer class="main-footer">
    <div class="pull-right hidden-xs">

    </div>
 
  </footer>

  <!-- Control Sidebar -->
  
  <!-- /.control-sidebar -->
  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
  <!--  <div class="control-sidebar-bg"></div> -->
</div>
<!-- ./wrapper -->

<!-- jQuery 3 -->
<script src="bower_components/jquery/dist/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="bower_components/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button);
</script>
<!-- Bootstrap 3.3.7 -->
<script src="bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- Morris.js charts -->
<script src="bower_components/raphael/raphael.min.js"></script>
<script src="bower_components/morris.js/morris.min.js"></script>
<!-- Sparkline -->
<script src="bower_components/jquery-sparkline/dist/jquery.sparkline.min.js"></script>
<!-- jvectormap -->
<script src="plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
<script src="plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
<!-- jQuery Knob Chart -->
<script src="bower_components/jquery-knob/dist/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="bower_components/moment/min/moment.min.js"></script>
<script src="bower_components/bootstrap-daterangepicker/daterangepicker.js"></script>

<!-- DataTables -->
<script src="bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>



<!-- datepicker -->
<script src="bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
<!-- Bootstrap WYSIHTML5 -->
<script src="plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
<!-- Slimscroll -->
<script src="bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="bower_components/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="dist/js/pages/dashboard.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>
<?php require_once '../assets/js/js-datatable.php';?>

<script> 
  $(document).ready(function() {
    $('#example1').DataTable( {


        initComplete: function () {
            this.api().columns([ 1, 2, 3, 4, 5, 6, 7, 8, 9, 10 ]).every( function () {
                var column = this;
                var select = $('<select><option value=""></option></select>')
                    .appendTo( $(column.footer()).empty() )
                    .on( 'change', function () {
                        var val = $.fn.dataTable.util.escapeRegex(
                            $(this).val()
                        );
 
                        column
                            .search( val ? '^'+val+'$' : '', true,true,true,true,true,true, )
                            .draw();
                    } );
 
                column.data().unique().sort().each( function ( d, j ) {
                    select.append( '<option value="'+d+'">'+d+'</option>' )
                } );
            } );
        }
    } );
} );
</script>
<script>
 
  $(document).ready(function() {
    $('#example').DataTable( {

      
        dom: 'Bfrtip',
        buttons: [
            'copy', 'csv', 'excel', 'pdf', 'print'
        ]
    } );
} );
</script>



<script>
  $(function () {
    $('#example').DataTable()
    $('#example1').DataTable()
    $('#example2').DataTable({
      'paging'      : true,
      'lengthChange': true,
      'searching'   : true,
      'ordering'    : true,
      'info'        : true,
      'autoWidth'   : true
    })
  })
</script>
<!-- <script>
$(document).ready(function()
{
    $("button").click(function()
    {
        //Say - $('p').get(0).id - this delete item id
        $("#delete_item_id").val( $('p').get(0).id );
        $('#delete_confirmation_modal').modal('show');
    });
});
</script> -->

<!-- MULAI HAPUS -->

<script>
  $(document).ready(function() {
        $('#konfirmasi_hapus_jabatan').on('show.bs.modal', function(e) {
            $(this).find('.btn-ok').attr('href', $(e.relatedTarget).data('href'));
        });
    });
</script>

<script>
  $(document).ready(function() {
        $('#konfirmasi_hapus_akun_staf').on('show.bs.modal', function(e) {
            $(this).find('.btn-ok').attr('href', $(e.relatedTarget).data('href'));
        });
    });
</script>

<script>
  $(document).ready(function() {
        $('#konfirmasi_hapus_pnjwb').on('show.bs.modal', function(e) {
            $(this).find('.btn-ok').attr('href', $(e.relatedTarget).data('href'));
        });
    });
</script>

<script>
  $(document).ready(function() {
        $('#konfirmasi_hapus_staf').on('show.bs.modal', function(e) {
            $(this).find('.btn-ok').attr('href', $(e.relatedTarget).data('href'));
        });
    });
</script>

<script>
  $(document).ready(function() {
        $('#konfirmasi_hapus_standar_nasional').on('show.bs.modal', function(e) {
            $(this).find('.btn-ok').attr('href', $(e.relatedTarget).data('href'));
        });
    });
</script>

<script>
  $(document).ready(function() {
        $('#konfirmasi_hapus_standar_sop').on('show.bs.modal', function(e) {
            $(this).find('.btn-ok').attr('href', $(e.relatedTarget).data('href'));
        });
    });
</script>

<script>
  $(document).ready(function() {
        $('#konfirmasi_hapus_butir').on('show.bs.modal', function(e) {
            $(this).find('.btn-ok').attr('href', $(e.relatedTarget).data('href'));
        });
    });
</script>

<script>
  $(document).ready(function() {
        $('#konfirmasi_hapus_dokumen').on('show.bs.modal', function(e) {
            $(this).find('.btn-ok').attr('href', $(e.relatedTarget).data('href'));
        });
    });
</script>

<script>
  $(document).ready(function() {
        $('#konfirmasi_hapus_auditor').on('show.bs.modal', function(e) {
            $(this).find('.btn-ok').attr('href', $(e.relatedTarget).data('href'));
        });
    });
</script>

<script>
  $(document).ready(function() {
        $('#konfirmasi_hapus_wakil_ketua').on('show.bs.modal', function(e) {
            $(this).find('.btn-ok').attr('href', $(e.relatedTarget).data('href'));
        });
    });
</script>

<script>
  $(document).ready(function() {
        $('#konfirmasi_hapus_unit_kerja').on('show.bs.modal', function(e) {
            $(this).find('.btn-ok').attr('href', $(e.relatedTarget).data('href'));
        });
    });
</script>

<script>
  $(document).ready(function() {
        $('#konfirmasi_hapus_jobdesk').on('show.bs.modal', function(e) {
            $(this).find('.btn-ok').attr('href', $(e.relatedTarget).data('href'));
        });
    });
</script>

<script>
  $(document).ready(function() {
        $('#konfirmasi_hapus_gedung').on('show.bs.modal', function(e) {
            $(this).find('.btn-ok').attr('href', $(e.relatedTarget).data('href'));
        });
    });
</script>

<script>
  $(document).ready(function() {
        $('#konfirmasi_hapus_lokasi').on('show.bs.modal', function(e) {
            $(this).find('.btn-ok').attr('href', $(e.relatedTarget).data('href'));
        });
    });
</script>

<script>
  $(document).ready(function() {
        $('#konfirmasi_hapus_peserta').on('show.bs.modal', function(e) {
            $(this).find('.btn-ok').attr('href', $(e.relatedTarget).data('href'));
        });
    });
</script>

<script>
  $(document).ready(function() {
        $('#konfirmasi_hapus_kamera').on('show.bs.modal', function(e) {
            $(this).find('.btn-ok').attr('href', $(e.relatedTarget).data('href'));
        });
    });
</script>

<script>
  $(document).ready(function() {
        $('#konfirmasi_hapus_minipc').on('show.bs.modal', function(e) {
            $(this).find('.btn-ok').attr('href', $(e.relatedTarget).data('href'));
        });
    });
</script>

<script>
  $(document).ready(function() {
        $('#konfirmasi_hapus_pnp_kamera').on('show.bs.modal', function(e) {
            $(this).find('.btn-ok').attr('href', $(e.relatedTarget).data('href'));
        });
    });
</script>

<script>
  $(document).ready(function() {
        $('#konfirmasi_hapus_training').on('show.bs.modal', function(e) {
            $(this).find('.btn-ok').attr('href', $(e.relatedTarget).data('href'));
        });
    });
</script>

<script>
  $(document).ready(function() {
        $('#konfirmasi_hapus_admin').on('show.bs.modal', function(e) {
            $(this).find('.btn-ok').attr('href', $(e.relatedTarget).data('href'));
        });
    });
</script>

<!-- EDNING HAPUS -->

<!-- ------------------------------------------------------------------- -->

<!-- MULAI EDIT -->

<script>
  $(document).ready(function(){
    $('#edit_modal_akun_staf').on('show.bs.modal', function(e){
      var idx = $(e.relatedTarget).data('id')
      //menggunakan fungsi ajax untuk mengambil data
    $.ajax({
      type :'post',
      url  : 'pages/akun/edit_akun_staf.php',
      data : 'idx='+ idx,
      success : function(data){
        $('.hasil-data').html(data); //menampilkan data ke dalam modal
      console.log(idx);
      }
    })
    })
  });
</script>


<script>
  $(document).ready(function(){
    $('#edit_modal_jabatan').on('show.bs.modal', function(e){
      var idx = $(e.relatedTarget).data('id')
      //menggunakan fungsi ajax untuk mengambil data
    $.ajax({
      type :'post',
      url  : 'pages/user/edit_jabatan.php',
      data : 'idx='+ idx,
      success : function(data){
        $('.hasil-data').html(data); //menampilkan data ke dalam modal
      console.log(idx);
      }
    })
    })
  });
</script>

<script>
  $(document).ready(function(){
    $('#edit_pnjwb').on('show.bs.modal', function(e){
      var idx = $(e.relatedTarget).data('id')
      //menggunakan fungsi ajax untuk mengambil data
    $.ajax({
      type :'post',
      url  : 'pages/user/edit_penanggung_jawab.php',
      data : 'idx='+ idx,
      success : function(data){
        $('.hasil-data').html(data); //menampilkan data ke dalam modal
      console.log(idx);
      }
    })
    })
  });
</script>


<script>
  $(document).ready(function(){
    $('#edit_modal_jobdesk').on('show.bs.modal', function(e){
      var idx = $(e.relatedTarget).data('id')
      //menggunakan fungsi ajax untuk mengambil data
    $.ajax({
      type :'post',
      url  : 'pages/job/edit_jobdesk.php',
      data : 'idx='+ idx,
      success : function(data){
        $('.hasil-data').html(data); //menampilkan data ke dalam modal
      console.log(idx);
      }
    })
    })
  });
</script>


<script>
  $(document).ready(function(){
    $('#edit_modal_staf').on('show.bs.modal', function(e){
      var idx = $(e.relatedTarget).data('id')
      //menggunakan fungsi ajax untuk mengambil data
    $.ajax({
      type :'post',
      url  : 'pages/staf/edit_staf.php',
      data : 'idx='+ idx,
      success : function(data){
        $('.hasil-data').html(data); //menampilkan data ke dalam modal
      console.log(idx);
      }
    })
    })
  });
</script>

<script>
  $(document).ready(function(){
    $('#edit_modal_standar_nasional').on('show.bs.modal', function(e){
      var idx = $(e.relatedTarget).data('id')
      //menggunakan fungsi ajax untuk mengambil data
    $.ajax({
      type :'post',
      url  : 'pages/standar/edit_modal_standar_nasional.php',
      data : 'idx='+ idx,
      success : function(data){
        $('.hasil-data').html(data); //menampilkan data ke dalam modal
      console.log(idx);
      }
    })
    })
  });
</script>

<script>
  $(document).ready(function(){
    $('#edit_modal_standar_sop').on('show.bs.modal', function(e){
      var idx = $(e.relatedTarget).data('id')
      //menggunakan fungsi ajax untuk mengambil data
    $.ajax({
      type :'post',
      url  : 'pages/standar/edit_modal_sop.php',
      data : 'idx='+ idx,
      success : function(data){
        $('.hasil-data').html(data); //menampilkan data ke dalam modal
      console.log(idx);
      }
    })
    })
  });
</script>

<script>
  $(document).ready(function(){
    $('#edit_modal_butir').on('show.bs.modal', function(e){
      var idx = $(e.relatedTarget).data('id')
      //menggunakan fungsi ajax untuk mengambil data
    $.ajax({
      type :'post',
      url  : 'pages/butir/edit_modal_butir.php',
      data : 'idx='+ idx,
      success : function(data){
        $('.hasil-data').html(data); //menampilkan data ke dalam modal
      console.log(idx);
      }
    })
    })
  });
</script>

<script>
  $(document).ready(function(){
    $('#edit_modal_dokumen').on('show.bs.modal', function(e){
      var idx = $(e.relatedTarget).data('id')
      //menggunakan fungsi ajax untuk mengambil data
    $.ajax({
      type :'post',
      url  : 'pages/dokumen pendukung/edit_modal_dokumen.php',
      data : 'idx='+ idx,
      success : function(data){
        $('.hasil-data').html(data); //menampilkan data ke dalam modal
      console.log(idx);
      }
    })
    })
  });
</script>

<script>
  $(document).ready(function(){
    $('#edit_modal_auditor').on('show.bs.modal', function(e){
      var idx = $(e.relatedTarget).data('id')
      //menggunakan fungsi ajax untuk mengambil data
    $.ajax({
      type :'post',
      url  : 'pages/staf/edit_modal_auditor.php',
      data : 'idx='+ idx,
      success : function(data){
        $('.hasil-data').html(data); //menampilkan data ke dalam modal
      console.log(idx);
      }
    })
    })
  });
</script>

<script>
  $(document).ready(function(){
    $('#edit_modal_wakil_ketua').on('show.bs.modal', function(e){
      var idx = $(e.relatedTarget).data('id')
      //menggunakan fungsi ajax untuk mengambil data
    $.ajax({
      type :'post',
      url  : 'pages/staf/edit_modal_wakil_ketua.php',
      data : 'idx='+ idx,
      success : function(data){
        $('.hasil-data').html(data); //menampilkan data ke dalam modal
      console.log(idx);
      }
    })
    })
  });
</script>


<script>
  $(document).ready(function(){
    $('#tambah_modal_deskriptor').on('show.bs.modal', function(e){
      var idx = $(e.relatedTarget).data('id')
      //menggunakan fungsi ajax untuk mengambil data
    $.ajax({
      type :'post',
      url  : 'pages/butir/tambah_modal_deskriptor.php',
      data : 'idx='+ idx,
      success : function(data){
        $('.hasil-data').html(data); //menampilkan data ke dalam modal
      console.log(idx);
      }
    })
    })
  });
</script>

<script>
  $(document).ready(function(){
    $('#tambah_modal_audit').on('show.bs.modal', function(e){
      var idx = $(e.relatedTarget).data('id')
      //menggunakan fungsi ajax untuk mengambil data
    $.ajax({
      type :'post',
      url  : 'pages/evaluasi/tambah_modal_audit.php',
      data : 'idx='+ idx,
      success : function(data){
        $('.hasil-data').html(data); //menampilkan data ke dalam modal
      console.log(idx);
      }
    })
    })
  });
</script>


<script>
  $(document).ready(function(){
    $('#edit_modal_unit_kerja').on('show.bs.modal', function(e){
      var idx = $(e.relatedTarget).data('id')
      //menggunakan fungsi ajax untuk mengambil data
    $.ajax({
      type :'post',
      url  : 'pages/unit/edit_modal_unit_kerja.php',
      data : 'idx='+ idx,
      success : function(data){
        $('.hasil-data').html(data); //menampilkan data ke dalam modal
      console.log(idx);
      }
    })
    })
  });
</script>




<script>
  $(document).ready(function(){
    $('#edit_modal_gedung').on('show.bs.modal', function(e){
      var idx = $(e.relatedTarget).data('id')
      //menggunakan fungsi ajax untuk mengambil data
    $.ajax({
      type :'post',
      url  : 'pages/ruangan/detail_gedung.php',
      data : 'idx='+ idx,
      success : function(data){
        $('.hasil-data').html(data); //menampilkan data ke dalam modal
      console.log(idx);
      }
    })
    })
  });
</script>

<script>
  $(document).ready(function(){
    $('#edit_modal_peserta').on('show.bs.modal', function(e){
      var idx = $(e.relatedTarget).data('id')
      //menggunakan fungsi ajax untuk mengambil data
    $.ajax({
      type :'post',
      url  : 'pages/peserta/detail_peserta.php',
      data : 'idx='+ idx,
      success : function(data){
        $('.hasil-data').html(data); //menampilkan data ke dalam modal
      console.log(idx);
      }
    })
    })
  });
</script>

<script>
  $(document).ready(function(){
    $('#edit_modal_lokasi').on('show.bs.modal', function(e){
      var idx = $(e.relatedTarget).data('id')
      //menggunakan fungsi ajax untuk mengambil data
    $.ajax({
      type :'post',
      url  : 'pages/ruangan/detail_lokasi.php',
      data : 'idx='+ idx,
      success : function(data){
        $('.hasil-data').html(data); //menampilkan data ke dalam modal
      console.log(idx);
      }
    })
    })
  });
</script>

<script>
  $(document).ready(function(){
    $('#edit_modal_kamera').on('show.bs.modal', function(e){
      var idx = $(e.relatedTarget).data('id')
      //menggunakan fungsi ajax untuk mengambil data
    $.ajax({
      type :'post',
      url  : 'pages/informasi/detail_kamera.php',
      data : 'idx='+ idx,
      success : function(data){
        $('.hasil-data').html(data); //menampilkan data ke dalam modal
      console.log(idx);
      }
    })
    })
  });
</script>

<script>
  $(document).ready(function(){
    $('#edit_modal_foto_kamera').on('show.bs.modal', function(e){
      var idx = $(e.relatedTarget).data('id')
      //menggunakan fungsi ajax untuk mengambil data
    $.ajax({
      type :'post',
      url  : 'pages/informasi/info_foto_kamera.php',
      data : 'idx='+ idx,
      success : function(data){
        $('.hasil-data').html(data); //menampilkan data ke dalam modal
      console.log(idx);
      }
    })
    })
  });
</script>

<script>
  $(document).ready(function(){
    $('#edit_modal_pnp_kamera').on('show.bs.modal', function(e){
      var idx = $(e.relatedTarget).data('id')
      //menggunakan fungsi ajax untuk mengambil data
    $.ajax({
      type :'post',
      url  : 'pages/informasi/detail_pnp_kamera.php',
      data : 'idx='+ idx,
      success : function(data){
        $('.hasil-data').html(data); //menampilkan data ke dalam modal
      console.log(idx);
      }
    })
    })
  });
</script>

<script>
  $(document).ready(function(){
    $('#edit_modal_minipc').on('show.bs.modal', function(e){
      var idx = $(e.relatedTarget).data('id')
      //menggunakan fungsi ajax untuk mengambil data
    $.ajax({
      type :'post',
      url  : 'pages/informasi/detail_minipc.php',
      data : 'idx='+ idx,
      success : function(data){
        $('.hasil-data').html(data); //menampilkan data ke dalam modal
      console.log(idx);
      }
    })
    })
  });
</script>

<script>
  $(document).ready(function(){
    $('#edit_modal_foto_minipc').on('show.bs.modal', function(e){
      var idx = $(e.relatedTarget).data('id')
      //menggunakan fungsi ajax untuk mengambil data
    $.ajax({
      type :'post',
      url  : 'pages/informasi/info_minipc.php',
      data : 'idx='+ idx,
      success : function(data){
        $('.hasil-data').html(data); //menampilkan data ke dalam modal
      console.log(idx);
      }
    })
    })
  });
</script>

<script>
  $(document).ready(function(){
    $("#id_gedung").change(function(){
      console.log('Running');
      console.log($("#id_gedung option:selected").text().slice(0, 2));
      console.log($("#id_gedung").val());
      var id_gedung = $('#id_gedung').val();
      var kode_gedung = $("#id_gedung option:selected").text().slice(0, 2);

      $.ajax({
        type : 'get',
        url : 'pages/ruangan/ambil_kelas.php',
        data : { id_gedung: id_gedung, kode_gedung: kode_gedung},
        success : function(data){
          console.log(data);
          $("#id_lokasi").val(data);
        }
      })
    });
  });
</script>


<script>
    $("#gedung").change(function(){
    var gedung = $("#gedung").val();

    $.ajax({
        url: "pages/ruangan/combo_kelas.php",
        data: "gedung="+gedung,
        cache: false,
        success: function(msg){
            //jika data sukses diambil dari server kita tampilkan
            //di <select id=kota>
            $("#lokasi").html(msg);
        }
    });
  });
</script>

<script>
  $(document).ready(function(){
    $('#edit_modal_training').on('show.bs.modal', function(e){
      var idx = $(e.relatedTarget).data('id')
      //menggunakan fungsi ajax untuk mengambil data
    $.ajax({
      type :'post',
      url  : 'pages/peserta/detail_training.php',
      data : 'idx='+ idx,
      success : function(data){
        $('.hasil-data').html(data); //menampilkan data ke dalam modal
      console.log(idx);
      }
    })
    })
  });


<script>
  $("#filter_event").click(function() {
    var tgl_awal    = $('#tgl_awal').val();
    var tgl_selesai = $('#tgl_selesai').val();
    $.ajax({
        url: "pages/laporan/data_api_event.php",
        dataType: 'json',
        method: 'post',
        data: {'tgl_awal' : tgl_awal, 'tgl_selesai': tgl_selesai},
        success: function(data){
          var temp = data;
          console.log(data);
          $('#event').DataTable( {
            dom: 'Bfrtip',
            buttons: [
                'copy', 'csv', 'excel', 'pdf', 'print'
            ],
            data: temp,
            columns: [
              { data: "ket", title: "ket"},
              { data: "datetime", title: "datetime"},
              { data: "user", title: "user"},
              { data: "data_lama", title: "data_lama"},
              { data: "data_baru", title: "data_baru"}
             
          });          
        }
    });  
  });
  
</script>






<!-- VALIDASI TAMBAH JABATAN -->

<script>
  
  function validasidata_tambah_jabatan(){

    var id_jbt = document.getElementById('id_jbt');
    var nama_jbt = document.getElementById('nama_jbt');
    



    if (tambah_jabatan(id_jbt, "Id Jabatan Belum Diisi")){
      if (tambah_jabatan(nama_jbt, "Nama Jabatan Belum Diisi")){
       
        
        
     
      return true;
                            
                            }; 
                          };

    return false;
  }

  function tambah_jabatan(att, msg){
    if (att.value.length == 0){
      alert(msg);
      att.focus();
      return false;
    }
    return true;
  }

</script> <!-- PENUTUP VALIDASI TAMBAH JABATAN -->



<!-- VALIDASI PENANGGUNG JAWAB -->

<script>
  
  function validasidata_tambah_penanggung_jawab(){

    var nik = document.getElementById('nik');
    var nama = document.getElementById('nama');
    var email = document.getElementById('email');
    var no_hp = document.getElementById('no_hp');
    



    if (pnjwb(nik, "Nip Belum Diisi")){
      if (pnjwb(nama, "Nama Penanggung Jawab Belum Diisi")){
       if (pnjwb(email, "Email Penanggun Jawab Belum Diisi")){
        if (pnjwb(no_hp, "No Handphone Belum Diisi")){
         
        
     
      return true;
                                 
                                };
                              }; 
                            }; 
                          };

    return false;
  }

  function pnjwb(att, msg){
    if (att.value.length == 0){
      alert(msg);
      att.focus();
      return false;
    }
    return true;
  }

</script> <!-- PENUTUP VALIDASI PENANGGUNG JAWAB -->


<!-- VALIDASI UNIT KERJA -->

<script>
  
  function validasidata_tambah_unit_kerja(){

    
    var nama_unit = document.getElementById('nama_unit');
 



    
      if (unit(nama_unit, "Nama Unit Kerja Belum Diisi")){
     
        
     
      return true;
                                 
                                
                          };

    return false;
  }

  function unit(att, msg){
    if (att.value.length == 0){
      alert(msg);
      att.focus();
      return false;
    }
    return true;
  }

</script> <!-- PENUTUP VALIDASI UNIT KERJA -->




<script>
  
  function validasigedung(){

    var nama_gedung = document.getElementById('nama_gedung');

    if (harusDiisi(nama_gedung, "Nama Gedung Belum Diisi")){
      return true;
    };

    return false;
  }

  function harusDiisi(att, msg){
    if (att.value.length == 0){
      alert(msg);
      att.focus();
      return false;
    }
    return true;
  }

</script>

<script>
  
  function validasilokasi(){

    var nama_lokasi = document.getElementById('nama_lokasi');

    if (isilokasi(nama_lokasi, "Nama Lokasi Belum Diisi")){
      return true;
    };

    return false;
  }

  function isilokasi(att, msg){
    if (att.value.length == 0){
      alert(msg);
      att.focus();
      return false;
    }
    return true;
  }

</script>

<script>
  
  function validasikamera(){

    var nama_kamera = document.getElementById('nama_kamera');
    var tipe_kamera = document.getElementById('tipe_kamera');

    if (isikamera(nama_kamera, "Nama Kamera Belum Diisi")){
    if (isikamera(tipe_kamera, "Tipe Kamera Belum Diisi")){
      return true;
    };
  };
    return false;
  }

  function isikamera(att, msg){
    if (att.value.length == 0){
      alert(msg);
      att.focus();
      return false;
    }
    return true;
  }

</script>

<script>
  
  function validasiip(){

    var kode_kamera = document.getElementById('kode_kamera');
    var gedung = document.getElementById('gedung');
    var lokasi = document.getElementById('lokasi');
    var ip_kamera = document.getElementById('ip_kamera');
    var date = document.getElementById('date');




    if (isiip(kode_kamera, "Nama Kamera Belum Diisi")){
    if (isiip(gedung, "Gedung Belum Diisi")){
    if (isiip(lokasi, "Lokasi Belum Diisi")){
    if (isiip(ip_kamera, "ip kamera Belum Diisi")){
    if (isiip(date, "Tanggal Belum Diisi")){
      return true;
          };
        };
      };
    };
  };
    return false;
  }

  function isiip(att, msg){
    if (att.value.length == 0){
      alert(msg);
      att.focus();
      return false;
    }
    return true;
  }

</script>




  <script>
   $(document).ready(function(){
    $(".input-group.date").datepicker({
    })
   })
  </script>
  <script>
  $(function () {
    //Initialize Select2 Elements
    $('.select2').select2()
  </script>

<!-- <script>
  $(function() {
    $( ".input-group.date" ).datepicker();
  });
</script> -->
<?php }  ?>


</body>
</html>

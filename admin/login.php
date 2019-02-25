<html>
<head>
  <meta charset="UTF-8">
  <title> Login - Audit Mutu Internal</title>
  		<link rel='stylesheet prefetch' href='http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css'>
		<link rel="stylesheet" href="../assets/css/bootstrap.css">
		<link rel="stylesheet" href="../assets/css/style.css">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">		
		<script src="../assets/js/jquery.min.js" type="text/javascript"></script>
		<script src="../assets/js/bootstrap.min.js" type="text/javascript"></script>
		
		<link rel="shortcut icon" href="../images/stmik bandung.png">

</head>
<body>

<div class="gambar">
		<img src="../images/stmik bandung.png" size="100%" alt=""></a>
	</div>
	<div class="loading"></div>
	<form method="post" name="login" action="../koneksi/cek_login.php">
				<div class="login-form">
					<div class="form-group ">			
						<input type="text" class="form-control" placeholder="Username" name="username">
						<i class="fa fa-user"></i>
     				</div>

     				<div class="form-group log-status">				
						<input type="password" class="form-control" placeholder="Password" name="password">
						<i class="fa fa-lock"></i>
    				</div>						
						
						<span class="alert">Invalid Credentials</span>
      					<a class="link" href="register.php">Registrasi</a>						


				<td><input type="submit" class="log-btn" name="submit" value="Log In">
				<br><br>
					<!-- <a class="link" href="../index.php">← Kembali ke STMIK Bandung</a> -->
					<!-- <a class="link" href="daftar.php">DAFTAR</a></td> -->
	
				
				<script src="js/index.js"></script>		
</form>

<script src="http://code.jquery.com/jquery-2.1.4.min.js"></script>
<script>
$(window).load(function() {
 $(".loading").fadeOut("slow");
});
</script>
</body>
</html>
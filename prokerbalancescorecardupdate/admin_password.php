<?php
include('session.php');
include "koneksi.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Balance Score Card</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
  <link rel="stylesheet" href="css/style.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
</head>
<body>
<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>                        
      </button>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav">
      
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <li><a href="logout.php"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>
      </ul>
    </div>
  </div>
</nav>
  
<div class="container-fluid text-center">    
  <div class="row content">
    <div class="col-sm-2 sidenav">
	<img src="images/cinqueterre.jpg" class="img-thumbnail" alt="Cinque Terre" width="304" height="236">
		<br></br>
     	<p><a href="admin_tujuan.php"><button type="button" class="btn btn-primary btn-block active">Tujuan</button></a></p>
	 	<p><a href="admin_indikatortujuan.php"><button type="button" class="btn btn-primary btn-block active">Indikator Tujuan</button></a></p>
		<p><a href="admin_karyawan.php"><button type="button" class="btn btn-primary btn-block active">Karyawan</button></a></p>
		<p><a href="admin_proker.php"><button type="button" class="btn btn-primary btn-block active">Proker</button></a></p>
		<p><a href="admin_lpj.php"><button type="button" class="btn btn-primary btn-block active">Laporan Pertanggungjawaban</button></a></p>
		<p><a href="admin_notifikasi.php"><button type="button" class="btn btn-primary btn-block active">Notifikasi</button></a></p>
		<p><a href="admin_userregister.php"><button type="button" class="btn btn-primary btn-block active">Daftarkan user</button></a></p>
		<p><a href="admin_password.php"><button type="button" class="btn btn-primary btn-block active">Ubah Password</button></a></p>
	
    </div>
    <div class="col-sm-8 text-left"> 
            <h2 class="text-center">Ubah Password</h2>
			<form method="post" action="admin_password.php">
			<input name="passwordlama" type="password" id="passwordlama" size="25" class="form-control" placeholder="Password lama" required="required" /><br>
			<input name="password" type="password" id="password" size="25" class="form-control" placeholder="password" required="required" /><br>
			<input name="password2" type="password" id="password2" size="25" class="form-control" placeholder="password" required="required" /><br>
			<input type="submit" name="ubah" value="Ubah Password" class="btn btn-primary" />
			</form>
			<?php 
		if(isset($_POST['ubah']))
		{
			if($_POST['password']==$_POST['password2']){
			$sql1="SELECT * FROM KARYAWAN WHERE NIP='".$_SESSION['login_user']."' AND PASSWORD='".md5($_POST['passwordlama'])."'";
			$hasil=mysqli_query($konek_db,$sql1);
			$row=mysqli_num_rows($hasil);
				if($row==1)
				{
				$sql="UPDATE KARYAWAN SET PASSWORD='".md5($_POST['password'])."' WHERE NIP='".$_SESSION['login_user']."' AND PASSWORD='".md5($_POST['passwordlama'])."'";
				mysqli_query($konek_db,$sql);
				echo "<br>Password anda berhasil diubah.";
				}
				else
				echo "<br>Password lama anda salah";
			}
			else
			echo "<br>Password dan konfirmasi password tidak sama.";
		}
	?>
            </div>
        </div>	 
    </div>

<footer class="container-fluid text-center">
  <p>Sistem Informasi Universitas Airlangga</p>
</footer>

</body>
</html>

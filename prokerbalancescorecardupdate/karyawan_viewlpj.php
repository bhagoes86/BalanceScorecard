<?php include "koneksi.php";
session_start();?>
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
        <li ><a href="karyawan_home.php">Home</a></li>
        <li><a href="karyawan_viewbsc.php">Balance Score Card</a></li>
        <li><a href="karyawan_viewproker.php">Program Kerja</a></li>
        <li class="active"><a href="karyawan_viewlpj.php">Laporan Pertanggung Jawaban</a></li>
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <li><a href="logout.php"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>
      </ul>
      </li>
    </div>
  </div>
</nav>
  
<div class="container-fluid text-center">    
  <div class="row content">
    <div class="col-sm-2 sidenav">
     <img src="images/cinqueterre.jpg" class="img-thumbnail" alt="Cinque Terre" width="304" height="236">
		<br></br>
    	<p><button type="button" class="btn btn-primary btn-block disabled ">View LPJ</button></a></p>
		
    </div>
       <div class="col-sm-8 text-left"> 
            <h2 class="text-center">Laporan Pertanggung Jawaban</h2>
				<form id="form1" name="form1" method="post" action="karyawan_viewlpj.php">
				<label for="sel1">Tahun</label>            
				<select class="form-control" name="tahun" onChange='this.form.submit();'>
				<option>Tahun</option>
                
 			<?php 
 			$queri1="select distinct YEAR(WAKTU_MULAI_PROKER) from PROKER";
			$hasil1=mysqli_query($konek_db,$queri1);
			while ($data1 = mysqli_fetch_array($hasil1)){  
					echo "<option value=".$data1['0'].">".$data1['0']."</option>";

			}
					?>
  		</select>
  </form>
	<br>
            <div class="box-body table-responsive">
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>Nomor</th>
							<th>Id LPJ</th>
                            <th>Nama Proker</th>
                            <th>Evaluasi</th>
                            <th>Keberlanjutan</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
 <?php
if(isset($_POST['tahun']))
if($_POST['tahun']!="Tahun"){	
$queri="Select distinct l.ID_LPJ, p.NAMA_PROKER, l.EVALUASI, l.KEBERLANJUTAN From LAPORAN_PERTANGGUNG_JAWABAN l, PROKER p where l.ID_PROKER=p.ID_PROKER and YEAR(WAKTU_MULAI_PROKER) = \"".$_POST['tahun']."\" and p.NIP='".$_SESSION['login_user']."'";
$hasil=mysqli_query($konek_db,$queri);    //fungsi untuk SQL  
$id = 0;
while ($data = mysqli_fetch_array ($hasil)){  
 			$id++; 
 			echo "      
        			<tr>  
        			<td>".$id."</td>
					<td>".$data[0]."</td>  
        			<td>".$data[1]."</td>  
        			<td>".$data[2]."</td>  
        			<td>".$data[3]."</td>  
					<td><a href=\"karyawan_viewdetaillpj.php?id=".$data[0]."\">"."Detail</a> "." || <a href=download.php?download_file=".$data[0].".doc\">"."Download LPJ</a>"."</td>
        		</tr>   
        	";      
			}
				if($id==0){
		echo "<div class='alert alert-danger  alert-dismissable'>
                <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
               Data tidak ada
                </div>";
		}
	
		} 
	
	
 ?>  
</table><br><br><br><br><br>
            </div>
        </div>	
    </div>
</div>


<div class="navbar navbar-inverse navbar-fixed-bottom">
      <div class="container">
      <p class="navbar-text center-block">&#169; Sistem Informasi Universitas Airlangga</p>
      </div>
 </div>

</body>
</html>

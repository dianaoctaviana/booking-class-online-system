<?php
session_start();
//cek apakah user sudah login
if(!isset($_SESSION['user'])){
    die("Anda belum login");//jika belum login jangan lanjut
}
//cek level user
if($_SESSION['level']!="Admin"){
    die("Anda bukan admin");//jika bukan admin jangan lanjut
}
?>

<!DOCTYPE html>
<html>
<head>
<link rel='stylesheet' href='../css/css.css'>
<link rel='stylesheet' href='../css/css2.css'>

<script src='../jquery/jquery-2.1.4.min.js' ></script>
<script src='../jquery/js.js'> </script>
<link rel='stylesheet' href='../bootstrap-3.3.7-dist/css/bootstrap.css'>
<link rel='stylesheet' href='../bootstrap-3.3.7-dist/js/bootstrap.min.js'>
<link rel='stylesheet' href='../bootstrap-3.3.7-dist/css/bootstrap.min.css'>

    <title>Alasan Penolakan Request Booking Class </title>
</head>
	<?php
  include_once("../database/koneksi.php");



$result = mysqli_query($Open, "SELECT * FROM form_peminjaman ");

while ($user_data = mysqli_fetch_array($result)) 
{
   $id = $user_data['idform']; 
    $alasan = $user_data['alasan'];
   
}
?>

<body style="background-color: lightblue;">
    <nav class="navbar navbar-default navbar-fixed-top">
  
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span> 
      </button>
      <a class="navbar-brand" href="#">BOOKING CLASS ONLINE SYSTEM</a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav navbar-right">
        <li><a href="../logout.php">LOGOUT</a></li>
		<li><a href="#"><span class="glyphicon glyphicon-search"></span></a></li>
      </ul>
    </div>
	
	</nav>
	<div class="container-fluid">

	<br/><br/>
		<div class="panel panel-info">
			<div class="panel-heading">
				<b><h4><center>PENOLAKAN REQUEST BOOKING CLASS</center></h4></b>
			</div>
			<div class="panel-body">
					
				<H5> Harap isi form berikut dengan benar. </h5>	
			<form action="alasan.php" method="post" name="update_user" class="form-horizontal">
            <table border="1" class="table table-hover table-striped" class="table table-hover table-striped">

        <tr> 
        <td>Nama Pengguna</td>
        <td> <input  type="text" name="id"  value=<?php echo $id;?>> </td>
      </tr>      
       <tr> 
        <td>Alasan Penolakan</td>
        <td> <input  type="text" name="alasan"  value=<?php echo $alasan;?>></td>
      </tr>
     <tr> 
                <td></td>
                <td><input type="submit" name="Update" value="Berikan Alasan"></td>
    </tr>

     </table>
    </form>
	</div> </div> </div>
	<?php
 include_once("../database/koneksi.php");
 if(isset($_POST['Update'])) {
        $id = $_POST['id'];
        $alasan = $_POST['alasan'];

        include_once("../database/koneksi.php");
        // Insert user data into table
        
   $result = mysqli_query($Open, "UPDATE form_peminjaman SET idform='$id',alasan='$alasan' WHERE idform=$id");
 
 echo "<script>alert('Data Berhasil Diperbaharui!! ');window.location = 'laporan_baak.php'</script>";

    }
?>
<footer style="margin-bottom:-100px;">
    <hr size="5.px" style=" margin-top: 200px;">
	
  <center><h5>Created by Group PSW2-1819-013</h5></center>
</footer>

</body>
</html>

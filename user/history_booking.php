
<?php
session_start();
include_once("../database/koneksi.php");
$user=$_SESSION['user'];
$result = mysqli_query($Open, "select * from  form_peminjaman inner join ruangan on form_peminjaman.id_ruangan = ruangan.id_ruangan where id='$user'");

//cek apakah user sudah login
if(!isset($_SESSION['user'])){
    die("Anda belum login");//jika belum login jangan lanjut
}
//cek level user
if($_SESSION['level']!="user"){
    die("You Not User..!");//jika bukan admin jangan lanjut
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
    <title>Home Mahasiswa</title>

</head>
<style type="text/css">

  #Tampilan{
  font-family: arial, sans-serif;
  border-collapse: collapse;
  width: 100%;
  margin-right: 100px;
  margin-top: 20px;
  border: 2px solid red;
}
td{
  text-align: left;
    padding: 3px;
}
th {
  text-align: left;
  padding: 5px;
  background-color: orange;
}
#gambar{
  height: 50px; 
  width: 50px;
  margin-bottom: -100px;
}
tr:nth-child(even) {
  background-color: #dddddd;
}
p{
  font-size: 30px;
}
.btn-sm {
	width: 70px;
	height : 30px;
	
}
</style>

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
	

	<div class="container-fluid text-center">
	<div class="panel panel-info">
			<div class="panel-heading">
			<center><h2>History Booking Class</h2></center>
			</div>
			<div class="panel-body">
			<div class="table-responsive">
		<table id="page" class="table table-bordered table-striped table-hover" >

  <tr>
   <th>Nama Pengguna</th>
    <th>Tanggal Peminjaman</th>
    <th>Rencana Mulai</th>
    <th>Rencana Berakhir</th>
    <th>Lokasi</th>
    <th>Keperluan</th>
    <th>Status</th>
    <th>Alasan</th>
    <th>Print</th>
    <th>Edit</th>
    <th>Batalkan</th>
  </tr>
<?php  
while($user_data = mysqli_fetch_array($result)) {         
        echo "<tr>";
         echo "<td>".$user_data['id']."</td>";
        echo "<td>".$user_data['tanggal_peminjaman']."</td>";
        echo "<td>".$user_data['rencana_awal']."</td>";
        echo "<td>".$user_data['rencana_akhir']."</td>";  
        echo "<td>".$user_data['nama_ruangan']."</td>";  
        echo "<td>".$user_data['keperluan']."</td>";
        echo "<td>". $user_data['STATUS']. "</td>";
        echo "<td>". $user_data['alasan']. "</td>";

     echo '<td>
        <a href="history_booking.php?check='.$user_data['STATUS'].'&idform='.$user_data['idform'].'" class="btn btn-success btn-sm" style="margin-top:0px;">  
        <span class="glyphicon glyphicon-print"> </span> Print </a>
        </td>';
    echo "<td><a href='edit.php?idform=$user_data[idform]'>Edit</a></td>"; 
    echo "<td><a href='delete.php?idform=$user_data[idform]'>Batalkan</a></td>"; 

    echo "</tr>";  

    }
  ?>
<?php 

if(isset($_GET['check'])){
      $idform = $_GET['idform'];
      if($_GET['check'] == 'Disetujui'){
        echo '
        <script language = "javascript">
        document.location="../pdf.php?idform='.$idform.'";
        </script>
        ';
      }
     else if($_GET['check'] == 'Ditolak'){
        echo '
        <script language = "javascript">
        alert("Form Anda Telah Ditolak!");
        document.location="history_booking.php";
        </script>
        ';
      }else{
        echo '
        <script language = "javascript">
        alert("Form Anda belum di approved!");
        document.location="history_booking.php";
        </script>
        ';
      }
  }
?>    
</table>
</div>
<a href="home_user.php">Kembali ke Beranda</a>
</div>

<footer style="margin-bottom:-100px;">
    <hr size="5.px" style=" margin-top: 200px;">
  <center><h5>Created by PSW2-1819-013</h5></center>
</footer>
  </body>
</html>
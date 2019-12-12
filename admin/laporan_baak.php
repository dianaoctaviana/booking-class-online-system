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
<?php 
include_once ('../database/koneksi.php');
  include('../function.php');
  
  $query = 'SELECT * FROM form_peminjaman';
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
<style>
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

</style>


<title>Laporan Peminjaman </title>
  <div class="header">


</head>


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
				 
<center><h4>History Booking Class Mahasiswa</h4></center>
<button = style="margin-bottom:10px" onClick="print_data_bulan()">Lihat Laporan Per - Bulan</button> 
  <button = style="margin-bottom:10px" onClick="print_data_tahun()">Lihat Laporan Per - Tahun</button> 

</b><br><br>
<table id="page" width="1500px" class="table table-hover table-striped">
 <tr>

    <th>No</th>
  <th>Nama Pengguna</th>
    <th>Tanggal Peminjaman</th>
    <th>Lokasi</th>
    <th>Waktu  Mulai</th>
    <th>Waktu Berakhir</th>
    <th>Keperluan</th>
    <th>Status</th>
    <th>Alasan</th>
 
 </tr> </thead> <tbody>
<?php 
  $trans = getDataUserFormPeminjaman();
  while($data = mysqli_fetch_array($trans, MYSQLI_ASSOC)) {
    echo '<tr><td>'.$data['idform'].'</td>';
    $dataUser = getDataUser2($data['id']);
    while($item = mysqli_fetch_array($dataUser, MYSQLI_ASSOC)) {
      echo '<td>'. $item['nama']. '</td>';
      
    }
  // echo '<td>'.$data['id'].'</td>';
  echo '<td>'.$data['tanggal_peminjaman'].'</td>';
  echo '<td>'.$data['nama_ruangan'].'</td>';
  echo '<td>'.$data['rencana_awal'].'</td>';
  echo '<td>'.$data['rencana_akhir'].'</td>'; 

  echo '<td>'.$data['keperluan'].'</td>';     
  echo '<td>'.$data['STATUS'].'</td>';
  echo '<td>'.$data['alasan'].'</td>';   
  

            ?>
            <?php echo '</tr>'; }?>


</table>
<br/><br/>
</div>			
		</div>
		<br/>
	</div>
   <script>
  function print_data_bulan() {
      window.open("laporan_perbulan.php");
}
  function print_data_tahun() {
window.open("laporan_pertahun.php");
 } 
</script>
<footer style="margin-bottom:-100px;">
    <hr style=" margin-top: 500px;">
  <center><h5>Created by PSW2-1819-013</h5></center>
</footer>
  </body>
</html>



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
	$result_set = $conn->query($query);
	if(isset($_GET['del_pesanan'])){
		deletePesanan($_GET['del_pesanan']);
		
	}
	if(isset($_GET['acc'])){
		accPesanan($_GET['acc']);
	} ?>


<!DOCTYPE html>
<html>
<head>
<link rel='stylesheet' href='../css/css.css'>
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


<title>Booking Class</title>
	<div class="header">
		<a href="#default"> 
	<div class="box-left"><img src="../images/logo.jpg" width="60px" id="logo" style="margin-top: -20px; margin-right: 20px;"> <p>Booking Class Online System </p> </div>
		<div class="header-right">
      <b><font color=""><u> <?=$_SESSION['user']?></u><b>
			<img id="gambar" src="../images/login.out.png">
		 <a class='active' href='../logout.php'>Logout</a>

  </div>
</div>

</head>


<body>
<div class="container-fluid text-center">
	
<center><h2>Setujui Form Booking Kelas</h2></center>
<?php 
//$daftar_pesanan = getAllHelp();
	//					if ($daftar_pesanan==NULL){
		//					echo "<b align='center'>No data</b>";

			//			}else{
							?>
<table id="page" class="table">
  <thead>
  <tr>
    <th>No</th>
	<th> Nama </th>
    <th>Tanggal Peminjaman</th>
    <th>Lokasi</th>
    <th>Rencana Mulai</th>
    <th>Rencana Berakhir</th>
    <th>Keperluan</th>
    <th>Status</th>
	<th> Action </th>
  </tr> </thead> <tbody>
<?php 
	$trans = getDataUserFormPeminjaman();
	while($data = mysqli_fetch_array($trans, MYSQLI_ASSOC)) {
	echo '<tr><td>'.$data['idform'].'</td>';
	$dataUser = getDataUser2($data['id']);
	while($item = mysqli_fetch_array($dataUser, MYSQLI_ASSOC)) {
		echo '<td>'. $item['nama']. '</td>';
			
		}
	echo '<td>'.$data['tanggal_peminjaman'].'</td>';
	echo '<td>'.$data['ruangan'].'</td>';
	echo '<td>'.$data['rencana_awal'].'</td>';
	echo '<td>'.$data['rencana_akhir'].'</td>';  
	echo '<td>'.$data['keperluan'].'</td>';   	
	echo '<td>'.$data['status'].'</td>';

	if($data['status'] == 'Pending'){	
	echo('
	<td>
	<a href="setujui.php?del_pesanan='. $data['idform'] .'">Reject</a>
	<a href="setujui.php?acc='. $data['idform'] .'">Accept</a>	
	</td>');
	}
	else{ echo '<td>Tidak ada Aksi Yang dapat dilakukan</td>';}		
	}
	
						?>
						<?php echo '</tr>'; ?>

</table>

						<?php  ?>
<footer style="margin-bottom:-100px;">
    <hr style=" margin-top: 500px;">
  <center><h3>@copyright_PSW2</h3></center>

  </footer>
	</body>
	</html>

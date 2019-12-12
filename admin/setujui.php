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
<link rel='stylesheet' href='../css/css2.css'>
<script src='../jquery/jquery-2.1.4.min.js' ></script>
<script src='../jquery/js.js'> </script>
<link rel='stylesheet' href='../css/css2.css'>
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
<title>Penyetujuan Terhadap Request Booking Class</title>
</head>


<body style="background-color:lightblue;"> 

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
			<center><h2>Daftar Request Booking Kelas Institut Teknologi Del</h2></center>
			</div>
			<div class="panel-body">
					
		

<?php 
//$daftar_pesanan = getAllHelp();
	//					if ($daftar_pesanan==NULL){
		//					echo "<b align='center'>No data</b>";

			//			}else{
							?>
							<div class="table-responsive">
		<table id="page" class="table table-bordered table-striped table-hover" >
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
  if($data['STATUS'] == 'Pending'){ 
  echo('
  <td>

    <button><a href="setujui.php?acc='. $data['idform'] .'">Setujui</a></button> 
    <button><a href="setujui.php?del_pesanan='.$data['idform'].'">Tolak</button>
    
  </td>');
  }
  else{echo '<td>'.$data['STATUS'].'</td>';}   
  }
  
            ?>
            <?php echo '</tr>'; ?>

</table> </div> </div>

						<?php  ?>
    <hr style=" margin-top: 500px;">
  <center><h5>Created by Group PSW2-1819-013</h5></center>

  </footer>
	</body>
	</html>

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
<script src='../jquery/jquery-3.1.1.min.js' ></script>
<script src='../jquery/js.js'> </script>
<link rel='stylesheet' href='../bootstrap-3.3.7-dist/css/bootstrap.css'>
<link rel='stylesheet' href='../bootstrap-3.3.7-dist/js/bootstrap.min.js'>
<link rel='stylesheet' href='../bootstrap-3.3.7-dist/css/bootstrap.min.css'>

<title>Home Admin</title>
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

	<div CLASS="container text-center ">
		<h3>Welcome, <?=$_SESSION['user']?> !</h3>
		<p> <center>What do you want to do? </p>
		<br>
		<br>
	<div class="container-fluid bg-grey">
	<div class="row text-center">
		<div class ="col-sm-6">
		<DIV CLASS="thumbnail">
			<img src="../images/kelas.jpg">
			 <button class="btn"> <a  href="setujui.php">Daftar Peminjaman</button>
		</div>
		</div>
		<div class ="col-sm-6">
		<DIV CLASS="thumbnail">
			<img src="../images/kelas.jpg">
			<button class="btn"> <a  href="laporan_baak.php">Laporan Peminjaman</button>
		
		</div>
		</div>
		
	</div>
	</div>
	</div>
	
<footer style="margin-bottom:-100px;">
    <hr size="5px" color="black" style=" margin-top: 75px;">
  <center><h5>Created by Group PSW2-1819-013 </h5></center>
</footer>
	</body>
</html>
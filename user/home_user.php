<?php
session_start();
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
		<li><a href=""><span class="glyphicon glyphicon-search"></span></a></li>
      </ul>
    </div>
	
	</nav>

	<div CLASS="container text-center ">
	<br>
	<br>
		<h3>Welcome, <?=$_SESSION['user']?>! </h3>
		<p> <center>What do you want to do? </p>
		<br>
		<br>
	<div class="container-fluid bg-grey">
	<div class="row text-center">
		<div class ="col-sm-6">
		<DIV CLASS="thumbnail">
			<img src="../images/kelas.jpg">
			 <h4><a  href="booking_kelas.php">Request Booking Class</a> </h4>  
		</div>
		</div>
		<div class ="col-sm-6">
		<div class="thumbnail">
			<img src="../images/kelas.jpg">
			<h4><a  href="history_booking.php">History Booking Class</a></h4>
		
		</div>
		</div>
	
	</div>
	</div>
	</div>


	<footer style='margin-bottom:-100px;'>
    <hr style='margin-top: 110px;color;'>
  <center><h5><b>Created By: PSW2-1819-013</b></h5></center>
</footer>
	</body>
</html>

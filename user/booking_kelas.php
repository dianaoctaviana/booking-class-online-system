
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

    <title>Request Booking Class</title>
    
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
				<b><h4><center>FORM BOOKING ONLINE CLASS</center></h4></b>
			</div>
			<div class="panel-body">
					
				<H5> Harap isi form berikut dengan benar. </h5>	
    <form action="booking_kelas.php" method="post" name="form1" class="form-horizontal">
        <table width="25%" border="0" class ="table table-hover table-striped">
            <tr> 
				<td> NIM Peminjam </td>
				<td><input type="text" name="id" value=<?=$_SESSION['user']?>></td>
			</tr>
			<tr> 
                <td>Tanggal Peminjaman</td>
                <td><input type="date" name="tanggal_peminjaman"></td>
            </tr>
            <tr> 
                <td>Waktu Mulai</td>
                <td><input type="time" name="rencana_awal"></td>
            </tr>
            <tr > 
                <td>Waktu Berakhir</td>
                <td><input type="time" name="rencana_akhir"></td>
            </tr>
             <tr> 
                <td>Ruangan</td>
                <td class="ruangan-k">
				<div class="styled-select">
				<select name="ruangan"> 
				<?php
                           include_once("../database/koneksi.php");
                            $sql = mysqli_query($Open, "SELECT * FROM ruangan");
                            while($q = mysqli_fetch_assoc($sql)){
                                
                            echo '<option>'. $q['nama_ruangan'] .'</option>';      
                            }
                        ?></select>
				</div> </td>
            </tr>
             <tr> 
                <td>Keperluan</td>
                <td><textarea class="form-control" rows="5" id="comment" name="keperluan" style="margin-left: 50px; width: 900px;"></textarea>
            </tr>
            <tr> 
                <td></td>
                <td><input type="submit" name="Submit" value="Tambahkan" style="margin-left:50px; margin-top:30px;"></td> 
				
            </tr>
        </table>
    </form><a href="history_booking.php">Masuk Ke History</a>
    
			</div>			
		</div>
		<br/>
	</div>
	

    
   <?php
   // Check If form submitted, insert form data into users table.
	  // Check If form submitted, insert form data into users table.
    if(isset($_POST['Submit'])) {
        include_once("../database/koneksi.php");
		$id = $_POST['id'];
        $tanggal_peminjaman = $_POST['tanggal_peminjaman'];
        $rencana_awal = $_POST['rencana_awal'];
        $rencana_akhir = $_POST['rencana_akhir'];
        $keperluan = $_POST['keperluan'];
        $nama_ruangan = $_POST['ruangan'];
        $ruangan = mysqli_query($Open, "SELECT * FROM ruangan WHERE nama_ruangan = '$nama_ruangan'");
        $kat = mysqli_fetch_array($ruangan);
        $id_ruangan = $kat['id_ruangan'];

        // include database connection file
         include_once("../database/koneksi.php");
        // Insert user data into table
        $result = mysqli_query($Open, "INSERT INTO form_peminjaman(id,tanggal_peminjaman,rencana_awal,rencana_akhir,keperluan,id_ruangan) VALUES('$id','$tanggal_peminjaman','$rencana_awal','$rencana_akhir','$keperluan','$id_ruangan')");
		
		 // Show message when user added
          echo "<script>window.location = 'history_booking.php'</script>";
   
   
    }
    ?>
</body>
<footer style='margin-bottom:-100px;'>
    <hr size='5.px' style='margin-top: 200px;'>
	
  <center><h5>Created by Group PSW2-1819-013</h5></center>
</footer>
  </body>
</html>


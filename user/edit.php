
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

    <title>Edit Form Peminjaman</title>
</head>

<?php

    include_once("../database/koneksi.php");


 if(isset($_POST['update'])) {
        $id = $_POST['idform'];
        $tanggal_peminjaman = $_POST['tanggal_peminjaman'];
        $rencana_awal = $_POST['rencana_awal'];
        $rencana_akhir = $_POST['rencana_akhir'];
		$keperluan = $_POST['keperluan'];   
		$ruangan = $_POST['ruangan'];
		
		    $result = mysqli_query($Open, "UPDATE form_peminjaman SET tanggal_peminjaman='$tanggal_peminjaman',rencana_awal='$rencana_awal',rencana_akhir='$rencana_akhir',keperluan='$keperluan' WHERE idform=$id");
 
			echo "<script>alert('Data Berhasil Diperbaharui!! ');window.location = 'history_booking.php'</script>";
   

}
?>
<?php
$id = $_GET['idform'];
$result = mysqli_query($Open, "SELECT * FROM form_peminjaman WHERE idform=$id");
while ($user_data = mysqli_fetch_array($result)) 
{
    $tanggal_peminjaman = $user_data['tanggal_peminjaman'];
    $rencana_awal = $user_data['rencana_awal'];
    $rencana_akhir = $user_data['rencana_akhir'];
    $id_ruangan = $user_data['id_ruangan'];
    $keperluan = $user_data['keperluan'];
}
?>
<body  style="background-color: lightblue;">
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
			<h5> Harap edit data berikut dengan benar. </h5>
    <form name="update_user" method="post" action="edit.php" class="form-horizontal">
        <table border="0" class="table table-hover table-striped" class ="table table-hover table-striped">
            <tr> 
                <td>Tanggal Peminjaman</td>
                <td><input type="date" name="tanggal_peminjaman" value=<?php echo $tanggal_peminjaman;?>></td>
            </tr>
            <tr> 
                <td>Waktu Mulai</td>
                <td><input type="time" name="rencana_awal" value=<?php echo $rencana_awal;?>></td>
            </tr>
            <tr> 
                <td>Waktu Berakhir</td>
                <td><input type="time" name="rencana_akhir" value=<?php echo $rencana_akhir;?>></td>
            </tr>
                <tr> 
                <td>Ruangan</td>
                <td><div class="styled-select">
				<select  class="form-control" name="id_ruangan" > 
					<?php
						 $sql = mysqli_query($Open, "SELECT * FROM ruangan");
                            while($q = mysqli_fetch_assoc($sql)){
                        echo '<option value='.$q['id_ruangan'].'>'. $q['nama_ruangan'] .'</option>';      
                        }
					?> </select>
					 </div></td>
            </tr>
              <tr> 
                <td>Keperluan</td>
				<td><textarea class="form-control" rows="5" id="comment" name="keperluan"  style="margin-left: 50px; width: 900px;"><?php echo $keperluan;?></textarea>
            
		 </tr>
            <tr>
                <td><input type="hidden" name="idform" value=<?php echo $_GET['idform'];?>></td>
                <td><input style="margin-left:50px;" type="submit" name="update" value="Edit"></td>
            </tr>
        </table>
    </form>
<a href="history_booking.php">Masuk Ke History</a>
    <br/><br/>
</div>			
		</div>
		<br/>
	</div>
   


<footer style='margin-bottom:-100px;'>
    <hr style='margin-top: 110px;color;'>
  <center><h5><b> Created by Group PSW2-1819-013</b></h5></center>
</footer>
  </body>
</html>


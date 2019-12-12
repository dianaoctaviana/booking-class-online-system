<?php
	include_once("../database/koneksi.php");

?>
<!DOCTYPE html>
<html>
<head>
	<title>Hasil Laporan Boking Kelas Online</title>


	<center><h2 style="color: blue">Laporan Booking Kelas Online Per Tahun</h2></center>
	<link rel="stylesheet" type="text/css" href="css/pdf.css">
</head>
<body>
	<center>
	<table border="3px" style="border-color: orange" >
		<tr class="tableheader" style="color:#c30707;">
			<th>Tanggal Peminjaman</th>
			<th>Rencana Awal</th>
			<th>Rencana Berakhir</th>
			<th>Ruangan</th>
			<th>Keperluan</th>
		</tr>
		<?php 
			$result = mysqli_query($Open, "select * from  form_peminjaman inner join ruangan on form_peminjaman.id_ruangan = ruangan.id_ruangan");
			while ($user_data = mysqli_fetch_array($result)) {?>
				<tr id="rowHover">
					<td width="10%" align="center"><?php echo $user_data['tanggal_peminjaman']?></td>
					<td width="25%" align="center"><?php echo $user_data['rencana_awal']?></td>
					<td width="15%" align="center"><?php echo $user_data['rencana_akhir']?></td>
					<td width="15%" align="center"><?php echo $user_data['nama_ruangan']?></td>
					<td width="25%" align="center"><?php echo $user_data['keperluan']?></td>
				</tr>	
		
		<?php		
			}
		?>

	</table>
	</center>
	<script>
		window.load = print_data_tahun();
		function print_data_tahun(){
			
		}
	</script>
</body>
</html>
<style type="text/css">
	th{
color: red;
background-color: white;
	};
</style>
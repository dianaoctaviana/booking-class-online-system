<?php 
require_once('database/koneksi.php');
require_once ('function.php');
$connection = new Database($host, $user, $pass, $database);
$brg = new Barang ($connection);

$content = '
<page> 
	<div> 
		<span style ="font-size : 25px;"> Form Online Booking Class System </span>
	<div>
	
	<div style="font-size: 15px"> Institut Teknologi Del </div>
	
	<table border="0px" class="table">
		<tr> 
		<td> No. </td>
		<td> Tanggal Peminjaman </td>
		<td> Rencana Awal </td>
		<td> Rencana Akhir </td>
		<td> Ruangan </td>
		<td> Keperluan </td>
		<td> Status </td>
		</tr>';
		if($_GET['idform'] != '') {
			$tampil = $class->tampil();
		}
	$tampil = $class->tampil();
	while ($data = $tampil->fetch_object()) {
		$content .= '
			<tr> 
				<td align ="center">' .$data->idform. '</td>
				<td>'.$data->tanggal_peminjaman .' </td>
				<td>'.$data->rencana_awal.'</td>
				<td>'.$data->rencana_akhir.'</td>
				<td>'.$data->ruangan .'</td>
				<td>' .$data->keperluan.'</td>
			</tr>';
	}
	$content .= '
		</table> </page>';
		
		require_once('html2pdf/html2pdf.class.php');
		$html2pdf = new HTML2PDF ('P','A4','en');
		$html2pdf->WriteHTML($content);
		$html2pdf->Output ('exemple.pdf');
		?>
		
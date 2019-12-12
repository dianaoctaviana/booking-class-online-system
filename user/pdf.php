<?php
	$idform = $_GET['idform'];

	 $conn = new mysqli('localhost', 'root', '', 'pinjam_kelas');
	 if(!$conn){
	 	die("database connection problem");
	 }
	 $db_use = mysqli_select_db($conn,"pinjam_kelas") or die("select db problem");

	 $sql=mysqli_query($conn, "SELECT * FROM form_peminjaman WHERE idform = '$idform'");
	 while ($item = mysqli_fetch_array($sql, MYSQLI_ASSOC)) {
		$idform = $item['idform'];
		$tanggal_peminjaman = $item['tanggal_peminjaman'];
		$rencana_awal = $item['rencana_awal'];
		$rencana_akhir = $item['rencana_akhir'];
		$ruangan = $item['ruangan'];
		$keperluan = $item['keperluan'];
		$id = $item['id'];
		
		$strQ= "SELECT * FROM pengguna WHERE id = '$id'";
		$result2 = mysqli_query($conn, $strQ);
			while($data=mysqli_fetch_array($result2, MYSQLI_ASSOC)) {
				$namaU = $data['nama'];
			}
	 }
	
//mengisi judul dan header tabel
$judul1 = "BOOKING ONLINE CLASS SYSTEM";
$judul2 = "Form Hasil Approve Booking Class";

require_once ("../fpdf/fpdf.php");
$pdf = new FPDF;
$pdf->AddPage();

$pdf->Image('../images/logo.jpg',15,2,35);
$pdf->Image('../images/guntingku.PNG',8,75,16);
$pdf->SetFont('Arial','B','15'); //Font Arial, Tebal/Bold, ukuran font 16
$pdf->Cell(0,10, $judul1, '0', 50, 'C');
$pdf->SetFont('Arial','B','14');
$pdf->Cell(0,4, $judul2, '0', 0, 'C');
$pdf->Ln();
$pdf->Ln();
$pdf->Ln();
$pdf->Ln();

$pdf->SetFont('Arial','B','9');
$pdf->Cell(0,8, 'ID Form        : '.$idform.'', '0', 10, 'R');
$pdf->SetFont('Arial','','9');
$pdf->Cell(100,0, 'Peminjam 						: '.$namaU.'',0,0,'L');
$pdf->Cell(50,0,'Tanggal Peminjaman   : '.$tanggal_peminjaman.'1',0,1,'L');
$pdf->Cell(100,10, 'Rencana Awal        					: '.$rencana_awal.'',0,0,'L');
$pdf->Cell(50,10,'Rencana Akhir  : '.$rencana_akhir.'',0,1,'L');
$pdf->Cell(100,0, 'Ruangan 		: '.$ruangan.'',0,0,'L'); 
$pdf->Cell(50,10,'Keperluan  : '.$keperluan.'',0,0,'L');

$pdf->SetFont('Arial','','');
$pdf->Cell(0,55, '- - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -', '0', 0, 'C');

 

//output file pdf
$pdf->Output();


?>

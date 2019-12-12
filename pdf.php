<?php
//koneksi ke database
	// include('function.php');
	//include_once ("function.php");
	//include_once ('fpdf/fpdf.php');
	//include_once ("database/koneksi.php");
	$idform = $_GET['idform'];
	
	 $conn = new mysqli('localhost', 'root', '', 'pinjam_kelas');
	 if(!$conn){
	 	die("database connection problem");
	 }
	 $db_use = mysqli_select_db($conn,"pinjam_kelas") or die("select db problem");

	 
	 //mengambil data dari table
	 $sql=mysqli_query($conn, "select * from  form_peminjaman inner join ruangan on form_peminjaman.id_ruangan = ruangan.id_ruangan where idform = '$idform'");
	 while ($item = mysqli_fetch_array($sql, MYSQLI_ASSOC)) {
		$idform = $item['idform'];
		$tanggal_peminjaman = $item['tanggal_peminjaman'];
		$rencana_awal = $item['rencana_awal'];
		$rencana_akhir = $item['rencana_akhir'];
		$ruangan = $item['nama_ruangan'];
		$keperluan = $item['keperluan'];
		$iduser = $item['id'];
		$id_user = "";
		
		$strN="SELECT * FROM mahasiswa m INNER JOIN form_peminjaman n ON m.id_user = n.id AND n.id= '$iduser'";
		$result = mysqli_query($conn, $strN);
		while($items=mysqli_fetch_array($result, MYSQLI_ASSOC)) {
				$id_user = $items['nama'];
			}
	
	
//mengisi judul dan header tabel
$judul1 = "BOOKING ONLINE CLASS SYSTEM";
$judul2 = "Form Hasil Approve Booking Class";

//memanggil fpdf
require_once ("fpdf/fpdf.php");
$pdf = new FPDF;
$pdf->AddPage();
//tampilan juful laporan
//$pdf->Image('images/logo.jpg',15,2,35);
//$pdf->Image('images/guntingku.PNG',8,75,16);

$pdf->SetFont('Arial','B','15'); //Font Arial, Tebal/Bold, ukuran font 16
$pdf->Cell(0,10, $judul1, '0', 50, 'C');

$pdf->SetFont('Arial','B','14');
$pdf->Cell(0,4, $judul2, '0', 0, 'C');

$pdf->Ln();
$pdf->Ln();
$pdf->Ln();
$pdf->Ln();

$pdf->SetFont('Arial','B','9');
$pdf->Cell(0,8, 'ID Form : '.$idform.'', '0', 10, 'R');
$pdf->SetFont('Arial','','9');
$pdf->Cell(100,0, 'Peminjam : ' .$id_user. '',0,0,'L');
$pdf->Cell(50,0,'Tanggal Peminjaman : ' .$tanggal_peminjaman.'1',0,1,'L');
$pdf->Cell(100,10, 'Rencana Awal: '.$rencana_awal.'',0,0,'L');
$pdf->Cell(50,10,'Rencana Akhir  : '.$rencana_akhir.'',0,1,'L');
$pdf->Cell(100,0, 'Ruangan 		: '.$ruangan.'',0,0,'L'); 
$pdf->Cell(50,0,'Keperluan  : '.$keperluan.'',0,0,'L');

$pdf->Ln();
$pdf->SetFont('Arial','','');
$pdf->Cell(0,55, '- - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -', '0', 0, 'C');

 

//output file pdf
$pdf->Output();

	 }
?>

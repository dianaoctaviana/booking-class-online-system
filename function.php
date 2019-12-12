<?php 
global $conn;
	$conn = new mysqli('localhost', 'root', '', 'pinjam_kelas');
	if(!$conn){
		die("database connection problem");
	}
	$db_use = mysqli_select_db($conn,"pinjam_kelas") or die("select db problem");

	function execQ($strQ){
		global $conn;
		$res = mysqli_query($conn, $strQ);

		return $res;
	}

	function closeConn()
	{
		global $con;

		$res = mysqli_close($con);

		return $res;

	}
	function getDataUser($id) {
		$strQ = "SELECT * FROM pengguna WHERE id = '$id'";
		$resUs = execQ($strQ);
		return $resUs;
	}
	function getDataUser2($id) {
		$strQ = "SELECT m.nama FROM mahasiswa m INNER JOIN pengguna n ON m.id_user = n.user AND n.user= '$id'";
		$resUs = execQ($strQ);
		return $resUs;
	}

	function getDataUserFormPeminjaman(){
	$strQ = "select * from  form_peminjaman inner join ruangan on form_peminjaman.id_ruangan = ruangan.id_ruangan";
	$resTrans = execQ($strQ);
	return $resTrans;
	}
	
	
	
	function accPesanan($idform){
		global $conn;
		$Query = "SELECT * FROM form_peminjaman WHERE idform = '$idform'";
		$result = mysqli_query($conn, $Query);

		
		$strQ = "UPDATE form_peminjaman SET status='Disetujui' WHERE idform ='$idform'";
		$resultD = mysqli_query($conn, $strQ);


		
		if($resultD){
		 	header('Location: setujui.php');
		 }else{
		 	echo "Pengiriman gagal";
		 }

	}
	
	function deletePesanan($idform){
		global $conn;
		$Query = "SELECT * FROM form_peminjaman WHERE idform = '$idform'";
		$result = mysqli_query($conn, $Query);

		
		$strQ = "UPDATE form_peminjaman SET status='Ditolak' WHERE idform='$idform'";
		$resultD = mysqli_query($conn, $strQ);
	
		if($resultD){
		 	header('Location: alasan.php');
		 }else{
		 	echo "Pengiriman gagal";
		 }

	}
	
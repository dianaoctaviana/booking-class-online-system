<?php

include_once("../database/koneksi.php");


$idform = $_GET['idform'];


$result = mysqli_query($Open, "DELETE FROM form_peminjaman WHERE idform=$idform");


header("Location:history_booking.php");
?>
 <?php
 global $Open;
  $Open = mysqli_connect("localhost", "root", "");
    if (!$Open) {
        die("database connect problem");
    }
      $koneksi = mysqli_select_db($Open, "pinjam_kelas") or die ("selet db problem !!");
  
?>

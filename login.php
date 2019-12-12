<?php
session_start();
include "database/koneksi.php";
$user = $_POST['user'];
$password = $_POST['password'];
$op = $_GET['op'];

if($op=="in"){
    $sql = mysqli_query($Open, "SELECT * FROM pengguna WHERE user='$user' AND password='$password'");

    if(mysqli_num_rows($sql)==1){//jika berhasil akan bernilai 1
        $qry = mysqli_fetch_array($sql);
        $_SESSION['user'] = $qry['USER'];
        $_SESSION['password'] = $qry['PASSWORD'];
        $_SESSION['level'] = $qry['LEVEL'];
        if($qry['LEVEL']=="Admin"){
            header("location:admin/home_admin.php");
        }else if($qry['LEVEL']=="user"){
            header("location:user/home_user.php");
        }
    }else{
        ?>
        <script language="JavaScript">
            alert('Username atau Password tidak sesuai. Silahkan diulang kembali!');
            document.location='index.php';
        </script>
        <?php
    }
}else if($op=="out"){
    unset($_SESSION['user']);
    unset($_SESSION['level']);
    header("location:index.php");
}
?>
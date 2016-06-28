<?php
session_start();
include "koneksi.php";

$username = $_POST['username'];
$password = $_POST['password'];
$password = md5($password);
// var_dump($_POST, $password);die;
$op = $_GET['op'];

if($op=="in"){

$cek = mysql_query("SELECT * FROM tuser WHERE username ='$username' and password ='$password'");
    if(mysql_num_rows($cek)==1){//jika berhasil akan bernilai 1
        $c = mysql_fetch_array($cek);		
        $_SESSION['username'] = $c['username'];
		header("location:user/user-home.php");
 
	}else{
         die("No Peserta Salah  <a href=\"javascript:history.back()\">kembali</a>");
    }
}else if($op=="out"){
    unset($_SESSION['pengguna']);
    unset($_SESSION['level']);
    header("location:loginsiswa.php");
	}
?>

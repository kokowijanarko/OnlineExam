<?php
session_start();
include "koneksi.php";

$no_peserta = $_POST['no_peserta'];
$password = $_POST['password'];
$password = md5($password);
// var_dump($_POST, $password);die;
$op = $_GET['op'];

if($op=="in"){

$cek = mysql_query("SELECT * FROM tuser WHERE nomor_peserta ='$no_peserta' and password ='$password'");
    if(mysql_num_rows($cek)==1){//jika berhasil akan bernilai 1
        $c = mysql_fetch_array($cek);		
        $_SESSION['username'] = $c['username'];
        $_SESSION['no_peserta'] = $c['nomor_peserta'];
        $_SESSION['jurusan'] = $c['jurusan'];
        $_SESSION['nama_lengkap'] = $c['nama'];
        $_SESSION['user_id'] = $c['id'];
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

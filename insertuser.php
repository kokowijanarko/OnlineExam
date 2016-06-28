<?php
//panggil file config.php untuk menghubung ke server
include "koneksi.php";
//var_dump($_POST);die;
//tangkap data dari form

$nama= $_POST['nama'];
$username= $_POST['username'];
$email= $_POST['emial'];
$telepon = $_POST['telepon'];
$password = $_POST['password'];
$conf_password = $_POST['conf_password'];
$tanggal=date("Y-m-d H:i:s");

//simpan data ke database
if($password == $conf_password){
	$pass = md5($password);
	$query = mysql_query("
	insert into tuser 
	values(
	'',
	'$nama', 
	'$username', 
	'$email',
	'$telepon', 
	'$pass',
	'$tanggal')") or die(mysql_error());

	if ($query) {
		header('location:loginsiswa.php?msg=1');
	}
}else{
	echo '<script>alert("password tidak singkron")</script>';
	header('location:register.php');
}
?>
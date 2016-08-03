<?php
session_start();
//panggil file config.php untuk menghubung ke server
include "koneksi.php";
//var_dump($_POST);die;
//tangkap data dari form

$nama= $_POST['nama'];
$no_peserta= $_POST['no_peserta'];
$jurusan= $_POST['jurusan'];
$username= $_POST['username'];
$email= $_POST['email'];
$telepon = $_POST['telepon'];
$password = $_POST['password'];
$conf_password = $_POST['conf_password'];
$tanggal=date("Y-m-d H:i:s");

$qry_cek = mysql_query("SELECT * FROM tuser WHERE nomor_peserta = '".$no_peserta."'");
$result = mysql_fetch_assoc($qry_cek);
//var_dump($result);die;


//simpan data ke database
if(!$result){
	unset($_SESSION['msg']);
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
		'$tanggal',
		'$jurusan',
		'$no_peserta')") or die(mysql_error());

		if ($query) {
			header('location:loginsiswa.php?msg=1');
		}
	}else{
		echo '<script>alert("password tidak singkron")</script>';
		
		header('location:register.php');
	}
}else{
	$_SESSION['msg'] = $_POST;
	$msg_nama = '';
	$msg_username = '';
	$msg_email = '';
	
	if($nama == $result['nama']){
		$msg_nama = ', Nama Lengkap';
	}
	
	if($username == $result['username']){
		$msg_username = ', Username';
	}
	
	if($email == $result['email']){
		$msg_email = ', Email';
	}
	
	echo '
		<script>
			if(confirm("Nomor Peserta '. $msg_nama . $msg_username . $msg_email .' Sudah Terdaftar!")){
				window.location = "register.php";
			}else{
				window.location = "index.php";
			}
		</script>
	';
	//header('location:register.php');
}


?>
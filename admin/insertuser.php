<?php
//panggil file config.php untuk menghubung ke server
include "../koneksi.php";

//tangkap data dari form
$nama = $_POST['nama'];
$email= $_POST['email'];
$password = $_POST['password'];
$jabatan = $_POST['jabatan'];
$id = $_POST['id'];
//simpan data ke database
if($id == 0){
	$query = mysql_query("insert into member values('','$nama', '$email', '$password','$jabatan','admin')") or die(mysql_error());
	if ($query) {
		header('location:admin-home.php?page=users&msg=1');
	}
}else{
	$query = mysql_query("
		UPDATE member 
		SET
			`nama` = '$nama',
			`email` = '$email',
			`password` = '$password',
			`divisi` = '$jabatan',
			`typeuser` = 'admin'
		WHERE `Id` = '$id'	
	");
	if ($query) {
		header('location:admin-home.php?page=users&msg=2');
	}
}

?>
<?php
include "../koneksi.php";
$id = $_GET['id'];
$query = mysql_query("DELETE FROM member WHERE Id='$id'");
if($query){
	header('location:admin-home.php?page=users&msg=3');
}else{
	header('location:admin-home.php?page=users&msg=4');
}
?>
<?php
	include "../koneksi.php";
	$soal_id = $_GET['slid'];
	$mapel_id = $_GET['mpl'];
	$result = mysql_query('DELETE FROM soal WHERE soalid='.$soal_id) or die(mysql_error());
	
	if($result){
		header('location:admin-home.php?page=list_soal&id='.$mapel_id);
		
	}
?>
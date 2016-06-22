<?php
include 'koneksi.php';
if(isset($_GET)){
	
	if(!is_null($_GET['id'])){
		$id=$_GET['id'];
		$sql = mysql_query("DELETE FROM mapel WHERE mapel_id=$id") or die(mysql_error());
		
		//var_dump($sql);die;
		
		if($sql){	
			$msg='1';
		}else{
			$msg='2';
		}
			header('location:list_mapel.php?msg='.$msg);
	}
}


?>
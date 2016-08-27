<?php
include '../koneksi.php';
if(isset($_GET)){
	
	if(!is_null($_GET['id'])){
		$id=$_GET['id'];
		$asd = 'DELETE FROM mapel WHERE mapel_id=' .$id;
		//var_dump($asd);die;
		$sql = mysql_query($asd);
		
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
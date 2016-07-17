<?php
	include '../koneksi.php';
	$id = $_GET['id'];
	var_dump($id);
	
	$result = mysql_query('DELETE FROM score WHERE score_id='.$id);
	if($result){
		$result = $result && mysql_query('DELETE FROM detail_jawaban WHERE detail_jawaban_score_id='.$id);
	}else{
		header('location:admin-home.php?page=exam_result&&msg=1');
	}
	
	if($result){
		header('location:admin-home.php?page=exam_result&msg=2');
	}else{
		header('location:admin-home.php?page=exam_result&msg=3');
	}
?>
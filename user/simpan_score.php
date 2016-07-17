<div>
	<?php
	include "../koneksi.php";
	if(isset($_POST)){
		var_dump($_POST);
		$id_user=$_POST['user_id'];
		$benar=$_POST['benar'];
		$salah=$_POST['salah'];
		$kosong=$_POST['kosong'];
		$point=$_POST['point'];
		$mapel=$_POST['mapel_id'];
		$tanggal=date("Y-m-d");
		
		$query=mysql_query("
			insert into score 
			(
				score_user_id, 
				score_mapel_id, 
				score_score, 
				score_answer_false, 
				score_answer_true, 
				score_answer_empty
			)
			values
			(
				'".$id_user."', 
				'".$mapel."', 
				'".$point."',
				'".$salah."',
				'".$benar."',
				'".$kososng."'
			)
		")or die(mysql_error());
		
		//insert_detail_jawaban
		$id_score = mysql_insert_id();
		
		for($i=0;$i<$_POST['jumlah'];$i++){
			//$batch .='("'. $id_score .'","'.$_POST['soal_id'][$i].'","'.$_POST['jawaban'][$_POST['soal_id'][$i]].'"),'; 
			$query = mysql_query("
				INSERT INTO detail_jawaban(
					detailjawaban_score_id,
					detailjawaban_soal_id,
					detailjawaban_jawaban				
				)VALUES(
					'".$id_score."',
					'".$_POST['soal_id'][$i]."',
					'".$_POST['jawaban'][$_POST['soal_id'][$i]]."'
				)
			")or die(mysql_error());		
		
		}
		
		//var_dump($batch);
		
		
		if($query){
			header('location:status.php?message=success&mapel='.$mapel);
		}else{
			header('location:status.php?message=failed&mapel='.$mapel);
		}
		
	}
	?>
	
</div>
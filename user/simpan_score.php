<div>

	
	<?php
	include "koneksi.php";
	if(isset($_POST['submit'])){
		var_dump($_POST);
		$id_user=$_POST['username'];
		$benar=$_POST['benar'];
		$salah=$_POST['salah'];
		$kosong=$_POST['kosong'];
		$point=$_POST['point'];
		$mapel=$_POST['mapel_id'];
		$tanggal=date("Y-m-d");
		
		$query=mysql_query("insert into score 
		(score_nim, score_mapel_id, score_score) values('".$id_user."', '".$mapel."', '".$point."')");
		
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
			");		
		
		}
		
		//var_dump($batch);
		
		die;
		if($query){
			?><script language="javascript">document.location.href='status.php?message=success'</script><?php
		}else{ ?>
			<script language="javascript">document.location.href='status.php?message=failed'</script><?php
		}
		
	}
	?>
	
</div>
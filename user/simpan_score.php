<div>

	
	<?php
	include "koneksi.php";
	if(isset($_POST['submit'])){
	
		$id_user=$_POST['username'];
		$benar=$_POST['benar'];
		$salah=$_POST['salah'];
		$kosong=$_POST['kosong'];
		$point=$_POST['point'];
		$mapel=$_POST['mapel_id'];
		$tanggal=date("Y-m-d");
		
		$query=mysql_query("insert into score 
		(score_nim, score_mapel_id, score_score) values('".$id_user."', '".$mapel."', '".$point."')");
		
		if($query){
			?><script language="javascript">document.location.href='status.php?message=success'</script><?php
		}else{ ?>
			<script language="javascript">document.location.href='status.php?message=failed'</script><?php
		}
		
	}
	?>
	
</div>
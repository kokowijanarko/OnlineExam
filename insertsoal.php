 <?php
	//var_dump($_POST);die;
	include "../koneksi.php";
	//var_dump($_POST);
	$soalt=$_POST['soalt'];
	$date=$_POST['date'];
	$keyjab=$_POST['keyjab'];
	$pil_1=$_POST['pil_1'];
	$pil_2=$_POST['pil_2'];
	$pil_3=$_POST['pil_3'];
	$pil_4=$_POST['pil_4'];
	$mapel_id=$_POST['mapel_id'];
	$soal_id=$_POST['soal_id'];
	//var_dump($mapel_id);die;
	if(empty($soal_id) || $soal_id == ''){
		$query=mysql_query("INSERT INTO soal 
		(mapel_id, jawaban, pertanyaan, pilihan_a, pilihan_b, pilihan_c, pilihan_d, date)		
		VALUES
		('$mapel_id','$keyjab','$soalt','$pil_1','$pil_2','$pil_3','$pil_4', $date)")or die(mysql_error());	
		
		if($query){
			echo 'javascript:alert("berhasil menambahkan soal!")';
			header('location:input_soal.php?mpl='.$mapel_id);
		}
	}else{
		$query = mysql_query("
			UPDATE soal
			SET				
				`mapel_id` = '$mapel_id',
				`jawaban` = '$keyjab',
				`pertanyaan` = '$soalt',
				`pilihan_a` = '$pil_1',
				`pilihan_b` = '$pil_2',
				`pilihan_c` = '$pil_3',
				`pilihan_d` = '$pil_4',
				`date` = '$date'
			WHERE 
				`soalid` = '$soal_id'
		") or die(mysql_error());
		if($query){
			echo '<script>alert("berhasil mengubah soal!")</script>';
			header('location:admin-home.php?page=list_soal&id='.$mapel_id);
		}
	}
if ($query) {
?>
	<script> document.location.href='input_soal.php?message=success&id=<?php echo $id?>';</script>
<?php }
?>
 <?php
	//var_dump($_POST);die;
	include "../koneksi.php";
	$soalt=$_POST['soalt'];
	$keyjab=$_POST['keyjab'];
	$pil_1=$_POST['pil_1'];
	$pil_2=$_POST['pil_2'];
	$pil_3=$_POST['pil_3'];
	$pil_4=$_POST['pil_4'];
	$mapel_id=$_POST['mapel_id'];
	$soal_id=$_POST['soal_id'];
	
	if(empty($soal_id) || $soal_id == ''){
		$query=mysql_query("INSERT INTO soal 
		(mapel_id, jawaban, pertanyaan, pilihan_a, pilihan_b, pilihan_c, pilihan_d)
		
		VALUES('$id','$keyjab','$soalt','$pil_1','$pil_2','$pil_3','$pil_4')")or die(mysql_error());	
		
		if($query){
			echo 'javascript:alert("berhasil menambahkan soal!")';
			header('location:input_soal?mpl='.$mapel_id);
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
				`pilihan_d` = '$pil_4'
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
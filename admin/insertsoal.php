 <?php
	//var_dump($_POST);die;
	include "../koneksi.php";
	$soalt=$_POST['soalt'];
	$keyjab=$_POST['keyjab'];
	$pil_1=$_POST['pil_1'];
	$pil_2=$_POST['pil_2'];
	$pil_3=$_POST['pil_3'];
	$pil_4=$_POST['pil_4'];
	$id=$_POST['id'];
	
	$query=mysql_query("INSERT INTO soal 
	(mapel_id, jawaban, pertanyaan, pilihan_a, pilihan_b, pilihan_c, pilihan_d)
	
	VALUES('$id','$keyjab','$soalt','$pil_1','$pil_2','$pil_3','$pil_4')")or die(mysql_error());

if ($query) {
?>
	<script> document.location.href='input_soal.php?message=success&id=<?php echo $id?>';</script>
<?php }
?>
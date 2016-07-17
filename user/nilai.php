<?php
session_start();
include "../koneksi.php";

?>

<?php 
error_reporting(0);
?>

<?php
$conf 	   = mysql_query("select * from mini_config");
$view_conf = mysql_fetch_array($conf);
?>
<html>
<head>
<title>::Test Ujian Online::.</title>

<link rel="stylesheet" type="text/css" href="files/style_admin.css" />

<script src="files/jquery.js" type="text/javascript"></script>
<script src="files/sdmenu.js" type="text/javascript"></script>
<script src="tinymce/jscripts/tiny_mce/tiny_mce.js" type="text/javascript"></script>
<script src="tinymce/jscripts/tiny_mce/tiny_miniw0rm.js" type="text/javascript"></script>

<script type="text/javascript">
	var myMenu;
	window.onload = function() {
	myMenu = new SDMenu("my_menu");
	myMenu.init();
	};
</script>
</head>

<body>
<div id="main">

<!-- Menu Left -->
<div id="left">
<img src="images/images_admin/bg_admin_banner.png" alt="Aldyfrz" class="aldyfrz" />
<?php include "menu-left.php"; ?> 
</div>


<!-- Right Content -->
<div id="right">

<!-- Header Right -->
<div id="header-content">
<?php include "header.php"; ?>
</div>

<!-- Content Right -->

<?php
echo"
<div id=\"content\" style=\"height:autopx\">
<div id=\"title_content\">
<img src=\"images/images_admin/icon_admin_user.png\" align=\"absmiddle\" class=\"img_title\" /> Soal Agama
</div>";
?>
<?php
include "../koneksi.php";
		$score=0;
		$benar=0;
		$salah=0;
		$kosong=0;
       if(isset($_POST['submit'])){
		   //var_dump($_POST);
			$pilihan=$_POST["pilihan"];
			$id_soal=$_POST["id"];
			$jumlah=$_POST['jumlah'];
			
			
			
			for ($i=0;$i<$jumlah;$i++){
				//id nomor soal
				$nomor=$id_soal[$i];			
				//jika user tidak memilih jawaban
				if (empty($pilihan[$nomor])){
					$kosong++;
					//echo $kosong;
				}else{
					//jawaban dari user
					$jawaban=$pilihan[$nomor];
					//echo $jawaban;
					
					//cocokan jawaban user dengan jawaban di database
					$query=mysql_query("select * from soal where soalid='$nomor' and jawaban='$jawaban'");
					
					$cek=mysql_num_rows($query);
					
					if($cek){
						//jika jawaban cocok (benar)
						$benar++;
					}else{
						//jika salah
						$salah++;
					}
					
				}
				
				$score = $benar*(100/$jumlah);
				//var_dump($score);
			}
		}
		?>
        <form action="simpan_score.php" method="post" id="form-area">
		
		<?php 
		
			$view_score = ($score <= 0)?0:$score;
			echo "Score Anda <b>".$view_score."</b> (Skala 100)";
			echo '
				<ul>
					<li>Jawaban Benar <b>'.$benar.'</b></li>
					<li>Jawaban Salah <b>'.$salah.'</b></li>
					<li>Jawaban Kosong <b>'.$kosong.'</b></li>
				</ul>
			
			';
		
		?>
        
        <input type="hidden" name="user_id" value="<?php echo $_SESSION['user_id']?>" />
        <input type="hidden" name="benar" value="<?php echo $benar;?>" />
        <input type="hidden" name="salah" value="<?php echo $salah;?>" />
        <input type="hidden" name="kosong" value="<?php echo $kosong;?>" />
        <input type="hidden" name="point" value="<?php echo $score;?>" />
        <input type="hidden" name="mapel_id" value="<?php echo $_POST['mapel_id'];?>" />
        <input type="hidden" name="jumlah" value="<?php echo $_POST['jumlah'];?>" />
		<?php
			for ($i=0;$i<$jumlah;$i++){
				echo ' <input type="hidden" name="soal_id[]" value="'.$_POST['id'][$i].'" />';
				echo ' <input type="hidden" name="jawaban['.$_POST['id'][$i].']" value="'.$_POST['pilihan'][$_POST['id'][$i]].'" />';
			}
		?>
		
        <input type="submit" name="hidden" value="Simpan Nilai" />
        
        </form> 
		

</div>
</ol>

<?php
echo"</div>
";
break;
?>

<!-- don't Change it ;) -->
<div class="clear"></div>

</div>
</body>
</html>


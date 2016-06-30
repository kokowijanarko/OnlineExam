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
<title>Login Admin</title>

<link rel="stylesheet" type="text/css" href="files/style_admin.css" />
<link rel="shorcut icon" href="images/images_admin/img_icon.gif" />
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
$mapel_id = $_GET['mpl'];
if(isset($_GET['slid']) && isset($_GET['mpl'])){
	$soal_id = $_GET['slid'];
	
	$qry = mysql_query('select * from soal where soalid='.$soal_id);
	$soal = mysql_fetch_assoc($qry);
	//var_dump($soal, $soal_id, $mapel_id);die;
	if(!empty($soal)){
		$soal_id = $soal['soalid'];
		$pertanyaan = $soal['pertanyaan'];
		$pilihan_a = $soal['pilihan_a'];
		$pilihan_b = $soal['pilihan_b'];
		$pilihan_c = $soal['pilihan_c'];
		$pilihan_d = $soal['pilihan_d'];
		$jawaban = $soal['jawaban'];
	}
	//var_dump($soal);die;
}else{
	$soal_id = '';
	$pertanyaan = '';
	$pilihan_a = '';
	$pilihan_b = '';
	$pilihan_c = '';
	$pilihan_d = '';
	$jawaban = '';
}


echo"
<div id=\"content\" style=\"height:650px\">
<div id=\"title_content\">
<img src=\"images/images_admin/icon_admin_user.png\" align=\"absmiddle\" class=\"img_title\" /> Input Soal $mapel
</div>
";
 if (!empty($_GET['message']) && $_GET['message'] == 'success') {
                echo '<h3>Berhasil menambah data!</h3>';
            }

echo "
<form action=\"insertsoal.php\" method=\"post\" id=\"form-area\" style=\"width:700px;\">
<input type=\"hidden\" name=\"soal_id\" id=\"form-input\" value=\"$soal_id\"  size=\"8\" /></br>
<input type=\"hidden\" name=\"mapel_id\" id=\"form-input\" value=\"$mapel_id\"  size=\"8\" /></br>

<div style=\"width:90px\" id=\"form-label\">Input Soal</div>
<input value='$pertanyaan' type=\"textarea\" name=\"soalt\" id=\"form-input\" required=\"required\" size=\"90\" />
<br />

<div style=\"width:100px\" id=\"form-label\">Pilihan Jawaban :</div><br><br>
<div style=\"width:90px\" id=\"form-label\">Pilihan A</div>
<input value='$pilihan_a'type=\"text\" name=\"pil_1\" id=\"form-input\" required=\"required\" size=\"40\" /><br>
<div style=\"width:90px\" id=\"form-label\">Pilihan B</div>
<input value='$pilihan_b' type=\"text\" name=\"pil_2\" id=\"form-input\" required=\"required\" size=\"40\" /><br>
<div style=\"width:90px\" id=\"form-label\">Pilihan C</div>
<input value='$pilihan_c' type=\"text\" name=\"pil_3\" id=\"form-input\" required=\"required\" size=\"40\" /><br>
<div style=\"width:90px\" id=\"form-label\">Pilihan D</div>
<input value='$pilihan_d' type=\"text\" name=\"pil_4\" id=\"form-input\" required=\"required\" size=\"40\" /><br>



<br />

<div style=\"width:90px\" id=\"form-label\">Kunci Jawaban</div>
<input value='$jawaban'type=\"text\" name=\"keyjab\" id=\"form-input\" required=\"required\" size=\"10\" />
<br />

<input type=\"submit\" name=\"Submit\" value=\"Simpan\" id=\"form-submit\" style=\"margin-bottom:5px\"/>
</form>
</div>
";
break;
?>

<!-- don't Change it ;) -->
<div class="clear"></div>

</div>
</body>
</html>


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

//saving mapel
if(isset($_POST['Submit'])){
	$query = mysql_query('INSERT INTO mapel (mapel_name, mapel_duration, mapel_desc) VALUES ("'.$_POST['mapel'].'", "'.$_POST['durasi'].'", "'.$_POST['desc'].'")');
	if($query == true){
		echo '<script>
			$.ajax({
				url:"http://localhost/ujianonline/admin/input_soal_mapel_baru.php",
				method : "post",
				data : {"message":"success"} 
			})		
		</script>';
	}
}
?>
<html>
<head>
<title>Input Mapel dan Soal</title>

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

echo"
<div id=\"content\" style=\"height:650px\">
<div id=\"title_content\">
<img src=\"images/images_admin/icon_admin_user.png\" align=\"absmiddle\" class=\"img_title\" /> Input Soal Agama
</div>
";
 if ($_POST['message'] == 'success') {
                echo '<h3>Berhasil menambah data!</h3>';
            }
			
echo "
<form action=\"input_soal_mapel_baru.php\" method=\"post\" id=\"form-area\" style=\"width:700px;\">
<div style=\"width:90px\" id=\"form-label\">Mata Pelajaran</div>
<input type=\"text\" name=\"mapel\" id=\"form-input\" required=\"required\" size=\"40\" /><br>
<div style=\"width:90px\" id=\"form-label\">Durasi</div>
<input type=\"number\" name=\"durasi\" id=\"form-input\" required=\"required\" size=\"30\" /> menit<br>
<div style=\"width:90px\" id=\"form-label\">Deskripsi</div>
<input type=\"text\" name=\"desc\" id=\"form-input\" size=\"40\" /><br>

<input type=\"submit\" name=\"Submit\" value=\"Save\" id=\"form-submit\" style=\"margin-bottom:5px\"/>
</form>
</div>
";
?>

<!-- don't Change it ;) -->
<div class="clear"></div>

</div>
</body>
</html>


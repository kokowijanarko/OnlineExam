<?php
session_start();
include "koneksi.php";

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
<title>.::Registrasi::.</title>

<link rel="stylesheet" type="text/css" href="admin/files/style_admin.css" />
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
<div id="main2">

<!-- Menu Left -->



<!-- Right Content -->
<div id="right">

<!-- Header Right -->


<!-- Content Right -->

<?php
echo"
<div>
	<div id=\"\" style=\"height:100px\">
		<a href='register.php'>
			<img src=\"admin/images/images_admin/icon_admin_user.png\" align=\"absmiddle\" class=\"img_title\" />
		</a>
		<font size=\"5px\" color=\"white\">REGISTRASI</font><br>
	</div>
	
	<div id=\"\" style=\"height:100px\">
		<a href='loginsiswa.php'>
			<img src=\"admin/images/images_admin/icon_admin_user.png\" align=\"absmiddle\" class=\"img_title\" />
		</a>
		<font size=\"5px\" color=\"white\">SUDAH PUNYA AKUN</font><br>
	</div>
</div>
";
?>


<!-- don't Change it ;) -->
<div class="clear"></div>

</div>
</body>
</html>


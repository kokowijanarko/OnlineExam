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
<title>.::MA Nurul Ummah Ujian Online::.</title>

<link rel="stylesheet" type="text/css" href="files/style_admin.css" />
<link rel="shorcut icon" href="manu.ico">
<script src="files/jquery.js" type="text/javascript"></script>
<script src="files/sdmenu.js" type="text/javascript"></script>
<script src="files/tiny_mce.js" type="text/javascript"></script>
<script src="files/tiny_miniw0rm.js" type="text/javascript"></script>

<script type="text/javascript">
	var myMenu;
	window.onload = function() {
	myMenu = new SDMenu("my_menu");
	myMenu.init();
	};
</script>
<link rel="shorcut icon" href="manu.ico" />
</head>

<body>
<div id="main">

<!-- Menu Left -->
	<div id="left">
<img src="images/images_admin/bg_admin_banner.png"  class="aldyfrz" />
<?php include "menu-left.php"; ?> 
</div>


<!-- Right Content -->
<div id="right">

<!-- Header Right -->
<div id="header-content">
<?php include "header.php"; ?>
</div>

<!-- Content Right -->
<?php include "page.php"; ?>


</div>

<!-- don't Change it ;) -->
<div class="clear"></div>

</div>
</body>
</html>
<?php
session_start();
include "../koneksi.php";

$id = !empty($_GET['id'])?$_GET['id']:'0';
$sql_detail_user = mysql_query('SELECT * FROM member WHERE Id='.$id) or die(mysql_error);
$detail_user = mysql_fetch_assoc($sql_detail_user);
$judul = 'INPUT USER BARU';
if($detail_user){
	if(!empty($detail_user)){
		$nama = $detail_user['nama'];
		$email = $detail_user['email'];
		$password = $detail_user['password'];
		$divisi = $detail_user['divisi'];
	}
	
	$judul = 'EDIT USER';
}

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
<title>Login Panel</title>

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
<img src=\"images/images_admin/icon_admin_user.png\" align=\"absmiddle\" class=\"img_title\" /> $judul
</div>
";
 if (!empty($_GET['message']) && $_GET['message'] == 'success') {
                echo '<h3>Berhasil menambah data!</h3>';
            }
			
echo "
<form action=\"insertuser.php\" method=\"post\" id=\"form-area\" style=\"width:385px;\">
<div style=\"width:90px\" id=\"form-label\">Nama</div>
<input value='".$nama."' type=\"text\" name=\"nama\" id=\"form-input\" required=\"required\" size=\"40\" />
<input value='".$id."'type=\"hidden\" name=\"id\" id=\"form-input\" required=\"required\" size=\"40\" />
<br />

<div style=\"width:90px\" id=\"form-label\">Email</div>
<input value='".$email."' type=\"text\" name=\"email\" id=\"form-input\" required=\"required\" size=\"40\" />
<br />

<div style=\"width:90px\" id=\"form-label\">Password</div>
<input value='".$password."' type=\"password\" name=\"password\" id=\"form-input\" required=\"required\" size=\"40\" />
<br />

<div style=\"width:90px\" id=\"form-label\">Jabatan</div>
<input value='".$divisi."' type=\"text\" name=\"jabatan\" id=\"form-input\" required=\"required\" size=\"40\" />
<br />

<input type=\"submit\" name=\"Submit\" value=\"Add New And Save\" id=\"form-submit\" style=\"margin-bottom:5px\"/>
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


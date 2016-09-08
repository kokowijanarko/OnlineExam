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
<div id=\"\" style=\"height:650px\">
<div id=\"\">
<img src=\"admin/images/images_admin/icon_admin_user.png\" align=\"absmiddle\" class=\"img_title\" /> <font size=\"5px\" color=\"white\">REGISTRATION</font><br>

</div>
";
 if (!empty($_GET['message']) && $_GET['message'] == 'success') {
                echo '<h3>Berhasil menambah data!</h3>';
            }
$nama = '';
$no_peserta = '';
$jurusan = '';
$username = '';
$email = '';
$telepon = '';

if(!empty($_SESSION['msg'])){
	
	$nama = $_SESSION['msg']['nama'];
	$no_peserta = $_SESSION['msg']['no_peserta'];
	$jurusan = $_SESSION['msg']['jurusan'];
	$username = $_SESSION['msg']['username'];
	$email = $_SESSION['msg']['email'];
	$telepon = $_SESSION['msg']['telepon'];
}

$jurusan = array(
	array(
		'id'=>'1',
		'name'=>'IPA'
	),
	array(
		'id'=>'2',
		'name'=>'IPS'
	)

);
$opt_jurusan ='';
foreach($jurusan as $val){
	$cek='';
	if($detail['mapel_concentration'] == $val['name']){
		$cek = 'selected';
	}
	$opt_jurusan .= '<option value="'. $val['name'] .'" '. $cek .'>'. $val['name'] .'</option>';
}

	
	
echo "
<form action=\"insertuser.php\" method=\"post\" id=\"form-area\" style=\"width:400px;\">

<div style=\"width:100px\" id=\"form-label\">Nama Lengkap</div>
<input type=\"text\" name=\"nama\" id=\"form-input\" value= '".$nama."'required=\"required\" size=\"40\" />
<br />

<div style=\"width:100px\" id=\"form-label\">Nomor Peserta</div>
<input type=\"text\" name=\"no_peserta\" id=\"form-input\" value= '".$no_peserta."' required=\"required\" size=\"40\" />
<br />

<div style=\"width:90px\" id=\"form-label\">Jurusan</div>
<select name='jurusan' required><option value='xxx'>---Pilih---</option>". $opt_jurusan ."</select><br><br>

<div style=\"width:100px\" id=\"form-label\">Username</div>
<input type=\"text\" name=\"username\" id=\"form-input\" value= '".$username."' required=\"required\" size=\"40\" />
<br />

<div style=\"width:100px\" id=\"form-label\">email</div>
<input type=\"text\" name=\"email\" id=\"form-input\" value= '".$email."'  required=\"required\" size=\"40\" />
<br />

<div style=\"width:100px\" id=\"form-label\">No Telepon</div>
<input type=\"text\" name=\"telepon\" id=\"form-input\" value= '".$telepon."' required=\"required\" size=\"40\" />
<br />

<div style=\"width:100px\" id=\"form-label\">Password</div>
<input type=\"password\" name=\"password\" id=\"form-input\" required=\"required\" size=\"40\" />
<br />

<div style=\"width:100px\" id=\"form-label\">Ulangi Password</div>
<input type=\"password\" name=\"conf_password\" id=\"form-input\" required=\"required\" size=\"40\" />
<br />

<input type=\"submit\" name=\"Submit\" value=\"REGISTER\" id=\"form-submit\" style=\"margin-bottom:5px\"/>
</form>
</div>

";
?>


<!-- don't Change it ;) -->
<div class="clear"></div>

</div>
</body>
</html>


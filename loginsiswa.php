<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>..::: Login Siswa:::.</title>
<link rel="stylesheet" type="text/css" href="admin/files/style_login.css" />
<link rel="shorcut icon" href="manu.ico" />

<?php
	if(!empty($_GET['msg'])){
		$msg = $_GET['msg'];
		if($msg == 1){
			echo'
				<script>
					alert("Registrasi Sukses, Silakan Login");
				</script>
			';
		}else{
			echo'
				<script>
					alert("Registrasi Gagal !");
				</script>
			';
		}
	}
?>
<script type="text/javascript">
// var msg='<?php echo $_GET['msg']?>';
// if(msg == 1){
	// alert('Registrasi Sukses, Silakan Login');
// }else{
	// alert('Registrasi Gagal !');
// }
function validationlogin(form){
if (form.username.value == ""){
alert("Form Username tidak boleh kosong !");
form.username.focus();
return (false);
}
     
if (form.password.value == ""){
alert("Form Password tidak boleh kosong !");
form.password.focus();
return (false);
}
return (true);
}
</script>

</head>

<body OnLoad="document.login.username.focus();">

<div id="main">

<!-- Header -->
<div id="header"><img src="admin/images/images_login/img_login_header.png" alt="Miniw0rm" /><br><marquee><blink>Silahkan Masukan No Peserta dan Password</blink></marquee></div>

<!-- Middle -->
<div id="middle">
<form id="form-login" name="login" method="post" action="check-login1.php?op=in" onSubmit="return validationlogin(this)">
  
  <img src="admin/images/images_login/img_login_user.png" align="absmiddle" class="img_user" />
  <input type="text" name="no_peserta" size="29" id="input" placeholder="NOMOR PESERTA"/>
  <br />
	
  <img src="admin/images/images_login/img_login_pass.png" align="absmiddle" class="img_pass" />
  <input type="password" name="password" size="29" id="input" placeholder="PASSWORD"/>
  <br />
  
  <input name="Submit" type="image" value="Submit" src="admin/images/images_login/button_login.png" id="submit" align="absmiddle" />
</form>
</div>

<!-- don't Change ;) -->
<div class="clear"></div>

<!-- Footer -->
<div id="footer">Login Siswa | &copy; MA Nurul Ummah<br></div>

</body>
</html>

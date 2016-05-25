<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>..::: Login User:::.</title>
<link rel="stylesheet" type="text/css" href="../admin/files/style_login.css" />


<script type="text/javascript">
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
<div id="header"><img src="../admin/images/images_login/img_login_header.png" alt="Miniw0rm" /></div>

<!-- Middle -->
<div id="middle">
<form id="form-login" name="login" method="post" action="../check-login1.php?op=in" onSubmit="return validationlogin(this)">
  
  <img src="../admin/images/images_login/img_login_user.png" align="absmiddle" class="img_user" />
  <input type="text" name="username" size="29" id="input" placeholder="NIM"/>
  <br />
  <input type="password" name="password" size="29" id="pass" placeholder="Password" />
	</br>
  
  
  <input name="Submit" type="image" value="Submit" src="../admin/images/images_login/button_login.png" id="submit" align="absmiddle" />
</form>
</div>

<!-- don't Change ;) -->
<div class="clear"></div>

<!-- Footer -->
<div id="footer">Login User | &copy; MA NURUL UMMAH<br></div>

<!-- vertical_effect -->
<div id="vertical_effect">&nbsp;</div>

</div>
</body>
</html>

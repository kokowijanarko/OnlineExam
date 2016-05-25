<?php
session_start();
if(!empty($_SESSION[username]) || !empty($_SESSION[username])) {
include "error/error-access-denied-page.php";
}
else{
?>
<div id="content" style="height:650px;">
<div id="title_content">
<img src="images/images_admin/icon_admin_home.png" align="absmiddle" class="img_title" /> Dashboard
</div>

<div id="bg_content_welcome">
Selamat Datang Di Dashboard, Anda Login sebagai Admin , Jangan Lupa Logout Setelah Selesai Membuka Halaman Ini :)

</div>
<center><u><b><h1>Galery</h1></b></u></center>
<table border="2" align="center">
<tr>
<td><img width="200px" src="images/images_admin/nu.png" /><br><center>Halaman Depan</center></br></td>
<td><img width="200px" src="images/images_admin/pesertamos.png" /><br><center>Peserta Mos</center></br></td>
</tr>
<tr>
<td><img width="200px" src="images/images_admin/suasanapengajian.png" /><br><center>Suasana Pengajian</center></br></td>
<td><img width="200px" src="images/images_admin/karyasiswa.png" /><br><center>Karya Siswa</center></br></td>
</tr>
</div>
<?php
}
?>
<?php
session_start();
if(!empty($_SESSION[username]) || !empty($_SESSION[username])) {
include "error/error-access-denied-module.php";
}
else{
if ($_SESSION[typeuser]=='admin'){


// Halaman Awal Untuk Menampilkan Data
switch($_GET[act]){
default:

echo "
<script type=\"text/javascript\">
function warning() {
return confirm('Yakin Ingin Menghapus data ini?');
}
</script>
";

echo"
<div id=\"content\" style=\"height:100%px\">
<div id=\"title_content\">
<img src=\"images/images_admin/icon_admin_user.png\" align=\"absmiddle\" class=\"img_title\" /> Daftar Soal 

</div>
";
// var_dump($_POST['date']);die;
$date = !empty($_POST['date']) ? $_POST['date'] : null;

echo'
<form action="admin-home.php?page=list_soal&id='. $_GET['id'].'" method="POST">
<table>
	<tr>
		<td>Tanggal</td>
		<td>:</td>
		<td><input type="date" name="date" value="'. $date .'" placeholder="yyyy-mm-dd"></td>		
		<br />
		<td><input type="submit" name="submit" value="Cari"></td>
	</tr>	
</table>
</form>
<br>
<br>
';

echo"
<table width=\"730\" id=\"table1\">
<tr>
<td>
";

echo"
<div id=\"bg_content_data_title\">

<div style=\"width:10px\" align=\"center\">No</div>
<div style=\"width:70px\" align=\"left\">Tgl Ujian</div>
<div style=\"width:200px\" align=\"left\">Soal</div>
<div style=\"width:130px\" align=\"center\">Pilihan Jawaban</div>
<div style=\"width:50px\" align=\"center\">Kunci</div>
<div style=\"width:100px\" align=\"center\">Action</div>
</div>
";

$p       = new Paging;
$batas   = 10;
$posisi  = $p->cariPosisi($batas);
$id = $_GET['id'];
$xxx = "select * from soal where 1=1 ---src--- order by soalid ASC LIMIT $posisi,$batas";
$str = '';
if($_POST['date']){
	$str .= ' and `date`="'. $date .'"';
}
if($_GET['id']){
	$str .= ' AND mapel_id='. $_GET['id'];
}

$xxx = str_replace('---src---', $str, $xxx);
$sql	 = mysql_query($xxx);
//var_dump(mysql_fetch_array($sql));
$idx = 0;
$nomor = 1;

for($i = $posisi; $i <= ($batas + $posisi); $i++ ){
	$number[] = $i+1;
}
$i=0;
while($r = mysql_fetch_array($sql)){
$tgl = !empty($r['date']) ? date('Y-m-d', strtotime($r['date'])) : ' - ';
echo "
<div id=\"content_data\">
<div style=\"width:10px\">$number[$i].</div>
<div style=\"width:70px\">$tgl</div>
<div style=\"width:200px\" align=\"left\">$r[pertanyaan]</div>
<div style=\"width:130px\" align=\"left\">
A. $r[pilihan_a]<br><br>
B. $r[pilihan_b]<br><br>
C. $r[pilihan_c]<br><br>
D. $r[pilihan_d]<br><br>

</div>
<div style=\"width:50px\" align=\"center\">$r[jawaban]</div>
<div style=\"width:150px\" align=\"right\">

<img src=\"images/images_admin/img_admin_edit.png\" align=\"absmiddle\" class=\"img_edit\" />
<a href=\"input_soal.php?slid=$r[soalid]&mpl=$id\" class=\"action\">Edit</a>

<img src=\"images/images_admin/img_admin_delete.png\" align=\"absmiddle\" class=\"img_del\" />
<a href=\"delete_soal.php?slid=$r[soalid]&mpl=$id\" class=\"action\" onClick=\"return warning();\">Delete</a>

</div>
</div>
";

$i++;
}

echo "
</td>
</tr>
</table>
";

$jmldata=mysql_num_rows(mysql_query("select * from soal where mapel_id=". $_GET['id']));
$jmlhalaman  = $p->jumlahHalaman($jmldata, $batas);
$linkHalaman = $p->navHalaman($_GET[halaman], $jmlhalaman);
echo "<div id=\"pagging\">$linkHalaman</div>";
echo "</div>";
break;




// Halaman Untuk Edit Data
case "edit":
$msql = mysql_query("select * from tsoal1 where soalid='$_GET[id]'");
$rr   = mysql_fetch_array($msql);

echo"
<div id=\"content\" style=\"height:650px\">
<div id=\"title_content\">
<img src=\"images/images_admin/icon_admin_user.png\" align=\"absmiddle\" class=\"img_title\" /> Edit Soal Agama
</div>
";

echo "
<form action=\"insertsoalanalisa.php\" method=\"post\" id=\"form-area\" style=\"width:700px;\">
<div style=\"width:90px\" id=\"form-label\">No</div>
<input type=\"text\" name=\"no\" id=\"form-input\" required=\"required\" size=\"8\" value=\"$rr[soalid]\"/>
<br />

<div style=\"width:90px\" id=\"form-label\">Pertanyaan</div>
<input type=\"textarea\" name=\"soalt\" id=\"form-input\" required=\"required\" size=\"90\"  value=\"$rr[pertanyaan]\"/>
<br />

<div style=\"width:100px\" id=\"form-label\">Pilihan Jawaban :</div><br><br>
<div style=\"width:90px\" id=\"form-label\">Pilihan A</div>
<input type=\"text\" name=\"pil_1\" id=\"form-input\" required=\"required\" size=\"40\" value=\"$rr[pilihan_a]\" /><br>
<div style=\"width:90px\" id=\"form-label\">Pilihan B</div>
<input type=\"text\" name=\"pil_2\" id=\"form-input\" required=\"required\" size=\"40\" value=\"$rr[pilihan_b]\"/><br>
<div style=\"width:90px\" id=\"form-label\">Pilihan C</div>
<input type=\"text\" name=\"pil_3\" id=\"form-input\" required=\"required\" size=\"40\" value=\"$rr[pilihan_c]\"/><br>
<div style=\"width:90px\" id=\"form-label\">Pilihan D</div>
<input type=\"text\" name=\"pil_4\" id=\"form-input\" required=\"required\" size=\"40\" value=\"$rr[pilihan_d]\"/><br>



<br />

<div style=\"width:90px\" id=\"form-label\">Kunci Jawaban</div>
<input type=\"text\" name=\"keyjab\" id=\"form-input\" required=\"required\" size=\"10\" value=\"$rr[jawaban]\" />
<br />

<input type=\"submit\" name=\"Submit\" value=\"Update And Save\" id=\"form-submit\" style=\"margin-bottom:5px\"/>
</form>
</div>
";
break;

// Validation Form
if(empty($kode_pegawai)){
echo "
<div id=\"content\" style=\"height:650px\">
<div id=\"title_content\">
<img src=\"images/images_admin/icon_admin_user.png\" align=\"absmiddle\" class=\"img_title\" /> Data Pegawai
</div>
<div id=\"bg_content_error\">
<img src=\"images/images_admin/img_admin_error.png\" align=\"absmiddle\" class=\"img_del\" /> 
Maaf, Kode Pegawai Belum Di isi :) Silahkan Isi Lagi <a href='admin-home.php?page=datapegawai class='action'>Click Here</a>
</div>
</div>
";
}
else if(empty($_POST["nama_pegawai"])){
echo "
<div id=\"content\" style=\"height:650px\">
<div id=\"title_content\">
<img src=\"images/images_admin/icon_admin_user.png\" align=\"absmiddle\" class=\"img_title\" /> Data Pegawai
</div>
<div id=\"bg_content_error\">
<img src=\"images/images_admin/img_admin_error.png\" align=\"absmiddle\" class=\"img_del\" /> 
Maaf, Nama Pegawai Belum Di isi :) Silahkan Isi Lagi <a href='admin-home.php?page=datapegawai' class='action'>Click Here</a>
</div>
</div>
";
}
else if(empty($umur)){
echo "
<div id=\"content\" style=\"height:650px\">
<div id=\"title_content\">
<img src=\"images/images_admin/icon_admin_user.png\" align=\"absmiddle\" class=\"img_title\" /> Data Pegawai
</div>
<div id=\"bg_content_error\">
<img src=\"images/images_admin/img_admin_error.png\" align=\"absmiddle\" class=\"img_del\" /> 
Maaf, Umur Belum Diisi :) Silahkan Isi Lagi <a href='admin-home.php?page=datapegawai' class='action'>Click Here</a>
</div>
</div>
";
}
else if(empty($agama)){
echo "
<div id=\"content\" style=\"height:650px\">
<div id=\"title_content\">
<img src=\"images/images_admin/icon_admin_user.png\" align=\"absmiddle\" class=\"img_title\" /> Data Pegawai
</div>
<div id=\"bg_content_error\">
<img src=\"images/images_admin/img_admin_error.png\" align=\"absmiddle\" class=\"img_del\" /> 
Maaf, Email Belum Diisi :) Silahkan Isi Lagi <a href='admin-home.php?page=datapegawai' class='action'>Click Here</a>
</div>
</div>
";
}
else if(empty($alamat)){
echo "
<div id=\"content\" style=\"height:650px\">
<div id=\"title_content\">
<img src=\"images/images_admin/icon_admin_user.png\" align=\"absmiddle\" class=\"img_title\" /> Data Pegawai
</div>
<div id=\"bg_content_error\">
<img src=\"images/images_admin/img_admin_error.png\" align=\"absmiddle\" class=\"img_del\" /> 
Maaf, Email Belum Diisi :) Silahkan Isi Lagi <a href='admin-home.php?page=datapegawai' class='action'>Click Here</a>
</div>
</div>
";
}
else{
$process = mysql_query("INSERT INTO  pegawai(
  								     kode_pegawai,
                                     nama_pegawai,
                                     umur,
									 agama,
									 alamat,
									 ) 
	                          VALUES('$kode_pegawai',
                                     '$nama_pegawai',
                                     '$umur',
                                     '$agama'
									 '$alamat'
									 )");

// Check If Exsist Username
if($process){
echo "<meta http-equiv='refresh' content='0; url=admin-home.php?page=datapegawai'>";
}
else{
echo "
<div id=\"content\" style=\"height:650px;\">
<div id=\"title_content\">
<img src=\"images/images_admin/icon_admin_user.png\" align=\"absmiddle\" class=\"img_title\" /> Data Pegawai
</div>
<div id=\"bg_content_error\">
<img src=\"images/images_admin/img_admin_error.png\" align=\"absmiddle\" class=\"img_del\" /> 
Maaf, Username Sudah Ada Yang Memakai :) Silahkan Coba Username Yang Lain. 
<a href='admin-home.php?page=datapegawai' class='action'>Click Here</a>
</div>
</div>
";
}
}
break;


// Fungsi Untuk Prosess Delete Data
case "delete":
mysql_query("DELETE FROM tsoal1 WHERE soalid='$_GET[id]'");
echo "<meta http-equiv='refresh' content='0; url=admin-home.php?page=listsoalagama'>"; 
break;



break;
}

}
else{
echo "<meta http-equiv='refresh' content='0; url=../../error/error-access-denied-page.php'>";
}

}
?>
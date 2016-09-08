<?php
session_start();
include "../koneksi.php";
include "files/pagging.php";

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
<link rel="stylesheet" type="text/css" href="files/style_table.css" />
<link rel="shorcut icon" href="images/images_admin/img_icon.gif" />
<script src="../asset/js/jquery.2.1.1.min.js" type="text/javascript"></script>
<script src="files/jquery.js" type="text/javascript"></script>
<script src="files/sdmenu.js" type="text/javascript"></script>
<script src="tinymce/jscripts/tiny_mce/tiny_mce.js" type="text/javascript"></script>
<script src="tinymce/jscripts/tiny_mce/tiny_miniw0rm.js" type="text/javascript"></script>

<script type="text/javascript">
	var myMenu;
	
	window.onload = function() {
		myMenu = new SDMenu("my_menu");
		myMenu.init();
		
		$('#btn_delete_mapel').click(function(){
			confirm('Apakah Anda Yakin Menghapus Mapel Ini ?');
		});
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
<img src=\"images/images_admin/icon_admin_user.png\" align=\"absmiddle\" class=\"img_title\" /> Daftar Mapel
</div>
";

if ($_GET['msg'] == 1) {
    echo '
		<script>
			alert("berhasil menghapus data");
		</script>
	';
}elseif($_GET['msg'] == '0'){
	echo '
		<script>
			alert("gagal menghapus data");
		</script>
	';
}elseif($_GET['msg'] == 2){
	echo '
		<script>
			alert("berhasil mengubah data");
		</script>
	';
}elseif($_POST['msg'] == 2){
	echo '
		<script>
			alert("berhasil mengubah data");
		</script>
	';
}elseif($_GET['msg'] == 3){
	echo '
		<script>
			alert("gagal mengubah data");
		</script>
	';
}elseif($_GET['msg'] == 4){
	echo '
		<script>
			alert("berhasil menambah data");
		</script>
	';
}elseif($_GET['msg'] == 5){
	echo '
		<script>
			alert("gagal menambah data");
		</script>
	';
}

$p       = new Paging;
$batas   = 5;
$posisi  = $p->cariPosisi($batas);
$sql	 = mysql_query("
SELECT
	*
FROM mapel
LIMIT $posisi,$batas");

echo '
	<div class="datagrid">
	<table>
	<thead>
		<tr>
			<th>NO</th>
			<th>MATA PELAJARAN</th>
			<th>JURUSAN</th>
			<th>DURASI WAKTU UJIAN</th>
			<th>BATAS NILAI KELULUSAN</th>
			<th>KETERANGAN</th>
			<th width="10%">AKSI</th>			
		</tr>
	</thead>
	<tbody>
';

$no=1;

$idx = 0;
$nomor = 1;
while($r = mysql_fetch_array($sql)){
	$index = 0;
	foreach($r as $x=>$y){
		unset($r[$index]);
		$index++;
	}
	$data[] = $r;
	$data[$idx]['no'] = $nomor;	
	$idx++;
	$nomor++;
}

for($i = $posisi; $i <= ($batas + $posisi); $i++ ){
	$number[] = $i+1;
}
$i=0;
$tb_idx = 1;
foreach($data as $r){
	$tr_class = $tb_idx % 2;
	$alt='';
	if($tr_class == 0){
		$alt = 'class="alt"';
	}
	echo'
			<tr '.$alt.'>
				<td>'.$number[$i].'</td>
				<td>'.$r['mapel_name'].'</td>
				<td>'.$r['mapel_concentration'].'</td>
				<td>'.$r['mapel_duration'].'</td>
				<td>'.$r['mapel_pass_score'].'</td>
				<td>'.$r['mapel_desc'].'</td>
				<td>
					<a href="input_soal_mapel_baru.php?id='.$r['mapel_id'].'" class="action">
						<img src="images/images_admin/img_admin_edit.png" align="absmiddle" class="img_edit" width="20px" />
						
					</a>
					<a href="delete_mapel.php?id='.$r['mapel_id'].'" class="action" id="btn_delete_mapel">
						<img src="images/images_admin/img_admin_error.png" align="absmiddle" class="img_delete" width="20px" />
						
					</a>

				</td>
			</tr>		
	';
	$i++;
	$tb_idx++;
}
echo "</tbody></tabel></div>";
$jmldata=mysql_num_rows(mysql_query("SELECT * FROM mapel"));
$jmlhalaman  = $p->jumlahHalaman($jmldata, $batas);
$linkHalaman = $p->navHalaman($_GET[halaman], $jmlhalaman);

echo "<div id=\"pagging\">$linkHalaman</div>";
echo "</div>";
break;
?>

<!-- don't Change it ;) -->
<div class="clear"></div>

</div>
</body>
</html>


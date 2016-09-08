<link rel="stylesheet" type="text/css" href="files/style_table.css" />
<?php
session_start();
if(!empty($_SESSION[username]) || !empty($_SESSION[username])) {
include "error/error-access-denied-module.php";
}
else{
if ($_SESSION[typeuser]=='admin'){
if(isset($_GET['msg'])){
	if($_GET['msg'] == 1){
		echo '<script>alert("Penambahan User Baru Berhasil")</script>';
	}elseif($_GET['msg'] == 2){
		echo '<script>alert("Perubahan Data User Berhasil Disimpan")</script>';
	}elseif($_GET['msg'] == 3){
		echo '<script>alert("Hapus Data User Berhasil")</script>';
	}elseif($_GET['msg'] == 4){
		echo '<script>alert("Hapus Data User Gagal")</script>';
	}
}

// Halaman Awal Untuk Menampilkan Data
switch($_GET[act]){
default:

echo "
<script type=\"text/javascript\">
function warning() {
return confirm('Are You Sure To Delete This Data?');
}
</script>
";

echo"
<div id=\"content\" style=\"height:100%px\">
<div id=\"title_content\">
<img src=\"images/images_admin/icon_admin_user.png\" align=\"absmiddle\" class=\"img_title\" /> Daftar Nilai

</div>
";


$p       = new Paging;
$batas   = 10;
$posisi  = $p->cariPosisi($batas);
$sql	 = mysql_query("
SELECT * FROM member
LIMIT $posisi,$batas");

echo '
	<div class="datagrid">
	<table width = "100%">
		<thead>
		<tr>
			<th>NO</th>
			<th>NAMA</th>
			<th>EMAIL</th>
			<th>JABATAN</th>			
			<th>TIPE</th>			
			<th>AKSI</th>			
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
//var_dump($number, $posisi, $batas);
$i=0;
foreach($data as $r){	
	echo'
			<tr>
				<td>'.$number[$i].'</td>
				<td>'.$r['nama'].'</td>
				<td>'.$r['email'].'</td>
				<td>'.$r['divisi'].'</td>
				<td>'.$r['typeuser'].'</td>
				<td>
					<a href="inputuser.php?id='.$r['Id'].'" class="action">
						<img src="images/images_admin/img_admin_edit.png" align="absmiddle" class="img_edit" width="20px" />
						
					</a>
					<a href="deleteuser.php?id='.$r['Id'].'" class="action" id="btn_delete_mapel">
						<img src="images/images_admin/img_admin_error.png" align="absmiddle" class="img_delete" width="20px" />
						
					</a>

				</td>
			</tr>
		
	';
	$i++;
}

$jmldata=mysql_num_rows(mysql_query("SELECT * FROM score"));
$jmlhalaman  = $p->jumlahHalaman($jmldata, $batas);
$linkHalaman = $p->navHalaman($_GET[halaman], $jmlhalaman);
echo "<div id=\"pagging\">$linkHalaman</div>";
echo "</body></tabel></div>";
echo "</div>";
break;

case 'detail':
$id=null;
if(isset($_GET['id'])){
	$id = $_GET['id'];
}
var_dump($id);
$sql_detail	 = mysql_query("
SELECT
	a.`detailjawaban_id`,
	a.`detailjawaban_jawaban`,
	b.`pertanyaan`,	
FROM detail_jawaban a
LEFT JOIN soal b ON b.`soalid` = a.`detailjawaban_soal_id`
LEFT JOIN score c ON c.`score_id` = a.`detailjawaban_soal_id`
WHERE a.`detailjawaban_score_id` = ".$id);
echo'
	<div id="content">
		<div>
			,kfdlkjsd flkjasnd
		</div>
	</div>
';


}

}
else{
echo "<meta http-equiv='refresh' content='0; url=../../error/error-access-denied-page.php'>";
}

}
?>
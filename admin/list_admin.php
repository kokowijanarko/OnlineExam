<link rel="stylesheet" type="text/css" href="files/style_table.css" />
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
$batas   = 5;
$posisi  = $p->cariPosisi($batas);
$sql	 = mysql_query("
SELECT
	a.`score_id` AS id_nilai,
	a.`score_nim` AS nis,
	a.`score_score` AS score,
	b.`nama` AS nama_siswa,
	b.`kelas` AS nama_kelas,
	c.`mapel_id` AS id_mapel,
	c.`mapel_name` AS nama_mapel

FROM score a
JOIN tuser b ON b.`nim` = a.`score_nim`
JOIN mapel c ON c.`mapel_id` = a.`score_mapel_id`
LIMIT $posisi,$batas");

echo '
	<div class="datagrid">
	<table width = "100%">
		<thead>
		<tr>
			<th>NO</th>
			<th>NIS</th>
			<th>NAMA</th>
			<th>KELAS</th>
			<th>MATA PELAJARAN</th>
			<th colspan="2">NILAI</th>
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
	$sql_detail_mapel = mysql_query("SELECT * FROM mapel where mapel_id=".$r['id_mapel']);
	$mapel_detail = mysql_fetch_assoc($sql_detail_mapel);
	$conclusion = $result_identitas['score'] >= $mapel_detail['mapel_pass_score'] ? "LULUS" : "TIDAK LULUS";

	echo'
			<tr>
				<td>'.$number[$i].'</td>
				<td>'.$r['nis'].'</td>
				<td>'.$r['nama_siswa'].'</td>
				<td>'.$r['nama_kelas'].'</td>
				<td>'.$r['nama_mapel'].'</td>
				<td>'.$r['score'].'</td>
				<td>'.$conclusion.'</td>
				<td>
					<a href="admin-home.php?page=exam_result&id='.$r['id_nilai'].'" class="action">
						<img src="images/images_admin/icon_admin_post.png" align="absmiddle" class="img_detail" width="20px" />
						Detail
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
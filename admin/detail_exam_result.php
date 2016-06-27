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
<img src=\"images/images_admin/icon_admin_user.png\" align=\"absmiddle\" class=\"img_title\" /> Rincian Nilai

</div>
";


$id = $_GET['id'];
$sql	 = mysql_query("
	SELECT
		a.`soalid`,
		a.`pertanyaan`,
		a.`pilihan_a`,
		a.`pilihan_b`,
		a.`pilihan_c`,
		a.`pilihan_d`,
		UPPER(a.`jawaban`) AS jawaban,
		IF(b.`detailjawaban_jawaban` = '', 
			'~', 
			UPPER(b.`detailjawaban_jawaban`)
		)AS detailjawaban_jawaban,
		IF(LOWER(b.`detailjawaban_jawaban`) = '',
			'Kosong',
			IF(LOWER(b.`detailjawaban_jawaban`) = LOWER(a.`jawaban`),
					'Benar',
					'Salah'
			)			
		) AS conclution
	FROM soal a
	JOIN detail_jawaban b ON b.`detailjawaban_soal_id` = a.`soalid`
	WHERE b.`detailjawaban_score_id` = '".$id."'
	ORDER BY a.`soalid` ASC
");

$sql_identitas	 = mysql_query("
	SELECT
		a.`score_id` AS id_nilai,
		a.`score_nim` AS nis,
		a.`score_score` AS score,
		a.`score_answer_false` AS salah,
		a.`score_answer_true` AS benar,
		a.`score_answer_empty` AS kosong,
		b.`nama` AS nama_siswa,
		b.`kelas` AS nama_kelas,
		c.`mapel_id` AS id_mapel,
		c.`mapel_name` AS nama_mapel

	FROM score a
	JOIN tuser b ON b.`nim` = a.`score_nim`
	JOIN mapel c ON c.`mapel_id` = a.`score_mapel_id`
	
	WHERE a.`score_id` = '".$id."'
");
$result_identitas = mysql_fetch_assoc($sql_identitas);
//var_dump($result_identitas);die;
$sql_detail_mapel = mysql_query("SELECT * FROM mapel where mapel_id=".$result_identitas['id_mapel']);
$mapel_detail = mysql_fetch_assoc($sql_detail_mapel);
//var_dump($mapel_detail);die;
$conclusion = $result_identitas['score'] >= $mapel_detail['mapel_pass_score'] ? "LULUS" : "TIDAK LULUS";
echo'

	<table>
		<tr>
			<td>Nama</td>
			<td>:</td>
			<td>'.$result_identitas['nama_siswa'].'</td>
		</tr>
		<tr>
			<td>NIS</td>
			<td>:</td>
			<td>'.$result_identitas['nis'].'</td>
		</tr>
		<tr>
			<td>Kelas</td>
			<td>:</td>
			<td>'.$result_identitas['nama_kelas'].'</td>
		</tr>
		<tr>
			<td>Mata Pelajaran</td>
			<td>:</td>
			<td>'.$result_identitas['nama_mapel'].'</td>
		</tr>
		<tr>
			<td>Salah</td>
			<td>:</td>
			<td>'.$result_identitas['salah'].'</td>
		</tr>
		<tr>
			<td>Benar</td>
			<td>:</td>
			<td>'.$result_identitas['benar'].'</td>
		</tr>
		<tr>
			<td>Kosong</td>
			<td>:</td>
			<td>'.$result_identitas['kosong'].'</td>
		</tr>
		<tr>
			<td>Nilai</td>
			<td>:</td>
			<td>'.$result_identitas['score'].' - <b>('.$conclusion.')</b></td>
		</tr>
		
	</table>
	</br>
';
echo '
	<div class="datagrid">
	<table>
	<thead>
		<tr>
			<th width="5%">NO</th>
			<th width="35%">Soal</th>
			<th width="15%">Pilihan</th>
			<th width="10%">Kunci Jawaban</th>
			<th>Jawaban</th>
			<th>Kesimpulan</th>		
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
$i=1;
foreach($data as $r){
	echo'
			<tr>
				<td>'.$i.'</td>
				<td>'.$r['pertanyaan'].'</td>
				<td>'
					.'<div>A. '.$r['pilihan_a'].'</div>'.
					'<div>B. '.$r['pilihan_b'].'</div>'.
					'<div>C. '.$r['pilihan_c'].'</div>'.
					'<div>D. '.$r['pilihan_d'].'</div></br>'.
				'</td>
				<td style="text-align:center">'.$r['jawaban'].'</td>
				<td style="text-align:center">'.$r['detailjawaban_jawaban'].'</td>
				<td style="text-align:center">'.$r['conclution'].'</td>
			</tr>
		
	';
	$i++;
}
echo "</tbody></tabel></div>";
echo "</div>";
break;
}

}
else{
echo "<meta http-equiv='refresh' content='0; url=../../error/error-access-denied-page.php'>";
}

}
?>
<link rel="stylesheet" type="text/css" href="files/style_table.css" />
<?php
session_start();
include "../koneksi.php";

$id = '';
if(!empty($_GET['id'])){
	$id = $_GET['id'];
}

$query = mysql_query("
SELECT
	a.`score_id`,
	a.`score_mapel_id`,
	b.`mapel_name`,
	b.`mapel_pass_score`,
	a.`score_answer_empty`,
	a.`score_answer_false`,
	a.`score_answer_true`,
	a.`score_score`,
	(IF(a.`score_score` >= b.`mapel_pass_score`, 'LULUS', 'TIDAK LULUS')) AS conclusion

FROM score a
JOIN mapel b ON b.`mapel_id` = a.`score_mapel_id`

WHERE score_user_id = $id

");

$query_identity = mysql_query("SELECT * FROM tuser WHERE id=$id");
$identity = mysql_fetch_assoc($query_identity);
//var_dump($identity);die;

echo'
	<table cellspacing="10px">
		<tr>
			<td>No. Peserta</td>
			<td> : </td>
			<td>'. $identity['nomor_peserta'] .'</td>
		</tr>
		<tr>
			<td>Nama</td>
			<td> : </td>
			<td>'. $identity['nama'] .'</td>
		</tr>
		<tr>
			<td>Jurusan</td>
			<td> : </td>
			<td>'. $identity['jurusan'] .'</td>
		</tr>
		<tr>
			<td>Email</td>
			<td> : </td>
			<td>'. $identity['email'] .'</td>
		</tr>
		<tr>
			<td>No. Telp</td>
			<td> : </td>
			<td>'. $identity['tlp'] .'</td>
		</tr>		
	</table>
	<br />
';

echo'
	<div class="datagrid">
	<table>
		<thead>
		<tr>
			<th>NO</th>
			<th>MAPEL</th>
			<th>BATAS LULUS</th>
			<th>JAWABAN KOSONG</th>			
			<th>JAWABAN SALAH</th>			
			<th>JAWABAN BENAR</th>			
			<th>NILAI</th>			
			<th>KESIMPULAN</th>
		<tr>
		</thead>
		<tbody>
	
';
$no=1;
while($row = mysql_fetch_assoc($query)){
	echo '
		<tr>
			<td>'. $no .'</td>
			<td>'. $row['mapel_name'] .'</td>
			<td>'. $row['mapel_pass_score'] .'</td>
			<td>'. $row['score_answer_empty'] .'</td>
			<td>'. $row['score_answer_false'] .'</td>
			<td>'. $row['score_answer_true'] .'</td>
			<td>'. $row['score_score'] .'</td>
			<td><strong>'. $row['conclusion'] .'</strong></td>
		</tr>
	';
	$no++;
}

echo '</tbody></table></div>';

//var_dump(mysql_fetch_assoc($query));

?>
<?php
session_start();
include "../koneksi.php";
$id = '';
if(!empty($_GET['id'])){
	$id = $_GET['id'];
}

// Include the main TCPDF library (search for installation path).
require_once('../asset/tcpdf/tcpdf.php');

class MYPDF extends TCPDF {

    //Page header
    public function Header() {
        // Logo
        $image_file = 'images/images_admin/bg_admin_banner.png';
        $this->Image($image_file, 10, 10, '', 10, 'JPG', '', 'T', false, 300, '', false, false, 0, false, false, false);
        // Set font
        $this->SetFont('helvetica', 'B', 16);
        // Title
       // $this->Cell(100, 100, 'MA NURUL UMMAH', 0, false, 'C', 0, '', 0, false, 'M', 'M');
    }

    // Page footer
    public function Footer() {
        // Position at 15 mm from bottom
        $this->SetY(-15);
        // Set font
        $this->SetFont('helvetica', 'I', 8);
        // Page number
        $this->Cell(0, 10, 'Page '.$this->getAliasNumPage().'/'.$this->getAliasNbPages(), 0, false, 'C', 0, '', 0, false, 'T', 'M');
    }
}


// create new PDF document
$pdf = new MYPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

// set document information
$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor('MA Nurul ummah');
$pdf->SetTitle('Hasil Seleksi');
$pdf->SetSubject('Hasil Seleksi');

// set default header data
$pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE, PDF_HEADER_STRING);

// set header and footer fonts
$pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
$pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

// set default monospaced font
$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

// set margins
$pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
$pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
$pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

// set auto page breaks
$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

// set image scale factor
$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);


// ---------------------------------------------------------

// set font
$pdf->SetFont('helvetica', 'B', 16);

// add a page
$pdf->AddPage();

$pdf->Write(0, 'Hasil Seleksi', '', 0, 'C', true, 0, false, false, 0);

$pdf->SetFont('helvetica', '', 10);

// -----------------------------------------------------------------------------
$query_conclusion = mysql_query("
SELECT	
	a.`score_score` AS conclusion

FROM score a
JOIN mapel b ON b.`mapel_id` = a.`score_mapel_id`

WHERE score_user_id = $id

");


$conclusion_final=array();
while($row = mysql_fetch_assoc($query_conclusion)){	
	array_push($conclusion_final, $row['conclusion']);
}

$hasil_akhir = array_sum($conclusion_final) / count($conclusion_final);
//var_dump($hasil_akhir);die;
$query_identity = mysql_query("SELECT * FROM tuser WHERE id=$id");
$identity = mysql_fetch_assoc($query_identity);

$tbl = '
<br />
<table >
		<tr>
			<td width="100px" >No. Peserta</td>
			<td width="15px"> : </td>
			<td>'.$identity['nomor_peserta'].'</td>
		</tr>
		<tr>
			<td>Nama</td>
			<td> : </td>
			<td>'.$identity['nama'].'</td>
		</tr>
		<tr>
			<td>Jurusan</td>
			<td> : </td>
			<td>'.$identity['jurusan'].'</td>
		</tr>
		<tr>
			<td>Email</td>
			<td> : </td>
			<td>'.$identity['email'].'</td>
		</tr>
		<tr>
			<td>No. Telp</td>
			<td> : </td>
			<td>'.$identity['tlp'].'</td>
		</tr>
		<tr>
			<td>Hasil Akhir</td>
			<td> : </td>
			<td><strong>'.$hasil_akhir.'</strong></td>
		</tr>		
	</table>

';

$pdf->writeHTML($tbl, true, false, false, false, '');

// -----------------------------------------------------------------------------
$pdf->SetFont('helvetica', '', 8);
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

$tbl_hasil .='	
	
	<table border="1" cellpadding="3" >
		<tr style="background-color:grey;">
			<th style="text-align:center" width="25px" >NO</th>
			<th style="text-align:center">MAPEL</th>
			<th style="text-align:center">BATAS LULUS</th>
			<th style="text-align:center">JAWABAN KOSONG</th>			
			<th style="text-align:center">JAWABAN SALAH</th>			
			<th style="text-align:center">JAWABAN BENAR</th>			
			<th style="text-align:center">NILAI</th>			
			<th style="text-align:center">KESIMPULAN</th>
		</tr>
';
$no=1;
while($row = mysql_fetch_assoc($query)){
	$tbl_hasil .= '
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

$tbl_hasil .= '</table>
';

//var_dump($tbl_hasil);die;
$pdf->writeHTML($tbl_hasil, true, false, false, false, '');



// -----------------------------------------------------------------------------

//Close and output PDF document
$pdf->Output('hasil_ujian_'.$identity['nomor_peserta'].'-'.$identity['nama'].'.pdf', 'I');

//============================================================+
// END OF FILE
//============================================================+
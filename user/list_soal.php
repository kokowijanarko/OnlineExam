<?php
session_start();
include "../koneksi.php";

?>

<?php 
error_reporting(0);
?>

<?php
$conf 	   = mysql_query("select * from mini_config");
$view_conf = mysql_fetch_array($conf);
$query=mysql_query("select * from soal where mapel_id= '".$_GET['id']." AND `date`='". date('Y-m-d')."'LIMIT 30");
$jumlah_soal=mysql_num_rows($query);

$sql_detail_mapel = mysql_query("SELECT * FROM mapel where mapel_id=".$_GET['id']);
$mapel_detail = mysql_fetch_assoc($sql_detail_mapel);
$time_exam = $mapel_detail['mapel_duration'];
$time_exam = (intval($time_exam)*60) * 1000;

?>
<html>
<head>
<title>::Test Ujian Online::.</title>

<link rel="stylesheet" type="text/css" href="files/style_admin.css" />
<style>
	.hide{
		visibility: hidden;
	}
	.collapse{
		visibility: collapse;
	}
</style>


<script src="../asset/js/jquery.2.1.1.min.js" type="text/javascript"></script>
<script src="files/sdmenu.js" type="text/javascript"></script>
<script src="files/tiny_mce.js" type="text/javascript"></script>
<script src="files/tiny_miniw0rm.js" type="text/javascript"></script>
<script src="../asset/js/jquery.countdown.js" type="text/javascript"></script>

<?php
if(!empty($_SESSION[$mapel_detail['mapel_name']])){
	$time = $_SESSION[$mapel_detail['mapel_name']];
}else{
	var_dump('asdads');
	$date = time() * 1000;
	$_SESSION[$mapel_detail['mapel_name']] = $date ;
	$time = $date;
}
?>


<script type="text/javascript">
	var myMenu;
	
	window.onload = function() {
		myMenu = new SDMenu("my_menu");
		myMenu.init();
		//var duration = 5400000;
		var duration = parseInt('<?php echo $time_exam?>') ;
		
		var fiveSeconds = <?php echo $time; ?> + duration;		
		console.log(fiveSeconds);
		console.log(<?php echo $time; ?>);
		console.log(new Date().getTime());
		$('#clock').countdown(fiveSeconds, {elapse: true, finalDate: fiveSeconds})
		.on('update.countdown', function(event){
			var $this = $(this);
			if (event.elapsed) {
				$this.html('Waktu Habis');				
				
				$('#form_soal').addClass('collapse');
			} else {
				$this.html(event.strftime('Siswa Waktu: <span>%H:%M:%S</span>'));
				<?php $_SESSION['time'] = $n++;?>
			}
		});
	
	
	};
	
	function validasi_input(form){
  function check_radio(radio)
  {
// memeriksa apakah radio button sudah ada yang dipilih
    for (i = 0; i < radio.length; i++)
    {
      if (radio[i].checked === true)
      {
        return radio[i].value;
      }
    }
   return false;
   }

   var radio_val = check_radio(form.pilihan);
   if (radio_val === false)
    {
      alert("Anda belum memilih Jenis Kelamin!");
      return false;
    }
   return (true);
}
	
	
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
$query = mysql_query('SELECT mapel_name FROM mapel WHERE mapel_id='.$_GET['id']);
$result = mysql_fetch_row($query);
$mapel_name = $result[0];

echo'
<div id="content" style="height:autopx">
<div id="title_content">
<img src="images/images_admin/icon_admin_user.png" align="absmiddle" class="img_title" /> Soal '.$mapel_name.'
</div>';

$hasil=mysql_query("select * from soal where mapel_id= '".$_GET['id']."' AND `date`='". date('Y-m-d')."'LIMIT 30");
$jumlah=mysql_num_rows($hasil);
var_dump($jumlah);
if(is_null($jumlah) || $jumlah == 0){
	echo '
		<div id="bg_content_welcome">
			<p> Maaf, bukan jadwal ujian !</p>
			<p> Silakan akses ketika jadwal ujian.</p>
		</div>
	';
}else{
?>
<div id="clock">
</div>

<form action='nilai.php' method='post' id="form-area" onSubmit="return validasi_input(this)">
<div id="submit-button" >
				<input type="submit" name="submit" value="Klik Untuk Submit Jawaban Anda">
            </div>
<input type="hidden" value="<?php echo $_GET['id']?>" name="mapel_id">

<table id="form_soal" width="650" border="0" class="font" >
  <?php
		
		$urut=0;
		while($row =mysql_fetch_array($hasil))
		{
			$id=$row["soalid"];
			$pertanyaan=$row["pertanyaan"];
			$pilihan_a=$row["pilihan_a"];
			$pilihan_b=$row["pilihan_b"];
			$pilihan_c=$row["pilihan_c"];
			$pilihan_d=$row["pilihan_d"]; 
			
			$list_soal[]=array(
				"soalid"=>$id,
				"pertanyaan"=>$pertanyaan,
				"pilihan_a"=>$pilihan_a,
				"pilihan_b"=>$pilihan_b,
				"pilihan_c"=>$pilihan_c,
				"pilihan_d"=>$pilihan_d
			);		
		}
		shuffle($list_soal);
		//var_dump($list_soal);die;
		
		$no = 1;
		foreach($list_soal as $ls){
			echo'
			<input type="hidden" id="id[]" name="id[]" value="'.$ls['soalid'].'">
			<input type="hidden" name="jumlah" value="'.$jumlah.'">
			<tr>
			  	<td width="17"><font color="#FFFFFF">'.$no.'</font></td>
			  	<td width="430"><font color="#FFFFFF"><strong>"'.$ls['pertanyaan'].'"</strong></font></td>
			</tr>
			<tr>
			  	<td height="21">&nbsp;</td>
			  	<td><input name="pilihan['.$ls['soalid'].']" type="radio" value="a"> <font color="#FFFFFF">A. '.$ls['pilihan_a'].'</font> </td>
			</tr>
			<tr>
			  	<td height="21">&nbsp;</td>
			  	<td><input name="pilihan['.$ls['soalid'].']" type="radio" value="b"> <font color="#FFFFFF">B. '.$ls['pilihan_b'].'</font> </td>
			</tr>
			<tr>
			  	<td height="21">&nbsp;</td>
			  	<td><input name="pilihan['.$ls['soalid'].']" type="radio" value="c"> <font color="#FFFFFF">C. '.$ls['pilihan_c'].'</font> </td>
			</tr>
			<tr>
			  	<td height="21">&nbsp;</td>
			  	<td><input name="pilihan['.$ls['soalid'].']" type="radio" value="d"> <font color="#FFFFFF">D. '.$ls['pilihan_d'].'</font> </td>
			</tr>			
			';
			$no++;
		}
		?>
			</table>
        	
			
		</form>
        </p>

</div>


<?php
}
echo"</div>
";
?>

<!-- don't Change it ;) -->
<div class="clear"></div>

</div>
</body>
</html>


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
$query=mysql_query("select * from soal where mapel_id= '".$_GET['id']."'LIMIT 30");
$jumlah_soal=mysql_num_rows($query);
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



<script type="text/javascript">
	var myMenu;
	
	window.onload = function() {
	myMenu = new SDMenu("my_menu");
	myMenu.init();
		var fiveSeconds = new Date().getTime() + 5000;		
		$('#clock').countdown(fiveSeconds, {elapse: true, finalDate: fiveSeconds})
		.on('update.countdown', function(event){
			var $this = $(this);
			if (event.elapsed) {
				$this.html('Waktu Habis');				
				// var mapel_id = $('input[name=mapel_id]').val();
				// var jumlah = $('input[name=jumlah]').val();
				// var idx = 0;
				// var id = [];
				// var jawaban= [];
				// var params = {
					// 'mapel_id':mapel_id,
					// 'jumlah':jumlah,
					// 'id':id,
					// 'pilihan':jawaban
					
				// };			
				// var asd = $('#id[1]').val()
				// console.log(asd);
				// $('input[name=id]').each(function(index) {
					// console.log(index);
					// id.push($(this).val());
					// $('radio[name:pilihan]').each(function(){
						// jawaban.push($(this).val());
					// });					
					// idx++;
				// });
				//console.log(params);
				// $.Ajax({
					// url:'nilai.php',
					// method:'post',
					// data:params
				// });
				$('#submit-button').removeClass('collapse');
				$('#form_soal').addClass('collapse');
			} else {
				$this.html(event.strftime('Siswa Waktu: <span>%H:%M:%S</span>'));
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

?>
<div id="clock">
</div>

<form action='nilai.php' method='post' id="form-area" onSubmit="return validasi_input(this)">
<input type="hidden" value="<?php echo $_GET['id']?>" name="mapel_id">

<table id="form_soal" width="650" border="0" class="font" >
  <?php
		$hasil=mysql_query("select * from soal where mapel_id= '".$_GET['id']."'LIMIT 30");
		$jumlah=mysql_num_rows($hasil);
		$urut=0;
		while($row =mysql_fetch_array($hasil))
		{
			$id=$row["soalid"];
			$pertanyaan=$row["pertanyaan"];
			$pilihan_a=$row["pilihan_a"];
			$pilihan_b=$row["pilihan_b"];
			$pilihan_c=$row["pilihan_c"];
			$pilihan_d=$row["pilihan_d"]; 
			
			?>
		
			<input type="hidden" id="id[]" name="id[]" value=<?php echo $id; ?>>
			<input type="hidden" name="jumlah" value=<?php echo $jumlah; ?>>
			<tr>
			  	<td width="17"><font color="#FFFFFF"><?php echo $urut=$urut+1; ?></font></td>
			  	<td width="430"><font color="#FFFFFF"><strong><?php echo "$pertanyaan"; ?></strong></font></td>
			</tr>
			<tr>
			  	<td height="21">&nbsp;</td>
			  	<td><input name="pilihan[<?php echo $id; ?>]" type="radio" value="a"> <font color="#FFFFFF"><?php echo "A. $pilihan_a";?></font> </td>
			</tr>
			<tr>
			  	<td>&nbsp;</td>
			  	<td><input name="pilihan[<?php echo $id; ?>]" type="radio" value="b"> <font color="#FFFFFF"><?php echo "B. $pilihan_b";?></font> </td>
			</tr>
			<tr>
			  	<td>&nbsp;</td>
			  	<td><input name="pilihan[<?php echo $id; ?>]" type="radio" value="c"> <font color="#FFFFFF"><?php echo "C. $pilihan_c";?></font> </td>
			</tr>
			<tr>
				<td>&nbsp;</td>
			  	<td><input name="pilihan[<?php echo $id; ?>]" type="radio" value="d"> <font color="#FFFFFF"><?php echo "D. $pilihan_d";?></font> </td>
            </tr>
			
		<?php
		}
		?>
			</table>
        	<div id="submit-button" class="collapse">
				<input type="submit" name="submit" value="Waktu Habis Klik Untuk Submit Jawaban Anda">
            </div>
			
		</form>
        </p>

</div>


<?php
echo"</div>
";
?>

<!-- don't Change it ;) -->
<div class="clear"></div>

</div>
</body>
</html>


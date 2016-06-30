<?php
session_start();
if(empty($_SESSION['username']) || empty($_SESSION['username'])) {

//var_dump($nim);
include "error/error-access-denied-page.php";
}else{
if ($_SESSION['typeuser']=='admin'){
?>
<div style="float: left" id="my_menu" class="sdmenu">
</div>

<?php
}
else{
?>
<div style="float: left" id="my_menu" class="sdmenu">
	<div style="margin-bottom:15px;" id="round1">
		<span id="round1">Dashboard</span>
		<a href="user-home.php">
		<img src="images/images_admin/img_admin_arrow.png" border="0" /> Dashboard
		</a>
		
		
		<a href="logout.php" style="padding-bottom:10px;">
		<img src="images/images_admin/img_admin_arrow.png" border="0" /> Logout
		</a>
	</div>

	<!-- Post Menu -->
	
	<div class="collapsed" style="margin-bottom:15px;">
		<span id="round1">Daftar Soal</span>		
		<?php
			$query = mysql_query('SELECT * FROM mapel');
			//var_dump($query);
			//$mapel = mysql_fetch_array($query);
			while($mpl = mysql_fetch_array($query)){			
				echo '
					<a href="list_soal.php?id='.$mpl['mapel_id'].'">
						<img src="images/images_admin/img_admin_arrow.png" border="0" />'.$mpl['mapel_name'].'
					</a>
				';
			}
			
		?>
	</div>
	
	<div class="collapsed" style="margin-bottom:15px;">
		<span id="round1">Hasil Ujian</span>		
		<?php
			$user_id = $_SESSION['user_id'];
			$query_score = mysql_query("
				SELECT
					a.`score_id`,
					a.`score_mapel_id`,
					b.`mapel_name`
				FROM score a 
				JOIN mapel b ON b.`mapel_id` = a.`score_mapel_id`
				WHERE a.`score_user_id` = $user_id
			");
			//var_dump($query);
			//$mapel = mysql_fetch_array($query);
			while($scr = mysql_fetch_array($query_score)){			
				echo '
					<a href="user-home.php?page=exam_result&id='.$scr['score_id'].'">
						<img src="images/images_admin/img_admin_arrow.png" border="0" />'.$scr['mapel_name'].'
					</a>
				';
			}
			
		?>
	</div>
	
	
	<!-- Comment Menu -->
	

	<!-- Help & Learn -->

</div>
<?php 
}
?>
<?php
}
?>
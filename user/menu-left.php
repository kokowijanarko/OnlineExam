<?php
session_start();
if(empty($_SESSION['username']) || empty($_SESSION['username'])) {
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
		<a href="admin-home.php?page=listsoalanalisa">
		<img src="images/images_admin/img_admin_arrow.png" border="0" /> Kemampuan Analisa
		</a>
		<a href="admin-home.php?page=listsoalagama">
		<img src="images/images_admin/img_admin_arrow.png" border="0" /> Kemampuan Agama
		</a>
		<a href="admin-home.php?page=listsoalinggris">
		<img src="images/images_admin/img_admin_arrow.png" border="0" /> Bahasa Inggris
		</a>
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
	
	
	<!-- Comment Menu -->
	

	<!-- Help & Learn -->

</div>
<?php 
}
?>
<?php
}
?>
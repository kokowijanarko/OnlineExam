<?php
include "../koneksi.php";

session_start();
if(!empty($_SESSION['username']) || !empty($_SESSION['username'])) {
include "error/error-access-denied-page.php";
}
else{
// Statemen For User
if ($_SESSION[typeuser]=='user'){
	
?>
<div style="float: left" id="my_menu" class="sdmenu">
</div>

<!-- =========================================== For Admin Menu ============================================================= -->

<?php
}
else{
// Statemen For Administrator
?>
<div style="float: left" id="my_menu" class="sdmenu">
	<div style="margin-bottom:15px;" id="round1">
		<span id="round1">Dashboard</span>
		<a href="admin-home.php">
		<img src="images/images_admin/img_admin_arrow.png" border="0" /> Dashboard
		</a>
		
		
		<a href="logout.php" style="padding-bottom:10px;">
		<img src="images/images_admin/img_admin_arrow.png" border="0" /> Logout
		</a>
	</div>

	<!-- Post Menu -->
	
	<div class="collapsed" style="margin-bottom:15px;">
		<span id="round1">Mata Pelajaran</span>
		<a href="input_soal_mapel_baru.php">
			<img src="images/images_admin/img_admin_arrow.png" border="0" /> Mata Pelajaran Baru
		</a>
		<a href="input_soal_mapel_baru.php">
			<img src="images/images_admin/img_admin_arrow.png" border="0" /> Daftar Mata Pelajaran
		</a>
	</div>
	<div class="collapsed" style="margin-bottom:15px;">
		<span id="round1">Input Soal</span>	
		<a href="inputsoalanalisa.php">
		<img src="images/images_admin/img_admin_arrow.png" border="0" /> Kemampuan Analisa
		</a>
		
		<a href="inputsoalagama.php">
		<img src="images/images_admin/img_admin_arrow.png" border="0" /> Kemampuan Agama
		</a>
		
		<a href="inputsoalinggris.php">
		<img src="images/images_admin/img_admin_arrow.png" border="0" /> Bahasa Inggris
		</a>
		
		<?php
			$query = mysql_query('SELECT * FROM mapel');
			//var_dump($query);
			//$mapel = mysql_fetch_array($query);
			while($mpl = mysql_fetch_array($query)){			
				echo '
					<a href="input_soal.php?&id='.$mpl['mapel_id'].'">
						<img src="images/images_admin/img_admin_arrow.png" border="0" />'.$mpl['mapel_name'].'
					</a>
				';
			}
			
		?>
		
	</div>
	
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
					<a href="admin-home.php?page=list_soal&id='.$mpl['mapel_id'].'">
						<img src="images/images_admin/img_admin_arrow.png" border="0" />'.$mpl['mapel_name'].'
					</a>
				';
			}
			
		?>
	</div>
	
	
	<div class="collapsed" style="margin-bottom:15px;">
		<span id="round1">Hasil Ujian</span>
		<a href="admin-home.php?page=exam_result">
		<img src="images/images_admin/img_admin_arrow.png" border="0" /> Hasil ujian
		</a>
		
		
	</div>
	
	<!-- Comment Menu -->
	<div class="collapsed" style="margin-bottom:15px;">
		<span id="round1">Users</span>
		<a href="admin-home.php?page=users">
		<img src="images/images_admin/img_admin_arrow.png" border="0" /> Users
		</a>
		
		<a href="inputuser.php" style="padding-bottom:10px;">
		<img src="images/images_admin/img_admin_arrow.png" border="0" /> Input user baru
		</a>
	</div>

	<!-- Help & Learn -->

</div>
<?php 
}
?>
<?php
}
?>
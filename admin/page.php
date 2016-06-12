<?php
session_start();
if(!empty($_SESSION[username]) || !empty($_SESSION[username])) {
	include './error/error-access-denied-page.php';
}else{
	include "../koneksi.php";
	include "files/pagging.php";

	// Dashboard
	if($_GET['page']=="home"){
		include "home.php";
	}else if($_GET['page']=="config"){
		if ($_SESSION[typeuser]=='admin'){
			include "files/site-config.php";
		}else{
			echo "<meta http-equiv='refresh' content='0; url=error/error-access-denied-page.php'>";
		}
	}else if($_GET['page']=="caripegawai"){
		if ($_SESSION[typeuser]=='admin'){
			include "caripegawai.php";
		}else{
			echo "<meta http-equiv='refresh' content='0; url=error/error-access-denied-page.php'>";
		}
	}else if($_GET['page']=="users"){
		if ($_SESSION[typeuser]=='admin'){
			include "user.php";
		}else{
			echo "<meta http-equiv='refresh' content='0; url=error/error-access-denied-page.php'>";
		}
	}else if($_GET['page']=="list_soal"){
		include "list_soal.php";
	}else if($_GET['page']=="exam_result" && !isset($_GET['id'])){
		include "list_exam_result.php";
	}elseif($_GET['page']=="exam_result" && isset($_GET['id'])){
		include "detail_exam_result.php";
	}else{
		include "home.php";
	}

}
?>
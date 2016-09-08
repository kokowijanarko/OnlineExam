<?php
session_start();
if(!empty($_SESSION[username]) || !empty($_SESSION[username])) {
	include './error/error-access-denied-page.php';
}else{
	include "../koneksi.php";
	include "files/pagging.php";
	include "files/pagging_2.php";

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
	}else if($_GET['page']=="exam_result" && !empty($_GET['id'])){
		include "list_exam_result.php";
	}elseif($_GET['page']=="exam_result" && empty($_GET['id'])){
		include "detail_exam_result.php";
	}elseif($_GET['page']=="list_examinees"){
		include "list_examinees.php";
	}elseif($_GET['page']=="list_examinees" && empty($_GET['id'])){
		include "print_pdf_examinees.php";
	}else{
		include "home.php";
	}

}
?>
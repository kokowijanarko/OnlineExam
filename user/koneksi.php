<?php
error_reporting(0);
$db_hostname = "localhost"; 
$db_user     = "root";
$db_password = "";
$db_name     = "dbujian";

$conn = mysql_connect($db_hostname,$db_user,$db_password);
$conn = mysql_select_db($db_name);
?>
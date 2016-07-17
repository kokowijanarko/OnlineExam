<?php
error_reporting(0);
$db_hostname = "localhost"; 
$db_user     = "root";
$db_password = "";
$db_name     = "db_gun_123";

mysql_connect($db_hostname,$db_user,$db_password);
mysql_select_db($db_name);
?>
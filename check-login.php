<?php
session_start();
include "koneksi.php";

$username = $_POST['username'];
$password = $_POST['password'];
$op = $_GET['op'];

if($op=="in"){
$cek = mysql_query("SELECT * FROM member WHERE nama='$username' AND password='$password'") or (die(mysql_error()));
    if(mysql_num_rows($cek)==1){//jika berhasil akan bernilai 1
        $c = mysql_fetch_array($cek);
        $_SESSION['username'] = $c['username'];
        $_SESSION['admin_name'] = $c['nama'];
        $_SESSION['typeuser'] = $c['typeuser'];
        if($c['typeuser']=="admin"){
            header("location:admin/admin-home.php");
        }else if($c['typeuser']=="user"){
            header("location:user/user-home.php");
        }
	}else{
         echo"
			<script>
				if(confirm('Password atau Username Salah!')){
					window.location = 'loginadmin.php';
				}else{
					window.location = 'loginadmin.php';
				}
			</script>
		 ";
    }
}else if($op=="out"){
    unset($_SESSION['pengguna']);
    unset($_SESSION['level']);
    header("location:loginadmin.php");
	}
?>

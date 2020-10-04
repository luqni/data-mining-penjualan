<?php
include "config/koneksi.php";
$pass=md5($_POST['password']);
$level=$_POST['level'];
if ($level=='manager')
{
$login=mysql_query("SELECT * FROM manager
			WHERE username='$_POST[id_user]' AND password='$pass' AND level='$level'");
$cocok=mysql_num_rows($login);
$r=mysql_fetch_array($login);

if ($cocok > 0){
	session_start();
	session_register("SES_MGR");
	$_SESSION[namauser]     = $r[username];
  	$_SESSION[namalengkap]  = $r[nama_lengkap];
  	$_SESSION[passuser]     = $r[password];
  	$_SESSION[leveluser]    = $r[level];

	header('location:manager/home');
	}
else {
echo "<script>window.alert('Username atau Password anda salah.');
        window.location=('home')</script>";
}
}
?>

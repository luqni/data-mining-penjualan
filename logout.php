<?php
  session_start();
  session_destroy();
  header('Location:index.php');
	die();
  	//echo "<center>Anda telah sukses keluar sistem <b>[LOGOUT]<b><br/>
	//Klik <a href=\"../index.php\">Disini</a> Untuk Kembali ke Halaman Utama";
		

?>
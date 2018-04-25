<?php
  session_start();	
  include "../config/koneksi.php";
  include "../config/session_manager.php";
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Aplikasi Prediksi Penjualan C.45 - CV Putra Elektronik</title>
<link href="../templates/style.css" rel="stylesheet" type="text/css" />
<script src="tiny_mce/tiny_mce.js" type="text/javascript"></script>
<script src="tiny_mce/tiny_gugun.js" type="text/javascript"></script>
</head>
<body>

<div id="container_wrapper">
	<div id="container">
  <div id="header">
      <div id="inner_header">
	  <center>CV. PUTRA ELEKTRONIK</center>
			<!-- <img src='templates/images/head.jpg'> -->
      </div>
  </div>
  
  	<div id="top"> 
		<span class="cpojer-links"> <center>
					<a href='home'>Home Page</a> 
					<a href='profile.html'>Profile</a>
					<a href='semua-data.html'>Semua Data</a>
					<a href='data-mining.html'>Lakukan Mining C45</a> 
					<a href='perhitungan.html'>Perhitungan C45</a>
					<a href='pohon-keputusan.html'>Pohon Keputusan C45</a>
					<a href='../logout.php'>Logout</a> 					</center>
		</span>
	</div>
  
		<div id="left_column">
			<div class="text_area" align="justify">	
				<?php include "content.php"; ?>
					<br/>
			</div>
		</div>

        
</div>
</div>
</body>
</html>
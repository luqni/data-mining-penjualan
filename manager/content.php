<?php
include "../config/session_manager.php";
if ($_GET[module]=='home'){
	echo "<h2>Aplikasi Data Mining C.45 untuk Memprediksi Penjualan pada CV Putra Elektronik</h2>
		  <p>Data mining adalah serangkaian proses untuk menggali nilai tambah berupa informasi yang selama ini tidak diketahui secara manual dari suatu basis data. Informasi yang dihasilkan diperoleh dengan cara mengekstraksi dan mengenali pola yang penting atau menarik dari data yang terdapat dalam basis data [4].
			 Data mining adalah proses yang menggunakan teknik statistik, matematika, kecerdasan buatan, dan machine learning untuk mengekstraksi dan mengidentifikasi informasi yang bermanfaat dan pengetahuan yang terkait dari berbagai database besar.</p>
		  <p>Menurut Gartner Group data mining adalah suatu proses menemukan hubungan yang berarti, pola, dan kecenderungan dengan memeriksa dalam sekumpulan besar data yang tersimpan dalam penyimpanan dengan menggunakan teknik pengenalan pola seperti teknik statistik dan matematika [5].
			 Data mining bukanlah suatu bidang yang sama sekali baru. Salah satu kesulitan untuk mendefinisikan data mining adalah kenyataan bahwa data mining mewarisi banyak aspek dan teknik dari bidang-bidang ilmu yang sudah mapan terlebih dulu. </p>
		  <p>Menurut para ahli, data mining merupakan sebuah analisa dari observasi data dalam jumlah besar untuk menemukan hubungan yang tidak diketahui sebelumnya dan metode baru untuk meringkas data agar mudah dipahami serta kegunaannya untuk pemilik data.
			 Data-data yang ada, tidak dapat langsung diolah dengan menggunakan sistem data mining. Data-data tersebut harus dipersiapkan terlebih dahulu agar hasil yang diperoleh dapat lebih maksimal, dan waktu komputasinya lebih minimal. Proses persiapan data ini sendiri dapat mencapai 60 % dari keseluruhan proses dalam data mining.</p>
			<br><br> "; 
}
elseif ($_GET[module]=='profile'){
	echo "<h2>Profile Perusahaan - CV. Putra Elektronik</h2>
		  <p>Data mining adalah serangkaian proses untuk menggali nilai tambah berupa informasi yang selama ini tidak diketahui secara manual dari suatu basis data. Informasi yang dihasilkan diperoleh dengan cara mengekstraksi dan mengenali pola yang penting atau menarik dari data yang terdapat dalam basis data [4].
			 Data mining adalah proses yang menggunakan teknik statistik, matematika, kecerdasan buatan, dan machine learning untuk mengekstraksi dan mengidentifikasi informasi yang bermanfaat dan pengetahuan yang terkait dari berbagai database besar.</p>
		  <p>Menurut Gartner Group data mining adalah suatu proses menemukan hubungan yang berarti, pola, dan kecenderungan dengan memeriksa dalam sekumpulan besar data yang tersimpan dalam penyimpanan dengan menggunakan teknik pengenalan pola seperti teknik statistik dan matematika [5].
			 Data mining bukanlah suatu bidang yang sama sekali baru. Salah satu kesulitan untuk mendefinisikan data mining adalah kenyataan bahwa data mining mewarisi banyak aspek dan teknik dari bidang-bidang ilmu yang sudah mapan terlebih dulu. </p>
		  <p>Menurut para ahli, data mining merupakan sebuah analisa dari observasi data dalam jumlah besar untuk menemukan hubungan yang tidak diketahui sebelumnya dan metode baru untuk meringkas data agar mudah dipahami serta kegunaannya untuk pemilik data.
			 Data-data yang ada, tidak dapat langsung diolah dengan menggunakan sistem data mining. Data-data tersebut harus dipersiapkan terlebih dahulu agar hasil yang diperoleh dapat lebih maksimal, dan waktu komputasinya lebih minimal. Proses persiapan data ini sendiri dapat mencapai 60 % dari keseluruhan proses dalam data mining.</p>
			<br><br> "; 
}
elseif ($_GET[module]=='semuadata'){
	include "semua-data.php";
}
elseif ($_GET[module]=='prosesexcel'){
	include "proses_excel.php";
}
elseif ($_GET[module]=='perhitungan'){
	include "perhitungan.php";
}
elseif ($_GET[module]=='datamining'){
	include "mining.php";
}
elseif ($_GET[module]=='pohonkeputusan'){
	include "pohon-keputusan.php";
}
elseif ($_GET[module]=='hapuspohon'){
        mysql_query("TRUNCATE iterasi_c45");
        mysql_query("TRUNCATE pohon_keputusan_c45");
				echo "<script>window.alert('Pohon Keputusan Berhasil Di Hapus !!!');
				window.location='pohon-keputusan.html'</script>";
}
elseif ($_GET[module]=='hapusdata'){
        mysql_query("TRUNCATE iterasi_c45");
        mysql_query("TRUNCATE data_survey");
		mysql_query("TRUNCATE mining_c45");
		mysql_query("TRUNCATE pohon_keputusan_c45");
				echo "<script>window.alert('Semua Data Berhasil Di Hapus !!!');
				window.location='semua-data.html'</script>";
}
elseif ($_GET[module]=='installdata'){
mysql_query("INSERT INTO `data_survey` (`id`, `kode_barang`, `jenis_barang`, `merek`, `tahun`, `harga`, `status`) VALUES
(1, '3322', 'Laptop', 'Axioo', '2004', '7500000', 'Laris'),
(2, '5651', 'PC', 'Toshiba', '2009', '12000000', 'Laris'),
(3, '8819', 'PC', 'Toshiba', '2010', '13000000', 'Laris'),
(4, '1328', 'PC', 'Toshiba', '2009', '12000000', 'Laris'),
(5, '1376', 'PC', 'Axioo', '2010', '13500000', 'Laris'),
(6, '5513', 'Laptop', 'Acer', '2002', '9000000', 'Laris'),
(7, '7074', 'Laptop', 'Toshiba', '2003', '6500000', 'Tidak Laris'),
(8, '6005', 'Laptop', 'Toshiba', '2005', '12000000', 'Tidak Laris'),
(9, '1329', 'PC', 'Axioo', '2010', '13000000', 'Laris'),
(10, '6646', 'Laptop', 'Axioo', '2008', '11000000', 'Laris'),
(11, '6469', 'Laptop', 'Acer', '2011', '19000000', 'Tidak Laris'),
(12, '6336', 'PC', 'Toshiba', '2010', '13000000', 'Laris'),
(13, '1241', 'Laptop', 'Acer', '2007', '15000000', 'Tidak Laris'),
(14, '2770', 'PC', 'Toshiba', '2010', '13000000', 'Laris'),
(15, '6322', 'Laptop', 'Toshiba', '2003', '7000000', 'Tidak Laris'),
(16, '2431', 'PC', 'Toshiba', '2009', '12000000', 'Laris'),
(17, '2212', 'Laptop', 'Axioo', '2008', '11000000', 'Laris'),
(18, '1174', 'Laptop', 'Acer', '2004', '10000000', 'Laris'),
(19, '5535', 'PC', 'Axioo', '2009', '12000000', 'Laris'),
(20, '1337', 'PC', 'Toshiba', '2010', '13000000', 'Laris'),
(21, '7334', 'Laptop', 'Acer', '2004', '10000000', 'Laris'),
(22, '1244', 'Laptop', 'Axioo', '2005', '9000000', 'Laris'),
(23, '8005', 'PC', 'Toshiba', '2010', '13000000', 'Laris'),
(24, '6221', 'PC', 'Axioo', '2009', '12000000', 'Laris'),
(25, '1021', 'Laptop', 'Acer', '2007', '15500000', 'Tidak Laris')");

				echo "<script>window.alert('Berhasil Install Data Penjualan !!!');
				window.location='semua-data.html'</script>";
}
elseif ($_GET[module]=='hapusperhitungan'){
        mysql_query("TRUNCATE iterasi_c45");
        mysql_query("TRUNCATE pohon_keputusan_c45");
				echo "<script>window.alert('Data Perhitungan C4.5 Berhasil Di Hapus !!!');
				window.location='perhitungan.html'</script>";
}
elseif ($_GET[module]=='inputbarang'){
		 echo "<h2>Tambahkan Jenis barang Pada CV. Putra Elektronik.</h2><hr><br/><br/>
          <form method=POST action='simpan-atribut.html'>
		  <div class='td'>
          <table width=60% style='margin-left:20%'>						 <input type=hidden name='a' value='jenis_barang'>
			  <tr><td width='165px'>Jenis Barang</td>   		 <td>:</td> <td> <input type=text name='b' style='width:99%'></td></tr>
		
			  <tr><td colspan=2><br/><br/><input class='linkkk' type=submit value=Simpan>
			  <input class='linkkk' type=button value=Batal onclick=self.history.back()><br/><br/></td></tr>
          </table><br/><br/><br/></div></form>";
}
elseif ($_GET[module]=='inputmerek'){
		 echo "<h2>Tambahkan Merek Pada CV. Putra Elektronik.</h2><hr><br/><br/>
          <form method=POST action='simpan-atribut.html'>
		  <div class='td'>
          <table width=60% style='margin-left:20%'>						 <input type=hidden name='a' value='merek'>
			  <tr><td width='165px'>Merek</td>   		 <td>:</td> <td> <input type=text name='b' style='width:99%'></td></tr>
		
			  <tr><td colspan=2><br/><br/><input class='linkkk' type=submit value=Simpan>
			  <input class='linkkk' type=button value=Batal onclick=self.history.back()><br/><br/></td></tr>
          </table><br/><br/><br/></div></form>";	
}
elseif ($_GET[module]=='inputtahun'){
		 echo "<h2>Tambahkan Tahun Barang CV Putra Elektronik.</h2><hr><br/><br/>
          <form method=POST action='simpan-atribut.html'>
		  <div class='td'>
          <table width=60% style='margin-left:20%'>						 <input type=hidden name='a' value='tahun'>
			  <tr><td width='165px'>Tahun Barang</td>   		 <td>:</td> <td> <input type=text name='b' style='width:99%'></td></tr>
		
			  <tr><td colspan=2><br/><br/><input class='linkkk' type=submit value=Simpan>
			  <input class='linkkk' type=button value=Batal onclick=self.history.back()><br/><br/></td></tr>
          </table><br/><br/><br/></div></form>";	
}
elseif ($_GET[module]=='simpanatribut'){
	if (empty($_POST[b])){
		echo "<script>window.alert('Maaf, Form Inputan masih kosong !!!.');
			window.location='javascript:history.go(-1)'</script>";
	}else{
	   mysql_query("INSERT INTO atribut(atribut,
										nilai_atribut) 
								VALUES('$_POST[a]',
									   '$_POST[b]')");
										   
			echo "<script>window.alert('Sukses Menyimpan data $_POST[a] !!!');
				window.location='input-data.html'</script>";
}
}
elseif ($_GET[module]=='inputdata'){
	 echo "<h2>Tambahkan Data Penjualan Baru Pada CV. Putra Elektronik.</h2><hr><br/><br/>
          <form method=POST action='simpan-data.html'>
		  <div class='td'>
          <table width=60% style='margin-left:20%'>						 
		  <tr><td width='165px'>Kode Barang</td>   		 <td>:</td> <td> <input type=text name='kode_barang' style='width:99%'></td></tr>
		  <tr><td>Jenis Barang</td>    	 <td>:</td> <td>"; ?>
				<select style='width:84%; margin-bottom:5px;' name='jenis_barang' ONCHANGE="location = this.options[this.selectedIndex].value;">
				<?php echo "<option value=0 selected>- Pilih Jenis Barang -</option>";
				$tampil=mysql_query("SELECT * FROM atribut WHERE atribut='jenis_barang'");
				while($r=mysql_fetch_array($tampil)){
				echo "<option value='jenis-$r[nilai_atribut].html'>$r[nilai_atribut]</option>";
				}
		  echo " </select><input style='' type=button value='Tambah' onclick=\"window.location.href='input-barang.html';\"></td></tr>
		  <tr><td>Merek</td>    	 <td>:</td> <td>
				<select style='width:84%; margin-bottom:5px;' name='merek'>
				<option value=0 selected>- Pilih Merek -</option>";
				$tampil=mysql_query("SELECT * FROM atribut WHERE atribut='merek'");
				while($r=mysql_fetch_array($tampil)){
				echo "<option value='$r[nilai_atribut]'>$r[nilai_atribut]</option>";
				}
		  echo " </select><input style='' type=button value='Tambah' onclick=\"window.location.href='input-merek.html';\"></td></tr>
		  <tr><td>Tahun</td>    	 <td>:</td> <td>
				<select style='width:84%; margin-bottom:5px;' name='tahun'>
				<option value=0 selected>- Pilih Tahun -</option>";
				$tampil=mysql_query("SELECT * FROM atribut WHERE atribut='tahun'");
				while($r=mysql_fetch_array($tampil)){
				echo "<option value='$r[nilai_atribut]'>$r[nilai_atribut]</option>";
				}
		  echo " </select><input style='' type=button value='Tambah' onclick=\"window.location.href='input-tahun.html';\"></td></tr>
		  <tr><td>Harga</td>     <td>:</td> <td><input type=text name='harga' style='width:99%'></td></tr>
		  <tr><td>Status</td>     <td>:</td> <td> 
				<select style='width:100%; margin-bottom:5px;' name='status'>
				<option value=0 selected>- Pilih Status -</option>
				<option value='Laris'> Laris </option>
				<option value='Tidak Laris'> Tidak Laris </option>";
		  echo " </select></td></tr>
    
          <tr><td colspan=2><br/><br/><input class='linkkk' type=submit value=Simpan>
		  <input class='linkkk' type=button value=Batal onclick=self.history.back()><br/><br/>
          </table>
		  <table>
		<h2>Jumlah Laris dan Tidak Laris :</h2><hr>
		<tr><td width='160px;' style='color:green;'>Jumlah Laris</td> <td> : </td><td>0 Barang - (Persentase : 0 %)</td></tr>
		<tr><td style='color:red;'>Jumlah Tidak Laris</td> <td> : </td><td>0 Barang - (Persentase : 0 %)</td></tr>
		</tr></table><br/></div></form>";
}

elseif ($_GET[module]=='inputdataa'){
		  $sql=mysql_query("SELECT * FROM data_survey WHERE jenis_barang='$_GET[jenis]' AND status='Laris'");
		  $sql2=mysql_query("SELECT * FROM data_survey WHERE jenis_barang='$_GET[jenis]' AND status='Tidak Laris'");
		  $sql3=mysql_query("SELECT * FROM data_survey WHERE jenis_barang='$_GET[jenis]'");
			$laris=mysql_num_rows($sql);
			$tidak_laris=mysql_num_rows($sql2);
			$total_data=mysql_num_rows($sql3);
			
			$persentase1 = ($laris!=0)?($laris/$total_data)*100:0;
			$persentase_laris=round($persentase1,0);
			$persentase2 = ($tidak_laris!=0)?($tidak_laris/$total_data)*100:0;
			$persentase_tidak_laris = round($persentase2,0);
	 echo "<h2>Tambahkan Data Penjualan Baru Pada CV. Putra Elektronik.</h2><hr><br/><br/>
          <form method=POST action='simpan-data.html'>
		  <div class='td'>
          <table width=60% style='margin-left:20%'>						 
		  <tr><td width='165px'>Kode Barang</td>   		 <td>:</td> <td> <input type=text name='kode_barang' style='width:99%'></td></tr>
		  <tr><td>Jenis Barang</td>    	 <td>:</td> <td>"; ?>
				<select style='width:84%; margin-bottom:5px;' name='jenis_barang' ONCHANGE="location = this.options[this.selectedIndex].value;">
				<?php echo "<option value='$_GET[jenis]' selected> $_GET[jenis] </option>";
				$tampil=mysql_query("SELECT * FROM atribut WHERE atribut='jenis_barang'");
				while($r=mysql_fetch_array($tampil)){
				echo "<option value='jenis-$r[nilai_atribut].html'>$r[nilai_atribut]</option>";
				}
		  echo " </select><input style='' type=button value='Tambah' onclick=\"window.location.href='input-barang.html';\"></td></tr>
		  <tr><td>Merek</td>    	 <td>:</td> <td>"; ?>
				<select style='width:84%; margin-bottom:5px;' name='merek' ONCHANGE="location = this.options[this.selectedIndex].value;">
				<?php echo "<option value=0 selected>- Pilih Merek -</option>";
				$tampil=mysql_query("SELECT * FROM atribut WHERE atribut='merek'");
				while($r=mysql_fetch_array($tampil)){
				echo "<option value='jeniss-$_GET[jenis]-merek-$r[nilai_atribut].html'>$r[nilai_atribut]</option>";
				}
		  echo " </select><input style='' type=button value='Tambah' onclick=\"window.location.href='input-merek.html';\"></td></tr>
		  <tr><td>Tahun</td>    	 <td>:</td> <td>
				<select style='width:84%; margin-bottom:5px;' name='tahun'>
				<option value=0 selected>- Pilih Tahun -</option>";
				$tampil=mysql_query("SELECT * FROM atribut WHERE atribut='tahun'");
				while($r=mysql_fetch_array($tampil)){
				echo "<option value='$r[nilai_atribut]'>$r[nilai_atribut]</option>";
				}
		  echo " </select><input style='' type=button value='Tambah' onclick=\"window.location.href='input-tahun.html';\"></td></tr>
		  <tr><td>Harga</td>     <td>:</td> <td><input type=text name='harga' style='width:99%'></td></tr>
		  <tr><td>Sstatus</td>     <td>:</td> <td> 
				<select style='width:100%; margin-bottom:5px;' name='status'>";
				if ($laris > $tidak_laris) {
					echo "<option value='Laris' selected> Laris </option>";
				}else{
					echo "<option value='Tidak Laris' selected>Tidak Laris </option>";
				}
				echo "
				<option value='Laris'> Laris </option>
				<option value='Tidak Laris'> Tidak Laris </option>";
		  echo " </select></td></tr>
    
          <tr><td colspan=2><br/><br/><input class='linkkk' type=submit value=Simpan>
		  <input class='linkkk' type=button value=Batal onclick=self.history.back()><br/><br/>
          </table>
		  <table>";

		echo "<h2>Jumlah Laris dan Tidak Laris :</h2><hr>
		<tr><td width='160px;' style='color:green;'>Jumlah Laris</td> <td> : </td><td>$laris Barang - (Persentase : $persentase_laris %)</td></tr>
		<tr><td style='color:red;'>Jumlah Tidak Laris</td> <td> : </td><td>$tidak_laris Barang - (Persentase : $persentase_tidak_laris %)</td></tr>
		</tr></table><br/></div></form>";
}

elseif ($_GET[module]=='inputdataaa'){
		  $sql=mysql_query("SELECT * FROM data_survey WHERE jenis_barang='$_GET[jenis]' AND merek='$_GET[merek]' AND status='Laris'");
		  $sql2=mysql_query("SELECT * FROM data_survey WHERE jenis_barang='$_GET[jenis]' AND merek='$_GET[merek]' AND status='Tidak Laris'");
		  $sql3=mysql_query("SELECT * FROM data_survey WHERE jenis_barang='$_GET[jenis]' AND merek='$_GET[merek]'");
			$laris=mysql_num_rows($sql);
			$tidak_laris=mysql_num_rows($sql2);
			$total_data=mysql_num_rows($sql3);
			
			$persentase1 = ($laris!=0)?($laris/$total_data)*100:0;
			$persentase_laris=round($persentase1,0);
			$persentase2 = ($tidak_laris!=0)?($tidak_laris/$total_data)*100:0;
			$persentase_tidak_laris = round($persentase2,0);
	 echo "<h2>Tambahkan Data Penjualan Baru Pada CV. Putra Elektronik.</h2><hr><br/><br/>
          <form method=POST action='simpan-data.html'>
		  <div class='td'>
          <table width=60% style='margin-left:20%'>						 
		  <tr><td width='165px'>Kode Barang</td>   		 <td>:</td> <td> <input type=text name='kode_barang' style='width:99%'></td></tr>
		  <tr><td>Jenis Barang</td>    	 <td>:</td> <td>"; ?>
				<select style='width:84%; margin-bottom:5px;' name='jenis_barang' ONCHANGE="location = this.options[this.selectedIndex].value;">
				<?php echo "<option value='$_GET[jenis]' selected> $_GET[jenis] </option>";
				$tampil=mysql_query("SELECT * FROM atribut WHERE atribut='jenis_barang'");
				while($r=mysql_fetch_array($tampil)){
				echo "<option value='jenis-$r[nilai_atribut].html'>$r[nilai_atribut]</option>";
				}
		  echo " </select><input style='' type=button value='Tambah' onclick=\"window.location.href='input-barang.html';\"></td></tr>
		  <tr><td>Merek</td>    	 <td>:</td> <td>"; ?>
				<select style='width:84%; margin-bottom:5px;' name='merek' ONCHANGE="location = this.options[this.selectedIndex].value;">
				<?php echo "<option value='$_GET[merek]' selected> $_GET[merek] </option>";
				$tampil=mysql_query("SELECT * FROM atribut WHERE atribut='merek'");
				while($r=mysql_fetch_array($tampil)){
				echo "<option value='jeniss-$_GET[jenis]-merek-$r[nilai_atribut].html'>$r[nilai_atribut]</option>";
				}
		  echo " </select><input style='' type=button value='Tambah' onclick=\"window.location.href='input-merek.html';\"></td></tr>
		  <tr><td>Tahun</td>    	 <td>:</td> <td>
				<select style='width:84%; margin-bottom:5px;' name='tahun'>
				<option value=0 selected>- Pilih Tahun -</option>";
				$tampil=mysql_query("SELECT * FROM atribut WHERE atribut='tahun'");
				while($r=mysql_fetch_array($tampil)){
				echo "<option value='$r[nilai_atribut]'>$r[nilai_atribut]</option>";
				}
		  echo " </select><input style='' type=button value='Tambah' onclick=\"window.location.href='input-tahun.html';\"></td></tr>
		  <tr><td>Harga</td>     <td>:</td> <td><input type=text name='harga' style='width:99%'></td></tr>
		  <tr><td>Status</td>     <td>:</td> <td> 
				<select style='width:100%; margin-bottom:5px;' name='status'>";
				if ($laris > $tidak_laris) {
					echo "<option value='Laris' selected> Laris </option>";
				}else{
					echo "<option value='Tidak Laris' selected>Tidak Laris </option>";
				}
				echo "
				<option value='Laris'> Laris </option>
				<option value='Tidak Laris'> Tidak Laris </option>";
		  echo " </select></td></tr>
    
          <tr><td colspan=2><br/><br/><input class='linkkk' type=submit value=Simpan>
		  <input class='linkkk' type=button value=Batal onclick=self.history.back()><br/><br/>
          </table>
		  <table>";

		echo "<h2>Jumlah Laris dan Tidak Laris :</h2><hr>
		<tr><td width='160px;' style='color:green;'>Jumlah Laris</td> <td> : </td><td>$laris Barang - (Persentase : $persentase_laris %)</td></tr>
		<tr><td style='color:red;'>Jumlah Tidak Laris</td> <td> : </td><td>$tidak_laris Barang - (Persentase : $persentase_tidak_laris %)</td></tr>
		</tr></table><br/></div></form>";
}

elseif ($_GET[module]=='editdata'){
  $sql=mysql_query("SELECT * FROM data_survey WHERE id=$_GET[id]");
  $e=mysql_fetch_array($sql);
	 echo "<h2>Edit Data Penjualan Baru Pada CV. Putra Elektronik.</h2><hr><br/><br/>
          <form method=POST action='simpan-edit-data.html'>
		  <div class='td'>
          <table width=60% style='margin-left:20%'>						 <input type=hidden value='$e[id]' name='id' style='width:99%'>
		  <tr><td width='165px'>Kode Barang</td>   		 <td>:</td> <td> <input type=text value='$e[kode_barang]' name='kode_barang' style='width:99%'></td></tr>
		  <tr><td>Jenis Barang</td>    	 <td>:</td> <td>
				<select style='width:100%; margin-bottom:5px;' name='jenis_barang'>
				<option value='$e[jenis_barang]' selected> $e[jenis_barang] </option>";
				$tampil=mysql_query("SELECT * FROM atribut WHERE atribut='jenis_barang'");
				while($r=mysql_fetch_array($tampil)){
				echo "<option value='$r[nilai_atribut]'>$r[nilai_atribut]</option>";
				}
		  echo " </select></td></tr>
		  <tr><td>Merek</td>    	 <td>:</td> <td>
				<select style='width:100%; margin-bottom:5px;' name='merek'>
				<option value='$e[merek]' selected> $e[merek] </option>";
				$tampil=mysql_query("SELECT * FROM atribut WHERE atribut='merek'");
				while($r=mysql_fetch_array($tampil)){
				echo "<option value='$r[nilai_atribut]'>$r[nilai_atribut]</option>";
				}
		  echo " </select></td></tr>
		  <tr><td>Tahun</td>    	 <td>:</td> <td>
				<select style='width:100%; margin-bottom:5px;' name='tahun'>
				<option value='$e[tahun]' selected> $e[tahun] </option>";
				$tampil=mysql_query("SELECT * FROM atribut WHERE atribut='tahun'");
				while($r=mysql_fetch_array($tampil)){
				echo "<option value='$r[nilai_atribut]'>$r[nilai_atribut]</option>";
				}
		  echo " </select></td></tr>
		  <tr><td>Harga</td>     <td>:</td> <td><input type=text value='$e[harga]' name='harga' style='width:99%'></td></tr>
		  <tr><td>Status</td>     <td>:</td> <td> 
				<select style='width:100%; margin-bottom:5px;' name='status'>
				<option value='$e[status]' selected> $e[status] </option>
				<option value='Laris'> Laris </option>
				<option value='Tidak Laris'> Tidak Laris </option>";
		  echo " </select></td></tr>
    
          <tr><td colspan=2><br/><br/><input class='linkkk' type=submit value=Simpan>
		  <input class='linkkk' type=button value=Batal onclick=self.history.back()><br/><br/></td></tr>
          </table></div></form>";
}
elseif ($_GET[module]=='hapusdata'){
	  mysql_query("DELETE FROM data_survey WHERE id='$_GET[id]'");
	  			echo "<script>window.alert('Sukses Menghapus data Penjualan !!!');
				window.location='semua-data.html'</script>";
}
elseif ($_GET[module]=='simpandata'){
	if (empty($_POST[kode_barang])){
		echo "<script>window.alert('Anda belum mengisikan No Polisi.');
			window.location='javascript:history.go(-1)'</script>";
	}
	elseif (empty($_POST[jenis_barang])){
		echo "<script>window.alert('Anda belum memilih Jenis barang.');
			window.location='javascript:history.go(-1)'</script>";
	}
	elseif (empty($_POST[merek])){
		echo "<script>window.alert('Anda belum memilih merek.');
			window.location='javascript:history.go(-1)'</script>";
	}
	elseif (empty($_POST[tahun])){
		echo "<script>window.alert('Anda belum memilih Tahun.');
			window.location='javascript:history.go(-1)'</script>";
	}
	elseif (empty($_POST[harga])){
		echo "<script>window.alert('Anda belum mengisikan Harga.');
			window.location='javascript:history.go(-1)'</script>";
	}
	elseif (empty($_POST[status])){
		echo "<script>window.alert('Anda belum memilih JStatus.');
			window.location='javascript:history.go(-1)'</script>";
	}else{
	   mysql_query("INSERT INTO data_survey(kode_barang,
											jenis_barang,
											merek,
											tahun,
											harga,
											status) 
									VALUES('$_POST[kode_barang]',
										   '$_POST[jenis_barang]',
										   '$_POST[merek]',
										   '$_POST[tahun]',
										   '$_POST[harga]',
										   '$_POST[status]')");
			echo "<script>window.alert('Sukses Menyimpan data Penjualan !!!');
				window.location='semua-data.html'</script>";
}
}

elseif ($_GET[module]=='simpanedit'){
    mysql_query("UPDATE data_survey SET kode_barang  = '$_POST[kode_barang]',
									   jenis_barang = '$_POST[jenis_barang]', 
									   merek	   = '$_POST[merek]',
									   tahun       = '$_POST[tahun]',
									   harga       = '$_POST[harga]',
									   status	   = '$_POST[status]'
								 WHERE id   = '$_POST[id]'");
			echo "<script>window.alert('Sukses Update data Penjualan !!!');
				window.location='semua-data.html'</script>";
}
?>
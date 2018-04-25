<head>
<title>Data Penjualan - CV. Putra Elektronik</title>
</head>
<body onload="window.print()">
<?php 
  include "../config/koneksi.php";
	echo "<table width=100%>
			<center><h2>LAPORAN DATA PENJUALAN <br/>
			PRODUK / BARANG DI CV. PUTRA ELEKTRONIK </h2></center><hr/>";
       echo "<table width='100%'  border='1' cellspacing='0' cellpadding='3'>
          <tr style='text-transform:uppercase; background:#e3e3e3; color:#000;'>
              <th>No</th>
              <th>Kode Barang</th>
              <th>Jenis Barang</th>
              <th>Merek</th>
              <th>Tahun</th>
              <th>Harga</th>
              <th>Status</th>
          </tr>";
        $warna  = $warna1; 
        $no = 1; 
        $sql=mysql_query("SELECT * FROM data_survey ORDER BY id DESC");
        while ($data=mysql_fetch_array($sql)){
            if($warna == $warna1){ 
                $warna = $warna2; 
            } else { 
                $warna = $warna1; 
            } 
            echo "<tr bgcolor='$warna'>
                  <td>$no</td>
                  <td>$data[kode_barang]</td>
                  <td>$data[jenis_barang]</td>
                  <td>$data[merek]</td>
                  <td>$data[tahun]</td>
                  <td>$data[harga]</td>
                  <td><b>$data[status]</b></td>
                  </tr>";
            $no++;
        }
        echo"</table>";
?>
<?php
switch($_GET[act]){
    default:
        echo "<h2>Semua Data Penjualan Barang Pada CV. Putra Elektronik </h2>
		<a style='color:red; margin-bottom:3px;' target='_BLANK' href='print-data.php'>Print Semua Data</a> - <a style='color:red; margin-bottom:3px;' href='hapus-data.html'>Hapus Semua Data</a><br>";
		/* <form method='post' enctype='multipart/form-data' action='proses-excel.html'>
			Upload Data dari Excel: <input style='border:1px solid #000;'name='userfile' type='file'>
			<input name='upload' type='submit' value='Import'>
		</form> */
		echo "<input style='float:right; margin-top:-27px; margin-bottom:3px;' type=button value='Input Data Penjualan Baru' onclick=\"window.location.href='input-data.html';\">";
        echo "<table width='100%'  border='1' cellspacing='0' cellpadding='3'>
          <tr style='text-transform:uppercase; background:#000; color:#fff;'>
              <th>No</th>
              <th>Kode Barang</th>
              <th>Jenis Barang</th>
              <th>Merek</th>
              <th>Tahun</th>
              <th>Harga</th>
              <th>Status</th>
              <th align=center>Action</th>
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
                  <td>BRG_$data[kode_barang]</td>
                  <td>$data[jenis_barang]</td>
                  <td>$data[merek]</td>
                  <td>$data[tahun]</td>
                  <td>Rp $data[harga]</td>
                  <td><b>$data[status]</b></td>
                  <td><a href=edit-data-$data[id].html>Edit</a> |
                  <a href=hapus-data-$data[id].html>Hapus</a>
                  </td>
                  </tr>";
            $no++;
        }
        echo"</table>";
    break;

    case "hapus_semua_data";
        mysql_query("TRUNCATE data_survey");
        header('location:data_survey.php');
    break;

    case "edit_data_survey";
        include "edit_data_survey.php";
    break;
    case "hapus_data_survey";
        mysql_query("DELETE FROM data_survey WHERE id = '$_GET[id]'");
        header('location:data_survey.php');
    break;
}
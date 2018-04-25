<?php
echo "<h2>Tabel Perhitungan Dengan Menggunakan Algoritma C45</h2>
			<input style='float:right; margin-top:-27px; margin-bottom:3px;' type=button value='Hapus Semua Data Perhitungan' onclick=\"window.location.href='hapus-perhitungan.html';\">";
    echo " <table width='100%' border='1' cellspacing='0' cellspading='0'>
           <tr style='text-transform:uppercase; background:#000; color:#fff;'>
               <th>No</th> 
			   <th>Att Gain Ratio Max</th>
               <th>Atribut</th>
               <th>Nilai Atribut</th>
               <th>Total Kasus</th>
               <th>Jumlah Laris</th>
               <th>Jumlah Tidak Laris</th>
               <th>Entropy</th>
               <th>Gain</th>
			</tr>";
           
    
    $warna  = $warna1; 
    $sql=mysql_query("SELECT * FROM iterasi_c45");
    while ($data=mysql_fetch_array($sql)){
        if($warna == $warna1){ 
            $warna = $warna2; 
        } else { 
            $warna = $warna1; 
        } 
        echo "<tr bgcolor='$warna'>
               <td>$data[iterasi]</td>
               <td>$data[atribut_gain_ratio_max]</td>
			   <td>$data[atribut]</td>
               <td>$data[nilai_atribut]</td>
               <td>$data[jml_kasus_total]</td>
               <td>$data[jml_laris]</td>
               <td>$data[jml_tdk_laris]</td>
               <td>$data[entropy]</td>
               <td>$data[inf_gain]</td>";
        }
        echo "</tr>";
    echo"</table>";
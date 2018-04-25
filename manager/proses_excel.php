<?php
// menggunakan class phpExcelReader
include "excel_reader2.php";

// membaca file excel yang diupload
$data = new Spreadsheet_Excel_Reader($_FILES['userfile']['tmp_name']);

// membaca jumlah baris dari data excel
$baris = $data->rowcount($sheet_index=0);

// nilai awal counter untuk jumlah data yang sukses dan yang gagal diimport
$sukses = 0;
$gagal = 0;

// import data excel mulai baris ke-2 (karena baris pertama adalah nama kolom)
for ($i=2; $i<=$baris; $i++)
{
  // membaca data nim (kolom ke-1 sampai 7)
  $id = $data->val($i, 1);
  $no_polisi = $data->val($i, 2);
  $jenis_mobil = $data->val($i, 3);
  $pabrikan = $data->val($i, 4);
  $tahun = $data->val($i, 5);
  $harga = $data->val($i, 6);
  $status = $data->val($i, 7);

  // setelah data dibaca, sisipkan ke dalam tabel mhs
  $query = "INSERT INTO data_survey VALUES ('$id', '$no_polisi', '$jenis_mobil', '$pabrikan', '$tahun', '$harga', '$status')";
  $hasil = mysql_query($query);

  // jika proses insert data sukses, maka counter $sukses bertambah
  // jika gagal, maka counter $gagal yang bertambah
  if ($hasil) $sukses++;
  else $gagal++;
}

// tampilan status sukses dan gagal
echo "<center style='margin-top:10%; padding-bottom:14%;'><h3>Proses import data selesai...!!!</h3>";
echo "<p>Jumlah Data Survey yang sukses di import : ".$sukses."<br>";
echo "Jumlah Data Survey yang gagal di import : ".$gagal."</p>
<input type=button value='Lihat Semua Data' onclick=\"window.location.href='semua-data.html';\"></center>";

?>
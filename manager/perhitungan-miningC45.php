<?php
//---------- KUMPULAN FUNGSI YANG AKAN DILAKUKAN DALAM PROSES MINING ----------
function miningC45($atribut, $nilai_atribut)
{
    perhitunganC45($atribut, $nilai_atribut);
    insertAtributPohonKeputusan($atribut, $nilai_atribut);
    getInfGainMax($atribut, $nilai_atribut);
    replaceNull();
}

//#1# Hapus semua DB dan insert default atribut dan nilai atribut
function populateDb() 
{
    mysql_query("TRUNCATE mining_c45");
    mysql_query("TRUNCATE iterasi_c45");
    mysql_query("TRUNCATE pohon_keputusan_c45");
    populateAtribut();
}

function populateAtribut() 
{
    mysql_query("TRUNCATE atribut");
    mysql_query("INSERT INTO `atribut` (`id`, `atribut`, `nilai_atribut`) VALUES
    ('', 'total', 'total'),
    ('', 'jenis_barang', 'Laptop'),
    ('', 'jenis_barang', 'PC'),
    ('', 'merek', 'Acer'),
    ('', 'merek', 'Toshiba'),
    ('', 'merek', 'Axioo'),
    ('', 'tahun', '2003'),
	('', 'tahun', '2004'),
	('', 'tahun', '2005'),
	('', 'tahun', '2007'),
	('', 'tahun', '2008'),
	('', 'tahun', '2009'),
	('', 'tahun', '2010'),
	('', 'tahun', '2011'),
    ('', 'harga', '7500000'),
	('', 'harga', '12000000'),
	('', 'harga', '13000000'),
	('', 'harga', '13500000'),
	('', 'harga', '9000000'),
	('', 'harga', '6500000'),
	('', 'harga', '11000000'),
	('', 'harga', '19000000'),
	('', 'harga', '15000000'),
	('', 'harga', '7000000'),
	('', 'harga', '10000000'),
	('', 'harga', '15500000')
    ");
}

// ================ FUNGSI PERHITUNGAN C45 =================
function perhitunganC45($atribut, $nilai_atribut) 
{
    if (empty($atribut) AND empty($nilai_atribut)) {
//#2# Jika atribut yg diinputkan kosong, maka lakukan perhitungan awal
        $kondisiAtribut = ""; // set kondisi atribut kosong
    } else if (!empty($atribut) AND !empty($nilai_atribut)) { 
        // jika atribut tdk kosong, maka select kondisi atribut dari DB
        $sqlKondisiAtribut = mysql_query("SELECT kondisi_atribut FROM pohon_keputusan_c45 WHERE atribut = '$atribut' AND nilai_atribut = '$nilai_atribut' order by id DESC LIMIT 1");
        $rowKondisiAtribut = mysql_fetch_array($sqlKondisiAtribut);
        $kondisiAtribut = str_replace("~", "'", $rowKondisiAtribut['kondisi_atribut']); // replace string ~ menjadi '
    } 
    
    // ambil seluruh atribut
    $sqlAtribut = mysql_query("SELECT distinct atribut FROM atribut");
    while($rowGetAtribut = mysql_fetch_array($sqlAtribut)) {
        $getAtribut = $rowGetAtribut['atribut'];
        if ($getAtribut === 'total') { 
//#3# Jika atribut = total, maka hitung jumlah kasus total, jumlah kasus layak dan jumlah kasus tdk layak
            // hitung jumlah kasus total
            $sqlJumlahKasusTotal = mysql_query("SELECT COUNT(*) as jumlah_total FROM data_survey WHERE status is not null $kondisiAtribut");
            $rowJumlahKasusTotal = mysql_fetch_array($sqlJumlahKasusTotal);
            $getJumlahKasusTotal = $rowJumlahKasusTotal['jumlah_total'];

            // hitung jumlah kasus layak
            $sqlJumlahKasusLayak = mysql_query("SELECT COUNT(*) as jumlah_layak FROM data_survey WHERE status = 'Laris' AND status is not null $kondisiAtribut");
            $rowJumlahKasusLayak = mysql_fetch_array($sqlJumlahKasusLayak);
            $getJumlahKasusLayak = $rowJumlahKasusLayak['jumlah_layak'];

            // hitung jumlah kasus tdk layak
            $sqlJumlahKasusTidakLayak = mysql_query("SELECT COUNT(*) as jumlah_tidak_layak FROM data_survey WHERE status = 'Tidak Laris' AND status is not null $kondisiAtribut");
            $rowJumlahKasusTidakLayak = mysql_fetch_array($sqlJumlahKasusTidakLayak);
            $getJumlahKasusTidakLayak = $rowJumlahKasusTidakLayak['jumlah_tidak_layak'];

//#4# Insert jumlah kasus total, jumlah kasus layak dan jumlah kasus tdk layak ke DB
            // insert ke database mining_c45
            mysql_query("INSERT INTO mining_c45 VALUES ('', 'Total', 'Total', '$getJumlahKasusTotal', '$getJumlahKasusLayak', '$getJumlahKasusTidakLayak', '', '', '', '', '', '')");

        } else {
//#5# Jika atribut != total (atribut lainnya), maka hitung jumlah kasus total, jumlah kasus layak dan jumlah kasus tdk layak masing2 atribut
            // ambil nilai atribut
            $sqlNilaiAtribut = mysql_query("SELECT nilai_atribut FROM atribut WHERE atribut = '$getAtribut' ORDER BY id");
            while($rowNilaiAtribut = mysql_fetch_array($sqlNilaiAtribut)) {
                $getNilaiAtribut = $rowNilaiAtribut['nilai_atribut'];

                // set kondisi dimana nilai_atribut = berdasakan masing2 atribut dan status data = data training
                $kondisi = "$getAtribut = '$getNilaiAtribut' AND status is not null $kondisiAtribut";

                // hitung jumlah kasus per atribut
                $sqlJumlahKasusTotalAtribut = mysql_query("SELECT COUNT(*) as jumlah_total FROM data_survey WHERE $kondisi");
                $rowJumlahKasusTotalAtribut = mysql_fetch_array($sqlJumlahKasusTotalAtribut);
                $getJumlahKasusTotalAtribut = $rowJumlahKasusTotalAtribut['jumlah_total'];

                // hitung jumlah kasus layak
                $sqlJumlahKasusLayakAtribut = mysql_query("SELECT COUNT(*) as jumlah_layak FROM data_survey WHERE $kondisi AND status = 'Laris'");
                $rowJumlahKasusLayakAtribut = mysql_fetch_array($sqlJumlahKasusLayakAtribut);
                $getJumlahKasusLayakAtribut = $rowJumlahKasusLayakAtribut['jumlah_layak'];

                // hitung jumlah kasus TDK layak
                $sqlJumlahKasusTidakLayakAtribut = mysql_query("SELECT COUNT(*) as jumlah_tidak_layak FROM data_survey WHERE $kondisi AND status = 'Tidak Laris'");
                $rowJumlahKasusTidakLayakAtribut = mysql_fetch_array($sqlJumlahKasusTidakLayakAtribut);
                $getJumlahKasusTidakLayakAtribut = $rowJumlahKasusTidakLayakAtribut['jumlah_tidak_layak'];

//#6# Insert jumlah kasus total, jumlah kasus layak dan jumlah kasus tdk layak masing2 atribut ke DB
                // insert ke database mining_c45
                mysql_query("INSERT INTO mining_c45 VALUES ('', '$getAtribut', '$getNilaiAtribut', '$getJumlahKasusTotalAtribut', '$getJumlahKasusLayakAtribut', '$getJumlahKasusTidakLayakAtribut', '', '', '', '', '', '')");
                
//#7# Lakukan perhitungan entropy
                // perhitungan entropy
                $sqlEntropy = mysql_query("SELECT id, jml_kasus_total, jml_laris, jml_tdk_laris FROM mining_c45");
                while($rowEntropy = mysql_fetch_array($sqlEntropy)) {
                    $getJumlahKasusTotalEntropy = $rowEntropy['jml_kasus_total'];
                    $getJumlahKasusLayakEntropy = $rowEntropy['jml_laris'];
                    $getJumlahKasusTidakLayakEntropy = $rowEntropy['jml_tdk_laris'];
                    $idEntropy = $rowEntropy['id'];

                    // jika jml kasus = 0 maka entropy = 0
                    if ($getJumlahKasusTotalEntropy == 0 OR $getJumlahKasusLayakEntropy == 0 OR $getJumlahKasusTidakLayakEntropy == 0) {
                        $getEntropy = 0;
                    // jika jml kasus layak = jml kasus tdk layak, maka entropy = 1
                    } else if ($getJumlahKasusLayakEntropy == $getJumlahKasusTidakLayakEntropy) {
                        $getEntropy = 1;
                    } else { // jika jml kasus != 0, maka hitung rumus entropy:
                        $perbandingan_layak = $getJumlahKasusLayakEntropy / $getJumlahKasusTotalEntropy;
                        $perbandingan_tidak_layak = $getJumlahKasusTidakLayakEntropy / $getJumlahKasusTotalEntropy;

                        $rumusEntropy = (-($perbandingan_layak) * log($perbandingan_layak,2)) + (-($perbandingan_tidak_layak) * log($perbandingan_tidak_layak,2));
                        $getEntropy = round($rumusEntropy,4); // 4 angka di belakang koma
                    }

//#8# Update nilai entropy
                    // update nilai entropy
                    mysql_query("UPDATE mining_c45 SET entropy = $getEntropy WHERE id = $idEntropy");
                }
                
//#9# Lakukan perhitungan information gain
                // perhitungan information gain
                // ambil nilai entropy dari total (jumlah kasus total)
                $sqlJumlahKasusTotalInfGain = mysql_query("SELECT jml_kasus_total, entropy FROM mining_c45 WHERE atribut = 'Total'");
                $rowJumlahKasusTotalInfGain = mysql_fetch_array($sqlJumlahKasusTotalInfGain);
                $getJumlahKasusTotalInfGain = $rowJumlahKasusTotalInfGain['jml_kasus_total'];
                // rumus information gain
                $getInfGain = (-(($getJumlahKasusTotalEntropy / $getJumlahKasusTotalInfGain) * ($getEntropy))); 

//#10# Update information gain tiap nilai atribut (temporary)
                // update inf_gain_temp (utk mencari nilai masing2 atribut)
                mysql_query("UPDATE mining_c45 SET inf_gain_temp = $getInfGain WHERE id = $idEntropy");
                $getEntropy = $rowJumlahKasusTotalInfGain['entropy'];

                // jumlahkan masing2 inf_gain_temp atribut 
                $sqlAtributInfGain = mysql_query("SELECT SUM(inf_gain_temp) as inf_gain FROM mining_c45 WHERE atribut = '$getAtribut'");
                while ($rowAtributInfGain = mysql_fetch_array($sqlAtributInfGain)) {
                    $getAtributInfGain = $rowAtributInfGain['inf_gain'];

                    // hitung inf gain
                    $getInfGainFix = round(($getEntropy + $getAtributInfGain),4);

//#11# Looping perhitungan information gain, sehingga mendapatkan information gain tiap atribut. Update information gain
                    // update inf_gain (fix)
                    mysql_query("UPDATE mining_c45 SET inf_gain = $getInfGainFix WHERE atribut = '$getAtribut'");
                } 
                
//#12# Lakukan perhitungan split info
                // rumus split info
                $getSplitInfo = (($getJumlahKasusTotalEntropy / $getJumlahKasusTotalInfGain) * (log(($getJumlahKasusTotalEntropy / $getJumlahKasusTotalInfGain),2)));
                
//#13# Update split info tiap nilai atribut (temporary)
                // update split_info_temp (utk mencari nilai masing2 atribut)
                mysql_query("UPDATE mining_c45 SET split_info_temp = $getSplitInfo WHERE id = $idEntropy");
                
                // jumlahkan masing2 split_info_temp dari tiap atribut 
                $sqlAtributSplitInfo = mysql_query("SELECT SUM(split_info_temp) as split_info FROM mining_c45 WHERE atribut = '$getAtribut'");
                while ($rowAtributSplitInfo = mysql_fetch_array($sqlAtributSplitInfo)){
                    $getAtributSplitInfo = $rowAtributSplitInfo['split_info'];

                    // split info fix (4 angka di belakang koma)
                    $getSplitInfoFix = -(round($getAtributSplitInfo,4));

//#14# Looping perhitungan split info, sehingga mendapatkan information gain tiap atribut. Update information gain
                    // update split info (fix)
                    mysql_query("UPDATE mining_c45 SET split_info = $getSplitInfoFix WHERE atribut = '$getAtribut'");
                }
            }
            
//#15# Lakukan perhitungan gain ratio
            $sqlGainRatio = mysql_query("SELECT id, inf_gain, split_info FROM mining_c45");
            while($rowGainRatio = mysql_fetch_array($sqlGainRatio)) {
                $idGainRatio = $rowGainRatio['id'];
                // jika nilai inf gain == 0 dan split info == 0, maka gain ratio = 0
                if ($rowGainRatio['inf_gain'] == 0 AND $rowGainRatio['split_info'] == 0){
                    $getGainRatio = 0;
                } else {
                    // rumus gain ratio
                    $getGainRatio = round(($rowGainRatio['inf_gain'] / $rowGainRatio['split_info']),4);
                }
                
//#16# Update gain ratio dari setiap atribut
                mysql_query("UPDATE mining_c45 SET gain_ratio = $getGainRatio WHERE id = '$idGainRatio'");
            }
        }
    }
}

//#17# Insert atribut dgn information gain max ke DB pohon keputusan
function insertAtributPohonKeputusan($atribut, $nilai_atribut)
{
    // ambil nilai inf gain tertinggi dimana hanya 1 atribut saja yg dipilih
    $sqlInfGainMaxTemp = mysql_query("SELECT distinct atribut, gain_ratio FROM mining_c45 WHERE gain_ratio in (SELECT max(gain_ratio) FROM `mining_c45`) LIMIT 1");
    $rowInfGainMaxTemp = mysql_fetch_array($sqlInfGainMaxTemp);
    // hanya ambil atribut dimana jumlah kasus totalnya tidak kosong
    if ($rowInfGainMaxTemp['gain_ratio'] > 0) {
        // ambil nilai atribut yang memiliki nilai inf gain max
        $sqlInfGainMax = mysql_query("SELECT * FROM mining_c45 WHERE atribut = '$rowInfGainMaxTemp[atribut]'");
        while($rowInfGainMax = mysql_fetch_array($sqlInfGainMax)) {
            if ($rowInfGainMax['jml_laris'] == 0 AND $rowInfGainMax['jml_tdk_laris'] == 0) {
                $keputusan = 'Kosong'; // jika jml_laris = 0 dan jml_tdk_laris = 0, maka keputusan Null
            } else if ($rowInfGainMax['jml_laris'] !== 0 AND $rowInfGainMax['jml_tdk_laris'] == 0) {
                $keputusan = 'Laris'; // jika jml_laris != 0 dan jml_tdk_laris = 0, maka keputusan Layak
            } else if ($rowInfGainMax['jml_laris'] == 0 AND $rowInfGainMax['jml_tdk_laris'] !== 0) {
                $keputusan = 'Tidak Laris'; // jika jml_laris = 0 dan jml_tdk_laris != 0, maka keputusan Tidak Layak
            } else {
                $keputusan = '?'; // jika jml_laris != 0 dan jml_tdk_laris != 0, maka keputusan ?
            }
            
            if (empty($atribut) AND empty($nilai_atribut)) {
//#18# Jika atribut yang diinput kosong (atribut awal) maka insert ke pohon keputusan id_parent = 0
                // set kondisi atribut = AND atribut = nilai atribut
                $kondisiAtribut = "AND $rowInfGainMax[atribut] = ~$rowInfGainMax[nilai_atribut]~";
                // insert ke tabel pohon keputusan
                mysql_query("INSERT INTO pohon_keputusan_c45 VALUES ('', '$rowInfGainMax[atribut]', '$rowInfGainMax[nilai_atribut]', 0, '$rowInfGainMax[jml_laris]', '$rowInfGainMax[jml_tdk_laris]', '$keputusan', 'Belum', '$kondisiAtribut', 'Belum')");
            }

//#19# Jika atribut yang diinput tidak kosong maka insert ke pohon keputusan dimana id_parent diambil dari tabel pohon keputusan sebelumnya (where atribut = atribut yang diinput)
            else if (!empty($atribut) AND !empty($nilai_atribut)) {
                $sqlIdParent = mysql_query("SELECT id, atribut, nilai_atribut, jml_laris, jml_tdk_laris FROM pohon_keputusan_c45 WHERE atribut = '$atribut' AND nilai_atribut = '$nilai_atribut' order by id DESC LIMIT 1");
                while($rowIdParent = mysql_fetch_array($sqlIdParent)) {
                    // insert ke tabel pohon keputusan
                    mysql_query("INSERT INTO pohon_keputusan_c45 VALUES ('', '$rowInfGainMax[atribut]', '$rowInfGainMax[nilai_atribut]', $rowIdParent[id], '$rowInfGainMax[jml_laris]', '$rowInfGainMax[jml_tdk_laris]', '$keputusan', 'Belum', '', 'Belum')");
                    
                    //#PRE PRUNING (dokumentasi -> http://id3-c45.xp3.biz/dokumentasi/Decision-Tree.10.11.ppt)#
                    // hitung Pessimistic error rate parent dan child 
                    $perhitunganParentPrePruning = loopingPerhitunganPrePruning($rowIdParent['jml_laris'], $rowIdParent['jml_tdk_laris']);
                    $perhitunganChildPrePruning = loopingPerhitunganPrePruning($rowInfGainMax['jml_laris'], $rowInfGainMax['jml_tdk_laris']);
                    
                    // hitung average Pessimistic error rate child 
                    $perhitunganPessimisticChild = (($rowInfGainMax['jml_laris'] + $rowInfGainMax['jml_tdk_laris']) / ($rowIdParent['jml_laris'] + $rowIdParent['jml_tdk_laris'])) * $perhitunganChildPrePruning;
                    // Increment average Pessimistic error rate child
                    $perhitunganPessimisticChildIncrement += $perhitunganPessimisticChild;
                    $perhitunganPessimisticChildIncrement = round($perhitunganPessimisticChildIncrement, 4);
                    
                    // jika error rate pada child lebih besar dari error rate parent
                    if ($perhitunganPessimisticChildIncrement > $perhitunganParentPrePruning) {
                        // hapus child (child tidak diinginkan)
                        mysql_query("DELETE FROM pohon_keputusan_c45 WHERE id_parent = $rowIdParent[id]");
                        
                        // jika jml kasus layak lbh besar, maka keputusan == layak
                        if ($rowIdParent['jml_laris'] > $rowIdParent['jml_tdk_laris']) {
                            $keputusanPrePruning = 'Laris';
                        // jika jml tdk kasus layak lbh besar, maka keputusan == tdk layak
                        } else if ($rowIdParent['jml_laris'] < $rowIdParent['jml_tdk_laris']) {
                            $keputusanPrePruning = 'Tidak Laris';
                        }
                        // update keputusan parent
                        mysql_query("UPDATE pohon_keputusan_c45 SET keputusan = '$keputusanPrePruning' where id = $rowIdParent[id]");
                    }
                }
            }
        }
    }
    loopingKondisiAtribut();
}

//#20# Lakukan looping kondisi atribut untuk diproses pada fungsi perhitunganC45()
function loopingKondisiAtribut() 
{
    // ambil semua id dan kondisi atribut
    $sqlLoopingKondisi = mysql_query("SELECT id, kondisi_atribut FROM pohon_keputusan_c45");
    while($rowLoopingKondisi = mysql_fetch_array($sqlLoopingKondisi)) {
        // select semua data dimana id_parent = id awal
        $sqlUpdateKondisi = mysql_query("SELECT * FROM pohon_keputusan_c45 WHERE id_parent = $rowLoopingKondisi[id] AND looping_kondisi = 'Belum'");
        while($rowUpdateKondisi = mysql_fetch_array($sqlUpdateKondisi)) {
            // set kondisi: kondisi sebelumnya yg diselect berdasarkan id_parent ditambah 'AND atribut = nilai atribut'
            $kondisiAtribut = "$rowLoopingKondisi[kondisi_atribut] AND $rowUpdateKondisi[atribut] = ~$rowUpdateKondisi[nilai_atribut]~";
            // update kondisi atribut
            mysql_query("UPDATE pohon_keputusan_c45 SET kondisi_atribut = '$kondisiAtribut', looping_kondisi = 'Sudah' WHERE id = $rowUpdateKondisi[id]");
        }
    }
    insertIterasi();
}

//#21# Insert iterasi nilai perhitungan ke DB
function insertIterasi()
{
    $sqlInfGainMaxIterasi = mysql_query("SELECT distinct atribut, gain_ratio FROM mining_c45 WHERE gain_ratio in (SELECT max(gain_ratio) FROM `mining_c45`) LIMIT 1");
    $rowInfGainMaxIterasi = mysql_fetch_array($sqlInfGainMaxIterasi);
    // hanya ambil atribut dimana jumlah kasus totalnya tidak kosong
    if ($rowInfGainMaxIterasi['gain_ratio'] > 0) {
        $kondisiAtribut = "$rowInfGainMaxIterasi[atribut]";
        $iterasiKe = 1;
        $sqlInsertIterasiC45 = mysql_query("SELECT * FROM mining_c45");
        while($rowInsertIterasiC45 = mysql_fetch_array($sqlInsertIterasiC45)) {
            // insert ke tabel iterasi
            mysql_query("INSERT INTO iterasi_c45 VALUES ('', $iterasiKe, '$kondisiAtribut', '$rowInsertIterasiC45[atribut]', '$rowInsertIterasiC45[nilai_atribut]', '$rowInsertIterasiC45[jml_kasus_total]', '$rowInsertIterasiC45[jml_laris]', '$rowInsertIterasiC45[jml_tdk_laris]', '$rowInsertIterasiC45[entropy]', '$rowInsertIterasiC45[inf_gain]', '$rowInsertIterasiC45[split_info]', '$rowInsertIterasiC45[gain_ratio]')");
            $iterasiKe++;
        }
    }
}

//#22# Ambil information gain max untuk diproses pada fungsi loopingMiningC45()
function getInfGainMax($atribut, $nilai_atribut)
{
    // select inf gain max
    $sqlInfGainMaxAtribut = mysql_query("SELECT distinct atribut FROM mining_c45 WHERE gain_ratio in (SELECT max(gain_ratio) FROM `mining_c45`) LIMIT 1");
    while($rowInfGainMaxAtribut = mysql_fetch_array($sqlInfGainMaxAtribut)) {
        $inf_gain_max_atribut = "$rowInfGainMaxAtribut[atribut]";
        if (empty($atribut) AND empty($nilai_atribut)) {
            // jika atribut kosong, proses atribut dgn inf gain max pada fungsi loopingMiningC45()
            loopingMiningC45($inf_gain_max_atribut);
        } else if (!empty($atribut) AND !empty($nilai_atribut)) {
            // jika atribut tdk kosong, maka update diproses = sudah pada tabel pohon_keputusan_c45
            mysql_query("UPDATE pohon_keputusan_c45 SET diproses = 'Sudah' WHERE nilai_atribut = '$nilai_atribut'");
            // proses atribut dgn inf gain max pada fungsi loopingMiningC45()
            loopingMiningC45($inf_gain_max_atribut);
        }
    }
}

//#23# Looping proses mining dimana atribut dgn information gain max yang akan diproses pada fungsi miningC45()
function loopingMiningC45($inf_gain_max_atribut) 
{
    $sqlBelumAdaKeputusanLagi = mysql_query("SELECT * FROM pohon_keputusan_c45 WHERE keputusan = '?' and diproses = 'Belum' AND atribut = '$inf_gain_max_atribut'");
    while($rowBelumAdaKeputusanLagi = mysql_fetch_array($sqlBelumAdaKeputusanLagi)) {
        if ($rowBelumAdaKeputusanLagi['id_parent'] == 0) {
            populateAtribut();
        }
        $atribut = "$rowBelumAdaKeputusanLagi[atribut]";
        $nilai_atribut = "$rowBelumAdaKeputusanLagi[nilai_atribut]";
        $kondisiAtribut = "AND $atribut = \'$nilai_atribut\'";
        mysql_query("TRUNCATE mining_c45");
        mysql_query("DELETE FROM atribut WHERE atribut = '$inf_gain_max_atribut'");
        miningC45($atribut, $nilai_atribut);
        populateAtribut();
    }
}

// rumus menghitung Pessimistic error rate
function perhitunganPrePruning($r, $z, $n)
{
    $rumus = ($r + (($z * $z) / (2 * $n)) + ($z * (sqrt(($r / $n) - (($r * $r) / $n) + (($z * $z) / (4 * ($n * $n))))))) / (1 + (($z * $z) / $n));
    $rumus = round($rumus, 4);
    return $rumus;
}

// looping perhitungan Pessimistic error rate
function loopingPerhitunganPrePruning($positif, $negatif)
{
    $z = 1.645; // z = batas kepercayaan (confidence treshold)
    $n = $positif + $negatif; // n = total jml kasus
    $n = round($n, 4);
    // r = perbandingan child thd parent
    if ($positif < $negatif) {
        $r = $positif / ($n);
        $r = round($r, 4);
        return perhitunganPrePruning($r, $z, $n);
    } elseif ($positif > $negatif) {
        $r = $negatif / ($n);
        $r = round($r, 4);
        return perhitunganPrePruning($r, $z, $n);
    } elseif ($positif == $negatif) {
        $r = $negatif / ($n);
        $r = round($r, 4);
        return perhitunganPrePruning($r, $z, $n);
    }
}

// replace keputusan jika ada keputusan yg Null
function replaceNull()
{
    $sqlReplaceNull = mysql_query("SELECT id, id_parent FROM pohon_keputusan_c45 WHERE keputusan = 'Null'");
    while($rowReplaceNull = mysql_fetch_array($sqlReplaceNull)) {
        $sqlReplaceNullIdParent = mysql_query("SELECT jml_laris, jml_tdk_laris, keputusan FROM pohon_keputusan_c45 WHERE id = $rowReplaceNull[id_parent]");
        $rowReplaceNullIdParent = mysql_fetch_array($sqlReplaceNullIdParent);
        if ($rowReplaceNullIdParent['jml_laris'] > $rowReplaceNullIdParent['jml_tdk_laris']) {
            $keputusanNull = 'Laris'; // jika jml_laris != 0 dan jml_tdk_laris = 0, maka keputusan Layak
        } else if ($rowReplaceNullIdParent['jml_laris'] < $rowReplaceNullIdParent['jml_tdk_laris']) {
            $keputusanNull = 'Tidak Laris'; // jika jml_laris = 0 dan jml_tdk_laris != 0, maka keputusan Tidak Layak
        }
        mysql_query("UPDATE pohon_keputusan_c45 SET keputusan = '$keputusanNull' WHERE id = $rowReplaceNull[id]");
    }
}


				echo "<script>window.alert('Proses Mining Sukses !!!');
				window.location='perhitungan.html'</script>";
	
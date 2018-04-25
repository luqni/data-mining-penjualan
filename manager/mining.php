<?php
echo "<h2>Mining Data Menggunakan Algoritma C45</h2>";

        include "perhitungan-miningC45.php";
        populateDb();
        miningC45('', '');

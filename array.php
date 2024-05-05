<?php
// Array data dengan nama dan umur
$data = array(
    array("nama" => "Balqis", "umur" => 18),
    array("nama" => "Amanda", "umur" => 18),
    array("nama" => "Putri", "umur" => 18),
    array("nama" => "Hambali", "umur" => 56),
    array("nama" => "Cantikka", "umur" => 20),
    array("nama" => "May", "umur" => 20),
    array("nama" => "Aristianti", "umur" => 20),
    array("nama" => "Nabila", "umur" => 20),
    array("nama" => "Carrissa", "umur" => 20),
    array("nama" => "Dewi", "umur" => 20),
    array("nama" => "Denofan", "umur" => 19),
    array("nama" => "Sandy", "umur" => 19),
    array("nama" => "Wibama", "umur" => 19),
    array("nama" => "Dyah", "umur" => 19),
    array("nama" => "Aqila", "umur" => 19)
);

// Konversi array menjadi JSON
$json_data = json_encode($data);

// Tampilkan data JSON
echo $json_data;
?>

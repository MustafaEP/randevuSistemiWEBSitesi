<?php
    $server = 'localhost';
    $user = 'id19153959_randevusistem';
    $password = 'o=$o\nm8]*<+6)U_';
    $database = 'id19153959_randevu_sistemi';
    $baglanti = mysqli_connect($server,$user,$password,$database);
    if (!$baglanti) {
    echo "MySQL sunucu ile baglanti kurulamadi! </br>";
    echo "HATA: " . mysqli_connect_error();
    exit;
}
?>
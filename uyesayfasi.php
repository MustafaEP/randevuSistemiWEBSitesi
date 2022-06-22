<?php
    //oturumu başlat
    session_start();
    
    //eğer e_mail adlı oturum değişkeni yok ise 
    //login sayfasına yönlendir
    if ( !isset($_SESSION['e_mail']) ) {
    header("Location: giris.php");
    exit();
    }
?>

<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Randevu Sistemi</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>

</head>
    
<div class="container p-5 my-5 border text-center">

<p> Merhaba <br />
    Özel sayfanıza hoş geldiniz.<br /><br />

    <button type="button" class="btn btn-primary" onclick="window.location.href = 'kullanici_bilgileri.php';">Kullanıcı Bilgileri</button>
    <button type="button" class="btn btn-primary" onclick="window.location.href = 'randevu_al.php';">Randevu Al</button>
    <button type="button" class="btn btn-primary" onclick="window.location.href = 'cikis.php';">Oturumu Kapat</button>

</div>

</html>
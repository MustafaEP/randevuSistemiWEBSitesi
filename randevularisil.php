<?php

    //oturumu başlat
    session_start();
    include("mysqlbaglan.php");
    //eğer username adlı oturum değişkeni yok ise 
    //login sayfasına yönlendir

    if ( !isset($_SESSION['e_mail']) ) {
    header("Location:giris.php");
    exit();
    }

    $e_mail = $_SESSION['e_mail'];

    
    $sql2 = "DELETE FROM randevu WHERE e_mail='$e_mail'";

    
    $cevap2 = mysqli_query($baglanti,$sql2);


    echo "<html>";


     echo "<head>";

            echo "<meta http-equiv='Content-Type' content='text/html; charset=UTF-8' />
            <link href='https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css' rel='stylesheet'>
            <script src='https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js'></script>";

            echo "</head>";
    
    if(!$cevap2){
    echo '<br>Hata:' . mysqli_error($baglanti);
    }
    else
    {
        echo "<div class='container p-5 my-5 border text-center'>";
            echo "Kayıt Silindi!</br><br>";
           
            echo "<form action='giris.php'><input type='submit' class='btn btn-primary' value='Giriş Ekranına Dön'></form>\n ";
        echo "</div>";
    }
    echo "</html>";
?>
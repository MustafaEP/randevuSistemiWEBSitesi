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

    $sql = "SELECT * FROM kayitli_kisiler WHERE e_mail = '$e_mail'";

    //sorguyu veritabanina gönderiyoruz.
    $cevap = mysqli_query($baglanti,$sql);

    $sql2 = "SELECT * FROM randevu WHERE e_mail = '$e_mail'";

    //sorguyu veritabanina gönderiyoruz.
    $cevap2 = mysqli_query($baglanti,$sql2);

    if(!$cevap){
        echo "<br>Bilgilere Ulaşılamadı";
    }

    echo "<html>";
        
        echo "<head>";

            echo "<meta http-equiv='Content-Type' content='text/html; charset=UTF-8' />
            <link href='https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css' rel='stylesheet'>
            <script src='https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js'></script>";

        echo "</head>";
    
        echo "<div class='container p-5 my-5 border text-center'>";

        echo "<h2>Kayit Bilgileriniz</h2>";
        echo "<table class='table' border=1>";
        echo "<tr>";
            echo "<th>e_mail</th>";
            echo "<th>İsim</th>";
            echo "<th>Soyisim</th>";
            echo "<th>TC No</th>";
            echo "<th>Doğum Tarihi</th>";
        echo "</tr>";

        $gelen = mysqli_fetch_array($cevap);

        // veritabanından gelen değerlerle tablo satırları  oluşturalım
        echo "<tr>";
            echo "<td>".$gelen['e_mail']."</td>";
            echo "<td>".$gelen['isim']."</td>";
            echo "<td>".$gelen['soyisim']."</td>";
            echo "<td>".$gelen['tc_No']."</td>";
            echo "<td>".$gelen['d_tarihi']."</td>";
        echo  "</tr>";

        // tablo kodunu bitirelim.
        echo "</table>";

        echo "</div>";

echo"<br><br><br>";

    echo "<div class='container p-5 my-5 border text-center'>";
        echo "<h2>Randevu Bilgileriniz</h2>";
        echo "<br><br>";

        echo "<table class='table' border=1>";
            echo "<tr>";
                echo "<th>e-Mail</th>";
                echo "<th>Doktor</th>";
                echo "<th>Randevu Zamanı</th>";
            echo "</tr>";
        
        while($gelen2=mysqli_fetch_array($cevap2))
        {
            
            echo "<tr>";
                echo "<td>".$gelen2['e_mail']."</td>";
                echo "<td>".$gelen2['doktor']."</td>";
                echo "<td>".$gelen2['zaman']."</td>";
            echo "</tr>";
            }
            // tablo kodunu bitirelim.
            echo "</table>";
            
        
            echo "</div>";

            echo "<div class='container p-5 my-5 border text-center'>";

            echo "<form action='uyesayfasi.php'><input type='submit' class='btn btn-primary' value='Geri Dön'></form> ";
            echo "<form action='randevularisil.php'><input type='submit' class='btn btn-primary' value='Randevu Kayıtlarını Sil'></form> ";
            echo "<form action='hesap_sil.php'><input type='submit' class='btn btn-primary' value='Hesabımı sil (Uyarı vermeden hesabınız silinir)'></form> ";
 

            echo "</div>";
        echo "</html>";

        //veritabani baglantisini kapatiyoruz.


        mysqli_close($baglanti);
?>
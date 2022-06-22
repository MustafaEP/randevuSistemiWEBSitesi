


<html>
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Randevu Sistemi</title>

        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>

    </head>
    <body>
        <?php
        //mesaj varsa ekrana yazdır.
        if (isset($mesaj)) echo $mesaj; 
        ?>
    <div class="container p-5 my-5 border text-center">
        <h2>Randevu Formu</h2>
      
        <form action="<?php $_PHP_SELF ?>" class="form-check" method="POST">
            
            Doktor: <br>
                <input type="radio" id="doktor_A" class name="doktor" value="Dis Hekimi A">
                <label for="doktor_A">Dis Hekimi A</label><br>
                <input type="radio" id="doktor_B" name="doktor" value="Dis Hekimi B">
                <label for="doktor_B">Dis Hekimi A</label><br>
                <input type="radio" id="doktor_C" name="doktor" value="Dis Hekimi C">
                <label for="doktor_C">Dis Hekimi C</label>
        
            <br>

            <label for="randevu_zamani">Randevu (tarih ve saat):</label><br>
            <input type="datetime-local" id="randevu_zamani" name="zaman">


                <br />
            <input type="submit" value="Kaydet"/><br /><br />
        </div>
        </form>
    </body>
</html>


<?php
include("mysqlbaglan.php");

//oturumu başlat
session_start();
//eğer username adlı oturum değişkeni yok ise 
//login sayfasına yönlendir
if ( !isset($_SESSION['e_mail']) ) {
header("Location:giris.php");
exit();
}


extract($_POST);

$e_mail = $_SESSION['e_mail']; 

$sql = "INSERT INTO randevu (zaman,e_mail,doktor) VALUES( '$zaman','$e_mail','$doktor')";

$cevap = mysqli_query($baglanti,$sql);

if(!$cevap){
    echo '<br>Hata:' . mysqli_error($baglanti);
    }
    else
    {
    echo "Randevunuz Kaydedildi.";
    }

?>
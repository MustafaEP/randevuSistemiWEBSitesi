<?php
    require ('mysqlbaglan.php');
    if (isset($_POST['e_mail']) && isset($_POST['sifre'])){
    extract($_POST);
    
    // sifre metni SHA256 ile şifreleniyor.
    $sifre = hash('sha256', $sifre);
    
    $sql="INSERT INTO `kayitli_kisiler` (e_mail, isim, soyisim, sifre, tc_no, d_tarihi )";
    
    $sql = $sql . "VALUES ('$e_mail', '$isim', '$soyisim','$sifre','$tc_no', '$d_tarihi')";
    
    $cevap = mysqli_query($baglanti, $sql);
    
    if ($cevap){
    $mesaj = "<h1>Kullanıcı oluşturuldu.</h1>";
    }else{
    $mesaj = "<h1>Kullanıcı oluşturulamadı!</h1>";
    }
}
?>

<html>
    
    <head>
        <meta http-equiv="Content-Type" content="text/html; 
        charset=UTF-8" />
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    </head>
<!-- türkçe karakter desteği ayarı -->
    
    <body>


        <?php
            //mesaj varsa ekrana yazdır.
            if (isset($mesaj)) echo $mesaj; 
        ?>
        
        <div class="container p-5 my-5 border text-center ">
        <h2>Kayıt Formu</h2>
        
        <form action="<?php $_PHP_SELF ?>" method="POST">
            
            E-posta: 
            <input type="email" name="e_mail"><br /><br>
        
            İsim: 
            <input type="text" name="isim"><br /><br>
            Soyisim: 
            <input type="text" name="soyisim"><br /><br>
            
            Şifre: 
            <input type="password" name="sifre"><br /><br>

            TC Kimlik No:
            <input type="number" name="tc_no" minlength="11" maxlength="11"><br>
                <br />
            Doğum Tarihi:
            <input type="date" name="d_tarihi"><br>
                <br />
            <input type="submit" class="btn btn-primary" value="Kaydet"/><br /><br />
            <button type="button" class="btn btn-primary" onclick="window.location.href = 'giris.php';">Giriş Yap</button>
        </form>
        </div>
    </body>
</html>
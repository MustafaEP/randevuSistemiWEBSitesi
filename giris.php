<?php
    session_start();
    
    require('mysqlbaglan.php');
    
    if (isset($_POST['e_mail']) and
        isset($_POST['sifre'])){
        
            extract($_POST);
    // sifre metni SHA256 ile şifreleniyor.
    $sifre = hash('sha256', $sifre);
    
    $sql = "SELECT * FROM `kayitli_kisiler` WHERE ";
    
    $sql= $sql . "e_mail='$e_mail' and sifre='$sifre'";

    $cevap = mysqli_query($baglanti, $sql);
    //eger cevap FALSE ise hata yazdiriyoruz. 

    if(!$cevap ){
    echo '<br>Hata:' . mysqli_error($baglanti);
    }
    
    //veritabanindan dönen satır sayısını bul
    
    $say = mysqli_num_rows($cevap);
    if ($say == 1){
        $_SESSION['e_mail'] = $e_mail;
    }
    else{
    $mesaj = "<h4> Hatalı Kullanıcı adı veya Şifre!</h4>";
    }
    }
    
    if (isset($_SESSION['e_mail'])){
    header("Location: uyesayfasi.php");
    }
    else{
    //oturum yok ise login formu görüntüle
    ?>
    
    <html>
        <head>
            <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
            <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
        </head>
        <body>
            
        <div class="container p-5 my-5 border text-center">
        <br>
            <h2>Giriş Yap</h2>
            <form action="<?php $_PHP_SELF ?>" method="POST">
                <?php
                if(isset($mesaj)){ echo $mesaj;}
                ?>

                Kullanıcı Adı:
                <input type="email" name="e_mail"><br /><br>
                Şifre: 
                <input type="password" name="sifre" ><br /><br />

                <input type="submit" class="btn btn-primary" value="GİRİŞ"/><br /><br />
                
                <button type="button" class="btn btn-primary" onclick="window.location.href = 'kayit.php';">Kayit OL</button> 

            </form>
               
        </div>
        
            
        </body>
    </html>
<?php } ?>
<?php
    include("baglanti.php");

    if(isset($_POST["giris"])){
        $tcno=$_POST["tcno"];
        $sifre=$_POST["sifre"];
        
        if (isset($tcno) && isset($sifre)){ // isset -> tanımlı mı
            $secim = "SELECT * FROM kullanicilar WHERE TC = '$tcno'";
            $calistir = mysqli_query($baglanti, $secim); // sql sorgularını çalıştırma fonksiyonudur
            $kayitsayisi = mysqli_num_rows($calistir); 

            if ($kayitsayisi > 0){
                $ilgilikayit = mysqli_fetch_assoc($calistir); // SQL sorgusunda etkilenen satırı dizi şeklinde geri döndürür
                $encryptsifre = $ilgilikayit["PAROLA"];

                if (password_verify($sifre, $encryptsifre)){
                    session_start();
                    $_SESSION["tcno"] = $ilgilikayit["TC"];
                    $_SESSION["telno"] = $ilgilikayit["TELNO"];
                    header("Location: Öğrenci.php");
                } else {
                    echo "Parola yanlis";
                }
            } else {
                echo "Boyle bir TC yok!";
            }

            mysqli_close($baglanti);
        }
    }
?>

<!DOCTYPE html>
<html lang="tr-TR" class="giris-sayfa">
    <head>
        <meta charset="UTF8">
        <title>GSBWifi Giriş</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="icon" type="image/x-icon" href="gsblogo.png"> <!-- Favicon ekler -->
        <link rel="stylesheet" href="wifi.css">
        <link rel="stylesheet" href="wifimobile.css">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Arimo:ital,wght@0,400..700;1,400..700&display=swap" rel="stylesheet">
    </head>
    <body>
        <div id="dil-resim">
            <img src="tr.png">
            <img src="usa.png">
        </div>
        <div id="kg-form">
            <div class="kutu-ici">
            <div id="kyklogo-metin">
                <img id="kyklogo" src="kyklogo.png">
                <div id="logo-metni">
                    <p id="ust-baslik">GSBWiFi <span style="color: black;">Veri Portalı</span></p>
                    <p id="alt-baslik">Yurt interneti erişim sistemi</p>
                </div>
            </div>

            <div id="cizgi"></div> <!-- Logo ve metin bulunan kısmı giriş formundan ayıran çizgi -->

            <div id="form-div">
                <form action="Giriş.php" method="POST">
                    <label for="name">T.C. Kimlik No</label>
                    <input type="text" id="name" name="tcno" minlength="11" maxlength="11" placeholder="Kimlik numaranızı giriniz..." required>

                    <label for="password">GSB Şifresi</label>
                    <input type="password" id="password" name="sifre" minlength="4" maxlength="25" placeholder="Şifrenizi giriniz..." required>

                    <p style="margin-top: 2px; padding-bottom: 7px; font-size: 14.5px;">* GSBWiFi şifrenizi unutmanız durumunda e-devlet üzerinden yenileme işlemi yapabilirsiniz.</p>

                    <div class="butonlar">
                        <a href="Kayıt.php" class="kayit-buton">Kayıt Ol</a>
                        <button type="submit" name="giris" class="submit-button">Giriş Yap</button>
                    </div>
                </form>
            </div>
            </div>
        </div>
        <div id="alt-bilgilendirme">
            <p id="sol" style="padding-left: 30px;">© 2024, Ankara - Tüm Hakları Saklıdır</p>
            <div id="orta"><a href="https://www.turkiye.gov.tr/iletisim?genel=Bilgiler">Sıkça Sorulan Sorular</a> <span style="color: #cccccc;">|</span> <a href="#">Gizlilik ve Güvenlik</a></div>
            <img id="sag" src="tt.png" style="width: 100px; height: auto; padding-right: 15px;">
        </div>
    </body>
</html>
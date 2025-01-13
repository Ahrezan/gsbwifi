<?php

    include("baglanti.php");

    if(isset($_POST["kayitol"])){
        $telno=$_POST["telno"];
        $tcno=$_POST["tcno"];
        $sifre=password_hash($_POST["sifre"],PASSWORD_DEFAULT); // Girilen parolaları tabloda şifrele (encrypt'le)
        
        $kontrol = "SELECT * FROM kullanicilar WHERE TC = '$tcno'";
        $sonuc = mysqli_query($baglanti, $kontrol);
        if (mysqli_num_rows($sonuc) > 0) {
            
        } 
        else {
            if(strlen($tcno) === 11 && strlen($telno) === 10){
                $ekle="INSERT INTO kullanicilar (TC, TELNO, PAROLA) VALUES ('$tcno','$telno','$sifre')";
                $calistirekle=mysqli_query($baglanti, $ekle);
    
                header("Location: Giriş.php"); // Yönlendirmek istediğiniz sayfa
                mysqli_close($baglanti);
            }
            else{

            }
        }
    }
?>

<!DOCTYPE html>
<html lang="tr-TR" class="kayit-sayfa">
    <head>
        <meta charset="UTF8">
        <title>GSBWifi Kayıt</title>
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
                <form action="Kayıt.php" method="POST">
                    <label for="name">Telefon No</label>
                    <input type="text" id="telno" name="telno" minlength="10" maxlength="10"  oninput="this.value = this.value.replace(/[^0-9]/g, '').slice(0, 10);" placeholder="Telefon numaranızı giriniz..." required>

                    <label for="name">T.C. Kimlik No</label>
                    <input type="text" id="tcno" name="tcno" minlength="11" maxlength="11"  oninput="this.value = this.value.replace(/[^0-9]/g, '').slice(0, 11);" placeholder="Kimlik numaranızı giriniz..." required>

                    <label for="password">GSB Şifresi</label>
                    <input type="password" id="sifre" name="sifre" minlength="4" maxlength="25" placeholder="Şifrenizi giriniz..." required>

                    <div class="butonlar">
                        <a href="Giriş.php" class="kayit-buton">Giriş Yap</a>
                        <button type="submit" name="kayitol" class="submit-button">Kayıt Ol</button>
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
<?php
    session_start();

    // Eğer kullanıcı giriş yapmamışsa, giriş yapması için yönlendirilebilir
    if (!isset($_SESSION["tcno"]) || !isset($_SESSION["telno"])) {
        echo "Lütfen giriş yapın.";
    } else {
        $tcno = $_SESSION["tcno"];
        $telno = $_SESSION["telno"];
    }
?>


<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>GSBWifi Öğrenci</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="icon" type="image/x-icon" href="gsblogo.png">
        <link rel="stylesheet" href="/Ogrenci.css">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Arimo:ital,wght@0,400..700;1,400..700&display=swap" rel="stylesheet">
        <style>
        

body, html {
                margin: 0;
                padding: 0;
                background: linear-gradient(to right, #fbfbfb, #dddddd);
                font-family: "Arimo", serif;
                font-optical-sizing: auto;
                font-style: normal;
                background-size: cover; /* Arka planı tam ekrana yayar */
                background-attachment: fixed; /* Kaydırma sırasında sabit tutar */
            }

            #ogrenci-bilgi {
                width: 280px;
                height: 75px;
                margin-top: 50px;
                margin-left: 50px;
                background: linear-gradient(to left, #e1e1e1, #d6d5d5);
            
                border: 1px solid #cacaca;
                border-radius: 75px;
                display: flex;
                align-items: center;
            }

            #ogrenci-bilgi img {
                width: auto;
                height: 63px;
                margin-left: 7px;
                object-fit: cover;
            }

            #kota {
                width: 500px;
                height: 200px;
                margin-top: 35px;
                margin-left: 50px;
                padding: 15px;
                background: linear-gradient(to left, #e1e1e1, #d6d5d5);
                border: 1px solid #cacaca;
                border-radius: 30px;
                display: flex;
                box-sizing: border-box;
            }

            #kota img {
                width: auto;
                height: 30px;
            }

            #bilgilendirme {
                width: 500px;
                height: 200px;
                margin-top: 20px;
                margin-left: 50px;
                background: linear-gradient(to left, #e1e1e1, #d6d5d5);
                border: 1px solid #cacaca;
                border-radius: 30px;
                display: flex;
            }

            #bilgilendirme img {
                width: auto;
                height: 30px;
            }

            #anketler {
                width: 500px;
                height: 450px;
                background: linear-gradient(to left, #e1e1e1, #d6d5d5);
                border: 1px solid #cacaca;
                border-radius: 30px;
                position: absolute;
                top: 0;
                left: 50%; /* Genişlik olarak %50'ye yerleştir */
                transform: translate(-301px, 50px); /* Tam ortaya hizala */
            }

            #anketler img {
                width: auto;
                height: 30px;
            }

            #duyurular {
                width: 600px;
                height: 700px;
                margin-top: 50px;
                margin-right: 50px;
                background: linear-gradient(to right, #e1e1e1, #d6d5d5);
                border: 1px solid #cacaca;
                border-radius: 30px;
                display: flex;
                position: absolute; /* Diğer elementlerden bağımsız */
                top: 0;
                right: 0;
                float: right;
            }

            #duyurular img {
                width: auto;
                height: 30px;
            }

            #alt-bilgilendirme {
                position: fixed; /* Her zaman ekranın altında kalır */
                bottom: 0;
                font-size: 17px;
                width: 100%; /* Ekran genişliği boyunca uzar */
                height: 52px; /* Çubuğun yüksekliği */
                background: linear-gradient(to top, #e4e4e4, #e4e6eb);
                color: #6a6a6a; /* Yazı rengi */
                line-height: 50px; /* Dikeyde yazıyı ortalar */
                border-top: 1px dashed #333; /* Üstte kesikli çizgi */
                display: flex; /* Flexbox modunu etkinleştir */
                align-items: center; /* Dikeyde ortalama */
                justify-content: space-between; /* Sol, orta ve sağ hizalama */
                box-sizing: border-box;
                word-wrap: break-word; /* Uzun metinler taşmasın */
            }

            #sol, #orta, #sag {
                margin: 0; /* Varsayılan boşlukları kaldır */
            }

            #orta {
                position: absolute; /* Tam ortaya sabitlemek için */
                text-align: center; /* Ortadaki metni ortala */
                flex: 1; /* Ortadaki metnin boşluğu doldurmasını sağlar */
                left: 50%; /* Sol kenardan %50 uzaklık */
                transform: translateX(-50%); /* Ortalamak için */
            }

            a {
                text-decoration: none; /* Altı çizgiyi kaldırır */
                color: #4a4a4a; /* Linkin varsayılan rengi */
            }

            #ogr-blg-php{
                margin-left: 20px;
                font-size: 25px;
                font-weight: bold;
            }


        
            /* Mobil için gerekli kodlar buraya yazılacak */
            @media screen and (max-width: 1700px) {
                #ogrenci-bilgi, #kota, #bilgilendirme, #anketler, #duyurular {
                    width: 100%;
                    margin: 10px auto; /* Ortalansın */
                    position: static; /* Absolute pozisyonlamayı iptal et */
                    float: none; /* Float varsa kaldır */
                    transform: none; /* Ortalamayı bozan transform'u kaldır */
                    margin-right: 0; /* Sağdaki boşluk sıfırla */
                }
            }
            @media (max-width: 480px) {
            .box {
                width: 75%; /* Daha küçük cihazlar için */
            }

            }
        </style>
    </head>
    <body>
        <div id="ogrenci-bilgi">
            <a href="cikis.php">
                <img src="cikis.png" alt="Çıkış Yap" />
            </a>
            <div id="ogr-blg-php">
            <?php
                echo '<div id="zar" style="font-size: 17px;">' . htmlspecialchars($tcno) . '</div>';
                echo htmlspecialchars($telno);
            ?>
            </div>
        </div>
        <div id="kota">
            <img src="bilgi.png">
        </div>
        <div id="bilgilendirme">
            <img src="soru.png">
            <p>Kota bilgileri 5 dakika aralıklarla güncellenmektedir</p>
            <p>Toplam Kota: 32768 MB</p>
            <p>Kota yenilenme tarihi: 01/01/2025 00:00:00</p>
        </div>
        <div id="anketler">
            <img src="anket-resim.png">
        </div>
        <div id="duyurular">
            <img src="duyuru-resim.png">
        </div>
        <div id="alt-bilgilendirme">
            <p id="sol" style="padding-left: 30px;">© 2024, Ankara - Tüm Hakları Saklıdır</p>
            <div id="orta"><a href="https://www.turkiye.gov.tr/iletisim?genel=Bilgiler">Sıkça Sorulan Sorular</a> <span style="color: #cccccc;">|</span> <a href="#">Gizlilik ve Güvenlik</a></div>
            <img id="sag" src="tt.png" style="width: 100px; height: auto; padding-right: 15px;">
        </div>
    </body>
</html>
<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $etkinlik_bilgileri['etkinlik_adi']; ?></title>
    <style>
        /* Basit CSS */
        body {
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
            background-color: #f0f0f0; /* Arka plan rengi */
        }
        .container {
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
        }
        header {
            background-color: #333;
            color: #fff;
            padding: 10px 0;
            text-align: center;
        }
        footer {
            background-color: #333;
            color: #fff;
            padding: 20px 0;
            text-align: center;
            margin-top: 30px; /* Footer'ı sayfanın tam altına almak için */
        }
        footer .footer-content {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
        }
        footer .footer-content .col {
            flex: 1 1 20%;
            margin: 10px;
        }
        footer h4 {
            font-size: 16px;
            margin-bottom: 10px;
        }
        footer p {
            font-size: 14px;
            margin-bottom: 5px;
        }
        footer a {
            font-size: 14px;
            text-decoration: none;
            color: #fff;
            display: block;
            margin-bottom: 5px;
        }
        .references {
            text-align: center;
            margin-top: 30px;
        }
        .references h2 {
            margin-bottom: 20px;
        }
        .company-list {
            display: flex;
            justify-content: center;
            flex-wrap: wrap;
            margin-bottom: 30px;
        }
        .company {
            width: 200px;
            height: 100px;
            background-color: #fff;
            border: 1px solid #ccc;
            margin: 10px;
            display: flex;
            justify-content: center;
            align-items: center;
        }
        .past-events {
            margin-bottom: 30px;
        }
        .past-events h3 {
            margin-bottom: 10px;
        }
        .event {
            margin-bottom: 10px;
        }
        .qr-code-container {
            text-align: center;
            margin-top: 30px;
        }
        .qr-code-container img {
            display: block;
            margin: 0 auto 20px;
            max-width: 300px;
        }
        .download-btn {
            background-color: #4CAF50;
            color: white;
            padding: 16px 20px;
            font-size: 16px;
            border: none;
            cursor: pointer;
            border-radius: 5px;
            text-decoration: none;
        }
        .download-btn:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>
<header>
    <div class="container">
        <h1><?php echo $etkinlik_bilgileri['etkinlik_adi']; ?></h1>
        <p><?php echo $etkinlik_bilgileri['aciklama']; ?></p>
    </div>
</header>

<div class="container">
    <div class="references">
        <h2>Etkinlik Tarihi ve Saati</h2>
        <p>Tarih: <?php echo $etkinlik_bilgileri['tarih']; ?> - Saat: <?php echo $etkinlik_bilgileri['saat']; ?></p>
    </div>

    <div class="qr-code-container">
        <img src="<?php echo $qr_path; ?>" alt="QR Kod">
        <a href="<?php echo $qr_path; ?>" download="qr_code_<?php echo time(); ?>.png" class="download-btn">QR Kodu İndir</a>
    </div>

    <div class="references">
        <h2>Etkinlik Görseli</h2>
        <img src="images/etkinlik_gorseli.jpg" alt="Etkinlik Görseli" style="display: block; margin: 0 auto;">
    </div>
</div>

<footer>
    <div class="footer-content">
        <div class="col">
            <h4>Bize Ulaşın</h4>
            <p><strong>Adres:</strong> Konferans Etkinlikleri Ltd. Şti. İstanbul</p>
            <p><strong>Telefon:</strong> +90 (544) 199 4254</p>
            <p><strong>Çalışma Saatleri:</strong> 08:00 - 20:00, Pazartesi - Cumartesi</p>
        </div>
        <div class="col">
            <h4>Hakkında</h4>
            <a href="#">Hakkımızda</a>
            <a href="#">Etkinliklerimiz</a>
            <a href="#">Gizlilik Politikası</a>
            <a href="#">Şartlar ve koşullar</a>
            <a href="#">Bize Ulaşın</a>
        </div>
        <div class="col">
            <h4>Hesap</h4>
            <a href="#">Giriş Yap</a>
            <a href="#">Kayıt Ol</a>
            <a href="#">Etkinliklerim</a>
            <a href="#">Sipariş Takip</a>
            <a href="#">Yardım</a>
        </div>
        <div class="col">
            <h4>Uygulamayı İndir</h4>
            <p>Google Play veya App Store</p>
            <div class="row">
                <img src="img/pay/app.jpg" alt="">
                <img src="img/pay/play.jpg" alt="">
            </div>
            <p>Güvenli Ödeme</p>
            <img src="img/pay/pay.png" alt="">
        </div>
    </div>
    <div class="copyright">
        <p>© Konferans Etkinlikleri Ltd. Şti. - Tüm Hakları Saklıdır.</p>
    </div>
</footer>
</body>
</html>
<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Referanslarımız</title>
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
        .custom-button {
            background-color: #8fbc8f; 
            color: #fff;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            text-decoration: none;
            transition: background-color 0.3s ease;
        }

        .custom-button:hover {
            background-color: #3cb371; 
        }
    </style>
</head>
<body>
<header>
    <div class="container">
        <h1>Geçmiş Tecrübelerimiz ve Anlaşmalı Şirketlerimizle Büyük Bir Çalışma Ekibiyiz</h1>
    </div>
</header>

<div class="container">
<div class="mb-3">
            <button class="custom-button" onclick="goToIndexPage()">Ana Sayfa</button>
            </div>
    <div class="references">
        <h2>Anlaşmalı Şirketlerimiz</h2>
        <div class="company-list">
            <div class="company">Şirket 1</div>
            <div class="company">Şirket 2</div>
            <div class="company">Şirket 3</div>
            <div class="company">Şirket 4</div>
            <div class="company">Şirket 5</div>
            <div class="company">Şirket 6</div>
        </div>
    </div>
    
    <div class="past-events">
        <h3>Geçmiş Organizasyonlarımız</h3>
        <div class="event">Tarih: 01.01.2023 - Konferans Adı: Örnek Konferans 1</div>
        <div class="event">Tarih: 02.02.2023 - Konferans Adı: Örnek Konferans 2</div>
        <div class="event">Tarih: 03.03.2023 - Konferans Adı: Örnek Konferans 3</div>
    </div>
</div>

<footer>
    <div class="footer-content">
        <div class="col">
            <h4>Bize Ulaşın</h4>
            <p><strong>Address:</strong> Konferans Etkinlikleri Ltd. Şti. İstanbul</p>
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
<script>
        function goToIndexPage() {
            window.location.href = "index.php"; 
        }
    </script>
</body>
</html>
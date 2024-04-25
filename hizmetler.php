<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hizmetler</title>
    <style>
        /* Basit CSS */
        body {
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
            background-color: #e6e6e6; /* Arka plan rengi */
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
        .cities {
            text-align: center;
            margin-top: 30px;
        }
        .city-list {
            display: flex;
            justify-content: center;
            flex-wrap: wrap;
            margin-bottom: 30px;
        }
        .city {
            width: 150px;
            height: 100px;
            background-color: #fff;
            border: 1px solid #ccc;
            margin: 10px;
            display: flex;
            justify-content: center;
            align-items: center;
        }
        .transport-services {
            margin-bottom: 30px;
        }
        .transport-services p {
            margin-bottom: 10px;
        }
        .accommodation {
            margin-bottom: 30px;
        }
        .accommodation h3 {
            margin-bottom: 10px;
        }
        .accommodation ul {
            list-style: none;
            padding: 0;
            text-align: center;
        }
        .accommodation li {
            margin-bottom: 5px;
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
    
        <h1>Hizmetler</h1>
    </div>
</header>

<div class="container">
<div class="mb-3">
            <button class="custom-button" onclick="goToIndexPage()">Ana Sayfa</button>
            </div>
    <div class="cities">
        <h2>Hizmet Verilen Şehirler</h2>
        <div class="city-list">
            <div class="city">İstanbul</div>
            <div class="city">Ankara</div>
            <div class="city">İzmir</div>
            <div class="city">Bursa</div>
            <div class="city">Antalya</div>
            <div class="city">Adana</div>
        </div>
    </div>
    
    <div class="transport-services">
        <p>Ulaşım Hizmetleri: Şehirler arası taşıma hizmetimiz, deneyimli firmalarımızla güvende.</p>
    </div>

    <div class="accommodation">
        <h3>Konaklama</h3>
        <ul>
            <li>Otel 1</li>
            <li>Otel 2</li>
            <li>Otel 3</li>
            <li>Otel 4</li>
            <li>Otel 5</li>
            <li>Otel 6</li>
        </ul>
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
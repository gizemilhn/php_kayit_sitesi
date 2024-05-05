<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fuar Takvimi</title>
    <style>
        
        body {
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
            background-color: #f4f4f4; 
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
        .upcoming-events {
            margin-bottom: 30px;
        }
        .upcoming-events h2 {
            margin-bottom: 10px;
        }
        .event {
            background-color: #fff;
            border: 1px solid #ccc;
            padding: 20px;
            margin-bottom: 20px;
        }
        .event h3 {
            margin-bottom: 10px;
        }
        .event p {
            margin-bottom: 10px;
        }
        .event-list {
            list-style: none;
            padding: 0;
        }
        .event-list li {
            margin-bottom: 10px;
        }
        .international-events {
            margin-bottom: 30px;
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
        <h1>Fuar Takvimi</h1>
    </div>
</header>

<div class="container ">
    <div class="mb-3">
            <button class="custom-button" onclick="goToIndexPage()">Ana Sayfa</button>
            </div>
    <div class="upcoming-events">
        <h2>Yakında Başlayacak Etkinlikler</h2>
        <div class="event">
            <h3>Etkinlik 1</h3>
            <p>Tarih: 15 Nisan 2024</p>
        </div>
        <div class="event">
            <h3>Etkinlik 2</h3>
            <p>Tarih: 20 Nisan 2024</p>
        </div>
        <div class="event">
            <h3>Etkinlik 3</h3>
            <p>Tarih: 25 Nisan 2024</p>
        </div>
    </div>

    <div class="upcoming-events">
        <h2>İleri Tarihli Etkinlikler</h2>
        <ul class="event-list">
            <li>Etkinlik 4 - Tarih: 1 Mayıs 2024</li>
            <li>Etkinlik 5 - Tarih: 10 Mayıs 2024</li>
            <li>Etkinlik 6 - Tarih: 20 Mayıs 2024</li>
        </ul>
    </div>

    <div class="international-events">
        <h2>Yurt Dışı Etkinliklerimiz</h2>
        <p>Yakında...</p>
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
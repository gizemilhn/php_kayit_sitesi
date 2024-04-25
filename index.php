<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fuar Alanı Etkinlikleri</title>
    <style>
        /* Basit CSS */
        body {
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
        }
        .container {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        header {
            background-color: #333;
            color: #fff;
            padding: 10px 0;
            text-align: center;
        }
        .logo {
            display: flex;
            align-items: center;
        }
        .logo img {
            margin-left: 10px;
            margin-right: 10px;
            width: 100px; /* İstediğiniz genişlik değerini buraya yazabilirsiniz */
            height: auto; /* Genişliğe göre otomatik olarak boyutlandırma yapılması için */
        }
        .menu-items {
            display: flex;
        }

        .menu-item {
            margin-right: 20px;
        }

        .menu-item:last-child {
            margin-right: 0;
        }

        .user-actions {
            margin-left: auto; /* Kullanıcı işlemlerini sağa hizalamak için */
        }

        .user-actions a {
            margin-left: 10px;
        }

        header .menu {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        .menu-item:hover .submenu {
            display: block;
        }
        .submenu {
            display: none;
            position: absolute;
            background-color: #333;
            padding: 10px;
            z-index: 1;
        }
        .submenu a {
            display: block;
            color: #fff;
            text-decoration: none;
            margin-bottom: 5px;
        }
        .submenu a:hover {
            background-color: #3cb371; /* Buton rengiyle uyumlu renk */
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
        .event-container {
            display: flex;
            justify-content: space-between;
            flex-wrap: nowrap; /* Kartlar sıralı bir şekilde yerleştirilecek */
        }

        .event-card {
            width: calc(30% - 20px); /* Kartların genişliği eşit olacak ve aralarında 20px boşluk olacak */
            margin-top: 20px;
            margin-right: 20px;
            margin-left : 20px;
            margin-bottom: 20px; /* Kartlar alt alta yerleştirilecek */
            border: 1px solid #ccc; /* Kartlara kenarlık ekleyebilirsiniz */
            border-radius: 5px; /* Kartlara köşe yuvarlama ekleyebilirsiniz */
            padding: 20px; /* Kartların içeriğinden boşluk bırakabilirsiniz */
        }

        .event-img {
            width: 300px; 
            height: auto;
            margin-right: 20px;
        }

        .event-details {
            flex: 1;
            overflow: hidden;
        }
        .event-description {
            display: -webkit-box;
            -webkit-box-orient: vertical;
            -webkit-line-clamp: 3;
            overflow: hidden;
        }

        .search-bar {
            margin: 0 auto; 
            text-align: center; /* İçeriği ortala */
            margin-bottom: 5px;
            display: flex;
            align-items: center;
        }
        .search-bar input[type="text"] {
            padding: 10px;
            border: 2px solid #ccc;
            border-radius: 5px;
            flex: 1;
            margin-right: 10px;
        }
        .search-bar button[type="submit"] {
            background-color: #8fbc8f;
            color: #fff;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }
        .search-bar button[type="submit"]:hover {
            background-color: #3cb371;
        }
        .btn-login {
            background-color: transparent;
            color: #3cb371;
            border: 2px solid #3cb371;
            padding: 10px 20px;
            text-decoration: none;
            border-radius: 5px;
            transition: background-color 0.3s ease;
        }
        .btn-login:hover {
            background-color: #3cb371;
            color: #fff;
        }
        .btn-register {
            margin-right: 20px;
            background-color: transparent;
            color: #3cb371;
            border: 2px solid #3cb371;
            padding: 10px 20px;
            text-decoration: none;
            border-radius: 5px;
            transition: background-color 0.3s ease;
        }
        .btn-register:hover {
            background-color: #3cb371;
            color: #fff;
        }
        .btn-more {
            display: block;
            margin-top: 10px;
            background-color: #3cb371;
            color: #fff;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            text-decoration: none;
            transition: background-color 0.3s ease;
        }
        .btn-more:hover {
            background-color: #2e8b57;
        }
         .menu-button {
            background-color: #8fbc8f; 
            color: #fff;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            text-decoration: none;
            transition: background-color 0.3s ease;
            margin-right: 20px;
        }

        .menu-button:last-child {
            margin-right: 0;
        }

        .menu-button:hover {
            background-color: #3cb371; 
        }
        .home-icon {
            cursor: pointer;
        }
        .home-icon img {
            width: 40px;
            height: auto;
        }
    </style>
</head>
<body>
</head>
<body>
<header>
    <div class="container">
    <div class="logo">
            <a href="index.php"><img src="images/logo.png" alt="Website Logo"></a>
            <div class="home-icon" onclick="goToHomePage()">
                <img src="images/home.png" alt="Ana Sayfa">
            </div>
        </div>
        <div class="menu-items">
            <a href="schedule.php" class="menu-button">Fuar Takvimi</a>
            <a href="hizmetler.php" class="menu-button">Hizmetlerimiz</a>
            <a href="references.php" class="menu-button">Referanslarımız</a>
            <div class="menu-item">
                <button class="menu-button" onclick="toggleDropdown()">Etkinliğini Yarat</button>
                <div class="submenu" id="dropdownMenu">
                    <a href="etkinlik_yarat.php">Bize Ulaş</a>
                </div>
            </div>
        </div>
        <div class="search-bar">
            <input type="text" placeholder="Etkinlik Ara...">
            <button type="submit">Ara</button>
        </div>
        <div class="user-actions">
            <a href="log_in.php" class="btn-login">Giriş Yap</a>
            <a href="sign_up.php" class="btn-register">Kayıt Ol</a>
        </div>
    </div>
</header>

<div class="container">
    

    <!-- Etkinlik Kartları -->
    <div class="event-container">
        <div class="event-card">
            <img src="images/yzlm.png" class="event-img" alt="Etkinlik Görseli">
            <div class="event-details">
                <h2>YAZILIM FUARI</h2>
                <p class="event-description">Kalite’24… Üretimde daha üst düzey kaliteyi arayan firmaların aradıklarına her aşamada cevap verecek firmaların bir arada bulunduğu Türkiye’deki tek organizasyon.</p>
                <a href="event3.php" class="btn-more">Daha Fazlasını Gör</a>
            </div>
        </div> 

        <div class="event-card">
            <img src="images/otmtv.png" class="event-img" alt="Etkinlik Görseli">
            <div class="event-details">
                <h2>OTOMOTİV FUARI</h2>
                <p class="event-description">KOtomotiv satış sonrası endüstrisi için dünyanın lider ticaret fuarı markası Automechanika'nın Türkiye'deki tek etkinliği olan Automechanika Istanbul,23-26 Mayıs 2024 tarihleri arasında İstanbul TÜYAP Fuar ve Kongre Merkezi'nde düzenlenecek.</p>
                <a href="event3.php" class="btn-more">Daha Fazlasını Gör</a>
            </div>
        </div>

        <div class="event-card">
            <img src="images/grsm.png" class="event-img" alt="Etkinlik Görseli">
            <div class="event-details">
                <h2>KADIN GİRİŞİMCİLİK FUARI</h2>
                <p class="event-description">Kadın Girişimciliği EXPO 2023 Üst üste üçüncü kez, 16 – 17 Kasım tarihlerinde düzenlenecek olan EXPO 2023, kadın girişimciler, yatırımcılar ve özel sektör temsilcileri için interaktif bir alan sağlayacaktır:</p>
                <a href="event3.php" class="btn-more">Daha Fazlasını Gör</a>
            </div>
        </div>
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
    
    function toggleDropdown() {
        var dropdownMenu = document.getElementById("dropdownMenu");
        dropdownMenu.style.display = dropdownMenu.style.display === "none" ? "block" : "none";
    }

    function goToHomePage() {
        window.location.href = "index.php"; // Ana sayfanın URL'sini buraya yazın
    }

    function toggleDropdown() {
        var dropdownMenu = document.getElementById("dropdownMenu");
        dropdownMenu.style.display = dropdownMenu.style.display === "none" ? "block" : "none";
    }
</script>
</body>
</html>

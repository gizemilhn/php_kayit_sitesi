<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fuar Alanı Etkinlikleri</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
</head>
<body>
<body style="background-color: #8fbc8f;">
<header>
    <div class="container">
        <div class="logo">
        <span class="tooltip" title="Ana Sayfa"> <!-- title, tooltip içeriğini belirtir -->
            <a href="index.php"><img src="images/logo.png" alt="Website Logo"></a>
        </span>
            <div class="home-icon" onclick="goToHomePage()">
                <img src="images/home.png" alt="Ana Sayfa">
            </div>
        </div>
        <div class="menu-items">
            <a href="schedule.php" class="menu-button">Fuar Takvimi</a>
            <a href="hizmetler.php" class="menu-button">Hizmetlerimiz</a>
            <a href="references.php" class="menu-button">Referanslarımız</a>
            <a href="etkinlik_yarat.php" class="menu-button">Etkinliğini Yarat</a>
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
                <a href="yzlm_fuar.php" class="btn-more">Daha Fazlasını Gör</a>
            </div>
        </div> 

        <div class="event-card">
            <img src="images/otmtv.png" class="event-img" alt="Etkinlik Görseli">
            <div class="event-details">
                <h2>OTOSAN'24 OTOMOTİV FUARI</h2>
                <p class="event-description">KOtomotiv satış sonrası endüstrisi için dünyanın lider ticaret fuarı markası Automechanika'nın Türkiye'deki tek etkinliği olan Automechanika Istanbul,23-26 Mayıs 2024 tarihleri arasında İstanbul TÜYAP Fuar ve Kongre Merkezi'nde düzenlenecek.</p>
                <a href="otmtv_fuar.php" class="btn-more">Daha Fazlasını Gör</a>
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

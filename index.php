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
    background-color: #516C8D;
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
    background-color: #516C8D;
    color: #0D242F;
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
    color: #0D242F;
    display: block;
    margin-bottom: 5px;
}
.event-container {
    display: flex;
    justify-content: center;
    flex-wrap: nowrap; /* Kartlar sıralı bir şekilde yerleştirilecek */
    margin: 0 40px;
}

.event-card {
    color: #0D242F;
    background-color:#FFF7F1;
    width: calc(27% - 20px); /* Kartların genişliği eşit olacak ve aralarında 20px boşluk olacak */
    margin-top: 20px;
    margin-right: 20px;
    margin-left : 20px;
    margin-bottom: 20px; /* Kartlar alt alta yerleştirilecek */
    border: 1px solid #ccc; /* Kartlara kenarlık ekleyebilirsiniz */
    border-radius: 5px; /* Kartlara köşe yuvarlama ekleyebilirsiniz */
    padding: 20px; /* Kartların içeriğinden boşluk bırakabilirsiniz */
    
}

.event-img {
    display: block;
    width: 300px; 
    height: auto;
    margin: 0 auto;
    border-radius: 5px;

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
    max-width: 400px; /* Örnek olarak 600px genişliğinde */
    width: 100%;
}
.search-bar input[type="text"] {
    padding: 10px;
    border: 2px solid #ccc;
    border-radius: 5px;
    flex: 1;
    margin-right: 5px;
}
.search-bar button[type="submit"] {
    background-color: #DDDDDD;
    color: #0D242F;
    border: none;
    padding: 10px 20px;
    border-radius: 5px;
    cursor: pointer;
    transition: background-color 0.3s ease;
}
.search-bar button[type="submit"]:hover {
    background-color: #9EB8D9;
}
.btn-login {
    background-color: #DDDDDD; 
    color: #0D242F;
    border: none;
    padding: 10px 20px;
    border-radius: 5px;
    text-decoration: none;
    transition: background-color 0.3s ease;
    margin-right: 5px;
}
.btn-login:hover {
    background-color: #9EB8D9; 
}
.btn-register {
    background-color: #DDDDDD; 
    color: #0D242F;
    border: none;
    padding: 10px 20px;
    border-radius: 5px;
    text-decoration: none;
    transition: background-color 0.3s ease;
    margin-right: 10px;
}
.btn-register:hover {
    background-color: #9EB8D9; 
}
.btn-more {
    display: block;
    margin-top: 10px;
    background-color: #DDDDDD;
    color: #0D242F;
    border: none;
    padding: 10px 20px;
    border-radius: 5px;
    text-decoration: none;
    transition: background-color 0.3s ease;
}
.btn-more:hover {
    background-color: #9EB8D9;
}
 .menu-button {
    background-color: #DDDDDD; 
    color: #0D242F;
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
    background-color: #9EB8D9; 
}
.home-icon {
    cursor: pointer;
}
.home-icon img {
    width: 35px;
    height: auto;
}
        .tooltip {
    position: relative; /* Görece konumlandırma */
    display: inline-block; /* Metni logonun yanında görüntülemek için */
}

.tooltip::after {
    content: attr(title); /* Tooltip içeriğini title niteliğinden al */
    position: absolute; /* Mutlak konumlandırma */
    background-color: black; /* Arkaplan rengi */
    color: white; /* Yazı rengi */
    padding: 5px; /* İçerik etrafındaki dolgu */
    border-radius: 5px; /* Kenar yuvarlatma */
    z-index: 1; /* Diğer öğelerin üzerinde kalması için */
    opacity: 0; /* Başlangıçta görünmez */
    transition: opacity 0.3s; /* Geçiş efekti */
    bottom: 125%; /* Logonun altında */
    left: 50%; /* Logonun tam ortasında */
    transform: translateX(-50%); /* Yatayda merkezlemek için */
}

.tooltip:hover::after {
    opacity: 1; /* Üzerine gelindiğinde görünür hale getir */
}

        </style>
</head>
<body>
</head>
<body>
<body style="background-color: #DDDDDD;">
<header>
    <div class="container">
        <div class="logo">
        <span class="tooltip" title="Ana Sayfa"> <!-- title, tooltip içeriğini belirtir -->
            <a href="index.php"><img src="images/logo_.png" alt="Website Logo"></a>
        </span>
            <div class="home-icon" onclick="goToHomePage()">
                <img src="images/home_icon.png" alt="Ana Sayfa">
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
        <div class="event-card" style= color: #0D242F>
            <img src="images/yzlm.png" class="event-img" alt="Etkinlik Görseli">
            <div class="event-details">
                <h2>Y&Y YAZILIM FUARI</h2>
                <p class="event-description">"Dijital dönüşümün öncüsü olan yazılım dünyasının en son yeniliklerini ve gelecek vadeden teknolojilerini keşfetmek için, Yazılım Fuarı'na katılmaya davetlisiniz. Sektör liderlerinin, girişimcilerin ve yazılım uzmanlarının bir araya geldiği bu etkinlik, interaktif sunumlar, eğitici atölye çalışmaları ve ilham verici konuşmalarla dolu bir deneyim sunuyor. Siz de geleceğin yazılım dünyasını şekillendiren teknolojik gelişmelere adım atmak ve sektördeki en son trendler hakkında bilgi sahibi olmak için Yazılım Fuarı'na katılın!"</p>
                <a href="yzlm_fuar.php" class="btn-more">Daha Fazlasını Gör</a>
            </div>
        </div> 

        <div class="event-card">
            <img src="images/otmtv.png" class="event-img" alt="Etkinlik Görseli">
            <div class="event-details">
                <h2>OTOSAN'24 OTOMOTİV FUARI</h2>
                <p class="event-description">Otomotiv dünyasının heyecan verici atmosferine hoş geldiniz! OTOSAN'24 OTOMOTİV FUARI , sektörün önde gelen markalarını ve en son teknolojilerini bir araya getiriyor. Her yıl binlerce ziyaretçiyi ağırlayan bu etkinlik, geleceğin otomotiv trendlerini keşfetmek ve en yeni araçları görmek için mükemmel bir fırsat sunuyor.</p>
                <a href="otmtv_fuar.php" class="btn-more">Daha Fazlasını Gör</a>
            </div>
        </div>

        <div class="event-card">
            <img src="images/grsm.png" class="event-img" alt="Etkinlik Görseli">
            <div class="event-details">
                <h2>KADIN GİRİŞİMCİLİK FUARI</h2>
                <p class="event-description">Kadın Girişimciliği EXPO 2023 Üst üste üçüncü kez, 15-17 Mayıs tarihlerinde düzenlenecek olan EXPO 2023, kadın girişimciler, yatırımcılar ve özel sektör temsilcileri için interaktif bir alan sağlayacaktır:</p>
                <a href="grsm_fuar.php" class="btn-more">Daha Fazlasını Gör</a>
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

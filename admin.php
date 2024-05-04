<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Paneli</title>
    <style>
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

    </style>
</head>
<body style="background-color: #DDDDDD;">
<header>
    <div class="container">
        <div class="logo">
            <a href="index.php"><img src="images/logo_.png" alt="Website Logo"></a>
        </div>
        <div class="menu-items">
            <!-- Admin Paneli linki -->
            <a href="#" class="menu-button">Admin Paneli</a>
        </div>
        <div class="user-actions">
            <!-- Çıkış Yap linki -->
            <a href="logout.php" class="btn-login">Çıkış Yap</a>
        </div>
    </div>
</header>
<div class="container">
    <!-- Etkinlik Kartları -->
    <div class="event-container">
        
        <?php
session_start();

if(!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] !== true) {
    header('Location: login.php');
    exit();
}

// Veritabanından etkinlikleri al
$servername = "localhost";
$username = "kullanici_adi";
$password = "parola";
$dbname = "veritabani_adi";

// Veritabanı bağlantısını oluştur
$conn = new mysqli($servername, $username, $password, $dbname);

// Bağlantıyı kontrol et
if ($conn->connect_error) {
    die("Veritabanına bağlanılamadı: " . $conn->connect_error);
}

$sql = "SELECT * FROM events";
$result = $conn->query($sql);

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Paneli</title>
</head>
<body>
    <h2>Admin Paneli</h2>
    <a href="add_event.php">Etkinlik Ekle</a>
    <ul>
        <?php
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                echo "<li>" . $row["title"] . " - " . $row["date"] . "</li>";
            }
        } else {
            echo "Mevcut etkinlik yok";
        }
        ?>
    </ul>
    <a href="index.php">Çıkış Yap</a>
</body>
</html>
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
</body>
</html>
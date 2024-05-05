<?php
// Veritabanı bağlantısı için bilgiler
$servername = "localhost"; // Sunucu adı
$username = "root"; // Veritabanı kullanıcı adı
$password = ""; // Veritabanı şifresi
$dbname = "fuar_alani"; // Veritabanı adı

// Veritabanı bağlantısını oluşturma
$conn = new mysqli($servername, $username, $password, $dbname);

// Bağlantıyı kontrol etme
if ($conn->connect_error) {
    die("Veritabanı bağlantısı başarısız: " . $conn->connect_error);
}

// Toplam etkinlik sayısını almak için sorgu
$sql_total_events = "SELECT COUNT(*) as total_events FROM etkinlikler2";
$result_total_events = $conn->query($sql_total_events);
$row_total_events = $result_total_events->fetch_assoc();
$total_events = $row_total_events["total_events"];

// Kayıtlı kullanıcı sayısını almak için sorgu
$sql_total_users = "SELECT COUNT(*) as total_users FROM kullanicilar";
$result_total_users = $conn->query($sql_total_users);
$row_total_users = $result_total_users->fetch_assoc();
$total_users = $row_total_users["total_users"];

// Kayıtlı kullanıcıların listesi için sorgu
$sql_users = "SELECT * FROM kullanicilar";
$result_users = $conn->query($sql_users);
?>

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
            background-color: #DDDDDD;
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 20px;
        }

        header {
            background-color: #516C8D;
            color: #fff;
            padding: 10px 0;
            text-align: center;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .logo img {
            margin-left: 10px;
            width: 100px; /* İstediğiniz genişlik değerini buraya yazabilirsiniz */
            height: auto; /* Genişliğe göre otomatik olarak boyutlandırma yapılması için */
        }

        .menu-items {
            display: flex;
            align-items: center;
        }

        .menu-item {
            margin-right: 20px;
        }

        .user-actions {
            margin-left: auto; /* Kullanıcı işlemlerini sağa hizalamak için */
        }

        .user-actions a {
            margin-right:10px;
            margin-left: 10px;
            padding: 10px 20px;
            background-color: #333;
            color: #fff;
            text-decoration: none;
            border-radius: 5px;
        }

        .user-actions a:hover {
            background-color: #2C3E50;
        }

        .statistics {
            background-color: #f0f0f0;
            padding: 20px;
            margin-bottom: 20px;
            border-radius: 5px;
        }

        .statistics h3 {
            margin-top: 0;
            color: #333;
        }

        .statistics p {
            margin: 5px 0;
            color: #555;
        }

        .user-list {
            background-color: #fff;
            padding: 20px;
            border-radius: 5px;
        }

        .user-list h3 {
            margin-top: 0;
            color: #333;
        }

        .user-list ul {
            list-style-type: none;
            padding: 0;
        }

        .user-list li {
            background-color: #f9f9f9;
            padding: 10px;
            margin-bottom: 5px;
            border-radius: 5px;
        }

        .user-list li:last-child {
            margin-bottom: 0;
        }

        footer {
            background-color: #516C8D;
            color: #fff;
            padding: 20px 0;
            text-align: center;
            margin-top: 20px;
        }

        .footer-content {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
        }

        .footer-content .col {
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
        .add-event-button {
            display: block;
            width: 100%;
            padding: 15px 0;
            background-color: #516C8D;
            color: #fff;
            text-align: center;
            text-decoration: none;
            border-radius: 5px;
            transition: background-color 0.3s ease;
        }

        .add-event-button:hover {
            background-color: #2C3E50;
        }
    </style>
</head>
<body>
<header>
        <div class="logo">
            <a href="index.php"><img src="images/logo_.png" alt="Website Logo"></a>
        </div>
        
        <div class="user-actions">
            <!-- Çıkış Yap linki -->
            <a href="index.php" class="btn-login">Çıkış Yap</a>
        </div>
    </div>
</header>
<div class="container">
    <!-- Admin Paneli içeriği -->
    <a href="add_event.php" class="add-event-button">Etkinlik Ekle</a>
    <br>
    <h2>Admin Paneli</h2>
    <div class="statistics">
        <h3>İstatistikler</h3>
        <p>Toplam Etkinlik Sayısı: <?php echo $total_events; ?></p>
        <p>Kayıtlı Kullanıcı Sayısı: <?php echo $total_users; ?></p>
    </div>
    <div class="user-list">
        <h3>Kayıtlı Kullanıcılar</h3>
        <ul>
            <?php while ($row_user = $result_users->fetch_assoc()): ?>
                <li><?php echo $row_user["ad"] . " " . $row_user["soyad"] . " - " . $row_user["email"]; ?></li>
            <?php endwhile; ?>
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
</body>
</html>

<?php
// Veritabanı bağlantısını kapatma
$conn->close();
?>
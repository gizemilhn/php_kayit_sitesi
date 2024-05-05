<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gelecek Etkinlikler</title>
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
        .event-card {
            background-color: #fff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            border-radius: 10px;
            margin-bottom: 20px;
            overflow: hidden;
        }
        .event-img {
            width: 100%;
            height: 200px;
            object-fit: cover;
        }
        .event-details {
            padding: 20px;
        }
        .event-details h2 {
            margin-top: 0;
            color: #333;
        }
        .event-details p {
            color: #666;
        }
        .btn-more {
            display: inline-block;
            background-color: #007bff;
            color: #fff;
            padding: 10px 20px;
            text-decoration: none;
            border-radius: 5px;
            transition: background-color 0.3s ease;
        }
        .btn-more:hover {
            background-color: #0056b3;
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

<div class="container">
<div class="mb-3">
            <button class="custom-button" onclick="goToIndexPage()">Ana Sayfa</button>
            </div>
    <h1>Gelecek Etkinlikler</h1>

    <?php
    // Veritabanı bağlantısı
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "fuar_alani";

    $conn = new mysqli($servername, $username, $password, $dbname);

    // Bağlantıyı kontrol et
    if ($conn->connect_error) {
        die("Veritabanına bağlanılamadı: " . $conn->connect_error);
    }

    // Gelecek etkinlikleri sorgula
    $sql = "SELECT * FROM etkinlikler2 WHERE tarih > NOW() ORDER BY tarih ASC";
    $result = $conn->query($sql);

    // Eğer etkinlik varsa ekrana yazdır
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            echo "<div class='event-card'>";
            // Etkinlik görselini göster
            echo "<img src='/etkinlik_gorselleri/" . $row['etkinlik_id'] . "_etkinlik.jpg' class='event-img' alt='Etkinlik Görseli'>";
            echo "<div class='event-details'>";
            echo "<h2>" . $row['etkinlik_adi'] . "</h2>";
            echo "<p>" . $row['tanim'] . "</p>";
            echo "<a href='#' class='btn-more'>Daha Fazlasını Gör</a>";
            echo "</div>";
            echo "</div>";
        }
    } else {
        echo "<p>Henüz gelecek etkinlik bulunmamaktadır.</p>";
    }
    $conn->close();
    ?>

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
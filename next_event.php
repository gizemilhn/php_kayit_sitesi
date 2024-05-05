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
    </style>
</head>
<body>

<div class="container">
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
            echo "<img src='" . $row['etkinlik_gorseli'] . "' class='event-img' alt='Etkinlik Görseli'>";
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

</body>
</html>
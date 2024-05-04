<?php
session_start();

if(isset($_POST['submit'])) {
    // Veritabanına yeni etkinliği ekle
    $servername = "localhost";
    $username = "kullanici_adi";
    $password = "parola";
    $dbname = "fuar_alani";

    // Veritabanı bağlantısını oluştur
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Bağlantıyı kontrol et
    if ($conn->connect_error) {
        die("Veritabanına bağlanılamadı: " . $conn->connect_error);
    }

    // Formdan gelen verileri al
    $title = $_POST['title'];
    $date = $_POST['date'];
    $description = $_POST['description'];

    // Etkinlik tablosuna yeni etkinliği ekle
    $sql = "INSERT INTO etkinlikler (etkinlik_adi, tarih, tanim) VALUES ('$title', '$date', '$description')";

    if ($conn->query($sql) === TRUE) {
        echo "Yeni etkinlik başarıyla eklendi";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Etkinlik Ekle</title>
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

.user-actions {
     margin-left: auto;
}
.btn-logout,
.btn-admin {
    background-color: #DDDDDD; 
    color: #0D242F;
    border: none;
    padding: 10px 20px;
    border-radius: 5px;
    text-decoration: none;
    transition: background-color 0.3s ease;
    margin-right: 10px;
}
.btn-logout:hover,
.btn-admin:hover {
    background-color: #9EB8D9; 
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
}

.event-card {
    color: #0D242F;
    background-color: #FFF7F1;
    width: 70%;
    margin-top: 20px;
    border: 1px solid #ccc;
    border-radius: 5px;
    padding: 20px;
}
    
.event-card form {
    margin-top: 20px;
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
        <div class="user-actions">
            <a href="index.php" class="btn-logout">Çıkış Yap</a>
            <a href="admin.php" class="btn-admin">Admin Paneli</a>
        </div>
        </div>
    </div>
</header>
<div class="container">
    <div class="event-container" style="width: 50%;">
        <div class="event-card">
            <h2 class="card-title">Etkinlik Ekle</h2>
            <form action="add_event.php" method="POST" enctype="multipart/form-data">
                <div class="mb-3">
                    <label for="eventImage" class="form-label">Etkinlik Görseli</label>
                    <input type="file" class="form-control" id="eventImage" name="eventImage" accept="image/*" required>
                </div>
                <div class="mb-3">
                    <label for="title" class="form-label">Başlık:</label>
                    <input type="text" class="form-control" id="title" name="title" required>
                </div>
                <div class="mb-3">
                    <label for="date" class="form-label">Tarih:</label>
                    <input type="date" class="form-control" id="date" name="date" required>
                </div>
                <div class="mb-3">
                    <label for="description" class="form-label">Açıklama:</label>
                    <textarea class="form-control" id="description" name="description" rows="4" cols="50"></textarea>
                </div>
                <button type="submit" class="btn btn-primary" name="submit">Etkinlik Ekle</button>
            </form>
        </div>
    </div>
</div>
</body>
</html>

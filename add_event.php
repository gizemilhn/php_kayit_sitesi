<?php
session_start();

if(!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] !== true) {
    header('Location: login.php');
    exit();
}

if(isset($_POST['submit'])) {
    // Veritabanına yeni etkinliği ekle
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

    // Formdan gelen verileri al
    $title = $_POST['title'];
    $date = $_POST['date'];
    $description = $_POST['description'];

    // Etkinlik tablosuna yeni etkinliği ekle
    $sql = "INSERT INTO events (title, date, description) VALUES ('$title', '$date', '$description')";

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
</head>
<body>
    <h2>Etkinlik Ekle</h2>
    <form action="add_event.php" method="POST">
        <label for="title">Başlık:</label>
        <input type="text" id="title" name="title" required><br><br>
        <label for="date">Tarih:</label>
        <input type="date" id="date" name="date" required><br><br>
        <label for="description">Açıklama:</label><br>
        <textarea id="description" name="description" rows="4" cols="50"></textarea><br><br>
        <button type="submit" name="submit">Etkinlik Ekle</button>
    </form>
</body>
</html>

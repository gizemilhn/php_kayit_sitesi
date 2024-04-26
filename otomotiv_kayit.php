<?php
include("connection.php");
require_once __DIR__.'/vendor/autoload.php';

use chillerlan\QRCode\QRCode;
use chillerlan\QRCode\QROptions;

$name_err=$surname_err="";
$name="";
$surname="";
$katilimci_turu="";
$ktlm_err="";

if(isset($_POST["kaydol"]))
{
    // İsim Doğrulama
    if (empty($_POST["ad"])) {
        $name_err="İsim Boş bırakılamaz!";
    }
    else if (!preg_match("/^[a-zA-Z-' ]*$/",$_POST["ad"])) {
        $name_err = "Sadece harf ve boşluk kullanılabilir!";
    }
    else {
        $name=$_POST["ad"];
    }

    // Soyisim Doğrulama
    if (empty($_POST["soyad"])) {
       $surname_err="Soyisim alanı boş geçilemez!";
    }
    else if (!preg_match("/^[a-zA-Z-' ]*$/",$_POST["soyad"])) {
        $surname_err = "Sadece harf ve boşluk kullanılabilir!";
    }
    else {
        $surname=$_POST["soyad"];
    }

    //Katılımcı türü kontrolü...
    if (empty($_POST["katilimci_turu"])) {
        $ktlm_err="Katılımcı türünüzü seçmeniz gerekmektedir.";
    }
    else 
    {
        $katilimci_turu=$_POST['katilimci_turu'];
    }
    
    
            // QR kod oluşturulacak metin
            $text = 'Ad: ' . $name . ', Soyad: ' . $surname . ', Katılım Türü: ' . $katilimci_turu;

            // QR kod seçeneklerini ayarla
            $options = new QROptions([
                'outputType' => QRCode::OUTPUT_IMAGE_PNG,
                'eccLevel'   => QRCode::ECC_L,
                'scale'      => 5,
            ]);

            // QR kod objesini oluştur
            $qr = new QRCode($options);
            // QR kodunun dosyaya kaydedileceği klasörün yolu
            $qr_directory = 'qrcodes/'; 

            // QR kodunun dosya adını oluştur
            $qr_filename = 'qr_code_' . uniqid() . '.png';

            // QR kodunun dosya yolu ve adı
            $qr_path = $qr_directory . $qr_filename;

            // QR kodu oluştur ve kaydet
            $qr_result = $qr->render($text, $qr_path);

            if($qr_result !== false) {
                // QR kod oluşturulduysa, kullanıcıyı veritabanına kaydet
                 // Parolayı güvenli şekilde sakla
                $ekle = "INSERT INTO kullanicilar (ad, soyad, katilimci_turu, qr_code) VALUES ('$name', '$surname','$katilimci_turu', '$qr_filename')";
                $calistirekle = mysqli_query($connection,$ekle);

                // sign_up.php

                if ($calistirekle) {
                    // Kayıt başarılıysa, kullanıcıyı qrcode.php sayfasına yönlendir
                    $redirect_url = "qrcode.php?name=" . urlencode($name) . "&surname=" . urlencode($surname);
                } else {
                    // Kayıt başarısızsa, ana sayfaya yönlendir
                    $redirect_url = "yzlm_fuar.php";
                }

            } else {
                echo '<div class="alert alert-danger" role="alert">
                QR kodu oluşturulurken bir hata meydana geldi, lütfen tekrar deneyiniz!
                </div>';
            }
            header("Location: $redirect_url");
            exit();

        }
    

?>


<!doctype html>
<html lang="en">
<head>
    
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>KAYIT FORMU</title>
    <style>
        body {
        font-family: Arial, sans-serif;
        margin: 0;
        padding: 0;
        display: flex;
        flex-direction: column;
        min-height: 100vh;
         }
         header {
            background-color: #2B4865;
            color: #fff;
            padding: 20px;
            display: flex;
            align-items: center;
        }

        header h1 {
            margin: 0;
        }

        nav ul {
            list-style-type: none;
            margin: 0;
            padding: 0;
        }

        nav ul li {
            display: inline;
            margin-right: 20px;
        }

        nav ul li a {
            color: #fff;
            text-decoration: none;
        }
        main {
            flex: 1;
            padding: 20px;
        }
        

        .button {
            display: inline-block;
            padding: 10px 20px;
            background-color: #F4E6B3;
            color: #836F45;
            text-align: center;
            text-decoration: none;
            font-size: 16px;
            border-radius: 5px;
            transition: background-color 0.3s;
        }

        .button:hover {
            background-color: #CDB97F
        }

        .logo {
            width: 150px;
            height: auto;
            margin-right: 20px;
        }
        footer {
            background-color: #2B4865;
            color: #fff;
            text-align: center;
            padding: 10px 0;
        }
        

 </style>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body style="background-color: #DDDDDD;">
<header>
    <img src="images/otmtv_logo.png" alt="Otomotiv Fuarı Logo" class="logo">
    <nav>
        <ul>
            <li><a href="otmtv_fuar.php" class="button">Ana Sayfa</a></li>
            <li><a href="otmtv_program.php" class="button">Program</a></li>
            <li><a href="otomotiv_kayit.php" class="button">Kayıt</a></li>
            <li><a href="iletisim.php" class="button">İletişim</a></li>
        </ul>
    </nav>
</header>

<div class="container p-5">
    <a href="otmtv_fuar.php" class="btn btn-secondary mb-3">Geri</a>
    <div class="card p-5 ">
    <h2>Kayıt Formu</h2>
        <form action="sign_up.php" method="POST" id="registrationForm">
            <div class="mb-3">
                <label for="exampleInputName" class="form-label">Ad</label>
                <input type="text" class="form-control <?php echo (!empty($name_err)) ? 'is-invalid' : ''; ?>" id="exampleInputName" name="ad">
                <div class="invalid-feedback"><?php echo $name_err; ?></div>
            </div>
            <div class="mb-3">
                <label for="exampleInputSurname" class="form-label">Soyad</label>
                <input type="text" class="form-control <?php echo (!empty($surname_err)) ? 'is-invalid' : ''; ?>" id="exampleInputSurname" name="soyad">
                <div class="invalid-feedback"><?php echo $surname_err; ?></div>
            </div>

            <div>
            <select class="form-select mb-3" name="katilimci_turu" aria-label="Katılım türünü seçiniz.">
                <option selected disabled>Katılım türünü seçiniz.</option>
                <option value="Görevli">Görevli</option>
                <option value="Ziyaretçi">Ziyaretçi</option>
            <div>
    </div>
                <?php  if(empty($_POST["katilimci_turu"])){
                        echo $ktlm_err;
                }
                 ?>
                
            </select>
            <a href="qrcode.php" button type="submit"style="background-color: #F4E6B3" name="kaydol" class="btn" id="submitBtn">Kayıt Ol</button></a>
        </form>
    </div>
</div>
</body>
</html>
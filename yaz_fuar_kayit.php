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

                if ($calistirekle) {
                    echo '<div class="alert alert-success" role="alert">
                    Kaydınız başarılı bir şekilde oluşturuldu!
                    </div>';
                }
                else {
                    echo '<div class="alert alert-danger" role="alert">
                    Kaydınız oluşturulurken bir hata meydana geldi, lütfen tekrar deneyiniz!
                    </div>';
                }
            } else {
                echo '<div class="alert alert-danger" role="alert">
                QR kodu oluşturulurken bir hata meydana geldi, lütfen tekrar deneyiniz!
                </div>';
            }

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
        background-image: url('images/bck_yzlm.png');
        background-size: cover;
        background-position: center;
         }
         header {
            background-color: #191970;
            color: #fff;
            padding: 20px;
            display: flex;
            align-items: center;
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
        .button {
            display: inline-block;
            padding: 10px 20px;
            background-color: #add8e6;
            color: #4682b4;
            text-align: center;
            text-decoration: none;
            font-size: 16px;
            border-radius: 5px;
            transition: background-color 0.3s;
        }

        .button:hover {
            background-color: #b0c4de;
        }

        .logo {
            width: 150px;
            height: auto;
            margin-right: 20px;
        }
        

 </style>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body style="background-color: #b0c4de;">

<header>
    <img src="images/yzlm_logo.png" alt="Yazılım Fuarı Logo" class="logo">
    <nav>
        <ul>
            <li><a href="yzlm_fuar.php" class="button">Ana Sayfa</a></li>
            <li><a href="yazlm_program.php" class="button">Program</a></li>
            <li><a href="fuar_kayit.php" class="button">Kayıt</a></li>
            <li><a href="iletisim.php" class="button">İletişim</a></li>
        </ul>
    </nav>
</header>

<div class="container p-5">
    <a href="yzlm_fuar.php" class="btn btn-secondary mb-3">Geri</a>
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
            <button type="submit" name="kaydol" class="btn btn-primary" id="submitBtn">Kayıt Ol</button>
        </form>
    </div>
</div>
</body>
</html>

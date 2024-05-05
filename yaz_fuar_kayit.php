<?php
include("connection.php");
require_once __DIR__.'/vendor/autoload.php';

use chillerlan\QRCode\QRCode;
use chillerlan\QRCode\QROptions;

$email_err="";
$name_err=$surname_err="";
$name="";
$surname="";
$email="";
$katilimci_turu="";
$ktlm_err="";
$etk_ad="Y&Y";
$qr_result = false; // QR kodunun başlangıçta oluşturulmadığını belirtmek için
$success_message = ""; // Başarı mesajı için

if(isset($_POST["kaydol"]))
{
    // Formun dolu olup olmadığını kontrol et
    if (!empty($_POST["ad"]) && !empty($_POST["soyad"]) && !empty($_POST["email"]) && isset($_POST["katilimci_turu"])) {
        // İsim Doğrulama
        if (!preg_match("/^[a-zA-Z-' ]*$/",$_POST["ad"])) {
            $name_err = "Sadece harf ve boşluk kullanılabilir!";
        }
        else {
            $name=$_POST["ad"];
        }

        // Soyisim Doğrulama
        if (!preg_match("/^[a-zA-Z-' ]*$/",$_POST["soyad"])) {
            $surname_err = "Sadece harf ve boşluk kullanılabilir!";
        }
        else {
            $surname=$_POST["soyad"];
        }

        if (!filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)) {
            $email_err = "Geçersiz email formatı!";
        }
        else {
            $email=$_POST["email"];
        }

        //Katılımcı türü kontrolü...
        $katilimci_turu=$_POST['katilimci_turu'];

        // Formda hata yoksa
        if(empty($name_err) && empty($surname_err) && empty($email_err)) {
            // QR kod oluşturulacak metin
            $text = 'Ad: ' . $name . ', Soyad: ' . $surname . ' , Email:'.$email. ', Katılım Türü: ' . $katilimci_turu. ', Etkinlik Adı:'. $etk_ad ;
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
                $ekle = "INSERT INTO kullanicilar (ad, soyad , email, katilimci_turu, qr_code, etkinlik_adi) VALUES ('$name', '$surname','$email','$katilimci_turu', '$qr_filename', 'Y&Y')";
                $calistirekle = mysqli_query($connection,$ekle);
                $success_message = "Kaydınız başarıyla tamamlandı!";
            } else {
                $success_message = "QR kod oluşturulurken bir hata oluştu. Lütfen tekrar deneyin.";
            }
        }
    } else {
        // Form boşsa hata mesajı göster
        $success_message = "Lütfen tüm alanları doldurun.";
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
        @font-face {
        font-family: 'CustomFont';
        src: url('font/Involve-VF.ttf') format('ttf'), /* WOFF2 formatı */
        }
        body {
            font-family: 'CustomFont', ;
            margin: 0;
            padding: 0;
            display: flex;
            flex-direction: column;
            min-height: 100vh;
            
        }

        header {
            background-color: #22546B;
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

        footer {
            background-color: #22546B;
            color: #fff;
            text-align: center;
            padding: 10px 0;
        }

        .button {
            display: inline-block;
            padding: 10px 20px;
            background-color: #D3DBDD;
            color: #232C31;
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

        
        .logo img {
            margin-left: 10px;
            margin-right: 10px;
            width: 100px; 
            height: auto; 
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
            margin-left: auto; 
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
            background-color: #3cb371; 
        }
        
        .button {
            display: inline-block;
            padding: 10px 20px;
            background-color: #D3DBDD;
            color: #232C31;
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
<body style="background-color: #D3DBDD;">

<header>
    <img src="images/yzlm_logo.png" alt="Yazılım Fuarı Logo" class="logo">
    <nav>
        <ul>
            <li><a href="yzlm_fuar.php" class="button">Ana Sayfa</a></li>
            <li><a href="yazlm_program.php" class="button">Program</a></li>
            <li><a href="yaz_fuar_kayit.php" class="button">Kayıt</a></li>
            <li><a href="iletisim.php" class="button">İletişim</a></li>
        </ul>
    </nav>
</header>

<div class="container p-5">
    <a href="yzlm_fuar.php" class="btn btn-secondary mb-3">Geri</a>
    <div class="card p-5 ">
    <h2>Kayıt Formu</h2>
            <form method="POST" id="registrationForm">
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
            <div class="mb-3">
                <label for="exampleInputEmail" class="form-label">Email</label>
                <input type="email" class="form-control <?php echo (!empty($email_err)) ? 'is-invalid' : ''; ?>" id="exampleInputEmail" name="email">
                <div class="invalid-feedback"><?php echo $email_err; ?></div>
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
            <button type="submit" style="background-color: #D3DBDD" name="kaydol" class="btn" id="submitBtn">Kayıt Ol</button>
           
        </form>
    </div>
    <?php if(!empty($success_message)) : ?>
        <div class="alert alert-<?php echo ($qr_result !== false) ? 'success' : 'danger'; ?>" role="alert">
            <?php echo $success_message; ?>
        </div>
    <?php endif; ?>
</div>

</div><div class="modal fade" id="qrModal" tabindex="-1" aria-labelledby="qrModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="qrModalLabel">Kaydınız Başarıyla Tamamlandı!</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body text-center">
        <p>Kaydınız başarıyla tamamlandı. QR kodunuz aşağıda gösterilmektedir. QR kodunu indirebilir veya kaydedebilirsiniz.</p>
        <!-- QR Kodu Gösterme -->
        <img src="<?php echo $qr_path; ?>" alt="QR Kodu" class="img-fluid">
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Kapat</button>
        <!-- QR Kodunu İndirme Butonu -->
        <a href="<?php echo $qr_path; ?>" download="qr_code.png" class="btn btn-primary">QR Kodunu İndir</a>
      </div>
    </div>
  </div>
</div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script>
    $(document).ready(function(){
        <?php if(isset($_POST["kaydol"]) && $qr_result !== false) : ?>
            $('#qrModal').modal('show'); 
        <?php endif; ?>

        $('#qrModal').on('hidden.bs.modal', function () {
            window.location.href = 'index.php'; 
        });
    });
</script>
</body>
</html>

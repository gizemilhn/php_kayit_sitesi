<?php
include("connection.php");
require_once __DIR__.'/vendor/autoload.php';

use chillerlan\QRCode\QRCode;
use chillerlan\QRCode\QROptions;

$email_err="";
$name_err=$surname_err="";
$phone_err="";
$password_err="";
$name="";
$surname="";
$email="";
$phone="";
$password="";

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

    // Email Doğrulama
    if (empty ($_POST["email"]))
    {
        $email_err="Email alanı boş geçilemez!";
    }
    else if (!filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)) {
        $email_err = "Geçersiz email formatı!";
    }
    else {
        $email=$_POST["email"];
    }

    // Telefon Doğrulama
    if(empty ($_POST["tel_no"]))
    {
        $phone_err="Telefon alanı boş geçilemez!";
    }
    else if(!preg_match('/^(05(\d{9}))$/', $_POST["tel_no"]))
    {
        $phone_err="Geçersiz telefon numarası";
    }
    else {
        $phone=$_POST["tel_no"];
    }

    // Parola Doğrulama
    if(empty ($_POST["password"]) || empty ($_POST["confirm_password"]))
    {
        $password_err="Parola alanları boş geçilemez!";
    }
    else if($_POST["password"] !== $_POST["confirm_password"])
    {
        $password_err="Parolalar eşleşmiyor!";
    }
    else if(!preg_match('/^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])[0-9a-zA-Z]{8,}$/', $_POST["password"]))
    {
        $password_err="Parola en az bir büyük harf, bir küçük harf ve bir sayı içermelidir!";
    }
    else {
        $password=$_POST["password"];
    }
    $katilimci_turu=$_POST['katilimci_turu'];

    if(empty($name_err) && empty($surname_err) && empty($email_err) && empty($phone_err) && empty($password_err)) {
        // Veritabanı kontrolü...
        $kontrol_query = "SELECT * FROM kullanicilar WHERE email = '$email' OR telefon_no = '$phone'";
        $kontrol_sonuc = mysqli_query($connection, $kontrol_query);
        
        if($kontrol_sonuc !== false && mysqli_num_rows($kontrol_sonuc) > 0) {
            echo '<div class="alert alert-danger" role="alert">
            Bu e-posta veya telefon numarası zaten kayıtlıdır!
            </div>';
        } 
        else 
        {
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
                $hashed_password = $_POST['password']; // Parolayı güvenli şekilde sakla
                $ekle = "INSERT INTO kullanicilar (ad, soyad, email, telefon_no, password, katilimci_turu, qr_code) VALUES ('$name', '$surname', '$email', '$phone', '$hashed_password', '$katilimci_turu', '$qr_filename')";
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
    }
}
?>


<!doctype html>
<html lang="en">
<head>
    <body style="background-color: #6699FF;">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>KAYIT FORMU</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
<div class="container p-5">
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
            <div class="mb-3">
                <label for="exampleInputEmail" class="form-label">Email</label>
                <input type="email" class="form-control <?php echo (!empty($email_err)) ? 'is-invalid' : ''; ?>" id="exampleInputEmail" name="email">
                <div class="invalid-feedback"><?php echo $email_err; ?></div>
            </div>
            <div class="mb-3">
                <label for="exampleInputPhoneNumber" class="form-label">Telefon Numarası</label>
                <input type="tel" class="form-control <?php echo (!empty($phone_err)) ? 'is-invalid' : ''; ?>" id="exampleInputPhoneNumber" name="tel_no">
                <div class="invalid-feedback"><?php echo $phone_err; ?></div>
                <span id="phoneHelpInline" class="form-text">
          Telefon numaranızı kimseyle paylaşmayacağız.
    </span>
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword" class="form-label">Parola</label>
                <input type="password" class="form-control <?php echo (!empty($password_err)) ? 'is-invalid' : ''; ?>" id="exampleInputPassword" name="password">
                <div class="input-group-append">
                    <button class="btn btn-outline-secondary" type="button" id="togglePassword">Görünürlük</button>
                </div>
                <div class="invalid-feedback"><?php echo $password_err; ?></div>
                <span id="passwordHelpInline" class="form-text">
         Şifreniz en az 8 rakam olmalıdır, bir büyük harf,bir küçük harf ve bir rakam içermelidir.
    </span>
            </div>
            <div class="mb-3">
                <label for="exampleInputConfirmPassword" class="form-label">Parolayı Onayla</label>
                <input type="password" class="form-control <?php echo (!empty($password_err)) ? 'is-invalid' : ''; ?>" id="exampleInputConfirmPassword" name="confirm_password">
                <div class="input-group-append">
                    <button class="btn btn-outline-secondary" type="button" id="toggleConfirmPassword">Görünürlük</button>
                </div>
            </div>
            <select class="form-select mb-3" name="katilimci_turu" aria-label="Katılım türünü seçiniz.">
                <option selected disabled>Katılım türünü seçiniz.</option>
                <option value="Görevli">Görevli</option>
                <option value="Ziyaretçi">Ziyaretçi</option>
            </select>

            <div class="form-check mb-3">
                <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                <label class="form-check-label" for="flexCheckDefault">
                <a href="kvkk.html" target="_blank"> KVKK Aydınlatma </a>  metnini okudum, kabul ediyorum.
                </label>
            </div>
            <button type="submit" name="kaydol" class="btn btn-primary" id="submitBtn" disabled>Kayıt Ol</button>
            <a href="log_in.php" class="btn btn-secondary">Hesabım Var</a>
        </form>
    </div>
</div>
<script>
    document.getElementById('togglePassword').addEventListener('click', function() {
        var passwordInput = document.getElementById('exampleInputPassword');
        var type = passwordInput.getAttribute('type') === 'password' ? 'text' : 'password';
        passwordInput.setAttribute('type', type);
        this.textContent = type === 'password' ? 'Görünürlük' : 'Gizle';
    });

    document.getElementById('toggleConfirmPassword').addEventListener('click', function() {
        var confirmPasswordInput = document.getElementById('exampleInputConfirmPassword');
        var type = confirmPasswordInput.getAttribute('type') === 'password' ? 'text' : 'password';
        confirmPasswordInput.setAttribute('type', type);
        this.textContent = type === 'password' ? 'Görünürlük' : 'Gizle';
    });
    document.getElementById('flexCheckDefault').addEventListener('change', function() {
        var submitBtn = document.getElementById('submitBtn');
        submitBtn.disabled = !this.checked;
    });
</script>
</body>
</html>

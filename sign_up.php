<?php
include("connection.php");


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
            // Veritabanına ekleme işlemi
            $plain_password = $_POST['password']; // Kullanıcının girdiği düz metin parola
            $ekle = "INSERT INTO kullanicilar (ad, soyad, email, telefon_no, password) VALUES ('$name', '$surname', '$email', '$phone', '$plain_password')";
            $calistirekle = mysqli_query($connection, $ekle);
            
            
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
        }
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
        .btn-login {
            background-color: #DDDDDD; 
            color: #0D242F;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            text-decoration: none;
            transition: background-color 0.3s ease;
            margin-right: 5px;
        }
        .btn-login:hover {
            background-color: #9EB8D9; 
        }
        .btn-register {
            background-color: #DDDDDD; 
            color: #0D242F;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            text-decoration: none;
            transition: background-color 0.3s ease;
            margin-right: 10px;
        }
        .btn-register:hover {
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
        

 </style>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body style="background-color: #DDDDDD;">

<header>
    <div class="container">
        <div class="logo">
            <a href="index.php"><img src="images/logo_.png" alt="Website Logo"></a>
        <div>
    </div>
    <div>
        </div>
        <div class="user-actions">
            <a href="log_in.php" class="btn-login">Giriş Yap</a>
            <a href="sign_up.php" class="btn-register">Kayıt Ol</a>
        </div>
    </div>
</header>

<div class="container p-5">
    <a href="index.php" class="btn btn-secondary mb-3">Anasayfa</a>
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
                    Telefon numaranızın başında '0' olmalıdır.
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

<?php
include("connection.php");

$email = $password = "";
$email_err = $password_err = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (empty(trim($_POST["email"]))) {
        $email_err = "E-posta adresi boş bırakılamaz.";
    } else {
        $email = trim($_POST["email"]);
    }

    if (empty(trim($_POST["password"]))) {
        $password_err = "Parola boş bırakılamaz.";
    } else {
        $password = trim($_POST["password"]);
    }

    if (empty($email_err) && empty($password_err)) {
        $sql = "SELECT Katilimci_ID, email, password FROM kullanicilar WHERE email = ?";
        if ($stmt = mysqli_prepare($connection, $sql)) {
            mysqli_stmt_bind_param($stmt, "s", $param_email);
            $param_email = $email;

            if (mysqli_stmt_execute($stmt)) {
                mysqli_stmt_store_result($stmt);

                if (mysqli_stmt_num_rows($stmt) == 1) {
                    mysqli_stmt_bind_result($stmt, $id, $email, $hashed_password);
                
                    if (mysqli_stmt_fetch($stmt)) {
                        // Doğrudan veritabanından alınan hashlenmiş şifre ile kullanıcının girdiği şifreyi karşılaştırın
                        if ($password === $hashed_password) {
                            session_start();
                            $_SESSION["loggedin"] = true;
                            $_SESSION["id"] = $id;
                            $_SESSION["email"] = $email;
                
                            header("location: index.php");
                            exit();
                        } else {
                            $password_err = "Girilen parola yanlış.";
                        }
                    }
                
                } else {
                    $email_err = "Bu e-posta adresiyle ilişkilendirilmiş bir hesap bulunamadı.";
                }
            } else {
                echo "Oops! Bir şeyler yanlış gitti. Lütfen daha sonra tekrar deneyin.";
            }
            mysqli_stmt_close($stmt);
        }
    }
    mysqli_close($connection);
}
?>

<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Giriş Yap</title>
    <style>
        header {
            background-color: #333;
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
        

 </style>
 <head>
 <body>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body style="background-color: #8fbc8f;">
<header>
    <div class="container">
        <div class="logo">
            <a href="index.php"><img src="images/logo.png" alt="Website Logo"></a>
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
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST" id="registrationForm">
            <div class="wrapper">
                <h2>Giriş Yap</h2>
                <p>Lütfen giriş yapmak için bilgilerinizi girin.</p>
                <div class="mb-3">
                    <label for="exampleInputEmail" class="form-label">E-posta Adresi</label>
                    <input type="email" name="email" class="form-control <?php echo (!empty($email_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $email; ?>">
                    <div class="invalid-feedback"><?php echo $email_err; ?></div>
                </div>
                <div class="mb-3">
                    <label for="exampleInputPassword" class="form-label">Parola</label>
                    <input type="password" name="password" class="form-control <?php echo (!empty($password_err)) ? 'is-invalid' : ''; ?>" id="exampleInputPassword">
                    <div class="input-group-append">
                        <button class="btn btn-outline-secondary" type="button" id="togglePassword">Görünürlük</button>
                    </div>
                    <div class="invalid-feedback"><?php echo $password_err; ?></div>
                </div>
                <div class="mb-3">
                    <input type="submit" class="btn btn-primary" value="Giriş Yap">
                </div>
                <div class="mb-3">
                    <a href="sifre_yenileme.php">Şifremi unuttum?</a>
                </div>
                <p>Hesabınız yok mu? <a href="sign_up.php">Kayıt olun</a>.</p>
            </div>
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
</script>
</body>
</html>

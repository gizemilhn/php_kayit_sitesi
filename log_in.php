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
                
                            header("location: welcome.php");
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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body style="background-color: #6699FF;">
<div class="container p-5">
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

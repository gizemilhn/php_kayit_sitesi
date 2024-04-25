<?php
// Veritabanı bağlantısını yapın
include("connection.php");

// Hata mesajlarını sıfırlayın
$email = isset($_POST['email']) ? $_POST['email'] : '';
$email_err = "";

// Form gönderildiğinde
if($_SERVER["REQUEST_METHOD"] == "POST"){
    
    // Kullanıcının girdiği e-posta adresini alın
    $email = $_POST["email"];

    // E-posta alanını kontrol edin
    if(empty($email)){
        $email_err = "Lütfen e-posta adresinizi girin.";
    } else{
        // E-posta adresini veritabanında kontrol edin
        $query = "SELECT * FROM kullanicilar WHERE email = ?";
        
        if($stmt = mysqli_prepare($connection, $query)){
            // Parametreleri bağlayın
            mysqli_stmt_bind_param($stmt, "s", $param_email);
            
            // Parametreleri ayarlayın
            $param_email = $email;
            
            // Sorguyu çalıştırın
            if(mysqli_stmt_execute($stmt)){
                // Sonuçları alın
                mysqli_stmt_store_result($stmt);
                
                // E-posta adresinin veritabanında olup olmadığını kontrol edin
                if(mysqli_stmt_num_rows($stmt) == 1){
                    // E-posta adresi geçerli ise, şifre sıfırlama işlemine başlayın
                    // Rastgele bir şifre sıfırlama kodu oluşturun
                    $reset_token = bin2hex(random_bytes(32));

                    // Şifre sıfırlama kodunu ve kullanıcının e-posta adresini veritabanında güncelleyin
                    $update_query = "UPDATE kullanicilar SET reset_token = ? WHERE email = ?";
                    
                    if($update_stmt = mysqli_prepare($connection, $update_query)){
                        // Parametreleri bağlayın
                        mysqli_stmt_bind_param($update_stmt, "ss", $param_reset_token, $param_email);
                        
                        // Parametreleri ayarlayın
                        $param_reset_token = $reset_token;
                        $param_email = $email;
                        
                        // Sorguyu çalıştırın
                        if(mysqli_stmt_execute($update_stmt)){
                            // Şifre sıfırlama bağlantısını oluşturun
                            $reset_link = "http://example.com/yeni_sifre.php?token=" . $reset_token;

                            // Kullanıcıya şifre sıfırlama bağlantısını içeren bir e-posta gönderin
                            // Burada e-posta gönderme işlevselliği yer almalıdır

                            // Şifre sıfırlama bağlantısını gönderdikten sonra kullanıcıyı bilgilendir
                            echo "Şifre sıfırlama bağlantısı e-posta adresinize gönderildi.";
                        } else{
                            echo "Bir şeyler yanlış gitti. Lütfen daha sonra tekrar deneyin.";
                        }

                        // Sorguyu kapayın
                        mysqli_stmt_close($update_stmt);
                    }
                } else{
                    // E-posta adresi veritabanında bulunamazsa, hata mesajını göster
                    $email_err = "Bu e-posta adresiyle ilişkili bir hesap bulunamadı.";
                }
            } else{
                echo "Bir şeyler yanlış gitti. Lütfen daha sonra tekrar deneyin.";
            }

            // Sorguyu kapayın
            mysqli_stmt_close($stmt);
        }
    }
    
    // Veritabanı bağlantısını kapatın
    mysqli_close($connection);
}
?>

<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Şifremi Unuttum</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
        .error { color: red; }
    </style>
</head>
<body style="background-color: #8fbc8f">
    <div class="container p-5">
    <div class="card p-5 ">
        <h2>Şifremi Unuttum</h2>
        <p>Lütfen hesabınıza bağlı olan e-posta adresinizi girin. Size şifre sıfırlama talimatları içeren bir e-posta göndereceğiz.</p>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <div class="mb-3 <?php if(!empty($email_err)) echo "error"; ?>">
                <label for="exampleInputEmail" class="form-label">E-posta Adresi:</label>
                <input type="email" name="email" class="form-control" value="<?php echo $email; ?>">
                <span class="error"><?php echo $email_err; ?></span>
            </div>
            <div class="mb-3">
                <input type="submit" class="btn btn-primary" value="Gönder">
                <a href="log_in.php" class="btn btn-secondary">Geri</a>
            </div>
        </form>
    </div>
</body>
</html>

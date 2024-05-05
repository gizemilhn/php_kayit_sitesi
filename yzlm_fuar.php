<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Yazılım Fuarı</title>
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

        .card {
            margin-bottom: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
            overflow: hidden;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            max-width: 800px; 
            margin-left: auto; 
            margin-right: auto; 
        }

        .card img {
            width: 100%; 
        }

        .card-body {
            padding: 20px;
        }

        .card-title {
            font-size: 20px; 
            margin-bottom: 10px;
        }

        .card-text {
            font-size: 16px; 
            line-height: 1.6;
        }

        .text-body-secondary {
            font-size: 12px; 
            color: #666;
        }
    </style>
</head>
<body style="background-color: #D3DBDD;">
<header>
    <img src="images/yzlm_logo.png" alt="Yazılım Fuarı Logo" class="logo">
    <nav>
        <ul>
            <li><a href="index.php" class="button">Ana Sayfa</a></li>
            <li><a href="yazlm_program.php" class="button">Program</a></li>
            <li><a href="yaz_fuar_kayit.php" class="button">Kayıt</a></li>
            <li><a href="iletisim.php" class="button">İletişim</a></li>
        </ul>
    </nav>
</header>
<main>
    <section>
        <div class="card" style="background-color: #fff;">
            <div class="row g-0">
                <div class="col-md-4">
                    <img src="images/yzlm_fr.png" class="img-fluid rounded-start" alt="Yazılım Fuarı Görseli">
                </div>
                <div class="col-md-8">
                    <div class="card-body">
                        <h2 class="card-title">Y&Y Yazılım Fuarı</h2>
                        <p class="card-text">Yazılım Fuarı, her yıl yazılım dünyasının önde gelen profesyonellerini, girişimcileri ve meraklılarını bir araya getirerek inovasyonu ve işbirliğini teşvik eder. Amacımız, katılımcılarımıza en son teknolojileri tanıtmak, deneyimlerini paylaşmak ve iş bağlantıları kurmalarına olanak sağlamaktır.</p>
                        <p class="card-text">Etkinliğimize katılan dünyaca ünlü yazılım şirketlerinden bazıları:</p>
                        <ul class="card-text">
                            <li>TechCorp</li>
                            <li>CodeNex</li>
                            <li>InnovateX</li>
                            <li>SoftSolutions</li>
                            <li>FutureTech</li>
                        </ul>
                        <p class="card-text">Yazılım Fuarı, çeşitli konferanslar, atölye çalışmaları, panel tartışmaları ve interaktif sergilerle dolu bir program sunmaktadır.Ve daha fazlası!</p>
                        
                            <h1>Program</h1>
                            <p class="card-text">"Yazılım Fuarı, çeşitli konferanslar, atölye çalışmaları, panel tartışmaları ve interaktif sergilerle dolu bir program sunmaktadır. Programımızı keşfetmek için lütfen buraya <a href="yazlm_program.php">tıklayın</a>.
                        </p>
                        <h2>Kayıt</h2>
                        <p>
                        <p class="card-text">Etkinliğimize katılmak için şimdi kayıt olun ve bu heyecan verici deneyimi kaçırmayın! Kayıt için <a href="yaz_fuar_kayit.php">tıklayın</a>.
                        </p>
                        <h2>İletişim</h2>
                        <p>
                        <p class="card-text">Herhangi bir sorunuz veya geri bildiriminiz mi var? Bizimle iletişime geçmekten çekinmeyin. İletişim sayfamızdan <a href="iletisim.php">bize ulaşın</a>.
                        </p>

                        <p class="card-text"><small class="text-body-secondary">Son güncelleme: 3 dakika önce</small></p>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>
<footer>
    <p>&copy; 2024 Yazılım Fuarı</p>
</footer>
</body>
</html>

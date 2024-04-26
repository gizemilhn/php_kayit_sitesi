<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Otomotiv Fuarı</title>
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
            background-color: #C9BBCF;
        }

        header {
            background-color: #898AA6;
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
            background-color: #898AA6;
            color: #fff;
            text-align: center;
            padding: 10px 0;
        }

        .button {
            display: inline-block;
            padding: 10px 20px;
            background-color: #B7D3DF;
            color: #748DA6;
            text-align: center;
            text-decoration: none;
            font-size: 16px;
            border-radius: 5px;
            transition: background-color 0.3s;
        }

        .button:hover {
            background-color: #9CB4CC;
        }

        .logo {
            width: 100px;
            height: auto;
            margin-right: 20px;
        }

        .card {
            
            margin-bottom: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
            overflow: hidden;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            max-width: 800px; /* Kartın maksimum genişliğini ayarlayalım */
            margin-left: auto; /* Kartı sağa yaslayalım */
            margin-right: auto; /* Kartı sola yaslayalım */
            background-color: #F7E8F0;
        }

        .card img {
            width: 100%; /* Resmi kartın genişliğine göre ayarlayalım */
        }

        .card-body {
            padding: 20px;
            margin: 20px auto; /* Kart içeriğini yatayda ortala ve kenarlarına 20px boşluk bırak */
            
            
        }

        .card-title {
            font-size: 18px; /* Kart başlığının font boyutunu küçültelim */
            margin-bottom: 10px;
        }

        .card-text {
            font-size: 16px; /* Kart metninin font boyutunu küçültelim */
            line-height: 1.6;
            
        }

        .text-body-secondary {
            font-size: 12px; /* Alt metnin font boyutunu küçültelim */
            color: #666;
        }
    </style>
</head>
<body>
<header>
    <img src="images/grsm_logo.png" alt="Girişim Fuarı Logo" class="logo">
    <nav>
        <ul>
            <li><a href="index.php" class="button">Ana Sayfa</a></li>
            <li><a href="grsm_program.php" class="button">Program</a></li>
            <li><a href="grsm_kayit.php" class="button">Kayıt</a></li>
            <li><a href="iletisim.php" class="button">İletişim</a></li>
        </ul>
    </nav>
</header>
    <main>
    
    <section>
        <div class="card" style="background-color: #F7E8F0;">
            <div class="row g-0">
                <div class="col-md-4">
                    <img src="images/grsm_.png" class="img-fluid rounded-start" alt="Girişim FUarı Görseli">
                </div>
                <div class="col-md-8">
                    <div class="card-body">
                    <h2 class="card-title">Hoş Geldiniz Kadın Girişimcilik Fuarı'na!</h2>
            <p class="card-text">

            Kadın girişimcilerin gücünü ve yaratıcılığını kutlamak için bir araya geliyoruz! Kadın Girişimcilik Fuarı, her yıl olduğu gibi bu yıl   da sizi birbirinden ilham verici konuşmalar, interaktif atölyeler, değerli ağ bağlantıları ve daha fazlasıyla buluşturacak.
            <br>Bu yılki fuarımızda, başarılı kadın girişimcilerin öykülerini dinleyecek, sektör liderlerinden ipuçları alacak, yeni iş fırsatları keşfedecek ve kendinizi geliştirmek için önemli araçlar edineceksiniz.

            <br>Etkinlik Tarihleri: 15-17 Mayıs 2024</p>
        
            <h2 class="card-title">Fuar Alanında Neler Var?</h2>
            <p class="card-text"><br>Ana Konuşmacılar: İş dünyasının önde gelen kadın liderleri ve girişimcileriyle ilham verici konuşmalar.
            <br>Paneller ve Tartışmalar: Sektör trendleri, başarı hikayeleri ve güçlü stratejiler hakkında bilgilendirici paneller.
            <br>Atölye Çalışmaları: Uygulamalı atölye çalışmalarıyla becerilerinizi geliştirin ve yeni fikirler keşfedin.
            <br>Networking: Alanında uzman profesyonellerle tanışma ve iş bağlantıları kurma fırsatı.
            <br>Ürün ve Hizmet Fuarı: Kadın girişimcilerin sunduğu ürün ve hizmetleri keşfetme şansı.</p>
        
            <h2 class="card-title">Program</h2>
         <p class="card-text">Fuarımız, çeşitli konferanslar, atölye çalışmaları, panel tartışmaları ve interaktif sergilerle dolu bir program sunmaktadır. Programımızı keşfetmek için lütfen buraya <a href="grsm_program.php">tıklayın</a>.
        <section>
        <h2 class="card-title">Kayıt</h2>
         <p>
         <p class="card-text">Etkinliğimize katılmak için şimdi kayıt olun ve bu heyecan verici deneyimi kaçırmayın! Kayıt için <a href="fuar_kayit.php">tıklayın</a>.
        </p>
        <h2 class="card-title">İletişim</h2>
         <p>
        <p class="card-text">Herhangi bir sorunuz veya geri bildiriminiz mi var? Bizimle iletişime geçmekten çekinmeyin. İletişim sayfamızdan <a href="iletisim.php">bize ulaşın</a>.
         </p>
         <h2 class="card-title">Bizi Takip Edin!</h2>
         <p class="card-text">Etkinlikle ilgili güncel haberleri, konuşmacı duyurularını ve daha fazlasını takip etmek için lütfen sosyal medya hesaplarımızı ziyaret edin:<br>
         Facebook: <a href=".php"> facebook.com/kadingirisimcilikfuarı</a>.<br>
         İnstagram: <a href=".php"> twitter.com/kadingirisimfuarı</a>.<br>
         Twitter: <a href=".php"> instagram.com/kadingirisimcilikfuarı</a>.
         </p>
         <p class="card-text"><small class="text-body-secondary">Son güncelleme: 3 dakika önce</small></p>
    </main>
    <footer>
        <p>&copy; 2024 EXPO KADIN GİRİŞİMCİLİK FUARI</p>
    </footer>
</body>
</html>
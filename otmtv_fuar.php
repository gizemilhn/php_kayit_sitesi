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

        footer {
            background-color: #2B4865;
            color: #fff;
            text-align: center;
            padding: 10px 0;
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

        .card {
            margin-bottom: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
            overflow: hidden;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            max-width: 800px; /* Kartın maksimum genişliğini ayarlayalım */
            margin-left: auto; /* Kartı sağa yaslayalım */
            margin-right: auto; /* Kartı sola yaslayalım */
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
<body style="background-color: #DDDDDD;">

<header>
    <img src="images/otmtv_logo.png" alt="Otomotiv Fuarı Logo" class="logo">
    <nav>
        <ul>
            <li><a href="index.php" class="button">Ana Sayfa</a></li>
            <li><a href="otmtv_program.php" class="button">Program</a></li>
            <li><a href="otomotiv_kayit.php" class="button">Kayıt</a></li>
            <li><a href="iletisim.php" class="button">İletişim</a></li>
        </ul>
    </nav>
</header>
    <main>
    
    <section>
        <div class="card" style="background-color: #fff;">
            <div class="row g-0">
                <div class="col-md-4">
                    <img src="images/otomotiv.png" class="img-fluid rounded-start" alt="Otomotiv Fuarı Görseli">
                </div>
                <div class="col-md-8">
                    <div class="card-body">
                    <h2 class="card-title">Hoş Geldiniz!</h2>
            <p class="card-text">Otomotiv dünyasının heyecan verici atmosferine hoş geldiniz! OTOSAN'24 OTOMOTİV FUARI , sektörün önde gelen markalarını ve en son teknolojilerini bir araya getiriyor. Her yıl binlerce ziyaretçiyi ağırlayan bu etkinlik, geleceğin otomotiv trendlerini keşfetmek ve en yeni araçları görmek için mükemmel bir fırsat sunuyor.</p>
        
            <h2 class="card-title">Katılımcılar</h2>
            <p class="card-text">OTOSAN'24 OTOMOTİV FUARI, dünyanın dört bir yanından önde gelen otomotiv markalarını ve firmalarını bir araya getiriyor. Katılımcılar arasında üreticiler, tasarımcılar, tedarikçiler, teknoloji şirketleri ve daha birçok sektörden profesyonel bulunmaktadır. Bu yılki fuarımızda, sektörün önde gelen isimlerinin yanı sıra yenilikçi ve gelecek vaat eden firmaları da ağırlayacağız.<br>
            <br>Toyota: Japon otomotiv devi, geniş bir araç yelpazesine sahip, hibrit teknolojileriyle de öne çıkıyor.<br>
            <br>BMW Group: Alman lüks otomobil üreticisi, BMW, Mini ve Rolls-Royce gibi markalara sahiptir.<br>
            <br>Volkswagen Group: Alman otomotiv devi, Volkswagen, Audi, Porsche, Bentley, Lamborghini gibi markaları bünyesinde bulundurur.<br>
            <br>Ford Motor Company: Amerikan otomotiv şirketi, Ford markası altında geniş bir model yelpazesine sahiptir.<br>
            <br>General Motors (GM): Amerikan otomotiv devi, Chevrolet, Cadillac, Buick, GMC gibi markaları bünyesinde bulundurur.<br>
            <br>Mercedes-Benz: Alman lüks otomobil üreticisi, genellikle lüks ve yüksek performanslı araçlarıyla tanınır.<br>
            <br>Nissan Motor Corporation: Japon otomotiv şirketi, Nissan ve Infiniti gibi markalara sahiptir.<br>
            <br>Honda Motor Co., Ltd.: Japon otomotiv şirketi, Honda ve Acura markalarıyla bilinir, özellikle dayanıklılık ve yakıt verimliliği konusunda önemli bir konuma sahiptir.</p>
        
            <h2 class="card-title">Program</h2>
         <p class="card-text">"OTOSAN'24 OTOMOTİV FUARI, çeşitli konferanslar, atölye çalışmaları, panel tartışmaları ve interaktif sergilerle dolu bir program sunmaktadır. Programımızı keşfetmek için lütfen buraya <a href="otmtv_program.php">tıklayın</a>.
        <section>
        <h2 class="card-title">Kayıt</h2>
         <p>
         <p class="card-text">Etkinliğimize katılmak için şimdi kayıt olun ve bu heyecan verici deneyimi kaçırmayın! Kayıt için <a href="fuar_kayit.php">tıklayın</a>.
        </p>
        <h2 class="card-title">İletişim</h2>
         <p>
        <p class="card-text">Herhangi bir sorunuz veya geri bildiriminiz mi var? Bizimle iletişime geçmekten çekinmeyin. İletişim sayfamızdan <a href="iletisim.php">bize ulaşın</a>.
         </p>
         <p class="card-text"><small class="text-body-secondary">Son güncelleme: 3 dakika önce</small></p>
    </main>
    <footer>
        <p>&copy; 2024 OTOSAN'24 Otomotiv Fuarı</p>
    </footer>
</body>
</html>

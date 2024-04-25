<!DOCTYPE html>
<html lang="tr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Etkinlik Programı</title>
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
        .card {
        background-color: #fff;
        border-radius: 10px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        padding: 20px;
        margin: 20px;
        }

    
        footer {
            background-color: #191970;
            color: #fff;
            text-align: center;
            padding: 10px 0;
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
    h2 {
      text-align: center;
      margin-top: 20px;
      margin-right:20px;
    }
    table {
      width: 100%;
      border-collapse: collapse;
      margin-top: 20px;
    }
    th, td {
      border: 1px solid #dddddd;
      text-align: left;
      padding: 12px;
    }
    th {
      background-color: #f2f2f2;
      font-weight: bold;
    }
    tr:nth-child(even) {
      background-color: #f2f2f2;
    }
    @media screen and (max-width: 600px) {
      table {
        border: 0;
      }
      th, td {
        border: none;
        display: block;
      }
      th {
        background-color: transparent;
      }
      td {
        border-bottom: 1px solid #dddddd;
        padding-left: 40%;
        padding-top: 8px;
        padding-bottom: 8px;
      }
    }
  </style>
</head>
<body><header>
    <img src="images/yzlm_logo.png" alt="Yazılım Fuarı Logo" class="logo">
    <h2>Etkinlik Programı</h2>
    <nav>
        <ul>
            <li><a href="yzlm_fuar.php" class="button">Ana Sayfa</a></li>
            <li><a href="yazlm_program.php" class="button">Program</a></li>
            <li><a href="fuar_kayit.php" class="button">Kayıt</a></li>
            <li><a href="iletisim.php" class="button">İletişim</a></li>
        </ul>
    </nav>
</header>

<div class="card">

<table>
  <tr>
    <th>Saat</th>
    <th>Konu</th>
    <th>Konuşmacı</th>
  </tr>
  <?php
    $program = array(
      array("10:00 - 10:45", "Makine Öğrenmesi", "Ahmet Yılmaz"),
      array("10:45 - 11:00", "Mola", ""),
      array("11:00 - 11:45", "Otomobil Sporlarında Teknoloji Kullanımı", "Eren Üçlertoprağı"),
      array("12:00 - 13:00", "Öğle Arası", ""),
      array("13:00 - 13:45", "Türkiye'nin Kablo İhracatına Genel Bakış", "Ayşe Üçler"),
      array("13:45 - 14:00", "Ara", ""),
      array("14:00 - 14:45", "Robotlar ve Uygulamalar", "Semih Gümüş"),
      array("14:45 - 15:00", "Ara", ""),
      array("15:00 - 15:45", "Sosyal Konuk", "Serhan Acar")
    );

    foreach ($program as $etkinlik) {
      echo "<tr>";
      foreach ($etkinlik as $bilgi) {
        echo "<td>" . $bilgi . "</td>";
      }
      echo "</tr>";
    }
  ?>
</table>
</div>

</body>
</html>
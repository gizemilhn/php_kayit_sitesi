<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Girişim Program</title>
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
            background-color: #F7E8F0;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            padding: 20px;
            margin: 20px;
            
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
<body>
<header>
    <img src="images/grsm_logo.png" alt="Girişim Fuarı Logo" class="logo">
    <h2>Etkinlik Programı</h2>
    <nav>
        <ul>
            <li><a href="grsm_fuar.php" class="button">Ana Sayfa</a></li>
            <li><a href="grsm_program.php" class="button">Program</a></li>
            <li><a href="grsm_kayit.php" class="button">Kayıt</a></li>
            <li><a href="iletisim.php" class="button">İletişim</a></li>
        </ul>
    </nav>
</header>
    <main>
    <div class="card">

<table>
  <tr>
    <th>Saat</th>
    <th>Konu</th>
    <th>Konuşmacı</th>
  </tr>
  <?php
    $program = array(
      array("10:00 - 10:45", "İş hayatında kadın olmak", "Elis Yılmaz
      "),
      array("10:45 - 11:00", "Mola", ""),
      array("11:00 - 11:45", "Kadın girişimci olmak", "Eylül Sezen
      "),
      array("11:45 - 13:00", "Öğle Arası", ""),
      array("13:00 - 13:45", "Girişimcilik hikayem", "Aslı Uzun"),
      array("13:45 - 14:00", "Ara", ""),
      array("14:00 - 14:45", "Kadınların iş hayatındaki yeri ", "Didem Aksak
      "),
      array("14:45 - 15:00", "Ara", ""),
      array("15:00 - 15:45", "Sosyal Konuk", "Ümmiye Koçak")
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
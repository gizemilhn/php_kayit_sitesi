-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Anamakine: 127.0.0.1
-- Üretim Zamanı: 05 May 2024, 19:09:01
-- Sunucu sürümü: 10.4.32-MariaDB
-- PHP Sürümü: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Veritabanı: `fuar_alani`
--
CREATE DATABASE IF NOT EXISTS `fuar_alani` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `fuar_alani`;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `basvurular`
--

CREATE TABLE IF NOT EXISTS `basvurular` (
  `Basvuru_ID` int(11) NOT NULL AUTO_INCREMENT,
  `basvuru_tarihi` date NOT NULL,
  `Katilimci_ID` int(11) NOT NULL,
  PRIMARY KEY (`Basvuru_ID`),
  KEY `fk_basvurular_kullanicilar` (`Katilimci_ID`),
  KEY `idx_basvuru_tarihi` (`basvuru_tarihi`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Tablo döküm verisi `basvurular`
--

INSERT INTO `basvurular` (`Basvuru_ID`, `basvuru_tarihi`, `Katilimci_ID`) VALUES
(1, '2024-05-10', 1),
(2, '2024-05-18', 2),
(3, '2024-05-30', 3);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `etkinlikler`
--

CREATE TABLE IF NOT EXISTS `etkinlikler` (
  `Etkinlik_ID` int(11) NOT NULL AUTO_INCREMENT,
  `etkinlik_zamani` datetime NOT NULL,
  `Katilimci_ID` int(11) NOT NULL,
  PRIMARY KEY (`Etkinlik_ID`),
  KEY `fk_etkinlikler_kullanicilar` (`Katilimci_ID`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Tablo döküm verisi `etkinlikler`
--

INSERT INTO `etkinlikler` (`Etkinlik_ID`, `etkinlik_zamani`, `Katilimci_ID`) VALUES
(1, '2024-05-15 10:00:00', 1),
(2, '2024-05-20 14:00:00', 2),
(3, '2024-06-01 09:30:00', 3);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `girisler`
--

CREATE TABLE IF NOT EXISTS `girisler` (
  `Giris_ID` int(11) NOT NULL AUTO_INCREMENT,
  `giris_zamani` datetime DEFAULT current_timestamp(),
  `qr_code` varchar(255) NOT NULL,
  `Katilimci_ID` int(11) NOT NULL,
  PRIMARY KEY (`Giris_ID`),
  KEY `fk_girisler_kullanicilar` (`Katilimci_ID`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Tablo döküm verisi `girisler`
--

INSERT INTO `girisler` (`Giris_ID`, `giris_zamani`, `qr_code`, `Katilimci_ID`) VALUES
(1, '2024-05-15 09:55:00', '', 1),
(2, '2024-05-20 13:55:00', '', 2),
(3, '2024-06-01 09:25:00', '', 3);

--
-- Tetikleyiciler `girisler`
--
DELIMITER $$
CREATE TRIGGER `before_giris_insert` BEFORE INSERT ON `girisler` FOR EACH ROW BEGIN
    IF NEW.qr_code = '' THEN
        SET NEW.qr_code = CONCAT('QR_', NEW.Katilimci_ID);
    END IF;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `kullanicilar`
--

CREATE TABLE IF NOT EXISTS `kullanicilar` (
  `Katilimci_ID` int(11) NOT NULL AUTO_INCREMENT,
  `ad` varchar(255) NOT NULL,
  `soyad` varchar(255) NOT NULL,
  `email` varchar(50) NOT NULL,
  `katilimci_turu` varchar(50) NOT NULL,
  `qr_code` varchar(100) NOT NULL,
  `etkinlik_adi` varchar(25) NOT NULL,
  PRIMARY KEY (`Katilimci_ID`),
  KEY `idx_kullanici_id` (`Katilimci_ID`)
) ENGINE=InnoDB AUTO_INCREMENT=34 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Tablo döküm verisi `kullanicilar`
--

INSERT INTO `kullanicilar` (`Katilimci_ID`, `ad`, `soyad`, `email`, `katilimci_turu`, `qr_code`, `etkinlik_adi`) VALUES
(1, 'Ahmet', 'Yılmaz', 'ahmet@example.com', '', '', ''),
(2, 'Ayşe', 'Kara', 'ayse@example.com', '', '', ''),
(3, 'Mehmet', 'Demir', 'mehmet@example.com', '', '', ''),
(27, 'test', 'ilhan', 'denzz.drn@gmail.com', 'Görevli', 'qr_code_6637b291be3fb.png', 'EXPO'),
(28, '', '', '', '', 'qr_code_6637b29e28ea1.png', 'EXPO'),
(29, '', '', '', '', 'qr_code_6637b2d2251a6.png', 'EXPO'),
(30, '', '', '', '', 'qr_code_6637b2d3472da.png', 'EXPO'),
(31, '', '', '', '', 'qr_code_6637b2d405954.png', 'EXPO'),
(32, 'gizem', 'ilhan', 'ilhangiz3m@gmail.com', 'Görevli', 'qr_code_6637b2ece9f4d.png', 'EXPO'),
(33, 'Ahmet Tahsin', '', 'ahmetahsinsoylemez@gmail.com', 'Ziyaretçi', 'qr_code_6637bc926fbe8.png', 'EXPO');

--
-- Tetikleyiciler `kullanicilar`
--
DELIMITER $$
CREATE TRIGGER `after_kullanici_password_update` AFTER UPDATE ON `kullanicilar` FOR EACH ROW BEGIN
    -- Eğer güncelleme işlemi parola alanını etkiliyorsa
    IF OLD.password <> NEW.password THEN
        -- Parola güncellendiğinde bir log kaydı oluştur
        INSERT INTO password_change_log (Katilimci_ID, old_password, new_password, change_time)
        VALUES (NEW.Katilimci_ID, OLD.password, NEW.password, NOW());
    END IF;
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `after_kullanici_update` AFTER UPDATE ON `kullanicilar` FOR EACH ROW BEGIN
    -- Kullanıcı bilgilerinin güncellenmesi durumunda,
    -- girisler tablosundaki ilgili kayıtların güncellenmesi
    UPDATE girisler
    SET qr_code = CONCAT('updated_', NEW.qr_code)
    WHERE Katilimci_ID = NEW.Katilimci_ID;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `standlar`
--

CREATE TABLE IF NOT EXISTS `standlar` (
  `stand_ID` int(11) NOT NULL AUTO_INCREMENT,
  `stand_adi` varchar(255) NOT NULL,
  `Etkinlik_ID` int(11) NOT NULL,
  PRIMARY KEY (`stand_ID`),
  KEY `fk_standlar_etkinlikler` (`Etkinlik_ID`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Tablo döküm verisi `standlar`
--

INSERT INTO `standlar` (`stand_ID`, `stand_adi`, `Etkinlik_ID`) VALUES
(1, 'Stant A', 1),
(2, 'Stant B', 1),
(3, 'Stant C', 2);

--
-- Dökümü yapılmış tablolar için kısıtlamalar
--

--
-- Tablo kısıtlamaları `basvurular`
--
ALTER TABLE `basvurular`
  ADD CONSTRAINT `fk_basvurular_kullanicilar` FOREIGN KEY (`Katilimci_ID`) REFERENCES `kullanicilar` (`Katilimci_ID`);

--
-- Tablo kısıtlamaları `etkinlikler`
--
ALTER TABLE `etkinlikler`
  ADD CONSTRAINT `fk_etkinlikler_kullanicilar` FOREIGN KEY (`Katilimci_ID`) REFERENCES `kullanicilar` (`Katilimci_ID`);

--
-- Tablo kısıtlamaları `girisler`
--
ALTER TABLE `girisler`
  ADD CONSTRAINT `fk_girisler_kullanicilar` FOREIGN KEY (`Katilimci_ID`) REFERENCES `kullanicilar` (`Katilimci_ID`);

--
-- Tablo kısıtlamaları `standlar`
--
ALTER TABLE `standlar`
  ADD CONSTRAINT `fk_standlar_etkinlikler` FOREIGN KEY (`Etkinlik_ID`) REFERENCES `etkinlikler` (`Etkinlik_ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

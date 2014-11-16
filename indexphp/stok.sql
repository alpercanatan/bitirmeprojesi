-- phpMyAdmin SQL Dump
-- version 4.1.13
-- http://www.phpmyadmin.net
--
-- Anamakine: localhost
-- Üretim Zamanı: 13 May 2014, 12:42:04
-- Sunucu sürümü: 5.5.35-0ubuntu0.12.04.2
-- PHP Sürümü: 5.3.10-1ubuntu3.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Veritabanı: `stok`
--

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `firmalar`
--

CREATE TABLE IF NOT EXISTS `firmalar` (
  `ID` int(6) NOT NULL AUTO_INCREMENT,
  `firmaadi` varchar(20) COLLATE utf8_turkish_ci NOT NULL,
  `firmatel` varchar(20) COLLATE utf8_turkish_ci NOT NULL,
  `firmaadres` varchar(20) COLLATE utf8_turkish_ci NOT NULL,
  `firmayetkili` varchar(20) COLLATE utf8_turkish_ci NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci AUTO_INCREMENT=21 ;

--
-- Tablo döküm verisi `firmalar`
--

INSERT INTO `firmalar` (`ID`, `firmaadi`, `firmatel`, `firmaadres`, `firmayetkili`) VALUES
(3, 'casper', '02122558899', 'ümraniye', 'şakir şek'),
(4, 'şek tic', '04762270000', 'ptt yanı', 'osman şek'),
(5, 'bilmer', '05888465887', 'selcuk uni', 'selçuklular'),
(6, 'ev yapı tesisat', '05236987889', 'konya bosna hersek', 'mert veysel gökçen'),
(18, 'asd', '455', 'Af', 'add'),
(19, 'r', 'y', 'f', 'v'),
(20, 'd', 'g', 'g', 'f');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `kullanicilar`
--

CREATE TABLE IF NOT EXISTS `kullanicilar` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `kullanici` varchar(10) COLLATE utf8_turkish_ci NOT NULL,
  `sifre` varchar(10) COLLATE utf8_turkish_ci NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci AUTO_INCREMENT=2 ;

--
-- Tablo döküm verisi `kullanicilar`
--

INSERT INTO `kullanicilar` (`ID`, `kullanici`, `sifre`) VALUES
(1, 'sakir', '1234');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `teklifler`
--

CREATE TABLE IF NOT EXISTS `teklifler` (
  `ID` int(6) NOT NULL AUTO_INCREMENT,
  `OTarihi` date NOT NULL,
  `DTarihi` date DEFAULT NULL,
  `Durum` int(1) NOT NULL,
  `Olusturan` varchar(20) COLLATE utf8_turkish_ci NOT NULL,
  `Icerik` varchar(200) COLLATE utf8_turkish_ci NOT NULL,
  `Firma` varchar(20) COLLATE utf8_turkish_ci NOT NULL,
  `Tutar` int(10) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci AUTO_INCREMENT=5 ;

--
-- Tablo döküm verisi `teklifler`
--

INSERT INTO `teklifler` (`ID`, `OTarihi`, `DTarihi`, `Durum`, `Olusturan`, `Icerik`, `Firma`, `Tutar`) VALUES
(1, '2014-05-08', '2014-05-09', 1, 'sakir', 'at,avrat,araba,kuş', 'casper', 2500),
(3, '2014-05-10', NULL, 0, 'sakir', 'sdasd', 'casper', 50000),
(4, '2014-05-02', NULL, 0, 'sakir', 'sadasdd', 'casper', 1000);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `urunler`
--

CREATE TABLE IF NOT EXISTS `urunler` (
  `ID` int(20) NOT NULL AUTO_INCREMENT,
  `UrunKod` varchar(20) COLLATE utf8_turkish_ci NOT NULL,
  `BirimFiyat` int(10) NOT NULL,
  `Tarih` date DEFAULT NULL,
  `UrunAdi` varchar(20) COLLATE utf8_turkish_ci NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci AUTO_INCREMENT=4 ;

--
-- Tablo döküm verisi `urunler`
--

INSERT INTO `urunler` (`ID`, `UrunKod`, `BirimFiyat`, `Tarih`, `UrunAdi`) VALUES
(1, '12', 200, NULL, 'broşür'),
(2, '10', 500, NULL, 'lamba'),
(3, '11', 350, NULL, 'saat');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

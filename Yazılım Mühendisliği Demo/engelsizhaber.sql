-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Anamakine: localhost
-- Üretim Zamanı: 09 Haz 2021, 19:03:06
-- Sunucu sürümü: 10.4.19-MariaDB
-- PHP Sürümü: 8.0.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Veritabanı: `engelsizhaber`
--

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `Ayarlar`
--

CREATE TABLE `Ayarlar` (
  `id` int(11) UNSIGNED NOT NULL,
  `SiteAdi` varchar(155) NOT NULL,
  `SiteTittle` varchar(155) NOT NULL,
  `SiteDescription` text NOT NULL,
  `SiteKeywords` text NOT NULL,
  `SiteLogosu` varchar(155) NOT NULL,
  `SiteMailAdresi` varchar(255) NOT NULL,
  `HostAdresi` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Tablo döküm verisi `Ayarlar`
--

INSERT INTO `Ayarlar` (`id`, `SiteAdi`, `SiteTittle`, `SiteDescription`, `SiteKeywords`, `SiteLogosu`, `SiteMailAdresi`, `HostAdresi`) VALUES
(1, 'Engelsiz Haber Sitesi', 'Herkes için Haber', 'Isitme Engelli Vatandaşlarımız için Rahatlıkla Takip Edilebilecek Haber Portalı', 'Isitme Engeli , Haber , Altyazı , İşaret Dili', 'Logo.png', 'EngelsizHaberSitesi@gmail.com', 'https://www.engelsizhaber.com.tr');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `Begeniler`
--

CREATE TABLE `Begeniler` (
  `id` int(11) UNSIGNED NOT NULL,
  `UyeID` int(11) UNSIGNED NOT NULL,
  `KanalID` int(11) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Tablo döküm verisi `Begeniler`
--

INSERT INTO `Begeniler` (`id`, `UyeID`, `KanalID`) VALUES
(1, 2, 1),
(2, 2, 2),
(3, 7, 1);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `BegenilerGazete`
--

CREATE TABLE `BegenilerGazete` (
  `id` int(11) UNSIGNED NOT NULL,
  `UyeID` int(11) UNSIGNED NOT NULL,
  `GazeteID` int(11) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Tablo döküm verisi `BegenilerGazete`
--

INSERT INTO `BegenilerGazete` (`id`, `UyeID`, `GazeteID`) VALUES
(1, 2, 8),
(2, 2, 2),
(3, 2, 7),
(4, 2, 1),
(5, 8, 8);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `BegenilerHaber`
--

CREATE TABLE `BegenilerHaber` (
  `id` int(11) UNSIGNED NOT NULL,
  `HaberID` int(11) UNSIGNED NOT NULL,
  `UyeID` int(11) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Tablo döküm verisi `BegenilerHaber`
--

INSERT INTO `BegenilerHaber` (`id`, `HaberID`, `UyeID`) VALUES
(1, 1, 2),
(2, 2, 2),
(3, 3, 2),
(4, 4, 2),
(5, 5, 2),
(6, 6, 2),
(7, 8, 2),
(8, 7, 2),
(9, 7, 7),
(10, 3, 7);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `Favoriler`
--

CREATE TABLE `Favoriler` (
  `id` int(11) UNSIGNED NOT NULL,
  `UyeID` int(11) UNSIGNED NOT NULL,
  `KanalID` int(11) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Tablo döküm verisi `Favoriler`
--

INSERT INTO `Favoriler` (`id`, `UyeID`, `KanalID`) VALUES
(1, 2, 1),
(2, 2, 2),
(3, 1, 2),
(4, 7, 1);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `Gazeteler`
--

CREATE TABLE `Gazeteler` (
  `id` int(11) UNSIGNED NOT NULL,
  `GazeteAdi` varchar(200) NOT NULL,
  `GazeteLogo` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Tablo döküm verisi `Gazeteler`
--

INSERT INTO `Gazeteler` (`id`, `GazeteAdi`, `GazeteLogo`) VALUES
(1, 'Sabah', 'SabahNewsLogo.png'),
(2, 'Takvim', 'TakvimNewsLogo.png'),
(3, 'Hürriyet', 'HurriyetNewsLogo.png'),
(4, 'Posta', 'PostaNewsLogo.png'),
(5, 'Sözcü', 'SozcuNewsLogo.png'),
(6, 'Bugün', 'BugunNewsLogo.png'),
(7, 'Haber türk', 'HaberTurkNewsLogo.png'),
(8, 'Milliyet', 'MilliyetNewsLogo.png');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `Haberler`
--

CREATE TABLE `Haberler` (
  `id` int(11) UNSIGNED NOT NULL,
  `GazeteID` int(11) NOT NULL,
  `IcerikTuruID` int(11) UNSIGNED NOT NULL,
  `BegeniSayisi` int(11) NOT NULL,
  `Goruntuleme` int(11) NOT NULL,
  `EklenmeTarihi` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Tablo döküm verisi `Haberler`
--

INSERT INTO `Haberler` (`id`, `GazeteID`, `IcerikTuruID`, `BegeniSayisi`, `Goruntuleme`, `EklenmeTarihi`) VALUES
(1, 1, 1, 2, 2, '2021-05-15'),
(2, 1, 2, 2, 1, '2021-05-21'),
(3, 2, 3, 2, 10, '2021-05-22'),
(4, 3, 4, 1, 4, '2021-05-24'),
(5, 7, 5, 1, 2, '2021-05-28'),
(6, 8, 1, 1, 18, '2021-05-28'),
(7, 1, 2, 4, 2, '2021-06-15'),
(8, 1, 2, 3, 26, '2021-06-28');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `IcerikTurleri`
--

CREATE TABLE `IcerikTurleri` (
  `id` int(11) UNSIGNED NOT NULL,
  `Icerik` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Tablo döküm verisi `IcerikTurleri`
--

INSERT INTO `IcerikTurleri` (`id`, `Icerik`) VALUES
(1, 'Spor'),
(2, 'Magazin'),
(3, 'Siyaset'),
(4, 'Gundem'),
(5, 'Bulmaca');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `IsIlanlari`
--

CREATE TABLE `IsIlanlari` (
  `id` int(11) UNSIGNED NOT NULL,
  `AdSoyad` varchar(255) NOT NULL,
  `EMail` varchar(255) NOT NULL,
  `IsIlani` varchar(150) NOT NULL,
  `Yas` int(2) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `Kanallar`
--

CREATE TABLE `Kanallar` (
  `id` int(10) UNSIGNED NOT NULL,
  `KanalAdi` varchar(200) NOT NULL,
  `KanalLogo` varchar(255) NOT NULL,
  `BegeniSayisi` int(11) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Tablo döküm verisi `Kanallar`
--

INSERT INTO `Kanallar` (`id`, `KanalAdi`, `KanalLogo`, `BegeniSayisi`) VALUES
(1, 'ATV', 'ATVLogo.png', 2),
(2, 'KanalD', 'KanalDLogo.png', 1),
(3, 'Show TV', 'ShowTVLogo.png', 0),
(4, 'Star TV', 'StarTVLogo.png', 0),
(5, 'FOX', 'FoxTVLogo.png', 0),
(6, 'TV 8', 'TV8Logo.png', 0),
(7, 'Discovery', 'DiscoveryLogo.png', 0),
(8, 'BEIN Media', 'BeinLogo.png', 0),
(9, 'Beyaz TV', 'BeyazTVLogo.png', 0),
(10, 'Cartoon Network', 'CNTVLogo.png', 0),
(11, 'Pamukkale TV', 'PamukkaleTVLogo.png', 0),
(12, 'FB TV', 'FBTVLogo.png', 0);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `members`
--

CREATE TABLE `members` (
  `id` int(11) UNSIGNED NOT NULL,
  `Username` varchar(255) NOT NULL,
  `Sifre` varchar(255) NOT NULL,
  `EMailAdresi` varchar(255) NOT NULL,
  `Cinsiyet` char(5) NOT NULL,
  `SecurityQuestion` varchar(255) NOT NULL,
  `SecurityAnswer` varchar(255) NOT NULL,
  `MemberState` int(1) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Tablo döküm verisi `members`
--

INSERT INTO `members` (`id`, `Username`, `Sifre`, `EMailAdresi`, `Cinsiyet`, `SecurityQuestion`, `SecurityAnswer`, `MemberState`) VALUES
(1, 'hkacar', 'd93a5def7511da3d0f2d171d9c344e91', 'info@hkpau.com', 'Erkek', '1', 'f79feca1051bef3a93057e85a8726ea5', 1),
(2, 'hkpau', 'b714337aa8007c433329ef43c7b8252c', 'info2@hkpau.com', 'Erkek', '5', 'e83295a97801d9aaff5271b457acd3e1', 1),
(7, 'hasan', 'd93a5def7511da3d0f2d171d9c344e91', 'hasan@gmail.com', 'Erkek', '4', '46cda2a9d65819866d1a58a4915370ef', 1),
(8, 'hasann', 'd93a5def7511da3d0f2d171d9c344e91', 'hasann@gmail.com', 'Erkek', '5', 'e83295a97801d9aaff5271b457acd3e1', 1);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `SecQues`
--

CREATE TABLE `SecQues` (
  `id` int(10) UNSIGNED NOT NULL,
  `Soru` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Tablo döküm verisi `SecQues`
--

INSERT INTO `SecQues` (`id`, `Soru`) VALUES
(1, 'Futbol Takımınız'),
(2, 'Anne Kızlık Soyadı'),
(3, 'Babanızın Mesleği'),
(4, 'İlk Evcil Hayvanınızın Adı'),
(5, 'Liseyi Okuduğunuz İl');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `sorular`
--

CREATE TABLE `sorular` (
  `id` int(11) UNSIGNED NOT NULL,
  `soru` text NOT NULL,
  `cevap` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Tablo döküm verisi `sorular`
--

INSERT INTO `sorular` (`id`, `soru`, `cevap`) VALUES
(1, 'Üye Olmadan Sitenize Katılabilme İmkanımız Var mı ?', 'Maalesef Sitemize Üye Olmadan Kanallara veya Gazetelere Erişmeniz Mümkün Değil.');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `Videolar`
--

CREATE TABLE `Videolar` (
  `id` int(11) UNSIGNED NOT NULL,
  `KanalID` int(11) UNSIGNED NOT NULL,
  `Goruntuleme` int(11) UNSIGNED NOT NULL,
  `YayınTuru` int(1) UNSIGNED NOT NULL,
  `EklenmeTarihi` date NOT NULL,
  `Baslangic` time NOT NULL,
  `Bitis` time NOT NULL,
  `VideoIcerigi` varchar(255) NOT NULL,
  `VideoLogo` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Tablo döküm verisi `Videolar`
--

INSERT INTO `Videolar` (`id`, `KanalID`, `Goruntuleme`, `YayınTuru`, `EklenmeTarihi`, `Baslangic`, `Bitis`, `VideoIcerigi`, `VideoLogo`) VALUES
(1, 1, 0, 1, '2021-05-28', '19:00:00', '20:00:00', 'Video1.mp4', ''),
(2, 1, 0, 0, '2021-05-21', '00:00:00', '00:00:00', 'Video1.mp4', 'ATVAnaHaberlogo.png'),
(3, 1, 0, 0, '2021-05-10', '00:00:00', '00:00:00', 'Video1.mp4', 'ATVAnaHaberlogo.png'),
(4, 1, 0, 0, '2021-05-17', '00:00:00', '00:00:00', 'Video1.mp4', 'ATVAnaHaberlogo.png'),
(5, 1, 0, 0, '2021-05-04', '00:00:00', '00:00:00', 'Video1.mp4', 'ATVAnaHaberlogo.png'),
(6, 1, 0, 0, '2021-05-05', '00:00:00', '00:00:00', 'Video1.mp4', 'ATVAnaHaberlogo.png'),
(7, 1, 0, 0, '2021-05-24', '00:00:00', '00:00:00', 'Video1.mp4', 'ATVAnaHaberlogo.png'),
(8, 2, 0, 1, '2021-05-30', '19:00:00', '20:00:00', 'Video1.mp4', 'KanalDAnaHaberLogo.png'),
(9, 2, 0, 0, '2021-05-11', '00:00:00', '00:00:00', 'Video1.mp4', 'KanalDAnaHaberLogo.png'),
(10, 1, 0, 0, '2021-05-02', '00:00:00', '00:00:00', 'Video1.mp4', 'ATVAnaHaberlogo.png');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `Yoneticiler`
--

CREATE TABLE `Yoneticiler` (
  `id` int(11) UNSIGNED NOT NULL,
  `YoneticiAdi` varchar(155) NOT NULL,
  `YoneticiSoyadi` varchar(155) NOT NULL,
  `EMail` varchar(255) NOT NULL,
  `Sifre` varchar(255) NOT NULL,
  `State` int(1) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Tablo döküm verisi `Yoneticiler`
--

INSERT INTO `Yoneticiler` (`id`, `YoneticiAdi`, `YoneticiSoyadi`, `EMail`, `Sifre`, `State`) VALUES
(1, 'Hasan', 'Kacar', 'info@hkpau.com', '00f4ca7a99086a5547236009ed61842a', 1),
(2, 'ahmet', 'amca', 'ahmet@gmail.com', '700c8b805a3e2a265b01c77614cd8b21', 1);

--
-- Dökümü yapılmış tablolar için indeksler
--

--
-- Tablo için indeksler `Ayarlar`
--
ALTER TABLE `Ayarlar`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `Begeniler`
--
ALTER TABLE `Begeniler`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `BegenilerGazete`
--
ALTER TABLE `BegenilerGazete`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `BegenilerHaber`
--
ALTER TABLE `BegenilerHaber`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `Favoriler`
--
ALTER TABLE `Favoriler`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `Gazeteler`
--
ALTER TABLE `Gazeteler`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `Haberler`
--
ALTER TABLE `Haberler`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `IcerikTurleri`
--
ALTER TABLE `IcerikTurleri`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `IsIlanlari`
--
ALTER TABLE `IsIlanlari`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `Kanallar`
--
ALTER TABLE `Kanallar`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `members`
--
ALTER TABLE `members`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `SecQues`
--
ALTER TABLE `SecQues`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `sorular`
--
ALTER TABLE `sorular`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `Videolar`
--
ALTER TABLE `Videolar`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `Yoneticiler`
--
ALTER TABLE `Yoneticiler`
  ADD PRIMARY KEY (`id`);

--
-- Dökümü yapılmış tablolar için AUTO_INCREMENT değeri
--

--
-- Tablo için AUTO_INCREMENT değeri `Ayarlar`
--
ALTER TABLE `Ayarlar`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Tablo için AUTO_INCREMENT değeri `Begeniler`
--
ALTER TABLE `Begeniler`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Tablo için AUTO_INCREMENT değeri `BegenilerGazete`
--
ALTER TABLE `BegenilerGazete`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Tablo için AUTO_INCREMENT değeri `BegenilerHaber`
--
ALTER TABLE `BegenilerHaber`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Tablo için AUTO_INCREMENT değeri `Favoriler`
--
ALTER TABLE `Favoriler`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Tablo için AUTO_INCREMENT değeri `Gazeteler`
--
ALTER TABLE `Gazeteler`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Tablo için AUTO_INCREMENT değeri `Haberler`
--
ALTER TABLE `Haberler`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Tablo için AUTO_INCREMENT değeri `IcerikTurleri`
--
ALTER TABLE `IcerikTurleri`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Tablo için AUTO_INCREMENT değeri `IsIlanlari`
--
ALTER TABLE `IsIlanlari`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Tablo için AUTO_INCREMENT değeri `Kanallar`
--
ALTER TABLE `Kanallar`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- Tablo için AUTO_INCREMENT değeri `members`
--
ALTER TABLE `members`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Tablo için AUTO_INCREMENT değeri `SecQues`
--
ALTER TABLE `SecQues`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Tablo için AUTO_INCREMENT değeri `sorular`
--
ALTER TABLE `sorular`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Tablo için AUTO_INCREMENT değeri `Videolar`
--
ALTER TABLE `Videolar`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Tablo için AUTO_INCREMENT değeri `Yoneticiler`
--
ALTER TABLE `Yoneticiler`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

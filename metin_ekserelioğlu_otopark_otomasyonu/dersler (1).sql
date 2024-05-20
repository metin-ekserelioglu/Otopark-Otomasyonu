-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Anamakine: 127.0.0.1
-- Üretim Zamanı: 15 May 2023, 02:24:51
-- Sunucu sürümü: 10.4.28-MariaDB
-- PHP Sürümü: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Veritabanı: `dersler`
--

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `abonelik`
--

CREATE TABLE `abonelik` (
  `abone_id` int(11) NOT NULL,
  `abone_ad` text NOT NULL,
  `abone_soyad` text NOT NULL,
  `abone_tel` int(11) NOT NULL,
  `abone_plaka` varchar(11) NOT NULL,
  `abone_marka` varchar(15) NOT NULL,
  `abone_renk` text NOT NULL,
  `abone_tur` text NOT NULL,
  `abone_ucret` int(10) NOT NULL,
  `abone_kat` int(25) NOT NULL,
  `abone_blok` varchar(22) NOT NULL,
  `abone_alan` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `abonelik`
--

INSERT INTO `abonelik` (`abone_id`, `abone_ad`, `abone_soyad`, `abone_tel`, `abone_plaka`, `abone_marka`, `abone_renk`, `abone_tur`, `abone_ucret`, `abone_kat`, `abone_blok`, `abone_alan`) VALUES

(15, 'metin', 'eksereli', 2147483647, '34 drz 345', 'fiat', 'Kırmızı', 'otomobil', 300, 0, '', '');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `admingiris`
--

CREATE TABLE `admingiris` (
  `kullanici_id` int(11) NOT NULL,
  `kullanici_mail` varchar(55) NOT NULL,
  `kullanici_sifre` varchar(55) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_turkish_ci;

--
-- Tablo döküm verisi `admingiris`
--

INSERT INTO `admingiris` (`kullanici_id`, `kullanici_mail`, `kullanici_sifre`) VALUES

(4, 'admin@gmail.com', '123456');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `arac_kayit`
--

CREATE TABLE `arac_kayit` (
  `arac_id` int(11) NOT NULL,
  `arac_sahip` varchar(50) NOT NULL,
  `arac_plaka` varchar(15) NOT NULL,
  `arac_marka` varchar(30) NOT NULL,
  `arac_renk` varchar(30) NOT NULL,
  `arac_tur` varchar(30) NOT NULL,
  `arac_kat` varchar(15) NOT NULL,
  `arac_blok` varchar(15) NOT NULL,
  `arac_alan` varchar(100) NOT NULL,
  `arac_giris_tarih` datetime NOT NULL DEFAULT current_timestamp(),
  `arac_cikis_tarih` varchar(55) NOT NULL,
  `ucret` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_turkish_ci;

--
-- Tablo döküm verisi `arac_kayit`
--

INSERT INTO `arac_kayit` (`arac_id`, `arac_sahip`, `arac_plaka`, `arac_marka`, `arac_renk`, `arac_tur`, `arac_kat`, `arac_blok`, `arac_alan`, `arac_giris_tarih`, `arac_cikis_tarih`, `ucret`) VALUES

(113, 'metin', '35 aee 472', 'audi', 'kırmızı', 'otomobil', '2', 'c', '11', '2023-05-14 02:07:27', '14-05-2023 02:07:31', 22);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL,
  `rate` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `otopark_alan`
--

CREATE TABLE `otopark_alan` (
  `id` int(11) NOT NULL,
  `otopark_alan` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `otopark_alan`
--

INSERT INTO `otopark_alan` (`id`, `otopark_alan`) VALUES
(2, '1'),
(3, '2'),
(4, '3'),
(5, '4'),
(6, '5'),
(7, '6'),
(8, '7'),
(9, '8'),
(10, '9'),
(11, '10'),
(12, '11');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `otopark_bilgi`
--

CREATE TABLE `otopark_bilgi` (
  `id` int(11) NOT NULL,
  `otopark_kat` int(11) NOT NULL,
  `otopark_blok` varchar(55) NOT NULL,
  `otopark_alan` int(11) NOT NULL,
  `durum` varchar(23) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `otopark_bilgi`
--

INSERT INTO `otopark_bilgi` (`id`, `otopark_kat`, `otopark_blok`, `otopark_alan`, `durum`) VALUES
(1, 0, 'f', 0, ''),
(3, 65, '54', 64, ''),
(4, 2, '3', 4, ''),
(5, 2, '2', 2, ''),
(6, 2, '2', 2, ''),
(7, 5, '5', 4, '');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `otopark_blok`
--

CREATE TABLE `otopark_blok` (
  `id` int(11) NOT NULL,
  `otopark_blok` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `otopark_blok`
--

INSERT INTO `otopark_blok` (`id`, `otopark_blok`) VALUES
(6, 'a'),
(7, 'b'),
(8, 'c'),
(9, 'd'),
(10, 'f');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `otopark_kat`
--

CREATE TABLE `otopark_kat` (
  `id` int(11) NOT NULL,
  `otopark_kat` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `otopark_kat`
--

INSERT INTO `otopark_kat` (`id`, `otopark_kat`) VALUES
(1, 2),
(2, 2),
(3, 3),
(4, 2),
(5, 2),
(6, 1);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `otopark_kategori`
--

CREATE TABLE `otopark_kategori` (
  `id` int(11) NOT NULL,
  `otopark_kategori` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `park_ucret`
--

CREATE TABLE `park_ucret` (
  `ucret_id` int(11) NOT NULL,
  `ucret` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Dökümü yapılmış tablolar için indeksler
--

--
-- Tablo için indeksler `abonelik`
--
ALTER TABLE `abonelik`
  ADD PRIMARY KEY (`abone_id`);

--
-- Tablo için indeksler `admingiris`
--
ALTER TABLE `admingiris`
  ADD PRIMARY KEY (`kullanici_id`);

--
-- Tablo için indeksler `arac_kayit`
--
ALTER TABLE `arac_kayit`
  ADD PRIMARY KEY (`arac_id`);

--
-- Tablo için indeksler `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `otopark_alan`
--
ALTER TABLE `otopark_alan`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `otopark_bilgi`
--
ALTER TABLE `otopark_bilgi`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `otopark_blok`
--
ALTER TABLE `otopark_blok`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `otopark_kat`
--
ALTER TABLE `otopark_kat`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `otopark_kategori`
--
ALTER TABLE `otopark_kategori`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `park_ucret`
--
ALTER TABLE `park_ucret`
  ADD PRIMARY KEY (`ucret_id`);

--
-- Dökümü yapılmış tablolar için AUTO_INCREMENT değeri
--

--
-- Tablo için AUTO_INCREMENT değeri `abonelik`
--
ALTER TABLE `abonelik`
  MODIFY `abone_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- Tablo için AUTO_INCREMENT değeri `admingiris`
--
ALTER TABLE `admingiris`
  MODIFY `kullanici_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Tablo için AUTO_INCREMENT değeri `arac_kayit`
--
ALTER TABLE `arac_kayit`
  MODIFY `arac_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=114;

--
-- Tablo için AUTO_INCREMENT değeri `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Tablo için AUTO_INCREMENT değeri `otopark_alan`
--
ALTER TABLE `otopark_alan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Tablo için AUTO_INCREMENT değeri `otopark_bilgi`
--
ALTER TABLE `otopark_bilgi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Tablo için AUTO_INCREMENT değeri `otopark_blok`
--
ALTER TABLE `otopark_blok`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Tablo için AUTO_INCREMENT değeri `otopark_kat`
--
ALTER TABLE `otopark_kat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Tablo için AUTO_INCREMENT değeri `otopark_kategori`
--
ALTER TABLE `otopark_kategori`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Tablo için AUTO_INCREMENT değeri `park_ucret`
--
ALTER TABLE `park_ucret`
  MODIFY `ucret_id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

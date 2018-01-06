-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- 主機: 127.0.0.1
-- 產生時間： 2018-01-06 14:32:01
-- 伺服器版本: 10.1.29-MariaDB
-- PHP 版本： 7.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- 資料庫： `photos`
--

-- --------------------------------------------------------

--
-- 資料表結構 `exif`
--

CREATE TABLE `exif` (
  `id` char(50) NOT NULL,
  `resolution` char(50) NOT NULL,
  `camera` char(50) NOT NULL,
  `aperture` char(50) NOT NULL,
  `exposure` char(50) NOT NULL,
  `isoSpeed` char(50) NOT NULL,
  `focalLength` char(50) NOT NULL,
  `saturation` char(50) NOT NULL,
  `whiteBalance` char(50) NOT NULL,
  `photoTime` char(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 資料表結構 `frogphotos`
--

CREATE TABLE `frogphotos` (
  `id` char(50) NOT NULL,
  `filepic` blob NOT NULL,
  `filename` varchar(50) NOT NULL,
  `filetype` varchar(50) NOT NULL,
  `filesize` int(10) NOT NULL,
  `textName` char(50) NOT NULL,
  `textIntroduce` char(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

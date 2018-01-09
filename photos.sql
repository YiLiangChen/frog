-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- 主機: 127.0.0.1
-- 產生時間： 2018-01-08 17:59:12
-- 伺服器版本: 10.1.26-MariaDB
-- PHP 版本： 7.1.9

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
  `id` int(11) NOT NULL,
  `resolution` char(50) NOT NULL,
  `camera` char(50) NOT NULL,
  `aperture` char(50) NOT NULL,
  `exposure` char(50) NOT NULL,
  `isoSpeed` char(50) NOT NULL,
  `focalLength` char(50) NOT NULL,
  `saturation` char(50) NOT NULL,
  `whiteBalance` char(50) NOT NULL,
  `photoTime` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 資料表結構 `frogphotos`
--

CREATE TABLE `frogphotos` (
  `id` int(11) NOT NULL,
  `filepic` blob NOT NULL,
  `filename` varchar(50) NOT NULL,
  `filetype` varchar(50) NOT NULL,
  `filesize` int(10) NOT NULL,
  `textName` char(50) NOT NULL,
  `textIntroduce` char(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 已匯出資料表的索引
--

--
-- 資料表索引 `exif`
--
ALTER TABLE `exif`
  ADD PRIMARY KEY (`id`);

--
-- 資料表索引 `frogphotos`
--
ALTER TABLE `frogphotos`
  ADD PRIMARY KEY (`id`);

--
-- 在匯出的資料表使用 AUTO_INCREMENT
--

--
-- 使用資料表 AUTO_INCREMENT `exif`
--
ALTER TABLE `exif`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- 使用資料表 AUTO_INCREMENT `frogphotos`
--
ALTER TABLE `frogphotos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

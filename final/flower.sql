-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: 2020-05-22 07:13:24
-- 服务器版本： 5.6.46-log
-- PHP Version: 7.1.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `flower`
--

-- --------------------------------------------------------

--
-- 表的结构 `admin`
--

CREATE TABLE `admin` (
  `id` int(11) UNSIGNED ZEROFILL NOT NULL,
  `user` varchar(255) COLLATE utf8mb4_sinhala_ci NOT NULL,
  `psw` varchar(255) COLLATE utf8mb4_sinhala_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_sinhala_ci;

--
-- 转存表中的数据 `admin`
--

INSERT INTO `admin` (`id`, `user`, `psw`) VALUES
(00000000001, 'admin', 'e10adc3949ba59abbe56e057f20f883e');

-- --------------------------------------------------------

--
-- 表的结构 `product`
--

CREATE TABLE `product` (
  `id` int(11) UNSIGNED ZEROFILL NOT NULL,
  `code` varchar(255) COLLATE utf8mb4_sinhala_ci DEFAULT NULL,
  `title` varchar(255) COLLATE utf8mb4_sinhala_ci NOT NULL,
  `categories` varchar(255) COLLATE utf8mb4_sinhala_ci NOT NULL,
  `img` varchar(255) COLLATE utf8mb4_sinhala_ci NOT NULL,
  `describes` longtext COLLATE utf8mb4_sinhala_ci,
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `price` float(10,2) NOT NULL,
  `hot` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_sinhala_ci;

--
-- 转存表中的数据 `product`
--

INSERT INTO `product` (`id`, `code`, `title`, `categories`, `img`, `describes`, `time`, `price`, `hot`) VALUES
(00000000019, NULL, 'rose', 'Spical flower design', 'upload/1590089090.jpg', '<p><br></p>', '2020-05-21 19:24:50', 59.99, 0),
(00000000002, NULL, 'rose2', 'Flowers', 'upload/1590082848.jpg', '<p><br></p>', '2020-05-21 17:40:48', 39.99, 0),
(00000000003, NULL, 'The best for you', 'Spical flower design', 'upload/1590082971.jpg', '<p><br></p>', '2020-05-21 19:28:51', 33.90, 0),
(00000000004, NULL, 'Europa Wheel', 'Flowers', 'upload/1590083015.jpg', '<p><br></p>', '2020-05-21 17:43:35', 29.99, 0),
(00000000017, NULL, 'red rose', 'Flowergift', 'upload/1590088937.jpg', '<p><br></p>', '2020-05-21 19:22:17', 59.99, 0),
(00000000007, NULL, 'Hand in hand for life', 'Flowerbox', 'upload/1590083140.jpg', '<p><br></p>', '2020-05-21 17:45:40', 59.99, 0),
(00000000009, NULL, 'have mutual affinity', 'Flowerbox', 'upload/1590083248.jpg', '<p><br></p>', '2020-05-21 17:47:28', 33.99, 0),
(00000000018, NULL, 'flower', 'Flowerbox', 'upload/1590089025.jpg', '<p><br></p>', '2020-05-21 19:23:45', 33.99, 0),
(00000000011, NULL, 'Hold it in your hand', 'Flowerbox', 'upload/1590086114.jpg', '<p><br></p>', '2020-05-21 19:28:15', 35.99, 1),
(00000000012, NULL, 'Flower of love', 'Spical flower design', 'upload/1590083366.jpg', '<p><br></p>', '2020-05-21 19:28:37', 59.99, 0),
(00000000013, NULL, 'Embrace of love', 'Spical flower design', 'upload/1590083440.jpg', '<p><br></p>', '2020-05-21 17:50:40', 29.99, 0),
(00000000014, NULL, 'A promise of love', 'Flowergift', 'upload/1590083601.jpg', '<p><br></p>', '2020-05-21 19:29:12', 39.99, 0),
(00000000016, NULL, 'lily', 'Flowers', 'upload/1590088873.jpg', '<p><br></p>', '2020-05-21 19:21:13', 25.97, 0),
(00000000020, NULL, 'rose', 'Flowers', 'upload/1590089172.jpg', '<p><br></p>', '2020-05-21 19:30:04', 25.99, 0),
(00000000021, NULL, 'flower', 'Flowergift', 'upload/1590089576.jpg', '<p><br></p>', '2020-05-21 19:33:43', 19.99, 0),
(00000000022, NULL, 'flower', 'Flowergift', 'upload/1590089791.jpg', '<p><br></p>', '2020-05-21 19:36:31', 29.99, 0);

-- --------------------------------------------------------

--
-- 表的结构 `user`
--

CREATE TABLE `user` (
  `id` int(11) UNSIGNED ZEROFILL NOT NULL,
  `countant` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 转存表中的数据 `user`
--

INSERT INTO `user` (`id`, `countant`, `username`, `password`) VALUES
(00000000001, 'aaaaaa', 'Li', 'e10adc3949ba59abbe56e057f20f883e');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- 在导出的表使用AUTO_INCREMENT
--

--
-- 使用表AUTO_INCREMENT `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- 使用表AUTO_INCREMENT `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- 使用表AUTO_INCREMENT `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

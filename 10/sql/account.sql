-- phpMyAdmin SQL Dump
-- version 4.4.3
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: 2015 年 10 月 10 日 12:24
-- サーバのバージョン： 5.6.24
-- PHP Version: 5.6.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `gs_line`
--

-- --------------------------------------------------------

--
-- テーブルの構造 `account`
--

CREATE TABLE IF NOT EXISTS `account` (
  `id` int(11) NOT NULL,
  `name` varchar(255) CHARACTER SET utf8 NOT NULL,
  `email` varchar(255) CHARACTER SET utf8 NOT NULL,
  `password` varchar(255) CHARACTER SET utf8 NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4;

--
-- テーブルのデータのダンプ `account`
--

INSERT INTO `account` (`id`, `name`, `email`, `password`, `created`, `modified`) VALUES
(6, 'いとう01', 'test01@fork.ocn.ne.jp', '011c945f30ce2cbafc452f39840f025693339c42', '2015-10-10 19:14:53', '2015-10-10 19:14:53'),
(7, 'いとう02', 'test02@fork.ocn.ne.jp', '011c945f30ce2cbafc452f39840f025693339c42', '2015-10-10 19:15:26', '2015-10-10 19:15:26'),
(8, 'いとう03', 'test03@fork.ocn.ne.jp', '011c945f30ce2cbafc452f39840f025693339c42', '2015-10-10 19:15:59', '2015-10-10 19:15:59'),
(9, 'いとう04', 'test04@fork.ocn.ne.jp', '011c945f30ce2cbafc452f39840f025693339c42', '2015-10-10 19:16:31', '2015-10-10 19:16:31');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `account`
--
ALTER TABLE `account`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `account`
--
ALTER TABLE `account`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=10;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- 主机： 127.0.0.1
-- 生成日期： 2020-06-03 14:53:08
-- 服务器版本： 10.4.11-MariaDB
-- PHP 版本： 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- 数据库： `sports`
--

-- --------------------------------------------------------

--
-- 表的结构 `message`
--

CREATE TABLE `message` (
  `id` int(200) NOT NULL,
  `from_user` varchar(200) NOT NULL,
  `to_user` varchar(200) NOT NULL,
  `message` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- 转存表中的数据 `message`
--

INSERT INTO `message` (`id`, `from_user`, `to_user`, `message`) VALUES
(1, 'admin', 'asuka', 'test'),
(21, 'admin', 'asuka', 'test'),
(22, 'admin', 'asuka', 'test'),
(23, 'admin', 'asuka', 'test'),
(24, 'admin', 'asuka', 'test'),
(25, 'admin', 'asuka', 'test'),
(26, 'admin', 'asuka', 'test'),
(27, 'admin', 'asuka', 'test'),
(28, 'admin', 'asuka', 'test'),
(29, 'admin', 'asuka', 'test'),
(30, 'admin', 'asuka', 'test'),
(31, 'admin', 'asuka', 'test'),
(32, 'admin', 'asuka', 'test'),
(34, 'test123', 'admin', 'asdfasdfdsafsaddsafs'),
(35, 'test123', 'test123', 'asdfasdf'),
(37, 'test123', 'test123', 'test111'),
(38, 'admin', 'admin', 'admintest'),
(39, 'admin', 'admin', 'test'),
(40, 'admin_test', 'admin', 'test_by_admin_test');

-- --------------------------------------------------------

--
-- 表的结构 `sportsheader`
--

CREATE TABLE `sportsheader` (
  `id` int(100) NOT NULL,
  `title` varchar(200) NOT NULL,
  `image` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- 转存表中的数据 `sportsheader`
--

INSERT INTO `sportsheader` (`id`, `title`, `image`) VALUES
(1, '1', 'images/sports'),
(2, '2', 'images/sports-2'),
(3, '3', 'images/sports-3'),
(4, '4', 'images/sports-4');

-- --------------------------------------------------------

--
-- 表的结构 `sportsnav`
--

CREATE TABLE `sportsnav` (
  `id` int(200) NOT NULL,
  `nav_title` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- 转存表中的数据 `sportsnav`
--

INSERT INTO `sportsnav` (`id`, `nav_title`) VALUES
(1, 'index'),
(2, 'profile'),
(3, 'manage'),
(4, 'view'),
(5, 'message');

-- --------------------------------------------------------

--
-- 表的结构 `sport_record`
--

CREATE TABLE `sport_record` (
  `id` int(255) NOT NULL,
  `username` varchar(200) NOT NULL,
  `sport_type` varchar(200) NOT NULL,
  `start_time` datetime DEFAULT NULL,
  `duration` int(200) DEFAULT NULL,
  `distance` int(200) DEFAULT NULL,
  `average_speed` int(200) DEFAULT NULL,
  `calories` int(200) DEFAULT NULL,
  `share` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- 转存表中的数据 `sport_record`
--

INSERT INTO `sport_record` (`id`, `username`, `sport_type`, `start_time`, `duration`, `distance`, `average_speed`, `calories`, `share`) VALUES
(9, 'admin', 'test111112', '2020-05-26 00:03:00', 20, 10, 10, 10, 1),
(15, 'admin', 'test1', '2020-05-26 00:03:00', 20, 10, 10, 10, 1),
(18, 'admin', 'test1', '2020-05-26 00:03:00', 20, 10, 10, 10, 1),
(19, 'admin', 'test1', '2020-05-26 00:03:00', 20, 10, 10, 10, 1),
(20, 'admin', 'test1', '2020-05-26 00:03:00', 20, 10, 10, 10, 1),
(28, 'admin', 'test1', '2020-05-26 00:03:00', 20, 10, 10, 10, 1),
(29, 'asuka', 'test111ee', '2021-04-26 06:53:00', 20, 15, 20, 86, 1),
(30, 'test123', 'test123', '2020-01-01 01:00:00', 10, 56, 12, 89, 1),
(31, 'admin', 'test', '2021-06-26 11:22:00', 50, 564, 105656, 89654, 1),
(32, 'admin', 'football', '2020-01-01 01:00:00', 55, 23, 50, 456, 0),
(33, 'admin', 'basketball', '2020-01-01 01:00:00', 45, 54, 12, 87, 1),
(34, 'admin', 'test', '2020-01-01 01:00:00', 20, 456, 123, 78, 1),
(36, 'admin', 'special', '2020-01-01 01:00:00', 12, 2356, 23, 874, 1),
(37, 'admin_test', 'admin_test_basketball', '2020-01-01 01:00:00', 123, 123, 23, 23, 1);

-- --------------------------------------------------------

--
-- 表的结构 `user`
--

CREATE TABLE `user` (
  `id` int(200) NOT NULL,
  `username` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL,
  `full_name` varchar(200) DEFAULT NULL,
  `profile` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- 转存表中的数据 `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `full_name`, `profile`) VALUES
(1, 'admin', 'admin', 'admin1111', 'This is one test record'),
(12, 'test123', '123', NULL, NULL),
(13, 'adminadmin', 'admin', NULL, NULL),
(14, 'testtest', '123123', NULL, NULL),
(15, 'ji', 'ji', NULL, NULL),
(16, 'admin_test', 'admin', 'admin_test', 'admin_test');

--
-- 转储表的索引
--

--
-- 表的索引 `message`
--
ALTER TABLE `message`
  ADD PRIMARY KEY (`id`);

--
-- 表的索引 `sportsheader`
--
ALTER TABLE `sportsheader`
  ADD PRIMARY KEY (`id`);

--
-- 表的索引 `sportsnav`
--
ALTER TABLE `sportsnav`
  ADD PRIMARY KEY (`id`);

--
-- 表的索引 `sport_record`
--
ALTER TABLE `sport_record`
  ADD PRIMARY KEY (`id`);

--
-- 表的索引 `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`,`username`),
  ADD UNIQUE KEY `username` (`username`);

--
-- 在导出的表使用AUTO_INCREMENT
--

--
-- 使用表AUTO_INCREMENT `message`
--
ALTER TABLE `message`
  MODIFY `id` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- 使用表AUTO_INCREMENT `sportsheader`
--
ALTER TABLE `sportsheader`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- 使用表AUTO_INCREMENT `sportsnav`
--
ALTER TABLE `sportsnav`
  MODIFY `id` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- 使用表AUTO_INCREMENT `sport_record`
--
ALTER TABLE `sport_record`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- 使用表AUTO_INCREMENT `user`
--
ALTER TABLE `user`
  MODIFY `id` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

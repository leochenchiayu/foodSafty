-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- 主機： 127.0.0.1
-- 產生時間： 2022-04-10 23:54:41
-- 伺服器版本： 10.4.22-MariaDB
-- PHP 版本： 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- 資料庫: `member_info`
--

-- --------------------------------------------------------

--
-- 資料表結構 `food`
--

CREATE TABLE `food` (
  `id` int(11) NOT NULL,
  `title` varchar(25) DEFAULT NULL,
  `content` text DEFAULT NULL,
  `poster` int(11) DEFAULT NULL,
  `date_of_post` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `imgpath` varchar(225) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 傾印資料表的資料 `food`
--

INSERT INTO `food` (`id`, `title`, `content`, `poster`, `date_of_post`, `imgpath`) VALUES
(4, 'af', 'af', 2, '2022-04-07 10:35:16', NULL);

-- --------------------------------------------------------

--
-- 資料表結構 `member`
--

CREATE TABLE `member` (
  `id` int(11) NOT NULL,
  `account` varchar(50) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `name` varchar(10) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `date_of_register` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 傾印資料表的資料 `member`
--

INSERT INTO `member` (`id`, `account`, `password`, `name`, `email`, `date_of_register`) VALUES
(1, 'Leo Chen', 'fa83714ceb1a21362b7925db54d985da18d618c1', 'Leo Chen', '1074889@etech.ncyu.edu.tw', '2022-04-03 22:00:00'),
(2, 'c_chen', 'fa83714ceb1a21362b7925db54d985da18d618c1', 'c_chen', 'a0979663740@gmail.com', '2022-04-03 22:00:00'),
(3, 'YuYu', 'fa83714ceb1a21362b7925db54d985da18d618c1', 'Yu', '1074889@etech.ncyu.edu.tw', '2022-04-08 22:00:00'),
(4, 'okok', 'fa83714ceb1a21362b7925db54d985da18d618c1', 'ok', '1074889@etech.ncyu.edu.tw', '2022-04-08 22:00:00'),
(5, 'CC', 'fa83714ceb1a21362b7925db54d985da18d618c1', 'CC', 'a0979663740@gmail.com', '2022-04-08 22:00:00');

-- --------------------------------------------------------

--
-- 資料表結構 `thumb_up`
--

CREATE TABLE `thumb_up` (
  `id` int(11) NOT NULL,
  `post_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 已傾印資料表的索引
--

--
-- 資料表索引 `food`
--
ALTER TABLE `food`
  ADD PRIMARY KEY (`id`),
  ADD KEY `poster` (`poster`);

--
-- 資料表索引 `member`
--
ALTER TABLE `member`
  ADD PRIMARY KEY (`id`);

--
-- 資料表索引 `thumb_up`
--
ALTER TABLE `thumb_up`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `post_id` (`post_id`);

--
-- 在傾印的資料表使用自動遞增(AUTO_INCREMENT)
--

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `food`
--
ALTER TABLE `food`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `member`
--
ALTER TABLE `member`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `thumb_up`
--
ALTER TABLE `thumb_up`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- 已傾印資料表的限制式
--

--
-- 資料表的限制式 `food`
--
ALTER TABLE `food`
  ADD CONSTRAINT `food_ibfk_1` FOREIGN KEY (`poster`) REFERENCES `member` (`id`);

--
-- 資料表的限制式 `thumb_up`
--
ALTER TABLE `thumb_up`
  ADD CONSTRAINT `thumb_up_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `member` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `thumb_up_ibfk_2` FOREIGN KEY (`post_id`) REFERENCES `food` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

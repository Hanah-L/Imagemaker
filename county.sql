-- phpMyAdmin SQL Dump
-- version 4.0.10deb1ubuntu0.1
-- http://www.phpmyadmin.net
--
-- 主機: newmysql
-- 建立日期: 2020 年 04 月 28 日 15:54
-- 伺服器版本: 5.7.27-0ubuntu0.19.04.1
-- PHP 版本: 5.5.9-1ubuntu4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- 資料庫: `fripig_uniform`
--

-- --------------------------------------------------------

--
-- 資料表結構 `county`
--

CREATE TABLE IF NOT EXISTS `county` (
  `sn` int(7) NOT NULL AUTO_INCREMENT,
  `country` varchar(10) NOT NULL,
  `name` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `name_en` varchar(100) NOT NULL,
  PRIMARY KEY (`sn`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=23 ;

--
-- 資料表的匯出資料 `county`
--

INSERT INTO `county` (`sn`, `country`, `name`, `name_en`) VALUES
(1, 'tw', '台北市', 'Taipei City'),
(2, 'tw', '新北市', 'New Taipei City'),
(3, 'tw', '桃園市', 'Taoyuan City'),
(4, 'tw', '台中市', 'Taichung City'),
(5, 'tw', '台南市', 'Tainan City'),
(6, 'tw', '高雄市', 'Kaohsiung City'),
(7, 'tw', '基隆市', 'Keelung City'),
(8, 'tw', '嘉義市', 'Chiayi City'),
(9, 'tw', '新竹市', 'Hsinchu City'),
(10, 'tw', '宜蘭縣', 'Yilan County'),
(11, 'tw', '新竹縣', 'Hsinchu County'),
(12, 'tw', '苗栗縣', 'Miaoli County'),
(13, 'tw', '彰化縣', 'Changhua County'),
(14, 'tw', '南投縣', 'Nantou County'),
(15, 'tw', '嘉義縣', 'Chiayi County'),
(16, 'tw', '雲林縣', 'Yunlin County'),
(17, 'tw', '屏東縣', 'Pingtung County'),
(18, 'tw', '花蓮縣', 'Hualien County'),
(19, 'tw', '台東縣', 'Taitung County'),
(20, 'tw', '澎湖縣', 'Penghu County'),
(21, 'tw', '金門縣', 'Kinmen County'),
(22, 'tw', '連江縣', 'Lienchiang County');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- 主機： 127.0.0.1
-- 產生時間： 
-- 伺服器版本： 10.4.11-MariaDB
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
-- 資料庫： `imagemaker`
--

-- --------------------------------------------------------

--
-- 資料表結構 `collect_list`
--

CREATE TABLE `collect_list` (
  `sid` int(11) NOT NULL,
  `product_num` varchar(255) NOT NULL,
  `member_num` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


-- 取收藏清單的全部內容以及會員清單的會員號碼，收藏清單的會員編號等於會員清單的會員編號
SELECT `collect_list`.*,`member_list`.`member_num` 
FROM `collect_list` JOIN `member_list` 
ON `collect_list`.`member_num` = `member_list`.`member_num`


SELECT `collect_list`.*,`member_list`.`sid` 
FROM `collect_list` JOIN `member_list` 
ON `collect_list`.`member_num` = `member_list`.`sid`
-- --------------------------------------------------------

--
-- 資料表結構 `member_list`
--

CREATE TABLE `member_list` (
  `sid` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `gender` enum('Male','Female') NOT NULL,
  `birthday` date NOT NULL,
  `mobile` varchar(255) NOT NULL,
  `address` varchar(255) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `coupon_num` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- 傾印資料表的資料 `member_list`
--

INSERT INTO `member_list` (`sid`, `name`, `email`, `gender`, `birthday`, `mobile`, `address`, `password`, `coupon_num`) VALUES
(1, '尹梅卡', 'imaka@gmail.com', 'Female', '1995-05-15', '0911123456', '台北市大安區復興南路123號4樓', '7C4A8D09CA3762AF61E59520943DC26494F8941B', ''),
(12, '李耀相', 'ys@gmail.com', 'Male', '0000-00-00', '', '', '', '');

-- --------------------------------------------------------

--
-- 資料表結構 `product_list`
--

CREATE TABLE `product_list` (
  `sid` int(11) NOT NULL,
  `product_num` varchar(255) NOT NULL,
  `brand` varchar(255) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `product_name_c` varchar(255) DEFAULT NULL,
  `ml` int(11) NOT NULL,
  `frangrance` varchar(255) NOT NULL,
  `top_note` varchar(255) NOT NULL,
  `middle_note` varchar(255) NOT NULL,
  `base_note` varchar(255) NOT NULL,
  `price` int(11) NOT NULL,
  `situation_1` varchar(255) NOT NULL,
  `situation_2` varchar(255) NOT NULL,
  `situation_3` varchar(255) NOT NULL,
  `gender` enum('Male','Female','Unisex') NOT NULL,
  `score` int(11) DEFAULT NULL,
  `pic_id` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 資料表結構 `share_list`
--

CREATE TABLE `share_list` (
  `sid` int(11) NOT NULL,
  `member_num` varchar(255) NOT NULL,
  `product_num` varchar(255) NOT NULL,
  `shop_num` varchar(255) NOT NULL,
  `shared` tinyint(1) NOT NULL,
  `share_title` varchar(255) DEFAULT NULL,
  `share_content` varchar(255) DEFAULT NULL,
  `score` int(11) DEFAULT NULL,
  `share_date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 資料表結構 `shop_detail`
--

CREATE TABLE `shop_detail` (
  `sid` int(11) NOT NULL,
  `shop_num` varchar(255) NOT NULL,
  `product_num` varchar(255) NOT NULL,
  `quantity` int(11) NOT NULL,
  `amount` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 資料表結構 `shop_list`
--

CREATE TABLE `shop_list` (
  `sid` int(11) NOT NULL,
  `shop_num` varchar(255) NOT NULL,
  `member_num` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `receiver_name` varchar(255) NOT NULL,
  `receiver_mobile` varchar(255) NOT NULL,
  `receiver_email` varchar(255) NOT NULL,
  `receiver_address` varchar(255) NOT NULL,
  `service` varchar(255) NOT NULL,
  `payment` varchar(255) NOT NULL,
  `ps` varchar(255) DEFAULT NULL,
  `coupon_num` varchar(255) NOT NULL,
  `shop_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 資料表結構 `test-1`
--

CREATE TABLE `test-1` (
  `sid` int(11) NOT NULL,
  `question_num` varchar(255) NOT NULL,
  `test_question` varchar(255) NOT NULL,
  `answer-a` varchar(255) NOT NULL,
  `splice-a` varchar(255) NOT NULL,
  `answer-b` varchar(255) NOT NULL,
  `splice-b` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


INSERT INTO `test-1`(`sid`, `question_num`, `test_question`, `answer-a`, `splice-a`, `answer-b`, `splice-b`) 
VALUES ('','Q1','第一次來到這樣盛大陌生的聚會場合，你的反應是：','A.主動搭話','Q2','B.等待搭訕','Q3'),
('','Q2','發現別人在注視自己時，你內心的感覺是：','A.我哪裡不對勁了嗎','Q4','B.他可能對我有意思','Q7'),
('','Q3','別人主動向你搭話，你的反應是：','A.急忙介紹自己','Q6','B.從容的與對方互動','Q5'),
('','Q4','看到不錯的對象你首先會注意到：','A.對方的長相','Q7','B.身上的行頭','Q13'),
('','Q5','面對眼前可口的派對小甜點你會選擇：','A.可愛馬卡龍','Q8','B.法式鹹派','Q12'),
('','Q6','口渴時你會選擇：','A.高級果汁','Q11','B.香檳','Q14'),
('','Q7','平時你會選擇站在人群中玩樂，還是坐在旁邊的椅子聊天？','A.站在人群中玩樂','Q12','B.坐在旁邊的椅子聊天','Q11'),
('','Q8','遊戲玩樂的時候，你會選擇跟別人跳舞，還是玩牌桌遊戲？','A.跟別人跳舞','Q9','B.玩牌桌遊戲','Q10'),
('','Q9','跳舞時你會選擇：','A.快歌','Q11','B.慢歌','Q14'),
('','Q10','選擇牌桌遊戲時你喜歡：','A.由荷官為你服務的21點','Q16','B.吃角子老虎機','Q13'),
('','Q11','當你發現精心準備的衣服跟別人撞衫時，你的反應是：','A.我最美不用怕','Q12','B.盡量避開他','Q15'),
('','Q12','當你跟別人談笑風生之際，你美麗的鞋跟斷掉了，你會：','A.先糗自己，當沒事繼續跟大家互動','Q17','B.懊惱不已，等待同伴協助','Q18'),
('','Q13','當你跟大家都熟識過後，你會選擇：','A.參與派對流程活動','Q15','B.依照內心狀況行事','Q14'),
('','Q14','當大家把你跟不欣賞的對象湊作堆時：','A.直接明白說出自己的感覺','Q19','B.從對方身上找優點陪他度過一晚','Q18'),
('','Q15','當你走進會場時你覺得現場的布置是什麼色系：','A.粉紅色','Q20','B.金色','Q18'),
('','Q16','你跟心儀的對象交談時，朋友發生了狀況，你會：','A.禮貌的岔開話題，先去幫忙朋友展現你溫柔賢淑的一面','Q20','B.了解朋友的困難後，替他找到最好的辦法','Q18'),
('','Q17','當你吃到好吃的甜點時，你會：','A.主動介紹別人與你同樂','Q19','B.細細品嘗好滋味','Q18'),
('','Q18','活動中有一次西洋塔羅占卜的機會，你會想問哪方面的問題？','A.工作','綠葉調美人','B.感情','果香調美人'),
('','Q19','派對結束後發送兩種紀念品你會選擇：','A.香港東京購物之旅','辛香調美人','B.巴塞隆納感性之旅','花香調美人'),
('','Q20','派對活動結束之後，你會跟有點進展的對象：','A.繼續進行約會','海洋調美人','B.按照原定計畫回家','木質調美人')
-- --------------------------------------------------------

--
-- 資料表結構 `test_record`
--

CREATE TABLE `test_record` (
  `sid` int(11) NOT NULL,
  `test_num` varchar(255) NOT NULL,
  `test_name` varchar(255) NOT NULL,
  `test_date` date NOT NULL,
  `test_fra` varchar(255) NOT NULL,
  `member_num` varchar(255) NOT NULL,
  `coupon_used` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 已傾印資料表的索引
--

--
-- 資料表索引 `collect_list`
--
ALTER TABLE `collect_list`
  ADD PRIMARY KEY (`sid`);

--
-- 資料表索引 `member_list`
--
ALTER TABLE `member_list`
  ADD PRIMARY KEY (`sid`);

--
-- 資料表索引 `product_list`
--
ALTER TABLE `product_list`
  ADD PRIMARY KEY (`sid`),
  ADD UNIQUE KEY `product_num` (`product_num`);

--
-- 資料表索引 `share_list`
--
ALTER TABLE `share_list`
  ADD PRIMARY KEY (`sid`);

--
-- 資料表索引 `shop_detail`
--
ALTER TABLE `shop_detail`
  ADD PRIMARY KEY (`sid`);

--
-- 資料表索引 `shop_list`
--
ALTER TABLE `shop_list`
  ADD PRIMARY KEY (`sid`),
  ADD UNIQUE KEY `shop_num` (`shop_num`);

--
-- 資料表索引 `test-1`
--
ALTER TABLE `test-1`
  ADD PRIMARY KEY (`sid`);

--
-- 資料表索引 `test_record`
--
ALTER TABLE `test_record`
  ADD PRIMARY KEY (`sid`),
  ADD UNIQUE KEY `test_num` (`test_num`);

--
-- 在傾印的資料表使用自動遞增(AUTO_INCREMENT)
--

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `collect_list`
--
ALTER TABLE `collect_list`
  MODIFY `sid` int(11) NOT NULL AUTO_INCREMENT;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `member_list`
--
ALTER TABLE `member_list`
  MODIFY `sid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `product_list`
--
ALTER TABLE `product_list`
  MODIFY `sid` int(11) NOT NULL AUTO_INCREMENT;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `share_list`
--
ALTER TABLE `share_list`
  MODIFY `sid` int(11) NOT NULL AUTO_INCREMENT;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `shop_detail`
--
ALTER TABLE `shop_detail`
  MODIFY `sid` int(11) NOT NULL AUTO_INCREMENT;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `shop_list`
--
ALTER TABLE `shop_list`
  MODIFY `sid` int(11) NOT NULL AUTO_INCREMENT;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `test-1`
--
ALTER TABLE `test-1`
  MODIFY `sid` int(11) NOT NULL AUTO_INCREMENT;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `test_record`
--
ALTER TABLE `test_record`
  MODIFY `sid` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

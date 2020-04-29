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
  `member_sid` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


-- 取收藏清單的全部內容以及會員清單的會員號碼，收藏清單的會員編號等於會員清單的會員編號
-- SELECT `collect_list`.*,`member_list`.`member_num` 
-- FROM `collect_list` JOIN `member_list` 
-- ON `collect_list`.`member_num` = `member_list`.`member_num`

-- 更改collect_list欄位member_num成member_sid，member_list欄位member_num成sid
-- 取收藏清單的全部內容以及會員清單的sid，收藏清單的會員編號等於會員清單的sid
SELECT `collect_list`.*,`member_list`.`sid` 
FROM `collect_list` JOIN `member_list` 
ON `collect_list`.`member_sid` = `member_list`.`sid`
-- --------------------------------------------------------

--
-- 資料表結構 `member_list`
--

-- `address` varchar(255) DEFAULT NULL,

CREATE TABLE `member_list` (
  `sid` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `gender` enum('Male','Female') NOT NULL DEFAULT 'Male',
  `birthday` date NOT NULL,
  `mobile` varchar(255) DEFAULT NULL,
  `city` varchar(255) DEFAULT NULL,
  `county` varchar(255) DEFAULT NULL,
  `address_detail` varchar(255) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `coupon_num` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- 傾印資料表的資料 `member_list`
--

INSERT INTO `member_list` (`sid`, `name`, `email`, `gender`, `birthday`, `mobile`, `city`, `county`, `address_detail`, `password`, `coupon_num`) VALUES
(1, '尹梅卡', 'imaka@gmail.com', 'Female', '1995-05-15', '0911123456', '', '', '台北市大安區復興南路123號4樓', '7C4A8D09CA3762AF61E59520943DC26494F8941B', ''),
(12, '李耀相', 'ys@gmail.com', 'Male', '0000-00-00', '', '', '', '', '', ''),
(14, '測試', 'test@gmail.com', 'Male', '0000-00-00', '', '', '', '', '', ''),
(15, '測試', 'test@gmail.com', 'Male', '0000-00-00', '', '', '', '', '', ''),
(16, '郝困楠', 'sohard@gmail.com', 'Female', '2020-04-01', '', '', '', '', '', ''),
(17, '郝困楠', 'sohard@gmail.com', 'Female', '2020-04-01', '', '', '', '', '', '');

--
-- 已傾印資料表的索引
--
-- --------------------------------------------------------

--
-- 資料表結構 `product_list`
--

CREATE TABLE `product_list` (
  `sid` int(11) NOT NULL,
  -- `product_num` varchar(255) NOT NULL,
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





-- situation_1、situation_2、situation_3中只要有符合的內容即秀出整筆資料寫法?
-- 商品分類要另外做出獨立資料表? or 直接取product_list中的frangrance & situation?
-- 前調、中調、後調欄位數量應等同內容數量? 增加欄位?


-- --------------------------------------------------------

--
-- 資料表結構 `share_list`
--

CREATE TABLE `share_list` (
  `sid` int(11) NOT NULL,
  `member_sid` varchar(255) NOT NULL,
  `product_num` varchar(255) NOT NULL,
  `shop_num` varchar(255) NOT NULL,
  `shared` tinyint(1) NOT NULL,
  `share_title` varchar(255) DEFAULT NULL,
  `share_content` varchar(255) DEFAULT NULL,
  `score` int(11) DEFAULT NULL,
  `share_date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


INSERT INTO `share_list`(`sid`, `member_sid`, `product_num`, `shop_num`, `shared`, `share_title`, `share_content`, `score`, `share_date`) 
VALUES ([value-1],[value-2],[value-3],[value-4],[value-5],[value-6],[value-7],[value-8],[value-9])


-- 要如何抓取商品照片? 用product_num直接連接照片的檔名(像老師範例的products中book_id)?

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
-- 資料表結構 `spice_list`
--

CREATE TABLE `spice_list` (
  `sid` int(11) NOT NULL,
  `spice_name` varchar(255) NOT NULL,
  `spice_id` varchar(255) NOT NULL,
  `spice_con` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



INSERT INTO `spice_list`(`sid`, `spice_name`, `spice_id`, `spice_con`)
VALUES ('','香脂','balsam','香脂是能散發出香味的樹和灌木的樹脂，也叫香膠。在現代香水業中，常用的有秘魯香脂、妥盧香脂膠、苦配巴香脂，還有安息香料等。它們的形狀為黃色至蒼棕色稍帶粘稠的液體或結晶體，所散發出來的香味都有點香草香精的味道。'),
('','香檸檬油','bergamot','產於義大利，是從香檸檬樹的果皮中提煉的橘子味的香油，愉快、涼爽、芳香的香氣，青香帶甜的果香，有清靈新鮮之感，33%的女用香水用到了這種原料。'),
('','苦柑橘','bitterorange','這種香油是壓榨果皮得到的，苦柑橘樹也叫畢加萊特橘樹。這種橘樹可以提煉出橙花油、橘花油和果芽油。'),
('','乳香','frankincense','是從阿拉伯南部和索馬利亞地區生長的一種小樹上得到的膠狀物。從古代開始就是相當重要的香料，至今還在運用。它大約出現在13%的現代香水中。'),
('','波斯樹脂','galbanum','一種膠狀香料，是從生長於伊朗的茴香類植物中提取的。它的氣味是溫暖、脂般的辛香，混合了綠葉和麝香的味道。'),
('','茉莉','jasmine','是在香水業中地位僅次於玫瑰的重要植物。香氣細緻而透發，有清新之感，為鮮韻花香，現代香水中的80%的都要用到它。其品種很多，西班牙茉莉也叫皇家茉莉，是16世紀以來歐洲最常用的品種。一英畝(約0.4公頃)土地的茉莉可產500磅(約0.45公斤)茉莉花，但絕對產量很低(大約0.1%)，因為茉莉花必須在清晨還被朝露覆蓋時採摘，如果被陽光照到，就回失去一些香味，所以茉莉也是最昂貴的香水原料之一。'),
('','勞丹脂','labdanum','勞丹脂也叫半日花脂，來源於中東一種岩薔薇屬的植物葉子。在香水業中地位重要，強烈的膏香，稀釋後與龍涎香很相似，而且香味持久，很有價值。在現代香水中可以占到33%的比例。'),
('','薰衣草','lavender','最常見的香料之一。其花朵提供一種鮮嫩的綠色、清爽花香。法國曾有一段時期每年出產5000噸熏衣草。在英國，現在只有東部的諾福克郡(Norfolk)出產這種香水原料，一公頃熏衣草大約可以出產15磅香油。'),
('','檸檬油','lemon','檸檬油不僅用在香水裡面，也用在調味品裡面，具有濃郁的檸檬鮮果皮香氣，香氣飄逸但不甚留長。約1000個檸檬可以提煉出1磅檸檬油。油是從果皮裡面壓榨出來的，亦可水蒸氣蒸餾而得。它被用在很多品質優良的香水裡，多數是為了使香水的前調更具有清新感。'),
('','幽谷百合','lilyofthevalley','早期的百合花香只有把花朵和蜜油調和在一起才能得到，現在也只能通過提純而得到凝結物，卻不能製成精華油。於是人們用化學合成方法獲得了有史以來最雅致的百合花香味，該化合物被稱為鈴蘭(Muguet)。因其具有雅致的百合花香味而成為幽谷百合的替代品。大約14%的現代優質香水或多或少用到它。'),
('','沒藥','myrrh','從沒藥樹上收集的膠狀物質，產於阿拉伯、索馬利亞和衣索比亞等地，很早以前它的重要地位就不只體現在香水上，它還有藥用和防腐的功效。其香味頗似鳳仙花，而且留香持久。沒藥油為淡棕色或淡綠色液體，在現代的香水中用到它的比例大約是7%。'),
('','奈若利橙花油','neroli','從苦柑橘樹的花朵以蒸餾方式提取，奈若利(Neroli)這個名字來源於一位16世紀的義大利王子，其香味混合了辛香和甜蜜的果香。大約12%的現代香水用到它。'),
('','橡樹苔','oakmoss','從橡樹、雲杉和其它生長在歐洲和北非山區的樹木上採取。長期儲藏會增加其香味，香味有泥土、木材和麝香的混合氣息，持久性好。約占當今的香料的三分之一。同類型的還有樹蘚。'),
('','香鳶尾花油','orris','室溫下為淺黃至棕黃色固體，香氣平和留長，是蜜甜香中的雋品，散發著紫羅蘭般的香味，由儲藏了兩年的鳶尾花的根莖經過提煉而成的。其獨特之處是可以使別的香味得到特別的強化。在不少一流的香水中都能找到它。'),
('','廣藿香','patchouli','來自遠東的薄荷味香料，是植物香料中香味最強烈的一種，通常用於東方調香水中。其香氣濃而持久，是很好的定香劑。在蒸餾之前，原料要先經過乾燥和發酵過程。因為帶樟腦樣的香味非常濃烈，所以香料每次的用量要有嚴格控制。香油中獨特的辛香和松香會隨時間推移而變得更加明顯，這是已知植物香料中持久性最好的。它第一次引起歐洲人的注意是在19世紀，那時印度商人帶來的披巾上散發出這種香味，並很快成為時髦的香型。現在有三分之一的高級香水會用到它。'),
('','玫瑰','rose','是一種寶貴的香料，屬於香水業中最重要的植物。被希臘女詩人莎孚(Sappho)稱為"花后"。其品種很多，最早的品種是洋薔薇，或者叫畫師玫瑰，也就是通常所說的五月玫瑰，原來是法國香水的專用玫瑰。保加利亞的喀山拉克(Kazanlak)地區出產大量的大馬士革玫瑰。還有一些品種在埃及、摩洛哥和其它地方被培育出來。現在已經可以明確的有17種不同的玫瑰香味，通常情況下，總含有蜜甜香的甜韻香氣，三甜合一，芬芳四溢，屬花油之冠。提煉1磅的玫瑰香油或玫瑰香精需要1000磅的玫瑰花，純香精的比例更是少而又少，只有0.03%而已。至少有75%的優質香水用得到玫瑰香油。'),
('','檀香','sandalwood','檀香油主要從產於印度和印度尼西亞的檀香木屑和枝條中間提取，為黃色略帶粘稠的液體，東方型香氣，以邁索爾(Mysore)地區出產的最好，亦有產自澳大利亞的檀香油。這種樹是寄生的，根吸附在別的樹上。檀香油是製作香水最值錢和最珍貴的原料，它的留香非常持久，在優質的香水裡面大約有一半會用這種原料作為基礎的香味。'),
('','零陵香豆','tonka','從安哥斯圖拉苦味樹皮和巴拉圭豆中提取，產於南美洲。當樹皮和豆子被香豆素的晶體覆蓋以後，就可以用朗姆酒進行處理，它散發的氣味很像剛剛割下來的青草。用零陵香豆製成的純香精用在10%的優質香水裡。'),
('','樹蘚','treemoss','在美國樹蘚和橡樹苔是同一種東西。而在歐洲的香水業中樹蘚特指一種雲杉的蘚衣，提煉物的香味很像某種焦油。常用在馥奇香型的香水中，並且有良好的固香作用。'),
('','晚香玉','tuberose','俗稱夜來香，它的香味被形容成晚間香花滿園的芬芳氣息，香氣幽雅，這種花提煉出來的香油在20%的優質香水中可以找到，特別是清幽類型香水。純香精的產量很低，每2600磅這種花朵只能產出7盎司(約28.35克)的香精，所以它比同等重量的黃金還貴。'),
('','香子蘭','vanilla','香子蘭油是從香子蘭花蔓上的果莢里提煉出來的。原產於墨西哥和美洲的熱帶地區，提取前要經過發酵。氣味甜蜜辛香，自被考迪(Coty)用於"吸引"(L`AIMANT)之後，其在香水業中的運用越來越普遍，目前大約四分之一的香水用到它。'),
('','香根','vetiver','是從亞洲的一種熱帶草本植物庫斯庫斯(Khuskhus)的根莖中蒸餾得來的香油，為棕色至紅棕色粘稠液體，有著泥土的芳香氣息並且隱約有鳶尾草和紫羅蘭的香甜。香氣平和而持久，不僅可作為定香劑，還賦予干甜的木香。香根油出現在36%的優質香水中。'),
('','紫羅蘭','violet','在香水中用到的紫羅蘭有兩個品種：維多利亞(Victoria)紫羅蘭和帕瑪(Parma)紫羅蘭，前者質量較好，後者則更易生長。香油是從花瓣和葉子中提取的，但是因為成本比較高，現在大多數的紫羅蘭香味是化學合成的。'),
('','香油樹','ylang-ylang','在優質香水中有40%用了香油樹的香油。特別地適用於茉莉、白蘭、晚香玉、鈴蘭、紫羅蘭等花香型香精，在香水香精中用它協調整個香氣。這種從樹葉中提取的香油來自東南亞，香氣類似於大花茉莉，但更粗強而留長。開花2周以後，茉莉般的馨香才瀰漫開來，這時就要立即將香味採集下來，所以蒸餾往往是在現場進行的。一棵樹一年大約開22磅重的鮮花，而兩磅重的香油差不多要用掉900磅的花朵。'),
('','睡蓮','nymphaea',''),
('','琥珀','amber',''),
('','胡椒','pepper',''),
('','馬鞭草','verbena',''),
('','天竺葵','pelargonium',''),
('','蓮花','nelumbo',''),
('','雛菊','daisy',''),
('','薄荷','mint',''),
('','水仙花','daffodil',''),
('','木瓜','papaya',''),
('','含羞草','mimosa',''),
('','佛手柑','buddhahand',''),
('','小荳蔻','cardamom',''),
('','檜木','hinoki',''),
('','石竹','dianthus',''),
('','小蒼蘭','freesia',''),
('','丁香','clove',''),
('','青蘋果','greenapple',''),
('','牡丹','peony',''),
('','椰子','coconut',''),
('','當歸','angelica',''),
('','梨花','pearflower',''),
('','胡蘿蔔','carrot',''),
('','菸草','tabacum',''),
('','金銀花','honeysuckle',''),
('','小黃瓜','cucumber',''),
('','薑','ginger',''),
('','木炭','',''),
('','竹子','',''),
('','藏紅花','',''),
('','肉桂','',''),
('','紅茶','',''),
('','紙莎草','',''),
('','無花果','',''),
('','多香果','pimienta',''),
('','','',''),
('','','',''),
('','','',''),
('','','',''),
('','','',''),
('','','',''),
('','','',''),
('','','',''),


select spice_list f

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
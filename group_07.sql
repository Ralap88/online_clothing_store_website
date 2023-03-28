-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- 主機： 127.0.0.1
-- 產生時間： 
-- 伺服器版本： 10.1.38-MariaDB
-- PHP 版本： 7.3.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- 資料庫： `group_07`
--
CREATE DATABASE IF NOT EXISTS `group_07` DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci;
USE `group_07`;

-- --------------------------------------------------------

--
-- 資料表結構 `admin`
--

CREATE TABLE `admin` (
  `admin_account` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `admin_password` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- 傾印資料表的資料 `admin`
--

INSERT INTO `admin` (`admin_account`, `admin_password`) VALUES
('admin', 'admin123456');

-- --------------------------------------------------------

--
-- 資料表結構 `comment`
--

CREATE TABLE `comment` (
  `comment_name` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `comment_detail` varchar(100) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- 傾印資料表的資料 `comment`
--

INSERT INTO `comment` (`comment_name`, `comment_detail`) VALUES
('test1', 't\r\ne\r\ns\r\nt\r\n1'),
('test2', 'test2'),
('test3', 'test3');

-- --------------------------------------------------------

--
-- 資料表結構 `member_profile`
--

CREATE TABLE `member_profile` (
  `mp_name` varchar(8) COLLATE utf8_unicode_ci DEFAULT NULL,
  `mp_gender` varchar(2) COLLATE utf8_unicode_ci DEFAULT NULL,
  `mp_contact` int(10) DEFAULT NULL,
  `mp_email` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL,
  `mp_address` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL,
  `mp_account` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `mp_password` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `mp_ans_to_Q1` varchar(15) COLLATE utf8_unicode_ci DEFAULT NULL,
  `mp_ans_to_Q2` varchar(15) COLLATE utf8_unicode_ci DEFAULT NULL,
  `mp_ans_to_Q3` varchar(15) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- 傾印資料表的資料 `member_profile`
--

INSERT INTO `member_profile` (`mp_name`, `mp_gender`, `mp_contact`, `mp_email`, `mp_address`, `mp_account`, `mp_password`, `mp_ans_to_Q1`, `mp_ans_to_Q2`, `mp_ans_to_Q3`) VALUES
('final', '男', 0, 'sara975322@gmail.com', 'final', 'final', 'finalfinal', 'Hsinchu', 'final', 'final'),
('Bob', '男', 912345678, 'bob@gmail.com', 'Taiwan', 'member', 'member123456', 'member', 'member', 'member'),
('ererer', '女', 912345678, 'sara975322@gmail.com', 'Taiwan', 'test1', 'ererer', 'test1', 'test1', 'test1');

-- --------------------------------------------------------

--
-- 資料表結構 `order`
--

CREATE TABLE `order` (
  `o_member_account` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `o_product` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `o_product_number` int(3) NOT NULL,
  `o_product_id` int(3) NOT NULL,
  `o_product_no` int(5) NOT NULL,
  `o_name` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `o_phone` int(10) NOT NULL,
  `o_delivery` int(1) NOT NULL,
  `o_payment` int(1) NOT NULL,
  `o_address` varchar(20) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- 傾印資料表的資料 `order`
--

INSERT INTO `order` (`o_member_account`, `o_product`, `o_product_number`, `o_product_id`, `o_product_no`, `o_name`, `o_phone`, `o_delivery`, `o_payment`, `o_address`) VALUES
('member', 'test1', 1, 1, 1, 'bob', 912345678, 1, 1, 'test1'),
('test1', 'test1', 1, 1, 1, 'test1', 1, 1, 1, 'test1'),
('test2', 'test2', 2, 2, 2, 'test2', 2, 2, 2, 'test2');

-- --------------------------------------------------------

--
-- 資料表結構 `product`
--

CREATE TABLE `product` (
  `product_number` int(20) NOT NULL,
  `product_id` int(3) NOT NULL,
  `product_category` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `product_no` int(5) NOT NULL,
  `product_name` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `product_price` int(5) DEFAULT NULL,
  `product_introduction` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `product_path` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- 傾印資料表的資料 `product`
--

INSERT INTO `product` (`product_number`, `product_id`, `product_category`, `product_no`, `product_name`, `product_price`, `product_introduction`, `product_path`) VALUES
(13, 1, 'clothing', 0, '機車皮夾克', 1880, '質感霧面皮革面料， 頂級小羊皮， 下擺調節式設計，\r\n\r\n率性風格， 穿出知性的時尚魅力\r\n\r\n材質: 聚酯纖維\r\n\r\n類型: 外套\r\n\r\nColor/顏色：卡其色 / 黑色', 'img/men/cloth1'),
(15, 1, 'clothing', 1, 'STAFF圓領T', 200, '圓領上衣各種風格都能駕馭，百搭必備首選！\r\n\r\n帶有彈力的高含棉料舒適修身，彰顯魅力\r\n\r\n正面大字點綴，擺脫平凡感\r\n\r\n材質: 聚酯纖維\r\n\r\n類型: 外套\r\n\r\nColor/顏色：白色 / 黑色', 'img/men/cloth2'),
(7, 1, 'shoes', 2, '慢跑鞋', 1090, '單位cm 24.5 EUR歐碼39 US美碼7 UK英碼6.5p\r\n\r\n單位cm 25 EUR歐碼40 US美碼7.5 UK英碼7\r\n\r\n單位cm 26 EUR歐碼42 US美碼8.5 UK英碼8\r\n', 'img/men/shoe2'),
(6, 1, 'shoes', 3, '高筒休閒帆布鞋', 1090, '單位cm 24.5 EUR歐碼39 US美碼7 UK英碼6.5p\r\n\r\n單位cm 25 EUR歐碼40 US美碼7.5 UK英碼7\r\n\r\n單位cm 26 EUR歐碼42 US美碼8.5 UK英碼8\r\n', 'img/men/shoe1'),
(28, 1, 'accessory', 4, '金褐圓框眼鏡', 350, '立體鼻樑墊高設計\r\n\r\n時尚雙層邊框\r\n\r\n日韓雜誌推薦.本季最HOT潮流單品\r\n\r\n材質: 鐵、玻璃\r\n\r\n類型: 飾品\r\n\r\nColor/顏色：金褐色', 'img/men/accessory2'),
(23, 1, 'accessory', 5, '別針漁夫帽', 350, '採用較寬帽沿的剪裁，\r\n\r\n質感的純色調搭配漁夫帽版型\r\n\r\n能完整遮陽且有型加分\r\n\r\n材質: 布面、混棉\r\n\r\n類型: 帽\r\n\r\nColor/顏色：黑色/ 卡其色/ 藏青色', 'img/men/accessory1'),
(16, 2, 'clothing', 0, '韓系碎花裙', 489, '柔美飄逸的雪紡材質，增添女孩浪漫氛圍。 繽紛碎花印花更凸顯少女浪漫風情。\r\n\r\n全鬆緊腰頭方便穿脫，蛋糕裙襬散發微甜感。 此款1色蛋糕長裙，讓妳輕鬆穿出田園渡假風格\r\n\r\n材質: 100%聚酯纖維，無', 'img/women/cloth1'),
(17, 2, 'clothing', 1, '騎士皮夾克', 1219, '選用舒適質感皮革，搭配羊羔毛內裡，防風特性給予溫暖親膚感受。\r\n\r\n純色簡約短版、率性細節設計，隨興搭配穿出妳的時尚質感品味。\r\n\r\n簡單變換可搭配出旅遊穿搭、優雅主管穿搭、韓系流行穿搭等不同風格。\r', 'img/women/cloth2'),
(2, 2, 'shoes', 2, '厚底帆布鞋', 2990, '單位cm 23 US美碼5.5~6\r\n\r\n單位cm 23.5 US美碼6~6.5\r\n\r\n單位cm 24 US美碼6.5~7\r\n\r\n單位cm 24.5 US美碼7~7.5\r\n\r\n材質: 鞋面：棉100%', 'img/women/shoe2'),
(1, 2, 'shoes', 3, '高跟皮靴', 2990, '單位cm 23 US美碼5.5~6  單位cm 23.5 US美碼6~6.5  單位cm 24 US美碼6.5~7  單位cm 24.5 US美碼7~7.5  材質: 鞋面：棉100%(使用有機棉10', 'img/women/shoe1'),
(0, 2, 'accessory', 4, ' 漁夫帽', 350, '採用較寬帽沿的剪裁， 質感的純色調搭配漁夫帽版型 能完整遮陽且有型加分 材質: 布面、混棉 類型: 帽 Color/顏色：黑色/ 卡其色/ 藏青色', 'img/women/accessory2'),
(20, 2, 'accessory', 5, '黑底碎花棒球帽', 399, '棉布材質柔軟舒適.不悶熱又透氣\r\n\r\n隨性穿著.增添時尚流行的元素\r\n\r\n日韓雜誌推薦.本季最HOT潮流單品\r\n\r\n材質: 布面、混棉\r\n\r\n類型: 帽\r\n\r\nColor/顏色：黑底白花', 'img/women/accessory1'),
(18, 3, 'clothing', 0, '細肩帶休閒背心', 250, '版型修身 讓兩側腰線完美的展現 結合面料的彈力性，貼合身體不至於束身\r\n\r\n柔軟親膚，不起球不縮水的，各種顏色都很好搭配\r\n\r\n材質: 棉+聚脂纖維\r\n\r\n類型: 平口\r\n\r\n款式: 素面\r\n\r\n顏色', 'img/summer/cloth1'),
(14, 3, 'clothing', 1, '百搭圓領素T', 150, '版型修身 讓兩側腰線完美的展現 結合面料的彈力性，貼合身體不至於束身\r\n\r\n柔軟親膚，不起球不縮水的，各種顏色都很好搭配\r\n\r\n材質: 棉+聚脂纖維\r\n\r\n類型: 平口\r\n\r\n款式: 素面\r\n\r\nCo', 'img/summer/cloth2'),
(25, 3, 'shoes', 2, '夏日平底鞋', 699, '單位cm 23 US美碼5.5~6\r\n\r\n單位cm 23.5 US美碼6~6.5\r\n\r\n單位cm 24 US美碼6.5~7\r\n\r\n單位cm 24.5 US美碼7~7.5\r\n\r\n材質: 鞋面：皮革。鞋底', 'img/summer/shoe2'),
(8, 3, 'shoes', 3, '夏日必備經典小白鞋', 699, '單位cm 23 US美碼5.5~6\r\n\r\n單位cm 23.5 US美碼6~6.5\r\n\r\n單位cm 24 US美碼6.5~7\r\n\r\n單位cm 24.5 US美碼7~7.5\r\n\r\n材質: 鞋面：皮革。鞋底', 'img/summer/shoe1'),
(27, 3, 'accessory', 4, '金褐太陽眼鏡', 599, '立體鼻樑墊高設計\r\n\r\n時尚雙層邊框\r\n\r\n日韓雜誌推薦.本季最HOT潮流單品\r\n\r\n材質: 鐵、玻璃\r\n\r\n類型: 飾品\r\n\r\nColor/顏色：金褐色', 'img/summer/accessory2'),
(21, 3, 'accessory', 5, '黑底碎花棒球帽', 399, '棉布材質柔軟舒適.不悶熱又透氣\r\n\r\n隨性穿著.增添時尚流行的元素\r\n\r\n日韓雜誌推薦.本季最HOT潮流單品\r\n\r\n材質: 布面、混棉\r\n\r\n類型: 帽\r\n\r\nColor/顏色：黑底白花', 'img/summer/accessory1'),
(10, 4, 'clothing', 0, '羽絨長大衣', 1449, '選用柔軟且手感細膩的羽絨棉，保暖性更勝羽絨， 立領搭配蓬鬆的毛邊及袖子縮口設計，抵擋寒風溫暖加倍\r\n\r\n清爽的配色及長版的設計好搭又時尚，是人人都需要擁有的優質單品!\r\n\r\n材質: 聚脂纖維\r\n\r\n類', 'img/winter/cloth1'),
(11, 4, 'clothing', 1, 'andar帽T', 499, '素面連帽棉Tee，素面簡單百搭好看\r\n\r\n舒服的棉料材質很好穿，連帽設計更有造型感\r\n\r\n搭配牛仔褲，來個帥氣的穿搭吧\r\n\r\n材質: 純棉\r\n\r\n類型: 帽T\r\n\r\nColor/顏色：黑色 / 灰色 ', 'img/winter/cloth2'),
(3, 4, 'shoes', 2, '保暖加絨棉鞋', 6990, '單位cm 23 US美碼5.5~6\r\n\r\n單位cm 23.5 US美碼6~6.5\r\n\r\n單位cm 24 US美碼6.5~7\r\n\r\n單位cm 24.5 US美碼7~7.5\r\n\r\n材質: 鞋面：皮革。鞋底', 'img/winter/shoe2'),
(4, 4, 'shoes', 3, '6吋黃金靴', 6990, '單位cm 23 US美碼5.5~6\r\n\r\n單位cm 23.5 US美碼6~6.5\r\n\r\n單位cm 24 US美碼6.5~7\r\n\r\n單位cm 24.5 US美碼7~7.5\r\n\r\n材質: 鞋面：皮革。鞋底', 'img/winter/shoe1'),
(24, 4, 'accessory', 4, '格子圍巾', 350, '簡簡單單的大格紋色\r\n\r\n配上流蘇的自然設計\r\n\r\n讓層次上有堆疊的美麗\r\n\r\n搭出復古的藝術STYLE\r\n\r\n可愛毛球，造型更加分\r\n\r\n材質: 100%美麗諾羊毛，無彈性\r\n\r\n類型: 帽\r\n\r\n', 'img/winter/accessory2'),
(29, 4, 'accessory', 5, '毛線鴨舌帽', 249, '兔毛混紡，內裡加厚加絨，保暖效果超級好\r\n\r\n觸感柔軟舒適、親膚，不會刺刺的\r\n\r\n頭圍54-60皆可配戴\r\n\r\n針織彈力帽圍\r\n\r\n可愛毛球，造型更加分\r\n\r\n材質: 兔毛混紡\r\n\r\n類型: 帽\r\n', 'img/winter/accessory1'),
(12, 5, 'clothing', 0, '男友牛仔外套', 599, '這款牛仔外套是重磅材質， 不會薄的像襯衫更不用擔心會皺巴巴\r\n\r\n寬鬆剪裁非常好看 跟男友一起穿也很合適\r\n\r\n材質: 純棉\r\n\r\n類型: 帽T\r\n\r\nColor/顏色：深藍色 / 灰藍色 / 白色', 'img/spring/cloth1'),
(19, 5, 'clothing', 1, '日系寬褲', 499, '雪紡打褶寬褲， 選用滑順免燙不易皺的質感面料， 給肌膚親柔舒適的感受， 即便久坐也不擔心壓痕的問題，\r\n\r\n寬鬆的褲型隱藏肉肉腿， 穿出知性的時尚魅力\r\n\r\n材質: 7%聚酯纖維+3%彈性纖維，有彈性', 'img/spring/cloth2'),
(5, 5, 'shoes', 2, '懶人鞋', 1090, '單位cm 23 US美碼5.5~6\r\n\r\n單位cm 23.5 US美碼6~6.5\r\n\r\n單位cm 24 US美碼6.5~7\r\n\r\n單位cm 24.5 US美碼7~7.5\r\n\r\n材質: 鞋面：皮革。鞋底', 'img/spring/shoe2'),
(9, 5, 'shoes', 3, '透氣慢跑鞋', 1090, '單位cm 23 US美碼5.5~6\r\n\r\n單位cm 23.5 US美碼6~6.5\r\n\r\n單位cm 24 US美碼6.5~7\r\n\r\n單位cm 24.5 US美碼7~7.5\r\n\r\n材質: 鞋面：皮革。鞋底', 'img/spring/shoe1'),
(26, 5, 'accessory', 4, '黑絨帽', 500, '不退流行的八角帽款式，\r\n\r\n搭配短毛絨面的柔軟觸感，\r\n\r\n配戴更舒適溫暖，純色質感適合搭配多種造型\r\n\r\n材質: 100%聚酯纖維\r\n\r\n類型: 帽\r\n\r\nColor/顏色：黑色\r\n\r\n', 'img/spring/accessory2'),
(22, 5, 'accessory', 5, '提花貝雷帽', 500, '羊羔絨的舒適手感更增添配戴的保暖性\r\n\r\n搭配流行的貝雷帽款式，可愛甜美穿搭輕鬆完成\r\n\r\n可調整式頭圍貼心符合個人頭型\r\n\r\n材質: 50%羊毛+50%兔毛\r\n\r\n類型: 帽\r\n\r\nColor/顏色', 'img/spring/accessory1');

-- --------------------------------------------------------

--
-- 資料表結構 `shopping_cart`
--

CREATE TABLE `shopping_cart` (
  `sc_member_account` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `sc_product` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `sc_product_number` int(3) DEFAULT NULL,
  `sc_product_id` int(3) DEFAULT NULL,
  `sc_product_no` int(5) DEFAULT NULL,
  `sc_name` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `sc_phone` int(10) DEFAULT NULL,
  `sc_delivery` int(1) DEFAULT NULL,
  `sc_payment` int(1) DEFAULT NULL,
  `sc_address` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- 傾印資料表的資料 `shopping_cart`
--

INSERT INTO `shopping_cart` (`sc_member_account`, `sc_product`, `sc_product_number`, `sc_product_id`, `sc_product_no`, `sc_name`, `sc_phone`, `sc_delivery`, `sc_payment`, `sc_address`) VALUES
('member', '21212', 21212, 2, 2, 'member', 121212, 1, 2, '1212'),
(NULL, '0', 0, 1, 0, NULL, NULL, NULL, NULL, NULL),
(NULL, '0', 0, 1, 1, NULL, NULL, NULL, NULL, NULL),
(NULL, '0', 0, 1, 1, NULL, NULL, NULL, NULL, NULL),
(NULL, '0', 0, 1, 1, NULL, NULL, NULL, NULL, NULL),
(NULL, '0', 0, 1, 0, NULL, NULL, NULL, NULL, NULL),
(NULL, '0', 0, 1, 0, NULL, NULL, NULL, NULL, NULL),
(NULL, '0', 0, 1, 0, NULL, NULL, NULL, NULL, NULL),
(NULL, '0', 0, 1, 1, NULL, NULL, NULL, NULL, NULL);

--
-- 已傾印資料表的索引
--

--
-- 資料表索引 `member_profile`
--
ALTER TABLE `member_profile`
  ADD PRIMARY KEY (`mp_account`);

--
-- 資料表索引 `order`
--
ALTER TABLE `order`
  ADD PRIMARY KEY (`o_member_account`);

--
-- 資料表索引 `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`product_id`,`product_no`,`product_name`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

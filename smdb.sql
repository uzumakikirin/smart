-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 25, 2019 at 01:31 PM
-- Server version: 10.3.16-MariaDB
-- PHP Version: 7.3.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `smdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `blog`
--

CREATE TABLE `blog` (
  `b_id` int(11) NOT NULL,
  `b_title` varchar(255) NOT NULL,
  `b_body` text NOT NULL,
  `b_image` varchar(255) NOT NULL,
  `user_id` int(11) NOT NULL,
  `b_createdat` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `blog`
--

INSERT INTO `blog` (`b_id`, `b_title`, `b_body`, `b_image`, `user_id`, `b_createdat`) VALUES
(1, 'POST ONE\r\n', 'What is Lorem Ipsum?\r\nLorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 'image.jpg', 6, '2019-06-19 11:27:02'),
(2, 'Hawaii known as the Big Island\r\n', 'Even the all-powerful Pointing has no control about the blind texts it is an almost unorthographic life One day however a small line of blind text by the name of Lorem Ipsum decided to leave for the far World of Grammar.', 'image.jpg', 6, '2019-06-19 11:27:05');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `crt_id` int(10) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `p_id` int(11) NOT NULL,
  `num` int(20) NOT NULL,
  `delete_flg` tinyint(2) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`crt_id`, `user_id`, `p_id`, `num`, `delete_flg`) VALUES
(34, 6, 12, 1, 0),
(35, 6, 11, 1, 0),
(36, 9, 12, 6, 0),
(37, 6, 10, 0, 1),
(38, 10, 11, 1, 0),
(39, 6, 13, 1, 0),
(40, 6, 8, 1, 0),
(41, 8, 12, 1, 0),
(42, 8, 8, 1, 0),
(43, 8, 11, 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `ctg_id` int(11) NOT NULL,
  `category_name` varchar(255) NOT NULL,
  `delete_flg` tinyint(2) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`ctg_id`, `category_name`, `delete_flg`) VALUES
(1, 'Vegetables', 0),
(2, 'Fruits', 0),
(3, 'Drinks', 0),
(4, 'Medicine', 0);

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `p_id` int(11) NOT NULL,
  `p_name` varchar(255) NOT NULL,
  `p_detail` varchar(255) NOT NULL,
  `p_price` decimal(65,0) NOT NULL,
  `p_image` varchar(255) NOT NULL,
  `p_ctg_id` tinyint(65) NOT NULL,
  `delete_flg` tinyint(2) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`p_id`, `p_name`, `p_detail`, `p_price`, `p_image`, `p_ctg_id`, `delete_flg`) VALUES
(1, 'たまねぎ', '染色体数は2n=16。生育適温は20℃前後で、寒さには強く氷点下でも凍害はほとんど見られないが、25℃以上の高温では生育障害が起こる。', '100', 'tamanegi.jpg', 1, 0),
(2, 'にんじん', '細長い東洋系品種と、太く短い西洋系品種の2種類に大別され、ともに古くから薬や食用としての栽培が行われてきた。', '150', 'ninjin.jpg', 1, 0),
(3, 'ピーマン', 'ピーマン自体はトウガラシの品種の一つであり、果実は肉厚でカプサイシンを含まない。', '50', 'pi-man.jpg', 1, 0),
(4, 'なす', '世界の各地で独自の品種が育てられている。加賀茄子などの一部例外もあるが日本においては南方ほど長実または大長実で、北方ほど小実品種となる。', '120', 'なす.jpg', 1, 0),
(5, 'みかん', '日本の代表的な果物で、バナナのように、素手で容易に果皮をむいて食べることができるため、冬になれば炬燵の上にミカンという光景が一般家庭に多く見られる。', '30', 'mikan.jpg', 2, 0),
(6, 'りんご', '現在日本で栽培されているものは、明治時代以降に導入されたもの。病害抵抗性、食味、収量などの点から品種改良が加えられる。', '100', 'ringo.jpg', 2, 0),
(7, 'ぶどう', '葉は両側に切れ込みのある15 - 20cmほどの大きさで、穂状の花をつける。', '130', 'budou.jpg', 2, 0),
(8, 'いちご', 'イチゴとして流通しているものは、ほぼ全てオランダイチゴである。', '250', 'ichigo.jpg', 2, 0),
(9, 'コーラ', '複数あるコーラ飲料製造社ではこれらの香味料以外にその会社独自の香味料を加えることで独自の製品として開発している。', '120', 'cola.jpg', 3, 0),
(10, 'カルピス', '企業としてのカルピスの創業者は、僧侶出身の三島海雲。創業初期は国分グループだった。', '120', 'karupisu.jpg', 3, 0),
(11, 'ウーロン茶', '烏龍茶（ウーロンちゃ）は、中国茶のうち青茶（せいちゃ、あおちゃ）と分類され、茶葉を発酵途中で加熱して発酵を止め、半発酵させた茶である。', '110', 'u-rontya.jpg', 3, 0),
(12, 'ミネラルウォーター', 'ミネラルウォーター（Mineral water）とは、容器入り飲料水のうち、地下水を原水とするものを言う。', '100', 'water.jpg', 3, 0),
(13, 'croma extra', 'beer drinks', '670', 'croma extra.jpg', 3, 0);

-- --------------------------------------------------------

--
-- Table structure for table `transaction`
--

CREATE TABLE `transaction` (
  `tran_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `payment_method` int(11) NOT NULL,
  `payment_status` int(11) NOT NULL,
  `trandate` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `full_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `dob` varchar(255) NOT NULL,
  `gender` tinyint(2) DEFAULT NULL,
  `contact` varchar(32) NOT NULL,
  `address` varchar(255) NOT NULL,
  `image_name` varchar(255) NOT NULL DEFAULT 'avatar.jpg',
  `image_path` varchar(255) NOT NULL DEFAULT 'http://localhost/smart/public/image/upload',
  `password` varchar(255) NOT NULL,
  `type` tinyint(2) NOT NULL DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `full_name`, `email`, `dob`, `gender`, `contact`, `address`, `image_name`, `image_path`, `password`, `type`, `created_at`) VALUES
(3, 'Prabin Shrestha', 'prabin@gmail.com', '', NULL, '', '', 'avatar.jpg', 'http://localhost/smart/public/image/upload', '$2y$10$ZvvUNBZeeXU9t26VbeXc6.feLEx9fu.z0/IeN29ed50zU5qcAxyFi', 0, '2019-06-15 14:52:12'),
(4, 'Ganga Shrestha', 'ganga@gmail.com', '', NULL, '', '', 'avatar.jpg', 'http://localhost/smart/public/image/upload', '$2y$10$e7ERcCPHXMZIxLxm.boiJuw1s5VytcBIX93YRMfRrYK8vK7.hJSGm', 0, '2019-06-15 14:54:58'),
(5, 'Jamuna Shrestha', 'jamuna@gmail.com', '', NULL, '', '', 'avatar.jpg', 'http://localhost/smart/public/image/upload', '$2y$10$l0rFHxa7KPuxCle.FulOteGqrspKhsZx/K80eD8eg0Re.iPYjr00G', 0, '2019-06-15 14:56:55'),
(6, 'Shrestha Pradhuman', 'pradhuman@gmail.com', '1989/01/19', 2, '090-9294-4349', 'Maebarnishi, funabashi, chiba', 'Shrestha Pradhuman1564780874.jpg', 'http://localhost/smart/public/image/upload', '$2y$10$Z6J5smA6Udxw0Gr8Uf385eB4ZTw.1GzC3kTNX9Dp9n9/MrlNt2mom', 1, '2019-06-15 14:57:41'),
(7, 'Prince Rc', 'prince@gmail.com', '', NULL, '', '', 'avatar.jpg', 'http://localhost/smart/public/image/upload', '$2y$10$WHnaUfApWTZuYt4VNAKvMufNeMByJpAZpR2Pqb.RxAw0qcWs5ozsm', 0, '2019-06-15 15:30:03'),
(8, 'Barsha Rai', 'barsha@gmail.com', '1989/01/19', 2, '090-9294-4349', 'Maebarahigashi funabashi chiba', 'Barsha Rai1560654235.jpg', 'http://localhost/smart/public/image/upload', '$2y$10$m.gJ8NkCiWfaQGlOGwSW2.7b7rJ5d9Nxxjq9WrWWchG8KqpnZOFUq', 0, '2019-06-16 02:54:07'),
(9, 'bishnu', 'bishnu@gmail.com', '1989/04/18', 1, '09098909999', 'gharbhari', 'bishnu1563944019.jpg', 'http://localhost/smart/public/image/upload', '$2y$10$sVoQFWIRm9MfqBwBBf.gFukrWDT8Ole2mz6qMkaGe1crLbbZUnLiG', 0, '2019-07-24 04:52:22'),
(10, 'test', 'test@g.com', '', NULL, '', '', 'avatar.jpg', 'http://localhost/smart/public/image/upload', '$2y$10$2yGtPQLsK/Nsq./YN.FpPugafY/fav20PZ6IUdQ20TWdJMC9PGaxG', 0, '2019-08-01 07:45:37');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `blog`
--
ALTER TABLE `blog`
  ADD PRIMARY KEY (`b_id`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`crt_id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`ctg_id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`p_id`);

--
-- Indexes for table `transaction`
--
ALTER TABLE `transaction`
  ADD PRIMARY KEY (`tran_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `blog`
--
ALTER TABLE `blog`
  MODIFY `b_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `crt_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `ctg_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `p_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `transaction`
--
ALTER TABLE `transaction`
  MODIFY `tran_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

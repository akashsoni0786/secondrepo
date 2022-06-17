-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: mysql-server
-- Generation Time: Jun 17, 2022 at 09:54 AM
-- Server version: 8.0.19
-- PHP Version: 7.4.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `myStore`
--

-- --------------------------------------------------------

--
-- Table structure for table `Orders`
--

CREATE TABLE `Orders` (
  `order_id` int UNSIGNED NOT NULL,
  `user_id` int UNSIGNED NOT NULL,
  `status` enum('pending','approved','delivered') DEFAULT NULL,
  `total_amount` varchar(20) DEFAULT NULL,
  `shipping_address` varchar(100) DEFAULT NULL,
  `shipping_pincode` varchar(50) DEFAULT NULL,
  `order_date` datetime DEFAULT NULL,
  `delivery_date` datetime DEFAULT NULL,
  `users_name` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `Orders`
--

INSERT INTO `Orders` (`order_id`, `user_id`, `status`, `total_amount`, `shipping_address`, `shipping_pincode`, `order_date`, `delivery_date`, `users_name`) VALUES
(425, 122, 'delivered', '0', 'f f f f', '222222', '2022-06-07 10:24:46', '2022-06-10 10:24:46', NULL),
(426, 122, 'pending', '0', 'f f f f', '222222', '2022-06-07 10:24:49', '2022-06-10 10:24:49', NULL),
(427, 122, 'approved', '3667', 'dd dd d dd', '333333', '2022-06-07 10:29:13', '2022-06-10 10:29:13', NULL),
(428, 122, 'pending', '3667', 'h h h h', '333333', '2022-06-07 10:29:58', '2022-06-10 10:29:58', NULL),
(429, 122, 'delivered', '2423423', 'd d d d', '222222', '2022-06-07 10:30:49', '2022-06-10 10:30:49', NULL),
(434, 128, 'delivered', '43742', 'fdsfdsf sdfdsf dsf dsf', '333333', '2022-06-08 12:36:54', '2022-06-11 12:36:54', NULL),
(435, 111, 'pending', '3322', 'sgdfsghdf zshghdgfshjgs dfsgdfgbdfg hgdfhdfsgh', '333333', '2022-06-10 05:12:13', '2022-06-13 05:12:13', NULL),
(436, 111, 'pending', '345', 'bvgdfcvgbdf vbgdfvbdfg dfgdfg bvdfzgbdfg', '333333', '2022-06-10 05:15:48', '2022-06-13 05:15:48', NULL),
(437, 111, 'pending', '345', 'fgdhsgfdhfgs hdhdgfsh gfhgfh gfshgfsh', '333333', '2022-06-10 05:17:54', '2022-06-13 05:17:54', NULL),
(438, 111, 'pending', '345', 'bcvbcvb xcvbxcvb bcvxbcv cxvbxcv', '333333', '2022-06-10 05:18:49', '2022-06-13 05:18:49', NULL),
(439, 111, 'pending', '2427301', 'dfgdf sgdfgdf dfgdfg gfdsgdfg', '333333', '2022-06-10 05:19:24', '2022-06-13 05:19:24', NULL),
(440, 111, 'pending', '345', 'vxcv xcvxcv xcvxcv xcv', '333333', '2022-06-10 05:19:50', '2022-06-13 05:19:50', NULL),
(443, 111, 'pending', '345', 'gdfg dfsgdfsg gdfg dfsgdf', '333333', '2022-06-10 05:29:25', '2022-06-13 05:29:25', NULL),
(444, 111, 'pending', '0', 'gdfg dfsgdfsg gdfg dfsgdf', '333333', '2022-06-10 05:29:28', '2022-06-13 05:29:28', NULL),
(445, 111, 'pending', '0', 'jghj ghjghfj hjghjhg ghfjgjg', '333333', '2022-06-10 05:29:45', '2022-06-13 05:29:45', NULL),
(446, 111, 'pending', '0', 'dfgdfg dfgdfgdfsg dsfg sdfgdfsg', '333333', '2022-06-10 05:30:41', '2022-06-13 05:30:41', NULL),
(447, 111, 'approved', '0', 'dfgdfg dfgdfgdfsg dsfg sdfgdfsg', '333333', '2022-06-10 05:30:43', '2022-06-13 05:30:43', NULL),
(448, 111, 'pending', '0', 'jghjghj ghj ghjghjh ghjghj', '333333', '2022-06-10 05:32:53', '2022-06-13 05:32:53', NULL),
(449, 111, 'pending', '0', 'jghjghj ghj ghjghjh ghjghj', '333333', '2022-06-10 05:32:56', '2022-06-13 05:32:56', NULL),
(450, 111, 'pending', '0', 'jghjghj ghj ghjghjh ghjghj', '333333', '2022-06-10 05:33:00', '2022-06-13 05:33:00', NULL),
(451, 111, 'pending', '3322', 'xcvxcvcx vxcv vcxv xcvxc', '333333', '2022-06-10 05:37:34', '2022-06-13 05:37:34', NULL),
(452, 111, 'pending', '0', 'xcvxcvcx vxcv vcxv xcvxc', '333333', '2022-06-10 05:38:02', '2022-06-13 05:38:02', NULL),
(453, 111, 'pending', '0', 'xcvxcvcx vxcv vcxv xcvxc', '333333', '2022-06-10 05:40:34', '2022-06-13 05:40:34', NULL),
(454, 111, 'pending', '345', 'dfdsf sdfdsf fsdf dsfdsfds', '333333', '2022-06-10 05:42:34', '2022-06-13 05:42:34', NULL),
(455, 111, 'pending', '3667', 'dsfdsf dsfds dsfdsf fdsf', '333333', '2022-06-10 05:43:26', '2022-06-13 05:43:26', NULL),
(456, 111, 'pending', '3322', 'cvbcvb cvbcv cvbcv bcvb', '333333', '2022-06-10 05:45:48', '2022-06-13 05:45:48', NULL),
(457, 129, 'delivered', '2427435', 'kh 4/584 fyghjuk lko up', '898989', '2022-06-10 12:20:23', '2022-06-13 12:20:23', NULL),
(458, 128, 'pending', '6855', '121212 2121212112 12121 212', '123456', '2022-06-13 04:15:47', '2022-06-16 04:15:47', NULL),
(459, 128, 'pending', '2343273640', 'dfghj fghj fghj ghj', '222222', '2022-06-16 13:55:00', '2022-06-19 13:55:00', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `Order_items`
--

CREATE TABLE `Order_items` (
  `order_id` int UNSIGNED NOT NULL,
  `product_id` int UNSIGNED NOT NULL,
  `quantity` int UNSIGNED NOT NULL,
  `related_price` int UNSIGNED NOT NULL,
  `transaction_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `Order_items`
--

INSERT INTO `Order_items` (`order_id`, `product_id`, `quantity`, `related_price`, `transaction_id`) VALUES
(427, 10105, 1, 3322, 39),
(427, 10106, 1, 345, 40),
(428, 10105, 1, 3322, 41),
(428, 10106, 1, 345, 42),
(429, 10104, 1, 2423423, 43),
(434, 10105, 13, 43186, 51),
(434, 10106, 1, 345, 52),
(434, 10109, 1, 211, 53),
(435, 10105, 1, 3322, 54),
(436, 10106, 1, 345, 55),
(437, 10106, 1, 345, 56),
(438, 10106, 1, 345, 57),
(439, 10105, 1, 3322, 58),
(439, 10104, 1, 2423423, 59),
(439, 10106, 1, 345, 60),
(439, 10109, 1, 211, 61),
(440, 10106, 1, 345, 62),
(443, 10106, 1, 345, 63),
(451, 10105, 1, 3322, 64),
(454, 10106, 1, 345, 65),
(455, 10105, 1, 3322, 66),
(455, 10106, 1, 345, 67),
(456, 10105, 1, 3322, 68),
(457, 10104, 1, 2423423, 69),
(457, 10105, 1, 3322, 70),
(457, 10106, 2, 690, 71),
(458, 10105, 2, 6644, 72),
(458, 10109, 1, 211, 73),
(459, 10122, 87, 20184, 74),
(459, 10124, 1, 2343253456, 75);

-- --------------------------------------------------------

--
-- Table structure for table `Products`
--

CREATE TABLE `Products` (
  `product_id` int UNSIGNED NOT NULL,
  `product_name` varchar(100) DEFAULT NULL,
  `product_image` varchar(1000) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `product_category` enum('electronics','fashion','home appliances','furniture','jewellery') DEFAULT NULL,
  `product_sale_price` varchar(20) DEFAULT NULL,
  `product_list_price` varchar(20) DEFAULT NULL,
  `product_quantity` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `Products`
--

INSERT INTO `Products` (`product_id`, `product_name`, `product_image`, `product_category`, `product_sale_price`, `product_list_price`, `product_quantity`) VALUES
(10104, 'asdgfhfhg', 'https://images.unsplash.com/photo-1485875437342-9b39470b3d95?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1173&q=80', 'furniture', '2423423', '423432', 42343232),
(10105, 'sdsdss', 'https://images.unsplash.com/photo-1485875437342-9b39470b3d95?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1173&q=80', 'electronics', '3322', '2222', 22),
(10106, 'asd', 'https://images.unsplash.com/photo-1485875437342-9b39470b3d95?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1173&q=80', 'electronics', '345', '342', 6546),
(10109, 'asd', 'https://images.unsplash.com/photo-1485875437342-9b39470b3d95?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1173&q=80', 'home appliances', '211', '121', 2),
(10121, 'a', 'https://images.unsplash.com/photo-1485875437342-9b39470b3d95?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1173&q=80', 'furniture', '43', '4435', 345),
(10122, 'vfdsxv', 'https://images.unsplash.com/photo-1485875437342-9b39470b3d95?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1173&q=80', 'fashion', '232', '2323', 2323),
(10124, 'lksdlj c', 'https://images.unsplash.com/photo-1485875437342-9b39470b3d95?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1173&q=80', 'jewellery', '2343253456', '45654675445', 546);

-- --------------------------------------------------------

--
-- Table structure for table `Users`
--

CREATE TABLE `Users` (
  `user_id` int UNSIGNED NOT NULL,
  `password` varchar(100) DEFAULT NULL,
  `firstname` varchar(100) DEFAULT NULL,
  `lastname` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `address` varchar(100) DEFAULT NULL,
  `pincode` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `Users`
--

INSERT INTO `Users` (`user_id`, `password`, `firstname`, `lastname`, `email`, `address`, `pincode`) VALUES
(111, '111', 'Admin', 'admin', 'admin@live.com', 'Delhi', '110001'),
(122, 'secret', 'Sachin', 'Mishra', 'sachin@gmail.com', 'Gomti Nagar', '333333'),
(125, 'secret', 'KAMAL', 'RAI', 'kamal@rai.com', 'Kanpur, UP..', '220099'),
(127, 'secret', 'Akash', 'Soni', 'akash@gmail.com', 'LDA Colony,Lucknow', '226012'),
(128, 'secret', 'Vaibhav', 'Kumar', 'vaibhai@gmail.com', 'Baliya,Uttar Pradesh', '277001'),
(129, 'secret', 'Sujeet', 'Sahu', 'sujeet@gmail.com', 'Gomti Nagar,Lucknow', '226004'),
(130, 'secret', 'Ashutosh', 'Kumar', 'ashu@gmail.com', 'BBD Colony, Lucknow', '226001'),
(131, 'secret', 'Arvind', 'Singh', 'arvind@gmail.com', 'RDSO Colony,Lucknow', '226011'),
(154, '1234', 'Yash', 'Maurya ', 'yash@gmail.com', 'Lucknow', '223322'),
(155, '1234', 'Gaurav', 'Sir', 'gaurav@gmail.com', 'Lucknow', '110011'),
(160, '1', 'sdefds', 'fdsfdsfdsgf', 'gdfsgsdfgdfs', 'gdfgdfgdfsg', '112233'),
(162, '1234', 'aas', 'sasa', 'aasasa', 'asaddsfdasgfdasg', '112211'),
(163, '1234', 'rtyrty', 'rtyrtyrty', 'rtyrtyrtyrty', 'rtyrtyhrtfhrtfbh', '221133'),
(164, '1234', 'aaaaaa', 'aaaaaaa', 'aaaaaaadddddd', 'adsasasasasasasa', '111111'),
(165, '1234', 'xcvxcv', 'xcvzxcvxcvxcv', 'xcvzxcvxcvcxczvcxzv', 'xcvxcvxcvxcvxcvxcvxc', '112233'),
(166, '1234', 'w', 'eee', 'eweewrewrewrew', 'werewrewrewr', '223344'),
(167, '1234', 'w', '6', '66er7ryhrtyuh', 'rfyh5e6yrtdfyghrt56e7', '888888'),
(168, '1234', 'admin@live.com	', 'admin@live.com	', 'admin@live.com	', 'admin@live.com	', 'admin@live.com	'),
(169, 'hhhhhhhh', 'gggg', 'kkkk', 'gfh@haha', '5654766@@@@@', '546464'),
(170, '123', 'Kamal', 'Kumar', 'kumar@gmail.com', 'Kanpur Uttar Pradesh', '332211'),
(171, '123', 'Kamal', 'Chandra', 'chandra@gmail.com', 'dsfgfdgfdgdfgdfg', '221133'),
(172, '123456', 'Krishan', 'Kumar', 'kishan@gmail.com', 'dfgdfhgfhjfjhj', '221133'),
(173, '111111', 'sdfgsdfhfhjhj', 'sdfghdgfhjgfj', 'sdfgdfhhj@haasdfji.onm', 'sadgfdfsghfdhfaga', '332244'),
(174, '11111', 'zsxdgvfdsxgv', 'dfgbbgvdfb', 'gfh@haha.inefgff', 'dsfgbdfbgfvngfn', '221122'),
(175, '111', 'dfgfdg', 'dfgdfg', 'dfgdfgdfgggf@fffff', 'dfhgfhfgergrrfg', '222222'),
(176, '111111', 'sdfsf', 'sfsfdsdf', 'gfh@haha.ine', 'sfdsfsfsfsf', '111111'),
(177, '111111', 'sfsfsfsf', 'sfdsdfsf', 'abc@abc.abc', 'dfasdfasfsfsadf', '111111'),
(178, '111111', 'daadadadad', 'adsadadads', 'mmm@mmm.mmm', 'xZadasdadzxasdads', '111111'),
(179, '123', 'fdfdf', 'ee', 'gfhh@hhjj.in', 'dfgdfgdfgdfgsd', '121212'),
(180, '111', 'bnfdhbds', 'ghdfsgdfgdf', 'jjuahugd@jhjhs.ib', 'pokijhuytgfrdes', '123456');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `Orders`
--
ALTER TABLE `Orders`
  ADD PRIMARY KEY (`order_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `Order_items`
--
ALTER TABLE `Order_items`
  ADD PRIMARY KEY (`transaction_id`),
  ADD KEY `order_id` (`order_id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indexes for table `Products`
--
ALTER TABLE `Products`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `Users`
--
ALTER TABLE `Users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `Orders`
--
ALTER TABLE `Orders`
  MODIFY `order_id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=460;

--
-- AUTO_INCREMENT for table `Order_items`
--
ALTER TABLE `Order_items`
  MODIFY `transaction_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=76;

--
-- AUTO_INCREMENT for table `Products`
--
ALTER TABLE `Products`
  MODIFY `product_id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10126;

--
-- AUTO_INCREMENT for table `Users`
--
ALTER TABLE `Users`
  MODIFY `user_id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=181;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `Orders`
--
ALTER TABLE `Orders`
  ADD CONSTRAINT `Orders_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `Users` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `Order_items`
--
ALTER TABLE `Order_items`
  ADD CONSTRAINT `Order_items_ibfk_1` FOREIGN KEY (`order_id`) REFERENCES `Orders` (`order_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `Order_items_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `Products` (`product_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
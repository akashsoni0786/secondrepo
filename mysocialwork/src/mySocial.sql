-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: mysql-server
-- Generation Time: Jun 10, 2022 at 02:17 PM
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
-- Database: `mySocial`
--

-- --------------------------------------------------------

--
-- Table structure for table `Comments`
--

CREATE TABLE `Comments` (
  `comment_id` int NOT NULL,
  `post_id` int NOT NULL,
  `user_id` int NOT NULL,
  `comments` varchar(10000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `Friends`
--

CREATE TABLE `Friends` (
  `friendUid` int NOT NULL,
  `user_id` int NOT NULL,
  `friend_id` int DEFAULT NULL,
  `muting` tinyint(1) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `Friends`
--

INSERT INTO `Friends` (`friendUid`, `user_id`, `friend_id`, `muting`) VALUES
(444, 111, 112, 0);

-- --------------------------------------------------------

--
-- Table structure for table `Posts`
--

CREATE TABLE `Posts` (
  `post_id` int NOT NULL,
  `user_img` varchar(1000) DEFAULT NULL,
  `user_name` varchar(100) DEFAULT NULL,
  `post_img` varchar(1000) DEFAULT NULL,
  `post_desc` varchar(500) DEFAULT NULL,
  `likes` int DEFAULT NULL,
  `post_comments` varchar(2000) DEFAULT NULL,
  `user_id` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `Posts`
--

INSERT INTO `Posts` (`post_id`, `user_img`, `user_name`, `post_img`, `post_desc`, `likes`, `post_comments`, `user_id`) VALUES
(1000, 'https://images.unsplash.com/photo-1532074205216-d0e1f4b87368?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=441&q=80', 'sakshi345', 'https://images.unsplash.com/photo-1654481862986-b7329dbdbbf7?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=870&q=80', 'Thar Desert, also called Great Indian Desert, arid region of rolling sand hills on the Indian subcontinent. It is located partly in Rajasthan state, northwestern India, and partly in Punjab and Sindh (Sind) provinces, eastern Pakistan. Thar (Great Indian) Desert.', 24, 'Nothing', 115),
(1001, 'https://images.unsplash.com/photo-1588187284068-8c97aaf7e8e4?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=435&q=80', 'lovelylily', 'https://images.unsplash.com/photo-1654313188737-dc65639ee929?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=869&q=80', 'The moon is a cold, dry orb whose surface is studded with craters and strewn with rocks and dust (called regolith). The moon has no atmosphere. Recent lunar missions indicate that there might be some frozen ice at the poles. The same side of the moon always faces the Earth.', 23, 'No comments', 116),
(1002, 'https://images.unsplash.com/photo-1567263839785-e2f17925e82f?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=399&q=80', 'alisa1234', 'https://images.unsplash.com/photo-1654118723055-a5c5cbf681e8?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=435&q=80', 'In the 1900s, Hungarian physicist Theodore von Kármán determined the boundary to be around 50 miles up, or roughly 80 kilometers above sea level. Today, though, the Kármán line is set at what NOAA calls “an imaginary boundary” that\'s 62 miles up, or roughly a hundred kilometers above sea level.', 24, 'No Comments', 117),
(1003, 'https://images.unsplash.com/photo-1551523839-5dc0610b0c2c?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=387&q=80', 'kareena456', 'It’s always fun to do something new, but often we fall into the trap of spending our days the same way. Whether you’re stuck attending meetings on weekdays, and sleeping the day away on weekends, it’s easy to fall into routines. Finding activities to do today is even more challenging to manage for those who have children.', 'It’s always fun to do something new, but often we fall into the trap of spending our days the same way. Whether you’re stuck attending meetings on weekdays, and sleeping the day away on weekends, it’s easy to fall into routines. Finding activities to do today is even more challenging to manage for those who have children.', 44, 'no', 118);

-- --------------------------------------------------------

--
-- Table structure for table `Request`
--

CREATE TABLE `Request` (
  `requestUid` int NOT NULL,
  `user_id` int NOT NULL,
  `request_id` int NOT NULL,
  `acceptornot` tinyint(1) NOT NULL,
  `request_name` varchar(100) DEFAULT NULL,
  `request_img` varchar(1000) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `Request`
--

INSERT INTO `Request` (`requestUid`, `user_id`, `request_id`, `acceptornot`, `request_name`, `request_img`) VALUES
(223, 111, 113, 0, 'Arvind Singh', 'https://images.unsplash.com/photo-1513956589380-bad6acb9b9d4?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1287&q=80'),
(224, 111, 114, 0, 'Akash Soni', 'https://images.unsplash.com/photo-1614975058789-41316d0e2e9c?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=387&q=80');

-- --------------------------------------------------------

--
-- Table structure for table `Users`
--

CREATE TABLE `Users` (
  `user_id` int NOT NULL,
  `user_name` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `fullname` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `email` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `mobile` int NOT NULL,
  `city` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `pin` int NOT NULL,
  `password` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `user_pic` varchar(1000) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `Users`
--

INSERT INTO `Users` (`user_id`, `user_name`, `fullname`, `email`, `mobile`, `city`, `pin`, `password`, `user_pic`) VALUES
(111, 'alina', 'Alina Williams', 'alina@live.in', 1175022124, 'Lucknow', 226012, '1111', 'https://images.unsplash.com/photo-1532074205216-d0e1f4b87368?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=441&q=80'),
(112, 'sunita', 'Sunita Williams', 'gfh@haha.ine', 11111, 'fvg', 1111, '1111', 'https://images.unsplash.com/photo-1532074205216-d0e1f4b87368?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=441&q=80'),
(113, 'arvind', 'Arvind Singh', 'arvind@gmail.com', 1175022124, 'Lucknow', 226012, '1111', 'https://images.unsplash.com/photo-1513956589380-bad6acb9b9d4?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1287&q=80'),
(114, 'akashsoni', 'Akash Soni', 'akash@gmail.com', 1175022124, 'Lucknow', 226012, '1111', 'https://images.unsplash.com/photo-1614975058789-41316d0e2e9c?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=387&q=80'),
(115, 'sakshi345', 'Sakshi', 'sakshi@gmail.com', 1175022124, 'Lucknow', 226011, '1111', 'https://images.unsplash.com/photo-1532074205216-d0e1f4b87368?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=441&q=80'),
(116, 'lovelylily', 'Lovely Pandey', 'lovely@gmail.com', 1175022124, 'Delhi', 110110, '1111', 'https://images.unsplash.com/photo-1588187284068-8c97aaf7e8e4?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=435&q=80'),
(117, 'alisa1234', 'Alisa Khan', 'alisa@gmail.com', 1175022124, 'Mumbai', 654567, '', 'https://images.unsplash.com/photo-1567263839785-e2f17925e82f?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=399&q=80'),
(118, 'kareena456', 'Kareena Kapoor', 'kareena@gmail.com', 1175022124, 'Bandra', 110110, '1111', 'https://images.unsplash.com/photo-1551523839-5dc0610b0c2c?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=387&q=80');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `Comments`
--
ALTER TABLE `Comments`
  ADD PRIMARY KEY (`comment_id`);

--
-- Indexes for table `Friends`
--
ALTER TABLE `Friends`
  ADD PRIMARY KEY (`friendUid`);

--
-- Indexes for table `Posts`
--
ALTER TABLE `Posts`
  ADD PRIMARY KEY (`post_id`);

--
-- Indexes for table `Request`
--
ALTER TABLE `Request`
  ADD PRIMARY KEY (`requestUid`);

--
-- Indexes for table `Users`
--
ALTER TABLE `Users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `Comments`
--
ALTER TABLE `Comments`
  MODIFY `comment_id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `Posts`
--
ALTER TABLE `Posts`
  MODIFY `post_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1004;

--
-- AUTO_INCREMENT for table `Request`
--
ALTER TABLE `Request`
  MODIFY `requestUid` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=225;

--
-- AUTO_INCREMENT for table `Users`
--
ALTER TABLE `Users`
  MODIFY `user_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=119;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

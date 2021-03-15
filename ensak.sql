-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Mar 15, 2021 at 03:13 PM
-- Server version: 10.4.16-MariaDB
-- PHP Version: 7.4.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ensak`
--

-- --------------------------------------------------------

--
-- Table structure for table `commentaires`
--

CREATE TABLE `commentaires` (
  `id_com` int(20) NOT NULL,
  `commentaire` text NOT NULL,
  `date_com` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `id_user` int(20) NOT NULL,
  `id_post` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `followers`
--

CREATE TABLE `followers` (
  `id_follow` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_follower` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `followers`
--

INSERT INTO `followers` (`id_follow`, `id_user`, `id_follower`) VALUES
(54, 12, 13),
(55, 14, 12),
(56, 14, 13),
(57, 13, 14);

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `id_message` int(20) NOT NULL,
  `id_sender` int(20) NOT NULL,
  `message` text NOT NULL,
  `id_receiver` int(20) NOT NULL,
  `date_message` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`id_message`, `id_sender`, `message`, `id_receiver`, `date_message`) VALUES
(29, 13, 'bonjour', 12, '2021-03-15 01:57:34'),
(30, 14, 'bonjour', 12, '2021-03-15 10:53:09'),
(31, 14, 'hello', 12, '2021-03-15 11:14:49'),
(32, 14, 'hello', 12, '2021-03-15 11:15:09'),
(33, 14, 'good', 12, '2021-03-15 11:15:17'),
(34, 14, 'good', 12, '2021-03-15 11:15:24'),
(35, 14, 'maraaa', 12, '2021-03-15 11:15:57'),
(36, 14, 'great', 12, '2021-03-15 11:21:20'),
(37, 14, 'hello', 12, '2021-03-15 11:25:29'),
(38, 14, 'good', 12, '2021-03-15 11:25:43'),
(39, 14, 'wait what', 12, '2021-03-15 11:26:41'),
(40, 14, 'zda', 12, '2021-03-15 11:26:52'),
(41, 14, 'dzd', 13, '2021-03-15 11:32:49'),
(42, 14, 'dzz', 13, '2021-03-15 11:35:05'),
(43, 14, 'zdazdazdaz', 13, '2021-03-15 11:35:53'),
(44, 14, 'good', 13, '2021-03-15 11:36:26'),
(45, 14, 'zcc', 13, '2021-03-15 11:36:58'),
(46, 14, 'dzadaz', 13, '2021-03-15 11:38:57'),
(47, 14, 'dzdazazdzadaz', 13, '2021-03-15 11:39:15'),
(48, 14, 'fezea', 13, '2021-03-15 11:44:01'),
(49, 14, 'dzdza', 13, '2021-03-15 11:44:16'),
(50, 14, 'zaz', 13, '2021-03-15 11:46:51'),
(51, 14, 'zadaz', 13, '2021-03-15 11:47:17'),
(52, 14, 'great', 13, '2021-03-15 11:47:39'),
(53, 14, 'dzadaz', 13, '2021-03-15 11:48:44'),
(54, 14, 'right', 13, '2021-03-15 11:48:50'),
(55, 14, 'good', 13, '2021-03-15 11:57:18'),
(56, 14, 'hello', 13, '2021-03-15 12:05:33'),
(57, 13, 'how are you', 14, '2021-03-15 12:06:28'),
(58, 13, 'aa', 14, '2021-03-15 12:06:36');

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id_post` int(20) NOT NULL,
  `post` text NOT NULL,
  `date_post` timestamp NOT NULL DEFAULT current_timestamp(),
  `id_user` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id_post`, `post`, `date_post`, `id_user`) VALUES
(74, 'hello', '2021-03-15 00:41:45', 12),
(75, 'welcome', '2021-03-15 00:41:50', 12),
(76, 'welcome', '2021-03-15 00:41:54', 12),
(77, 'welcome', '2021-03-15 00:41:59', 12),
(78, 'first post', '2021-03-15 00:42:22', 12),
(79, 'first post', '2021-03-15 00:42:24', 12),
(80, 'first post', '2021-03-15 00:43:35', 12),
(81, 'first post', '2021-03-15 00:45:40', 12),
(82, 'first post', '2021-03-15 00:45:40', 12),
(83, 'first post', '2021-03-15 01:17:58', 12),
(84, 'first post', '2021-03-15 01:18:57', 12),
(85, 'first post', '2021-03-15 01:34:19', 12),
(86, 'Array\r\n(\r\n    [genre] => man\r\n    [date] => 1920-02-07\r\n    [inter] => Array\r\n        (\r\n            [0] => mat\r\n            [1] => art\r\n            [2] => cs\r\n        )\r\n\r\n    [ph_name] => oujaa-1574730000.png\r\n    [description] => afefafaefeafeafeafeafaef aeffeafeafafafaeafae fae\r\n    [receiver] => 0\r\n    [Fname] => yassine\r\n    [Lname] => oujaa\r\n    [email] => ain@gmail.com\r\n    [pass] => 123456789\r\n    [id] => 12\r\n)\r\n', '2021-03-15 01:34:56', 12),
(87, 'bonjour ', '2021-03-15 01:58:35', 13),
(88, 'bonjour ', '2021-03-15 01:58:40', 13),
(89, 'Array\r\n(\r\n    [genre] => man\r\n    [date] => 1920-02-07\r\n    [inter] => Array\r\n        (\r\n            [0] => mat\r\n            [1] => art\r\n            [2] => cs\r\n        )\r\n\r\n    [ph_name] => oujaa-1574730000.png\r\n    [description] => afefafaefeafeafeafeafaef aeffeafeafafafaeafae fae\r\n    [receiver] => 0\r\n    [Fname] => yassine\r\n    [Lname] => oujaa\r\n    [email] => ain@gmail.com\r\n    [pass] => 123456789\r\n    [id] => 12\r\n)\r\n', '2021-03-15 01:59:17', 13),
(90, 'hello', '2021-03-15 03:08:45', 12),
(91, 'Array\r\n(\r\n    [genre] => man\r\n    [date] => 1920-02-07\r\n    [inter] => Array\r\n        (\r\n            [0] => mat\r\n            [1] => art\r\n            [2] => cs\r\n        )\r\n\r\n    [ph_name] => oujaa-1574730000.png\r\n    [description] => afefafaefeafeafeafeafaef aeffeafeafafafaeafae fae\r\n    [receiver] => 0\r\n    [Fname] => yassine\r\n    [Lname] => oujaa\r\n    [email] => ain@gmail.com\r\n    [pass] => 123456789\r\n    [id] => 12\r\n)\r\n', '2021-03-15 03:18:12', 12),
(92, 'goood', '2021-03-15 10:27:51', 12),
(93, 'goood', '2021-03-15 10:27:57', 12),
(94, 'goood', '2021-03-15 10:30:14', 12),
(95, 'goood', '2021-03-15 10:30:49', 12);

-- --------------------------------------------------------

--
-- Table structure for table `rating_info`
--

CREATE TABLE `rating_info` (
  `id_like` int(255) NOT NULL,
  `id_post` int(20) NOT NULL,
  `id_user` int(20) NOT NULL,
  `rating_action` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rating_info`
--

INSERT INTO `rating_info` (`id_like`, `id_post`, `id_user`, `rating_action`) VALUES
(420, 79, 12, 'like'),
(424, 78, 12, 'like'),
(428, 76, 12, 'like'),
(464, 81, 12, 'like'),
(468, 75, 12, 'dislike'),
(478, 83, 12, 'dislike'),
(482, 85, 12, 'dislike'),
(492, 86, 12, 'dislike'),
(498, 84, 12, 'like'),
(514, 87, 13, 'like'),
(516, 88, 13, 'dislike'),
(540, 91, 12, 'like'),
(550, 90, 12, 'dislike'),
(563, 82, 12, 'like'),
(569, 92, 12, 'like'),
(571, 94, 12, 'dislike'),
(573, 95, 12, 'dislike'),
(590, 93, 12, 'like'),
(599, 89, 13, 'like');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(20) NOT NULL,
  `nom` varchar(20) NOT NULL,
  `prenom` varchar(20) NOT NULL,
  `date_de_naissance` date NOT NULL,
  `mot_de_passe` varchar(30) NOT NULL,
  `photo` varchar(100) NOT NULL,
  `description` text NOT NULL,
  `email` varchar(40) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `intersts` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `nom`, `prenom`, `date_de_naissance`, `mot_de_passe`, `photo`, `description`, `email`, `gender`, `intersts`) VALUES
(12, 'marad', 'morad', '1920-02-07', '123456789', 'oujaa-1574730000.png', '', 'ain@gmail.com', 'man', 'mat-art-cs'),
(13, 'oukassou', 'ilham', '2000-01-05', '123456789', 'oukassou947026800.png', 'lorem epsum jn nza d,azdoazd,azod,azodajdaod', 'ily@gmail.com', 'man', 'spo-cs'),
(14, 'mazouzi', 'saad', '2000-01-02', '123456789', 'mazouzi946767600.png', 'What makes you special . Express yourself:What makes you special . Express yourself:', 'saad@gmail.com', 'man', 'mat-art-cs');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `commentaires`
--
ALTER TABLE `commentaires`
  ADD PRIMARY KEY (`id_com`),
  ADD KEY `id_post` (`id_post`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `followers`
--
ALTER TABLE `followers`
  ADD PRIMARY KEY (`id_follow`),
  ADD UNIQUE KEY `id_follow` (`id_follow`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `id_follower` (`id_follower`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id_message`),
  ADD KEY `id_sender` (`id_sender`),
  ADD KEY `id_reseiver` (`id_receiver`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id_post`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `rating_info`
--
ALTER TABLE `rating_info`
  ADD PRIMARY KEY (`id_like`),
  ADD UNIQUE KEY `id_post_2` (`id_post`),
  ADD KEY `id_post` (`id_post`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `id_user_2` (`id_user`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `commentaires`
--
ALTER TABLE `commentaires`
  MODIFY `id_com` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `followers`
--
ALTER TABLE `followers`
  MODIFY `id_follow` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `id_message` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id_post` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=96;

--
-- AUTO_INCREMENT for table `rating_info`
--
ALTER TABLE `rating_info`
  MODIFY `id_like` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=600;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `commentaires`
--
ALTER TABLE `commentaires`
  ADD CONSTRAINT `commentaires_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `commentaires_ibfk_2` FOREIGN KEY (`id_post`) REFERENCES `posts` (`id_post`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `followers`
--
ALTER TABLE `followers`
  ADD CONSTRAINT `followers_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `followers_ibfk_2` FOREIGN KEY (`id_follower`) REFERENCES `user` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `messages`
--
ALTER TABLE `messages`
  ADD CONSTRAINT `messages_ibfk_1` FOREIGN KEY (`id_sender`) REFERENCES `user` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `messages_ibfk_2` FOREIGN KEY (`id_receiver`) REFERENCES `user` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `posts`
--
ALTER TABLE `posts`
  ADD CONSTRAINT `posts_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `rating_info`
--
ALTER TABLE `rating_info`
  ADD CONSTRAINT `rating_info_ibfk_2` FOREIGN KEY (`id_post`) REFERENCES `posts` (`id_post`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `rating_info_ibfk_3` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

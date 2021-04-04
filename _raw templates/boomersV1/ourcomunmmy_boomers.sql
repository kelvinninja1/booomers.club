-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 11, 2020 at 03:37 AM
-- Server version: 10.4.6-MariaDB
-- PHP Version: 7.3.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ourcomunmmy_boomers`
--

-- --------------------------------------------------------

--
-- Table structure for table `boom_ponits`
--

CREATE TABLE `boom_ponits` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `points` int(11) NOT NULL DEFAULT 0,
  `date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `boom_ponits`
--

INSERT INTO `boom_ponits` (`id`, `user_id`, `points`, `date`) VALUES
(1, 1, 0, '2019-12-06 10:55:00'),
(2, 2, 50, '2019-12-06 10:55:00');

-- --------------------------------------------------------

--
-- Table structure for table `dblogs_tb`
--

CREATE TABLE `dblogs_tb` (
  `id` int(11) NOT NULL,
  `log` text NOT NULL,
  `user_id` int(11) NOT NULL,
  `date_added` varchar(30) NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `dblogs_tb`
--

INSERT INTO `dblogs_tb` (`id`, `log`, `user_id`, `date_added`) VALUES
(1, '$log', 1, 'current_timestamp()'),
(2, '$log', 1, 'current_timestamp()'),
(3, 'SELECT COUNT(*) AS `cnum` FROM users_tb WHERE 1', 1, '2019-11-21 08:06:39'),
(4, 'SELECT COUNT(*) AS `cnum` FROM users_tb WHERE 1', 1, '2019-11-21 08:08:29'),
(5, 'SELECT COUNT(*) AS `cnum` FROM users_tb WHERE 1', 1, '2019-11-21 08:11:19'),
(6, 'SELECT COUNT(*) AS `cnum` FROM ref_points_tb WHERE 1', 1, '2019-11-21 08:11:19'),
(7, 'SELECT COUNT(*) AS `cnum` FROM requests_tb WHERE 1', 1, '2019-11-21 08:11:19'),
(8, 'SELECT COUNT(*) AS `cnum` FROM users_tb WHERE 1', 1, '2019-11-21 08:14:47'),
(9, 'SELECT COUNT(*) AS `cnum` FROM ref_points_tb WHERE 1', 1, '2019-11-21 08:14:47'),
(10, 'SELECT COUNT(*) AS `cnum` FROM requests_tb WHERE 1', 1, '2019-11-21 08:14:47'),
(11, 'SELECT COUNT(*) AS `cnum` FROM img_tb WHERE 1', 1, '2019-11-21 08:14:47'),
(12, 'SELECT COUNT(*) AS `cnum` FROM referal_tb WHERE 1', 1, '2019-11-21 08:14:47'),
(13, 'SELECT * FROM users_tb WHERE `id` = \'', 1, '2019-11-21 08:22:42'),
(14, 'SELECT COUNT(*) AS `cnum` FROM users_tb WHERE 1', 1, '2019-11-21 08:22:42'),
(15, 'SELECT COUNT(*) AS `cnum` FROM ref_points_tb WHERE 1', 1, '2019-11-21 08:22:43'),
(16, 'SELECT COUNT(*) AS `cnum` FROM requests_tb WHERE 1', 1, '2019-11-21 08:22:43'),
(17, 'SELECT COUNT(*) AS `cnum` FROM img_tb WHERE 1', 1, '2019-11-21 08:22:43'),
(18, 'SELECT COUNT(*) AS `cnum` FROM referal_tb WHERE 1', 1, '2019-11-21 08:22:43'),
(19, 'SELECT * FROM users_tb WHERE `id` = \'', 1, '2019-11-21 08:23:42'),
(20, 'SELECT COUNT(*) AS `cnum` FROM users_tb WHERE 1', 1, '2019-11-21 08:23:42'),
(21, 'SELECT COUNT(*) AS `cnum` FROM ref_points_tb WHERE 1', 1, '2019-11-21 08:23:43'),
(22, 'SELECT COUNT(*) AS `cnum` FROM requests_tb WHERE 1', 1, '2019-11-21 08:23:43'),
(23, 'SELECT COUNT(*) AS `cnum` FROM img_tb WHERE 1', 1, '2019-11-21 08:23:43'),
(24, 'SELECT COUNT(*) AS `cnum` FROM referal_tb WHERE 1', 1, '2019-11-21 08:23:43'),
(25, 'SELECT * FROM users_tb WHERE `id` = \'', 1, '2019-11-21 08:24:17'),
(26, 'SELECT COUNT(*) AS `cnum` FROM users_tb WHERE 1', 1, '2019-11-21 08:24:17'),
(27, 'SELECT COUNT(*) AS `cnum` FROM ref_points_tb WHERE 1', 1, '2019-11-21 08:24:17'),
(28, 'SELECT COUNT(*) AS `cnum` FROM requests_tb WHERE 1', 1, '2019-11-21 08:24:17'),
(29, 'SELECT COUNT(*) AS `cnum` FROM img_tb WHERE 1', 1, '2019-11-21 08:24:17'),
(30, 'SELECT COUNT(*) AS `cnum` FROM referal_tb WHERE 1', 1, '2019-11-21 08:24:17'),
(31, 'SELECT * FROM users_tb WHERE `id` = \'', 1, '2019-11-21 08:24:18'),
(32, 'SELECT COUNT(*) AS `cnum` FROM users_tb WHERE 1', 1, '2019-11-21 08:24:19'),
(33, 'SELECT COUNT(*) AS `cnum` FROM ref_points_tb WHERE 1', 1, '2019-11-21 08:24:19'),
(34, 'SELECT COUNT(*) AS `cnum` FROM requests_tb WHERE 1', 1, '2019-11-21 08:24:19'),
(35, 'SELECT COUNT(*) AS `cnum` FROM img_tb WHERE 1', 1, '2019-11-21 08:24:19'),
(36, 'SELECT COUNT(*) AS `cnum` FROM referal_tb WHERE 1', 1, '2019-11-21 08:24:19'),
(37, 'SELECT * FROM users_tb WHERE `id` = \'', 1, '2019-11-21 08:26:59'),
(38, 'SELECT COUNT(*) AS `cnum` FROM users_tb WHERE 1', 1, '2019-11-21 08:26:59'),
(39, 'SELECT COUNT(*) AS `cnum` FROM ref_points_tb WHERE 1', 1, '2019-11-21 08:26:59'),
(40, 'SELECT COUNT(*) AS `cnum` FROM requests_tb WHERE 1', 1, '2019-11-21 08:26:59'),
(41, 'SELECT COUNT(*) AS `cnum` FROM img_tb WHERE 1', 1, '2019-11-21 08:26:59'),
(42, 'SELECT COUNT(*) AS `cnum` FROM referal_tb WHERE 1', 1, '2019-11-21 08:26:59'),
(43, 'SELECT * FROM users_tb WHERE `id` = \'', 1, '2019-11-21 08:29:40'),
(44, 'SELECT COUNT(*) AS `cnum` FROM users_tb WHERE 1', 1, '2019-11-21 08:29:40'),
(45, 'SELECT COUNT(*) AS `cnum` FROM ref_points_tb WHERE 1', 1, '2019-11-21 08:29:40'),
(46, 'SELECT COUNT(*) AS `cnum` FROM requests_tb WHERE 1', 1, '2019-11-21 08:29:41'),
(47, 'SELECT COUNT(*) AS `cnum` FROM img_tb WHERE 1', 1, '2019-11-21 08:29:41'),
(48, 'SELECT COUNT(*) AS `cnum` FROM referal_tb WHERE 1', 1, '2019-11-21 08:29:41'),
(49, 'SELECT * FROM users_tb WHERE `id` = \'', 1, '2019-11-21 08:31:44'),
(50, 'SELECT COUNT(*) AS `cnum` FROM users_tb WHERE 1', 1, '2019-11-21 08:31:44'),
(51, 'SELECT COUNT(*) AS `cnum` FROM ref_points_tb WHERE 1', 1, '2019-11-21 08:31:44'),
(52, 'SELECT COUNT(*) AS `cnum` FROM requests_tb WHERE 1', 1, '2019-11-21 08:31:44'),
(53, 'SELECT COUNT(*) AS `cnum` FROM img_tb WHERE 1', 1, '2019-11-21 08:31:44'),
(54, 'SELECT COUNT(*) AS `cnum` FROM referal_tb WHERE 1', 1, '2019-11-21 08:31:44'),
(55, 'SELECT * FROM users_tb WHERE `id` = \'', 1, '2019-11-21 16:40:05'),
(56, 'SELECT COUNT(*) AS `cnum` FROM users_tb WHERE 1', 1, '2019-11-21 16:40:05'),
(57, 'SELECT COUNT(*) AS `cnum` FROM ref_points_tb WHERE 1', 1, '2019-11-21 16:40:05'),
(58, 'SELECT COUNT(*) AS `cnum` FROM requests_tb WHERE 1', 1, '2019-11-21 16:40:06'),
(59, 'SELECT COUNT(*) AS `cnum` FROM img_tb WHERE 1', 1, '2019-11-21 16:40:06'),
(60, 'SELECT COUNT(*) AS `cnum` FROM referal_tb WHERE 1', 1, '2019-11-21 16:40:06'),
(61, 'SELECT * FROM users_tb WHERE `id` = \'', 1, '2019-11-21 17:25:21'),
(62, 'SELECT COUNT(*) AS `cnum` FROM users_tb WHERE 1', 1, '2019-11-21 17:25:21'),
(63, 'SELECT COUNT(*) AS `cnum` FROM ref_points_tb WHERE 1', 1, '2019-11-21 17:25:21'),
(64, 'SELECT COUNT(*) AS `cnum` FROM requests_tb WHERE 1', 1, '2019-11-21 17:25:21'),
(65, 'SELECT COUNT(*) AS `cnum` FROM img_tb WHERE 1', 1, '2019-11-21 17:25:21'),
(66, 'SELECT COUNT(*) AS `cnum` FROM referal_tb WHERE 1', 1, '2019-11-21 17:25:21'),
(67, 'SELECT * FROM users_tb WHERE `id` = \'', 1, '2019-11-21 17:31:08'),
(68, 'SELECT COUNT(*) AS `cnum` FROM users_tb WHERE 1', 1, '2019-11-21 17:31:08'),
(69, 'SELECT COUNT(*) AS `cnum` FROM ref_points_tb WHERE 1', 1, '2019-11-21 17:31:08'),
(70, 'SELECT COUNT(*) AS `cnum` FROM requests_tb WHERE 1', 1, '2019-11-21 17:31:08'),
(71, 'SELECT COUNT(*) AS `cnum` FROM img_tb WHERE 1', 1, '2019-11-21 17:31:08'),
(72, 'SELECT COUNT(*) AS `cnum` FROM referal_tb WHERE 1', 1, '2019-11-21 17:31:08'),
(73, 'SELECT * FROM users_tb WHERE `id` = \'', 1, '2019-11-22 13:41:51'),
(74, 'SELECT COUNT(*) AS `cnum` FROM users_tb WHERE 1', 1, '2019-11-22 13:41:51'),
(75, 'SELECT COUNT(*) AS `cnum` FROM ref_points_tb WHERE 1', 1, '2019-11-22 13:41:51'),
(76, 'SELECT COUNT(*) AS `cnum` FROM requests_tb WHERE 1', 1, '2019-11-22 13:41:52'),
(77, 'SELECT COUNT(*) AS `cnum` FROM img_tb WHERE 1', 1, '2019-11-22 13:41:52'),
(78, 'SELECT COUNT(*) AS `cnum` FROM referal_tb WHERE 1', 1, '2019-11-22 13:41:52'),
(79, 'SELECT * FROM users_tb WHERE `id` = \'', 1, '2019-11-22 13:59:31'),
(80, 'SELECT COUNT(*) AS `cnum` FROM users_tb WHERE 1', 1, '2019-11-22 13:59:32'),
(81, 'SELECT COUNT(*) AS `cnum` FROM ref_points_tb WHERE 1', 1, '2019-11-22 13:59:32'),
(82, 'SELECT COUNT(*) AS `cnum` FROM requests_tb WHERE 1', 1, '2019-11-22 13:59:32'),
(83, 'SELECT COUNT(*) AS `cnum` FROM img_tb WHERE 1', 1, '2019-11-22 13:59:33'),
(84, 'SELECT COUNT(*) AS `cnum` FROM referal_tb WHERE 1', 1, '2019-11-22 13:59:33'),
(85, 'SELECT COUNT(*) AS `cnum` FROM users_tb WHERE `email`=\'', 1, '2019-11-22 13:59:33'),
(86, 'SELECT COUNT(*) AS `cnum` FROM users_tb WHERE `username`=\'', 1, '2019-11-22 13:59:33'),
(87, 'SELECT * FROM users_tb WHERE `id` = \'', 1, '2019-11-22 16:10:25'),
(88, 'SELECT COUNT(*) AS `cnum` FROM users_tb WHERE 1', 1, '2019-11-22 16:10:25'),
(89, 'SELECT COUNT(*) AS `cnum` FROM ref_points_tb WHERE 1', 1, '2019-11-22 16:10:25'),
(90, 'SELECT COUNT(*) AS `cnum` FROM requests_tb WHERE 1', 1, '2019-11-22 16:10:25'),
(91, 'SELECT COUNT(*) AS `cnum` FROM img_tb WHERE 1', 1, '2019-11-22 16:10:26'),
(92, 'SELECT COUNT(*) AS `cnum` FROM referal_tb WHERE 1', 1, '2019-11-22 16:10:26'),
(93, 'SELECT COUNT(*) AS `cnum` FROM users_tb WHERE `email`=\'', 1, '2019-11-22 16:10:26'),
(94, 'SELECT COUNT(*) AS `cnum` FROM users_tb WHERE `username`=\'', 1, '2019-11-22 16:10:26'),
(95, 'SELECT * FROM users_tb WHERE `id` = \'', 1, '2019-11-22 16:14:33'),
(96, 'SELECT COUNT(*) AS `cnum` FROM users_tb WHERE 1', 1, '2019-11-22 16:14:33'),
(97, 'SELECT COUNT(*) AS `cnum` FROM ref_points_tb WHERE 1', 1, '2019-11-22 16:14:33'),
(98, 'SELECT COUNT(*) AS `cnum` FROM requests_tb WHERE 1', 1, '2019-11-22 16:14:33'),
(99, 'SELECT COUNT(*) AS `cnum` FROM img_tb WHERE 1', 1, '2019-11-22 16:14:33'),
(100, 'SELECT COUNT(*) AS `cnum` FROM referal_tb WHERE 1', 1, '2019-11-22 16:14:33'),
(101, 'SELECT * FROM users_tb WHERE `id` = \'', 1, '2019-11-22 16:27:51'),
(102, 'SELECT COUNT(*) AS `cnum` FROM users_tb WHERE 1', 1, '2019-11-22 16:27:52'),
(103, 'SELECT COUNT(*) AS `cnum` FROM ref_points_tb WHERE 1', 1, '2019-11-22 16:27:52'),
(104, 'SELECT COUNT(*) AS `cnum` FROM requests_tb WHERE 1', 1, '2019-11-22 16:27:52'),
(105, 'SELECT COUNT(*) AS `cnum` FROM img_tb WHERE 1', 1, '2019-11-22 16:27:52'),
(106, 'SELECT COUNT(*) AS `cnum` FROM referal_tb WHERE 1', 1, '2019-11-22 16:27:52');

-- --------------------------------------------------------

--
-- Table structure for table `img_tb`
--

CREATE TABLE `img_tb` (
  `id` int(11) NOT NULL,
  `img_url` varchar(250) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `purpose` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `img_tb`
--

INSERT INTO `img_tb` (`id`, `img_url`, `date`, `purpose`) VALUES
(1, 'none', '2019-11-27 13:49:08', 'nothing');

-- --------------------------------------------------------

--
-- Table structure for table `login_tb`
--

CREATE TABLE `login_tb` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `phone` varchar(60) NOT NULL,
  `password` varchar(100) NOT NULL,
  `last_login` timestamp(6) NOT NULL DEFAULT current_timestamp(6) ON UPDATE current_timestamp(6),
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `login_tb`
--

INSERT INTO `login_tb` (`id`, `username`, `phone`, `password`, `last_login`, `user_id`) VALUES
(1, 'ikelvin', '0551838987', '5d283bcf11ecf2b6a2a94ca59ed6d354', '2019-12-06 10:48:41.562824', 1),
(2, 'jokey', '0544036030', '5d283bcf11ecf2b6a2a94ca59ed6d354', '2019-12-06 10:49:39.999480', 2);

-- --------------------------------------------------------

--
-- Table structure for table `pay_method_tb`
--

CREATE TABLE `pay_method_tb` (
  `id` int(11) NOT NULL,
  `method` varchar(250) NOT NULL,
  `status` set('active','inactive','','') NOT NULL,
  `date_added` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `pay_method_tb`
--

INSERT INTO `pay_method_tb` (`id`, `method`, `status`, `date_added`) VALUES
(1, 'MTN Mobile Money', 'active', '2019-11-23 03:32:24'),
(2, 'Vodafone Cash', 'active', '2019-11-23 03:32:24'),
(3, 'AirtelTigo Cash', 'active', '2019-11-23 03:32:24');

-- --------------------------------------------------------

--
-- Table structure for table `referal_tb`
--

CREATE TABLE `referal_tb` (
  `id` int(11) NOT NULL,
  `referer` int(11) NOT NULL,
  `referee` int(11) NOT NULL,
  `status` set('settled','unsettled','ready') NOT NULL DEFAULT 'unsettled',
  `ref_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `referal_tb`
--

INSERT INTO `referal_tb` (`id`, `referer`, `referee`, `status`, `ref_date`) VALUES
(1, 1, 2, 'unsettled', '2019-12-17 12:07:05'),
(2, 2, 1, 'ready', '2020-01-09 12:35:49');

-- --------------------------------------------------------

--
-- Table structure for table `ref_points_tb`
--

CREATE TABLE `ref_points_tb` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `points` int(11) NOT NULL DEFAULT 0,
  `date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `ref_points_tb`
--

INSERT INTO `ref_points_tb` (`id`, `user_id`, `points`, `date`) VALUES
(1, 1, 10000, '2019-12-06 10:52:39'),
(2, 2, 100000, '2019-12-06 10:52:39');

-- --------------------------------------------------------

--
-- Table structure for table `requests_tb`
--

CREATE TABLE `requests_tb` (
  `id` int(11) NOT NULL,
  `from_id` int(11) NOT NULL,
  `to_id` int(11) NOT NULL,
  `value` int(11) NOT NULL,
  `status` set('issued','confirmed','approved','rejected') NOT NULL DEFAULT 'issued',
  `proof_img` varchar(100) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp(),
  `judgement` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `requests_tb`
--

INSERT INTO `requests_tb` (`id`, `from_id`, `to_id`, `value`, `status`, `proof_img`, `date`, `judgement`) VALUES
(276, 1, 2, 1, 'confirmed', 'proof-2020-01-09-B11578573421', '2020-01-09 12:35:48', '');

-- --------------------------------------------------------

--
-- Table structure for table `users_tb`
--

CREATE TABLE `users_tb` (
  `id` int(11) NOT NULL,
  `firstname` varchar(50) NOT NULL,
  `surname` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `status` set('active','inactive','banned','deleted') NOT NULL DEFAULT 'inactive',
  `username` varchar(50) NOT NULL,
  `whatsapp` varchar(15) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users_tb`
--

INSERT INTO `users_tb` (`id`, `firstname`, `surname`, `email`, `status`, `username`, `whatsapp`, `date`) VALUES
(1, 'Kelvin', 'Morrison', 'ikelvinstudios@gmail.com', 'inactive', 'ikelvin', '0551838987', '2019-10-17 09:58:24'),
(2, 'Joseph', 'Asare', 'rosinayah20@gmail.com', 'active', 'jokey', '0544036030', '2019-11-20 17:35:02');

-- --------------------------------------------------------

--
-- Table structure for table `user_paymethod_tb`
--

CREATE TABLE `user_paymethod_tb` (
  `id` int(11) NOT NULL,
  `method_id` int(11) NOT NULL,
  `method_name` varchar(50) NOT NULL,
  `acc_type` set('user','merchant') NOT NULL DEFAULT 'user',
  `user_id` int(11) NOT NULL,
  `reg_name` varchar(60) NOT NULL,
  `reg_number` varchar(16) NOT NULL,
  `last_updated` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user_paymethod_tb`
--

INSERT INTO `user_paymethod_tb` (`id`, `method_id`, `method_name`, `acc_type`, `user_id`, `reg_name`, `reg_number`, `last_updated`) VALUES
(4, 1, '', 'user', 1, 'Kelvin Morrison', '0551838987', '2019-11-27 13:18:30'),
(5, 1, '', 'user', 2, 'Joseph Amoako Asare', '0544036030', '2019-11-27 13:18:30');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `boom_ponits`
--
ALTER TABLE `boom_ponits`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `dblogs_tb`
--
ALTER TABLE `dblogs_tb`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `img_tb`
--
ALTER TABLE `img_tb`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `login_tb`
--
ALTER TABLE `login_tb`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `phone` (`phone`),
  ADD KEY `username` (`username`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `pay_method_tb`
--
ALTER TABLE `pay_method_tb`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `referal_tb`
--
ALTER TABLE `referal_tb`
  ADD PRIMARY KEY (`id`),
  ADD KEY `referer` (`referer`),
  ADD KEY `referee` (`referee`);

--
-- Indexes for table `ref_points_tb`
--
ALTER TABLE `ref_points_tb`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `requests_tb`
--
ALTER TABLE `requests_tb`
  ADD PRIMARY KEY (`id`),
  ADD KEY `from` (`from_id`),
  ADD KEY `to` (`to_id`),
  ADD KEY `proof_img` (`proof_img`);

--
-- Indexes for table `users_tb`
--
ALTER TABLE `users_tb`
  ADD PRIMARY KEY (`id`),
  ADD KEY `username` (`username`);

--
-- Indexes for table `user_paymethod_tb`
--
ALTER TABLE `user_paymethod_tb`
  ADD PRIMARY KEY (`id`),
  ADD KEY `method_id` (`method_id`),
  ADD KEY `user_id` (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `boom_ponits`
--
ALTER TABLE `boom_ponits`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `dblogs_tb`
--
ALTER TABLE `dblogs_tb`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=107;

--
-- AUTO_INCREMENT for table `img_tb`
--
ALTER TABLE `img_tb`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `login_tb`
--
ALTER TABLE `login_tb`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `referal_tb`
--
ALTER TABLE `referal_tb`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `ref_points_tb`
--
ALTER TABLE `ref_points_tb`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `requests_tb`
--
ALTER TABLE `requests_tb`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=277;

--
-- AUTO_INCREMENT for table `users_tb`
--
ALTER TABLE `users_tb`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `user_paymethod_tb`
--
ALTER TABLE `user_paymethod_tb`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `boom_ponits`
--
ALTER TABLE `boom_ponits`
  ADD CONSTRAINT `boom_ponits_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users_tb` (`id`);

--
-- Constraints for table `login_tb`
--
ALTER TABLE `login_tb`
  ADD CONSTRAINT `login_tb_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users_tb` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `login_tb_ibfk_2` FOREIGN KEY (`username`) REFERENCES `users_tb` (`username`);

--
-- Constraints for table `referal_tb`
--
ALTER TABLE `referal_tb`
  ADD CONSTRAINT `referal_tb_ibfk_1` FOREIGN KEY (`referer`) REFERENCES `users_tb` (`id`),
  ADD CONSTRAINT `referal_tb_ibfk_2` FOREIGN KEY (`referee`) REFERENCES `users_tb` (`id`);

--
-- Constraints for table `ref_points_tb`
--
ALTER TABLE `ref_points_tb`
  ADD CONSTRAINT `ref_points_tb_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users_tb` (`id`);

--
-- Constraints for table `requests_tb`
--
ALTER TABLE `requests_tb`
  ADD CONSTRAINT `requests_tb_ibfk_1` FOREIGN KEY (`from_id`) REFERENCES `users_tb` (`id`),
  ADD CONSTRAINT `requests_tb_ibfk_2` FOREIGN KEY (`to_id`) REFERENCES `users_tb` (`id`);

--
-- Constraints for table `user_paymethod_tb`
--
ALTER TABLE `user_paymethod_tb`
  ADD CONSTRAINT `user_paymethod_tb_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users_tb` (`id`),
  ADD CONSTRAINT `user_paymethod_tb_ibfk_2` FOREIGN KEY (`method_id`) REFERENCES `pay_method_tb` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

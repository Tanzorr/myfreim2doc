-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Sep 02, 2019 at 04:32 PM
-- Server version: 5.7.27-0ubuntu0.16.04.1
-- PHP Version: 7.0.33-0ubuntu0.16.04.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `myfreim`
--

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

CREATE TABLE `contacts` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `fname` varchar(155) DEFAULT NULL,
  `lname` varchar(155) DEFAULT NULL,
  `email` varchar(155) DEFAULT NULL,
  `adres1` varchar(255) DEFAULT NULL,
  `adres2` varchar(255) DEFAULT NULL,
  `city` varchar(100) DEFAULT NULL,
  `state` varchar(100) DEFAULT NULL,
  `zip` varchar(65) NOT NULL,
  `home_phone` varchar(55) NOT NULL,
  `cell_phone` varchar(55) NOT NULL,
  `word_phone` varchar(55) DEFAULT NULL,
  `deleted` tinyint(4) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `contacts`
--

INSERT INTO `contacts` (`id`, `user_id`, `fname`, `lname`, `email`, `adres1`, `adres2`, `city`, `state`, `zip`, `home_phone`, `cell_phone`, `word_phone`, `deleted`) VALUES
(7, NULL, 'alex1', 'white1', 'akex@ukr.net', 'adres11', 'adres22', 'kyew1', 'kyev1', '1234', '1255 455 252', '1234', '2541 995 214', 0),
(8, NULL, 'alex1', 'white1', 'akex@ukr.net', 'adres11', 'adres22', 'kyew1', 'kyev1', '1234', '1255 455 252', '1234', '2541 995 214', 0),
(9, 2, 'alex2', 'dbxfc', 'alexx1984@ukr.net', 'zvdfbxg', 'vxdfg', 'zvfb', 'zdvfbx', 'zbx', '345', '2345', NULL, 0);

-- --------------------------------------------------------

--
-- Table structure for table `contacts2`
--

CREATE TABLE `contacts2` (
  `id` int(11) NOT NULL,
  `fname` varchar(150) NOT NULL,
  `lname` varchar(150) NOT NULL,
  `email` varchar(150) NOT NULL,
  `adres1` varchar(150) DEFAULT NULL,
  `state` varchar(150) DEFAULT NULL,
  `contry` int(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `contacts2`
--

INSERT INTO `contacts2` (`id`, `fname`, `lname`, `email`, `adres1`, `state`, `contry`) VALUES
(2, 'alex', 'white', 'alexx1984@ukr.net', '', '', 0),
(3, 'Toni2', 'Parham2', 'Parham2@ukr.net', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(150) DEFAULT NULL,
  `email` varchar(150) DEFAULT NULL,
  `password` varchar(150) DEFAULT NULL,
  `fname` varchar(150) DEFAULT NULL,
  `lname` varchar(150) DEFAULT NULL,
  `acl` text,
  `deleted` tinyint(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`, `fname`, `lname`, `acl`, `deleted`) VALUES
(2, 'rausan', 'alexx1984@ukr.net', 'dfktynbyf', 'alex', 'white', '', 0),
(3, 'alex88', 'alexx1984@ukr.net', '$2y$10$q.6NhSQtftEVXM5PkULzOus2xgyH9kHn8bVR0P62gWXLqZZoqlLLu', 'alex', NULL, NULL, NULL),
(4, 'alex82', 'alexx1984@ukr.net', '$2y$10$AABykh/NOn48NZWN1YVrYezqFYfQ/pYwoHLbSUGsk1g2tXJeFS0oK', 'alex2', NULL, NULL, NULL),
(5, 'alex87', 'alexx1984@ukr.net', '$2y$10$kAZSoFyu5IUtCPawDR6q2uPwB0kWkTVBzMOyoYVj2Gyqho61ZhiKe', 'alex3', 'white', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `user_sessions`
--

CREATE TABLE `user_sessions` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `session` varchar(255) NOT NULL,
  `user_agent` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `deleted` (`deleted`);

--
-- Indexes for table `contacts2`
--
ALTER TABLE `contacts2`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_sessions`
--
ALTER TABLE `user_sessions`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `contacts2`
--
ALTER TABLE `contacts2`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `user_sessions`
--
ALTER TABLE `user_sessions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

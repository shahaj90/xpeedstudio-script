-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 26, 2019 at 01:23 PM
-- Server version: 10.4.8-MariaDB
-- PHP Version: 7.3.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `xpeed_studio_buyer`
--

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(45) NOT NULL,
  `email` varchar(45) NOT NULL,
  `password` varchar(45) NOT NULL,
  `mobile` varchar(45) NOT NULL,
  `created_by` int(11) NOT NULL,
  `created_ip` varchar(45) NOT NULL,
  `created_time` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_by` int(11) DEFAULT NULL,
  `updated_ip` varchar(45) DEFAULT NULL,
  `updated_time` timestamp NULL DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1 COMMENT '1=active,2=suspend,3=delete'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `mobile`, `created_by`, `created_ip`, `created_time`, `updated_by`, `updated_ip`, `updated_time`, `status`) VALUES
(1, 'Shahaj', 'gshahaj@gmail.com', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', '01913019820', 1, '192.168.20', '2019-11-26 12:21:23', 1, '::1', '2019-11-26 07:21:23', 3),
(3, 'adcc', 'gshaha2j@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', '01913019821', 1, '::1', '2019-11-25 16:18:28', NULL, NULL, NULL, 1),
(4, 'adcc', 'gshaha3j@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', '01913019822', 1, '::1', '2019-11-25 16:19:14', NULL, NULL, NULL, 1),
(5, 'adcc', 'company@gmail.com', '202cb962ac59075b964b07152d234b70', '01913019823', 1, '::1', '2019-11-26 12:21:04', 1, '::1', '2019-11-26 07:21:04', 1),
(6, 'adcc', 'company1@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', '01913019824', 1, '::1', '2019-11-26 12:23:25', 1, '::1', '2019-11-26 07:23:25', 1),
(7, 'SEO', 'company@gmail.com', '202cb962ac59075b964b07152d234b70', '01913019828', 1, '::1', '2019-11-26 12:18:17', 1, '::1', '2019-11-26 07:18:17', 3),
(8, 'Jane Doedef', 'company1@gmail.com', '202cb962ac59075b964b07152d234b70', '01765086749', 1, '::1', '2019-11-26 12:17:47', 1, '::1', '2019-11-26 07:17:47', 3);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

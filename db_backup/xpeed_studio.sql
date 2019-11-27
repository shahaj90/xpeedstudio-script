-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 27, 2019 at 06:45 AM
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
-- Database: `xpeed_studio`
--

-- --------------------------------------------------------

--
-- Table structure for table `items`
--

CREATE TABLE `items` (
  `id` bigint(20) NOT NULL,
  `amount` int(10) NOT NULL,
  `buyer` varchar(255) NOT NULL,
  `receipt_id` varchar(20) NOT NULL,
  `items` varchar(255) NOT NULL,
  `buyer_email` varchar(50) NOT NULL,
  `buyer_ip` varchar(20) NOT NULL,
  `note` text NOT NULL,
  `city` varchar(20) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `hash_key` varchar(255) DEFAULT NULL,
  `entry_at` date NOT NULL,
  `entry_by` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `items`
--

INSERT INTO `items` (`id`, `amount`, `buyer`, `receipt_id`, `items`, `buyer_email`, `buyer_ip`, `note`, `city`, `phone`, `hash_key`, `entry_at`, `entry_by`) VALUES
(1, 20, 'Shahaj', '1', '[\"de\",\"sdaf\"]', 'gshahaj@gmail.com', '192.168.10.10', 'Nothings', 'Dhaka', '01913019820', 'f7ec32a39b8ffacaa49a02bcf2d6b1dff8af4d4c257ca0dde7148ffd3c6e5f34490f5b36af97ba7e891fa4efea7d5d9544001787888ac81cf0426f110e1ee1a9', '2019-11-25', 2),
(2, 70, 'abc', 'sss33', '[\"de\",\"sdaf\"]', 'abc@aa.com', '::1', 'asdf', 'Dhaka', '1756472843', 'f7ec32a39b8ffacaa49a02bcf2d6b1dff8af4d4c257ca0dde7148ffd3c6e5f34490f5b36af97ba7e891fa4efea7d5d9544001787888ac81cf0426f110e1ee1a9', '2019-11-24', 1),
(3, 70, 'abc', 'sss33', '[\"de\",\"sdaf\"]', 'abc@aa.com', '::1', 'asdf', 'Dhaka', '1756472843', 'f7ec32a39b8ffacaa49a02bcf2d6b1dff8af4d4c257ca0dde7148ffd3c6e5f34490f5b36af97ba7e891fa4efea7d5d9544001787888ac81cf0426f110e1ee1a9', '2019-11-26', 1),
(4, 70, 'abc', 'sss33', '[\"de\",\"sdaf\"]', 'abc@aa.com', '::1', 'asdf', 'Dhaka', '1756472843', 'f7ec32a39b8ffacaa49a02bcf2d6b1dff8af4d4c257ca0dde7148ffd3c6e5f34490f5b36af97ba7e891fa4efea7d5d9544001787888ac81cf0426f110e1ee1a9', '2019-11-26', 1),
(5, 70, 'abc', 'fff', '[\"de\",\"33asdf\"]', 'gshahaj@gmail.com', '::1', 'abcadfer', 'dhaka', '1756472843', 'd1d7e84d9049900299ee9c0b2c04b11bfa9a0437afc0bf03d8ce0e3fb8523919f13fa3a5130c5ba7987679c6f6945ca87655e746eb5345bdc8131298fa5a9b20', '2019-11-26', 1),
(6, 70, 'abc', 'ddd', '[\"de\"]', 'gshahaj@gmail.com', '::1', 'aa', 'Dhaka', '1756472843', '3ba2942ed1d05551d4360a2a7bb6298c2359061dc07b368949bd3fb7feca3344221257672d772ce456075b7cfa50fd7ce41eaefe529d056bf23dd665de668b78', '2019-11-27', 1),
(7, 70, 'abc', 'ddd', '[\"de\"]', 'gshahaj@gmail.com', '::1', 'ff', 'Dhaka', '1756472843', '3ba2942ed1d05551d4360a2a7bb6298c2359061dc07b368949bd3fb7feca3344221257672d772ce456075b7cfa50fd7ce41eaefe529d056bf23dd665de668b78', '2019-11-27', 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `items`
--
ALTER TABLE `items`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `items`
--
ALTER TABLE `items`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

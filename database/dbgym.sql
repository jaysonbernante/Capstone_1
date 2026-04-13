-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 13, 2026 at 05:54 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dbgym`
--

-- --------------------------------------------------------

--
-- Table structure for table `members`
--

CREATE TABLE `members` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED DEFAULT NULL,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `type` varchar(50) DEFAULT NULL,
  `membership_start` date DEFAULT NULL,
  `membership_end` date DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `username` varchar(50) NOT NULL,
  `gmail` varchar(100) NOT NULL,
  `RFID` varchar(50) DEFAULT NULL,
  `Joined_Date` date DEFAULT curdate(),
  `credit` decimal(10,2) DEFAULT 0.00
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `members`
--

INSERT INTO `members` (`id`, `user_id`, `first_name`, `last_name`, `phone`, `address`, `type`, `membership_start`, `membership_end`, `password`, `username`, `gmail`, `RFID`, `Joined_Date`, `credit`) VALUES
(5, NULL, 'asd', '', '', '', 'member', NULL, NULL, '$2y$10$upP3tN6xk9lmZXpcLTalbuBVSX4qcbF.La74LudLcegUGd8as.5Qa', 'asd', 'asd@example.com', '111', '2026-04-13', 222.00),
(6, NULL, 'jayson', 'bernante', '', '', 'seassion', NULL, NULL, '$2y$10$MNXZPTcntSM6U8Go8ebXXO/Rsum1Rdehwuy0tSdxiAby04aG/M6/m', 'jaysonbernante', '', '11', '2026-04-13', 111.00),
(7, NULL, 'asda', '', '', '', 'member', NULL, NULL, '$2y$10$yu2y4cUDHjQp7Yt0iPIigOODC/ZoyqVxAnleoK7fdRRvMm9WZm9su', 'asda', 'asda@example.com', NULL, '2026-04-13', 0.00),
(8, NULL, 'alegria', 'hosting', '123123123123', 'asdasdd', 'seassion', NULL, NULL, '$2y$10$dzyR.IxZmLPQ9HQReKvcKOtxACfZVOcocBvWH0/sbWQZV8M/QRU5K', 'alegriahosting', 'alegriasystemmngr@gmail.com', NULL, '2026-04-13', 0.00);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `product_name` varchar(100) NOT NULL,
  `quantity` int(11) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `date_stocked` date DEFAULT curdate()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(100) NOT NULL,
  `role` enum('super_admin','staff') DEFAULT 'staff',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `status` varchar(10) NOT NULL DEFAULT 'active'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `email`, `role`, `created_at`, `status`) VALUES
(1, 'admin', '$2y$10$PEsXIWlBFf3dqwJnx8Z4..ucCQKz0K8JxsQpwG6CxQKbb4trcnvn6', 'admin@example.com', 'super_admin', '2026-04-12 08:43:31', 'active'),
(3, 'asd', '$2y$10$470XpC7qnO/sFKFU9Pmh1eK53s3NXeL1lJpjDhRHBIZijl8VCggda', 'asd@example.com', 'staff', '2026-04-13 11:46:38', 'inactive');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `members`
--
ALTER TABLE `members`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `members`
--
ALTER TABLE `members`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `members`
--
ALTER TABLE `members`
  ADD CONSTRAINT `members_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE SET NULL ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 12, 2023 at 02:44 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `jamijoy_br23`
--

-- --------------------------------------------------------

--
-- Table structure for table `transaction_details`
--

CREATE TABLE `transaction_details` (
  `transaction_id` int(11) NOT NULL,
  `amount` int(11) DEFAULT NULL,
  `user_id` int(11) NOT NULL,
  `status` varchar(30) DEFAULT NULL,
  `datetime` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `transaction_details`
--

INSERT INTO `transaction_details` (`transaction_id`, `amount`, `user_id`, `status`, `datetime`) VALUES
(1, 100, 1, 'pending', '2023-10-12 17:54:03'),
(2, 100, 1, 'pending', '2023-10-12 17:59:12'),
(3, 100, 1, 'accepted', '2023-10-12 17:59:29'),
(4, 100, 1, 'pending', '2023-10-12 17:59:51'),
(5, 100, 1, 'pending', '2023-10-12 17:59:55'),
(6, 100, 1, 'pending', '2023-10-12 18:02:03'),
(7, 311, 1, 'pending', '2023-10-12 18:03:15'),
(8, 311, 1, 'pending', '2023-10-12 18:04:09'),
(9, 311, 1, 'failed', '2023-10-12 18:42:23'),
(10, 311, 1, 'pending', '2023-10-12 18:11:19'),
(11, 5000, 1, 'pending', '2023-10-12 18:11:37'),
(12, 5000, 1, 'pending', '2023-10-12 18:18:30'),
(13, 5000, 1, 'pending', '2023-10-12 18:19:20'),
(14, 5000, 1, 'pending', '2023-10-12 18:19:36'),
(15, 3292, 1, 'pending', '2023-10-12 18:36:47'),
(16, 3292, 1, 'pending', '2023-10-12 18:37:34');

-- --------------------------------------------------------

--
-- Table structure for table `transaction_log`
--

CREATE TABLE `transaction_log` (
  `transaction_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `status` int(11) DEFAULT NULL,
  `datetime` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) NOT NULL,
  `username` varchar(15) NOT NULL,
  `password` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`) VALUES
(1, 'jami', '1234');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `transaction_details`
--
ALTER TABLE `transaction_details`
  ADD PRIMARY KEY (`transaction_id`),
  ADD UNIQUE KEY `transaction_details_pk2` (`transaction_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `transaction_details`
--
ALTER TABLE `transaction_details`
  MODIFY `transaction_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

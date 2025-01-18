-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 18, 2025 at 04:08 PM
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
-- Database: `webtech`
--

-- --------------------------------------------------------

--
-- Table structure for table `skill_verifications`
--

CREATE TABLE `skill_verifications` (
  `user_id` int(50) NOT NULL,
  `file_name` varchar(225) NOT NULL,
  `file_path` varchar(225) NOT NULL,
  `skill_name` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `skill_verifications`
--

INSERT INTO `skill_verifications` (`user_id`, `file_name`, `file_path`, `skill_name`) VALUES
(1, 'Screenshot (138).png', '../certification/Screenshot (138).png', 'i'),
(2, 'Screenshot (134).png', '../certification/Screenshot (134).png', 'i'),
(3, 'Screenshot (136).png', '../certification/Screenshot (136).png', 'i'),
(4, 'Screenshot (156).png', '../certification/Screenshot (156).png', 'i');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `skill_verifications`
--
ALTER TABLE `skill_verifications`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `skill_verifications`
--
ALTER TABLE `skill_verifications`
  MODIFY `user_id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

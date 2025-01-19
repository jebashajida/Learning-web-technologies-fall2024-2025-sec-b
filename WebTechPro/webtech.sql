-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 18, 2025 at 06:56 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

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
-- Table structure for table `calender`
--

CREATE TABLE `calender` (
  `ID` int(50) NOT NULL,
  `freelancer_id` int(50) NOT NULL,
  `date` date NOT NULL,
  `availability_status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `type` varchar(50) NOT NULL,
  `company` varchar(255) NOT NULL,
  `pay` decimal(10,2) NOT NULL,
  `applications` int(11) DEFAULT 0,
  `description` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `jobs`
--

INSERT INTO `jobs` (`id`, `title`, `type`, `company`, `pay`, `applications`, `description`) VALUES
(1, 'Software Engineer', 'Full-time', 'TechCorp Inc.', 80000.00, 25, 'Develop and maintain software systems.'),
(2, 'Graphic Designer', 'Freelance', 'CreativeStudio', 45000.00, 15, 'Design graphics for various projects.'),
(3, 'Data Analyst', 'Part-time', 'DataWorks Ltd.', 30000.00, 10, 'Analyze and interpret complex datasets.');

-- --------------------------------------------------------

--
-- Table structure for table `notification`
--

CREATE TABLE `notification` (
  `id` int(50) NOT NULL,
  `notification_text` varchar(225) NOT NULL,
  `created_at` varchar(225) NOT NULL,
  `is_read` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `registration_pro`
--

CREATE TABLE `registration_pro` (
  `ID` int(50) NOT NULL,
  `Name` varchar(50) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `Password` varchar(50) NOT NULL,
  `Type` varchar(50) NOT NULL,
  `number` varchar(50) NOT NULL,
  `gender` varchar(50) NOT NULL,
  `dob` date NOT NULL,
  `profile_picture` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `registration_pro`
--

INSERT INTO `registration_pro` (`ID`, `Name`, `Email`, `Password`, `Type`, `number`, `gender`, `dob`, `profile_picture`) VALUES
(1, 'jeba', 'jeba.18feb@gmail.com', '123', 'admin', '01750120656', 'Female', '2001-02-18', ''),
(2, 'exx', 'xx@gmail.com', '111', 'admin', '11111111122', 'Male', '1212-11-02', ''),
(3, 'eee', 'eenolaa23@gmail.com', '121', 'admin', '01750120656', 'Other', '2121-11-01', ''),
(5, 'NiloyGG', 'nollagomes088@gmail.com', 'Jess34576ee!', 'Employer', '01756689654', 'Male', '1998-05-04', ''),
(6, 'fgfg', 'nollagomes088@gmail.com', 'New23465gg!', 'Employer', '01756689654', 'Male', '1998-05-04', '');

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

-- --------------------------------------------------------

--
-- Table structure for table `terms`
--

CREATE TABLE `terms` (
  `id` int(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `calender`
--
ALTER TABLE `calender`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notification`
--
ALTER TABLE `notification`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `registration_pro`
--
ALTER TABLE `registration_pro`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `skill_verifications`
--
ALTER TABLE `skill_verifications`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `terms`
--
ALTER TABLE `terms`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `calender`
--
ALTER TABLE `calender`
  MODIFY `ID` int(50) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `notification`
--
ALTER TABLE `notification`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `registration_pro`
--
ALTER TABLE `registration_pro`
  MODIFY `ID` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `skill_verifications`
--
ALTER TABLE `skill_verifications`
  MODIFY `user_id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `terms`
--
ALTER TABLE `terms`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

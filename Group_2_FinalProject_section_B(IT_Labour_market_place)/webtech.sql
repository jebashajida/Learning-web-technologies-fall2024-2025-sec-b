-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 20, 2025 at 07:53 PM
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
-- Table structure for table `blogs`
--

CREATE TABLE `blogs` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `category_id` int(11) NOT NULL,
  `created_at` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `blogs`
--

INSERT INTO `blogs` (`id`, `title`, `content`, `category_id`, `created_at`) VALUES
(3, 'Random', 'Random for now', 1, '2025-01-20 21:12:21');

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
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`) VALUES
(1, ''),
(2, 'Random');

-- --------------------------------------------------------

--
-- Table structure for table `disputes`
--

CREATE TABLE `disputes` (
  `id` int(11) NOT NULL,
  `user_type` enum('employer','freelancer') NOT NULL,
  `dispute_details` text NOT NULL,
  `contact_info` varchar(255) NOT NULL,
  `status` varchar(50) DEFAULT 'Pending review',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `disputes`
--

INSERT INTO `disputes` (`id`, `user_type`, `dispute_details`, `contact_info`, `status`, `created_at`) VALUES
(1, 'employer', 'sdfs', 'dfsd@gmail.com', 'Pending review', '2025-01-20 18:28:30');

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
(1, 'Software Engineer', 'Full-time', 'TechCorp Inc.', 80000.00, 26, 'Develop and maintain software systems.'),
(2, 'Graphic Designer', 'Freelance', 'CreativeStudio', 45000.00, 15, 'Design graphics for various projects.'),
(3, 'Data Analyst', 'Part-time', 'DataWorks Ltd.', 30000.00, 10, 'Analyze and interpret complex datasets.');

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `id` int(11) NOT NULL,
  `text` varchar(255) NOT NULL,
  `type` enum('sent','received') NOT NULL,
  `created_at` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`id`, `text`, `type`, `created_at`) VALUES
(1, 'hi', 'sent', '2025-01-18 19:08:45'),
(2, 'hlw', 'sent', '2025-01-18 19:08:55'),
(3, 'Hi A', 'sent', '2025-01-18 19:21:04'),
(4, 'HI B', 'sent', '2025-01-18 19:21:13'),
(5, 'hlww', 'sent', '2025-01-19 13:18:46'),
(6, '..', 'sent', '2025-01-19 13:20:56'),
(7, 'AIUB', 'sent', '2025-01-19 13:26:37');

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
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `id` int(11) NOT NULL,
  `card_number` varchar(16) NOT NULL,
  `name_on_card` varchar(255) NOT NULL,
  `expiry_date` date NOT NULL,
  `cvv` varchar(4) NOT NULL,
  `billing_address` text NOT NULL,
  `save_info` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `payments`
--

INSERT INTO `payments` (`id`, `card_number`, `name_on_card`, `expiry_date`, `cvv`, `billing_address`, `save_info`) VALUES
(1, '1234567891234567', 'MD LEON', '0000-00-00', '222', 'fdgbhnghtgb', 1),
(2, '4657798034757890', 'jkhgfhjg', '0000-00-00', '4568', 'fgrtyefgvgkty', 0);

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
(6, 'fgfg', 'nollagomes088@gmail.com', 'New23465gg!', 'Employer', '01756689654', 'Male', '1998-05-04', ''),
(7, 'LangerHam', 'heril80797@dfesc.com', '!Wer12345', 'Job-Seeker', '01785564988', 'Female', '2002-05-14', ''),
(8, 'Nolla', 'sdfgsgdf@gmail.com', 'New12354gg!', 'Job-Seeker', '01785564988', 'Male', '2003-01-22', '');

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
-- Indexes for table `blogs`
--
ALTER TABLE `blogs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `category_id` (`category_id`);

--
-- Indexes for table `calender`
--
ALTER TABLE `calender`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`);

--
-- Indexes for table `disputes`
--
ALTER TABLE `disputes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notification`
--
ALTER TABLE `notification`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `payments`
--
ALTER TABLE `payments`
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
-- AUTO_INCREMENT for table `blogs`
--
ALTER TABLE `blogs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `calender`
--
ALTER TABLE `calender`
  MODIFY `ID` int(50) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `disputes`
--
ALTER TABLE `disputes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `notification`
--
ALTER TABLE `notification`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `registration_pro`
--
ALTER TABLE `registration_pro`
  MODIFY `ID` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

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

--
-- Constraints for dumped tables
--

--
-- Constraints for table `blogs`
--
ALTER TABLE `blogs`
  ADD CONSTRAINT `blogs_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 27, 2025 at 09:31 AM
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
-- Database: `ticketraiseportal`
--

-- --------------------------------------------------------

--
-- Table structure for table `ticketraise_admin`
--

CREATE TABLE `ticketraise_admin` (
  `admin_id` int(11) NOT NULL,
  `admin_name` varchar(255) NOT NULL,
  `admin_email` varchar(255) NOT NULL,
  `admin_password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `ticketraise_admin`
--

INSERT INTO `ticketraise_admin` (`admin_id`, `admin_name`, `admin_email`, `admin_password`) VALUES
(1, 'Admin1', 'admin@gmail.com', '25f9e794323b453885f5181f1b624d0b');

-- --------------------------------------------------------

--
-- Table structure for table `ticketraise_admin_login_history`
--

CREATE TABLE `ticketraise_admin_login_history` (
  `admin_id` int(11) NOT NULL,
  `admin_username` varchar(255) NOT NULL,
  `logintoken` varchar(255) NOT NULL,
  `logintime` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `ticketraise_admin_login_history`
--

INSERT INTO `ticketraise_admin_login_history` (`admin_id`, `admin_username`, `logintoken`, `logintime`) VALUES
(1, 'admin@gmail.com', '0a40c087a80eb3b7c0db20f8790f13c7', '2025-11-27 10:21:34'),
(2, 'admin@gmail.com', '0a40c087a80eb3b7c0db20f8790f13c7', '2025-11-27 13:42:41'),
(3, 'admin@gmail.com', '0a40c087a80eb3b7c0db20f8790f13c7', '2025-11-27 13:46:06');

-- --------------------------------------------------------

--
-- Table structure for table `ticketraise_user`
--

CREATE TABLE `ticketraise_user` (
  `id` int(11) NOT NULL,
  `Name` varchar(255) NOT NULL,
  `Email` varchar(255) NOT NULL,
  `Password` varchar(255) NOT NULL,
  `CreatedDate` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `ticketraise_user`
--

INSERT INTO `ticketraise_user` (`id`, `Name`, `Email`, `Password`, `CreatedDate`) VALUES
(1, 'Aniket Aher', 'aniketaher2002@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', '2025-11-27 13:40:13');

-- --------------------------------------------------------

--
-- Table structure for table `ticketraise_user_login_history`
--

CREATE TABLE `ticketraise_user_login_history` (
  `id` int(11) NOT NULL,
  `useremail` varchar(255) NOT NULL,
  `logintoken` varchar(255) NOT NULL,
  `logintime` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `ticketraise_user_login_history`
--

INSERT INTO `ticketraise_user_login_history` (`id`, `useremail`, `logintoken`, `logintime`) VALUES
(1, 'aniketaher2002@gmail.com', '3f672b6a0557443caea77708a57a9861', '2025-11-27 13:40:20'),
(2, 'aniketaher2002@gmail.com', '3f672b6a0557443caea77708a57a9861', '2025-11-27 13:45:29'),
(3, 'aniketaher2002@gmail.com', '3f672b6a0557443caea77708a57a9861', '2025-11-27 13:46:20'),
(4, 'aniketaher2002@gmail.com', '3f672b6a0557443caea77708a57a9861', '2025-11-27 13:59:53');

-- --------------------------------------------------------

--
-- Table structure for table `tickets`
--

CREATE TABLE `tickets` (
  `ticketID` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `ticketTitle` varchar(255) NOT NULL,
  `ticketDescription` varchar(255) NOT NULL,
  `ticketStatus` varchar(25) NOT NULL DEFAULT 'Open',
  `ticketPriority` varchar(100) DEFAULT NULL,
  `ticketCategory` varchar(255) NOT NULL,
  `assign_to` int(11) DEFAULT NULL,
  `imgFile` varchar(255) DEFAULT NULL,
  `CreatedDate` datetime DEFAULT NULL,
  `UpdatedDate` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tickets`
--

INSERT INTO `tickets` (`ticketID`, `user_id`, `ticketTitle`, `ticketDescription`, `ticketStatus`, `ticketPriority`, `ticketCategory`, `assign_to`, `imgFile`, `CreatedDate`, `UpdatedDate`) VALUES
(15, 1, 'Login Page not Opening ', 'Lorem, ipsum dolor sit amet consectetur adipisicing elit. Architecto alias deleniti dignissimos sint nam incidunt beatae accusamus molestias voluptatem? Illo temporibus consequatur id? Nostrum?', 'Resolved', 'medium', 'technical', 4, '1764231065_Screenshot 2025-11-25 213537.png', '2025-11-27 13:41:05', '2025-11-27 13:41:05');

-- --------------------------------------------------------

--
-- Table structure for table `ticket_detail`
--

CREATE TABLE `ticket_detail` (
  `ticketdetail_id` int(11) NOT NULL,
  `ticket_id` int(11) NOT NULL,
  `team_id` int(11) NOT NULL,
  `comment` longtext NOT NULL,
  `created_date` datetime NOT NULL,
  `updated_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `ticket_detail`
--

INSERT INTO `ticket_detail` (`ticketdetail_id`, `ticket_id`, `team_id`, `comment`, `created_date`, `updated_date`) VALUES
(1, 15, 4, 'Lorem, ipsum dolor sit amet consectetur adipisicing elit. Architecto alias deleniti dignissimos sint nam incidunt beatae accusamus molestias voluptatem? Illo temporibus consequatur id? Nostrum?ipsum dolor sit amet consectetur adipisicing elit. Architecto alias deleniti dignissimos sint ', '2025-11-27 13:44:50', '2025-11-27 13:44:50');

-- --------------------------------------------------------

--
-- Table structure for table `ticket_support_team`
--

CREATE TABLE `ticket_support_team` (
  `team_id` int(11) NOT NULL,
  `team_name` varchar(255) NOT NULL,
  `team_email` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `ticket_support_team`
--

INSERT INTO `ticket_support_team` (`team_id`, `team_name`, `team_email`) VALUES
(3, 'Aniket', 'aniket@gmail.com'),
(4, 'Amol', 'amol@gmail.com'),
(5, 'DemoAdmin', 'demoadmin@gmail.com'),
(6, 'Shubham', 'shubham@gmail.com');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `ticketraise_admin`
--
ALTER TABLE `ticketraise_admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `ticketraise_admin_login_history`
--
ALTER TABLE `ticketraise_admin_login_history`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `ticketraise_user`
--
ALTER TABLE `ticketraise_user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ticketraise_user_login_history`
--
ALTER TABLE `ticketraise_user_login_history`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tickets`
--
ALTER TABLE `tickets`
  ADD PRIMARY KEY (`ticketID`),
  ADD KEY `fk_assign_to` (`assign_to`);

--
-- Indexes for table `ticket_detail`
--
ALTER TABLE `ticket_detail`
  ADD PRIMARY KEY (`ticketdetail_id`),
  ADD KEY `fk_ticket_detail_ticket` (`ticket_id`),
  ADD KEY `fk_ticket_detail_team` (`team_id`);

--
-- Indexes for table `ticket_support_team`
--
ALTER TABLE `ticket_support_team`
  ADD PRIMARY KEY (`team_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `ticketraise_admin`
--
ALTER TABLE `ticketraise_admin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `ticketraise_admin_login_history`
--
ALTER TABLE `ticketraise_admin_login_history`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `ticketraise_user`
--
ALTER TABLE `ticketraise_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `ticketraise_user_login_history`
--
ALTER TABLE `ticketraise_user_login_history`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tickets`
--
ALTER TABLE `tickets`
  MODIFY `ticketID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `ticket_detail`
--
ALTER TABLE `ticket_detail`
  MODIFY `ticketdetail_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `ticket_support_team`
--
ALTER TABLE `ticket_support_team`
  MODIFY `team_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tickets`
--
ALTER TABLE `tickets`
  ADD CONSTRAINT `fk_assign_to` FOREIGN KEY (`assign_to`) REFERENCES `ticket_support_team` (`team_id`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Constraints for table `ticket_detail`
--
ALTER TABLE `ticket_detail`
  ADD CONSTRAINT `fk_ticket_detail_team` FOREIGN KEY (`team_id`) REFERENCES `ticket_support_team` (`team_id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_ticket_detail_ticket` FOREIGN KEY (`ticket_id`) REFERENCES `tickets` (`ticketID`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

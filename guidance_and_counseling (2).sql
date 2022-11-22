-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 22, 2022 at 08:37 AM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 7.4.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `guidance_and_counseling`
--

-- --------------------------------------------------------

--
-- Table structure for table `appointments`
--

CREATE TABLE `appointments` (
  `id` int(11) NOT NULL,
  `timeslot` varchar(255) NOT NULL,
  `timeslot_end` varchar(100) DEFAULT NULL,
  `date` date NOT NULL,
  `user_type` varchar(150) NOT NULL,
  `ref_id` int(20) DEFAULT NULL,
  `id_number` int(20) NOT NULL,
  `subject` varchar(255) NOT NULL,
  `appointment_type` varchar(50) NOT NULL,
  `info` varchar(300) NOT NULL,
  `app_status` varchar(150) NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `meeting_link` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `appointment_history`
--

CREATE TABLE `appointment_history` (
  `id` int(11) NOT NULL,
  `app_id` int(11) NOT NULL,
  `reason` varchar(300) NOT NULL,
  `status` varchar(150) NOT NULL,
  `date_accomplished` date NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `id` int(11) NOT NULL,
  `student_name` varchar(255) NOT NULL,
  `program` varchar(255) NOT NULL,
  `section` varchar(150) NOT NULL,
  `app_id` int(20) NOT NULL,
  `session_date` date NOT NULL,
  `feedback_date` date NOT NULL,
  `action_taken` varchar(300) NOT NULL,
  `remarks` varchar(300) NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`id`, `student_name`, `program`, `section`, `app_id`, `session_date`, `feedback_date`, `action_taken`, `remarks`, `updated_at`) VALUES
(1, 'hannah marie perez', 'BSIT', '3', 1, '2022-10-18', '2022-10-18', 'Feedback Action Taken1', 'Feedback Remarks1', '2022-10-18 15:06:29'),
(2, 'Josephine Bracken', 'BSIT', '4', 2, '2022-10-20', '2022-10-18', 'Feedback Action Taken2', 'Feedback Remarks2', '2022-10-18 15:08:51'),
(3, 'juan dela cruz', 'BSIT', '4', 3, '2022-10-21', '2022-10-18', 'Feedback Action Taken3', 'Feedback Remarks3', '2022-10-18 15:26:21'),
(4, 'jessica bernardo', 'BSIT', '4', 4, '2022-10-19', '2022-10-18', 'Feedback Action Taken4', 'Feedback Remarks4', '2022-10-18 15:55:06');

-- --------------------------------------------------------

--
-- Table structure for table `offense_monitoring`
--

CREATE TABLE `offense_monitoring` (
  `id` int(11) NOT NULL,
  `student_id` varchar(150) NOT NULL,
  `stud_name` varchar(255) NOT NULL,
  `offense_type` varchar(255) NOT NULL,
  `description` varchar(300) NOT NULL,
  `date_created` date NOT NULL,
  `sanction` varchar(255) NOT NULL,
  `start_date` date DEFAULT NULL,
  `end_date` date DEFAULT NULL,
  `status` varchar(100) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `offense_monitoring`
--

INSERT INTO `offense_monitoring` (`id`, `student_id`, `stud_name`, `offense_type`, `description`, `date_created`, `sanction`, `start_date`, `end_date`, `status`, `created_at`, `updated_at`) VALUES
(1, '1003001', 'Juan Dela Cruz', 'Offense A', 'Bullying a student', '2022-10-25', 'Clean toilet for 3 days', '2022-10-26', '2022-10-28', 'Active', '2022-10-25 09:14:32', '2022-10-25 18:11:25');

-- --------------------------------------------------------

--
-- Table structure for table `personal_appointment`
--

CREATE TABLE `personal_appointment` (
  `id` int(11) NOT NULL,
  `userid` int(100) NOT NULL DEFAULT 0,
  `timeslot` varchar(255) DEFAULT NULL,
  `timeslot_end` varchar(100) DEFAULT NULL,
  `information` varchar(255) NOT NULL,
  `subject` varchar(255) NOT NULL,
  `app_date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `refferals`
--

CREATE TABLE `refferals` (
  `ref_id` int(11) NOT NULL,
  `reffered_user` int(20) NOT NULL,
  `source` varchar(255) NOT NULL,
  `reffered_by` int(20) NOT NULL,
  `reffered_date` date NOT NULL,
  `nature` varchar(255) NOT NULL,
  `reason` text NOT NULL,
  `actions` text NOT NULL,
  `remarks` varchar(255) NOT NULL,
  `ref_status` varchar(255) NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `refferals`
--

INSERT INTO `refferals` (`ref_id`, `reffered_user`, `source`, `reffered_by`, `reffered_date`, `nature`, `reason`, `actions`, `remarks`, `ref_status`, `updated_at`) VALUES
(1, 6, 'Guidance Counselor', 3, '2022-10-03', 'Academic', 'Slow learner', 'Kinausap ng teacher ng masisinsinan', 'Unhealthy Environment', 'Cancelled', '2022-10-12 09:26:29'),
(2, 3, 'Faculty', 4, '2022-10-04', 'Career', 'Madaling mainis', 'Have Tutor', 'Unhealthy Environment', 'Cancelled', '2022-10-20 15:25:03'),
(3, 7, 'Faculty', 2, '2022-10-03', 'Personal', 'Nagwawala', 'Pinacheck up sa Doctor', 'Needs Psychiatry', 'Pending', '2022-10-12 11:43:18'),
(5, 5, 'Guidance Counselor', 3, '2022-09-26', 'Personal', 'Slow learner', 'Kinausap ng teacher ng masisinsinan', 'Unhealthy Environment', 'Completed', '2022-10-18 15:55:06'),
(6, 4, 'Classmate/s', 2, '2022-09-21', 'Career', 'Madaling mainis', 'Have tutor', 'Remarks', 'Pending Feedback', '2022-11-03 15:01:07'),
(7, 4, 'Classmate/s', 2, '2022-09-21', 'Career', 'Madaling mainis', 'Have tutor', 'Remarks', 'Completed', '2022-10-18 15:06:29'),
(8, 4, 'Others', 2, '2022-09-27', 'Crisis', 'Poverty', 'Find Part Time Job', 'Pursigido', 'Completed', '2022-10-18 14:54:03'),
(9, 7, 'Staff', 2, '2022-09-27', 'Academic', 'Slow learner', 'Have tutor', 'Unhealthy Environment', 'Completed', '2022-10-12 09:42:48'),
(10, 4, 'Staff', 3, '2022-10-12', 'Personal', 'Bullying', 'Have tutor', 'Need Psychiatry', 'Done', '2022-10-18 14:59:14'),
(11, 5, 'Staff', 3, '2022-10-12', 'Career', 'Poverty', 'Find Part Time Job', 'Unhealthy Environment', 'Pending', '2022-10-12 09:59:17'),
(12, 3, 'Guidance Counselor', 2, '2022-10-12', 'Personal', 'Poverty', 'Teachers counseling', 'Pursigido', 'Completed', '2022-10-18 15:26:21');

-- --------------------------------------------------------

--
-- Table structure for table `reports`
--

CREATE TABLE `reports` (
  `id` int(11) NOT NULL,
  `user_id` int(20) NOT NULL,
  `refferal_id` int(20) NOT NULL,
  `offense` varchar(255) NOT NULL,
  `date` date NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` int(11) NOT NULL,
  `roles` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `roles`) VALUES
(1, 'administrator'),
(2, 'staff'),
(3, 'student'),
(4, 'counselor');

-- --------------------------------------------------------

--
-- Table structure for table `sms`
--

CREATE TABLE `sms` (
  `id` int(11) NOT NULL,
  `sender` int(255) NOT NULL DEFAULT 0,
  `reciever` int(255) NOT NULL DEFAULT 0,
  `text_sms` varchar(255) DEFAULT NULL,
  `seen_status` int(11) NOT NULL DEFAULT 0,
  `date_sent` datetime NOT NULL DEFAULT current_timestamp(),
  `group_sms` int(22) NOT NULL DEFAULT 0,
  `delete_status` int(100) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sms`
--

INSERT INTO `sms` (`id`, `sender`, `reciever`, `text_sms`, `seen_status`, `date_sent`, `group_sms`, `delete_status`) VALUES
(1, 1, 3, 'Good morning can we setup a meeting?', 1, '2022-11-19 09:02:38', 3, 0),
(2, 3, 1, 'Yes sir just setup an appointment for me', 1, '2022-11-19 09:03:57', 3, 0),
(3, 1, 3, 'Okay thanks!', 1, '2022-11-19 09:08:32', 3, 0),
(4, 3, 1, 'You\'re welcome sir..', 1, '2022-11-19 09:12:51', 3, 0),
(5, 1, 3, 'nice', 1, '2022-11-19 09:23:50', 3, 0),
(6, 3, 1, 'hahahahaha', 1, '2022-11-19 12:29:18', 3, 0),
(7, 3, 1, 'hi sir ?', 1, '2022-11-19 12:39:45', 3, 0),
(8, 3, 1, 'sir?', 1, '2022-11-19 13:10:00', 3, 0),
(9, 3, 1, 'hey', 1, '2022-11-19 13:14:24', 3, 0),
(10, 3, 1, 'heyyyww', 1, '2022-11-19 13:18:00', 3, 0),
(11, 1, 3, 'sorry for the late reply', 1, '2022-11-19 13:19:48', 3, 0),
(12, 1, 3, 'im busy', 1, '2022-11-19 13:20:53', 3, 0),
(13, 1, 3, 'how are youu ?', 1, '2022-11-19 13:25:09', 3, 0),
(14, 3, 1, 'where are you sir ?', 1, '2022-11-19 13:25:37', 3, 0),
(15, 1, 3, 'hey', 1, '2022-11-19 13:26:17', 3, 0),
(16, 1, 3, 'juan ?', 1, '2022-11-19 13:28:15', 3, 0),
(17, 3, 1, 'yes sir?', 1, '2022-11-19 13:30:55', 3, 0),
(18, 1, 3, 'how are you today?', 1, '2022-11-19 13:32:40', 3, 0),
(19, 3, 1, 'im fine sir', 1, '2022-11-19 13:34:56', 3, 0),
(20, 1, 3, 'ahh nice to hear', 1, '2022-11-19 13:35:12', 3, 0),
(21, 3, 1, 'yes sir', 1, '2022-11-19 13:35:29', 3, 0),
(22, 1, 3, 'are you okay now ?', 1, '2022-11-19 13:37:27', 3, 0),
(23, 1, 3, 'juan ?', 1, '2022-11-19 13:38:08', 3, 0),
(24, 3, 1, 'yes sir im ok now', 1, '2022-11-19 13:39:59', 3, 0),
(25, 1, 3, 'that is good', 1, '2022-11-19 13:40:08', 3, 0),
(26, 1, 3, 'lets have a meeting tommorow', 1, '2022-11-19 13:40:37', 3, 0),
(27, 3, 1, 'ok sir noted', 1, '2022-11-19 13:40:49', 3, 0),
(28, 1, 3, 'that is good', 1, '2022-11-19 13:55:36', 3, 0),
(29, 1, 3, 'please see me later', 1, '2022-11-19 13:57:09', 3, 0),
(31, 3, 1, 'hey', 1, '2022-11-19 14:01:04', 3, 0),
(32, 1, 3, 'yes?', 1, '2022-11-19 14:01:52', 3, 0),
(33, 3, 1, 'sir?', 1, '2022-11-19 14:02:22', 3, 0),
(34, 1, 3, 'hey', 1, '2022-11-19 14:02:56', 3, 0),
(35, 1, 3, 'hey', 1, '2022-11-19 14:03:02', 3, 0),
(36, 1, 3, 'asdasdasd', 1, '2022-11-19 14:05:15', 3, 0),
(37, 1, 3, 'asdasdasd', 1, '2022-11-19 14:07:29', 3, 0),
(38, 3, 1, 'hahahaha', 1, '2022-11-19 14:09:03', 3, 0),
(39, 1, 3, 'hey', 1, '2022-11-19 14:09:10', 3, 0),
(40, 3, 1, 'yes', 1, '2022-11-19 14:15:45', 3, 0),
(41, 1, 3, 'hey', 1, '2022-11-19 14:15:53', 3, 0),
(42, 3, 1, 'yes', 1, '2022-11-19 14:20:04', 3, 0),
(43, 1, 3, 'hahahah goods', 1, '2022-11-19 14:20:10', 3, 0),
(44, 1, 3, 'wehre you ', 1, '2022-11-19 14:21:15', 3, 0),
(45, 3, 1, 'imhere', 1, '2022-11-19 14:22:04', 3, 0),
(46, 1, 3, 'hey', 1, '2022-11-21 11:52:02', 3, 0),
(49, 1, 6, 'hey', 1, '2022-11-21 12:38:58', 6, 0),
(56, 2, 1, 'hey?', 1, '2022-11-21 15:36:44', 2, 0),
(60, 1, 3, 'hey', 1, '2022-11-22 13:23:44', 3, 0);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `id_number` int(20) NOT NULL,
  `last_name` varchar(150) NOT NULL,
  `first_name` varchar(150) NOT NULL,
  `middle_name` varchar(150) NOT NULL,
  `address` varchar(300) NOT NULL,
  `contact` varchar(20) NOT NULL,
  `gender` varchar(20) DEFAULT NULL,
  `date_of_birth` date DEFAULT NULL,
  `department` varchar(50) DEFAULT NULL,
  `program` varchar(50) NOT NULL,
  `level` varchar(50) DEFAULT NULL,
  `position` varchar(150) DEFAULT NULL,
  `status` varchar(50) NOT NULL,
  `user_image` varchar(300) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` int(11) NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `limit_app` int(100) NOT NULL DEFAULT 0,
  `sms_status` int(100) NOT NULL DEFAULT 0,
  `active_status` int(100) NOT NULL DEFAULT 0,
  `typing` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `id_number`, `last_name`, `first_name`, `middle_name`, `address`, `contact`, `gender`, `date_of_birth`, `department`, `program`, `level`, `position`, `status`, `user_image`, `email`, `password`, `role`, `updated_at`, `limit_app`, `sms_status`, `active_status`, `typing`) VALUES
(1, 1001, 'Counselor', 'Guidance', '', 'angeles, pampanga', '639353204785', 'Female', '2007-07-06', 'admin', 'admin', NULL, 'guidance', 'active', '1.jpg', 'guidance@gmail.com', 'guidance', 1, '2022-11-22 05:22:06', 0, 1, 0, 0),
(2, 1002, 'doe', 'jane', '', 'angeles, pampanga', '123456789', 'female', '2007-07-06', 'engineering', 'staff', NULL, 'staff', 'active', NULL, 'staff@gmail.com', 'staff', 2, '2022-11-22 07:35:13', 0, 0, 0, 0),
(3, 1003001, 'dela cruz', 'juan', '', 'angeles, pampanga', '123456789', 'male', '2007-07-06', 'IT', 'BSIT', '4', 'student', 'active', NULL, 'juandelacruz@gmail.com', 'student', 3, '2022-11-22 07:35:26', 0, 0, 0, 0),
(4, 10025410, 'perez', 'hannah marie', 'esclito', 'san fernando, pampanga', '238541258', 'female', '2007-07-06', 'IT', 'BSIT', '3', 'student', 'active', NULL, 'hannah@gmail.com', 'hannah', 3, '2022-11-19 06:26:09', 0, 0, 0, 0),
(5, 10025123, 'bernardo', 'jessica', '', 'magalang, pampanga', '52147823', 'female', '2007-07-06', 'IT', 'BSIT', '4', 'student', 'active', NULL, 'jessica@gmail.com', 'JB025123', 3, '2022-11-22 07:36:30', 0, 0, 0, 0),
(6, 100232541, 'cabiles', 'rex bryan', 'gayla', 'san fernando, pampanga', '123456789', 'male', '2007-07-06', 'engineering', 'BSIT', '5', 'student', 'active', NULL, 'rexbryan@gmail.com', 'rexbryan', 3, '2022-11-04 13:49:28', 0, 0, 0, 0),
(7, 100254256, 'galang', 'maria elizabeth', '', 'bamban, tarlac', '123456987', 'female', '2007-07-06', 'engineering', 'CpE', '3', 'student', 'active', NULL, 'elizabeth@gmail.com', 'elizabeh', 3, '2022-11-22 07:36:30', 0, 0, 0, 0),
(8, 20012546, 'Bracken', 'Josephine', 'Clemente', 'Arayat, Pampanga', '453257892', 'Female', '2007-07-06', 'IT', 'BSIT', '4', 'Student', 'Active', NULL, 'josephine@gmail.com', 'josephine', 3, '2022-11-04 13:49:39', 0, 0, 0, 0),
(9, 422856789, 'Mammaril', 'Juanna Marie', 'Lopez', 'Magalang, Pampanga', '2147483647', 'Female', '2007-07-06', 'IT', '', NULL, 'staff', 'Active', NULL, 'juanna@gmail.com', 'juanna', 2, '2022-11-22 07:36:30', 0, 0, 0, 0),
(10, 498752314, 'Reyes', 'John Archee', 'Romualdez', 'Bamban, Tarlac', '2147483647', 'Male', '2007-07-06', 'Engineering', '', NULL, 'Staff', 'Active', NULL, 'johnarchee@gmail.com', 'archee', 2, '2022-11-04 13:49:48', 0, 0, 0, 0),
(11, 1000095, 'Marquez', 'Justine', 'Del Valle', 'Clark, Pampanga', '487451230', 'Male', '2007-07-06', 'Admin', '', NULL, 'Guidance', 'Active', '3.jpg', 'justinemarquez@gmail.com', 'justine', 4, '2022-11-04 13:49:53', 0, 0, 0, 0),
(12, 1000099, 'Empania', 'Dennis', 'Reyes', 'Mabalacat, Pampanga', '09354524886', 'Male', '2007-07-06', 'Engineering', 'BSIT', NULL, 'Guidance', 'Active', '2.jpg', 'dennis@gmail.com', 'dennis', 4, '2022-11-04 13:49:58', 0, 0, 0, 0),
(20, 1000055, 'Robinson', 'Tony', '', 'Arayat, Pampanga', '09354524874', 'Male', '1996-03-24', 'Engineering', 'BSIT', NULL, 'Guidance', 'Active', NULL, 'tony@gmail.com', 'tonyrobinson', 4, '2022-11-04 13:50:07', 0, 0, 0, 0),
(128, 2000245727, 'BANGELES', 'ROWELLA', 'MALLARI', '213 sta ana st. angeles city', '9121312331', NULL, NULL, NULL, 'HUMSS', 'G11', 'Student', 'Active', NULL, 'BANGELES.245727@angeles.sti.edu.ph', 'RB245727', 3, '2022-11-04 13:52:09', 0, 0, 0, 0),
(129, 2000258351, 'BAQUIRAN', 'CHARMAINE', ' ', 'B11 L13 PHASE 4 COBAL  ST. MANSFIELD RESIDENCES STO DOMINGO, ANGELES CITY    ', ' ', NULL, NULL, NULL, 'CUART', 'G11', 'Student', 'Active', NULL, 'BAQUIRAN.258351@angeles.sti.edu.ph', 'CB258351', 3, '2022-11-04 13:52:09', 0, 0, 0, 0),
(130, 2000232823, 'ACUB', 'MARQUEYZA', 'BUTIC', '03 LAURA ST. BRGY. LAKANDULA       MABALACAT CITY', '  09217112098,  ', NULL, NULL, NULL, 'MAWD', 'G12', 'Student', 'Active', NULL, 'ACUB.232823@angeles.sti.edu.ph', 'MA232823', 3, '2022-11-04 13:52:09', 0, 0, 0, 0),
(131, 2000232816, 'ACUB', 'RINA ELHYM', 'BUTIC', '03 LAURA ST. BRGY LAKANDULA       MABALACAT CITY', '  09217238346,  ', NULL, NULL, NULL, 'CCTECH', 'G12', 'Student', 'Active', NULL, 'ACUB.232816@angeles.sti.edu.ph', 'REA232816', 3, '2022-11-04 13:52:09', 0, 0, 0, 0),
(132, 2000257346, 'ABADIES', 'GEFEL', 'NABOR', 'BLK.8 LOT 16 SOLANA FRONTERA FLAMINGO ST. SAPALIBUTAD   ANGELES', '  09269979985', NULL, NULL, NULL, 'BSTM', '1Y2', 'Student', 'Active', NULL, 'ABADIES.257346@angeles.sti.edu.ph', 'GA257346', 3, '2022-11-04 13:52:09', 0, 0, 0, 0),
(133, 2000197721, 'ABASOLO', 'RICHARD', 'IMPERIAL', '34-24 SARITA ST. DIAMOND SUBD.     ANGELES CITY', '  09199925436,  0968', NULL, NULL, NULL, 'BSTM', '3Y2', 'Student', 'Active', NULL, 'ABASOLO.197721@angeles.sti.edu.ph', 'RA197721', 3, '2022-11-04 13:52:09', 0, 0, 0, 0),
(134, 2000155605, 'ABASULA', 'CRISELDA', 'OLOYA', 'B45 L65 MAPAGMALASAKIT ST. FIESTA COMMUNITIES MANIBAUG PORAC PAMP.  ', '  09261696596', NULL, NULL, NULL, 'BSTM', '3Y2', 'Student', 'Active', NULL, 'ABASULA.155605@angeles.sti.edu.ph', 'CA155605', 3, '2022-11-04 13:52:09', 0, 0, 0, 0),
(135, 2000273259, 'ABELLA', 'ELLA MAE', 'ONGRAY', '13033 PERAS ST. DAU HOMESITE     MABALACAT', '  09183593384,  ', NULL, NULL, NULL, 'BSTM', '1Y2', 'Student', 'Active', NULL, 'ABELLA.273259@angeles.sti.edu.ph', 'EMA273259', 3, '2022-11-04 13:52:09', 0, 0, 0, 0),
(136, 2000145529, 'ABELLAR', 'NIÑA', 'ABOIME', '4767 BOUNGAVILLA ST. DAU SAN ISIDRO MABALACAT PAMP.  ', '  09091072793,  ', NULL, NULL, NULL, 'BSTM', '4Y2', 'Student', 'Active', NULL, 'ABELLAR.145529@angeles.sti.edu.ph', 'NA145529', 3, '2022-11-04 13:52:09', 0, 0, 0, 0),
(137, 2000266053, 'ABOG', 'JEZZA', 'REYES', 'BLK. 19 LOT 13 17 ST MRC BRGY. MAWAQUE MABALACAT   ANGELES', '  09475861724,  0950', NULL, NULL, NULL, 'BSTM', '1Y2', 'Student', 'Active', NULL, 'ABOG.266053@angeles.sti.edu.ph', 'JA266053', 3, '2022-11-04 13:52:09', 0, 0, 0, 0),
(138, 2000228840, 'ABOY', 'YLIJAH YVONNE CHRISTENCEN', 'BALAGTAS', '1048 QUEZON DRIVE DAU LA UNION   MABALACAT', '  09988687332', NULL, NULL, NULL, 'BSBAOM', '2Y2', 'Student', 'Active', NULL, 'ABOY.228840@angeles.sti.edu.ph', 'YYCA228840', 3, '2022-11-04 13:52:09', 0, 0, 0, 0),
(139, 2000109278, 'ACAR', 'MARK JOSEPH', 'DAMALLA', '184 IPIL-IPIL PUROK 7 PULONG MARAGUL       ANGELES CITY', '  09265333300,  ', NULL, NULL, NULL, 'BSIT', '2Y2', 'Student', 'Active', NULL, 'ACAR.109278@angeles.sti.edu.ph', 'MJA109278', 3, '2022-11-04 13:52:09', 0, 0, 0, 0),
(140, 2000200086, 'ALAN', 'GERALD WENCESLAO', ' ', 'BLK 19 LOT 31 ANA ST. XEVERA BRGY TABUN     MABALACAT', '  09303434579,  ', NULL, NULL, NULL, 'BSBAOM', '3Y2', 'Student', 'Active', NULL, 'ALAN.200086@angeles.sti.edu.ph', 'GWA200086', 3, '2022-11-04 13:52:09', 0, 0, 0, 0),
(141, 2000041648, 'ALONZO', 'RUZZELL JUSTIN', ' ', '785 MABINI STREET PLARIDEL 1 MALABANIAS       ANGELES CITY', '  09752434037', NULL, NULL, NULL, 'BSHM', '4Y2', 'Student', 'Active', NULL, 'ALONZO.041648@angeles.sti.edu.ph', 'RJA041648', 3, '2022-11-04 13:52:09', 0, 0, 0, 0),
(142, 2000083331, 'ANCIANO', 'ERICA MAE', 'SOTERO', 'JAOVIL       ANGELES CITY', '  09355832215,  ', NULL, NULL, NULL, 'BSHM', '3Y2', 'Student', 'Active', NULL, 'ANCIANO.083331@angeles.sti.edu.ph', 'EMA083331', 3, '2022-11-04 13:52:09', 0, 0, 0, 0),
(143, 2000080306, 'ANORE', 'JUSTINE RUNDELLE', 'OCAMPO', '31-14 SY OROSA ST. DIAMOND SUB. BALIBAGO   ANGELES CITY', '  09167416756,  ', NULL, NULL, NULL, 'BSHM', '3Y2', 'Student', 'Active', NULL, 'ANORE.080306@angeles.sti.edu.ph', 'JRA080306', 3, '2022-11-04 13:52:09', 0, 0, 0, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `appointments`
--
ALTER TABLE `appointments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `appointment_history`
--
ALTER TABLE `appointment_history`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `offense_monitoring`
--
ALTER TABLE `offense_monitoring`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `personal_appointment`
--
ALTER TABLE `personal_appointment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `refferals`
--
ALTER TABLE `refferals`
  ADD PRIMARY KEY (`ref_id`),
  ADD KEY `user_id` (`reffered_user`);

--
-- Indexes for table `reports`
--
ALTER TABLE `reports`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sms`
--
ALTER TABLE `sms`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`),
  ADD KEY `user-role` (`role`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `appointments`
--
ALTER TABLE `appointments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `appointment_history`
--
ALTER TABLE `appointment_history`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `offense_monitoring`
--
ALTER TABLE `offense_monitoring`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `personal_appointment`
--
ALTER TABLE `personal_appointment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `refferals`
--
ALTER TABLE `refferals`
  MODIFY `ref_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `reports`
--
ALTER TABLE `reports`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `sms`
--
ALTER TABLE `sms`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=144;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `refferals`
--
ALTER TABLE `refferals`
  ADD CONSTRAINT `user_id` FOREIGN KEY (`reffered_user`) REFERENCES `users` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `user-role` FOREIGN KEY (`role`) REFERENCES `roles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 08, 2022 at 08:33 AM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 7.3.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sampleproject`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `admin_id` int(8) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `timestamp` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`admin_id`, `username`, `password`, `timestamp`) VALUES
(1, 'admin', '12345', '2022-07-03 17:27:46'),
(6, 'admin1', '12345', '2022-07-07 20:47:02'),
(7, 'admin2', '12345', '2022-07-07 20:50:02'),
(8, 'admin3', '12345', '2022-07-07 20:51:15');

-- --------------------------------------------------------

--
-- Table structure for table `applications`
--

CREATE TABLE `applications` (
  `application_id` int(8) NOT NULL,
  `applicant_id` int(8) NOT NULL,
  `applied_to_id` int(8) NOT NULL,
  `username` varchar(255) NOT NULL,
  `question` text NOT NULL,
  `links` text NOT NULL,
  `timestamp` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `applications`
--

INSERT INTO `applications` (`application_id`, `applicant_id`, `applied_to_id`, `username`, `question`, `links`, `timestamp`) VALUES
(8, 1, 6, 'jatin', 'Explanation: By highlighting your experience with a particular skill that the position requires, describe in detail what that experience looks like and how you have used it previously. This gives the hiring manager the chance to see some of your work and determine if it fits what they are looking for in a candidate.', 'https://jatinw-portfolio.netlify.app', '2022-07-07 20:53:41'),
(9, 1, 7, 'jatin', 'Explanation: By highlighting your experience with a particular skill that the position requires, describe in detail what that experience looks like and how you have used it previously. This gives the hiring manager the chance to see some of your work and determine if it fits what they are looking for in a candidate.', 'https://www.google.com/search?q=why+should+we+hire+you&rlz=1C1CHBF_enIN956IN956&oq=why+should+we+hire+you&aqs=chrome..69i57j0i20i263i512j0i512l8.5151j0j7&sourceid=chrome&ie=UTF-8', '2022-07-07 20:55:32'),
(10, 1, 8, 'jatin', 'I’m glad you asked. You explained earlier that leadership qualities are a bonus for this position. In my 10 years of experience as a sales manager, I have effectively managed teams of over 15 people. I developed motivational skills that earned my region the “Region of the Year” five years in a row for consistently meeting and exceeding sales goals. I will bring those leadership abilities to this position. ', 'https://novoresume.com/career-blog/why-should-we-hire-you-best-answers#:~:text=Explanation%3A%20By%20highlighting%20your%20experience,looking%20for%20in%20a%20candidate.', '2022-07-07 20:56:16'),
(11, 1, 9, 'jatin', 'Showing that you have “bonus” skills is a great way to separate yourself from the other candidates. If the hiring manager explicitly states that they are really looking for someone that also has certain skills, answering this question by showing you possess those skills will only strengthen your qualifications in the interviewer’s mind. ', 'https://novoresume.com/career-blog/why-should-we-hire-you-best-answers#:~:text=Explanation%3A%20By%20highlighting%20your%20experience,looking%20for%20in%20a%20candidate.', '2022-07-07 21:33:53'),
(12, 2, 6, 'janu watts', 'bs hire krlo mujhe kya fark pdta h', 'https://flanadhimkana.com', '2022-07-07 23:57:01'),
(13, 1, 10, 'jatin', 'bss krlo na kya frk pdta h', 'https://jatinw-portfolio.netlify.app\r\n', '2022-07-08 11:20:25');

-- --------------------------------------------------------

--
-- Table structure for table `brands`
--

CREATE TABLE `brands` (
  `brand_id` int(8) NOT NULL,
  `brand_name` varchar(255) NOT NULL,
  `brand_title` varchar(255) NOT NULL,
  `brand_description` text NOT NULL,
  `brand_by` int(8) NOT NULL,
  `timestamp` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `brands`
--

INSERT INTO `brands` (`brand_id`, `brand_name`, `brand_title`, `brand_description`, `brand_by`, `timestamp`) VALUES
(6, 'white wular', 'web dev intern', 'HTML + CSS. No front-end dev is a stranger to HTML and CSS. \r\nJSX. In React, you never really touch HTML proper. \r\nJavaScript Fundamentals + ES6. \r\nGit. \r\nNode + npm. \r\nRedux.\r\n', 1, '2022-07-07 14:16:51'),
(7, 'microsoft', 'software development', 'Software development refers to a set of computer science activities dedicated to the process of creating, designing, deploying and supporting software. Software itself is the set of instructions or programs that tell a computer what to do. It is independent of hardware and makes computers programmable.', 6, '2022-07-07 20:49:32'),
(8, 'google', 'data analyst', 'A data analyst collects, cleans, and interprets data sets in order to answer a question or solve a problem. They work in many industries, including business, finance, criminal justice, science, medicine, and government.', 7, '2022-07-07 20:50:46'),
(9, 'cure.fit', 'product manager', 'A product manager is the person who identifies the customer need and the larger business objectives that a product or feature will fulfill, articulates what success looks like for a product, and rallies a team to turn that vision into a reality.\r\n', 8, '2022-07-07 20:52:13'),
(10, 'khosla cooler', 'electrical engineer', 'Electrical engineers apply the principles of electricity, electronics, and electromagnetism to develop electrical products and systems. They perform risk assessments and ensure compliance with safety standards and electrical engineering codes. They also conduct research to create new applications.', 1, '2022-07-08 11:19:04');

-- --------------------------------------------------------

--
-- Table structure for table `shortlist`
--

CREATE TABLE `shortlist` (
  `shortlist_id` int(8) NOT NULL,
  `user_id` varchar(8) NOT NULL,
  `username` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `timestamp` datetime NOT NULL DEFAULT current_timestamp(),
  `brand_id` int(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `shortlist`
--

INSERT INTO `shortlist` (`shortlist_id`, `user_id`, `username`, `status`, `timestamp`, `brand_id`) VALUES
(33, '1', 'jatin', 'shortlisted', '2022-07-07 22:55:24', 7),
(34, '1', 'jatin', 'shortlisted', '2022-07-07 22:56:06', 8),
(35, '1', 'jatin', 'shortlisted', '2022-07-07 23:48:46', 6),
(36, '1', 'jatin', 'shortlisted', '2022-07-07 23:51:00', 9),
(37, '2', 'janu watts', 'shortlisted', '2022-07-07 23:57:21', 6),
(38, '1', 'jatin', 'shortlisted', '2022-07-08 11:20:50', 10);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(8) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `timestamp` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `username`, `password`, `timestamp`) VALUES
(1, 'jatin', '12345', '2022-07-03 16:44:20'),
(2, 'janu watts', '12345', '2022-07-07 14:11:46'),
(3, 'natik', '12345', '2022-07-07 14:12:07'),
(4, 'rajwanti', '12345', '2022-07-07 14:12:20'),
(5, 'chikku', '12345', '2022-07-07 14:12:33'),
(6, 'vinod', '12345', '2022-07-07 14:12:47'),
(7, 'rahul', '12345', '2022-07-07 14:13:07');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `applications`
--
ALTER TABLE `applications`
  ADD PRIMARY KEY (`application_id`);

--
-- Indexes for table `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`brand_id`);

--
-- Indexes for table `shortlist`
--
ALTER TABLE `shortlist`
  ADD PRIMARY KEY (`shortlist_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `admin_id` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `applications`
--
ALTER TABLE `applications`
  MODIFY `application_id` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `brands`
--
ALTER TABLE `brands`
  MODIFY `brand_id` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `shortlist`
--
ALTER TABLE `shortlist`
  MODIFY `shortlist_id` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

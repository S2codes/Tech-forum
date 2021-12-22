-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 22, 2021 at 03:55 PM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `forum`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `category_id` int(11) NOT NULL,
  `category_name` varchar(255) NOT NULL,
  `category_description` varchar(255) NOT NULL,
  `date` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`category_id`, `category_name`, `category_description`, `date`) VALUES
(1, 'Electronics', 'Electronics comprises the physics, engineering, technology and applications that deal with the emission, flow and control of electrons in vacuum and matter.', '2021-09-17'),
(2, 'Programming', 'Computer programming is the process of designing and building an executable computer program to accomplish a specific computing result or to perform a specific task.', '2021-09-17'),
(3, 'Iot', 'The Internet of Things describes physical objects, that are embedded with sensors, processing ability, software, and other technologies, and that connect and exchange data with other devices and systems over the Internet or other communications networks.', '2021-09-17'),
(4, 'Web Development', 'Web development is the work involved in developing a Web site for the Internet or an intranet. Web development can range from developing a simple single static page of plain text to complex web applications, electronic businesses, and social network servi', '2021-09-18'),
(5, 'Graphics Design', 'Graphic design is the profession and academic discipline whose activity consists in projecting visual communications intended to transmit specific messages to social groups, with specific objectives.', '2021-10-10');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `comment_id` int(8) NOT NULL,
  `comment_content` text NOT NULL,
  `theard_id` int(8) NOT NULL,
  `comment_by` int(11) NOT NULL,
  `stamp` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`comment_id`, `comment_content`, `theard_id`, `comment_by`, `stamp`) VALUES
(1, 'i don\'t KNow', 2, 1, '2021-09-23 02:39:46'),
(2, 'go to youtube and check it', 2, 2, '2021-09-23 02:51:40'),
(3, 'Node Mcu', 3, 3, '2021-09-23 02:52:45'),
(4, 'Node Mcu', 3, 4, '2021-09-23 02:55:10'),
(5, 'it is a current\r\n', 15, 5, '2021-09-23 03:12:19'),
(6, 'ge', 15, 6, '2021-09-23 03:12:32'),
(7, 'heelo\r\n', 2, 7, '2021-10-03 21:16:27'),
(8, 'this my next project', 12, 8, '2021-10-03 21:18:35'),
(9, 'ui - user interfarence ux - user experience', 16, 6, '2021-10-04 01:56:00'),
(10, 'first ans', 17, 2, '2021-10-10 04:46:00'),
(11, 'first ans', 17, 5, '2021-10-10 04:50:13'),
(12, 'hello', 2, 0, '2021-10-10 05:53:19'),
(13, 'I thought Php ', 18, 7, '2021-10-10 07:20:36'),
(14, 'I also not able to connect', 20, 8, '2021-10-10 07:28:47'),
(15, 'Its the design concept', 16, 7, '2021-10-10 07:45:50'),
(16, 'Motion Sensor', 21, 7, '2021-10-10 07:46:11'),
(17, 'its a digital art', 22, 8, '2021-10-10 08:01:38'),
(20, 'I think figma is best to start', 23, 7, '2021-10-17 01:55:50'),
(22, '&ltscript>\r\nconsloe.log(\"hello world\"); &lt/script>', 19, 7, '2021-10-17 02:10:27'),
(23, '&ltscript&gt\r\nconsloe.log(\"hello world\"); &lt/script&gt', 19, 7, '2021-10-17 02:11:51');

-- --------------------------------------------------------

--
-- Table structure for table `theards`
--

CREATE TABLE `theards` (
  `theard_id` int(7) NOT NULL,
  `theard_title` varchar(255) NOT NULL,
  `theard_decs` text NOT NULL,
  `theard_catg_id` int(7) NOT NULL,
  `theard_user_id` int(7) NOT NULL,
  `timestamp` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `theards`
--

INSERT INTO `theards` (`theard_id`, `theard_title`, `theard_decs`, `theard_catg_id`, `theard_user_id`, `timestamp`) VALUES
(1, 'Npm is Not recognized', 'I unable to not recognized npm in Node js.', 2, 4, '2021-09-18 21:54:11'),
(2, 'How to make a rectifier Circuit ?', 'Hello, I am Want make a 12v DC Power supply. Can anyone help me to make it?', 1, 1, '2021-09-20 00:30:12'),
(3, 'Which Is best MCU for IOT, Ardunio or NodeMcu ?', 'Can you please to find the correct Mcu for my next project.', 3, 7, '2021-09-20 00:38:17'),
(4, 'How Start Carrier in Web Developer as a non tech  Background', 'Please give me some sagetion', 2, 2, '2021-09-20 00:39:53'),
(5, 'Gcc is no recgognized ?', 'Please help . my gcc is not recognized in c', 2, 3, '2021-09-21 02:27:50'),
(10, 'Which Programming Language is best for android', 'Please let me know', 2, 4, '2021-09-21 02:35:28'),
(11, 'Which is Best Frame Work for Frontend', 'Hello Everyone I am new to web development can please help to select the right Frame Work\r\n\r\n', 4, 5, '2021-09-21 02:47:33'),
(12, 'How to make led Staircase ligth', 'please help if anyone done it before', 1, 6, '2021-09-21 02:49:50'),
(13, 'How make a realy module', 'please help', 3, 7, '2021-09-23 02:23:43'),
(15, 'what is dc', 'plz elaborate', 1, 2, '2021-09-23 03:11:38'),
(16, 'What is UI/UX', 'please tell m', 4, 3, '2021-10-04 01:55:19'),
(17, 'test question', 'test', 1, 4, '2021-10-10 04:45:38'),
(18, 'what is best backend language', 'please help me to select the best backend language', 4, 5, '2021-10-10 06:56:41'),
(19, 'syntax of password_veriy in php', 'Can anyone please  give me the syntax of password_veriy in php', 4, 5, '2021-10-10 07:17:22'),
(20, 'How to link css filie with php', 'I am unable to connect the CSS file to PHP  file can anyone please help me', 4, 7, '2021-10-10 07:25:24'),
(21, 'which is best sensor for motion sensing', 'Can anyone help me to choose the correct sensor', 3, 8, '2021-10-10 07:41:23'),
(22, 'What is Graphics Design', 'Describe Please', 5, 7, '2021-10-10 07:53:52'),
(23, 'Which is best for web design i.e. AdobeXd of figma ?', 'Please help me to choose the correct tool', 5, 9, '2021-10-17 01:54:45'),
(24, 'how to download npm', 'how to download npm', 2, 7, '2021-10-18 21:21:30');

-- --------------------------------------------------------

--
-- Table structure for table `userdata`
--

CREATE TABLE `userdata` (
  `sno` int(11) NOT NULL,
  `user_name` varchar(35) NOT NULL,
  `user_email` varchar(35) NOT NULL,
  `user_pass` varchar(255) NOT NULL,
  `date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `userdata`
--

INSERT INTO `userdata` (`sno`, `user_name`, `user_email`, `user_pass`, `date`) VALUES
(1, 's', 'ss@gmail.com', '12', '0000-00-00 00:00:00'),
(2, 'harry', '25subhankar@gmail.com', '$2y$10$q1zzsdodLYxVwz9hnY9/r.QaD1/t8phLQsYRmFyQZX36ZxajUyfp6', '2021-10-07 03:20:16'),
(3, 'mark', '25subhankar@gmail.com', '$2y$10$nTqWIt1d4fFAmRl8dc3tY.KZRTliQGnr5i66FCXqqHeea368hYRf2', '2021-10-07 03:28:48'),
(4, 'elon', 'arko09278@gmail.com', '$2y$10$3MV6vFbmbP9LOroN/XThKOeYBFGqoPd8R4P5iBFqD6JfG.YlFRruO', '2021-10-07 04:25:07'),
(5, 'sandeep', 'arko@gmail.com', '$2y$10$fJoqOG9sdbEYefJUUPM2XuD8X5Vjq8nHbaCmEVGoIrZS6nrPtLib2', '2021-10-07 04:27:52'),
(6, 'subhnakar', 'A@gmail.com', '$2y$10$dqn5poU1YGlqmj9JvLcwJeSZZQc9gTzMHPWe1brRujLpOHmYF7u12', '2021-10-07 04:46:53'),
(7, 'legend', 'legend@gmail.com', '$2y$10$nynKcB2QBqblUX481Z/1aujp3aYxZdgaWjTVz2apdA2N1lViU7oA2', '2021-10-08 03:05:01'),
(8, 'Subhanm', 'subham@g.com', '$2y$10$.DoXZ6KFoXe145vja7SIleDlbRTq11MqVrwMWNZBMD1yPaVsv0pj6', '2021-10-10 06:55:36'),
(9, 'Subhankar sarkar', 'ssarkar@gmail.com', '$2y$10$1Uo3BRyJFd9rKfjorGM3k.ntT1EFqvsj.JMJ3wrOoq.UKjN4HHec.', '2021-10-17 01:53:02');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`comment_id`);

--
-- Indexes for table `theards`
--
ALTER TABLE `theards`
  ADD PRIMARY KEY (`theard_id`);
ALTER TABLE `theards` ADD FULLTEXT KEY `theard_title` (`theard_title`,`theard_decs`);

--
-- Indexes for table `userdata`
--
ALTER TABLE `userdata`
  ADD PRIMARY KEY (`sno`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `comment_id` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `theards`
--
ALTER TABLE `theards`
  MODIFY `theard_id` int(7) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `userdata`
--
ALTER TABLE `userdata`
  MODIFY `sno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

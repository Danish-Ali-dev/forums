-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 10, 2021 at 02:22 PM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 8.0.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `forums`
--

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `category_id` int(11) NOT NULL,
  `category_name` varchar(50) NOT NULL,
  `category_description` varchar(300) NOT NULL,
  `created` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`category_id`, `category_name`, `category_description`, `created`) VALUES
(1, 'Python', 'Python is an interpreted high-level general-purpose programming language. Python\'s design philosophy emphasizes code readability with its notable use of significant indentation.', '2021-06-15 16:39:57'),
(2, 'HTML', 'The HyperText Markup Language or HTML is the standard markup language for documents designed to be displayed in a web browser. It can be assisted by technologies such as Cascading Style Sheets and scripting languages such as JavaScript.', '2021-06-15 16:40:34');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `comment_id` int(6) NOT NULL,
  `thread_id` int(6) NOT NULL,
  `comment_content` varchar(1000) NOT NULL,
  `comment_by` int(6) NOT NULL,
  `created` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`comment_id`, `thread_id`, `comment_content`, `comment_by`, `created`) VALUES
(8, 8, 'ywa', 35, '2021-06-17 21:57:14'),
(9, 13, 'You only need to type tour problems that you face and everyone in the community try to solve it', 32, '2021-06-18 15:34:21'),
(10, 13, 'You only need to type tour problems that you face and everyone in the community try to solve it', 32, '2021-06-18 15:34:28'),
(11, 14, 'you need to install the new version\r\n', 32, '2021-06-18 15:37:27'),
(12, 12, '<script> alert(\"hy\"); </script>', 32, '2021-06-18 16:14:49'),
(13, 12, '&ltscript&gt alert(\"hy\"); &lt/script&gt', 32, '2021-06-18 16:18:52'),
(14, 13, '&ltscript&gt alert(\"hy\"); &lt/script&gt', 32, '2021-06-18 16:19:44'),
(15, 13, '&ltscript&gt alert(\"hy\"); &lt/script&gt', 32, '2021-06-18 16:20:04'),
(16, 13, '&ltscript&gt alert(\"hy\"); &lt/script&gt', 32, '2021-06-18 16:20:09');

-- --------------------------------------------------------

--
-- Table structure for table `threads`
--

CREATE TABLE `threads` (
  `thread_id` int(7) NOT NULL,
  `thread_title` varchar(255) NOT NULL,
  `thread_description` varchar(500) NOT NULL,
  `thread_category_id` int(7) NOT NULL,
  `thread_user_id` int(7) NOT NULL,
  `created` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `threads`
--

INSERT INTO `threads` (`thread_id`, `thread_title`, `thread_description`, `thread_category_id`, `thread_user_id`, `created`) VALUES
(8, 'dhi', 'sddf', 1, 32, '2021-06-17 21:46:21'),
(9, 'dhi', 'sddf', 1, 32, '2021-06-17 21:49:43'),
(10, 'dhi', 'sddf', 1, 32, '2021-06-17 21:50:41'),
(11, 'dhi', 'sddf', 1, 32, '2021-06-17 21:51:04'),
(12, 'i am haider', 'yes me', 1, 35, '2021-06-17 21:51:35'),
(13, 'New Entry', 'I am new here. Please give me guidance to use this platform\r\n', 1, 36, '2021-06-18 15:32:16'),
(14, 'webpage', 'i am not be able to write in my webpage', 2, 37, '2021-06-18 15:36:16'),
(15, '&ltscript&gt alert(\"hy t\"); &lt/script&gt', '&ltscript&gt alert(\"hy\"); &lt/script&gt', 1, 32, '2021-06-18 16:20:29');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `username`, `password`, `created`) VALUES
(32, 'danish', '$2y$10$IObpZ1R7GURaFYaMePn1EeuillRiXEDdKuUJMTn2Hk1XVzEVmu4O6', '2021-06-17 16:41:10'),
(35, 'haider', '$2y$10$Vd40oogkLw3ds.DREMWHdOE50IKvTXeeP.Am27IUqqGPOeaZoI6B6', '2021-06-17 18:58:44'),
(36, 'Amir', '$2y$10$ifj9crnsyLLUo3RFLpuAGeOqAzghkuXPc7FoXf0bG5D3FNToGQsp6', '2021-06-18 15:28:39'),
(37, 'mubashir', '$2y$10$qmc6y5kgHRVN9ToVj2UEjelup8IcEiqjECAnGLlRcYDyAWB/XoBo.', '2021-06-18 15:35:34');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`comment_id`),
  ADD KEY `relation with comment by user id` (`comment_by`);

--
-- Indexes for table `threads`
--
ALTER TABLE `threads`
  ADD PRIMARY KEY (`thread_id`),
  ADD KEY `relation with user thread id` (`thread_user_id`);
ALTER TABLE `threads` ADD FULLTEXT KEY `thread_title` (`thread_title`,`thread_description`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `comment_id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `threads`
--
ALTER TABLE `threads`
  MODIFY `thread_id` int(7) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `relation with comment by user id` FOREIGN KEY (`comment_by`) REFERENCES `users` (`user_id`) ON DELETE CASCADE;

--
-- Constraints for table `threads`
--
ALTER TABLE `threads`
  ADD CONSTRAINT `relation with user thread id` FOREIGN KEY (`thread_user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

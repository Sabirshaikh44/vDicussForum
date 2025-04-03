-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 23, 2021 at 07:00 AM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 8.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `vdiscuss`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `category_id` int(8) NOT NULL,
  `category_name` varchar(255) NOT NULL,
  `category_description` varchar(455) NOT NULL,
  `created` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`category_id`, `category_name`, `category_description`, `created`) VALUES
(1, 'Python', 'Python is an interpreted high-level general-purpose programming language. Its design philosophy emphasizes code readability with its use of significant indentation. Its language constructs as well as its object-oriented approach aim to help programmers write clear, logical code for small and large-scale projects.', '2021-09-17 12:56:04'),
(2, 'JavaScript', 'JavaScript, often abbreviated as JS, is a programming language that conforms to the ECMAScript specification. JavaScript is high-level, often just-in-time compiled, and multi-paradigm. It has curly-bracket syntax, dynamic typing, prototype-based object-orientation, and first-class functions.', '2021-09-17 12:58:47'),
(3, 'Django', 'Django is a Python-based free and open-source web framework that follows the model–template–views architectural pattern. It is maintained by the Django Software Foundation, an American independent organization established as a 501 non-profit.Django was designed to help developers take applications from concept to completion as quickly as possible.', '2021-09-17 14:59:32'),
(4, 'Flask', 'Flask is a micro web framework written in Python. It is classified as a microframework because it does not require particular tools or libraries. It has no database abstraction layer, form validation, or any other components where pre-existing third-party libraries provide common functions.', '2021-09-17 15:32:18'),
(5, 'React Js', 'React is a free and open-source front-end JavaScript library for building user interfaces or UI components. It is maintained by Facebook and a community of individual developers and companies. React can be used as a base in the development of single-page or mobile applications.', '2021-09-17 15:41:32'),
(6, 'Angular js', 'AngularJS is a JavaScript-based open-source front-end web framework for developing single-page applications. It is maintained mainly by Google and a community of individuals and corporations.', '2021-09-17 15:44:06');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `comment_id` int(8) NOT NULL,
  `comment_content` text NOT NULL,
  `thread_id` int(8) NOT NULL,
  `comment_by` int(8) NOT NULL,
  `comment_time` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`comment_id`, `comment_content`, `thread_id`, `comment_by`, `comment_time`) VALUES
(1, 'can we post a new comment with user id', 1, 3, '2021-09-21 12:22:00'),
(2, 'yes we can post a comment with user login id', 1, 3, '2021-09-21 12:22:20'),
(3, 'can we comment with useremail now ', 2, 1, '2021-09-21 12:39:25'),
(4, 'yes we can comment now', 2, 1, '2021-09-21 12:39:34'),
(5, 'can umair write comments too', 3, 5, '2021-09-21 12:41:21'),
(6, 'yes anyone can comment on our forum', 3, 5, '2021-09-21 12:41:35'),
(7, 'learn from codewithharry on youtube', 4, 6, '2021-09-21 13:28:03'),
(8, 'can also learn from codecamps', 4, 6, '2021-09-21 13:52:25'),
(9, 'can insert \' comma', 6, 6, '2021-09-21 14:11:59'),
(10, 'check if &lt;script&gt; is given &lt;/script&gt; is writtened correctly', 6, 6, '2021-09-21 14:14:14'),
(11, 'error solved : missing double inverted comma &lt;script&gt; alert(\"hello\"); &lt;/script&gt;', 10, 6, '2021-09-21 14:19:49'),
(12, 'shahabz hu call uta text me pls', 3, 6, '2021-09-21 17:56:47'),
(13, 'assdasdas', 11, 9, '2021-09-22 13:22:35'),
(14, 'we can now packup', 12, 1, '2021-09-22 15:09:36'),
(15, 'can shabnam comment yes', 13, 10, '2021-09-22 21:59:40');

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `srno` int(8) NOT NULL,
  `email` varchar(40) NOT NULL,
  `query_desc` text NOT NULL,
  `email_time` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`srno`, `email`, `query_desc`, `email_time`) VALUES
(1, 'check1@1.com', 'addas', '2021-09-22 16:56:48'),
(2, 'check1@1.com', 'adada', '2021-09-22 16:57:01'),
(3, 'check1@1.com', 'dads', '2021-09-22 16:57:51'),
(4, 'check1@1.com', 'asdasd', '2021-09-22 16:58:20'),
(5, 'check1@1.com', 'dadsa', '2021-09-22 16:59:04'),
(6, 'check1@1.com', 'adassd', '2021-09-22 16:59:09'),
(7, 'check1@1.com', 'adsa', '2021-09-22 16:59:40'),
(8, 'check1@1.comadsadass', 'adasas', '2021-09-22 16:59:52'),
(9, 'check1@1.com', 'fsfsd', '2021-09-22 17:00:35'),
(10, 'check1@1.com', 'sfds', '2021-09-22 17:00:46'),
(11, 'check1@1.com', 'adasds', '2021-09-22 17:01:56'),
(12, 'check1@1.com', 'asds', '2021-09-22 17:04:04'),
(13, 'check1@1.com', 'asdas', '2021-09-22 17:13:46'),
(14, 'check1@1.com', 'adas', '2021-09-22 17:13:49'),
(15, 'check1@1.com', 'sasa', '2021-09-22 17:17:21'),
(16, 'check1@1.com', 'adasa', '2021-09-22 17:18:06'),
(17, 'check1@1.com', 'asdas', '2021-09-22 17:21:26'),
(18, 'check1@1.com', 'adas', '2021-09-22 17:22:32'),
(19, 'check1@1.com', 'dadsaas', '2021-09-22 17:22:42'),
(20, 'check1@1.com', 'asdas', '2021-09-22 17:23:53'),
(21, 'check1@1.com', 'adssa', '2021-09-22 17:24:16'),
(22, 'check1@1.com', 'dadas', '2021-09-22 17:24:24'),
(23, 'check1@1.com', 'asda', '2021-09-22 17:25:08'),
(24, 'check1@1.com', 'dasdsa', '2021-09-22 17:26:15'),
(25, 'check1@1.com', 'dasa', '2021-09-22 17:26:59'),
(26, 'check1@1.com', 'ads', '2021-09-22 17:30:48'),
(27, 'check1@1.com', 'dadsa', '2021-09-22 17:31:06'),
(28, 'check1@1.com', 'dadsa', '2021-09-22 17:33:05'),
(29, 'check1@1.com', 'addas', '2021-09-22 17:33:22'),
(30, 'check1@1.comad', 'adas', '2021-09-22 17:33:39'),
(31, 'check1@1.com', 'daas', '2021-09-22 17:33:55'),
(32, 'check1@1.com', 'adadas', '2021-09-22 17:34:48'),
(33, 'check1@1.com', 'adsa', '2021-09-22 17:37:30'),
(34, 'check1@1.com', 'sdfds', '2021-09-22 17:37:41'),
(35, 'check1@1.com', 'asdsa', '2021-09-22 17:38:02'),
(36, 'sabir@1.com', 'dsasas', '2021-09-22 17:54:15');

-- --------------------------------------------------------

--
-- Table structure for table `threads`
--

CREATE TABLE `threads` (
  `thread_id` int(7) NOT NULL,
  `thread_title` varchar(255) NOT NULL,
  `thread_desc` text NOT NULL,
  `thread_cat_id` int(7) NOT NULL,
  `thread_user_id` int(7) NOT NULL,
  `timestamp` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `threads`
--

INSERT INTO `threads` (`thread_id`, `thread_title`, `thread_desc`, `thread_cat_id`, `thread_user_id`, `timestamp`) VALUES
(1, 'new', 'new we can run', 1, 1, '2021-09-21 12:19:29'),
(2, 'can we post thread now', 'yes we can post it works', 1, 1, '2021-09-21 12:38:58'),
(3, 'can umair also post thread', 'yes anyone can post the thread now on our forum', 1, 5, '2021-09-21 12:40:47'),
(4, 'Resources needed', 'i needs resources to start learning', 2, 6, '2021-09-21 13:27:35'),
(5, 'learning resources', 'lets learn angular after php-mysql', 6, 6, '2021-09-21 13:54:36'),
(6, 'Cant run setTimeout() function', 'comma escape check', 6, 6, '2021-09-21 14:04:19'),
(7, 'Can\'t run setTimeout() function', 'comma escape check2 ', 6, 6, '2021-09-21 14:07:21'),
(8, 'cant,run', 'cant,run', 6, 6, '2021-09-21 14:08:17'),
(9, 'Couldn\'t, run setTimeout() function', 'can,help please', 6, 6, '2021-09-21 14:08:50'),
(10, 'having problem with alert', '&lt;script&gt; alert(\"hello\'); &lt;/script&gt;', 2, 6, '2021-09-21 14:17:15'),
(11, 'new', 'asdasdasd', 1, 9, '2021-09-22 13:22:31'),
(12, 'everything alright', 'yes everything is alright', 1, 1, '2021-09-22 15:09:26'),
(13, 'shabnam here', 'test last', 1, 10, '2021-09-22 21:59:26');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `sno` int(8) NOT NULL,
  `user_email` varchar(30) NOT NULL,
  `user_pass` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`sno`, `user_email`, `user_pass`, `created_at`) VALUES
(1, 'sabir@1.com', '$2y$10$tK0L35lvlXhBz60763.EZ..TCMxiC7TVoyPpnZ0T5F97uAQ38yNBG', '2021-09-20 14:35:34'),
(2, 'sabir@2.com', '$2y$10$to3N4rPKiNzM6NbqPkmv7uzO1p.uwPfWGabZlZ.Xy/bOOxuOl7edO', '2021-09-20 15:42:26'),
(3, 'sabir@3.com', '$2y$10$gjfR1yyCqxu.mb/EjifnOeRb5k4YT62HIlCiuyQJpN1WyZHRsJQl6', '2021-09-20 16:17:26'),
(4, 'sabir@4.com', '$2y$10$oMuRhA6SE/IL7/Yq.x68q.ZBFkaPfdeHUdkDhlZO0ZXUGYAC1OMla', '2021-09-21 10:36:46'),
(5, 'umair@new.com', '$2y$10$SjOKfxw0.JoZYoVS8qTHiOwwY94AMjlAgeqsdFsKEvjKAKtgqKcUm', '2021-09-21 12:28:11'),
(6, 'sabir', '$2y$10$zoQeFRpevG3XKhdTpoD1fukn7zzYSO0T5a0YjjkOV3UKE8MLVnO6u', '2021-09-21 13:24:01'),
(7, 'shahabaz', '$2y$10$L2NUL.NfTszhE9S1.LYsAexb9fFVwN9kxmgUkSA7GryhZwMREZee6', '2021-09-21 17:57:37'),
(8, 'test1', '$2y$10$k3WSNW2iyl7Z7eGS/aEwtOsUheJjR5Ci/JHvskAb3nMLl0L9iTd0W', '2021-09-22 12:41:45'),
(9, 'afsana', '$2y$10$w.SKpeLYhToCgwaSFQSvze95h2.9bOxD.9DmUFkpunXLP1Zl5xPEy', '2021-09-22 13:22:12'),
(10, 'shabnam', '$2y$10$w0C0DAB/odsbeXlM5MsBFusGGF3Es7Kgwc7RlUyjovnwXkKb/zYYW', '2021-09-22 21:59:09');

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
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`srno`);

--
-- Indexes for table `threads`
--
ALTER TABLE `threads`
  ADD PRIMARY KEY (`thread_id`);
ALTER TABLE `threads` ADD FULLTEXT KEY `thread_title` (`thread_title`,`thread_desc`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`sno`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `category_id` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `comment_id` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `srno` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `threads`
--
ALTER TABLE `threads`
  MODIFY `thread_id` int(7) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `sno` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

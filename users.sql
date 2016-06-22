-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Feb 05, 2016 at 05:21 PM
-- Server version: 10.1.8-MariaDB
-- PHP Version: 5.6.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `users`
--

-- --------------------------------------------------------

--
-- Table structure for table `friends`
--

CREATE TABLE `friends` (
  `id` int(11) NOT NULL,
  `user_id` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `friend_id` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `accepted` tinyint(1) NOT NULL,
  `created` datetime NOT NULL,
  `updated` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `friends`
--

INSERT INTO `friends` (`id`, `user_id`, `friend_id`, `accepted`, `created`, `updated`) VALUES
(9, '1', '2', 1, '2016-02-05 06:19:24', '2016-02-05 06:34:23'),
(11, '3', '1', 1, '2016-02-05 06:34:57', '2016-02-05 06:35:14');

-- --------------------------------------------------------

--
-- Table structure for table `ingredients`
--

CREATE TABLE `ingredients` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `ingredients`
--

INSERT INTO `ingredients` (`id`, `name`) VALUES
(1, 'VIet'),
(2, 'qweqwe');

-- --------------------------------------------------------

--
-- Table structure for table `ingredients_recipes`
--

CREATE TABLE `ingredients_recipes` (
  `ingredient_id` int(11) NOT NULL,
  `recipe_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `ingredients_recipes`
--

INSERT INTO `ingredients_recipes` (`ingredient_id`, `recipe_id`) VALUES
(1, 1),
(1, 2);

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `body` text COLLATE utf8_unicode_ci,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `title`, `body`, `created`, `modified`) VALUES
(1, 'The title', 'This is the post body.', '2015-12-07 17:53:38', NULL),
(2, 'A title once again', 'And the post body follows.', '2015-12-07 17:53:38', NULL),
(3, 'Title strikes back', 'This is really exciting! Not.', '2015-12-07 17:53:38', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `recipes`
--

CREATE TABLE `recipes` (
  `id` int(11) NOT NULL,
  `des` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `name1` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `recipes`
--

INSERT INTO `recipes` (`id`, `des`, `name1`) VALUES
(1, 'Viet', 'hahaha'),
(2, 'qweqw', 'qwewq');

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `id` int(11) NOT NULL,
  `full_name` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `sex` tinyint(4) NOT NULL,
  `birth_day` date NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`id`, `full_name`, `sex`, `birth_day`, `created`, `modified`) VALUES
(13, 'viet1', 0, '2015-12-15', '2015-11-15 17:32:40', '2015-12-15 20:56:24'),
(14, 'nguyen viet dao', 0, '0000-00-00', '2015-11-15 17:35:35', '2015-11-15 17:35:46'),
(15, '', 0, '0000-00-00', '2015-11-15 17:38:02', '2015-11-15 17:38:01'),
(16, 'Nguyen Viet Dao', 0, '0000-00-00', '2015-11-15 17:38:26', '2015-11-15 17:38:15'),
(17, 'Viet Nguyen', 0, '0000-00-00', '2015-11-15 17:39:08', '2015-11-15 17:38:59'),
(18, 'nguyen Viet Dao', 0, '0000-00-00', '2015-11-15 17:39:38', '2015-11-15 17:39:30'),
(19, 'Dieu 1', 0, '0000-00-00', '2015-11-15 17:39:51', '2015-11-15 17:39:46'),
(20, 'Viet 1', 0, '0000-00-00', '2015-11-15 17:41:33', '2015-11-15 17:41:29'),
(21, 'viet', 0, '0000-00-00', '2015-11-16 02:05:19', '2015-11-16 02:05:19'),
(22, '', 0, '0000-00-00', '2015-11-16 02:06:45', '2015-11-16 02:06:45'),
(23, 'Nguyen Viet Dao', 0, '0000-00-00', '2015-11-16 02:08:39', '2015-11-16 02:08:39'),
(24, 'Nguyen Viet Dao', 0, '2015-11-16', '2015-11-16 02:09:46', '2015-11-16 03:39:25'),
(25, '', 0, '0000-00-00', '2015-11-16 02:14:44', '2015-11-16 02:14:44'),
(26, 'sdsds', 0, '0000-00-00', '2015-11-16 02:15:23', '2015-11-16 02:15:23'),
(27, 'asdadas', 0, '0000-00-00', '2015-11-16 02:16:39', '2015-11-16 02:16:39'),
(28, 'sadasdas', 0, '0000-00-00', '2015-11-16 02:17:56', '2015-11-16 02:17:56'),
(29, 'Nguyen Viet Dao111', 0, '0000-00-00', '2015-11-16 02:18:39', '2015-11-16 02:18:50'),
(31, '', 0, '0000-00-00', '2015-11-16 02:27:00', '2015-11-16 02:27:00'),
(32, 'Viet Dao', 0, '0000-00-00', '2015-11-16 02:27:42', '2015-11-16 02:27:42'),
(33, 'viet$$$4', 0, '0000-00-00', '2015-11-16 02:47:32', '2015-11-16 02:47:32'),
(34, 'Viet Nguyen', 0, '2015-11-16', '2015-11-16 03:03:03', '2015-11-16 03:03:03'),
(35, 'Nguyen', 0, '2015-11-16', '2015-11-16 03:05:48', '2015-11-16 03:05:48'),
(36, 'Viet@@@', 0, '1970-01-01', '2015-11-16 03:25:57', '2015-11-17 03:51:07'),
(37, 'Dieu82', 0, '0000-00-00', '2015-11-17 03:53:15', '2015-11-17 03:53:27'),
(38, 'Nguyen Viet', 0, '0000-00-00', '2015-12-08 12:36:06', '2015-12-08 12:36:13'),
(39, 'VietDao', 0, '0000-00-00', '2015-12-15 08:11:10', '2015-12-15 08:11:10'),
(40, 'adasdadd', 0, '0000-00-00', '2015-12-15 08:11:57', '2015-12-15 08:11:57'),
(41, 'adasda', 0, '0000-00-00', '2015-12-15 08:12:38', '2015-12-15 08:12:38'),
(42, 'afdasdasdasd', 0, '0000-00-00', '2015-12-15 08:13:26', '2015-12-15 08:13:26'),
(43, 'Viet12345678', 0, '0000-00-00', '2015-12-15 08:20:37', '2015-12-15 08:20:37'),
(44, 'vietdaohahaha', 0, '0000-00-00', '2015-12-15 08:28:31', '2015-12-15 08:28:31');

-- --------------------------------------------------------

--
-- Table structure for table `test`
--

CREATE TABLE `test` (
  `id` int(11) NOT NULL,
  `name` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `username` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(60) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `test`
--

INSERT INTO `test` (`id`, `name`, `username`, `email`) VALUES
(1, 'Nguyen Viet Dao', 'Viet Dao', 'vietdao_07@yahoo.com');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `email` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `username` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `first_name` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `last_name` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `location` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `remember_token` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `created` datetime DEFAULT NULL,
  `updated` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `username`, `password`, `first_name`, `last_name`, `location`, `remember_token`, `created`, `updated`) VALUES
(1, 'vietdao1@yahoo.com', 'vietdao', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'Lin', 'Dan', 'UK', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(2, 'vietdao2@yahoo.com', 'Lin Nguyen', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'Alex', 'Nguyen', 'USA', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(3, 'vietdao3@yahoo.com', 'Lin', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'viet', 'noob', 'HP', '', '2016-01-22 12:16:24', '2016-01-22 12:16:24');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `friends`
--
ALTER TABLE `friends`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ingredients`
--
ALTER TABLE `ingredients`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ingredients_recipes`
--
ALTER TABLE `ingredients_recipes`
  ADD PRIMARY KEY (`ingredient_id`,`recipe_id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `recipes`
--
ALTER TABLE `recipes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `test`
--
ALTER TABLE `test`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `friends`
--
ALTER TABLE `friends`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `ingredients`
--
ALTER TABLE `ingredients`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `recipes`
--
ALTER TABLE `recipes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;
--
-- AUTO_INCREMENT for table `test`
--
ALTER TABLE `test`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

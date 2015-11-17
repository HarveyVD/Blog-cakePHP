-- phpMyAdmin SQL Dump
-- version 4.4.12
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Nov 02, 2015 at 04:14 PM
-- Server version: 5.6.25
-- PHP Version: 5.6.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cakephp`
--

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE IF NOT EXISTS `posts` (
  `id` int(10) unsigned NOT NULL,
  `title` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `body` text COLLATE utf8_unicode_ci NOT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `title`, `body`, `created`, `modified`) VALUES
(2, 'A title once againssssdsds121212sdsd12121', 'And the post body follows.ssssss1121', '2015-10-26 22:56:48', '2015-11-02 16:00:56'),
(3, 'Title strikes back', 'This is really exciting! Not.', '2015-10-26 22:56:48', '2015-10-29 03:44:00'),
(4, '123123131231231312323', 'ssssss111212', '2015-10-27 07:55:48', '2015-10-27 07:55:48'),
(5, 'Viá»‡t DIá»‡u', 'anh yÃªu em', '2015-10-27 08:26:56', '2015-10-27 08:26:56'),
(6, 'Viet', 'Diá»‡u Æ¡i anh xin lá»—i', '2015-10-27 10:25:35', '2015-10-27 10:25:35'),
(7, 'sss', 'sss', '2015-10-27 14:46:21', '2015-10-27 14:46:21'),
(8, 'ss', 'ss', '2015-10-27 14:49:51', '2015-10-27 14:49:51'),
(9, 'ss', 'ss', '2015-10-27 14:50:03', '2015-10-27 14:50:03'),
(10, 'ss', 'ss', '2015-10-27 14:52:58', '2015-10-27 14:52:58'),
(11, 's', 's', '2015-10-27 14:53:27', '2015-10-27 14:53:27'),
(12, 'sdsd', 'ssd', '2015-10-27 14:54:07', '2015-10-27 14:54:07'),
(13, 's', 's', '2015-10-27 14:59:03', '2015-10-27 14:59:03'),
(14, 's', 'sd', '2015-10-27 15:31:47', '2015-10-27 15:31:47'),
(15, 'sdsds', 's', '2015-10-27 15:42:12', '2015-10-27 15:42:12'),
(16, 'sdsds', 's', '2015-10-27 15:45:10', '2015-10-27 15:45:10'),
(17, 'ss', 'ss', '2015-10-27 16:13:11', '2015-10-27 16:13:11'),
(18, 'sdsds', 's', '2015-10-27 16:37:26', '2015-10-27 16:37:26'),
(19, '', '', '2015-10-28 08:32:10', '2015-10-28 08:32:10'),
(20, '', '', '2015-10-28 08:32:35', '2015-10-28 08:32:35'),
(21, '', '', '2015-10-28 08:32:50', '2015-10-28 08:32:50'),
(22, 'VIet', 'Dieu', '2015-10-28 08:33:13', '2015-10-28 08:33:13'),
(23, '', '', '2015-10-28 08:33:57', '2015-10-28 08:33:57'),
(24, '232', '3232', '2015-10-28 09:56:46', '2015-10-28 09:56:46'),
(25, 'Æ°ewewe', 'ewewe', '2015-10-28 09:57:17', '2015-10-28 09:57:17'),
(26, 'sdsds', 'dsds', '2015-10-28 10:26:57', '2015-10-28 10:26:57'),
(27, 'sadsadas', 'adasdas', '2015-10-28 10:27:04', '2015-10-28 10:27:04'),
(28, 'sd', 'sds', '2015-10-28 13:33:46', '2015-10-28 13:33:46'),
(29, 'sds', 'sdsd', '2015-10-28 13:34:05', '2015-10-28 13:34:05'),
(30, 'Dao', 'Nguyen', '2015-10-30 07:23:56', '2015-10-30 07:23:56');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=31;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

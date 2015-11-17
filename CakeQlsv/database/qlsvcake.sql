-- phpMyAdmin SQL Dump
-- version 4.4.12
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Nov 17, 2015 at 04:25 AM
-- Server version: 5.6.25
-- PHP Version: 5.6.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `qlsvcake`
--

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE IF NOT EXISTS `students` (
  `id` int(11) NOT NULL,
  `full_name` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `sex` tinyint(4) NOT NULL,
  `birth_day` date NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=38 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`id`, `full_name`, `sex`, `birth_day`, `created`, `modified`) VALUES
(2, 'Viet', 1, '0000-00-00', '2015-11-02 16:31:58', '2015-11-02 16:31:58'),
(3, 'Viet', 1, '0000-00-00', '2015-11-02 16:32:41', '2015-11-02 16:32:41'),
(4, 'Dieu 1', 1, '0000-00-00', '2015-11-02 16:32:41', '2015-11-11 17:26:07'),
(5, 'Viet Dao', 1, '0000-00-00', '2015-11-02 16:32:41', '2015-11-02 16:32:41'),
(10, 'Viet11111', 0, '2015-11-16', '2015-11-12 09:17:23', '2015-11-16 03:08:26'),
(11, 'Dieu', 0, '0000-00-00', '2015-11-15 17:24:12', '2015-11-15 17:24:04'),
(12, 'Viet Dao', 1, '0000-00-00', '2015-11-15 17:26:20', '2015-11-15 17:26:08'),
(13, 'viet1', 0, '0000-00-00', '2015-11-15 17:32:40', '2015-11-15 17:32:50'),
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
(37, 'Dieu82', 0, '0000-00-00', '2015-11-17 03:53:15', '2015-11-17 03:53:27');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=38;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

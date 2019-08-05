-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 05, 2019 at 01:27 PM
-- Server version: 10.3.16-MariaDB
-- PHP Version: 7.3.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_php_37_news`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_advertisements`
--

CREATE TABLE `tbl_advertisements` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `rank` int(11) NOT NULL,
  `expire_date` datetime NOT NULL,
  `status` tinyint(4) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `created_by` varchar(255) NOT NULL,
  `updated_by` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_advertisements`
--

INSERT INTO `tbl_advertisements` (`id`, `title`, `image`, `rank`, `expire_date`, `status`, `created_at`, `updated_at`, `created_by`, `updated_by`) VALUES
(6, 'Sanish', 'bg-07.jpg', 100, '2009-05-02 00:00:00', 1, '2019-07-24 14:46:22', '2019-07-24 15:11:26', '15', ''),
(12, 'Officia tempora rati', 'bg-07.jpg', 81, '2019-07-16 00:00:00', 1, '2019-07-24 15:11:40', '2019-07-24 15:14:15', '15', ''),
(13, 'Ut ad cupidatat sed ', '2012_Peugeot_Onyx_Concept_supercars_supercar__d_4492x3366.jpg', 11, '2004-09-11 00:00:00', 1, '2019-07-24 15:11:48', '0000-00-00 00:00:00', '15', '');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_categories`
--

CREATE TABLE `tbl_categories` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `rank` int(11) NOT NULL,
  `status` tinyint(4) NOT NULL,
  `created_by` int(11) NOT NULL,
  `updated_by` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_categories`
--

INSERT INTO `tbl_categories` (`id`, `name`, `rank`, `status`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(11, 'Sports', 13, 1, 3, 0, '2019-07-22 15:47:42', '0000-00-00 00:00:00'),
(12, 'Business', 60, 1, 3, 0, '2019-07-22 15:47:45', '0000-00-00 00:00:00'),
(13, 'Literature', 38, 1, 3, 0, '2019-07-22 15:47:47', '0000-00-00 00:00:00'),
(14, 'Health', 24, 1, 3, 0, '2019-07-22 15:47:50', '0000-00-00 00:00:00'),
(15, 'Business', 2, 1, 3, 0, '2019-07-22 15:47:53', '0000-00-00 00:00:00'),
(16, 'Zeph Goff', 18, 0, 3, 0, '2019-07-22 15:47:56', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_comments`
--

CREATE TABLE `tbl_comments` (
  `id` int(11) NOT NULL,
  `news_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `comments` varchar(255) NOT NULL,
  `status` tinyint(4) NOT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_comments`
--

INSERT INTO `tbl_comments` (`id`, `news_id`, `name`, `email`, `comments`, `status`, `created_at`) VALUES
(6, 33, 'Bertha Shields', 'wupez@mailinator.com', 'Voluptas asperiores ', 1, '2019-07-31 14:50:47'),
(9, 33, 'Matthew Pratt', 'manihegog@mailinator.net', 'Ullamco ex et hic la', 1, '2019-07-31 14:57:39'),
(10, 33, 'Garth Griffin', 'duwohehi@mailinator.net', 'Sunt accusamus eu la', 1, '2019-07-31 14:57:47');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_news`
--

CREATE TABLE `tbl_news` (
  `id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` longtext NOT NULL,
  `image` varchar(255) NOT NULL,
  `slider_key` tinyint(4) NOT NULL,
  `breaking_key` tinyint(4) NOT NULL,
  `feature_key` tinyint(4) NOT NULL,
  `status` tinyint(4) NOT NULL,
  `created_by` varchar(255) NOT NULL,
  `updated_by` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `short_description` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_news`
--

INSERT INTO `tbl_news` (`id`, `category_id`, `title`, `description`, `image`, `slider_key`, `breaking_key`, `feature_key`, `status`, `created_by`, `updated_by`, `created_at`, `updated_at`, `short_description`) VALUES
(19, 12, 'Possimus nihil amet', '', 'bg-07.jpg', 1, 1, 1, 1, '3', '', '2019-07-24 05:36:00', '2019-07-25 17:54:20', 'Ipsum mollit non rer'),
(21, 14, 'Quia ea provident d', 'Necessitatibus iusto', 'sanish1.jpg', 1, 1, 0, 1, '3', '', '2019-07-24 07:01:12', '0000-00-00 00:00:00', 'Ut enim placeat occ'),
(24, 15, 'Dolor aut quidem ape', '', 'sanish1.jpg', 0, 1, 0, 1, '3', '', '2019-07-24 09:11:08', '0000-00-00 00:00:00', 'Quam eum ipsa tenet'),
(25, 16, 'zxcxzjhgcjkzxchjkzhxckjxhcjhcjxhcjxhcjhcxmc', '<p>dskjfhksjdhfkjsdfhkjsdhfkjshdfkjsdhfkjsdfhkjsdhfkjsfdh</p>\r\n', '', 1, 1, 1, 1, '3', '', '2019-07-24 09:11:19', '2019-07-31 12:29:36', 'Esse laboriosam ius'),
(31, 15, 'Rerum proident sunt', '<p>dfhskdjfhskjfhkjsdhfkjsdhfkjshdf</p>\r\n', 'PicsArt_02-02-09.06.22.jpg', 1, 1, 1, 1, '17', '', '2019-07-31 12:33:48', '0000-00-00 00:00:00', 'Sunt aliqua Corrupt'),
(32, 15, 'Commodi debitis repu', '<p>hhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhh</p>\r\n', 'hr.jpg', 1, 1, 1, 1, '17', '17', '2019-07-31 12:58:29', '2019-07-31 13:12:17', 'hhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhh'),
(33, 15, 'Aut sunt ea adipisci', '<p>kjcvhkjxchxkjcvkjxvchk</p>\r\n', 'kayo.jpg', 1, 1, 1, 1, '17', '', '2019-07-31 13:13:27', '0000-00-00 00:00:00', 'Perferendis repellen'),
(34, 16, 'Ea non nisi qui aliq', 'Proident in quis su', '', 1, 1, 0, 0, '30', '', '2019-08-01 16:35:39', '0000-00-00 00:00:00', 'Ut labore nostrud la');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_settings`
--

CREATE TABLE `tbl_settings` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `logo` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `facebook` varchar(255) NOT NULL,
  `twitter` varchar(255) NOT NULL,
  `linkedIn` varchar(255) NOT NULL,
  `gmail` varchar(255) NOT NULL,
  `map` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_sliders`
--

CREATE TABLE `tbl_sliders` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_slider_details`
--

CREATE TABLE `tbl_slider_details` (
  `id` int(11) NOT NULL,
  `slider_id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_users`
--

CREATE TABLE `tbl_users` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` bigint(20) NOT NULL,
  `address` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `status` tinyint(4) NOT NULL,
  `last_login` datetime NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `role` enum('admin','reporter') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_users`
--

INSERT INTO `tbl_users` (`id`, `name`, `email`, `phone`, `address`, `username`, `password`, `status`, `last_login`, `image`, `role`) VALUES
(3, 'Ram Kumar', 'ram@gmail.com', 9852036623, 'patan', 'ram123', '6a557ed1005dddd940595b8fc6ed47b2', 1, '0000-00-00 00:00:00', 'hr.jpg', 'admin'),
(15, 'Rachael', 'racheal@gmail.com', 1, 'Lorem aut irure vita', 'Racheal Green', 'bb7d75881ccfd60b21d1046441f42cc6', 1, '0000-00-00 00:00:00', '', 'reporter'),
(17, 'admin123', 'admin@gmail.com', 1, 'Dolores enim fugit ', 'admin123', '0192023a7bbd73250516f069df18b500', 1, '0000-00-00 00:00:00', '2012_Peugeot_Onyx_Concept_supercars_supercar__d_4492x3366.jpg', 'admin'),
(18, 'Sanish Shakya', 'sanish@gmail.com', 1, 'Lalitpur', 'sanish', '22be6dbe4df26efa104cca3400d3d6b9', 1, '0000-00-00 00:00:00', 'PicsArt_02-02-09.06.22.jpg', 'admin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_advertisements`
--
ALTER TABLE `tbl_advertisements`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_categories`
--
ALTER TABLE `tbl_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_comments`
--
ALTER TABLE `tbl_comments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_news`
--
ALTER TABLE `tbl_news`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_settings`
--
ALTER TABLE `tbl_settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_sliders`
--
ALTER TABLE `tbl_sliders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_slider_details`
--
ALTER TABLE `tbl_slider_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_users`
--
ALTER TABLE `tbl_users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_advertisements`
--
ALTER TABLE `tbl_advertisements`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `tbl_categories`
--
ALTER TABLE `tbl_categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `tbl_comments`
--
ALTER TABLE `tbl_comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tbl_news`
--
ALTER TABLE `tbl_news`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `tbl_settings`
--
ALTER TABLE `tbl_settings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_sliders`
--
ALTER TABLE `tbl_sliders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_slider_details`
--
ALTER TABLE `tbl_slider_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_users`
--
ALTER TABLE `tbl_users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

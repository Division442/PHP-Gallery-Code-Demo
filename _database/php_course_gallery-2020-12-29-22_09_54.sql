-- phpMyAdmin SQL Dump
-- version 4.9.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Dec 29, 2020 at 10:09 PM
-- Server version: 5.7.26
-- PHP Version: 7.4.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `php_course_gallery`
--

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

DROP TABLE IF EXISTS `comments`;
CREATE TABLE `comments` (
  `id` int(11) NOT NULL,
  `photo_id` int(11) NOT NULL,
  `author` varchar(255) NOT NULL,
  `body` text NOT NULL,
  `created` varchar(255) NOT NULL,
  `deleted` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `photos`
--

DROP TABLE IF EXISTS `photos`;
CREATE TABLE `photos` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `caption` varchar(255) NOT NULL,
  `alt_text` varchar(255) NOT NULL,
  `filename` varchar(255) NOT NULL,
  `original_file_name` varchar(255) NOT NULL,
  `type` varchar(255) NOT NULL,
  `size` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `created` timestamp NULL DEFAULT NULL,
  `deleted` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `photos`
--

INSERT INTO `photos` (`id`, `title`, `description`, `caption`, `alt_text`, `filename`, `original_file_name`, `type`, `size`, `user_id`, `created`, `deleted`) VALUES
(26, 'Alameda Pinball Museum', 'Alameda Pinball Museum', 'Alameda Pinball Museum', 'Alameda Pinball Museum', '-dsc7998-5fb71c7619dc0.jpg', '_DSC7998.jpg', 'image/jpeg', 2584027, 33, '2020-11-20 09:31:34', NULL),
(27, 'Alameda Pinball Museum', 'Alameda Pinball Museum', 'Alameda Pinball Museum', 'Alameda Pinball Museum', '-dsc8000-5fb71c761d112.jpg', '_DSC8000.jpg', 'image/jpeg', 2063662, 33, '2020-11-20 09:31:34', NULL),
(28, 'Alameda Pinball Museum', 'Alameda Pinball Museum', 'Alameda Pinball Museum', 'Alameda Pinball Museum', '-dsc8007-5fb71c762fbe2.jpg', '_DSC8007.jpg', 'image/jpeg', 2181463, 33, '2020-11-20 09:31:34', NULL),
(29, 'Alameda Pinball Museum', 'Alameda Pinball Museum', 'Alameda Pinball Museum', 'Alameda Pinball Museum', '-dsc8010-5fb71c76309b9.jpg', '_DSC8010.jpg', 'image/jpeg', 2228695, 33, '2020-11-20 09:31:34', NULL),
(30, 'Alameda Pinball Museum', 'Alameda Pinball Museum', 'Alameda Pinball Museum', 'Alameda Pinball Museum', '-dsc8014-5fb71c7643053.jpg', '_DSC8014.jpg', 'image/jpeg', 2596296, 33, '2020-11-20 09:31:34', NULL),
(31, 'Alameda Pinball Museum', 'Alameda Pinball Museum', 'Alameda Pinball Museum', 'Alameda Pinball Museum', '-dsc8025-5fb71c7643ecc.jpg', '_DSC8025.jpg', 'image/jpeg', 1457998, 33, '2020-11-20 09:31:34', NULL),
(32, 'Alameda Pinball Museum', 'Alameda Pinball Museum', 'Alameda Pinball Museum', 'Alameda Pinball Museum', '-dsc8027-5fb71c764f016.jpg', '_DSC8027.jpg', 'image/jpeg', 1430359, 33, '2020-11-20 09:31:34', NULL),
(33, 'Alameda Pinball Museum', 'Alameda Pinball Museum', 'Alameda Pinball Museum', 'Alameda Pinball Museum', '-dsc8033-5fb71c7650b97.jpg', '_DSC8033.jpg', 'image/jpeg', 1643153, 33, '2020-11-20 09:31:34', NULL),
(34, 'Alameda Pinball Museum', 'Alameda Pinball Museum', 'Alameda Pinball Museum', 'Alameda Pinball Museum', '-dsc8043-5fb71c7660475.jpg', '_DSC8043.jpg', 'image/jpeg', 1616735, 33, '2020-11-20 09:31:34', NULL),
(35, 'Alameda Pinball Museum', 'Alameda Pinball Museum', 'Alameda Pinball Museum', 'Alameda Pinball Museum', '-dsc8039-5fb71c7660dc4.jpg', '_DSC8039.jpg', 'image/jpeg', 1686938, 33, '2020-11-20 09:31:34', NULL),
(36, 'Alameda Pinball Museum', 'Alameda Pinball Museum', 'Alameda Pinball Museum', 'Alameda Pinball Museum', '-dsc8050-5fb71c7674633.jpg', '_DSC8050.jpg', 'image/jpeg', 2097117, 33, '2020-11-20 09:31:34', NULL),
(37, 'Alameda Pinball Museum', 'Alameda Pinball Museum', 'Alameda Pinball Museum', 'Alameda Pinball Museum', '-dsc8058-5fb71c7674fc5.jpg', '_DSC8058.jpg', 'image/jpeg', 2055761, 33, '2020-11-20 09:31:34', NULL),
(38, 'Alameda Pinball Museum', 'Alameda Pinball Museum', 'Alameda Pinball Museum', 'Alameda Pinball Museum', '-dsc8060-5fb71c767e050.jpg', '_DSC8060.jpg', 'image/jpeg', 2265810, 33, '2020-11-20 09:31:34', NULL),
(39, 'Alameda Pinball Museum', 'Alameda Pinball Museum', 'Alameda Pinball Museum', 'Alameda Pinball Museum', '-dsc8061-5fb71c767ee6f.jpg', '_DSC8061.jpg', 'image/jpeg', 1648377, 33, '2020-11-20 09:31:34', NULL),
(40, 'Alameda Pinball Museum', 'Alameda Pinball Museum', 'Alameda Pinball Museum', 'Alameda Pinball Museum', '-dsc8071-5fb71c76914a5.jpg', '_DSC8071.jpg', 'image/jpeg', 2398543, 33, '2020-11-20 09:31:34', NULL),
(41, 'Alameda Pinball Museum', 'Alameda Pinball Museum', 'Alameda Pinball Museum', 'Alameda Pinball Museum', '-dsc8068-5fb71c769215d.jpg', '_DSC8068.jpg', 'image/jpeg', 2568085, 33, '2020-11-20 09:31:34', NULL),
(42, 'Alameda Pinball Museum', 'Alameda Pinball Museum', 'Alameda Pinball Museum', 'Alameda Pinball Museum', '-dsc8078-5fb71c769a852.jpg', '_DSC8078.jpg', 'image/jpeg', 1565612, 33, '2020-11-20 09:31:34', NULL),
(43, 'Alameda Pinball Museum', 'Alameda Pinball Museum', 'Alameda Pinball Museum', 'Alameda Pinball Museum', '-dsc8088-5fb71c769d54c.jpg', '_DSC8088.jpg', 'image/jpeg', 1613542, 33, '2020-11-20 09:31:34', NULL),
(44, 'Alameda Pinball Museum', 'Alameda Pinball Museum', 'Alameda Pinball Museum', 'Alameda Pinball Museum', '-dsc8090-5fb71c76ade8d.jpg', '_DSC8090.jpg', 'image/jpeg', 1681028, 33, '2020-11-20 09:31:34', NULL),
(45, 'Alameda Pinball Museum', 'Alameda Pinball Museum', 'Alameda Pinball Museum', 'Alameda Pinball Museum', 'dsc-7985-5fb71c76b01b2.jpg', 'DSC_7985.jpg', 'image/jpeg', 1737733, 33, '2020-11-20 09:31:34', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `user_level` varchar(25) NOT NULL,
  `description` text NOT NULL,
  `bio` text NOT NULL,
  `user_image` varchar(255) NOT NULL,
  `created` datetime DEFAULT NULL,
  `deleted` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `first_name`, `last_name`, `user_level`, `description`, `bio`, `user_image`, `created`, `deleted`) VALUES
(33, 'guest', '$2y$10$deCZVaEgGSWNIiqW6E8Bw.cKPCyWbtuQQZK3I0x35xvN/uCskavmW', 'Guest', 'User', 'Administrator', '', '<p>This is the guest user account.</p>', 'person-8x10-5fb719eef0c07.png', '2020-11-20 01:20:46', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `photo_id` (`photo_id`);

--
-- Indexes for table `photos`
--
ALTER TABLE `photos`
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
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `photos`
--
ALTER TABLE `photos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

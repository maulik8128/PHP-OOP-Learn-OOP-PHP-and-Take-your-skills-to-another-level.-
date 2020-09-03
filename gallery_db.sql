-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 03, 2020 at 12:17 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `gallery_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` int(11) NOT NULL,
  `photo_id` int(11) NOT NULL,
  `author` varchar(255) NOT NULL,
  `body` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `photo_id`, `author`, `body`) VALUES
(3, 38, 'Edwin', 'Hi I am edwin');

-- --------------------------------------------------------

--
-- Table structure for table `photos`
--

CREATE TABLE `photos` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `caption` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `filename` varchar(255) NOT NULL,
  `alternate_text` varchar(255) NOT NULL,
  `type` varchar(255) NOT NULL,
  `size` int(11) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `photos`
--

INSERT INTO `photos` (`id`, `title`, `caption`, `description`, `filename`, `alternate_text`, `type`, `size`, `user_id`) VALUES
(63, 'Lamborgini', '', '', 'images-212.jpg', '', 'image/jpeg', 19957, 1),
(65, 'Cars BMW', '', '', '_large_image_41.jpg', '', 'image/jpeg', 554659, 1),
(66, '', '', '', '_large_image_2.jpg', '', 'image/jpeg', 309568, 1),
(67, '', '', '', '_large_image_1.jpg', '', 'image/jpeg', 479843, 1),
(68, '', '', '', 'images-1.jpg', '', 'image/jpeg', 28947, 1),
(69, '', '', '', '_large_image_4.jpg', '', 'image/jpeg', 554659, 1),
(70, '', '', '', 'images-2.jpg', '', 'image/jpeg', 18578, 1),
(71, '', '', '', 'images-4.jpg', '', 'image/jpeg', 23270, 1),
(72, '', '', '', 'images-5.jpg', '', 'image/jpeg', 33192, 1),
(73, '', '', '', 'images-10.jpg', '', 'image/jpeg', 20401, 1),
(74, '', '', '', 'images-13.jpg', '', 'image/jpeg', 22082, 1),
(75, '', '', '', 'images-15.jpg', '', 'image/jpeg', 28466, 1),
(76, '', '', '', 'images-20.jpg', '', 'image/jpeg', 22942, 1),
(77, '', '', '', 'images-21.jpg', '', 'image/jpeg', 19957, 1),
(78, '', '', '', 'images-22.jpg', '', 'image/jpeg', 21133, 1),
(79, '', '', '', 'images-24.jpg', '', 'image/jpeg', 29850, 1),
(80, '', '', '', 'images-25.jpg', '', 'image/jpeg', 19363, 1),
(81, '', '', '', 'images-26.jpg', '', 'image/jpeg', 21802, 1),
(82, '', '', '', 'images-27.jpg', '', 'image/jpeg', 17662, 1),
(83, '', '', '', 'images-28.jpg', '', 'image/jpeg', 17662, 1),
(84, '', '', '', 'images-29.jpg', '', 'image/jpeg', 25493, 1),
(85, '', '', '', 'images-31.jpg', '', 'image/jpeg', 20928, 1),
(86, '', '', '', 'images-34.jpg', '', 'image/jpeg', 23587, 1),
(87, '', '', '', 'images-37.jpg', '', 'image/jpeg', 20381, 1),
(88, '', '', '', 'images-38.jpg', '', 'image/jpeg', 21857, 1),
(89, '', '', '', 'images-39.jpg', '', 'image/jpeg', 24969, 1),
(90, '', '', '', 'images-41.jpg', '', 'image/jpeg', 16296, 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `user_image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `first_name`, `last_name`, `user_image`) VALUES
(1, 'maulik', '123', 'maulik', 'patel', 'images-4.jpg'),
(3, 'edwin', 'superman', 'edwin', 'diez', ''),
(16, 'maulik', '123', 'gsdgd', 'gddsgsdfg', 'lambo_1.jpg'),
(26, 'maulik123', 'zvzxv', '54444', 'vxzvzx', ''),
(30, 'ram', '12313', 'fgdf', 'gdfgd', 'images-4.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `INDEX` (`photo_id`);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `photos`
--
ALTER TABLE `photos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=91;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

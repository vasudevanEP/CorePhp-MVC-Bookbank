-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 12, 2022 at 06:11 AM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bookbank`
--

-- --------------------------------------------------------

--
-- Table structure for table `authors`
--

CREATE TABLE `authors` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `authors`
--

INSERT INTO `authors` (`id`, `name`) VALUES
(6, 'Alex Michaelides'),
(5, 'Holly Black'),
(2, 'Isak Azimov'),
(3, 'NULL'),
(1, 'Pavel Vejinov'),
(4, '邵恬简');

-- --------------------------------------------------------

--
-- Table structure for table `books`
--

CREATE TABLE `books` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `author_id` int(11) DEFAULT NULL,
  `added_date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `books`
--

INSERT INTO `books` (`id`, `name`, `author_id`, `added_date`) VALUES
(1, 'End of spirit', 2, '2022-01-11 18:53:00'),
(2, 'Book 1', 1, '2022-01-11 18:53:00'),
(3, 'Book 2', 1, '2022-01-11 18:53:00'),
(4, 'Book 3', 1, '2022-01-11 18:53:00'),
(5, 'Book 4', 2, '2022-01-11 18:55:08'),
(6, '李婉仪', 4, '2022-01-11 19:02:29'),
(7, '创昂', 4, '2022-01-11 19:02:29'),
(8, 'The Cruel Prince', 5, '2022-01-12 04:28:02'),
(9, 'The Silent Patient', 6, '2022-01-12 04:28:02');

-- --------------------------------------------------------

--
-- Table structure for table `cron_history`
--

CREATE TABLE `cron_history` (
  `id` int(11) NOT NULL,
  `file` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `filesize` int(11) DEFAULT NULL,
  `added_date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cron_history`
--

INSERT INTO `cron_history` (`id`, `file`, `filesize`, `added_date`) VALUES
(1, 'book.xml', 444, '2022-01-11 18:53:00'),
(2, 'book.xml', 542, '2022-01-11 18:55:08'),
(3, 'Textbooks.x', 249, '2022-01-11 19:02:29'),
(4, 'Textbooks.x', 277, '2022-01-12 04:28:02');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `authors`
--
ALTER TABLE `authors`
  ADD PRIMARY KEY (`id`),
  ADD KEY `name` (`name`);

--
-- Indexes for table `books`
--
ALTER TABLE `books`
  ADD PRIMARY KEY (`id`),
  ADD KEY `author_id` (`author_id`);

--
-- Indexes for table `cron_history`
--
ALTER TABLE `cron_history`
  ADD PRIMARY KEY (`id`),
  ADD KEY `file` (`file`),
  ADD KEY `filesize` (`filesize`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `authors`
--
ALTER TABLE `authors`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `books`
--
ALTER TABLE `books`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `cron_history`
--
ALTER TABLE `cron_history`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

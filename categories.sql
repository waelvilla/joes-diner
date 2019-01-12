-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 08, 2019 at 03:30 PM
-- Server version: 10.1.36-MariaDB
-- PHP Version: 7.2.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `u993407166_vypu`
--

-- --------------------------------------------------------

--
-- Table structure for table `joe_categories`
--

CREATE TABLE `joe_categories` (
  `category` varchar(20) NOT NULL,
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `joe_categories`
--

INSERT INTO `joe_categories` (`category`, `id`) VALUES
('appetizer', 0),
('dessert', 3),
('drink', 4),
('meal', 2),
('soup', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `joe_categories`
--
ALTER TABLE `joe_categories`
  ADD PRIMARY KEY (`category`),
  ADD UNIQUE KEY `category_2` (`category`),
  ADD KEY `category` (`category`),
  ADD KEY `category_3` (`category`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

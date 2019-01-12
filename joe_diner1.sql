-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 10, 2019 at 11:10 AM
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
-- Database: `id5984297_pttxvvdcdg5weetw`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `category` varchar(20) NOT NULL,
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`category`, `id`) VALUES
('appetizer', 0),
('dessert', 3),
('drink', 4),
('meal', 2),
('soup', 1);

-- --------------------------------------------------------

--
-- Table structure for table `food`
--

CREATE TABLE `food` (
  `id` int(11) NOT NULL,
  `title` varchar(60) NOT NULL,
  `category` varchar(30) NOT NULL,
  `price` varchar(10) NOT NULL,
  `image_name` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `food`
--

INSERT INTO `food` (`id`, `title`, `category`, `price`, `image_name`) VALUES
(11, 'Onion Rings', 'appetizer', '5', 'onion-rings.jpg'),
(12, 'Wedge Salad', 'appetizer', '7', 'wedge-salad.jpg'),
(13, 'Empanadas', 'appetizer', '6', 'empanadas.jpg'),
(14, 'Quesadilla', 'appetizer', '4', 'quesadilla.png'),
(15, 'Wonton Soup', 'soup', '6', 'wonton-soup.png'),
(16, 'Chicken Corn Soup', 'soup', '8', 'chicken-corn-soup.jpeg'),
(17, 'Chocolate Cake', 'dessert', '7', 'chocolate-cake.jpg'),
(18, 'Banana Split', 'dessert', '12', 'banana-split.jpg'),
(19, 'Malva Pudding', 'dessert', '7', 'malva-pudding.jpg'),
(20, 'Apple Pie', 'dessert', '10', 'apple-pie.jpg'),
(21, 'Fried Calamari', 'meal', '15', 'fried-calamari.jpg'),
(22, 'Fillet Steak', 'meal', '25', 'fillet-steak.jpg'),
(23, 'Herb Roasted Turkey', 'meal', '25', 'herb-roasted-turkey.jpg'),
(24, 'Bolognese Pasta', 'meal', '20', 'bolognese-pasta.jpg'),
(25, 'Hot Chocolate', 'drink', '9', 'hot-chocolate.jpg'),
(26, 'Strawberry Milkshake', 'drink', '9', 'strawberry-milkshake.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`category`),
  ADD UNIQUE KEY `category_2` (`category`),
  ADD KEY `category` (`category`),
  ADD KEY `category_3` (`category`);

--
-- Indexes for table `food`
--
ALTER TABLE `food`
  ADD PRIMARY KEY (`id`),
  ADD KEY `category` (`category`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `food`
--
ALTER TABLE `food`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `food`
--
ALTER TABLE `food`
  ADD CONSTRAINT `category_fk` FOREIGN KEY (`category`) REFERENCES `categories` (`category`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

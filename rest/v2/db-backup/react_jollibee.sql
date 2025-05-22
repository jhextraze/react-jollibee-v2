-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 20, 2025 at 07:19 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `react_jollibee`
--

-- --------------------------------------------------------

--
-- Table structure for table `branches`
--

CREATE TABLE `branches` (
  `branch_aid` int(11) NOT NULL,
  `branch_is_active` tinyint(11) NOT NULL,
  `branch_name` varchar(30) NOT NULL,
  `branch_datetime` varchar(20) NOT NULL,
  `branch_created` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `branches`
--

INSERT INTO `branches` (`branch_aid`, `branch_is_active`, `branch_name`, `branch_datetime`, `branch_created`) VALUES
(2, 1, 'Jollibee Rizal', '', 2025),
(4, 0, 'Jollibee Mt. Everest', '', 2025),
(5, 1, 'Jollibee BGC', '2025-05-20 13:17:32', 2025),
(6, 1, 'Jollibee Makati', '2025-05-20 13:18:25', 2025);

-- --------------------------------------------------------

--
-- Table structure for table `food_category`
--

CREATE TABLE `food_category` (
  `food_category_aid` int(11) NOT NULL,
  `food_category_is_active` tinyint(1) NOT NULL,
  `food_category_image` varchar(20) NOT NULL,
  `food_category_name` varchar(30) NOT NULL,
  `food_category_datetime` varchar(20) NOT NULL,
  `food_category_created` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `food_category`
--

INSERT INTO `food_category` (`food_category_aid`, `food_category_is_active`, `food_category_image`, `food_category_name`, `food_category_datetime`, `food_category_created`) VALUES
(1, 1, '', 'Chickenjoy', '2025-05-13 19:24:00', 0),
(2, 1, '', 'burger', '', 2025),
(5, 0, '', 'Jolli Fries', '', 2025);

-- --------------------------------------------------------

--
-- Table structure for table `food_deals`
--

CREATE TABLE `food_deals` (
  `food_deals_aid` int(11) NOT NULL,
  `food_deals_is_active` tinyint(1) NOT NULL,
  `food_deals_image` varchar(20) NOT NULL,
  `food_deals_name` varchar(30) NOT NULL,
  `food_deals_datetime` varchar(20) NOT NULL,
  `food_deals_created` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `food_item`
--

CREATE TABLE `food_item` (
  `food_item_aid` int(11) NOT NULL,
  `food_item_is_active` tinyint(1) NOT NULL,
  `food_item_price` int(11) NOT NULL,
  `food_item_name` varchar(30) NOT NULL,
  `food_item_datetime` varchar(20) NOT NULL,
  `food_item_created` int(11) NOT NULL,
  `food_item_food_category_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `food_item`
--

INSERT INTO `food_item` (`food_item_aid`, `food_item_is_active`, `food_item_price`, `food_item_name`, `food_item_datetime`, `food_item_created`, `food_item_food_category_id`) VALUES
(1, 1, 79, '1pc Spicy Chickenjoy', '', 0, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `branches`
--
ALTER TABLE `branches`
  ADD PRIMARY KEY (`branch_aid`);

--
-- Indexes for table `food_category`
--
ALTER TABLE `food_category`
  ADD PRIMARY KEY (`food_category_aid`);

--
-- Indexes for table `food_deals`
--
ALTER TABLE `food_deals`
  ADD PRIMARY KEY (`food_deals_aid`);

--
-- Indexes for table `food_item`
--
ALTER TABLE `food_item`
  ADD PRIMARY KEY (`food_item_aid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `branches`
--
ALTER TABLE `branches`
  MODIFY `branch_aid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `food_category`
--
ALTER TABLE `food_category`
  MODIFY `food_category_aid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `food_deals`
--
ALTER TABLE `food_deals`
  MODIFY `food_deals_aid` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `food_item`
--
ALTER TABLE `food_item`
  MODIFY `food_item_aid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

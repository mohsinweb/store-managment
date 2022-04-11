-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 29, 2022 at 03:07 PM
-- Server version: 10.4.13-MariaDB
-- PHP Version: 7.4.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `store_managment_system`
--

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `category_id` int(3) NOT NULL,
  `category_name` varchar(50) NOT NULL,
  `category_entrydate` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`category_id`, `category_name`, `category_entrydate`) VALUES
(1, 'Mobile phone', '01-01-1970'),
(2, 'Glass', '01-01-1970'),
(3, 'Mobile phone', '07-02-2018'),
(4, 'Fasion house', '2022-03-17'),
(5, 'Fasion Gallery dot dot', '2022-07-24'),
(6, 'laptop', '2022-03-18'),
(16, 'laptop', '2022-03-18'),
(17, 'Electronics', '2022-03-30'),
(18, 'Electronics', '2022-03-30');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `product_id` int(11) NOT NULL,
  `product_name` varchar(50) NOT NULL,
  `product_category` int(3) NOT NULL,
  `product_code` varchar(20) NOT NULL,
  `product_entrydate` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`product_id`, `product_name`, `product_category`, `product_code`, `product_entrydate`) VALUES
(8, 'Apple', 2, 'apple23', '2022-03-11'),
(9, 'Banana', 3, '3444', '2022-03-11'),
(10, 'mango2222', 5, 'thai222', '2020-06-09'),
(11, 'Potato', 1, 'thai222', '2022-03-17'),
(12, 'Kola', 2, 'kola1212', '2022-03-17'),
(13, 'mnaus', 4, 'manus23', '2022-03-15'),
(14, 'jam', 5, 'apple23', '2022-03-09'),
(17, 'Apple', 17, 'apple23', '2022-03-12');

-- --------------------------------------------------------

--
-- Table structure for table `spend_product`
--

CREATE TABLE `spend_product` (
  `spend_product_id` int(3) NOT NULL,
  `spend_product_name` int(50) NOT NULL,
  `spend_product_quantity` int(100) NOT NULL,
  `spend_product_entrydate` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `spend_product`
--

INSERT INTO `spend_product` (`spend_product_id`, `spend_product_name`, `spend_product_quantity`, `spend_product_entrydate`) VALUES
(1, 9, 20, '2022-03-04'),
(2, 14, 50, '2022-03-08'),
(3, 8, 2022, '2022-03-09'),
(4, 10, 20, '2022-03-10'),
(5, 11, 25, '2022-03-16'),
(6, 12, 30, '2022-03-09'),
(7, 13, 30, '2022-03-09'),
(8, 8, 45, '2022-03-09'),
(9, 10, 0, '2022-03-15'),
(17, 8, 50, '2022-03-31'),
(18, 8, 50, '2022-03-31'),
(19, 11, 20, '2022-03-16'),
(20, 8, 20, '2022-03-24');

-- --------------------------------------------------------

--
-- Table structure for table `store_product`
--

CREATE TABLE `store_product` (
  `store_product_id` int(4) NOT NULL,
  `store_product_name` int(11) NOT NULL,
  `store_product_quantity` int(11) NOT NULL,
  `store_product_entrydate` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `store_product`
--

INSERT INTO `store_product` (`store_product_id`, `store_product_name`, `store_product_quantity`, `store_product_entrydate`) VALUES
(1, 8, 2066, '2022-03-18'),
(2, 11, 39, '2022-03-09'),
(3, 12, 39, '2022-03-09'),
(4, 13, 39, '2022-03-09'),
(5, 9, 20, '2022-03-22'),
(6, 9, 20, '2022-03-22'),
(7, 9, 20, '2022-03-22'),
(8, 9, 20, '2022-03-22'),
(9, 9, 20, '2022-03-22'),
(10, 9, 20, '2022-03-22');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `user_first_name` varchar(50) NOT NULL,
  `user_last_name` varchar(30) NOT NULL,
  `user_email` varchar(100) NOT NULL,
  `user_password` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `user_first_name`, `user_last_name`, `user_email`, `user_password`) VALUES
(7, 'Npit kamal1223', 'Hasan', 'nap1122it@gmail.com', '12345'),
(8, 'data', 'entry', 'mohsin@gmail.com', '1245'),
(9, 'Npit kamal', '1245', 'johirul@gmail.com11', '32145'),
(10, 'Npit kamal', '1245', 'johirul@gmail.com', 'hghj'),
(11, 'Mohsin', 'Hasan', 'admin@gmail.com', '1234');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `spend_product`
--
ALTER TABLE `spend_product`
  ADD PRIMARY KEY (`spend_product_id`);

--
-- Indexes for table `store_product`
--
ALTER TABLE `store_product`
  ADD PRIMARY KEY (`store_product_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `category_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `spend_product`
--
ALTER TABLE `spend_product`
  MODIFY `spend_product_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `store_product`
--
ALTER TABLE `store_product`
  MODIFY `store_product_id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

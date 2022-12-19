-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 17, 2022 at 05:55 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `foody`
--

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `category_id` int(11) NOT NULL,
  `category_name` varchar(200) DEFAULT NULL,
  `category_description` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`category_id`, `category_name`, `category_description`) VALUES
(1, 'Fruits', 'uiCookies content is free. When you buy through links on our site, we may earn an affiliate commission.');

-- --------------------------------------------------------

--
-- Table structure for table `county`
--

CREATE TABLE `county` (
  `county_id` int(11) NOT NULL,
  `county_name` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `county`
--

INSERT INTO `county` (`county_id`, `county_name`) VALUES
(1, 'Kiambus'),
(2, 'Mombasa edit'),
(9, 'Kajiado');

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `login_id` int(11) NOT NULL,
  `login_email` varchar(200) DEFAULT NULL,
  `login_password` varchar(200) DEFAULT NULL,
  `login_rank` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`login_id`, `login_email`, `login_password`, `login_rank`) VALUES
(1, 'john@gmail.com', '$2y$10$iayCMSOIZsXpem/2agbUGO8tRBO1RhM/wpRAwoX/ep96.47TV7XRW', 'admin'),
(4, 'tim@gmail.com', '$2y$10$2jCvzO0vJU2.FfWYwQENCeiTtUeXEu32vVgL61JtSRG6MeGRbr6jW', 'farmer'),
(5, 'customer@gmail.com', '$2y$10$Pj2DO1rovA2f67vaJFGPQ.XQaAqCUp48o5onIP74.21l.2PNJ3MiW', 'customer');

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `payment_id` int(11) NOT NULL,
  `payment_amount_transacted` float DEFAULT NULL,
  `payment_ref_number` varchar(200) DEFAULT NULL,
  `payment_date` varchar(200) DEFAULT NULL,
  `payment_product_order_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `pickup_point`
--

CREATE TABLE `pickup_point` (
  `pickup_point_id` int(11) NOT NULL,
  `pickup_point_status` varchar(100) DEFAULT NULL,
  `pickup_point_date` varchar(200) DEFAULT NULL,
  `pickup_point_time` varchar(200) DEFAULT NULL,
  `pick_point_location_desc` varchar(200) DEFAULT NULL,
  `pickup_point_town_id` int(11) DEFAULT NULL,
  `pickup_point_product_order_id` int(11) DEFAULT NULL,
  `pickup_point_sys_user_id` int(11) DEFAULT NULL,
  `pickup_point_payment_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `product_id` int(11) NOT NULL,
  `product_name` varchar(200) DEFAULT NULL,
  `product_price` float DEFAULT NULL,
  `product_image` varchar(200) DEFAULT NULL,
  `product_is_stocked` varchar(6) DEFAULT NULL,
  `product_unit_type` varchar(100) DEFAULT NULL,
  `product_quantity` int(11) DEFAULT NULL,
  `product_category_id` int(11) DEFAULT NULL,
  `product_sys_user_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_id`, `product_name`, `product_price`, `product_image`, `product_is_stocked`, `product_unit_type`, `product_quantity`, `product_category_id`, `product_sys_user_id`) VALUES
(24, 'Peppers', 1231, 'gallery/ee678e9f4d331f6d/product-3.jpg', '0', 'KG', 100, 1, 4),
(25, 'Pineapples', 1000, 'gallery/a44cd1c197c173c3/product-2.jpg', '0', 'KG', 100, 1, 4);

-- --------------------------------------------------------

--
-- Table structure for table `product_order`
--

CREATE TABLE `product_order` (
  `product_order_id` int(11) NOT NULL,
  `product_order_qty` int(11) NOT NULL,
  `product_order_date` varchar(100) DEFAULT NULL,
  `product_order_sys_user_id` int(11) DEFAULT NULL,
  `product_order_product_id` int(11) DEFAULT NULL,
  `product_order_status` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `sys_user`
--

CREATE TABLE `sys_user` (
  `sys_user_id` int(11) NOT NULL,
  `sys_user_first_name` varchar(200) DEFAULT NULL,
  `sys_user_last_name` varchar(200) DEFAULT NULL,
  `sys_user_mobile` varchar(200) DEFAULT NULL,
  `sys_user_town_id` int(11) DEFAULT NULL,
  `sys_user_login_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sys_user`
--

INSERT INTO `sys_user` (`sys_user_id`, `sys_user_first_name`, `sys_user_last_name`, `sys_user_mobile`, `sys_user_town_id`, `sys_user_login_id`) VALUES
(1, 'John', 'Doe', '12345678', 1, 1),
(4, 'Tim', 'Kim', '12345678', 1, 4),
(5, 'customer', 'Customer', '0709323242', 2, 5);

-- --------------------------------------------------------

--
-- Table structure for table `town`
--

CREATE TABLE `town` (
  `town_id` int(11) NOT NULL,
  `town_name` varchar(200) DEFAULT NULL,
  `town_description` varchar(200) DEFAULT NULL,
  `town_county_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `town`
--

INSERT INTO `town` (`town_id`, `town_name`, `town_description`, `town_county_id`) VALUES
(1, 'Limuru', 'This is limuru', 1),
(2, 'Naivasha', 'This is limuru', 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `county`
--
ALTER TABLE `county`
  ADD PRIMARY KEY (`county_id`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`login_id`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`payment_id`),
  ADD KEY `payment_product_order_id` (`payment_product_order_id`);

--
-- Indexes for table `pickup_point`
--
ALTER TABLE `pickup_point`
  ADD PRIMARY KEY (`pickup_point_id`),
  ADD KEY `pickup_point_town_id` (`pickup_point_town_id`),
  ADD KEY `pickup_point_product_order_id` (`pickup_point_product_order_id`),
  ADD KEY `pickup_point_sys_user_id` (`pickup_point_sys_user_id`),
  ADD KEY `pickup_point_payment_id` (`pickup_point_payment_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`),
  ADD KEY `product_category_id` (`product_category_id`),
  ADD KEY `product_sys_user_id` (`product_sys_user_id`);

--
-- Indexes for table `product_order`
--
ALTER TABLE `product_order`
  ADD PRIMARY KEY (`product_order_id`),
  ADD KEY `product_order_sys_user_id` (`product_order_sys_user_id`),
  ADD KEY `product_order_product_id` (`product_order_product_id`);

--
-- Indexes for table `sys_user`
--
ALTER TABLE `sys_user`
  ADD PRIMARY KEY (`sys_user_id`),
  ADD KEY `sys_user_login_id` (`sys_user_login_id`),
  ADD KEY `sys_user_town_id` (`sys_user_town_id`);

--
-- Indexes for table `town`
--
ALTER TABLE `town`
  ADD PRIMARY KEY (`town_id`),
  ADD KEY `town_county_id` (`town_county_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `county`
--
ALTER TABLE `county`
  MODIFY `county_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `login_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `payment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `pickup_point`
--
ALTER TABLE `pickup_point`
  MODIFY `pickup_point_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `product_order`
--
ALTER TABLE `product_order`
  MODIFY `product_order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `sys_user`
--
ALTER TABLE `sys_user`
  MODIFY `sys_user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `town`
--
ALTER TABLE `town`
  MODIFY `town_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `payment`
--
ALTER TABLE `payment`
  ADD CONSTRAINT `payment_ibfk_1` FOREIGN KEY (`payment_product_order_id`) REFERENCES `product_order` (`product_order_id`) ON DELETE CASCADE;

--
-- Constraints for table `pickup_point`
--
ALTER TABLE `pickup_point`
  ADD CONSTRAINT `pickup_point_ibfk_1` FOREIGN KEY (`pickup_point_town_id`) REFERENCES `town` (`town_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `pickup_point_ibfk_2` FOREIGN KEY (`pickup_point_product_order_id`) REFERENCES `product_order` (`product_order_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `pickup_point_ibfk_3` FOREIGN KEY (`pickup_point_sys_user_id`) REFERENCES `sys_user` (`sys_user_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `pickup_point_ibfk_4` FOREIGN KEY (`pickup_point_payment_id`) REFERENCES `payment` (`payment_id`) ON DELETE CASCADE;

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_ibfk_1` FOREIGN KEY (`product_category_id`) REFERENCES `category` (`category_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `products_ibfk_2` FOREIGN KEY (`product_sys_user_id`) REFERENCES `sys_user` (`sys_user_id`) ON DELETE CASCADE;

--
-- Constraints for table `product_order`
--
ALTER TABLE `product_order`
  ADD CONSTRAINT `product_order_ibfk_1` FOREIGN KEY (`product_order_sys_user_id`) REFERENCES `sys_user` (`sys_user_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `product_order_ibfk_2` FOREIGN KEY (`product_order_product_id`) REFERENCES `products` (`product_id`) ON DELETE CASCADE;

--
-- Constraints for table `sys_user`
--
ALTER TABLE `sys_user`
  ADD CONSTRAINT `sys_user_ibfk_1` FOREIGN KEY (`sys_user_login_id`) REFERENCES `login` (`login_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `sys_user_ibfk_2` FOREIGN KEY (`sys_user_town_id`) REFERENCES `town` (`town_id`) ON DELETE CASCADE;

--
-- Constraints for table `town`
--
ALTER TABLE `town`
  ADD CONSTRAINT `town_ibfk_1` FOREIGN KEY (`town_county_id`) REFERENCES `county` (`county_id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

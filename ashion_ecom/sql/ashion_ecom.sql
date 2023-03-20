-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Mar 20, 2023 at 10:40 AM
-- Server version: 8.0.32-0ubuntu0.20.04.2
-- PHP Version: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ashion_ecom`
--
CREATE DATABASE IF NOT EXISTS `ashion_ecom` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci;
USE `ashion_ecom`;

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

DROP TABLE IF EXISTS `cart`;
CREATE TABLE IF NOT EXISTS `cart` (
  `id` int NOT NULL AUTO_INCREMENT,
  `userId` int NOT NULL,
  `product_id` int NOT NULL,
  `product_price` int NOT NULL,
  `qty` int NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `product_image` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `subTotal` int NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `userId` (`userId`,`product_id`)
) ENGINE=InnoDB AUTO_INCREMENT=63 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`id`, `userId`, `product_id`, `product_price`, `qty`, `product_name`, `product_image`, `subTotal`) VALUES
(61, 1, 2, 342, 1, 'another', '../assets/images/shop-4.jpg', 342),
(62, 6, 2, 342, 1, 'another', '../assets/images/shop-4.jpg', 342);

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

DROP TABLE IF EXISTS `category`;
CREATE TABLE IF NOT EXISTS `category` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `name`) VALUES
(1, 'shirt'),
(2, 'dress'),
(4, 'formals'),
(5, 'blazer');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

DROP TABLE IF EXISTS `orders`;
CREATE TABLE IF NOT EXISTS `orders` (
  `id` int NOT NULL AUTO_INCREMENT,
  `userId` varchar(255) NOT NULL,
  `FirstName` varchar(255) NOT NULL,
  `LastName` varchar(255) NOT NULL,
  `Address` varchar(255) NOT NULL,
  `Postcode` decimal(6,0) NOT NULL,
  `Phone` decimal(10,0) NOT NULL,
  `Email` varchar(255) NOT NULL,
  `total` int NOT NULL,
  `paymentMethod` varchar(50) NOT NULL DEFAULT 'COD',
  PRIMARY KEY (`id`),
  KEY `orders_ibfk_1` (`userId`)
) ENGINE=InnoDB AUTO_INCREMENT=38 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `userId`, `FirstName`, `LastName`, `Address`, `Postcode`, `Phone`, `Email`, `total`, `paymentMethod`) VALUES
(29, 'admin@gmail.com', 'admin123', '', 'Some , address, for Home', '123', '1234567890', 'admin@gmail.com', 342, 'COD'),
(36, 'some@user.com', 'someUser', '', 'some addresss ', '456123', '1233211231', 'some@user.com', 321, 'COD'),
(37, 'some@user.com', 'someUser', '', 'some addresss ', '789456', '1233211231', 'some@user.com', 423, 'COD');

-- --------------------------------------------------------

--
-- Table structure for table `order_details`
--

DROP TABLE IF EXISTS `order_details`;
CREATE TABLE IF NOT EXISTS `order_details` (
  `id` int NOT NULL AUTO_INCREMENT,
  `order_id` int NOT NULL,
  `product_id` int NOT NULL,
  `product_qty` int NOT NULL,
  `product_price` int NOT NULL,
  `subTotal` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `product_id` (`product_id`),
  KEY `order_details_ibfk_1` (`order_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `order_details`
--

INSERT INTO `order_details` (`id`, `order_id`, `product_id`, `product_qty`, `product_price`, `subTotal`) VALUES
(1, 29, 2, 1, 342, 342),
(4, 36, 3, 1, 321, 321),
(5, 37, 9, 1, 423, 423);

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

DROP TABLE IF EXISTS `product`;
CREATE TABLE IF NOT EXISTS `product` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `categoryId` int NOT NULL,
  `image` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `price` decimal(6,2) DEFAULT NULL,
  `quantity` int NOT NULL,
  `views` int NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `categoryId` (`categoryId`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `name`, `categoryId`, `image`, `description`, `price`, `quantity`, `views`) VALUES
(1, 'some', 1, '../assets/images/shop-3.jpg', 'something', '123.00', 0, 0),
(2, 'another', 1, '../assets/images/shop-4.jpg', 'another', '342.00', 21, 33),
(3, 'another', 1, '../assets/images/shop-9.jpg', 'another', '321.00', 40, 28),
(8, 'some', 1, '../assets/images/shop-7.jpg', 'something', '223.00', 0, 0),
(9, 'something', 2, '../assets/images/shop-8.jpg', 'some desc', '423.00', 11, 12),
(14, 'some', 4, '../assets/images/shop-5.jpg', 'some Prod', '141.00', 13, 23),
(17, 'feafea', 2, '../assets/images/shop-3.jpg', 'feafea', '1341.00', 0, 42),
(18, 'Furry Hooded Parkha', 5, '../assets/images/shop-1.jpg', 'some desc', '59.00', 144, 2),
(20, 'Furry ', 5, '../assets/images/shop-6.jpg', 'some desc', '49.00', 0, 17);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(250) DEFAULT NULL,
  `contactNumber` varchar(20) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `password` varchar(250) DEFAULT NULL,
  `role` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT 'user',
  `address` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `name`, `contactNumber`, `email`, `password`, `role`, `address`) VALUES
(1, 'admin123', '1234567890', 'admin@gmail.com', 'root', 'admin', 'Some , address, for Home'),
(3, 'feagfeag22', '1234567890', 'some@some.com', 'some', 'user', 'some'),
(4, 'someone', '1234567890', 'something@some.com', 'some', 'user', 'someaddress'),
(5, 'Rahul', '3214569870', 'rahul.p@biztechcs.com', '321654', 'user', 'Some , Address'),
(6, 'someUser', '1233211231', 'some@user.com', 'some', 'user', 'some addresss ');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`userId`) REFERENCES `user` (`email`) ON DELETE CASCADE ON UPDATE RESTRICT;

--
-- Constraints for table `order_details`
--
ALTER TABLE `order_details`
  ADD CONSTRAINT `order_details_ibfk_1` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE ON UPDATE RESTRICT,
  ADD CONSTRAINT `order_details_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `product` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Constraints for table `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `product_ibfk_1` FOREIGN KEY (`categoryId`) REFERENCES `category` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

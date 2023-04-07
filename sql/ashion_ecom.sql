-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Mar 30, 2023 at 05:47 PM
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

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id` int NOT NULL,
  `userId` int NOT NULL,
  `product_id` int NOT NULL,
  `product_price` int NOT NULL,
  `qty` int NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `product_image` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `subTotal` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`id`, `userId`, `product_id`, `product_price`, `qty`, `product_name`, `product_image`, `subTotal`) VALUES
(95, 1, 2, 342, 1, 'another', '../assets/images/shop-4.jpg', 342),
(96, 1, 3, 321, 1, 'another', '../assets/images/shop-9.jpg', 321);

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `name`) VALUES
(1, 'shirt'),
(2, 'dress'),
(4, 'formals'),
(5, 'blazers'),
(8, 'some');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int NOT NULL,
  `userId` varchar(255) NOT NULL,
  `FirstName` varchar(255) NOT NULL,
  `LastName` varchar(255) NOT NULL,
  `Address` varchar(255) NOT NULL,
  `Postcode` decimal(6,0) NOT NULL,
  `Phone` decimal(10,0) NOT NULL,
  `Email` varchar(255) NOT NULL,
  `total` int NOT NULL,
  `paymentMethod` varchar(50) NOT NULL DEFAULT 'COD'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `userId`, `FirstName`, `LastName`, `Address`, `Postcode`, `Phone`, `Email`, `total`, `paymentMethod`) VALUES
(36, 'some@user.com', 'someUser', '', 'some addresss ', '456123', '1233211231', 'some@user.com', 321, 'COD'),
(39, 'admin@gmail.com', 'admin123', '', 'Some , address, for Home', '321132', '1234567890', 'admin@gmail.com', 2973, 'COD'),
(40, 'admin@gmail.com', 'admin123', '', 'Some , address, for Home', '123321', '1234567890', 'admin@gmail.com', 123, 'COD'),
(41, 'admin@gmail.com', 'admin123', '', 'Some , address, for Home', '123321', '1234567890', 'admin@gmail.com', 342, 'COD'),
(42, 'admin@gmail.com', 'admin123', '', 'Some , address, for Home', '534676', '1234567890', 'admin@gmail.com', 1341, 'COD'),
(43, 'admin@gmail.com', 'admin123', '', 'Some , address, for Home', '321123', '1234567890', 'admin@gmail.com', 3157, 'COD'),
(44, 'admin@gmail.com', 'admin123', '', 'Some , address, for Home', '123321', '1234567890', 'admin@gmail.com', 223, 'COD');

-- --------------------------------------------------------

--
-- Table structure for table `order_details`
--

CREATE TABLE `order_details` (
  `id` int NOT NULL,
  `order_id` int NOT NULL,
  `product_id` int NOT NULL,
  `product_qty` int NOT NULL,
  `product_price` int NOT NULL,
  `subTotal` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `order_details`
--

INSERT INTO `order_details` (`id`, `order_id`, `product_id`, `product_qty`, `product_price`, `subTotal`) VALUES
(4, 36, 3, 1, 321, 321),
(6, 39, 1, 1, 123, 123),
(7, 39, 2, 1, 342, 342),
(8, 39, 3, 1, 321, 321),
(9, 39, 8, 1, 223, 223),
(10, 39, 9, 1, 423, 423),
(11, 39, 14, 1, 141, 141),
(12, 39, 17, 1, 1341, 1341),
(13, 39, 18, 1, 59, 59),
(14, 40, 1, 1, 123, 123),
(15, 41, 2, 1, 342, 342),
(16, 42, 17, 1, 1341, 1341),
(17, 43, 1, 2, 123, 246),
(18, 43, 2, 3, 342, 1026),
(19, 43, 3, 1, 321, 321),
(20, 43, 8, 1, 223, 223),
(21, 43, 17, 1, 1341, 1341),
(22, 44, 8, 1, 223, 223);

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `id` int NOT NULL,
  `name` varchar(255) NOT NULL,
  `categoryId` int NOT NULL,
  `image` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `price` decimal(6,2) DEFAULT NULL,
  `quantity` int NOT NULL,
  `views` int NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `name`, `categoryId`, `image`, `description`, `price`, `quantity`, `views`) VALUES
(1, 'some', 1, '../assets/images/shop-3.jpg', 'something', '123.00', 0, 235),
(2, 'another', 1, '../assets/images/shop-4.jpg', 'another', '342.00', 16, 108),
(3, 'another', 1, '../assets/images/shop-9.jpg', 'another', '321.00', 38, 28),
(8, 'some', 1, '../assets/images/shop-7.jpg', 'something', '223.00', 9, 185),
(9, 'something', 2, '../assets/images/shop-8.jpg', 'some desc', '423.00', 10, 15),
(14, 'some', 4, '../assets/images/shop-5.jpg', 'some Prod', '141.00', 0, 23),
(17, 'feafea', 2, '../assets/images/shop-3.jpg', 'feafea', '1341.00', 13, 42),
(18, 'Furry Hooded Parkha', 5, '../assets/images/shop-1.jpg', 'some desc', '59.00', 143, 26),
(20, 'Furry ', 5, '../assets/images/shop-6.jpg', 'some desc', '49.00', 52, 17),
(21, 'another Product ', 5, '../assets/images/product-6.jpg', 'some desc', '1234.00', 12, 0),
(22, 'some', 5, '../assets/images/product-1.jpg', 'somedesc', '321.00', 20, 0);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int NOT NULL,
  `name` varchar(250) DEFAULT NULL,
  `contactNumber` varchar(20) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `password` varchar(250) DEFAULT NULL,
  `role` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT 'user',
  `address` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `name`, `contactNumber`, `email`, `password`, `role`, `address`) VALUES
(1, 'admin123', '1234567890', 'admin@gmail.com', 'root', 'admin', 'Some , address, for Home'),
(3, 'feagfeag22', '1234567890', 'some@some.com', 'some', 'user', 'some'),
(4, 'someone', '1234567890', 'something@some.com', 'some', 'user', 'someaddress'),
(5, 'Rahul', '3214569870', 'rahul.p@biztechcs.com', '321654', 'user', 'Some , Address'),
(6, 'someUser', '1233211231', 'some@user.com', 'some', 'user', 'some addresss '),
(7, 'some', '3214568977', 'admin@gma2il.com', 'Some@123', 'user', 'someAddresss'),
(8, 'some', '3125647895', 'some@someuser.com', 'something', 'user', 'some'),
(9, 'some', '1233121231', 'some@username.com', 'something', 'user', 'some'),
(10, 'some', '1231231231', 'something@someone.com', 'some', 'user', 'soem'),
(11, 'some', '1231231231', 'something@somene.com', 'some', 'user', 'soem'),
(12, 'some', '1231231231', 'some2some@some.com', 'some', 'user', 'some'),
(13, 'some', '', 'something@someone.co', '', 'user', ''),
(14, 'some', '1231231231', 'some@something.om', 'some', 'user', 'some');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `userId` (`userId`,`product_id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `orders_ibfk_1` (`userId`);

--
-- Indexes for table `order_details`
--
ALTER TABLE `order_details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_id` (`product_id`),
  ADD KEY `order_details_ibfk_1` (`order_id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`),
  ADD KEY `categoryId` (`categoryId`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=97;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT for table `order_details`
--
ALTER TABLE `order_details`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

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

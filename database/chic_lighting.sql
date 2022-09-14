-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 14, 2022 at 05:12 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `chic_lighting`
--
CREATE DATABASE IF NOT EXISTS chic_lighting;

USE chic_lighting;

-- --------------------------------------------------------

--
-- Table structure for table `brands`
--

CREATE TABLE `brands` (
  `BRANDID` int(11) NOT NULL,
  `BRANDNAME` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `brands`
--

INSERT INTO `brands` (`BRANDID`, `BRANDNAME`) VALUES
(1, 'ceiling'),
(2, 'wall'),
(3, 'lamp'),
(4, 'outdoor'),
(5, 'fan'),
(6, 'accents');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `CARTID` int(11) NOT NULL,
  `USERID` int(11) DEFAULT NULL,
  `SESSIONID` int(11) DEFAULT NULL,
  `STATUS` int(11) DEFAULT NULL,
  `FULLNAME` varchar(50) DEFAULT NULL,
  `ADDRESS` varchar(100) DEFAULT NULL,
  `EMAIL` varchar(50) DEFAULT NULL,
  `PHONE` varchar(20) DEFAULT NULL,
  `NOTE` varchar(1000) DEFAULT NULL,
  `CRTUSER` varchar(25) DEFAULT NULL,
  `CRTDATE` date DEFAULT NULL,
  `MDFUSER` varchar(25) DEFAULT NULL,
  `MDFDATE` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `cartitems`
--

CREATE TABLE `cartitems` (
  `CARTID` int(11) DEFAULT NULL,
  `PRODUCTID` int(11) DEFAULT NULL,
  `PRICE` float DEFAULT NULL,
  `QUANTITY` int(11) DEFAULT NULL,
  `ACTIVE` int(11) DEFAULT NULL,
  `CRTUSER` varchar(25) DEFAULT NULL,
  `CRTDATE` date DEFAULT NULL,
  `MDFUSER` varchar(25) DEFAULT NULL,
  `MDFDATE` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `dimension`
--

CREATE TABLE `dimension` (
  `PRODUCTID` int(11) NOT NULL,
  `HEIGHT` float DEFAULT NULL,
  `WIDTH` float DEFAULT NULL,
  `DEPTH` float DEFAULT NULL,
  `DIAMETER` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `ID` int(11) NOT NULL,
  `FULLNAME` varchar(50) DEFAULT NULL,
  `EMAIL` varchar(50) DEFAULT NULL,
  `COMMENT` varchar(1000) DEFAULT NULL,
  `EXPERIENCE` varchar(50) DEFAULT NULL,
  `CRTDATE` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `ORDERID` int(11) NOT NULL,
  `FIRSTNAME` varchar(25) DEFAULT NULL,
  `LASTNAME` varchar(25) DEFAULT NULL,
  `ADDRESS` varchar(100) DEFAULT NULL,
  `EMAIL` varchar(50) DEFAULT NULL,
  `PHONE` varchar(20) DEFAULT NULL,
  `PAYMENT` varchar(100) DEFAULT NULL,
  `STATUS` int(11) DEFAULT NULL,
  `CRTUSER` varchar(25) DEFAULT NULL,
  `CRTDATE` date DEFAULT NULL,
  `MDFUSER` varchar(25) DEFAULT NULL,
  `MDFDATE` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `ordersdetail`
--

CREATE TABLE `ordersdetail` (
  `ORDERID` int(11) NOT NULL,
  `PRODUCTID` int(11) DEFAULT NULL,
  `QUANTITY` int(11) DEFAULT NULL,
  `PRICE` float DEFAULT NULL,
  `EMAIL` varchar(50) DEFAULT NULL,
  `NOTE` varchar(1000) DEFAULT NULL,
  `CRTUSER` varchar(25) DEFAULT NULL,
  `CRTDATE` date DEFAULT NULL,
  `MDFUSER` varchar(25) DEFAULT NULL,
  `MDFDATE` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `PRODUCTID` int(11) NOT NULL,
  `PRODUCTNAME` varchar(100) DEFAULT NULL,
  `DETAIL` varchar(1000) DEFAULT NULL,
  `QUANTITY` int(11) DEFAULT NULL,
  `STATUS` varchar(25) DEFAULT NULL,
  `BRANDID` int(11) DEFAULT NULL,
  `PRICE` float DEFAULT NULL,
  `SALEPRICE` float DEFAULT NULL,
  `CRTUSER` varchar(25) DEFAULT NULL,
  `CRTDATE` date DEFAULT NULL,
  `MDFUSER` varchar(25) DEFAULT NULL,
  `MDFDATE` date DEFAULT NULL,
  `SOURCE` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`PRODUCTID`, `PRODUCTNAME`, `DETAIL`, `QUANTITY`, `STATUS`, `BRANDID`, `PRICE`, `SALEPRICE`, `CRTUSER`, `CRTDATE`, `MDFUSER`, `MDFDATE`, `SOURCE`) VALUES
(1, 'BRIGHTON TAPERED POLISHED STAINLESS STEEL PENDANT LIGHT', 'Neque porro quisquam est qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit...', 10, 'sale', 1, 499, 199, NULL, NULL, NULL, NULL, 'cl1.jpg'),
(2, 'BRIO BLACKENED BRASS PENDANT LIGHT', 'Neque porro quisquam est qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit...', 10, 'avaiable', 1, 399, NULL, NULL, NULL, NULL, NULL, 'cl2.jpg'),
(3, 'BRIO POLISHED BRASS PENDANT LIGHT', 'Neque porro quisquam est qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit...', 10, 'sale', 1, 399, 299, NULL, NULL, NULL, NULL, 'cl3.jpg'),
(4, 'COPA TIERED NATURAL RATTAN PENDANT LIGHT', 'Neque porro quisquam est qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit...', 10, 'avaiable', 1, 499, NULL, NULL, NULL, NULL, NULL, 'cl4.jpg'),
(5, 'EXPOSIOR INDOOR/OUTDOOR BLACK PENDANT LIGHT MODEL 017', 'Neque porro quisquam est qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit...', 10, 'avaiable', 1, 299, NULL, NULL, NULL, NULL, NULL, 'cl5.jpg'),
(6, 'HAKKA CONICAL RATTAN PENDANT LIGHT', 'Neque porro quisquam est qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit...', 10, 'avaiable', 1, 400, NULL, NULL, NULL, NULL, NULL, 'cl7.jpg'),
(7, 'HAMMERED BRASS SHALLOW DOME PENDANT LIGHT', 'Neque porro quisquam est qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit...', 10, 'avaiable', 1, 399, NULL, NULL, NULL, NULL, NULL, 'cl8.jpg'),
(8, 'LAMINA POLISHED BRASS PENDANT LIGHT', 'Neque porro quisquam est qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit...', 10, 'avaiable', 1, 449, NULL, NULL, NULL, NULL, NULL, 'cl9.jpg'),
(9, 'LANI WHITE PENDANT LIGHT', 'Neque porro quisquam est qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit...', 10, 'avaiable', 1, 449, NULL, NULL, NULL, NULL, NULL, 'cl10.jpg'),
(10, 'BRIO POLISHED BRASS ARTICULATING WALL SCONCE', 'Neque porro quisquam est qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit...', 10, 'avaiable', 2, 269, NULL, NULL, NULL, NULL, NULL, 'w7.jpg'),
(11, 'CYPRESS CHAMPAGNE DOUBLE WALL SCONCE', 'Neque porro quisquam est qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit...', 10, 'sale', 2, 379, 179, NULL, NULL, NULL, NULL, 'w8.jpg'),
(12, 'GRAZIANO INDOOR/OUTDOOR TRAVERTINE WALL SCONCE', 'Neque porro quisquam est qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit...', 10, 'avaiable', 2, 299, NULL, NULL, NULL, NULL, NULL, 'w10.jpg'),
(13, 'ALDUS BLACK AND POLISHED BRASS ARTICULATING WALL SCONCE', 'Neque porro quisquam est qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit...', 10, 'avaiable', 2, 229, NULL, NULL, NULL, NULL, NULL, 'w3.jpg'),
(14, 'ALDUS IVORY AND POLISHED BRASS ARTICULATING WALL SCONCE', 'Neque porro quisquam est qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit...', 10, 'bestseller', 2, 229, NULL, NULL, NULL, NULL, NULL, 'w4.jpg'),
(15, 'BECKER POLISHED BRASS WALL SCONCE', 'Neque porro quisquam est qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit...', 10, 'sale', 2, 199, 99, NULL, NULL, NULL, NULL, 'w5.jpg'),
(16, 'BRIO BLACKENED BRASS ARTICULATING WALL SCONCE', 'Neque porro quisquam est qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit...', 10, 'avaiable', 2, 269, NULL, NULL, NULL, NULL, NULL, 'w6.jpg'),
(17, 'SABINE POLISHED BRASS ARTICULATING WALL SCONCE', 'Neque porro quisquam est qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit...', 10, 'bestseller', 2, 199, NULL, NULL, NULL, NULL, NULL, 'w13.jpg'),
(18, 'SABINE BLACKENED BRASS ARTICULATING WALL SCONCE', 'Neque porro quisquam est qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit...', 10, 'bestseller', 2, 199, NULL, NULL, NULL, NULL, NULL, 'w14.jpg'),
(19, 'SOPORTE BLACKENED BRASS TABLE LAMP', 'Neque porro quisquam est qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit...', 10, 'avaiable', 3, 399, NULL, NULL, NULL, NULL, NULL, 'l1.jpg'),
(20, 'SOPORTE POLISHED BRASS TABLE LAMP', 'Neque porro quisquam est qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit...', 10, 'avaiable', 3, 399, NULL, NULL, NULL, NULL, NULL, 'l2.jpg'),
(21, 'BEAU BLACK TABLE LAMP', 'Neque porro quisquam est qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit...', 10, 'avaiable', 3, 249, NULL, NULL, NULL, NULL, NULL, 'l3.jpg'),
(22, 'BEAU POLISHED BRASS TABLE LAMP', 'Neque porro quisquam est qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit...', 10, 'avaiable', 3, 249, NULL, NULL, NULL, NULL, NULL, 'l4.jpg'),
(23, 'BIANCA MARBLE TABLE LAMP', 'Neque porro quisquam est qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit...', 10, 'avaiable', 3, 269, NULL, NULL, NULL, NULL, NULL, 'l5.jpg'),
(24, 'CRINKLE POLISHED BRASS TABLE LAMP', 'Neque porro quisquam est qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit...', 10, 'avaiable', 3, 369, NULL, NULL, NULL, NULL, NULL, 'l6.jpg'),
(25, 'ELEONORA MARBLE TABLE LAMP', 'Neque porro quisquam est qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit...', 10, 'sale', 3, 999, 799, NULL, NULL, NULL, NULL, 'l7.jpg'),
(26, 'EXPOSIOR POLISHED BRASS AND WALNUT TABLE LAMP', 'Neque porro quisquam est qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit...', 10, 'avaiable', 3, 369, NULL, NULL, NULL, NULL, NULL, 'l8.jpg'),
(27, 'EXPOSIOR INDOOR/OUTDOOR BLACK PENDANT LIGHT MODEL 017', 'Neque porro quisquam est qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit...', 10, 'avaiable', 4, 299, NULL, NULL, NULL, NULL, NULL, 'od1.jpg'),
(28, 'GRAZIANO INDOOR/OUTDOOR TRAVERTINE WALL SCONCE', 'Neque porro quisquam est qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit...', 10, 'avaiable', 4, 299, NULL, NULL, NULL, NULL, NULL, 'od2.jpg'),
(29, 'RONDA INDOOR/OUTDOOR BLACK FLUSH MOUNT LIGHT', 'Neque porro quisquam est qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit...', 10, 'avaiable', 4, 199, NULL, NULL, NULL, NULL, NULL, 'od3.jpg'),
(30, 'RONDA INDOOR/OUTDOOR MATTE BLACK WALL SCONCE', 'Neque porro quisquam est qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit...', 10, 'avaiable', 4, 149, NULL, NULL, NULL, NULL, NULL, 'od4.jpg'),
(31, 'RONDA INDOOR/OUTDOOR POLISHED BRASS FLUSH MOUNT LIGHT', 'Neque porro quisquam est qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit...', 10, 'avaiable', 4, 199, NULL, NULL, NULL, NULL, NULL, 'od5.jpg'),
(32, 'RONDA INDOOR/OUTDOOR BLACK FLUSH MOUNT LIGHT', 'Neque porro quisquam est qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit...', 10, 'avaiable', 4, 199, NULL, NULL, NULL, NULL, NULL, 'od6.jpg'),
(33, '5 BROWN WINGS FAN', 'Neque porro quisquam est qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit...', 10, 'avaiable', 5, 191, NULL, NULL, NULL, NULL, NULL, 'f1.jpg'),
(34, '3 BROWN WINGS FAN', 'Neque porro quisquam est qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit...', 10, 'avaiable', 5, 80, NULL, NULL, NULL, NULL, NULL, 'f2.jpg'),
(35, '5 BLACK WINGS FAN', 'Neque porro quisquam est qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit...', 10, 'avaiable', 5, 191, NULL, NULL, NULL, NULL, NULL, 'f3.jpg'),
(36, '3 BROWN WINGS FAN PREMIUM', 'Neque porro quisquam est qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit...', 10, 'avaiable', 5, 91, NULL, NULL, NULL, NULL, NULL, 'f4.jpg'),
(37, '5 BROWN LEAF WINGS FAN', 'Neque porro quisquam est qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit...', 10, 'avaiable', 5, 200, NULL, NULL, NULL, NULL, NULL, 'f5.jpg'),
(38, '5 WHITE WINGS FA', 'Neque porro quisquam est qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit...', 10, 'avaiable', 5, 191, NULL, NULL, NULL, NULL, NULL, 'f9.jpg'),
(39, 'BALL CANDLES SET OF 2', 'Neque porro quisquam est qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit...', 10, 'avaiable', 6, 12.95, NULL, NULL, NULL, NULL, NULL, 'ha1.jpg'),
(40, 'BLACK TWISTED TAPER CANDLES SET OF 2', 'Neque porro quisquam est qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit...', 10, 'avaiable', 6, 4.95, NULL, NULL, NULL, NULL, NULL, 'ha2.jpg'),
(41, 'BRIX GOLDEN BLACK MARBLE INCENSE BURNER', 'Neque porro quisquam est qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit...', 10, 'avaiable', 6, 39.95, NULL, NULL, NULL, NULL, NULL, 'ha3.jpg'),
(42, 'CINQ LARGE MULTI WHITE TAPER CANDLE HOLDER', 'Neque porro quisquam est qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit...', 10, 'avaiable', 6, 199, NULL, NULL, NULL, NULL, NULL, 'ha4.jpg'),
(43, 'DREAMER IN LONDON CEDARWOOD AND VANILLA CANDLE', 'Neque porro quisquam est qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit...', 10, 'avaiable', 6, 65, NULL, NULL, NULL, NULL, NULL, 'ha5.jpg'),
(44, 'FALCON METAL INCENSE BURNER', 'Neque porro quisquam est qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit...', 10, 'avaiable', 6, 69.95, NULL, NULL, NULL, NULL, NULL, 'ha6.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `USERID` int(11) NOT NULL,
  `USERNAME` varchar(25) DEFAULT NULL,
  `PASSWORD` varchar(40) DEFAULT NULL,
  `FIRSTNAME` varchar(25) DEFAULT NULL,
  `LASTNAME` varchar(25) DEFAULT NULL,
  `ADDRESS` varchar(100) DEFAULT NULL,
  `EMAIL` varchar(50) DEFAULT NULL,
  `PHONE` varchar(20) DEFAULT NULL,
  `CRTUSER` varchar(25) DEFAULT NULL,
  `CRTDATE` date DEFAULT NULL,
  `MDFUSER` varchar(25) DEFAULT NULL,
  `MDFDATE` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`BRANDID`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`CARTID`),
  ADD KEY `FK_Cart_Users` (`USERID`);

--
-- Indexes for table `cartitems`
--
ALTER TABLE `cartitems`
  ADD KEY `FK_CartItems_Cart` (`CARTID`),
  ADD KEY `FK_CartItems_Products` (`PRODUCTID`);

--
-- Indexes for table `dimension`
--
ALTER TABLE `dimension`
  ADD KEY `FK_Dimension_Products` (`PRODUCTID`);

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`ORDERID`);

--
-- Indexes for table `ordersdetail`
--
ALTER TABLE `ordersdetail`
  ADD KEY `FK_OrdersDetail_Orders` (`ORDERID`),
  ADD KEY `FK_OrdersDetail_Products` (`PRODUCTID`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`PRODUCTID`),
  ADD KEY `FK_Products_Brands` (`BRANDID`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`USERID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `brands`
--
ALTER TABLE `brands`
  MODIFY `BRANDID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `CARTID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `ORDERID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `PRODUCTID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `USERID` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `cart`
--
ALTER TABLE `cart`
  ADD CONSTRAINT `FK_Cart_Users` FOREIGN KEY (`USERID`) REFERENCES `users` (`USERID`);

--
-- Constraints for table `cartitems`
--
ALTER TABLE `cartitems`
  ADD CONSTRAINT `FK_CartItems_Cart` FOREIGN KEY (`CARTID`) REFERENCES `cart` (`CARTID`),
  ADD CONSTRAINT `FK_CartItems_Products` FOREIGN KEY (`PRODUCTID`) REFERENCES `products` (`PRODUCTID`);

--
-- Constraints for table `dimension`
--
ALTER TABLE `dimension`
  ADD CONSTRAINT `FK_Dimension_Products` FOREIGN KEY (`PRODUCTID`) REFERENCES `products` (`PRODUCTID`);

--
-- Constraints for table `ordersdetail`
--
ALTER TABLE `ordersdetail`
  ADD CONSTRAINT `FK_OrdersDetail_Orders` FOREIGN KEY (`ORDERID`) REFERENCES `orders` (`ORDERID`),
  ADD CONSTRAINT `FK_OrdersDetail_Products` FOREIGN KEY (`PRODUCTID`) REFERENCES `products` (`PRODUCTID`);

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `FK_Products_Brands` FOREIGN KEY (`BRANDID`) REFERENCES `brands` (`BRANDID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th8 23, 2022 lúc 05:57 AM
-- Phiên bản máy phục vụ: 10.4.18-MariaDB
-- Phiên bản PHP: 7.3.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `chiclighting`
--

CREATE DATABASE IF NOT EXISTS `chic_lighting`;
USE `chic_lighting`;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `brands`
--

CREATE TABLE `brands` (
  `BRANDID` int(11) NOT NULL,
  `BRANDNAME` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `cart`
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
-- Cấu trúc bảng cho bảng `cartitems`
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
-- Cấu trúc bảng cho bảng `dimension`
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
-- Cấu trúc bảng cho bảng `feedback`
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
-- Cấu trúc bảng cho bảng `orders`
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
-- Cấu trúc bảng cho bảng `ordersdetail`
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
-- Cấu trúc bảng cho bảng `products`
--

CREATE TABLE `products` (
  `PRODUCTID` int(11) NOT NULL,
  `PRODUCTNAME` varchar(100) DEFAULT NULL,
  `DETAIL` varchar(1000) DEFAULT NULL,
  `QUANTITY` int(11) DEFAULT NULL,
  `STATUS` int(11) DEFAULT NULL,
  `BRANDID` int(11) DEFAULT NULL,
  `PRICE` float DEFAULT NULL,
  `CRTUSER` varchar(25) DEFAULT NULL,
  `CRTDATE` date DEFAULT NULL,
  `MDFUSER` varchar(25) DEFAULT NULL,
  `MDFDATE` date DEFAULT NULL,
  `SOURCE` varchar(100) NULL,
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
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
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`BRANDID`);

--
-- Chỉ mục cho bảng `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`CARTID`),
  ADD KEY `FK_Cart_Users` (`USERID`);

--
-- Chỉ mục cho bảng `cartitems`
--
ALTER TABLE `cartitems`
  ADD KEY `FK_CartItems_Cart` (`CARTID`),
  ADD KEY `FK_CartItems_Products` (`PRODUCTID`);

--
-- Chỉ mục cho bảng `dimension`
--
ALTER TABLE `dimension`
  ADD KEY `FK_Dimension_Products` (`PRODUCTID`);

--
-- Chỉ mục cho bảng `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`ID`);

--
-- Chỉ mục cho bảng `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`ORDERID`);

--
-- Chỉ mục cho bảng `ordersdetail`
--
ALTER TABLE `ordersdetail`
  ADD KEY `FK_OrdersDetail_Orders` (`ORDERID`),
  ADD KEY `FK_OrdersDetail_Products` (`PRODUCTID`);

--
-- Chỉ mục cho bảng `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`PRODUCTID`),
  ADD KEY `FK_Products_Brands` (`BRANDID`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`USERID`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `brands`
--
ALTER TABLE `brands`
  MODIFY `BRANDID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `cart`
--
ALTER TABLE `cart`
  MODIFY `CARTID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `feedback`
--
ALTER TABLE `feedback`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `orders`
--
ALTER TABLE `orders`
  MODIFY `ORDERID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `products`
--
ALTER TABLE `products`
  MODIFY `PRODUCTID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `USERID` int(11) NOT NULL AUTO_INCREMENT;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `cart`
--
ALTER TABLE `cart`
  ADD CONSTRAINT `FK_Cart_Users` FOREIGN KEY (`USERID`) REFERENCES `users` (`USERID`);

--
-- Các ràng buộc cho bảng `cartitems`
--
ALTER TABLE `cartitems`
  ADD CONSTRAINT `FK_CartItems_Cart` FOREIGN KEY (`CARTID`) REFERENCES `cart` (`CARTID`),
  ADD CONSTRAINT `FK_CartItems_Products` FOREIGN KEY (`PRODUCTID`) REFERENCES `products` (`PRODUCTID`);

--
-- Các ràng buộc cho bảng `dimension`
--
ALTER TABLE `dimension`
  ADD CONSTRAINT `FK_Dimension_Products` FOREIGN KEY (`PRODUCTID`) REFERENCES `products` (`PRODUCTID`);

--
-- Các ràng buộc cho bảng `ordersdetail`
--
ALTER TABLE `ordersdetail`
  ADD CONSTRAINT `FK_OrdersDetail_Orders` FOREIGN KEY (`ORDERID`) REFERENCES `orders` (`ORDERID`),
  ADD CONSTRAINT `FK_OrdersDetail_Products` FOREIGN KEY (`PRODUCTID`) REFERENCES `products` (`PRODUCTID`);

--
-- Các ràng buộc cho bảng `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `FK_Products_Brands` FOREIGN KEY (`BRANDID`) REFERENCES `brands` (`BRANDID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

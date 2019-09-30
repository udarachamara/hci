-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Sep 30, 2019 at 06:12 PM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.1.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hci_api`
--

-- --------------------------------------------------------

--
-- Table structure for table `accounts`
--

CREATE TABLE `accounts` (
  `ID` int(11) NOT NULL,
  `ACC_NO` int(11) NOT NULL,
  `HOLDER_NAME` varchar(100) NOT NULL,
  `CARDNO` varchar(16) NOT NULL,
  `CVV` int(11) NOT NULL,
  `BANKID` int(11) NOT NULL,
  `BALANCE` decimal(10,2) NOT NULL DEFAULT '5000.00',
  `ACC_STATUS` varchar(15) NOT NULL DEFAULT 'active'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `accounts`
--

INSERT INTO `accounts` (`ID`, `ACC_NO`, `HOLDER_NAME`, `CARDNO`, `CVV`, `BANKID`, `BALANCE`, `ACC_STATUS`) VALUES
(1, 823452342, 'Udara Chamara Herath', '8877665544332211', 123, 3212, '5000.00', 'active');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `ID` int(11) NOT NULL,
  `ORDERID` int(11) NOT NULL,
  `ITEMID` int(11) NOT NULL,
  `PRICE` decimal(10,2) NOT NULL,
  `SELL_PRICE` decimal(10,2) NOT NULL,
  `STATUS` varchar(15) NOT NULL DEFAULT 'pending',
  `CREATE_AT` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `ID` int(11) NOT NULL,
  `NAME` varchar(250) NOT NULL,
  `IMG` varchar(255) DEFAULT NULL,
  `STATUS` varchar(10) NOT NULL DEFAULT 'active',
  `CREATE_AT` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `MODIFIED_AT` datetime DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `RANK` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`ID`, `NAME`, `IMG`, `STATUS`, `CREATE_AT`, `MODIFIED_AT`, `RANK`) VALUES
(2, 'Electronics', 'public/images/category_logo/2019_09_16_03_09_34_images.jpg', 'active', '2019-09-16 18:40:34', '2019-09-16 18:56:09', 1),
(3, 'Sports', 'public/images/category_logo/2019_09_16_03_09_30_download.jpg', 'active', '2019-09-16 18:48:30', '2019-09-16 18:56:12', 1),
(4, 'Toys', 'public/images/category_logo/2019_09_21_11_09_01_images.jpg', 'active', '2019-09-21 14:49:01', '2019-09-21 14:49:44', 1),
(5, 'Vehicles', 'public/images/category_logo/2019_09_21_11_09_19_download.jpg', 'active', '2019-09-21 14:49:19', '2019-09-21 14:49:47', 1),
(6, 'Test', 'public/images/category_logo/2019_09_28_10_09_48_s-l225.jpg', 'active', '2019-09-28 14:10:48', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `gateway`
--

CREATE TABLE `gateway` (
  `ID` int(11) NOT NULL,
  `CLIENT_NAME` varchar(100) NOT NULL,
  `CLIENT_ACC_NO` int(11) NOT NULL,
  `PUBLICKEY` varchar(250) NOT NULL,
  `SECRETKEY` varchar(250) NOT NULL,
  `CREATE_AT` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `items`
--

CREATE TABLE `items` (
  `ID` int(11) NOT NULL,
  `NAME` varchar(250) NOT NULL,
  `IMG` varchar(255) DEFAULT NULL,
  `DESCRIPTION` text,
  `IMG_ARRAY` text,
  `SUBCATEGORY` int(11) DEFAULT NULL,
  `PRICE` decimal(10,2) DEFAULT NULL,
  `STATUS` varchar(10) NOT NULL DEFAULT 'active',
  `CREATE_AT` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `MODIFIED_AT` datetime DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `items`
--

INSERT INTO `items` (`ID`, `NAME`, `IMG`, `DESCRIPTION`, `IMG_ARRAY`, `SUBCATEGORY`, `PRICE`, `STATUS`, `CREATE_AT`, `MODIFIED_AT`) VALUES
(1, 'Car AZ12-BCX', 'public/images/product_logo/2019_09_16_03_09_34_images.jpg', NULL, 'public/images/product_logo/2019_09_16_03_09_34_images.jpg', 1, '450.00', 'active', '2019-09-19 21:20:17', '2019-09-19 21:32:50'),
(2, 'Mini TV Game Console', 'public/images/product_logo/s-l2251.jpg', NULL, NULL, 1, '417.00', 'active', '2019-09-21 11:36:02', '2019-09-21 11:37:26'),
(3, 'MP3 Player Game Console', 'public/images/product_logo/s-l225.jpg', NULL, NULL, 1, '230.00', 'active', '2019-09-21 11:42:09', '2019-09-21 11:42:34'),
(4, 'Handy Fan Usb Mini Portable', 'public/images/product_logo/s-l22fgfhgfh.jpg', NULL, NULL, 1, '15.00', 'active', '2019-09-21 12:38:28', '2019-09-21 12:40:51'),
(7, 'ookaburra Kahuna Pro Cricket Bat (2019)', 'public/images/product_logo/2019_09_28_08_09_56_s-l1600.jpg', 'Item Display Weight: 2.15 Pounds\nSize: Short Handle \nMid blade (215mm to 235mm from toe)\nRounded edge - thickness (34-38mm)\nSlight concave (2-3mm)', NULL, 2, NULL, 'active', '2019-09-28 11:51:56', NULL),
(8, 'Test1', 'public/images/product_logo/2019_09_28_10_09_42_s-l1600.jpg', 'Test', NULL, 2, NULL, 'active', '2019-09-28 14:14:42', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `ID` int(11) NOT NULL,
  `ORDERID` int(11) NOT NULL,
  `CART_ID` int(11) NOT NULL,
  `TOTAL_PRICE` decimal(10,2) NOT NULL DEFAULT '0.00',
  `ITEMS_COUNT` int(11) NOT NULL DEFAULT '0',
  `STATUS` varchar(15) NOT NULL DEFAULT 'pending',
  `CREATE_AT` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `ID` int(11) NOT NULL,
  `CUSTOMER_ID` int(11) NOT NULL,
  `ORDERID` int(11) NOT NULL,
  `AMOUNT` decimal(10,2) NOT NULL,
  `PAYMENT_TYPE` varchar(10) NOT NULL DEFAULT 'card',
  `STATUS` varchar(15) NOT NULL DEFAULT 'pending',
  `CREATE_AT` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `subcategories`
--

CREATE TABLE `subcategories` (
  `ID` int(11) NOT NULL,
  `NAME` varchar(100) NOT NULL,
  `CATEGORY` int(11) NOT NULL,
  `STATUS` varchar(10) NOT NULL,
  `CREATE_AT` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `MODIFIED_AT` datetime DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `subcategories`
--

INSERT INTO `subcategories` (`ID`, `NAME`, `CATEGORY`, `STATUS`, `CREATE_AT`, `MODIFIED_AT`) VALUES
(1, 'Electric Touch', 2, 'active', '2019-09-19 21:19:33', '2019-09-28 10:38:54'),
(2, 'Cricket', 3, 'active', '2019-09-21 14:46:06', NULL),
(3, 'Teddy Bear', 4, 'active', '2019-09-28 10:33:54', NULL),
(4, 'Car', 5, 'active', '2019-09-28 10:34:28', NULL),
(5, 'Jeep', 5, 'active', '2019-09-28 10:34:39', NULL),
(6, 'Rugby', 3, 'active', '2019-09-28 10:34:56', NULL),
(7, 'Electric Kettle', 2, 'active', '2019-09-28 10:35:15', NULL),
(8, 'Electric Iron', 2, 'active', '2019-09-28 10:35:27', NULL),
(9, 'Barbie Doll', 4, 'active', '2019-09-28 10:35:56', NULL),
(10, 'Remote Control Car', 4, 'active', '2019-09-28 10:36:21', NULL),
(11, 'Electric Bike', 5, 'active', '2019-09-28 10:36:42', NULL),
(12, 'Bicycle', 5, 'active', '2019-09-28 10:36:55', NULL),
(13, 'Swimming', 3, 'active', '2019-09-28 10:37:07', NULL),
(14, 'Shaving Machine', 2, 'active', '2019-09-28 10:39:50', NULL),
(15, 'Quad Bike', 5, 'active', '2019-09-28 10:42:48', NULL),
(16, 'Puzzel', 4, 'active', '2019-09-28 10:43:36', NULL),
(17, 'CCTV Camera', 2, 'active', '2019-09-28 10:43:55', NULL),
(18, 'Test', 4, 'active', '2019-09-28 14:12:42', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `ID` int(11) NOT NULL,
  `FNAME` varchar(45) NOT NULL,
  `LNAME` varchar(45) DEFAULT NULL,
  `EMAIL` varchar(250) NOT NULL,
  `PASSWORD` varchar(250) NOT NULL,
  `STATUS` varchar(10) NOT NULL DEFAULT 'active',
  `USER_LEVEL` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`ID`, `FNAME`, `LNAME`, `EMAIL`, `PASSWORD`, `STATUS`, `USER_LEVEL`) VALUES
(1, 'udara', 'chamara', 'udara9465@gmail.com', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220', 'active', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `accounts`
--
ALTER TABLE `accounts`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `gateway`
--
ALTER TABLE `gateway`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `items`
--
ALTER TABLE `items`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `subcategories`
--
ALTER TABLE `subcategories`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `accounts`
--
ALTER TABLE `accounts`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `gateway`
--
ALTER TABLE `gateway`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `items`
--
ALTER TABLE `items`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `subcategories`
--
ALTER TABLE `subcategories`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

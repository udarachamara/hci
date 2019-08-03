-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Aug 03, 2019 at 05:34 AM
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
  `STATUS` varchar(10) NOT NULL DEFAULT 'active',
  `CREATE_AT` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `MODIFIED_AT` datetime DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
  `SUBCATEGORY` int(11) DEFAULT NULL,
  `PRICE` decimal(10,2) DEFAULT NULL,
  `STATUS` varchar(10) NOT NULL DEFAULT 'active',
  `CREATE_AT` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `MODIFIED_AT` datetime DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `gateway`
--
ALTER TABLE `gateway`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `items`
--
ALTER TABLE `items`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

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
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

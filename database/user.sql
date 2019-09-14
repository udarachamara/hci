-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Aug 27, 2019 at 05:56 AM
-- Server version: 5.6.41-84.1
-- PHP Version: 7.2.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `shalinda_broker_licencedb`
--

-- --------------------------------------------------------

--
-- Table structure for table `company`
--

CREATE TABLE `company` (
  `ID` int(11) NOT NULL,
  `LICENCE_ID` int(11) NOT NULL,
  `NAME` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `DB_NAME` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  `DB_USER_NAME` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `DB_PASSWORD` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `IS_ACTIVE` tinyint(4) DEFAULT '1',
  `LOGO` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `CREATED_AT` datetime DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `company`
--

INSERT INTO `company` (`ID`, `LICENCE_ID`, `NAME`, `DB_NAME`, `DB_USER_NAME`, `DB_PASSWORD`, `IS_ACTIVE`, `LOGO`, `CREATED_AT`) VALUES
(1, 1, 'Lak Insurance Brokers (Pvt) Ltd\n', 'shalinda_broker_LAK_DB', 'shalinda_BRUSR01', 'G]1YV{UaJ}M6', 1, NULL, '2019-08-23 23:58:22');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `ID` int(11) NOT NULL,
  `ROLE_ID` int(11) NOT NULL,
  `OAUTH_PROVIDER` varchar(15) COLLATE utf8_unicode_ci DEFAULT NULL,
  `OAUTH_UID` varchar(25) COLLATE utf8_unicode_ci DEFAULT NULL,
  `FIRST_NAME` varchar(25) COLLATE utf8_unicode_ci DEFAULT NULL,
  `LAST_NAME` varchar(25) COLLATE utf8_unicode_ci DEFAULT NULL,
  `EMAIL` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `PASSWORD` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `COMPANY_ID` int(11) NOT NULL,
  `TOKEN` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `TOKEN_EXPIRED` datetime DEFAULT NULL,
  `GENDER` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `LOCATE` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `PICTURE` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `LINK` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `CREATED_AT` datetime DEFAULT CURRENT_TIMESTAMP,
  `MODIFIED_AT` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`ID`, `ROLE_ID`, `OAUTH_PROVIDER`, `OAUTH_UID`, `FIRST_NAME`, `LAST_NAME`, `EMAIL`, `PASSWORD`, `COMPANY_ID`, `TOKEN`, `TOKEN_EXPIRED`, `GENDER`, `LOCATE`, `PICTURE`, `LINK`, `CREATED_AT`, `MODIFIED_AT`) VALUES
(3, 1, NULL, NULL, 'udara', 'chamara', 'udara@accusys.lk', '135af68391d4b3f8a017a2754430dace731300f1', 1, 'On2B!1GI$2M7IzohAjukt=Njn=siHWgEmn8', NULL, 'M', NULL, NULL, NULL, NULL, NULL),
(4, 1, NULL, NULL, 'udara', 'herath', 'udarachamar.chamara@gmail.com', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220', 1, NULL, NULL, 'O', NULL, NULL, NULL, NULL, NULL),
(5, 1, NULL, NULL, 'udara', 'chamara', 'udara9465@gmail.com', '08fafe1d8fca7c3b5be5f248c03b5fc937893ab0', 1, '', '0000-00-00 00:00:00', 'M', NULL, NULL, NULL, NULL, NULL),
(6, 1, NULL, NULL, 'Rohan', 'Wijesundara', 'rohan@accusys.lk', '9671c73253cee9b18b8df367e3e627fab2863fe8', 1, NULL, NULL, 'M', NULL, NULL, NULL, NULL, NULL),
(7, 1, NULL, NULL, 'Pubudu', 'Wimalaratne', 'pubudu_w75@yahoo.com', 'e09daa5c961aab57bd3504379b2dc7030c7d1783', 1, NULL, NULL, 'O', NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `user_licence`
--

CREATE TABLE `user_licence` (
  `ID` int(11) NOT NULL,
  `NAME` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `FEE` decimal(10,2) DEFAULT NULL,
  `DESCRIPTION` varchar(500) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `user_licence`
--

INSERT INTO `user_licence` (`ID`, `NAME`, `FEE`, `DESCRIPTION`) VALUES
(1, 'ENTRY', '1000.00', 'Quotation Comparison\n'),
(2, 'SILVER', '2500.00', 'Quotation Comparison,Cover Note Generation ,Debit Advice Generation\n'),
(3, 'GOLD', '5000.00', 'Quotation Comparison , Cover Note Generation , Debit Advice Generation, ');

-- --------------------------------------------------------

--
-- Table structure for table `user_role`
--

CREATE TABLE `user_role` (
  `ID` int(11) NOT NULL,
  `NAME` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `user_role`
--

INSERT INTO `user_role` (`ID`, `NAME`) VALUES
(1, 'Super Admin'),
(2, 'Company Admin'),
(3, 'User');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `company`
--
ALTER TABLE `company`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `fk_licence_id_idx` (`LICENCE_ID`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `fk_company_idx` (`COMPANY_ID`),
  ADD KEY `fk_roleid_idx` (`ROLE_ID`);

--
-- Indexes for table `user_licence`
--
ALTER TABLE `user_licence`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `user_role`
--
ALTER TABLE `user_role`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `company`
--
ALTER TABLE `company`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `user_licence`
--
ALTER TABLE `user_licence`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `user_role`
--
ALTER TABLE `user_role`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `company`
--
ALTER TABLE `company`
  ADD CONSTRAINT `fk_licence_id` FOREIGN KEY (`LICENCE_ID`) REFERENCES `user_licence` (`ID`);

--
-- Constraints for table `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `fk_company` FOREIGN KEY (`COMPANY_ID`) REFERENCES `company` (`ID`),
  ADD CONSTRAINT `fk_roleid` FOREIGN KEY (`ROLE_ID`) REFERENCES `user_role` (`ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

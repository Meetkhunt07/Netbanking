-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 10, 2023 at 09:02 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `banking`
--

-- --------------------------------------------------------

--
-- Table structure for table `account_transaction`
--

CREATE TABLE `account_transaction` (
  `TransactionID` int(10) NOT NULL,
  `AccountNo` int(10) NOT NULL,
  `TypeID` int(10) NOT NULL,
  `TransactionType` enum('Debit','Credit','','') NOT NULL,
  `TransactionAmt` double(10,2) NOT NULL,
  `TransactionDate` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `account_transaction`
--

INSERT INTO `account_transaction` (`TransactionID`, `AccountNo`, `TypeID`, `TransactionType`, `TransactionAmt`, `TransactionDate`) VALUES
(2, 1, 1, 'Credit', 200.00, '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `account_types`
--

CREATE TABLE `account_types` (
  `TypeId` int(11) NOT NULL,
  `TypeName` enum('saving','current','recurring','FD') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `account_types`
--

INSERT INTO `account_types` (`TypeId`, `TypeName`) VALUES
(1, 'current');

-- --------------------------------------------------------

--
-- Table structure for table `user_details`
--

CREATE TABLE `user_details` (
  `AccountNo` int(10) NOT NULL,
  `User_Mail` varchar(35) NOT NULL,
  `User_AccType` int(11) NOT NULL,
  `UserName` varchar(25) NOT NULL,
  `UserContact` bigint(10) NOT NULL,
  `KYC_No` varchar(10) NOT NULL,
  `User_CurrentBal` double(10,2) NOT NULL,
  `OpeningDate` date NOT NULL,
  `User_Address` varchar(50) NOT NULL,
  `UserPass` varchar(16) NOT NULL,
  `pic_add` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_details`
--

INSERT INTO `user_details` (`AccountNo`, `User_Mail`, `User_AccType`, `UserName`, `UserContact`, `KYC_No`, `User_CurrentBal`, `OpeningDate`, `User_Address`, `UserPass`, `pic_add`) VALUES
(1, 'meet@gamil.com', 1, 'Meet', 1234567890, '11', 50000.00, '2023-10-10', 'surat', 'Meet@5564', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `account_transaction`
--
ALTER TABLE `account_transaction`
  ADD PRIMARY KEY (`TransactionID`),
  ADD KEY `AccountNo` (`AccountNo`,`TypeID`),
  ADD KEY `tyid` (`TypeID`);

--
-- Indexes for table `account_types`
--
ALTER TABLE `account_types`
  ADD PRIMARY KEY (`TypeId`);

--
-- Indexes for table `user_details`
--
ALTER TABLE `user_details`
  ADD PRIMARY KEY (`AccountNo`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `account_transaction`
--
ALTER TABLE `account_transaction`
  MODIFY `TransactionID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `account_types`
--
ALTER TABLE `account_types`
  MODIFY `TypeId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `user_details`
--
ALTER TABLE `user_details`
  MODIFY `AccountNo` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `account_transaction`
--
ALTER TABLE `account_transaction`
  ADD CONSTRAINT `accno` FOREIGN KEY (`AccountNo`) REFERENCES `user_details` (`AccountNo`),
  ADD CONSTRAINT `tyid` FOREIGN KEY (`TypeID`) REFERENCES `account_types` (`TypeId`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

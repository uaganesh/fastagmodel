-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 23, 2021 at 10:03 AM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `fastag`
--

-- --------------------------------------------------------

--
-- Table structure for table `application`
--

CREATE TABLE `application` (
  `applicationid` int(5) UNSIGNED ZEROFILL NOT NULL,
  `name` varchar(50) NOT NULL,
  `gender` varchar(20) NOT NULL,
  `address` varchar(255) NOT NULL,
  `contact` varchar(50) NOT NULL,
  `dob` date NOT NULL,
  `state` varchar(50) NOT NULL,
  `pincode` int(10) NOT NULL,
  `vehiclemanufacturer` varchar(100) NOT NULL,
  `tagclass` varchar(150) NOT NULL,
  `vehicleregisterno` varchar(50) NOT NULL,
  `vehiclemodelname` varchar(50) NOT NULL,
  `rcphoto` varchar(255) NOT NULL,
  `idtype` varchar(50) NOT NULL,
  `idno` varchar(30) NOT NULL,
  `idphoto` varchar(255) NOT NULL,
  `username` varchar(50) NOT NULL,
  `status` varchar(5) NOT NULL DEFAULT '0',
  `payment` varchar(50) NOT NULL DEFAULT 'PENDING',
  `applicationstatus` varchar(50) NOT NULL,
  `fastagid` varchar(100) NOT NULL,
  `remarks` varchar(255) NOT NULL,
  `email` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `feedbackid` int(50) NOT NULL,
  `username` varchar(100) NOT NULL,
  `feedback` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `feedetails`
--

CREATE TABLE `feedetails` (
  `feeid` int(11) NOT NULL,
  `tagclass` varchar(5) NOT NULL,
  `securitydeposit` varchar(5) NOT NULL,
  `threshold` varchar(5) NOT NULL,
  `total` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `feedetails`
--

INSERT INTO `feedetails` (`feeid`, `tagclass`, `securitydeposit`, `threshold`, `total`) VALUES
(1, '4', '200', '100', '400'),
(2, '5', '300', '140', '540'),
(3, '6', '400', '300', '800'),
(4, '7', '400', '300', '800'),
(5, '12', '500', '300', '900'),
(6, '15', '500', '300', '900'),
(7, '16', '500', '300', '900'),
(8, '61', '500', '350', '950');

-- --------------------------------------------------------

--
-- Table structure for table `ledger`
--

CREATE TABLE `ledger` (
  `ledgerid` int(11) NOT NULL,
  `username` varchar(20) NOT NULL,
  `vehicleregisterno` varchar(50) NOT NULL,
  `fastagid` varchar(20) NOT NULL,
  `balance` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `pwdreset`
--

CREATE TABLE `pwdreset` (
  `pwdResetId` int(11) NOT NULL,
  `pwdResetEmail` text NOT NULL,
  `pwdResetSelector` text NOT NULL,
  `pwdResetToken` longtext NOT NULL,
  `pwdResetExpires` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `registration`
--

CREATE TABLE `registration` (
  `userid` int(10) NOT NULL,
  `username` varchar(10) NOT NULL,
  `password` varchar(255) NOT NULL,
  `name` varchar(30) NOT NULL,
  `email` varchar(100) NOT NULL,
  `feedback` varchar(200) NOT NULL,
  `usertype` varchar(10) NOT NULL DEFAULT 'user',
  `accountstatus` varchar(50) NOT NULL DEFAULT 'ENABLED'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `registration`
--

INSERT INTO `registration` (`userid`, `username`, `password`, `name`, `email`, `feedback`, `usertype`, `accountstatus`) VALUES
(20, 'admin', '$2y$10$I6wLJ/gByUy3a7jo76E.LO4TKKFOgU64DZpC57pZe9pMzfgbk1pC6', 'FASTag Administrator', 'admin@fastag.com', '', 'admin', 'ENABLED'),
(31, 'athulcp', '$2y$10$r28uQ17TOOVBH7X1mtH0O.9ZXpTC8/UZdjoWpjx.rs9aGgnCwWwuq', 'ATHUL CP', 'athulcp123@gmail.com', '', 'user', 'ENABLED'),
(33, 'tolltvm', '$2y$10$uIMp.LU2xH14uJDvGZFhkex3LyPmsIpsREFcSoo5Wpcp.z/XnXk8C', 'TOLL TVM', 'tolltvm@fastag.com', '', 'toll', 'ENABLED');

-- --------------------------------------------------------

--
-- Table structure for table `toll`
--

CREATE TABLE `toll` (
  `tollid` int(11) NOT NULL,
  `tollusername` varchar(100) NOT NULL,
  `4` varchar(10) NOT NULL,
  `5` varchar(10) NOT NULL,
  `6` varchar(10) NOT NULL,
  `7` varchar(10) NOT NULL,
  `12` varchar(10) NOT NULL,
  `15` varchar(10) NOT NULL,
  `16` varchar(10) NOT NULL,
  `61` varchar(10) NOT NULL,
  `status` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `toll`
--

INSERT INTO `toll` (`tollid`, `tollusername`, `4`, `5`, `6`, `7`, `12`, `15`, `16`, `61`, `status`) VALUES
(1, 'tolltvm', '20', '150', '50', '20', '15', '60', '40', '17', 'DEBIT-NH-966A TOLL');

-- --------------------------------------------------------

--
-- Table structure for table `transaction`
--

CREATE TABLE `transaction` (
  `transactionid` int(11) NOT NULL,
  `fastagid` varchar(20) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp(),
  `amount` varchar(10) NOT NULL,
  `status` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `transaction`
--

INSERT INTO `transaction` (`transactionid`, `fastagid`, `date`, `amount`, `status`) VALUES
(64, '5feda6da5ef48', '2020-12-31 10:24:26', '+ 100', 'MIN-BALANCE-APPLICATION'),
(65, '5feda70eeebd9', '2020-12-31 10:25:19', '+ 100', 'MIN-BALANCE-APPLICATION'),
(66, '5feda75d1dcb3', '2020-12-31 10:26:37', '+ 100', 'MIN-BALANCE-APPLICATION'),
(67, '5feda775c72c7', '2020-12-31 10:27:01', '+ 100', 'MIN-BALANCE-APPLICATION'),
(68, '5feda81123e5c', '2020-12-31 10:29:37', '+ 300', 'MIN-BALANCE-APPLICATION'),
(69, '5feda81123e5c', '2020-12-31 10:30:14', '+ 100', 'CREDIT-RECHARGE'),
(70, '5feda81123e5c', '2020-12-31 10:30:38', '- 20', 'DEBIT-NH-966A TOLL');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `application`
--
ALTER TABLE `application`
  ADD PRIMARY KEY (`applicationid`),
  ADD KEY `username` (`username`),
  ADD KEY `status` (`status`),
  ADD KEY `vehicleregisterno` (`vehicleregisterno`);

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`feedbackid`);

--
-- Indexes for table `feedetails`
--
ALTER TABLE `feedetails`
  ADD PRIMARY KEY (`feeid`);

--
-- Indexes for table `ledger`
--
ALTER TABLE `ledger`
  ADD PRIMARY KEY (`ledgerid`),
  ADD UNIQUE KEY `vehicleregisterno_2` (`vehicleregisterno`),
  ADD KEY `vehicleregisterno` (`vehicleregisterno`,`fastagid`),
  ADD KEY `username` (`username`);

--
-- Indexes for table `pwdreset`
--
ALTER TABLE `pwdreset`
  ADD PRIMARY KEY (`pwdResetId`);

--
-- Indexes for table `registration`
--
ALTER TABLE `registration`
  ADD PRIMARY KEY (`userid`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `toll`
--
ALTER TABLE `toll`
  ADD PRIMARY KEY (`tollid`);

--
-- Indexes for table `transaction`
--
ALTER TABLE `transaction`
  ADD PRIMARY KEY (`transactionid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `application`
--
ALTER TABLE `application`
  MODIFY `applicationid` int(5) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;

--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `feedbackid` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `feedetails`
--
ALTER TABLE `feedetails`
  MODIFY `feeid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `ledger`
--
ALTER TABLE `ledger`
  MODIFY `ledgerid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `pwdreset`
--
ALTER TABLE `pwdreset`
  MODIFY `pwdResetId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `registration`
--
ALTER TABLE `registration`
  MODIFY `userid` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `toll`
--
ALTER TABLE `toll`
  MODIFY `tollid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `transaction`
--
ALTER TABLE `transaction`
  MODIFY `transactionid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=71;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `ledger`
--
ALTER TABLE `ledger`
  ADD CONSTRAINT `username` FOREIGN KEY (`username`) REFERENCES `application` (`username`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `vehicleregisterno` FOREIGN KEY (`vehicleregisterno`) REFERENCES `application` (`vehicleregisterno`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

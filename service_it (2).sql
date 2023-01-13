-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 13, 2023 at 03:24 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `service_it`
--

-- --------------------------------------------------------

--
-- Table structure for table `bought_services`
--

CREATE TABLE `bought_services` (
  `EMAIL` text NOT NULL,
  `CUSTOMER_ID` int(11) NOT NULL,
  `SERVICE_ID` int(11) NOT NULL,
  `SERVICE_NAME` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `bought_services`
--

INSERT INTO `bought_services` (`EMAIL`, `CUSTOMER_ID`, `SERVICE_ID`, `SERVICE_NAME`) VALUES
('aa@gmail.com', 1, 1, 'sasasdada');

-- --------------------------------------------------------

--
-- Table structure for table `contract`
--

CREATE TABLE `contract` (
  `CONTRACT_NAME` text NOT NULL,
  `CUSTOMER_ID` int(11) NOT NULL,
  `SERVICE_NAME` text NOT NULL,
  `PRICE` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `CUSTOMER_ID` int(11) NOT NULL,
  `NAME` text NOT NULL,
  `EMAIL` text NOT NULL,
  `PHONE_NUMBER` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`CUSTOMER_ID`, `NAME`, `EMAIL`, `PHONE_NUMBER`) VALUES
(4, 'gggg', 'gg@gmail.com', 111111),
(5, 'sss', 'ss@gmail.com', 111111),
(6, 'sss', 'ssdsffs@gmail.com', 111111),
(7, 'rares', 'sdfsdfd@gmail.com', 8789798),
(8, 'dd', 'rarezsda@gmail.com', 1),
(9, 'aa', 'rarezsdaalin@gmail.com', 0),
(10, 'aa', 'saaaaaaad@gmail.com', 0),
(11, 'dd', 'saaaaaaads@gmail.com', 0),
(12, 'hh', 'saaaaaaadsds@gmail.com', 0),
(13, 'll', 'saaallaaaadsds@gmail.com', 0),
(14, 'aa', 'alinsfa@gmail.com', 0),
(15, 'dsfsdf', 'alinsfadgfhhjh@gmail.com', 998891),
(16, 'alin', 'aa@gmail.com', 123);

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `ID` int(11) NOT NULL,
  `EMAIL` varchar(100) NOT NULL,
  `PASSWORD` varchar(100) NOT NULL,
  `USERTYPE` varchar(50) NOT NULL DEFAULT 'user'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`ID`, `EMAIL`, `PASSWORD`, `USERTYPE`) VALUES
(1, '', '', 'admin'),
(2, '', 'alinking2002', 'admin'),
(3, 'king@gmail.com', '$2y$10$m4Mch3CrGcie4f/tn42Uc.E4QIvhtFgMFYnzOfrjgswrP.poXRRRW', 'admin'),
(4, 'sdfsdfd@gmail.com', '$2y$10$IHFuAVcn5rjaj3/S88PtUuu2n3RvJX2FBDH9nYli3qjD5n2TPVJNS', 'user'),
(5, 'sdfsdfd@gmail.com', '$2y$10$eEVIgqVTfJconrSStzl3t.9IsB0Z/Lp56neIaV7rB7P46cBIsfGV6', 'user'),
(6, 'alin@gmail.com', '$2y$10$691eEvyx1MqrZF6lcTHBlu241enj9S5WLMk0nrZ1A3bkM2eqMNpxq', 'user'),
(7, 'rares@gmail.com', '$2y$10$Fosr4gEXkpuQhwfxKfv5nOLBddKf4.k7dv.NxSeeoZ0OwZlzbC7Qu', 'user'),
(8, 'rarezs@gmail.com', '$2y$10$rJg86rbjBWcMgXAzQ2Bh1OXjDj7G0ENVeQZ5amIrfohLhstml.CEe', 'user'),
(9, 'rarezsda@gmail.com', '$2y$10$GrNQ96w/mufyr7oR4eFYkeXZhbVBgKZfKj/uU3BquTxtcV9yZCZx6', 'user'),
(10, 'rarezsdaalin@gmail.com', '$2y$10$4n9auP8/Q7.aI5ZAv8y2meCP3CtePJyMG9MFwjKfd3Qix.IcKekBW', 'user'),
(11, 'saaaaaaad@gmail.com', '$2y$10$k3iRWhTO5LqTMBXdo0vHkuuJpbghkjOdSXYRCx.3RsfoGuD466Dpe', 'user'),
(12, 'saaaaaaads@gmail.com', '$2y$10$hNdS6yZ1OuuHRLSGB3qFCuRbhFOdi0xM/iCdx/ZG88iXCOZdzIl2i', 'user'),
(13, 'saaaaaaadsds@gmail.com', '$2y$10$Gh/B4yoRm2XVgmKIWMKp2eUlcHLRXYEfulxXWZm9o77BmeNr/c7xS', 'user'),
(14, 'saaallaaaadsds@gmail.com', '$2y$10$t6IimXXzMCAQImbnA1udqe8qkE8w4dqPKGqK66xdIGdqJzL.klb8e', 'user'),
(15, 'alinsfa@gmail.com', '$2y$10$WksWy6Vav6l1ODeceue9c.o2vWlr0i5mTJcHt0Cs7Vv0YwbVePX.e', 'user'),
(16, 'alinsfadgfhhjh@gmail.com', '$2y$10$Pc7T8i5nuFBKx4uQ3OqxBeWJsy2UhNc8DNjlKTBgydhRunTyFMDu.', 'user'),
(17, 'aa@gmail.com', '$2y$10$m4Mch3CrGcie4f/tn42Uc.E4QIvhtFgMFYnzOfrjgswrP.poXRRRW', 'user');

-- --------------------------------------------------------

--
-- Table structure for table `request_services`
--

CREATE TABLE `request_services` (
  `CUSTOMER_ID` int(11) NOT NULL,
  `SERVICE_NAME` text NOT NULL,
  `SERVICE_ID` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

CREATE TABLE `services` (
  `ID` int(11) NOT NULL,
  `SERVICE_NAME` text NOT NULL,
  `SERVICE_DESCRIPTION` text NOT NULL,
  `SERVICE_PRICE` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `services`
--

INSERT INTO `services` (`ID`, `SERVICE_NAME`, `SERVICE_DESCRIPTION`, `SERVICE_PRICE`) VALUES
(6, 'WEBSERVIce_Update_final test', '    este foarte bunjj', 24444),
(9, 'WEBSERVICE', 'adsadas', 231),
(10, 'sadsa', 'sadsadasd', 231),
(11, 'test', 'sadsad', 1111),
(12, 'aaaaaaa', 'aaaaaa', 1111111);

-- --------------------------------------------------------

--
-- Table structure for table `ticket_table`
--

CREATE TABLE `ticket_table` (
  `TICKET_ID` int(11) NOT NULL,
  `CUSTOMER_ID` int(11) NOT NULL,
  `SERVICE_ID` int(11) NOT NULL,
  `SERVICE_NAME` varchar(100) NOT NULL,
  `SERVICE_DESCRIPTION` varchar(100) NOT NULL,
  `DATE` date NOT NULL,
  `STATUS` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `ticket_table`
--

INSERT INTO `ticket_table` (`TICKET_ID`, `CUSTOMER_ID`, `SERVICE_ID`, `SERVICE_NAME`, `SERVICE_DESCRIPTION`, `DATE`, `STATUS`) VALUES
(1, 12, 1, 'sadasdsa', 'asdasd', '2023-01-03', 'IN PROGRESS'),
(2, 12, 1, 'sadasdsa', 'asdasd', '2022-01-03', 'IN PROGRESS'),
(3, 12, 1, 'FSDF', 'DSFDSF', '2023-01-11', 'DONE');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`CUSTOMER_ID`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `ticket_table`
--
ALTER TABLE `ticket_table`
  ADD PRIMARY KEY (`TICKET_ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `CUSTOMER_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `services`
--
ALTER TABLE `services`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `ticket_table`
--
ALTER TABLE `ticket_table`
  MODIFY `TICKET_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

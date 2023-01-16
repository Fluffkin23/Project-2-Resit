-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 16, 2023 at 09:50 PM
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
  `CONTRACT_ID` int(11) NOT NULL,
  `CUSTOMER_ID` int(11) NOT NULL,
  `SERVICE_NAME` text NOT NULL,
  `EMAIL` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `contract`
--

INSERT INTO `contract` (`CONTRACT_ID`, `CUSTOMER_ID`, `SERVICE_NAME`, `EMAIL`) VALUES
(1, 16, 'php', 'aa@gmail.co'),
(2, 16, 'php', 'aa@gmail.co'),
(3, 16, 'html', 'aa@gmail.co'),
(4, 16, 'java', 'aa@gmail.co'),
(5, 16, 'javascript', 'aa@gmail.co'),
(6, 16, 'php', 'aa@gmail.co'),
(7, 16, 'html', 'aa@gmail.co'),
(8, 16, 'html', 'aa@gmail.co'),
(9, 16, 'javascript', 'aa@gmail.co');

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
(11, 'dd', 'saaaaaaads@gmail.com', 0),
(12, 'hh', 'saaaaaaadsds@gmail.com', 0),
(13, 'll', 'saaallaaaadsds@gmail.com', 0),
(14, 'aa', 'alinsfa@gmail.com', 0),
(15, 'dsfsdf', 'alinsfadgfhhjh@gmail.com', 998891),
(16, 'alin', 'aa@gmail.com', 123),
(17, 'ccadasd', 'cc@gmail.com', 12313),
(18, 'test', 'test@gmail.com', 12313),
(19, 'sdfdsfs', 'test2@gmail.com', 12312),
(20, 'sdfdsfs', 'test3@gmail.com', 12312),
(21, 'alin', 'alinboss@gmail.com', 1234),
(22, 'rares', 'rares2@gmail.com', 77666677);

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
(17, 'aa@gmail.com', '$2y$10$m4Mch3CrGcie4f/tn42Uc.E4QIvhtFgMFYnzOfrjgswrP.poXRRRW', 'user'),
(18, 'cc@gmail.com', '$2y$10$VApLaAHTE7DSTrXADIRBjuqICCNr89JnD3bWzg.dzgWRSd4/R49zS', 'user'),
(19, 'cc@gmail.com', '$2y$10$0FRo4WxBJ7MyfjqzHEkDu.5KUHKeWLnLZ/r/HoNI4JVEkS92lS0zG', 'user'),
(20, 'cc@gmail.com', '$2y$10$CVzY2rR1fcMk17lypQrHNeedk7khr8rL7V185U7K6zpi6A9ql3/ZO', 'user'),
(21, 'test@gmail.com', '$2y$10$weDVZdK4iiyzfAXofzGI4eA1kP0GWtK6rdVBHpadCUuJRMVPsPvPS', 'USER'),
(22, 'test2@gmail.com', '$2y$10$yN4aCUtE.XCyMNHwzJSisO04XfyyzyHUUvPYfegUXNp1egksWPCHO', 'user'),
(23, 'test3@gmail.com', '$2y$10$pCYfYS29tophgddxwyBA4Owr/oPs5Md/PIBK3.kYX1ps8YhfsFIoe', 'user'),
(24, 'alinboss@gmail.com', '$2y$10$Wa7BW09TK8LFDy.5BX3PKe8q2AwB4CEq/MWr5Df/jPRX/2/qmL7u6', 'user'),
(25, 'billossu@gmail.com', '$2y$10$G4ZRhr0xuDQ3smDcnKURJ.pJikS18tsEsWNwjKaVRVUY22uYCNOz2', 'admin'),
(26, 'rares2@gmail.com', '$2y$10$RyvTit6S64JytK2B7pb/uOb6pN1D1zJrLUpGg08WRobMYnaR2G9C.', 'user');

-- --------------------------------------------------------

--
-- Table structure for table `reqeust_services`
--

CREATE TABLE `reqeust_services` (
  `customer_id` int(11) NOT NULL,
  `service_name` text NOT NULL,
  `customer_name` text NOT NULL,
  `email` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `reqeust_services`
--

INSERT INTO `reqeust_services` (`customer_id`, `service_name`, `customer_name`, `email`) VALUES
(16, '0', '0', ''),
(16, '0', '0', ''),
(16, '0', '0', ''),
(16, '0', '0', ''),
(16, 'javascript', 'costahce', ''),
(16, 'php', 'testRares', ''),
(16, 'html', 'costahce', ''),
(16, 'html', 'sdfdff', 'aa@gmail.com'),
(16, 'javascript', 'TEST', 'aa@gmail.com');

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
(10, 'sadsa', 'sadsadasd', 231),
(11, 'test', 'sadsad', 1111),
(12, 'aaaaaaa', 'aaaaaa', 1111111),
(13, 'WEBSERVIce_Update22222Final', 'final test', 12121);

-- --------------------------------------------------------

--
-- Table structure for table `ticket_table`
--

CREATE TABLE `ticket_table` (
  `TICKET_ID` int(11) NOT NULL,
  `EMAIL` varchar(100) NOT NULL,
  `SERVICE_ID` int(11) NOT NULL,
  `SERVICE_NAME` varchar(100) NOT NULL,
  `SERVICE_DESCRIPTION` varchar(100) NOT NULL,
  `RECEIVE_DATE` datetime NOT NULL,
  `STATUS` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `ticket_table`
--

INSERT INTO `ticket_table` (`TICKET_ID`, `EMAIL`, `SERVICE_ID`, `SERVICE_NAME`, `SERVICE_DESCRIPTION`, `RECEIVE_DATE`, `STATUS`) VALUES
(7, 'aa@gmail.com', 0, 'javascript', 'KJKJLJ', '0000-00-00 00:00:00', 'NEW'),
(8, 'aa@gmail.com', 0, 'javascript', 'KJKJLJ', '0000-00-00 00:00:00', 'NEW'),
(9, 'aa@gmail.com', 0, 'javascript', 'KJKJLJ', '0000-00-00 00:00:00', 'NEW'),
(10, 'aa@gmail.com', 0, 'javascript', 'test', '0000-00-00 00:00:00', 'NEW'),
(11, 'aa@gmail.com', 0, 'javascript', 'lkkn', '0000-00-00 00:00:00', 'NEW'),
(12, 'aa@gmail.com', 0, 'javascript', 'lkjhgfdsa', '0000-00-00 00:00:00', 'NEW'),
(13, 'aa@gmail.com', 0, 'javascript', 'lkjhgfdsa', '0000-00-00 00:00:00', 'NEW'),
(14, 'aa@gmail.com', 0, 'javascript', 'KJKJLJ', '0000-00-00 00:00:00', 'NEW'),
(15, 'aa@gmail.com', 0, 'javascript', 'lkjhgfdsa', '0000-00-00 00:00:00', 'NEW'),
(16, 'aa@gmail.com', 0, 'javascript', 'KJKJLJ', '0000-00-00 00:00:00', 'NEW'),
(17, 'aa@gmail.com', 0, 'javascript', 'lkjhgfdsa', '0000-00-00 00:00:00', 'NEW'),
(18, 'aa@gmail.com', 0, 'javascript', 'RARES', '0000-00-00 00:00:00', 'NEW'),
(19, 'aa@gmail.com', 0, 'javascript', 'lkjhgfdsa', '0000-00-00 00:00:00', 'NEW');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `contract`
--
ALTER TABLE `contract`
  ADD PRIMARY KEY (`CONTRACT_ID`);

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
-- AUTO_INCREMENT for table `contract`
--
ALTER TABLE `contract`
  MODIFY `CONTRACT_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `CUSTOMER_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `services`
--
ALTER TABLE `services`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `ticket_table`
--
ALTER TABLE `ticket_table`
  MODIFY `TICKET_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 05, 2023 at 08:10 PM
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
  `CUSTOMER_ID` int(11) NOT NULL,
  `SERVICE_ID` int(11) NOT NULL,
  `SERVICE_NAME` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `ID` int(11) NOT NULL,
  `EMAIL` varchar(100) NOT NULL,
  `USERNAME` varchar(100) NOT NULL,
  `PASSWORD` varchar(100) NOT NULL,
  `USERTYPE` varchar(50) NOT NULL DEFAULT 'user'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`ID`, `EMAIL`, `USERNAME`, `PASSWORD`, `USERTYPE`) VALUES
(1, '', '', '', 'admin'),
(2, '', 'billossu', 'alinking2002', 'admin'),
(3, '', 'billossu', 'alinking2002', 'admin');

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
  `SERVICE_ID` int(11) NOT NULL,
  `SERVICE_NAME` text NOT NULL,
  `SERVICE_DESCRIPTION` text NOT NULL,
  `SERVICE_PRICE` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `services`
--

INSERT INTO `services` (`SERVICE_ID`, `SERVICE_NAME`, `SERVICE_DESCRIPTION`, `SERVICE_PRICE`) VALUES
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
(1, 12, 1, 'sadasdsa', 'asdasd', '2023-01-03', 'DONE'),
(2, 12, 1, 'sadasdsa', 'asdasd', '2023-01-03', 'DONE'),
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
  ADD PRIMARY KEY (`SERVICE_ID`);

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
  MODIFY `CUSTOMER_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `services`
--
ALTER TABLE `services`
  MODIFY `SERVICE_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `ticket_table`
--
ALTER TABLE `ticket_table`
  MODIFY `TICKET_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
